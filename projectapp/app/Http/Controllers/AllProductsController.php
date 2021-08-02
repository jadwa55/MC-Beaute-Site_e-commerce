<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class AllProductsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.allproduct', [
            'projects' => $projects
        ]);
    }
}
