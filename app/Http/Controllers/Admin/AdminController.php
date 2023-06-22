<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Talent;
use App\Models\Job;
use App\Models\Feedback;
use App\Models\Client;
use App\Models\AssessmentCateory;
use Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->checkRole('Admin');
    }

    /**
     * users
     *
     * @param mixed status
     *
     * @return void
     */
    public function users($status = null)
    {
        $users = User::with('talent')
            ->where('role', 'Talent')
            ->get();
        $user_stat = DB::table('talents')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        return view('pages.admin.users')
            ->with('users', $users)
            ->with('user_stat', $user_stat)
            ->with('status', $status);
    }

    /**
     * clients
     *
     * @return void
     */
    public function clients()
    {
        $users = User::with('client')
            ->where('role', 'Client')
            ->get();

        return view('pages.admin.clients')->with('users', $users);
    }

    /**
     * userDetails
     *
     * @param mixed id
     *
     * @return void
     */
    public function userDetails($id)
    {
        $id = decrypt($id);
        $title = ['Experience', 'Education'];

        $user = User::with(['talent', 'experiences', 'educations'])->find($id);

        $assessmentCategories = AssessmentCateory::with('result')->get();

        return view('pages.admin.talent-details')
            ->with('user', $user)
            ->with('assessmentCategories', $assessmentCategories);
    }

    /**
     * updateStatus
     *
     * @param Request request
     *
     * @return void
     */
    public function updateStatus(Request $request)
    {
        $talent = Talent::find($request->talent_id);
        $talent->status = $request->status;
        $talent->save();

        return redirect()->route('admin.users');
    }

    /**
     * feedbacks
     *
     * @return void
     */
    public function feedbacks()
    {
        $feedbacks = Feedback::orderBy('id', 'DESC')->get();

        return view('pages.admin.feedbacks')->with('feedbacks', $feedbacks);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $id = decrypt($id);
        $jobs = Job::where('client_id', $id)->delete();
        $client = Client::where('user_id', $id)->delete();
        if ($client) {
            $user = User::where('id', $id)->delete();
        }

        return redirect()->route('admin.clients');
    }
}
