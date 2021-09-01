<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bottom;
use App\Models\News;
use App\Models\Banner;
use App\Models\Structure;
use App\Models\Story;
use App\Models\About;
use App\Models\Emblem;
use App\Models\Contact;
use App\Models\Activityvideo;
use App\Models\Activity;
use App\Models\Operation_method;
use App\Models\Personal;
use App\Models\Industry;
use App\Models\Engineer;
use App\Models\Engineermaster;
use App\Models\Operation;
use App\Models\Operationupload;
use App\Models\Research;
use App\Models\Number;
use App\Models\Researchnews;
use App\Models\Researchpic;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




class PersonalController extends Controller
{
    public function __construct(){}

    public function indexPersonal($username){ 
        $bottoms = Bottom::where("id", 1)->get() ;
        $news = News::where("status", 2)->get();
        $banners = Banner::get() ;
        $personals = Personal::where("username", $username)->get();

        return view("home", [
          'bottoms' => $bottoms ,
          'news' => $news ,
          'banners' => $banners ,
          'personals' => $personals ,
          'username' => $username,
      ]);
    }


    public function aboutDepartmentPersonal($username){ 
      $bottoms = Bottom::where("id", 1)->get() ;
      $storys = Story::orderBy('year', 'asc')->get() ;
      $personals = Personal::where("username", $username)->get();

      return view("aboutDepartment.about.aboutDepartment", [
        'bottoms' => $bottoms ,
        'storys' => $storys ,
        'username' => $username ,
        'personals' => $personals ,

    ]);

  }


