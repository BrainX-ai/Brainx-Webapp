<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\AssessmentCateory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jorenvh\Share;

class TalentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function addService(Request $request)
    {

        $create = Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $this->uploadFile($request),
            'price' => $request->price,
            'delivery_time' => $request->delivery_time,
            'industry' =>  $request->industry,
            'status' => 'PUBLISHED',
            'user_id' => $request->user_id
        ]);

        return response()->json(['success' => true], 200);
    }

    public function uploadFile(Request $request)
    {
        // Validate the uploaded file
        // $request->validate([
        //     'file' => 'required|file|mimes:jpeg,png,pdf|max:2048', // Adjust allowed file types and size as needed
        // ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('uploads'); // Change this to the desired upload directory

            // Move the uploaded file to the storage location
            $file->move($filePath, $fileName);

            // You can also store the file information in a database if needed
            // Example: File::create(['name' => $fileName, 'path' => $filePath]);

            return $fileName;
        }

        return null;
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
        //
    }

    public function getProfileBuilder()
    {
        $user = Auth::guard()->user();

        return redirect('/build-profile')->with(['user' => $user]);
    }

    public function showTalentProfile($id)
    {

        $id = decrypt($id);
        $portfolios = Portfolio::where('user_id', $id)->get();
        $services = Service::where('user_id', $id)->get();
        $categories = Category::with('skills')->get();
        $user = User::with('talent')->with('experiences')->with('educations')->find($id);
        $clientProfileLink = route('client.show.profile', encrypt($id));

        $linkedinShare = Share\ShareFacade::page($clientProfileLink)
            ->linkedin()->getRawLinks();
        return view('pages.talent.service-profile')
            ->with('linkedinShare', $linkedinShare)
            ->with('clientProfileLink', $clientProfileLink)
            ->with('portfolios', $portfolios)
            ->with('user', $user)
            ->with('services', $services)
            ->with('categories', $categories);
    }
}
