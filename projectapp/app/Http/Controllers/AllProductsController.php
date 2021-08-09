<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class AllProductsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order=false)
    {
        if($order=='category'){

            $projects = Project::orderBy('category_id')->get();

        }

        if($order==false){
            $projects = Project::all();
        }



        if($order=='price'){
            $projects = Project::orderBy('cost')->get();
        }

        return view('projects.allproduct', [
            'projects' => $projects
        ]);

    }
}
