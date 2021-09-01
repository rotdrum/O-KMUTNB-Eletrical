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




class AdminController extends Controller
{
    public function __construct(){}

    /* 
    ! จัดการข้อมูลนักศึกษา */
    public function manageStudent() {
      $bottoms = Bottom::where("id", 1)->get() ;
      $users = User::get() ;

            return view("auth.manageStudent", [
              'bottoms' => $bottoms ,
              'users' => $users ,

          ]);
    }

    public function manageStudentSearch(Request $request) {
      $bottoms = Bottom::where("id", 1)->get() ;
      $users = User::where("username", $request->input('search'))
      ->Orwhere("email", $request->input('search'))
      ->get() ;

            return view("auth.manageStudent", [
              'bottoms' => $bottoms ,
              'users' => $users ,

          ]);
    }


    public function manageTeacher() {
      $bottoms = Bottom::where("id", 1)->get() ;
      $users = Personal::get() ;

            return view("auth.manageTeacher", [
              'bottoms' => $bottoms ,
              'users' => $users ,

          ]);
    }

    public function manageTeacherSearch(Request $request) {
      $bottoms = Bottom::where("id", 1)->get() ;
      $users = Personal::where("username", $request->input('search'))
      ->Orwhere("email", $request->input('search'))
      ->get() ;

            return view("auth.manageTeacher", [
              'bottoms' => $bottoms ,
              'users' => $users ,

          ]);
    }


    
    public function manageStudentAdd() {
      $bottoms = Bottom::where("id", 1)->get() ;
            return view("auth.manageStudent_Add", [
              'bottoms' => $bottoms ,
          ]);
    }
    public function manageStudentEdit($id) {
      $bottoms = Bottom::where("id", 1)->get() ;
      $users = User::where("id", $id)->get() ;

            return view("auth.manageStudent_Edit", [
              'bottoms' => $bottoms ,
              'users' => $users ,

          ]);
    }


    public function manageStudentDelete($id) {
      $model = User::findOrFail($id);
      $model->delete();

      return redirect()->route('manageStudent');
    }



    public function postmanageStudentEdit(Request $request)
    {
  
      $model = User::findOrFail($request->input('id'));
    
      $model->update([
          'tname' => $request->input('tname') ,
          'fname' => $request->input('fname') ,
          'lname' => $request->input('lname') ,
          'sub' => $request->input('sub') ,
          'email' => $request->input('email') ,
          'tel' => $request->input('tel') ,

      ]);

      return redirect()->route('manageStudent');

    }


    public function manageTeacherUser($id) {
      $bottoms = Bottom::where("id", 1)->get() ;
      $personals = Personal::where("id", $id)->get() ;

            return view("auth.manageTeacher_User", [
              'bottoms' => $bottoms ,
              'personals' => $personals ,
          ]);
    }

    public function postSetTeacherUser(Request $request)
    {
      $model = Personal::findOrFail($request->input('id'));
    
      $model->update([
          'username' => $request->input('username') ,
          'password' => Hash::make($request->input('password'))
      ]);

      return redirect()->route('manageTeacher');

    }

    public function changestatus($id) {
      /*
      $model = User::findOrFail($id);
    
      $model->update([
          'status' => 2 ,
          'password' => Hash::make("Kmutnb_1234")

      ]);
      */
      $bottoms = Bottom::where("id", 1)->get() ;
      $users = User::where("id", $id)->get() ;


      
      return view("auth.manageStudent_User", [
        'bottoms' => $bottoms ,
        'users' => $users ,
    ]);
    }


    public function postResetPassword(Request $request)
    {
      $model = User::findOrFail($request->input('id'));
    
      $model->update([
          'status' => 2 ,
          'password' => Hash::make($request->input('password')) ,

      ]);

      return redirect()->route('manageStudent');

    }


    public function indexAdmin(){ 
        $bottoms = Bottom::where("id", 1)->get() ;
        $news = News::where("status", 2)->get() ;
        $banners = Banner::get() ;

        return view("admin-home", [
          'bottoms' => $bottoms ,
          'news' => $news ,
          'banners' => $banners ,
      ]);
    }

     /*
    ! login - About
        TODO ผู้ดูแลระบบ */
        public function adminlogin(Request $request){ 
            $username = $request->input('username');
            $password = $request->input('password');
           
            $userPersonal = Personal::where("username",  $request->input('username') )->pluck('username') ;
            $passPersonal = Personal::where("username",  $request->input('username') )->pluck('password') ;



                if($username=='admin' && $password=='kmutnb'){
                    return redirect()->route('indexAdmin');
                }
                else if($username=='drumzioo' && $password=='drumzioo'){
                    return redirect()->route('indexAdmin');
                }
                else if($username==$userPersonal[0] && Hash::check($password, $passPersonal[0])){
                    return redirect()->route('indexPersonal', $username);
                }
                else {
                    return redirect()->route('index');
                }
        }

        public function bottompost(Request $request)
        {

            if($request->input('row') == 1){
                $model = Bottom::findOrFail(1);
    
                $model->update([
                    'office' => $request->input('office') ,
                    'layer' => $request->input('layer') 
                ]);
            }
            else if($request->input('row') == 2){
                $model = Bottom::findOrFail(1);
    
                $model->update([
                    'department' => $request->input('department') 
                ]);
            }
            else if($request->input('row') == 3){
                $model = Bottom::findOrFail(1);
    
                $model->update([
                    'faculty' => $request->input('faculty') 
                ]);
            }
            else if($request->input('row') == 4){
                $model = Bottom::findOrFail(1);
    
                $model->update([
                    'tel' => $request->input('tel') 
                ]);
            }
            else if($request->input('row') == 5){
                $model = Bottom::findOrFail(1);
    
                $model->update([
                    'email' => $request->input('email') 
                ]);
            }

            return redirect()->route('indexAdmin');
        }

        public function bannerpost(Request $request)
        {
          /*
          $fnameones = Banner::where("fname",  $request->input('file') )->pluck('fname') ;

          $y = "public/".$y[0];
          Storage::deleteDirectory($y);

          dd($request->file('file'));

          */

          $file = $request->file('file');
          $filename = "banner".$request->input('id').".{$file->extension()}";
          $file->storeAs("public/banner/", $filename);

          $model = Banner::findOrFail($request->input('id'));
          if( empty($request->input('url')) ){
            $model->update([
              'file' => $filename ,
              'url' => "#"
            ]);
          }
          else{
            $model->update([
              'file' => $filename ,
              'url' => $request->input('url') 
            ]);
          }
        
          
          return redirect()->route('indexAdmin');
        }
    
    /* 

    /*
    ! เกี่ยวกับภาควิชา - About Department
        TODO เกี่ยวกับภาควิชา */
        public function aboutDepartment_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $storys = Story::orderBy('year')->get() ;

