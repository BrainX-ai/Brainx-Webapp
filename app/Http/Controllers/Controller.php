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
                abort(404);
            }
                return $next($request);
            });
    }
}
