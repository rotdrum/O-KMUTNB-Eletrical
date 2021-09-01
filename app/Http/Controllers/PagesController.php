<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
use Carbon\Carbon as time;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /* 
    ! หน้าแรก */
    public function forgotPassword() {
      $bottoms = Bottom::where("id", 1)->get() ;
        return view("auth.forgotPassword", [
          'bottoms' => $bottoms ,
      ]);
    }

    public function setPassword() {
      $bottoms = Bottom::where("id", 1)->get() ;
        return view("auth.setPassword", [
          'bottoms' => $bottoms ,
      ]);
    }

    public function postsetpassword(Request $request) {

      if( $request->input("password_a") == $request->input("password_b")  ) {
        
        $model = User::findOrFail($request->input("id"));
    
        $model->update([
            'status' => 1 ,
            'password' => Hash::make($request->input("password_a"))
        ]);
        
        return redirect()->route('index');
      }
      else{
        return redirect()->route('setPassword');
      }

    }

    /* 
    ! หน้าแรก */
    public function index(){ 
        $bottoms = Bottom::where("id", 1)->get() ;
        $news = News::where("status", 2)->get();
        $banners = Banner::get() ;


        return view("home", [
          'bottoms' => $bottoms ,
          'news' => $news ,
          'banners' => $banners ,
      ]);
    }
    public function editProfile(){ 
        $bottoms = Bottom::where("id", 1)->get() ;
        return view("auth.editProfile", [
          'bottoms' => $bottoms ,
      ]);

    }


    /* 
    ! เกี่ยวกับภาควิชา */
    public function aboutDepartment(){ 
        $bottoms = Bottom::where("id", 1)->get() ;
        $storys = Story::orderBy('year', 'asc')->get() ;

        return view("aboutDepartment.about.aboutDepartment", [
          'bottoms' => $bottoms ,
          'storys' => $storys ,

      ]);

    }
    public function mission(){ 
        $bottoms = Bottom::where("id", 1)->get() ;
        $abouts = About::get() ;

        return view("aboutDepartment.mission.mission", [
          'bottoms' => $bottoms ,
          'abouts' => $abouts ,

      ]);

    }
    public function news(){ 
        $bottoms = Bottom::where("id", 1)->get() ;
        $news = News::where("status", 2)->get() ;

        return view("aboutDepartment.news.news", [
          'bottoms' => $bottoms ,
          'news' => $news ,
          
      ]);

    }
    public function newsDetail($id){ 
        $bottoms = Bottom::where("id", 1)->get() ;
        $news = news::where("id", $id)->get() ;

        return view("aboutDepartment.news.newsDetail", [
          'bottoms' => $bottoms ,
          'news' => $news ,

      ]);

    }
    public function symbol(){ 
        $bottoms = Bottom::where("id", 1)->get() ;
        $emblems = Emblem::get() ;

        return view("aboutDepartment.symbol.symbol", [
          'bottoms' => $bottoms ,
          'emblems' => $emblems ,
          
      ]);

    }
    public function structure(){ 
        $bottoms = Bottom::where("id", 1)->get() ;
        $structures = Structure::where("id", 1)->get() ;

        
        return view("aboutDepartment.structure.structure", [
          'bottoms' => $bottoms ,
          'structures' => $structures ,

      ]);
      
    }
    /* 
    ! กิจกรรมภาควิชา */
    public function activityImage() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        return view("activity.activity_image.activity_image", [
          'bottoms' => $bottoms ,
      ]);

    }
    public function activityImageDetail($id) { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $activitys = Activity::where("id", $id)->get() ;
        return view("activity.activity_image.activity_image_detail", [
          'bottoms' => $bottoms ,
          'activitys' => $activitys ,
      ]);

    }
    public function activityVideo() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        return view("activity.activity_video.activity_video", [
          'bottoms' => $bottoms ,
      ]);

    }
    public function idkYoutube() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        return view("activity.activity_video.idk_youtube", [
          'bottoms' => $bottoms ,
      ]);

    }
    public function activity() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $activityvideos = Activityvideo::get() ;
        $activitys = Activity::where("status", 2)->get() ;

        return view("activity.activity", [
          'bottoms' => $bottoms ,
          'activityvideos' => $activityvideos ,
          'activitys' => $activitys ,
      ]);

    }
    /* 
    ! บุคลากร */
    public function personal() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $personalss = Personal::get() ;

        return view("personal.personal.personal", [
          'bottoms' => $bottoms ,
          'personalss' => $personalss ,
      ]);

    }
    public function personalDetail($id) { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $personalss = Personal::where("id",$id)->get() ;

        return view("personal.personal.personal-detail", [
          'bottoms' => $bottoms ,
          'personalss' => $personalss ,
      ]);

    }
    /* 
    ! หลักสูตร */
    public function industry() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $industrys = Industry::get() ;

        return view("course.industry.industry", [
          'bottoms' => $bottoms ,
          'industrys' => $industrys ,
      ]);

    }
    public function engineer() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $engineers = Engineer::get() ;

        return view("course.engineer.engineer", [
          'bottoms' => $bottoms ,
          'engineers' => $engineers ,

      ]);

    }
    public function engineerMaster() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $engineermasters = Engineermaster::get() ;

        return view("course.engineer-master.engineer-master", [
          'bottoms' => $bottoms ,
          'engineermasters' => $engineermasters ,
      ]);

    }
    /* 
    ! ปริญญานิพนธ์ */
    public function researchNews() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $researchs = ResearchNews::get() ;

        return view("research.researchNews.researchNews", [
          'bottoms' => $bottoms ,
          'researchs' => $researchs ,

      ]);

    }
    public function researchNewsDetail($id) { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $researchs = ResearchNews::where("id", $id)->get() ;

        return view("research.researchNews.researchNewsDetail", [
          'bottoms' => $bottoms ,
          'researchs' => $researchs ,

      ]);

    }
    public function researchMethod() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $researchpics = Researchpic::where("id", 1)->get() ;

        return view("research.researchMethod.researchMethod", [
          'bottoms' => $bottoms ,
          'researchpics' => $researchpics ,

      ]);

    }
    public function researchFind() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        /*
        $researchs = Research::select('research_id')->distinct()->where("status", 2)->get() ;
*/        
      
      $researchs = Research::where("status", 2)
      ->orderBy("year", "desc")
      ->orderBy("research_id", "asc")
      ->orderBy("created_at", "desc")
      ->get() ;

