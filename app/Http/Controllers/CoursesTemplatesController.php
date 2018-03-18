<?php

namespace App\Http\Controllers;

use App\Course;
use App\Template;
use Illuminate\Http\Request;

class CoursesTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        $courses = $course->templates()->paginate(5);

        return response()->json($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course, Request $request)
    {
        $template = $course->templates()->create($request->all());

        return response()->json($template);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Course $course, Request $request, $id)
    {
        $validatedData = $request->validate([
            'year' => 'required|digits',
            'url' => 'required|url',
        ]);

        $template = Template::findOrFail($id);

        // $template->update($request->all());

        $template->year = $request->get('year');
        $template->url = $request->get('url');

        $template->save();

        return response()->json($template);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, $id)
    {
        $template = Template::find($id);

        $template->delete();

        return response()->json([
            'message' => 'All is good!'
        ]);
    }
}
