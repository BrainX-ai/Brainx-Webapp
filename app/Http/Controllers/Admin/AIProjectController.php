<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AIProject;
use Illuminate\Http\Request;

class AIProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->checkRole('Admin');
    }
    public function index()
    {
        $projects = AIProject::all();
        return view('pages.admin.ai_projects')->with('projects', $projects);
    }
}
