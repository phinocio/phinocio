<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Str;
use League\CommonMark\Exception\CommonMarkException;
use League\CommonMark\MarkdownConverter;

class ProjectController extends Controller
{
    public function __construct(private readonly MarkdownConverter $converter)
    {
        $this->authorizeResource(Project::class, 'project');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy("title")->get();

        return view('project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("project.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();


        $slug = Str::slug($validated['title']);

        $project = new Project();
        $project->title = $validated['title'];
        $project->summary = $validated['summary'];
        $project->slug = $slug;
        $project->content = $validated['content'];
        $project->save();

        return redirect('projects/' . $project->slug);
    }


    public function show(Project $project)
    {
        try {
            $project->content = $this->converter->convert($project->content);
            //            $post->content = $this->converter->convert(file_get_contents(resource_path('example.md')));
        } catch (CommonMarkException $e) {
            abort(500, $e->getMessage());
        }

        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view("project.edit", ['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();


        $project->title = $validated['title'];
        $project->summary = $validated['summary'];
        $project->content = $validated['content'];
        $project->save();

        return redirect('projects/' . $project->slug);
    }
}
