<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bottom;
use App\Models\News;
use App\Models\Banner;

class ProjectController extends Controller
{
    public function uploadfile(request $request)
    {
        $path=$request->file('work')->store('upload');
        echo $path;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $bottoms = Bottom::where("id", 1)->get() ;
        $news = News::where("status", 2)->get();
        $banners = Banner::get() ;
        */


        if (Auth::user()->status == "1") {


            return redirect()->route('index');
            /*
            return view("home", [
                'bottoms' => $bottoms ,
                'news' => $news ,
                'banners' => $banners ,
            ]);
            */


        }
        elseif(Auth::user()->status == "2") {

            return redirect()->route('setPassword');

        }
        else{

            Auth::logout();
            return redirect()->route('index');
        }
        
        /*
        return view("project/index", [
            'projects' => $projects
        ]);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("project/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:projects'
        ]);

        Project::create([
            'name' => $request->post('name'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('project.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Project::findOrFail($id);
        return view('project/edit', ['model'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Project::findOrFail($id);
        $request->validate([
            'name'=> 'required|unique:projects,name,'.$id.',id'
        ]);

        $model->update([
            'name'=>$request->post('name')
        ]);

        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Project::findOrFail($id);
        $model->delete();
    }
}
