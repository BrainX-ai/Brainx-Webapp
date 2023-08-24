<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services=Service::with('talent')->get();
        return view('pages.admin.services',compact('services'));
    }



    public function show($id)
    {
        $service=Service::with('talent.talent')->find($id);
        return view('pages.admin.service-details',compact('service'));
    }


    /**
     * updateStatus
     *
     * @param Request request
     *
     * @return mixed
     */
    public function updateStatus(Request $request)
    {
        $service = Service::find($request->service_id);
        $service->status = $request->status;
        $service->save();

        return redirect()->route('admin.services');
    }

}
