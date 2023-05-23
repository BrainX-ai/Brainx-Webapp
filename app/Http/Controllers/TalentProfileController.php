<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Talent;
use App\Models\TalentSkill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Action;
use App\Models\Message;
use CV;

class TalentProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->checkRole('Talent');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::guard());
        if (Auth::guard()->user() != null) {
            $user = User::find(Auth::guard()->user()->id);
            $categories = Category::with('skills')->get();

            if (!isset($user->talent) || $user->talent->status == "INCOMPLETE") {


                return view('pages.talent.build-profile')->with('user', $user)->with('categories', $categories);
            } else if (!isset($user->talent) || $user->talent->status == "ASSESSMENT_PENDING") {
                return redirect()->route('show.profile', encrypt($user->id));
            }else { //if($user->talent->status == "PUBLISHED"){
                return redirect()->route('talent.care');
            }
            // else{
            //     return view('pages.talent.pending-profile')->with('user', $user)->with('categories', $categories);
            // }
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::guard()->user()->id;

        // $this->convertToHTML();

        $talent = Talent::where('user_id', $user_id)->with('skill')->first();
        // dd($request->resume->extension());
        // if($request->resume != null){
        //     $talent->resumePath = $this->uploadResume($request->resume);
        //     $talent->resumeData = $this->getResumeData($talent->resumePath);
        // }
        $talent->name = $request->name;
        $talent->country = $request->country;
        $talent->standout_job_title = $request->standout_job_title;
        $talent->experience = $request->experience;
        $talent->brief_summary = $request->bio;
        $talent->hours_per_week = $request->hours_per_week;
        $talent->hourly_rate = $request->hourly_rate;
        $talent->user_id = $user_id;
        $talent->linkedin = $request->linkedin_url;
        $talent->status = "ASSESSMENT_PENDING";
        $talent->save();

        $data = [];
        if (isset($request->skills)) {
            foreach ($request->skills as $skill) {

                if (!$this->isSkillExists($talent->skill, $skill)) {
                    array_push(
                        $data,
                        array(
                            'talent_id' => $talent->talent_id,
                            'skill_id' => $skill
                        )
                    );
                }
            }
            $skills = TalentSkill::insert($data);
        }


        
        return redirect()->route('show.profile',encrypt($user_id));
        // return redirect()->route('talent.care');
    }

    public function submitForReview(){



        $user_id = Auth::guard()->user()->id;
        $talent = Talent::where('user_id', $user_id)->first();
        $talent->status = 'IN_REVIEW';
        $talent->save();

        $action = Action::create([
            'job_id' => null,
            'sender_id' => null,
            'receiver_id' => Auth::user()->id,
            'action_type' => 'MESSAGE_WITH_MY_PROFILE'
        ]);
        $message = Message::create([
            'sender_id' => null,
            'action_id' => $action->id,
            'message' => 'We’re excited to receive your profile. Please kindly give us time to review your profile. You will be notified via email when you’re accepted. Thank you for joining us!'
        ]);
    }

    public function updateHourlyRate(Request $request){
        $user_id = Auth::guard()->user()->id;
        $talent = Talent::where('user_id', $user_id)->first();
        $talent->hourly_rate = $request->hourly_rate;
        $talent->save();
        return redirect()->route('show.profile', encrypt($user_id));
    }

    public function updateHoursPerWeek(Request $request){
        $user_id = Auth::guard()->user()->id;
        $talent = Talent::where('user_id', $user_id)->first();
        $talent->hours_per_week = $request->hours_per_week;
        $talent->save();
        return redirect()->route('show.profile', encrypt($user_id));
    }

    public function updateExFamousCompany(Request $request){
        $user_id = Auth::guard()->user()->id;
        $talent = Talent::where('user_id', $user_id)->first();
        $talent->ex_famouse_company = $request->ex_famouse_company;
        $talent->save();
        return redirect()->route('show.profile', encrypt($user_id));
    }

    public function uploadResume($file)
    {

        $fileName = Auth::guard()->user()->id . time() . '.' . $file->extension();
        // Move uploaded file to a specific location
        $file->move(public_path('resumes'), $fileName);

        return $fileName;

    }

    public function getResumeData($fileName)
    {
        // Set the path to the PDF file
        // $pdfFilePath = '/Users/tawsifkhan/Projects/BrainX/laravel-multi-auth/public/resumes/'.$fileName;
        $pdfFilePath = __DIR__ . '/../../../public/resumes/' . $fileName;
        // dd($pdfFilePath);
        $command = escapeshellcmd("pdftotext $pdfFilePath -");
        // Convert the PDF to text using pdftotext
        $text = shell_exec($command);

        // // Convert the text to an array
        $data = explode("\n", $text);

        // // Convert the array to JSON
        $json = json_encode($data);
        // dd(json_decode($json));
        // // Output the JSON
        return $json;
    }



    function isSkillExists($existingSkills, $skill)
    {
        foreach ($existingSkills as $existingSkill) {
            if ($existingSkill->skill_id == $skill) {
                return true;
            }
        }

        return false;
    }

    function addExperience(Request $request)
    {

        $experience = Experience::create([
            'title' => $request->title,
            'company' => $request->company,
            'from' => $request->from,
            'to' => $request->present ? 'Present' : $request->to,
            'skills' => $request->skills,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('show.profile', encrypt(Auth::user()->id));
    }

    function addEducation(Request $request)
    {

        $experience = Education::create([
            'degree' => $request->degree,
            'school' => $request->school,
            'from' => $request->from,
            'to' => $request->to,
            'field_of_study' => $request->field_of_study,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('show.profile', encrypt(Auth::user()->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = decrypt($id);
        $title = ['Experience', 'Education'];

        $categories = Category::with('skills')->get();
        $user = User::with('talent')->with('experiences')->with('educations')->find($id);

        return view('pages.talent.profile')->with('user', $user)->with('categories', $categories);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showPendingPage()
    {

        $user = Auth::guard()->user();
        return view('pages.talent.pending-profile')->with('user', $user);
    }

    public function showTalentProfile()
    {   
        
        
        $user = User::with('talent')->with('experiences')->with('educations')->find(Auth::user()->id);

        return view('pages.client.pages.talent-profile')->with('user', $user);
    }
}