<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $role;

    public function checkRole($role){
        $this->role = $role;

        session(['role' => $role]);
        if(Auth::user() == null){

            if($this->role == 'Talent'){
                // dd("talent");
                return redirect('/talent');
            }
            if($this->role == 'Client'){
                return redirect('/');
            }
            if($this->role == 'Admin'){
                return redirect()->route('admin.login.form');
            }
        }
        $this->middleware(function ($request, $next) {  
            
            if (Auth::user()->role != $this->role) {
                
                abort(404);
            }
            
                return $next($request);
            });
    }
}
