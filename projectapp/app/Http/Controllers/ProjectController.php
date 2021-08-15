<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
// use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::latest()->paginate(8);
        $projects = Project::all();

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return 'bidoni jadwa';
        return view('projects.create')->with('categorys',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'quantite' => 'required',
            'cost' => 'required'
        ]);
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = 'img/upload';

            $img=$image->move($folder,$name.'.'.$image->getClientOriginalExtension());
        }

        Project::create([
            'name' => $request->name,
            'introduction' => $request->introduction,
            'category_id' => $request->category_id,
            'image' => $img,
            'quantite' => $request->quantite,
            'cost' => $request->cost,
        ]);

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'introduction' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'quantite' => 'required',
            'cost' => 'required'
        ]);


        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = 'img/upload';

            $img=$image->move($folder,$name.'.'.$image->getClientOriginalExtension());
        }


        $project->update([
            'name' => $request->name,
            'introduction' => $request->introduction,
            'category_id' => $request->category_id,
            'image' => $img??$project->image,
            'quantite' => $request->quantite,
            'cost' => $request->cost,
        ]);

        return redirect()->route('projects.index')
            // ->with('success', 'Project updated successfully');
            ->with('success');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
}
