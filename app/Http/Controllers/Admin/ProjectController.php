<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Http\Requests\ProjectRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(["technologies"])->where("user_id", "=", auth()->user()->id)->paginate(10);
        
        return view("admin.project.index", ["projects" => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();

        return view("admin.project.create", ["technologies" => $technologies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $validated = $request->validated();

        $technologiesList = trim(preg_replace('/\s+/', ' ', $request->technologiesList));
        $technologiesList = explode(" ", $technologiesList);

        if($technologiesList[0] == "")
            throw ValidationException::withMessages(["noTechErr" => "Il progetto deve avere almeno una tecnologia"]);

        $ids = array();
        foreach($technologiesList as $technologyName){
            $technology = Technology::where("name", "=", $technologyName)->first();
            array_push($ids, $technology->id);
        }

        $project = new Project();
        $project->fill($validated);
        $project->user_id = auth()->user()->id;
        $project->slug = Str::slug($validated["name"], "-");
        $project->save();

        $project->slug .= ("-" . $project->id);
        $project->save();

        $project->technologies()->sync($ids);
        
        return redirect()->route("admin.project.index", auth()->user()->name)->with("mex", "Progetto creato con successo!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $project = Project::with("technologies")->where("slug", "=", $slug)->first();
        $technologies = Technology::all();

        if($project == null)
            abort(404);

        return view("admin.project.edit", ["project" => $project, "technologies" => $technologies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, int $id)
    {

        $validated = $request->validated();

        $technologiesList = trim(preg_replace('/\s+/', ' ', $request->technologiesList));
        $technologiesList = explode(" ", $technologiesList);

        if($technologiesList[0] == "")
            return back()->with("noTechErr", "Il progetto deve avere almeno una tecnologia");

        $ids = array();
        foreach($technologiesList as $technologyName){
            $technology = Technology::where("name", "=", $technologyName)->first();
            array_push($ids, $technology->id);
        }

        $project = Project::find($id);

        if($project == null)
            abort(404);

        $project->update($validated);
        $project->slug = Str::slug(($project->name . "-" . $project->id), "-");
        $project->save();
        $project->technologies()->sync($ids);

        return redirect()->route("admin.project.index", auth()->user()->name)->with("mex", "Progetto modificato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $project = Project::find($id);

        if($project == null)
            abort(404);

        $project->delete();

        return redirect()->route("admin.project.index", auth()->user()->name)->with("mex", "Progetto eliminato con successo!");
    }



    public function redirectIndex(){
        return redirect()->route("admin.project.index", auth()->user()->name);
    }
}
