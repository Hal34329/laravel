<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;

use App\Http\Requests\SaveProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        /*$portfolio = [
            ['title' => 'Proyecto #1'],
            ['title' => 'Proyecto #2'],
            ['title' => 'Proyecto #3'],
            ['title' => 'Proyecto #4'],
        ];*/
        //$portfolio = DB::table('projects')->get();
        //$portfolio = Project::orderBy('created_at', 'DESC')->get();
        //$portfolio = Project::latest('updated_at')->get();
        //$portfolio = Project::get();
        //$projects = Project::paginate();
 
        //return view('portfolio', compact('projects'));
        return view('projects.index',[
            'projects'=>Project::paginate()
        ]);
    }

    public function show(Project $project)
    {
        //$project = Project::find($id);

        return view('projects.show', [
            'project' => $project,//Project::findOrFail($id),
        ]);
    }

    public function create()
    {
        return view('projects.create', [
            'project' => new Project
        ]);
    }

    public function store(SaveProjectRequest $request)
    {
        //$title = request('title');
        //$url = request('url');
        //$description = request('description');
        /*$fields = request()->validate([
            'title' => 'required',
            'url' => 'required',
            'description' => 'required',
        ]);*/

        Project::create($request->validated());
        //Project::create($request->all()); Está desactivada la seguridad
        //Project::create( request()->only('title', 'url', 'description') );
        //Project::create( request()->all() ); // Para cuando el campo en la base es el mismo que el dato
        /*([
            'title' => request('title'),//$title,
            'url' => request('url'),//$url,
            'description' => request('description'),//$description,
        ]);*/

        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con éxito.');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        /*$project->update([
            'title' => request('title'),
            'url' => request('url'),
            'description' => request('description'),
        ]);*/
        $project->update($request->validated());

        return redirect()->route('projects.show', $project)->with('status','El proyecto fue actualizado con éxito.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('status','El proyecto fue eliminado con éxito.');
    }
}
