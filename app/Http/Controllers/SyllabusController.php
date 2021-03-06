<?php

namespace App\Http\Controllers;

use App\Syllabus as Syllabus;
use App\Http\Resources\SyllabusResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
        $files = Syllabus::with('myclass')
                          ->bySchool(\Auth::user()->school_id)
                          ->where('active',1)
                          ->get();
        $classes = \App\Myclass::bySchool(\Auth::user()->school->id)
                          ->get();
        return view('syllabus.course-syllabus',['files'=>$files,'classes'=>$classes,'class_id' => 0]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $class_id)
    {
      try{
        if(Schema::hasColumn('syllabuses','class_id')){
          $files = Syllabus::with('myclass')
                          ->bySchool(\Auth::user()->school_id)
                          ->where('class_id', $class_id)
                          ->where('active',1)
                          ->get();
          $classes = \App\Myclass::bySchool(\Auth::user()->school->id)
                          ->get();
        } else {
          return '<code>class_id</code> column missing. Run <code>php artisan migrate</code>';
        }
      } catch(Exception $ex){
        return 'Something went wrong!!';
      }

      return view('syllabus.course-syllabus',['files'=>$files,'classes'=>$classes,'class_id'=>$class_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tb = new Syllabus;
      $tb->file_path = $request->file_path;
      $tb->title = $request->title;
      $tb->active = 1;
      $tb->school_id = \Auth::user()->school_id;
      $tb->user_id = \Auth::user()->id;
      $tb->save();
      return back()->with('status', __('Uploaded'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new SyllabusResource(Syllabus::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $tb = Syllabus::find($request->id);
      $tb->active = 0;
      $tb->save();
      return back()->with('status',__('File removed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      return (Syllabus::destroy($id))?response()->json([
        'status' => 'success'
      ]):response()->json([
        'status' => 'error'
      ]);
    }
}