$personalss = Personal::get() ;


        return view("research.researchFind.researchFind", [
          'bottoms' => $bottoms ,
          'researchs' => $researchs ,
          'personalss' => $personalss ,
      ]);

    }

    public function researchFindSearch(Request $request) { 
      $personalss = Personal::get() ;

      $search = $request->input('search');
      $bottoms = Bottom::where("id", 1)->get() ;
      $researchs = Research::where("status", 2)
      ->where(function($query) use ($search){
        $query->where("student_one", $search)
        ->orWhere("student_two", $search)
        ->orWhere("year", $search)
        ->orWhere("thai_name", $search);
      })
      ->get() ;

   


      return view("research.researchFind.researchFind", [
        'bottoms' => $bottoms ,
        'researchs' => $researchs ,
        'personalss' => $personalss ,


    ]);

  }

  public function researchFindSearchSelect(Request $request) { 

    $personals = Personal::get() ;

    $search = $request->input('teacher');
    $bottoms = Bottom::where("id", 1)->get() ;
    $researchs = Research::where("status", 2)
    ->where("file_type", $request->input('file_type'))
    ->where(function($query) use ($search){
      $query->where("teacherid_one", $search)
      ->orWhere("teacherid_two", $search);
    })
    ->get() ;


    return view("research.researchFind.researchFind", [
      'bottoms' => $bottoms ,
      'researchs' => $researchs ,
      'personals' => $personals ,
  ]);

}



  
    public function researchFindDetail($id) { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $researchs = Research::where("id", $id)->get() ;
        $teacher1 = Research::where("id", $id)->pluck('teacherid_one') ;
        $teacher2 = Research::where("id", $id)->pluck('teacherid_two') ;
        $teacher3 = Research::where("id", $id)->pluck('teacherid_three') ;

        $name_teacher1 = Personal::where("id", $teacher1[0])->pluck('name_thai');
        $name_teacher2 = Personal::where("id", $teacher2[0])->pluck('name_thai');
        $name_teacher3 = Personal::where("id", $teacher3[0])->pluck('name_thai');



        return view("research.researchFind.researchFindDetail", [
          'bottoms' => $bottoms ,
          'researchs' => $researchs ,
          'teacher1' => $name_teacher1[0] , 
          'teacher2' => $name_teacher2[0] ,
          'teacher3s' => $name_teacher3 ,

      ]);

    }
    public function researchManage() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $researchs = Research::where("student_one", Auth::user()->tname.Auth::user()->fname." ".Auth::user()->lname)->get() ;

        return view("research.researchManage.researchManage", [
          'bottoms' => $bottoms ,
          'researchs' => $researchs ,
      ]);

    }
    public function researchManage_Add() { 

      
        $bottoms = Bottom::where("id", 1)->get() ;
        $personals = Personal::get() ;
        $researchs = Research::where("student_one", Auth::user()->tname.Auth::user()->fname." ".Auth::user()->lname)->get() ;


        return view("research.researchManage.researchManage_Add", [
          'bottoms' => $bottoms ,
          'personals' => $personals ,
          'researchs' => $researchs ,

      ]);

    }

    public function postresearchManageAdd(Request $request){ 
      $research = Research::get() ;
      $year = Number::where("id", 1)->pluck('number') ;
      $number_to = Number::where("id", 3)->pluck('number') ;

      
      $randomString = str_random(25);


      $file = $request->file('file_name');
      $filename = $randomString.".{$file->extension()}";
      $file->storeAs("public/research/", $filename);


  
        Research::create([
          'research_id' =>  $year[0].$number_to[0]  ,
          'research_type' =>  $request->input('research_type') ,
          'format' =>  $request->input('format') ,
          'thai_name' =>  $request->input('thai_name') ,
          'eng_name' =>  $request->input('eng_name') ,
          'year' =>  $request->input('year') ,
          'term' =>  $request->input('term') ,
          'class' =>  $request->input('class') ,
          'teacherid_one' =>  $request->input('teacherid_one') ,
          'teacherid_two' =>   $request->input('teacherid_two') ,
          'teacherid_three' =>  $request->input('teacherid_three') ,
          'teachername_two' =>  "" ,
          'teachername_three' =>  "" ,
          'student_one' =>  $request->input('student_one') ,
          'student_two' =>  $request->input('student_two') ,
          'student_three' =>   $request->input('student_three') ,
          'file_type' =>  $request->input('file_type') ,
          'file_name' =>  $filename ,
          'status' =>  1 ,
          'research_look' =>  $request->input('research_look') ,
          ]);

          $mytime=time::now()->format('Y') ;
          // $date=$mytime->toRfc850String();
          // $today= substr($date, 0, strrpos($date, ","));
          // dd($mytime - 1957);

        if(($mytime - 1957) == $year[0]){    
            $model = Number::findOrFail(3);
        
            $model->update([
                'number' => $number_to[0] + 1 ,
            ]);
        }
        else{
          $model = Number::findOrFail(3);
        
          $model->update([
              'number' => 101 ,
          ]);

          $model = Number::findOrFail(1);
        
          $model->update([
              'number' => $mytime - 1957 ,
          ]);
          
        }

      return redirect()->route('researchManage');
    }


    public function postresearchManageAdd2(Request $request){ 
      
      $randomString = str_random(25);

      $file = $request->file('file_name');
      $filename = $randomString.".{$file->extension()}";
      $file->storeAs("public/research/", $filename);

  
        Research::create([
          'research_id' =>  $request->input('research_id')  ,
          'research_type' =>  $request->input('research_type') ,
          'format' =>  $request->input('format') ,
          'thai_name' =>  $request->input('thai_name') ,
          'eng_name' =>  $request->input('eng_name') ,
          'year' =>  $request->input('year') ,
          'term' =>  $request->input('term') ,
          'class' =>  $request->input('class') ,
          'teacherid_one' =>  $request->input('teacherid_one') ,
          'teacherid_two' =>   $request->input('teacherid_two') ,
          'teacherid_three' =>   $request->input('teacherid_three') ,
          'teachername_two' =>  "" ,
          'teachername_three' =>  "" ,
          'student_one' =>  $request->input('student_one') ,
          'student_two' =>  $request->input('student_two') ,
          'student_three' =>  $request->input('student_three') ,
          'file_type' =>  $request->input('file_type') ,
          'file_name' =>  $filename ,
          'status' =>  1 ,
          'research_look' =>  $request->input('research_look') ,
          ]);


      return redirect()->route('researchManage');
    }


    public function researchManage_Edit() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        return view("research.researchManage.researchManage_Edit", [
          'bottoms' => $bottoms ,
      ]);

    }
    /* 
    ! ปริญญานิพนธ์ */
    public function operationMethod() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $operation_methods = Operation_method::where("id", 1)->get() ;
        return view("operation.operationMethod.operationMethod", [
          'bottoms' => $bottoms ,
          'operation_methods' => $operation_methods ,
      ]);

    }
    /* 
    ! สหกิจศึกษา */
    public function operationFind() { 
        
        $bottoms = Bottom::where("id", 1)->get() ;
        $operations = Operation::get() ;

        return view("operation.operationFind.operationFind", [
          'bottoms' => $bottoms ,
          'operations' => $operations ,
      ]);

    }
    
    public function operationFindSearch(Request $request){
      $bottoms = Bottom::where("id", 1)->get() ;
      $operations = Operation::where("student_id", $request->input('search'))->orWhere('address', $request->input('search'))->get() ;

      return view("operation.operationFind.operationFind", [
        'bottoms' => $bottoms ,
        'operations' => $operations ,
    ]);

  }



    public function operationFindDetail($id) { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $operations = Operation::where("id", $id)->get() ;
        $user_id = Operation::where("id", $id)->pluck('user_id') ;
        $operationuploads = Operationupload::where("user_id", $user_id)->get() ;


        return view("operation.operationFind.operationFindDetail", [
          'bottoms' => $bottoms ,
          'operations' => $operations ,
          'operationuploads' => $operationuploads ,


      ]);

    }
    public function operationManage() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $operations = Operation::where("user_id", Auth::user()->id)->get() ;

        return view("operation.operationManage.operationManage", [
          'bottoms' => $bottoms ,
          'operations' => $operations ,

      ]);
    }

    public function postoperationManageAdd(Request $request){
      Operation::create([
        'url' =>  $request->input('url') ,
        'student_id' =>  $request->input('student_id') ,
        'student_name' =>  $request->input('student_name') ,
        'sub' =>  $request->input('sub') ,
        'tel' =>  $request->input('tel') ,
        'email' =>  $request->input('email') ,
        'address' =>  $request->input('address') ,
        'type_address' =>  $request->input('type_address') ,
        'date_start' =>  $request->input('day_start')."-".$request->input('month_start')."-".$request->input('year_start') ,
        'date_end' =>   $request->input('day_end')."-".$request->input('month_end')."-".$request->input('year_end') ,
        'name_to' =>  $request->input('name_to') ,
        'name_subport' =>  $request->input('name_subport') ,
        'tel_subport' =>  $request->input('tel_subport') ,
        'user_id' =>  $request->input('user_id') ,
      ]);
      return redirect()->route('operationManage');
    }

    public function postoperationManageEdit(Request $request){
      $model = Operation::findOrFail($request->input('id'));
   
      $model->update([
          'url' => $request->input('url') ,
          'student_id' => $request->input('student_id') ,
          'student_name' => $request->input('student_name') ,
          'sub' => $request->input('sub') ,
          'tel' => $request->input('tel') ,
          'email' => $request->input('email') ,
          'address' => $request->input('address') ,
          'type_address' => $request->input('type_address') ,
          'date_start' => $request->input('date_start') ,
          'date_end' => $request->input('date_end') ,
          'name_to' => $request->input('name_to') ,
          'name_subport' => $request->input('name_subport') ,
          'tel_subport' => $request->input('tel_subport') ,
          'user_id' => $request->input('user_id') ,
      ]);

      return redirect()->route('operationManage');
    }


    public function operationUpload() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $operationuploads = Operationupload::where("user_id", Auth::user()->id )->get() ;


        return view("operation.operationUpload.operationUpload", [
          'bottoms' => $bottoms ,
          'operationuploads' => $operationuploads ,

      ]);

    }

    public function postoperationUpload(Request $request){


      $randomString = str_random(25);


      $file = $request->file('file_pic');
      $filename = $randomString.".{$file->extension()}";
      $file->storeAs("public/operation_upload/", $filename);

      Operationupload::create([
        'name_type' =>  $request->input('name_type') ,
        'name_file' =>  $filename ,
        'user_id' =>  Auth::user()->id ,
      ]);
      return redirect()->route('operationUpload');
    }


    /* 
    ! ติดต่อ */
    public function contact() { 
        $bottoms = Bottom::where("id", 1)->get() ;
        $contacts = Contact::where("id", 1)->get() ;
        return view("contactDepartment.contact", [
          'bottoms' => $bottoms ,
          'contacts' => $contacts ,

      ]);

    }


}
