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
