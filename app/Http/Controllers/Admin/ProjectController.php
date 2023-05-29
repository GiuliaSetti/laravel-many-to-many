<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;

use App\Models\Type;
use App\Models\Technology;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = Type::all();

        $technologies = Technology::all();
        
        return view('admin.projects.create', compact('types', 'technologies'));

        
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
        $this->validation($request);
        

        $formData = $request->all();

        $project = new Project();
        $project->slug = Str::slug($formData['title'], '-');

        $project->fill($formData);

        if($request->hasFile('cover_image')){

            $path = Storage::put('project_img', $request->cover_image);

            $formData['cover_image'] = $path;
        };


        $project->save(); 

        if(array_key_exists('technologiesArray', $formData)){
            $project->technologies()->attach($formData['technologiesArray']);
        }

        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //

        return view('admin/projects/show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $types = Type::all();

        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
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
        //
        $this->validation($request);

        $formData = $request->all();

        $project->update($formData);

        if($request->hasFile('cover_image')) {

            if($project->cover_image) {
                Storage::delete($project->cover_image);
            }

            $path = Storage::put('project_img', $request->cover_image);

            $formData['cover_image'] = $path;

        }

        if(array_key_exists('technologiesArray', $formData)){
            $project->technologies()->sync($formData['technologiesArray']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();

        if($project->cover_image) {
            Storage::delete($project->cover_image);
        }


        return redirect()->route('admin.projects.index');
    }

    private function validation($request) {

            $formData = $request->all(); 

            $validator = Validator::make($formData, [
                'title' => 'required|min:5|max:255',
                'description' => 'required|max:255',
                'type_id' => 'nullable|exists:types,id',
                // 'thumb' => 'required',
                'cover_image' => 'nullable|image|max:2048',
                'technologies' => 'exists:technologies,id',
                'repository' => 'required',

            ], [
                'title.required' => 'Title field is mandatory.',
                'title.min' => 'Title field cannot be shorter than 5 characters.',
                'title.max' => 'Title field cannot be longer than 255 characters.',
                'description.required' => 'Description field is mandatory.',
                'description.max' => 'Description field cannot be longer than 255 characters.',
                'type_id.exists' => 'Select a category between those available',
                'cover_image.image' => 'File must be an image',
                'cover_image' => 'File must be under 2MB',
                // 'thumb.required' => "Thumbnail path is mandatory.",
                'technologies.exists' => 'Select a technology',
                'repository.required' => "Repository's name field is mandatory."
    
            ])->validate();

        return $validator;
    }

}
