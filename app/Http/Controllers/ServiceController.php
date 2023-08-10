<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{


    public function addService(Request $request)
    {

        $create = Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $this->uploadFile($request),
            'price' => $request->price,
            'industry' => implode(',', $request->industry),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('show.profile', ['id' => encrypt(Auth::user()->id)]);
    }

    public function addPortfolio(Request $request)
    {

        $create = Portfolio::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('show.profile', ['id' => encrypt(Auth::user()->id)]);
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

    public function editService($id)
    {
        $service = Service::find($id);

        return view('pages.talent.includes.modals.edit.service')->with('service', $service);
    }

    public function updateService(Request $request)
    {
        $service = Service::find($request->id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->delivery_time = $request->delivery_time;
        $service->price = $request->price;
        $service->industry = $request->industry;
        $service->image = ($request->image !== null) ? $this->uploadFile($request) : $service->image;

        $service->save();

        return redirect()->route('service.details', ['id' => $service->id]);
    }

    public function serviceDetails($id)
    {
        $service = Service::find($id);
        $talent = User::with('talent')->find($service->user_id);

        return view('pages.talent.service-details')->with('service', $service)->with('talent', $talent);
    }
}
