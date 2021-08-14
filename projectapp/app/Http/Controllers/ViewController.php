<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Models\Offer;
use App\Models\About;
use App\Models\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::with('categoryinfo')->latest()->paginate(8);
        $projects = Project::latest()->paginate(10);
        // $projects = Project::orderBy('created_at','desc')->get();

        // $categorys = Category::all();
        $categorys = Category::orderBy('created_at','desc')->get();

        $abouts = About::latest()->paginate(1);

        $offers = Offer::latest()->paginate(1);

        // return $projects;
        return view('projects.view',[
            'projects' => $projects,
            'categorys' => $categorys,
            'abouts'=>$abouts,
            'offers'=>$offers,
        ]);


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function show(View $view)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function edit(View $view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, View $view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function destroy(View $view)
    {
        //
    }

    public function isLogin(){

        // ===check valeur nd type
        // == check only valeur

        if(Auth::user()->is_login===1){
            return redirect(route('projects.index'));
        }

        return redirect(route('home'));

    }
}
