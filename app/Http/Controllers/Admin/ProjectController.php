<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
// use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'DESC')->paginate(5);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // dato che sto usando una vista che richiede un $project e solitamente nella create() non c'è, ne creo uno e ne passo uno vuoto
        $project = new Project;
        //mi passo dal controller la lista di tutte le categorie in modo da poterle usare in un ciclo nel form per generare tante option della select quante sono le categorie
        $types = Type::all();
        return view('admin.projects.form', compact('project', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(StoreProjectRequest $request)
    {
        //validazione
        $request->validated();

        $data = $request->all();

        $project = new Project;
        $project->fill($data);
        $project->slug = Str::slug($project->title);
        $project->save();


        return redirect()->route('admin.project.show', $project);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        //mi passo dal controller la lista di tutte le categorie in modo da poterle usare in un ciclo nel form per generare tante option della select quante sono le categorie
        $types = Type::all();

        return view('admin.projects.form', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //validazione
        $request->validated();
        
        $data = $request->all();
        $project->fill($data);
        $project->slug = Str::slug($project->title); // prevedo l'aggiornamento dello slug nel caso in cui il titolo venga modificato (dato che questa operazione va tra il fill r il save, non uso come si fa di solito l'update (che fa fill e save insieme, ma li spezzo in fill e save per poter mettere questa operazione tra i due))
        $project->save();

        return redirect()->route('admin.project.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->back();
    }
}