            return view("aboutDepartment.about.admin-aboutDepartment", [
              'bottoms' => $bottoms ,
              'storys' => $storys ,

          ]);
        }
        public function aboutDepartment_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("aboutDepartment.about.admin-aboutDepartment_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function aboutDepartment_Edit($id){
            $bottoms = Bottom::where("id", 1)->get() ;
            $storys = Story::where("id", $id)->get() ;

            return view("aboutDepartment.about.admin-aboutDepartment_Edit", [
              'bottoms' => $bottoms ,
              'storys' => $storys ,

          ]);
        }
        
      public function aboutDepartmentDelete($id){
          $model = Story::findOrFail($id);
          $model->delete();

          return redirect()->route('aboutDepartment_Admin');
      }

        public function postaboutDepartmentAdd(Request $request){ 

          Story::create([
              'year' => $request->post('year'),
              'title' => $request->post('title'),
              'comment' => $request->post('comment'),
            ]);
            return redirect()->route('aboutDepartment_Admin');
       
        }

        public function postaboutDepartmentEdit(Request $request){ 
          $model = Story::findOrFail($request->input('id'));
          $model->update([
            'year' => $request->input('year') ,
            'title' => $request->input('title') ,
            'comment' => $request->input('comment') ,
          ]);

          return redirect()->route('aboutDepartment_Admin');
       
        }

        /* 
        TODO พันธกิจ วิสัยทัศน์ */
        public function mission_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $abouts = About::get() ;
            
            return view("aboutDepartment.mission.admin-mission", [
              'bottoms' => $bottoms ,
              'abouts' => $abouts ,

          ]);
        }
        public function mission_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("aboutDepartment.mission.admin-mission_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function mission_Edit($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $abouts = About::where("id", $id)->get() ;

            return view("aboutDepartment.mission.admin-mission_Edit", [
              'bottoms' => $bottoms ,
              'abouts' => $abouts ,

          ]);
        }

        public function missionDelete($id){
          $model = About::findOrFail($id);
          $model->delete();

          return redirect()->route('mission_Admin');
      }

        public function postmissionAdd(Request $request){ 
          $randomString = str_random(25);

          $pic = $request->file('pic');
          $picname = $randomString.".{$pic->extension()}";
          $pic->storeAs("public/about/", $picname);

          About::create([
              'pic' => $picname,
              'title' =>  $request->post('title'),
              'comment' => $request->post('comment'),
            ]);
            return redirect()->route('mission_Admin');
       
        }

        public function postmissionEdit(Request $request){ 
          $randomString = str_random(25);
          $model = About::findOrFail($request->input('id'));

          if(empty($request->file('pic'))){
            $model->update([
              'title' =>  $request->post('title'),
              'comment' => $request->post('comment'),
            ]);
          }
          else{
            $pic = $request->file('pic');
            $picname = $randomString.".{$pic->extension()}";
            $pic->storeAs("public/about/", $picname);

            $model->update([
              'pic' => $picname,
              'title' =>  $request->post('title'),
              'comment' => $request->post('comment'),
            ]);
          }  
          return redirect()->route('mission_Admin');
       
        }
        
        /* 
        TODO ข่าวประชาสัมพันธ์ */
        public function news_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $news = News::where("status", 2)->get() ;

            return view("aboutDepartment.news.admin-news", [
              'bottoms' => $bottoms ,
              'news' => $news ,

          ]);
        }
        public function news_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("aboutDepartment.news.admin-news_Add", [
              'bottoms' => $bottoms ,
          ]);
        }

      public function postnewsAdd(Request $request){ 
        
        $request->validate([
          
        ]);

        $randomString = str_random(25);

        if(empty($request->file('pic'))){
          $picname = "";
        }
        else{
          $pic = $request->file('pic');
          $picname = $randomString.".{$pic->extension()}";
          $pic->storeAs("public/news/pic/", $picname);
        }
        
        if(empty($request->file('file'))){
          $filename = "";
        }
        else{
          $file = $request->file('file');
          $filename = $randomString.".{$file->extension()}";
          $file->storeAs("public/news/file/", $filename);
        }

        if(isset($_POST['save']))
        {
          if( empty($request->post('filecomment')) and empty($request->post('url'))){
            News::create([
              'title' => $request->post('title'),
              'comment' => $request->post('comment'),
              'pic' => $picname,
              'file' => $filename,
              'filecomment' => "",
              'url' => "",
              'status' => "1",          
            ]);
          }
          else if(empty($request->post('filecomment'))){
            News::create([
              'title' => $request->post('title'),
              'comment' => $request->post('comment'),
              'pic' => $picname,
              'file' => $filename,
              'filecomment' => "",
              'url' => $request->post('url'),
              'status' => "1",          
            ]);
          }
          else if( empty($request->post('url'))){
            News::create([
              'title' => $request->post('title'),
              'comment' => $request->post('comment'),
              'pic' => $picname,
              'file' => $filename,
              'filecomment' => $request->post('filecomment'),
              'url' => "",
              'status' => "1",          
            ]);
          }
          else{
            News::create([
              'title' => $request->post('title'),
              'comment' => $request->post('comment'),
              'pic' => $picname,
              'file' => $filename,
              'filecomment' => $request->post('filecomment'),
              'url' => $request->post('url'),
              'status' => "1",          
            ]);
          }
         
          return redirect()->route('news_Temp');
        }
        else if(isset($_POST['post']))
        {
          
          if( empty($request->post('filecomment')) and empty($request->post('url'))){
            News::create([
              'title' => $request->post('title'),
              'comment' => $request->post('comment'),
              'pic' => $picname,
              'file' => $filename,
              'filecomment' => "",
              'url' => "",
              'status' => "2",          
            ]);
          }
          else if(empty($request->post('filecomment'))){
            News::create([
              'title' => $request->post('title'),
              'comment' => $request->post('comment'),
              'pic' => $picname,
              'file' => $filename,
              'filecomment' => "",
              'url' => $request->post('url'),
              'status' => "2",          
            ]);
          }
          else if( empty($request->post('url'))){
            News::create([
              'title' => $request->post('title'),
              'comment' => $request->post('comment'),
              'pic' => $picname,
              'file' => $filename,
              'filecomment' => $request->post('filecomment'),
              'url' => "",
              'status' => "2",          
            ]);
          }
          else{
            News::create([
              'title' => $request->post('title'),
              'comment' => $request->post('comment'),
              'pic' => $picname,
              'file' => $filename,
              'filecomment' => $request->post('filecomment'),
              'url' => $request->post('url'),
              'status' => "2",          
            ]);

          }
      
          return redirect()->route('indexAdmin');
        }
      }

        public function news_Edit($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $news = News::where("id", $id)->get() ;

            return view("aboutDepartment.news.admin-news_Edit", [
              'bottoms' => $bottoms ,
              'news' => $news ,
          ]);
        }

        public function updatestatusNews($id){ 
          $model = News::findOrFail($id);
          $model->update([
            'status' => 2 ,
          ]);
          return redirect()->route('news_Temp');
        }

        public function deleteindexNews($id){ 
          $model = News::findOrFail($id);
          $model->delete();
          return redirect()->route('indexAdmin');
        }

        public function deleteNews($id){ 
          $model = News::findOrFail($id);
          $model->delete();
          return redirect()->route('news_Admin');
        }

        public function deleteTempNews($id){ 
          $model = News::findOrFail($id);
          $model->delete();
          return redirect()->route('news_Temp');
        }

        public function postnewsEdit(Request $request, $id){ 
          $randomString = str_random(25);
          $model = News::findOrFail($id);

          if(empty($request->input('filecomment'))){
            $filecomment = "" ;
          }
          else{
            $filecomment = $request->input('filecomment');
          }

          if(empty($request->input('url'))){
            $url = "" ;
          }
          else{
            $url = $request->input('url')  ;
          }


          if( empty($request->file('pic')) and empty($request->file('file')) ){
            $model->update([
                'title' => $request->input('title') ,
                'comment' => $request->input('comment') ,
                'filecomment' => $filecomment  ,
                'url' => $url  ,
            ]);
            return redirect()->route('news_Edit', $id);
          }
          else if(empty($request->file('pic'))){
            $file = $request->file('file');
            $filename = $randomString.".{$file->extension()}";
            $file->storeAs("public/news/file/", $filename);
            $model->update([
              'title' => $request->input('title') ,
              'comment' => $request->input('comment') ,
              'file' => $filename,
              'filecomment' => $filecomment  ,
              'url' => $url  ,
            ]);
            return redirect()->route('news_Edit', $id);

          }
          else if(empty($request->file('file'))){
            $pic = $request->file('pic');
            $picname = $randomString.".{$pic->extension()}";
            $pic->storeAs("public/news/pic/", $picname);
            $model->update([
              'title' => $request->input('title') ,
              'comment' => $request->input('comment') ,
              'pic' => $picname,
              'filecomment' => $filecomment  ,
              'url' => $url  ,
            ]);
            return redirect()->route('news_Edit', $id);

          }
          else{
            $file = $request->file('file');
            $filename = $randomString.".{$file->extension()}";
            $file->storeAs("public/news/file/", $filename);
            $pic = $request->file('pic');
            $picname = $randomString.".{$pic->extension()}";
            $pic->storeAs("public/news/pic/", $picname);
            $model->update([
              'title' => $request->input('title') ,
              'comment' => $request->input('comment') ,
              'pic' => $picname,
              'file' => $filename,
              'filecomment' => $filecomment  ,
              'url' => $url  ,
            ]);
            return redirect()->route('news_Edit', $id);

          }
          
      }
      
        public function news_Temp(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $news = News::where("status", 1)->get() ;

            
            return view("aboutDepartment.news.admin-news_Temp", [
              'bottoms' => $bottoms ,
              'news' => $news ,
          ]);
        }
        /*
        TODO สัญลักษณ์ */
        public function symbol_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $emblems = Emblem::get() ;

            return view("aboutDepartment.symbol.admin-symbol", [
              'bottoms' => $bottoms ,
              'emblems' => $emblems ,

          ]);
        }
        public function symbol_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("aboutDepartment.symbol.admin-symbol_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function symbol_Edit($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $emblems = Emblem::where("id", $id)->get() ;

            return view("aboutDepartment.symbol.admin-symbol_Edit", [
              'bottoms' => $bottoms ,
              'emblems' => $emblems ,

          ]);
        }

        public function symbolDelete($id){ 
          $model = Emblem::findOrFail($id);
          $model->delete();
          return redirect()->route('symbol_Admin');
        }

        public function postsymbolAdd(Request $request){ 
          $randomString = str_random(25);

          $pic = $request->file('pic');
          $picname = $randomString.".{$pic->extension()}";
          $pic->storeAs("public/emblem/", $picname);

          Emblem::create([
              'pic' => $picname,
              'title' =>  $request->post('title'),
              'comment' => $request->post('comment'),
            ]);
            return redirect()->route('symbol_Admin');
       
        }

        public function postsymbolEdit(Request $request){ 
          $randomString = str_random(25);
          $model = Emblem::findOrFail($request->input('id'));

       
          if(empty($request->file('pic'))){
            $model->update([
              'title' =>  $request->post('title'),
              'comment' => $request->post('comment'),
            ]);
          }
          else{
            $pic = $request->file('pic');
            $picname = $randomString.".{$pic->extension()}";
            $pic->storeAs("public/emblem/", $picname);
            $model->update([
              'pic' =>  $picname,
              'title' =>  $request->post('title'),
              'comment' => $request->post('comment'),
            ]);
          }
         
            return redirect()->route('symbol_Admin');
       
        }
        /*
        TODO โครงสร้างองค์กร */
        public function structure_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $structures = Structure::where("id", 1)->get() ;

            return view("aboutDepartment.structure.admin-structure", [
              'bottoms' => $bottoms ,
              'structures' => $structures ,
          ]);
        }
        public function structure_Edit(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $structures = Structure::where("id", 1)->get() ;

            return view("aboutDepartment.structure.admin-structure_Edit", [
              'bottoms' => $bottoms ,
              'structures' => $structures ,
          ]);
        }

        public function poststructureEdit(Request $request){ 

          if(empty($request->file('pic'))){
          
          }
          else{
            $String = "structure";
            $model = Structure::findOrFail(1);
            $pic = $request->file('pic');
            $picname = $String.".{$pic->extension()}";
            $pic->storeAs("public/structure/", $picname);
            $model->update([
              'pic' =>  $picname,
            ]);
          }
         
            return redirect()->route('structure_Admin');
       
        }
    
    /*
    ! กิจกรรมภาควิชา
        TODO กิจกรรมรูปภาพ
    */
        public function activityImage_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("activity.activity_image.admin-activity_image", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function activityImage_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("activity.activity_image.admin-activity_image_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function activityImage_Edit(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("activity.activity_image.admin-activity_image_Edit", [
              'bottoms' => $bottoms ,
          ]);
        }
        /* 
        TODO กิจกรรมวิดีโอ */
        public function activityVideo_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;

            return view("activity.activity_video.admin-activity_video", [
              'bottoms' => $bottoms ,
              
          ]);
        }
        public function activityVideo_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("activity.activity_video.admin-activity_video_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function activityVideo_Edit($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $activityvideos = Activityvideo::where("id", $id)->get() ;

            return view("activity.activity_video.admin-activity_video_Edit", [
              'bottoms' => $bottoms ,
              'activityvideos' => $activityvideos ,

          ]);
        }

        public function postactivityEdit(Request $request){ 

          $model = Activityvideo::findOrFail($request->input('id'));
          $model->update([
            'iframe' => $request->input('iframe') ,
          ]);

          return redirect()->route('activity_Admin');
       
        }
        public function activityVideoDelete($id){ 
          $model = Activityvideo::findOrFail($id);
          $model->delete();

          return redirect()->route('activity_Admin');

        }
        /*
        TODO กิจกรรม แก้ใหม่ */
        public function activity_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $activityvideos = Activityvideo::get() ;
            $activitys = Activity::where("status", 2)->get() ;


            return view("activity.admin-activity", [
              'bottoms' => $bottoms ,
              'activityvideos' => $activityvideos ,
              'activitys' => $activitys ,
          ]);
        }
        public function activity_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("activity.activity_image.admin-activity_image_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function activity_Edit($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $activitys = Activity::where("id", $id)->get() ;

            return view("activity.activity_image.admin-activity_image_Edit", [
              'bottoms' => $bottoms ,
              'activitys' => $activitys ,

          ]);
        }
        public function activity_Temp(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $activitys = Activity::where("status", 1)->get() ;

            return view("activity.activity_image.admin-activity_image_Temp", [
              'bottoms' => $bottoms ,
              'activitys' => $activitys ,

          ]);
        }


        public function postactivityAdd(Request $request){ 

          Activityvideo::create([
              'iframe' => $request->input('iframe'),
            ]);
            return redirect()->route('activity_Admin');
       
        }

       
        public function postactivityimgAdd(Request $request){ 

          $randomString = str_random(25);

          if(empty($request->file('pic'))){
            $picname = "";
          }
          else{
            $pic = $request->file('pic');
            $picname = $randomString.".{$pic->extension()}";
            $pic->storeAs("public/activity/pic/", $picname);
          }
          
          if(empty($request->file('file'))){
            $filename = "";
          }
          else{
            $file = $request->file('file');
            $filename = $randomString.".{$file->extension()}";
            $file->storeAs("public/activity/file/", $filename);
          }
  
          if(isset($_POST['save']))
          {
            if( empty($request->post('filecomment')) and empty($request->post('url'))){
              Activity::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => "",
                'url' => "",
                'status' => "1",          
              ]);
            }
            else if(empty($request->post('filecomment'))){
              Activity::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => "",
                'url' => $request->post('url'),
                'status' => "1",          
              ]);
            }
            else if( empty($request->post('url'))){
              Activity::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => $request->post('filecomment'),
                'url' => "",
                'status' => "1",          
              ]);
            }
            else{
              Activity::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => $request->post('filecomment'),
                'url' => $request->post('url'),
                'status' => "1",          
              ]);
            }
           
            return redirect()->route('activity_Temp');
          }
          else if(isset($_POST['post']))
          {
            
            if( empty($request->post('filecomment')) and empty($request->post('url'))){
              Activity::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => "",
                'url' => "",
                'status' => "2",          
              ]);
            }
            else if(empty($request->post('filecomment'))){
              Activity::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => "",
                'url' => $request->post('url'),
                'status' => "2",          
              ]);
            }
            else if( empty($request->post('url'))){
              Activity::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => $request->post('filecomment'),
                'url' => "",
                'status' => "2",          
              ]);
            }
            else{
              Activity::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => $request->post('filecomment'),
                'url' => $request->post('url'),
                'status' => "2",          
              ]);
  
            }
        
            return redirect()->route('activity_Admin');
          }


       
        }

        public function activityIndexDelete($id){

          $model = Activity::findOrFail($id);
          $model->delete();

          return redirect()->route('activity_Admin');
      }

      public function activityTempDelete($id){

        $model = Activity::findOrFail($id);
        $model->delete();

        return redirect()->route('activity_Temp');
    }

    public function activityUpdateStatus($id){

      $model = Activity::findOrFail($id);
      $model->update([
        'status' => "2" ,
      ]);

      return redirect()->route('activity_Admin');
  }

 
