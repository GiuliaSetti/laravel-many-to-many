<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

use App\Models\Project;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.types.create');
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

        $newType = new Type();
        $newType->slug = Str::slug($formData['title'], '-');

        $newType->fill($formData);

        $newType->save(); 

        return redirect()->route('admin.types.show', $newType->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //

        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //

        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //

        $this->validation($request);

        $formData = $request->all();

        $formData['slug'] = Str::slug($formData['name'], '-');

        $type->update($formData);

        $type->save();


        return redirect()->route('admin.types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
        $type->delete();

      
        return redirect()->route('admin.types.index');
    }


    private function validation($request){

        $formData = $request->all();

        $validator = Validator::make($formData, [
            'title' => 'required|min:5|max:255',
            'description' => 'required|max:255',
        ], [
            'title.required' => 'Title field is mandatory.',
            'title.min' => 'Title field cannot be shorter than 5 characters.',
            'title.max' => 'Title field cannot be longer than 255 characters.',
            'description.required' => 'Description field is mandatory.',
            'description.max' => 'Description field cannot be longer than 255 characters.'

        ])->validate();

        return $validator;
    }
}
