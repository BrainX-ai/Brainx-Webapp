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
        $this->middleware(function ($request, $next) {  
            if (Auth::user()->role != $this->role) {
                if($this->role == 'Talent'){
                    return redirect()->route('pages.index');
                }
                if($this->role == 'Client'){
                    return redirect()->route('pages.business');
                }
                if($this->role == 'Admin'){
                    return redirect()->route('admin.login.form');
                }
                abort(404);
            }
                return $next($request);
            });
    }
}