public function postactivityimgEdit(Request $request, $id){ 
  $randomString = str_random(25);
  $model = Activity::findOrFail($id);

  if(empty($request->input('filecomment'))){
    $filecomment = "" ;
  }
  else{
    $filecomment = $request->input('filecomment');
  }

  if(empty($request->input('url'))){
    $url = "" ;
  }
  else{
    $url = $request->input('url')  ;
  }


  if( empty($request->file('pic')) and empty($request->file('file')) ){
    $model->update([
        'title' => $request->input('title') ,
        'comment' => $request->input('comment') ,
        'filecomment' => $filecomment  ,
        'url' => $url  ,
    ]);
    return redirect()->route('activity_Edit', $id);
  }
  else if(empty($request->file('pic'))){
    $file = $request->file('file');
    $filename = $randomString.".{$file->extension()}";
    $file->storeAs("public/activity/file/", $filename);
    $model->update([
      'title' => $request->input('title') ,
      'comment' => $request->input('comment') ,
      'file' => $filename,
      'filecomment' => $filecomment  ,
      'url' => $url  ,
    ]);
    return redirect()->route('activity_Edit', $id);

  }
  else if(empty($request->file('file'))){
    $pic = $request->file('pic');
    $picname = $randomString.".{$pic->extension()}";
    $pic->storeAs("public/activity/pic/", $picname);
    $model->update([
      'title' => $request->input('title') ,
      'comment' => $request->input('comment') ,
      'pic' => $picname,
      'filecomment' => $filecomment  ,
      'url' => $url  ,
    ]);
    return redirect()->route('activity_Edit', $id);

  }
  else{
    $file = $request->file('file');
    $filename = $randomString.".{$file->extension()}";
    $file->storeAs("public/activity/file/", $filename);
    $pic = $request->file('pic');
    $picname = $randomString.".{$pic->extension()}";
    $pic->storeAs("public/activity/pic/", $picname);
    $model->update([
      'title' => $request->input('title') ,
      'comment' => $request->input('comment') ,
      'pic' => $picname,
      'file' => $filename,
      'filecomment' => $filecomment  ,
      'url' => $url  ,
    ]);
    return redirect()->route('activity_Edit', $id);

  }
  
}

    /*
    ! บุคลากร - Personal
        TODO บุคลากร */
        public function personal_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $personals = Personal::get() ;

            return view("personal.personal.admin-personal", [
              'bottoms' => $bottoms ,
              'personals' => $personals ,

          ]);
        }
        public function personal_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("personal.personal.admin-personal_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function personal_Edit($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $personals = Personal::where("id", $id)->get() ;

            return view("personal.personal.admin-personal_Edit", [
              'bottoms' => $bottoms ,
              'personals' => $personals ,
          ]);
        }

        public function postpersonalAdd(Request $request){ 

          $randomString = str_random(25);

          $file = $request->file('file_name');
          $filename = $randomString.".{$file->extension()}";
          $file->storeAs("public/personal/file/", $filename);

          $pic = $request->file('pic_name');
          $picname = $randomString.".{$pic->extension()}";
          $pic->storeAs("public/personal/pic/", $picname);

          Personal::create([
            'pic_name' => $picname ,
            'name_thai' => $request->input('name_thai') ,
            'name_eng' =>  $request->input('name_eng'),
            'position' =>  $request->input('position'),
            'initial' =>   $request->input('initial'),
            'email' =>  $request->input('email'),
            'contact' =>  $request->input('contact'),
            'tel' =>  $request->input('tel'),
            'bachelor' =>   $request->input('bachelor')."",
            'master' =>  $request->input('master')."",
            'phd' =>  $request->input('phd')."",
            'edu1' => $request->input('edu_m1')." ".$request->input('edu_s1'),
            'edu2' => $request->input('edu_m2')." ".$request->input('edu_s2'),
            'edu3' => $request->input('edu_m3')." ".$request->input('edu_s3'),
            'edu4' => $request->input('edu_m4')." ".$request->input('edu_s4'),
            'edu5' => $request->input('edu_m5')." ".$request->input('edu_s5'),
            'file_name' => $filename ,
            'username' => "",
            'password' => "",        
            'status' => 0,        
          ]);

          return redirect()->route('personal_Admin');
      }

      public function postpersonalEdit(Request $request){ 

        $randomString = str_random(25);
        $model = Personal::findOrFail($request->input('id'));

        if( empty($request->file('file_name')) and  empty($request->file('pic_name')) ){
          $model->update([
            'name_thai' => $request->input('name_thai') ,
            'name_eng' =>  $request->input('name_eng'),
            'position' =>  $request->input('position'),
            'initial' =>   $request->input('initial'),
            'email' =>  $request->input('email'),
            'contact' =>  $request->input('contact'),
            'tel' =>  $request->input('tel'),
            'bachelor' =>   $request->input('bachelor')."",
            'master' =>  $request->input('master')."",
            'phd' =>  $request->input('phd')."",
            'edu1' => $request->input('edu_s1')."",
            'edu2' => $request->input('edu_s2')."",
            'edu3' => $request->input('edu_s3')."",
            'edu4' => $request->input('edu_s4')."",
            'edu5' => $request->input('edu_s5')."",
          ]);
        }
        elseif( empty($request->file('pic_name')) ) {

          $file = $request->file('file_name');
          $filename = $randomString.".{$file->extension()}";
          $file->storeAs("public/personal/file/", $filename);

          $model->update([
            'name_thai' => $request->input('name_thai') ,
            'name_eng' =>  $request->input('name_eng'),
            'position' =>  $request->input('position'),
            'initial' =>   $request->input('initial'),
            'email' =>  $request->input('email'),
            'contact' =>  $request->input('contact'),
            'tel' =>  $request->input('tel'),
            'bachelor' =>   $request->input('bachelor')."",
            'master' =>  $request->input('master')."",
            'phd' =>  $request->input('phd')."",
            'edu1' => $request->input('edu_s1')."",
            'edu2' => $request->input('edu_s2')."",
            'edu3' => $request->input('edu_s3')."",
            'edu4' => $request->input('edu_s4')."",
            'edu5' => $request->input('edu_s5')."",
            'file_name' => $filename ,
          ]);
        }
        elseif ( empty($request->file('file_name')) ){
          
          $pic = $request->file('pic_name');
          $picname = $randomString.".{$pic->extension()}";
          $pic->storeAs("public/personal/pic/", $picname);

          $model->update([
            'pic_name' => $picname ,
            'name_thai' => $request->input('name_thai') ,
            'name_eng' =>  $request->input('name_eng'),
            'position' =>  $request->input('position'),
            'initial' =>   $request->input('initial'),
            'email' =>  $request->input('email'),
            'contact' =>  $request->input('contact'),
            'tel' =>  $request->input('tel'),
            'bachelor' =>   $request->input('bachelor')."",
            'master' =>  $request->input('master')."",
            'phd' =>  $request->input('phd')."",
            'edu1' => $request->input('edu_s1')."",
            'edu2' => $request->input('edu_s2')."",
            'edu3' => $request->input('edu_s3')."",
            'edu4' => $request->input('edu_s4')."",
            'edu5' => $request->input('edu_s5')."",
          ]);

        }
        else {

          $file = $request->file('file_name');
          $filename = $randomString.".{$file->extension()}";
          $file->storeAs("public/personal/file/", $filename);

          $pic = $request->file('pic_name');
          $picname = $randomString.".{$pic->extension()}";
          $pic->storeAs("public/personal/pic/", $picname);

          $model->update([
            'pic_name' => $picname ,
            'name_thai' => $request->input('name_thai') ,
            'name_eng' =>  $request->input('name_eng'),
            'position' =>  $request->input('position'),
            'initial' =>   $request->input('initial'),
            'email' =>  $request->input('email'),
            'contact' =>  $request->input('contact'),
            'tel' =>  $request->input('tel'),
            'bachelor' =>   $request->input('bachelor')."",
            'master' =>  $request->input('master')."",
            'phd' =>  $request->input('phd')."",
            'edu1' => $request->input('edu_s1')."",
            'edu2' => $request->input('edu_s2')."",
            'edu3' => $request->input('edu_s3')."",
            'edu4' => $request->input('edu_s4')."",
            'edu5' => $request->input('edu_s5')."",
            'file_name' => $filename ,
          ]);

        }

        return redirect()->route('personal_Admin');
    }

    public function postpersonalDelete($id){
  
      $model = Personal::findOrFail($id);
      $model->delete();
      
      return redirect()->route('personal_Admin');
    }


    /* 
    !หลักสูตร
        TODO อุตสาหกรรมบัณฑิต */
        public function industry_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $industrys = Industry::get() ;

            return view("course.industry.admin-industry", [
              'bottoms' => $bottoms ,
              'industrys' => $industrys ,
          ]);
        }
        public function industry_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("course.industry.admin-industry_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function industry_Edit($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $industrys = Industry::where("id", $id)->get() ;

            return view("course.industry.admin-industry_Edit", [
              'bottoms' => $bottoms ,
              'industrys' => $industrys ,
          ]);
        }

        public function postindustryAdd(Request $request){ 
          
          $randomString = str_random(25);

          $file = $request->file('name_file');
          $filename = $randomString.".{$file->extension()}";
          $file->storeAs("public/industry/file/", $filename);

          Industry::create([
            'title' => $request->input('title') ,
            'comment' => $request->input('comment') ,
            'title_file' =>  $request->input('title_file') ,
            'url' =>  $request->input('url') ,
            'name_file' => $filename ,
          ]);

          return redirect()->route('industry_Admin');
      }

      public function postindustryEdit(Request $request){ 
          
        $randomString = str_random(25);
        $model = Industry::findOrFail($request->input('id'));
        
        if($request->file('name_file') == ""){
          $model->update([
            'title' => $request->input('title') ,
            'comment' =>  $request->input('comment'),
            'title_file' =>  $request->input('title_file'),
            'url' =>   $request->input('url'),
          ]);
  
        }
        else{
          
        $file = $request->file('name_file');
        $filename = $randomString.".{$file->extension()}";
        $file->storeAs("public/industry/file/", $filename);

          $model->update([
            'title' => $request->input('title') ,
            'comment' =>  $request->input('comment'),
            'title_file' =>  $request->input('title_file'),
            'url' =>   $request->input('url'),
            'name_file' => $filename ,
          ]);
  
        }

        return redirect()->route('industry_Admin');
    }

    public function postindustryDelete($id){
  
      $model = Industry::findOrFail($id);
      $model->delete();
      
      return redirect()->route('industry_Admin');
    }


        /*
        TODO วิศวกรรมบัณฑิต */
        public function engineer_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $engineers = Engineer::get() ;

            return view("course.engineer.admin-engineer", [
              'bottoms' => $bottoms ,
              'engineers' => $engineers ,
          ]);
        }
        public function engineer_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("course.engineer.admin-engineer_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function engineer_Edit($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $engineers = Engineer::where("id", $id)->get() ;
            return view("course.engineer.admin-engineer_Edit", [
              'bottoms' => $bottoms ,
              'engineers' => $engineers ,

          ]);
        }

        public function postengineerAdd(Request $request){ 
          
          $randomString = str_random(25);

          $file = $request->file('name_file');
          $filename = $randomString.".{$file->extension()}";
          $file->storeAs("public/engineer/file/", $filename);

          Engineer::create([
            'title' => $request->input('title') ,
            'comment' => $request->input('comment') ,
            'title_file' =>  $request->input('title_file') ,
            'url' =>  $request->input('url') ,
            'name_file' => $filename ,
          ]);

          return redirect()->route('engineer_Admin');
      }

      public function postengineerEdit(Request $request){ 
          
        $randomString = str_random(25);
        $model = Engineer::findOrFail($request->input('id'));
        
        if($request->file('name_file') == ""){
          $model->update([
            'title' => $request->input('title') ,
            'comment' =>  $request->input('comment'),
            'title_file' =>  $request->input('title_file'),
            'url' =>   $request->input('url'),
          ]);
  
        }
        else{
          
        $file = $request->file('name_file');
        $filename = $randomString.".{$file->extension()}";
        $file->storeAs("public/engineer/file/", $filename);

          $model->update([
            'title' => $request->input('title') ,
            'comment' =>  $request->input('comment'),
            'title_file' =>  $request->input('title_file'),
            'url' =>   $request->input('url'),
            'name_file' => $filename ,
          ]);
  
        }

        return redirect()->route('engineer_Admin');
    }

    public function postengineerDelete($id){
  
      $model = Engineer::findOrFail($id);
      $model->delete();
      
      return redirect()->route('engineer_Admin');
    }


        /*
        TODO วิศวกรรมมหาบัณฑิต */
        public function engineerMaster_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $engineermasters = Engineermaster::get() ;

            return view("course.engineer-master.admin-engineer-master", [
              'bottoms' => $bottoms ,
              'engineermasters' => $engineermasters ,
          ]);
        }
        public function engineerMaster_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("course.engineer-master.admin-engineer-master_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function engineerMaster_Edit($id){
            $bottoms = Bottom::where("id", 1)->get() ;
            $engineermasters = Engineermaster::where("id", $id)->get() ;

            return view("course.engineer-master.admin-engineer-master_Edit", [
              'bottoms' => $bottoms ,
              'engineermasters' => $engineermasters ,

          ]);
            }

            public function postengineerMasterAdd(Request $request){ 
          
              $randomString = str_random(25);
    
              $file = $request->file('name_file');
              $filename = $randomString.".{$file->extension()}";
              $file->storeAs("public/engineermaster/file/", $filename);
    
              Engineermaster::create([
                'title' => $request->input('title') ,
                'comment' => $request->input('comment') ,
                'title_file' =>  $request->input('title_file') ,
                'url' =>  $request->input('url') ,
                'name_file' => $filename ,
              ]);
    
              return redirect()->route('engineer-master_Admin');
          }

          public function postengineerMasterEdit(Request $request){ 
          
            $randomString = str_random(25);
            $model = Engineermaster::findOrFail($request->input('id'));
            
            if($request->file('name_file') == ""){
              $model->update([
                'title' => $request->input('title') ,
                'comment' =>  $request->input('comment'),
                'title_file' =>  $request->input('title_file'),
                'url' =>   $request->input('url'),
              ]);
      
            }
            else{
              
            $file = $request->file('name_file');
            $filename = $randomString.".{$file->extension()}";
            $file->storeAs("public/engineermaster/file/", $filename);
    
              $model->update([
                'title' => $request->input('title') ,
                'comment' =>  $request->input('comment'),
                'title_file' =>  $request->input('title_file'),
                'url' =>   $request->input('url'),
                'name_file' => $filename ,
              ]);
      
            }
    
            return redirect()->route('engineer-master_Admin');
        }

        public function postengineerMasterDelete($id){
  
          $model = Engineermaster::findOrFail($id);
          $model->delete();
          
          return redirect()->route('engineer-master_Admin');
        }

    /* 
    ! ปริญญานิพนธ์
        TODO ข่าวสารปริญญานิพนธ์ */
        public function researchNews_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $news = Researchnews::get() ;


            return view("research.researchNews.admin-researchNews", [
              'bottoms' => $bottoms ,
              'news' => $news ,

          ]);
        }
        public function researchNews_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("research.researchNews.admin-researchNews_Add", [
              'bottoms' => $bottoms ,
          ]);
        }


        public function postresearchNewsAdd(Request $request){ 
         
          $randomString = str_random(25);

          if(empty($request->file('pic'))){
            $picname = "";
          }
          else{
            $pic = $request->file('pic');
            $picname = $randomString.".{$pic->extension()}";
            $pic->storeAs("public/research_news/pic/", $picname);
          }
          
          if(empty($request->file('file'))){
            $filename = "";
          }
          else{
            $file = $request->file('file');
            $filename = $randomString.".{$file->extension()}";
            $file->storeAs("public/research_news/file/", $filename);
          }
  
  
            if( empty($request->post('filecomment')) and empty($request->post('url'))){
              Researchnews::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => "",
                'url' => "",
              ]);
            }
            else if(empty($request->post('filecomment'))){
              Researchnews::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => "",
                'url' => $request->post('url'),
              ]);
            }
            else if( empty($request->post('url'))){
              Researchnews::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => $request->post('filecomment'),
                'url' => "",
              ]);
            }
            else{
              Researchnews::create([
                'title' => $request->post('title'),
                'comment' => $request->post('comment'),
                'pic' => $picname,
                'file' => $filename,
                'filecomment' => $request->post('filecomment'),
                'url' => $request->post('url'),
              ]);
  
            }


          return redirect()->route('researchNews_Admin');
      }

      public function postresearchMethodDelete($id){
  
        $model = Researchnews::findOrFail($id);
        $model->delete();
        
        return redirect()->route('researchNews_Admin');
      }


        public function researchNews_Edit($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $news = Researchnews::where("id", $id)->get() ;

            return view("research.researchNews.admin-researchNews_Edit", [
              'bottoms' => $bottoms ,
              'news' => $news ,

          ]);
        }


        public function postresearchNewsEdit($id, Request $request){ 
      
          $randomString = str_random(25);
          $model = Researchnews::findOrFail($id);

          if(empty($request->input('filecomment'))){
            $filecomment = "" ;
          }
          else{
            $filecomment = $request->input('filecomment');
          }

          if(empty($request->input('url'))){
            $url = "" ;
          }
          else{
            $url = $request->input('url')  ;
          }


          if( empty($request->file('pic')) and empty($request->file('file')) ){
            $model->update([
                'title' => $request->input('title') ,
                'comment' => $request->input('comment') ,
                'filecomment' => $filecomment  ,
                'url' => $url  ,
            ]);
          }
          else if(empty($request->file('pic'))){
            $file = $request->file('file');
            $filename = $randomString.".{$file->extension()}";
            $file->storeAs("public/research_news/file/", $filename);
            $model->update([
              'title' => $request->input('title') ,
              'comment' => $request->input('comment') ,
              'file' => $filename,
              'filecomment' => $filecomment  ,
              'url' => $url  ,
            ]);

          }
          else if(empty($request->file('file'))){
            $pic = $request->file('pic');
            $picname = $randomString.".{$pic->extension()}";
            $pic->storeAs("public/research_news/pic/", $picname);
            $model->update([
              'title' => $request->input('title') ,
              'comment' => $request->input('comment') ,
              'pic' => $picname,
              'filecomment' => $filecomment  ,
              'url' => $url  ,
            ]);

          }
          else{
            $file = $request->file('file');
            $filename = $randomString.".{$file->extension()}";
            $file->storeAs("public/research_news/file/", $filename);
            $pic = $request->file('pic');
            $picname = $randomString.".{$pic->extension()}";
            $pic->storeAs("public/research_news/pic/", $picname);
            $model->update([
              'title' => $request->input('title') ,
              'comment' => $request->input('comment') ,
              'pic' => $picname,
              'file' => $filename,
              'filecomment' => $filecomment  ,
              'url' => $url  ,
            ]);


            }

        return redirect()->route('researchNews_Admin');

      }




        public function researchNews_Temp(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("research.researchNews.admin-researchNews_Temp", [
              'bottoms' => $bottoms ,
          ]);
        }
        /*
        TODO ขั้นตอนการจัดทำปริญญานิพนธ์ */
        public function researchMethod_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $researchpics = Researchpic::where("id", 1)->get() ;

            return view("research.researchMethod.admin-researchMethod", [
              'bottoms' => $bottoms ,
              'researchpics' => $researchpics ,

          ]);
        }
        public function researchMethod_Edit(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $researchpics = Researchpic::where("id", 1)->get() ;

            return view("research.researchMethod.admin-researchMethod_Edit", [
              'bottoms' => $bottoms ,
              'researchpics' => $researchpics ,

          ]);
        }

        public function postresearchMethodEdit(Request $request){ 
          $randomString = str_random(25);

          $model = Researchpic::findOrFail(1);
   
          $file = $request->file('pic');
          $filename = $randomString.".{$file->extension()}";
          $file->storeAs("public/researchpic/", $filename);


          $model->update([
              'pic' => $filename ,
          ]);

          return redirect()->route('researchMethod_Admin');
        }


        /*
        TODO ค้นหาปริญญานิพนธ์ */

        public function researchExcel(){ 
          $bottoms = Bottom::where("id", 1)->get() ;
          $researchs = Research::where("status", 2)->get() ;

          return view("research.researchFind.admin-researchExcel", [
            'bottoms' => $bottoms ,
            'researchs' => $researchs ,

        ]);
      }


        public function researchFind_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $researchs = Research::where("status", 2)->get() ;
            $personals = Personal::get() ;

            return view("research.researchFind.admin-researchFind", [
              'bottoms' => $bottoms ,
              'researchs' => $researchs ,
              'personals' => $personals ,

          ]);
        }

      public function  AdminresearchFindDetail($id){ 
        $bottoms = Bottom::where("id", 1)->get() ;
        $researchs = Research::where("id", $id)->get() ;
        $teacher1 = Research::where("id", $id)->pluck('teacherid_one') ;
        $teacher2 = Research::where("id", $id)->pluck('teacherid_two') ;
        $teacher3 = Research::where("id", $id)->pluck('teacherid_two') ;

        $name_teacher1 = Personal::where("id", $teacher1[0])->pluck('name_thai');
        $name_teacher2 = Personal::where("id", $teacher2[0])->pluck('name_thai');
        $name_teacher3 = Personal::where("id", $teacher3[0])->pluck('name_thai');



        return view("research.researchFind.admin-researchFindDetail", [
          'bottoms' => $bottoms ,
          'researchs' => $researchs ,
          'teacher1' => $name_teacher1[0] , 
          'teacher2' => $name_teacher2[0] ,
          'teacher3' => $name_teacher2[0] ,

      ]);
    
      }


        public function researchFindAdminSearch(Request $request){ 
          $personals = Personal::get() ;

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

          return view("research.researchFind.admin-researchFind", [
            'bottoms' => $bottoms ,
            'researchs' => $researchs ,
            'personals' => $personals ,

        ]);
      }

      
      public function researchFindAdminSearchSelect(Request $request){ 
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


        return view("research.researchFind.admin-researchFind", [
          'bottoms' => $bottoms ,
          'researchs' => $researchs ,
          'personals' => $personals ,

      ]);
    }
      
        public function researchFind_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("research.researchFind.admin-researchFind_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function researchFind_Edit($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $researchs = Research::where("id", $id)->get() ;
            $personals = Personal::get() ;
            $teacher1 = Research::where("id", $id)->pluck('teacherid_one') ;
            $teacher2 = Research::where("id", $id)->pluck('teacherid_two') ;
            $name_teacher1 = Personal::where("id", $teacher1[0])->pluck('name_thai');
            $name_teacher2 = Personal::where("id", $teacher2[0])->pluck('name_thai');

            return view("research.researchFind.admin-researchFind_Edit", [
              'bottoms' => $bottoms ,
              'researchs' => $researchs ,
              'personals' => $personals ,
              'teacher1' => $name_teacher1[0] , 
              'teacher2' => $name_teacher2[0] ,

          ]);
        }


        public function researchFindDelete($id){ 
          $model = Research::findOrFail($id);
          $model->delete();

          return redirect()->route('researchFind_Admin');
        }


        /*
        TODO จัดการปริญญานิพนธ์ */

        /*
        TODO รออนุมัติปริญญานิพนธ์ */
        public function researchApprove_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $researchs = Research::where("status", 1)->get() ;

            return view("research.researchApprove.admin-researchApprove", [
              'bottoms' => $bottoms ,
              'researchs' => $researchs ,

          ]);
        }

        public function postresearchApprove($id){ 
          $model = Research::findOrFail($id);
          $model->update([
            'status' => 2 ,
          ]);
          return redirect()->route('researchApprove_Admin');
        }

        public function researchApproveDetail_Admin($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $researchs = Research::where("id", $id)->get() ;
            $teacher1 = Research::where("id", $id)->pluck('teacherid_one') ;
            $teacher2 = Research::where("id", $id)->pluck('teacherid_two') ;
            $name_teacher1 = Personal::where("id", $teacher1[0])->pluck('name_thai');
            $name_teacher2 = Personal::where("id", $teacher2[0])->pluck('name_thai');


            return view("research.researchApprove.admin-researchApproveDetail", [
              'bottoms' => $bottoms ,
              'researchs' => $researchs ,
              'teacher1' => $name_teacher1[0] , 
              'teacher2' => $name_teacher2[0] ,
          ]);
        }


        public function postresearchFindEdit(Request $request){ 

          $model = Research::findOrFail($request->input('id'));
   
          $model->update([
              'research_look' => $request->input('research_look') ,
              'research_type' => $request->input('research_type') ,
              'format' => $request->input('format') ,
              'thai_name' => $request->input('thai_name') ,
              'eng_name' => $request->input('eng_name') ,
              'year' => $request->input('year') ,
              'term' => $request->input('term') ,
              'class' => $request->input('class') ,
              'teacherid_one' => $request->input('teacherid_one') ,
              'teacherid_two' => $request->input('teacherid_two') ,
              'student_one' => $request->input('student_one') ,
              'student_two' => $request->input('student_two') ,
              'file_type' => $request->input('file_type') ,
              ]);

          return redirect()->route('researchFind_Admin');
        }

        