  public function missionPersonal($username){ 
    $bottoms = Bottom::where("id", 1)->get() ;
    $abouts = About::get() ;
    $personals = Personal::where("username", $username)->get();

    return view("aboutDepartment.mission.mission", [
      'bottoms' => $bottoms ,
      'abouts' => $abouts ,
      'username' => $username ,
      'personals' => $personals ,
  ]);

}

public function symbolPersonal($username){ 
  $bottoms = Bottom::where("id", 1)->get() ;
  $emblems = Emblem::get() ;
  $personals = Personal::where("username", $username)->get();

  return view("aboutDepartment.symbol.symbol", [
    'bottoms' => $bottoms ,
    'emblems' => $emblems ,
    'username' => $username ,
    'personals' => $personals ,
]);

}

public function structurePersonal($username){ 
  $bottoms = Bottom::where("id", 1)->get() ;
  $structures = Structure::where("id", 1)->get() ;
  $personals = Personal::where("username", $username)->get();

  
  return view("aboutDepartment.structure.structure", [
    'bottoms' => $bottoms ,
    'structures' => $structures ,
    'username' => $username ,
    'personals' => $personals ,
]);

}

public function activityPersonal($username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $activityvideos = Activityvideo::get() ;
  $activitys = Activity::where("status", 2)->get() ;
  $personals = Personal::where("username", $username)->get();

  return view("activity.activity", [
    'bottoms' => $bottoms ,
    'activityvideos' => $activityvideos ,
    'activitys' => $activitys ,
    'username' => $username ,
    'personals' => $personals ,
]);

}


public function personalPersonal($username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $personalss = Personal::get() ;
  $personals = Personal::where("username", $username)->get();

  return view("personal.personal.personal", [
    'bottoms' => $bottoms ,
    'personalss' => $personalss ,
    'username' => $username ,
    'personals' => $personals ,
]);

}

public function industryPersonal($username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $industrys = Industry::get() ;
  $personals = Personal::where("username", $username)->get();

  return view("course.industry.industry", [
    'bottoms' => $bottoms ,
    'industrys' => $industrys ,
    'username' => $username ,
    'personals' => $personals ,
]);

}

public function engineerPersonal($username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $engineers = Engineer::get() ;
  $personals = Personal::where("username", $username)->get();

  return view("course.engineer.engineer", [
    'bottoms' => $bottoms ,
    'engineers' => $engineers ,
    'username' => $username ,
    'personals' => $personals ,
]);

}


public function engineermasterPersonal($username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $engineermasters = Engineermaster::get() ;
  $personals = Personal::where("username", $username)->get();

  return view("course.engineer-master.engineer-master", [
    'bottoms' => $bottoms ,
    'engineermasters' => $engineermasters ,
    'username' => $username ,
    'personals' => $personals ,
]);

}

public function researchNewsPersonal($username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $researchs = ResearchNews::get() ;
  $personals = Personal::where("username", $username)->get();

  return view("research.researchNews.researchNews", [
    'bottoms' => $bottoms ,
    'researchs' => $researchs ,
    'username' => $username ,
    'personals' => $personals ,
]);

}

public function researchMethodPersonal($username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $researchpics = Researchpic::where("id", 1)->get() ;
  $personals = Personal::where("username", $username)->get();

  return view("research.researchMethod.researchMethod", [
    'bottoms' => $bottoms ,
    'researchpics' => $researchpics ,
    'username' => $username ,
    'personals' => $personals ,
]);

}

public function researchFindPersonal($username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $id_personal = Personal::where("username", $username)->pluck("id");
  $researchs = Research::where("teacherid_one", $id_personal[0])
  ->OrWhere("teacherid_two", $id_personal[0])
  ->OrWhere("teacherid_three", $id_personal[0])
  ->orderBy("year", "desc")
  ->orderBy("research_id", "asc")
  ->orderBy("created_at", "desc")
  ->get() ;
  $personalss = Personal::where("status", 2)->get() ;
  $personals = Personal::where("username", $username)->get();

  return view("research.researchFind.researchFind", [
    'bottoms' => $bottoms ,
    'researchs' => $researchs ,
    'personalss' => $personalss ,
    'username' => $username ,
    'personals' => $personals ,
]);

}


public function operationMethodPersonal($username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $operation_methods = Operation_method::where("id", 1)->get() ;
  $personals = Personal::where("username", $username)->get();


  return view("operation.operationMethod.operationMethod", [
    'bottoms' => $bottoms ,
    'operation_methods' => $operation_methods ,
    'username' => $username ,
    'personals' => $personals ,
]);

}

public function operationFindPersonal($username) { 
        
  $bottoms = Bottom::where("id", 1)->get() ;
  $operations = Operation::get() ;
  $personals = Personal::where("username", $username)->get();

  return view("operation.operationFind.operationFind", [
    'bottoms' => $bottoms ,
    'operations' => $operations ,
    'username' => $username ,
    'personals' => $personals ,
]);

}

public function operationFindSearchPersonal($username, Request $request){
  $bottoms = Bottom::where("id", 1)->get() ;
  $operations = Operation::where("student_id", $request->input('search'))->orWhere('address', $request->input('search'))->get() ;
  $personals = Personal::where("username", $username)->get();

  return view("operation.operationFind.operationFind", [
    'bottoms' => $bottoms ,
    'operations' => $operations ,
    'username' => $username ,
    'personals' => $personals ,
]);

}


public function contactPersonal($username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $contacts = Contact::where("id", 1)->get() ;
  $personals = Personal::where("username", $username)->get();

  return view("contactDepartment.contact", [
    'bottoms' => $bottoms ,
    'contacts' => $contacts ,
    'username' => $username ,
    'personals' => $personals ,
]);

}


public function newsDetailPersonal($id, $username){ 
  $bottoms = Bottom::where("id", 1)->get() ;
  $news = news::where("id", $id)->get() ;
  $personals = Personal::where("username", $username)->get();

  return view("aboutDepartment.news.newsDetail", [
    'bottoms' => $bottoms ,
    'news' => $news ,
    'username' => $username ,
    'personals' => $personals ,
]);

}


public function newsPersonal($username){ 
  $bottoms = Bottom::where("id", 1)->get() ;
  $news = News::where("status", 2)->get() ;
  $personals = Personal::where("username", $username)->get();

  return view("aboutDepartment.news.news", [
    'bottoms' => $bottoms ,
    'news' => $news ,
    'username' => $username ,
    'personals' => $personals ,
]);

}


public function activityImageDetailPersonal($id, $username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $activitys = Activity::where("id", $id)->get() ;
  $personals = Personal::where("username", $username)->get();


  return view("activity.activity_image.activity_image_detail", [
    'bottoms' => $bottoms ,
    'activitys' => $activitys ,
    'username' => $username ,
    'personals' => $personals ,
]);

}


public function personalDetailPersonal($id, $username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $personalss = Personal::where("id",$id)->get() ;
  $personals = Personal::where("username", $username)->get();


  return view("personal.personal.personal-detail", [
    'bottoms' => $bottoms ,
    'personalss' => $personalss ,
    'username' => $username ,
    'personals' => $personals ,
]);

}

public function researchNewsDetailPersonal($id, $username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $personals = Personal::where("username", $username)->get();
  $researchs = ResearchNews::where("id", $id)->get() ;

  return view("research.researchNews.researchNewsDetail", [
    'bottoms' => $bottoms ,
    'researchs' => $researchs ,
    'username' => $username ,
    'personals' => $personals ,
]);

}


public function researchFindDetailPersonal($id , $username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $researchs = Research::where("id", $id)->get() ;

  $teacher1 = Research::where("id", $id)->pluck('teacherid_one') ;
  $teacher2 = Research::where("id", $id)->pluck('teacherid_two') ;
  $teacher3 = Research::where("id", $id)->pluck('teacherid_three') ;
  
  if( $teacher3[0] == ''){
    $wait3 = "" ;
  }
  else{
    $wait3 = $teacher3[0] ;
  }

  

  $name_teacher1 = Personal::where("id", $teacher1[0])->pluck('name_thai');
  $name_teacher2 = Personal::where("id", $teacher2[0])->pluck('name_thai');
  $name_teacher3 = Personal::where("id", $wait3)->pluck('name_thai');

  

  /*
  if( $name_teacher3[0] == ''){
    $wait4 = "" ;
  }
  else{
    $wait4 = $name_teacher3[0] ;
  }
  */

  $personals = Personal::where("username", $username)->get();


  return view("research.researchFind.researchFindDetail", [
    'bottoms' => $bottoms ,
    'researchs' => $researchs ,
    'teacher1' => $name_teacher1[0] , 
    'teacher2' => $name_teacher2[0] ,
    'teacher3s' => $name_teacher3,
    'username' => $username ,
    'personals' => $personals ,
]);

}

public function operationFindDetailPersonal($id, $username) { 
  $bottoms = Bottom::where("id", 1)->get() ;
  $operations = Operation::where("id", $id)->get() ;
  $user_id = Operation::where("id", $id)->pluck('user_id') ;
  $operationuploads = Operationupload::where("user_id", $user_id)->get() ;
  $personals = Personal::where("username", $username)->get();


  return view("operation.operationFind.operationFindDetail", [
    'bottoms' => $bottoms ,
    'operations' => $operations ,
    'operationuploads' => $operationuploads ,
    'username' => $username ,
    'personals' => $personals ,

]);

}


}