/* 
    ! สหกิจศึกษา
        TODO ขั้นตอนการจัดทำสหกิจศึกษา */
        public function operationMethod_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $operation_methods = Operation_method::where("id", 1)->get() ;

            return view("operation.operationMethod.admin-operationMethod", [
              'bottoms' => $bottoms ,
              'operation_methods' => $operation_methods ,
          ]);
        }


        public function operationMethod_Edit(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $operation_methods = Operation_method::where("id", 1)->get() ;

            return view("operation.operationMethod.admin-operationMethod_Edit", [
              'bottoms' => $bottoms ,
              'operation_methods' => $operation_methods ,

          ]);
        }

      public function postoperationMethodEdit(Request $request){ 

        $randomString = str_random(25);
        $model = Operation_method::findOrFail(1);

        $file = $request->file('file_pic');
        $filename = $randomString.".{$file->extension()}";
        $file->storeAs("public/operation_method/", $filename);

     
        $model->update([
            'file_name' => $filename ,
        ]);
        return redirect()->route('operationMethod_Admin');
      }


        /*
        TODO ค้นหาสหกิจศึกษา */
        public function operationFind_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $operations = Operation::get() ;

            return view("operation.operationFind.admin-operationFind", [
              'bottoms' => $bottoms ,
              'operations' => $operations ,

          ]);
        }

        public function operationFindAdminSearch(Request $request){ 
          $bottoms = Bottom::where("id", 1)->get() ;
          $operations = Operation::where("student_id", $request->input('search'))->orWhere('address', $request->input('search'))->get() ;

          return view("operation.operationFind.admin-operationFind", [
            'bottoms' => $bottoms ,
            'operations' => $operations ,

        ]);
      }

        public function operationExcelAdmin(){ 
          $bottoms = Bottom::where("id", 1)->get() ;
          $operations = Operation::get() ;

          return view("operation.operationFind.admin-operationExcel", [
            'bottoms' => $bottoms ,
            'operations' => $operations ,

        ]);
      }



        public function operationFind_Add(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            return view("operation.operationFind.admin-operationFind_Add", [
              'bottoms' => $bottoms ,
          ]);
        }
        public function operationFind_Edit($id){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $operations = Operation::where("id", $id)->get() ;
            $user_id = Operation::where("id", $id)->pluck('user_id') ;
            $operationuploads = Operationupload::where("user_id", $user_id)->get() ;


            return view("operation.operationFind.admin-operationFind_Edit", [
              'bottoms' => $bottoms ,
              'operations' => $operations ,
              'operationuploads' => $operationuploads ,
          ]);
        }

        public function operationUploadDelete($id){ 
          
          $model = Operationupload::findOrFail($id);
          $model->delete();

          return redirect()->route('operationFind_Admin');
      }

        public function postAdminoperationManageEdit(Request $request){ 
          
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
          ]);


          return redirect()->route('operationFind_Admin');
       
        }

        public function operationFind_Delete($id){ 
          
          $model = Operation::findOrFail($id);
          $model->delete();

          return redirect()->route('operationFind_Admin');

      }

/* 
    ! ติดต่อ
        TODO ติดต่อภาควิชา */
        public function contact_Admin(){ 
            $bottoms = Bottom::where("id", 1)->get() ;
            $contacts = Contact::where("id", 1)->get() ;
           
            return view("contactDepartment.admin-contact", [
              'bottoms' => $bottoms ,
              'contacts' => $contacts ,
          ]);
        }

        public function postcontactEdit(Request $request){ 
          $model = Contact::findOrFail($request->input('id'));
          $model->update([
            'url' => $request->input('url') ,
            'university' => $request->input('university') ,
            'address' => $request->input('address') ,
          ]);

          return redirect()->route('contact_Admin');
       
        }


    }
