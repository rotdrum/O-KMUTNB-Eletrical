<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('project.index');
});

Route::resource('/project', 'ProjectController');

Auth::routes();

Route::get('/personal/indexPersonal/{username}', 'PersonalController@indexPersonal')->name('indexPersonal');
Route::get('/personal/aboutDepartmentPersonal/{username}', 'PersonalController@aboutDepartmentPersonal')->name('aboutDepartmentPersonal');
Route::get('/personal/missionPersonal/{username}', 'PersonalController@missionPersonal')->name('missionPersonal');
Route::get('/personal/symbolPersonal/{username}', 'PersonalController@symbolPersonal')->name('symbolPersonal');
Route::get('/personal/structurePersonal/{username}', 'PersonalController@structurePersonal')->name('structurePersonal');
Route::get('/personal/activityPersonal/{username}', 'PersonalController@activityPersonal')->name('activityPersonal');
Route::get('/personal/personalPersonal/{username}', 'PersonalController@personalPersonal')->name('personalPersonal');
Route::get('/personal/industryPersonal/{username}', 'PersonalController@industryPersonal')->name('industryPersonal');
Route::get('/personal/engineerPersonal/{username}', 'PersonalController@engineerPersonal')->name('engineerPersonal');
Route::get('/personal/engineermasterPersonal/{username}', 'PersonalController@engineermasterPersonal')->name('engineermasterPersonal');
Route::get('/personal/researchNewsPersonal/{username}', 'PersonalController@researchNewsPersonal')->name('researchNewsPersonal');
Route::get('/personal/researchMethodPersonal/{username}', 'PersonalController@researchMethodPersonal')->name('researchMethodPersonal');
Route::get('/personal/researchFindPersonal/{username}', 'PersonalController@researchFindPersonal')->name('researchFindPersonal');
Route::get('/personal/operationMethodPersonal/{username}', 'PersonalController@operationMethodPersonal')->name('operationMethodPersonal');
Route::get('/personal/researchFindPersonal/{username}', 'PersonalController@researchFindPersonal')->name('researchFindPersonal');
Route::get('/personal/operationMethodPersonal/{username}', 'PersonalController@operationMethodPersonal')->name('operationMethodPersonal');
Route::get('/personal/operationFindPersonal/{username}', 'PersonalController@operationFindPersonal')->name('operationFindPersonal');
Route::get('/personal/contactPersonal/{username}', 'PersonalController@contactPersonal')->name('contactPersonal');
Route::get('/personal/newsDetailPersonal/{id}/{username}', 'PersonalController@newsDetailPersonal')->name('newsDetailPersonal');
Route::get('/personal/newsPersonal/{username}', 'PersonalController@newsPersonal')->name('newsPersonal');
Route::get('/personal/activityImageDetailPersonal/{id}/{username}', 'PersonalController@activityImageDetailPersonal')->name('activityImageDetailPersonal');
Route::get('/personal/personalDetailPersonal/{id}/{username}', 'PersonalController@personalDetailPersonal')->name('personalDetailPersonal');
Route::get('/personal/researchNewsDetailPersonal/{id}/{username}', 'PersonalController@researchNewsDetailPersonal')->name('researchNewsDetailPersonal');
Route::get('/personal/researchFindDetailPersonal/{id}/{username}', 'PersonalController@researchFindDetailPersonal')->name('researchFindDetailPersonal');
Route::get('/personal/operationFindDetailPersonal/{id}/{username}', 'PersonalController@operationFindDetailPersonal')->name('operationFindDetailPersonal');



Route::post('/personal/operationFindSearchPersonal/{username}', 'PersonalController@operationFindSearchPersonal')->name('operationFindSearchPersonal');



/* 
! หน้าแรก */
Route::get('/', 'PagesController@index')->name('index');
Route::get('/editProfile', 'PagesController@editProfile')->name('editProfile');
Route::get('/admin/index/Gd47EQAs5', 'AdminController@indexAdmin')->name('indexAdmin');

Route::post('/admin/login', 'AdminController@adminlogin')->name('adminlogin');
Route::post('/admin/bottompost', 'AdminController@bottompost')->name('bottompost');

Route::post('/admin/bannerpost', 'AdminController@bannerpost')->name('bannerpost');


/* 
! ลืมรหัสผ่าน และจัดการข้อมูลนักศึกษา */
Route::get('/forgotPassword', 'PagesController@forgotPassword')->name('forgotPassword');
Route::get('/setPassword', 'PagesController@setPassword')->name('setPassword');
Route::post('/postsetpassword', 'PagesController@postsetpassword')->name('postsetpassword');


Route::get('/admin/manageStudent', 'AdminController@manageStudent')->name('manageStudent');
Route::get('/admin/manageStudentAdd', 'AdminController@manageStudentAdd')->name('manageStudentAdd');
Route::get('/admin/manageStudentEdit/{id}', 'AdminController@manageStudentEdit')->name('manageStudentEdit');
Route::get('/admin/manageTeacherUser/{id}', 'AdminController@manageTeacherUser')->name('manageTeacherUser');
Route::post('/admin/postmanageStudentEdit/', 'AdminController@postmanageStudentEdit')->name('postmanageStudentEdit');
Route::get('/admin/manageStudentDelete/{id}', 'AdminController@manageStudentDelete')->name('manageStudentDelete');

Route::post('/admin/postResetPassword', 'AdminController@postResetPassword')->name('postResetPassword');


Route::post('/admin/manageTeacherUser/postSetTeacherUser/', 'AdminController@postSetTeacherUser')->name('postSetTeacherUser');

Route::get('/admin/manageTeacher', 'AdminController@manageTeacher')->name('manageTeacher');
Route::post('/admin/manageStudentSearch', 'AdminController@manageStudentSearch')->name('manageStudentSearch');

Route::post('/admin/manageTeacherSearch', 'AdminController@manageTeacherSearch')->name('manageTeacherSearch');


Route::get('/admin/changestatus/{id}', 'AdminController@changestatus')->name('changestatus');


/* 
! เกี่ยวกับภาควิชา
TODO ประวัติความเป็นมา*/
Route::get('/aboutDepartment', 'PagesController@aboutDepartment')->name('aboutDepartment');
Route::get('/admin/aboutDepartment/Gd47EQAs5', 'AdminController@aboutDepartment_Admin')->name('aboutDepartment_Admin');
Route::get('/admin/aboutDepartmentAdd/Gd47EQAs5', 'AdminController@aboutDepartment_Add')->name('aboutDepartment_Add');
Route::get('/admin/aboutDepartmentEdit/Gd47EQAs5/{id}', 'AdminController@aboutDepartment_Edit')->name('aboutDepartment_Edit');
Route::post('/admin/postaboutDepartmentAdd/Gd47EQAs5', 'AdminController@postaboutDepartmentAdd')->name('postaboutDepartmentAdd');
Route::post('/admin/postaboutDepartmentEdit/Gd47EQAs5', 'AdminController@postaboutDepartmentEdit')->name('postaboutDepartmentEdit');
Route::get('/admin/aboutDepartmentDelete/Gd47EQAs5/{id}', 'AdminController@aboutDepartmentDelete')->name('aboutDepartmentDelete');



/*
TODO พันธกิจ และวิสัยทัศน์*/
Route::get('/mission', 'PagesController@mission')->name('mission');
Route::get('/admin/mission/Gd47EQAs5', 'AdminController@mission_Admin')->name('mission_Admin');
Route::get('/admin/missionAdd/Gd47EQAs5', 'AdminController@mission_Add')->name('mission_Add');
Route::get('/admin/missionEdit/Gd47EQAs5/{id}', 'AdminController@mission_Edit')->name('mission_Edit');
Route::post('/admin/postmissionAdd/Gd47EQAs5', 'AdminController@postmissionAdd')->name('postmissionAdd');
Route::post('/admin/postmissionEdit/Gd47EQAs5', 'AdminController@postmissionEdit')->name('postmissionEdit');
Route::get('/admin/missionDelete/Gd47EQAs5/{id}', 'AdminController@missionDelete')->name('missionDelete');


/*
TODO ข่าวสารประชาสัมพันธ์*/
Route::get('/news', 'PagesController@news')->name('news');
Route::get('/newsDetail/{id}', 'PagesController@newsDetail')->name('newsDetail');
Route::get('/admin/news/Gd47EQAs5', 'AdminController@news_Admin')->name('news_Admin');
Route::get('/admin/newsAdd/Gd47EQAs5', 'AdminController@news_Add')->name('news_Add');
Route::post('/admin/postnewsAdd/Gd47EQAs5', 'AdminController@postnewsAdd')->name('postnewsAdd');


Route::get('/admin/newsEdit/Gd47EQAs5/{id}', 'AdminController@news_Edit')->name('news_Edit');
Route::post('/admin/postnewsEdit/Gd47EQAs5/{id}', 'AdminController@postnewsEdit')->name('postnewsEdit');
Route::get('/admin/newsTemp/Gd47EQAs5', 'AdminController@news_Temp')->name('news_Temp');
Route::get('/admin/updatestatusNews/Gd47EQAs5/{id}', 'AdminController@updatestatusNews')->name('updatestatusNews');

Route::get('/admin/deleteindexNews/Gd47EQAs5/{id}', 'AdminController@deleteindexNews')->name('deleteindexNews');
Route::get('/admin/deleteNews/Gd47EQAs5/{id}', 'AdminController@deleteNews')->name('deleteNews');
Route::get('/admin/deleteTempNews/Gd47EQAs5/{id}', 'AdminController@deleteTempNews')->name('deleteTempNews');

/*
TODO สัญลักษณ์*/
Route::get('/symbol', 'PagesController@symbol')->name('symbol');
Route::get('/admin/symbol/Gd47EQAs5', 'AdminController@symbol_Admin')->name('symbol_Admin');
Route::get('/admin/symbolAdd/Gd47EQAs5', 'AdminController@symbol_Add')->name('symbol_Add');
Route::get('/admin/symbolEdit/Gd47EQAs5/{id}', 'AdminController@symbol_Edit')->name('symbol_Edit');
Route::post('/admin/postsymbolAdd/Gd47EQAs5', 'AdminController@postsymbolAdd')->name('postsymbolAdd');
Route::post('/admin/postsymbolEdit/Gd47EQAs5', 'AdminController@postsymbolEdit')->name('postsymbolEdit');
Route::get('/admin/symbolDelete/Gd47EQAs5/{id}', 'AdminController@symbolDelete')->name('symbolDelete');

/*
TODO โครงสร้างองค์กร*/
Route::get('/structure', 'PagesController@structure')->name('structure');
Route::get('/admin/structure/Gd47EQAs5', 'AdminController@structure_Admin')->name('structure_Admin');
Route::get('/admin/structureEdit/Gd47EQAs5', 'AdminController@structure_Edit')->name('structure_Edit');
Route::post('/admin/poststructureEdit/Gd47EQAs5', 'AdminController@poststructureEdit')->name('poststructureEdit');


/*
! กิจกรรมภาควิชา
TODO กิจกรรมภาควิชา แก้ใหม่*/
Route::get('/activity', 'PagesController@activity')->name('activity');
Route::get('/admin/activity/Gd47EQAs5', 'AdminController@activity_Admin')->name('activity_Admin');
Route::get('/admin/activityAdd/Gd47EQAs5', 'AdminController@activity_Add')->name('activity_Add');
Route::get('/admin/activityEdit/Gd47EQAs5/{id}', 'AdminController@activity_Edit')->name('activity_Edit');
Route::get('/admin/activityTemp/Gd47EQAs5', 'AdminController@activity_Temp')->name('activity_Temp');


/*
TODO กิจกรรมรูปภาพ*/
Route::get('/activityImage', 'PagesController@activityImage')->name('activityImage');
Route::get('/activityImageDetail/{id}', 'PagesController@activityImageDetail')->name('activityImageDetail');
Route::get('/admin/activityImage/Gd47EQAs5', 'AdminController@activityImage_Admin')->name('activityImage_Admin');
Route::get('/admin/activityImageAdd/Gd47EQAs5', 'AdminController@activityImage_Add')->name('activityImage_Add');
Route::get('/admin/activityImageEdit/Gd47EQAs5', 'AdminController@activityImage_Edit')->name('activityImage_Edit');
/*
TODO กิจกรรมวิดีโอ*/
Route::get('/activityVideo', 'PagesController@activityVideo')->name('activityVideo');
Route::get('/idkYoutube', 'PagesController@idkYoutube')->name('idkYoutube');
Route::get('/admin/activityVideo/Gd47EQAs5', 'AdminController@activityVideo_Admin')->name('activityVideo_Admin');
Route::get('/admin/activityVideoAdd/Gd47EQAs5', 'AdminController@activityVideo_Add')->name('activityVideo_Add');
Route::get('/admin/activityVideoEdit/Gd47EQAs5/{id}', 'AdminController@activityVideo_Edit')->name('activityVideo_Edit');
Route::post('/admin/activityVideoEdit/postactivityEdit', 'AdminController@postactivityEdit')->name('postactivityEdit');
Route::get('/admin/activityVideoDelete/Gd47EQAs5/{id}', 'AdminController@activityVideoDelete')->name('activityVideoDelete');
Route::post('/admin/postactivityAdd/Gd47EQAs5', 'AdminController@postactivityAdd')->name('postactivityAdd');
Route::post('/admin/postactivityimgAdd/Gd47EQAs5', 'AdminController@postactivityimgAdd')->name('postactivityimgAdd');
Route::get('/admin/activityIndexDelete/Gd47EQAs5/{id}', 'AdminController@activityIndexDelete')->name('activityIndexDelete');
Route::get('/admin/activityTempDelete/Gd47EQAs5/{id}', 'AdminController@activityTempDelete')->name('activityTempDelete');
Route::get('/admin/activityUpdateStatus/Gd47EQAs5/{id}', 'AdminController@activityUpdateStatus')->name('activityUpdateStatus');
Route::get('/admin/postactivitpostactivityimgEdityEdit/Gd47EQAs5/{id}', 'AdminController@postactivityimgEdit')->name('postactivityimgEdit');


/*
! บุคลากร*/
Route::get('/personal', 'PagesController@personal')->name('personal');
Route::get('/personalDetail/{id}', 'PagesController@personalDetail')->name('personalDetail');
Route::get('/admin/personal/Gd47EQAs5', 'AdminController@personal_Admin')->name('personal_Admin');
Route::get('/admin/personalAdd/Gd47EQAs5', 'AdminController@personal_Add')->name('personal_Add');
Route::get('/admin/personalEdit/Gd47EQAs5/{id}', 'AdminController@personal_Edit')->name('personal_Edit');

Route::post('/admin/postpersonalAdd/Gd47EQAs5', 'AdminController@postpersonalAdd')->name('postpersonalAdd');
Route::post('/admin/postpersonalEdit/Gd47EQAs5', 'AdminController@postpersonalEdit')->name('postpersonalEdit');
Route::get('/admin/postpersonalDelete/Gd47EQAs5/{id}', 'AdminController@postpersonalDelete')->name('postpersonalDelete');


/*
! หลักสูตร
TODO หลักสูตรอุตสาหกรรม*/
Route::get('/industry', 'PagesController@industry')->name('industry');
Route::get('/admin/industry/Gd47EQAs5', 'AdminController@industry_Admin')->name('industry_Admin');
Route::get('/admin/industryAdd/Gd47EQAs5', 'AdminController@industry_Add')->name('industry_Add');
Route::get('/admin/industryEdit/Gd47EQAs5/{id}', 'AdminController@industry_Edit')->name('industry_Edit');
Route::post('/admin/postindustryAdd/Gd47EQAs5', 'AdminController@postindustryAdd')->name('postindustryAdd');
Route::post('/admin/postindustryEdit/Gd47EQAs5', 'AdminController@postindustryEdit')->name('postindustryEdit');
Route::get('/admin/postindustryDelete/Gd47EQAs5/{id}', 'AdminController@postindustryDelete')->name('postindustryDelete');

/*
TODO วิศวกรรมอุตสาหกรรม*/
Route::get('/engineer', 'PagesController@engineer')->name('engineer');
Route::get('/admin/engineer/Gd47EQAs5', 'AdminController@engineer_Admin')->name('engineer_Admin');
Route::get('/admin/engineerAdd/Gd47EQAs5', 'AdminController@engineer_Add')->name('engineer_Add');
Route::get('/admin/engineerEdit/Gd47EQAs5/{id}', 'AdminController@engineer_Edit')->name('engineer_Edit');
Route::post('/admin/postengineerAdd/Gd47EQAs5', 'AdminController@postengineerAdd')->name('postengineerAdd');
Route::post('/admin/postengineerEdit/Gd47EQAs5', 'AdminController@postengineerEdit')->name('postengineerEdit');
Route::get('/admin/postengineerDelete/Gd47EQAs5/{id}', 'AdminController@postengineerDelete')->name('postengineerDelete');
/*
TODO วิศวกรรมมหาอุตสาหกรรม */
Route::get('/engineerMaster', 'PagesController@engineerMaster')->name('engineer-master');
Route::get('/admin/engineerMaster/Gd47EQAs5', 'AdminController@engineerMaster_Admin')->name('engineer-master_Admin');
Route::get('/admin/engineerMasterAdd/Gd47EQAs5', 'AdminController@engineerMaster_Add')->name('engineer-master_Add');
Route::get('/admin/engineerMasterEdit/Gd47EQAs5/{id}', 'AdminController@engineerMaster_Edit')->name('engineer-master_Edit');
Route::post('/admin/postengineerMasterAdd/Gd47EQAs5', 'AdminController@postengineerMasterAdd')->name('postengineerMasterAdd');
Route::post('/admin/postengineerMasterEdit/Gd47EQAs5', 'AdminController@postengineerMasterEdit')->name('postengineerMasterEdit');
Route::get('/admin/postengineerMasterDelete/Gd47EQAs5/{id}', 'AdminController@postengineerMasterDelete')->name('postengineerMasterDelete');

/*
! ปริญญานิพนธ์
TODO ข่าวสารปริญญานิพนธ์ */
Route::get('/researchNews', 'PagesController@researchNews')->name('researchNews');
Route::get('/researchNewsDetail/{id}', 'PagesController@researchNewsDetail')->name('researchNewsDetail');
Route::get('/admin/researchNews/Gd47EQAs5', 'AdminController@researchNews_Admin')->name('researchNews_Admin');
Route::get('/admin/researchNewsAdd/Gd47EQAs5', 'AdminController@researchNews_Add')->name('researchNews_Add');
Route::get('/admin/researchNewsEdit/Gd47EQAs5/{id}', 'AdminController@researchNews_Edit')->name('researchNews_Edit');
Route::get('/admin/researchNewsTemp/Gd47EQAs5', 'AdminController@researchNews_Temp')->name('researchNews_Temp');

Route::post('/admin/postresearchNewsEdit/Gd47EQAs5/{id}', 'AdminController@postresearchNewsEdit')->name('postresearchNewsEdit');

Route::post('/admin/postresearchNewsAdd/Gd47EQAs5', 'AdminController@postresearchNewsAdd')->name('postresearchNewsAdd');


/*
TODO ขั้นตอนการจัดทำปริญญานิพนธ์ */
Route::get('/researchMethod', 'PagesController@researchMethod')->name('researchMethod');
Route::get('/admin/researchMethod/Gd47EQAs5', 'AdminController@researchMethod_Admin')->name('researchMethod_Admin');
Route::get('/admin/researchMethodEdit/Gd47EQAs5', 'AdminController@researchMethod_Edit')->name('researchMethod_Edit');
Route::post('/admin/postresearchMethodEdit/Gd47EQAs5', 'AdminController@postresearchMethodEdit')->name('postresearchMethodEdit');

Route::get('/admin/postresearchMethodDelete/Gd47EQAs5/{id}', 'AdminController@postresearchMethodDelete')->name('postresearchMethodDelete');


/*
TODO ค้นหาปริญญานิพนธ์ */
Route::get('/researchFind', 'PagesController@researchFind')->name('researchFind');
Route::post('/researchFindSearch', 'PagesController@researchFindSearch')->name('researchFindSearch');
Route::post('/researchFindSearchSelect', 'PagesController@researchFindSearchSelect')->name('researchFindSearchSelect');

Route::get('/researchFindDetail/{id}', 'PagesController@researchFindDetail')->name('researchFindDetail');

Route::get('admin/researchFindDetail/{id}', 'AdminController@AdminresearchFindDetail')->name('AdminresearchFindDetail');

Route::get('/admin/researchFind/Gd47EQAs5', 'AdminController@researchFind_Admin')->name('researchFind_Admin');

Route::post('/admin/researchFindAdminSearch/Gd47EQAs5', 'AdminController@researchFindAdminSearch')->name('researchFindAdminSearch');
Route::post('/admin/researchFindAdminSearchSelect/Gd47EQAs5', 'AdminController@researchFindAdminSearchSelect')->name('researchFindAdminSearchSelect');

Route::get('/admin/researchExcel/Gd47EQAs5', 'AdminController@researchExcel')->name('researchExcel');

Route::get('/admin/researchFindAdd/Gd47EQAs5', 'AdminController@researchFind_Add')->name('researchFind_Add');
Route::get('/admin/researchFindEdit/Gd47EQAs5/{id}', 'AdminController@researchFind_Edit')->name('researchFind_Edit');
Route::post('/admin/postresearchFindEdit/Gd47EQAs5/', 'AdminController@postresearchFindEdit')->name('postresearchFindEdit');
Route::get('/admin/researchFindDelete/Gd47EQAs5/{id}', 'AdminController@researchFindDelete')->name('researchFindDelete');

/*
TODO จัดการปริญญานิพนธ์ */
Route::get('/researchManage', 'PagesController@researchManage')->name('researchManage');
Route::get('/researchManageAdd', 'PagesController@researchManage_Add')->name('researchManage_UserAdd');
Route::get('/researchManageEdit', 'PagesController@researchManage_Edit')->name('researchManage_UserEdit');

Route::post('/postresearchManageAdd', 'PagesController@postresearchManageAdd')->name('postresearchManageAdd');
Route::post('/postresearchManageAdd2', 'PagesController@postresearchManageAdd2')->name('postresearchManageAdd2');

/*
TODO รออนุมัติปริญญานิพนธ์ */
Route::get('/admin/researchApprove/Gd47EQAs5', 'AdminController@researchApprove_Admin')->name('researchApprove_Admin');
Route::get('/admin/researchApproveDetail/Gd47EQAs5/{id}', 'AdminController@researchApproveDetail_Admin')->name('researchApproveDetail_Admin');

Route::get('/admin/postresearchApprove/Gd47EQAs5/{id}', 'AdminController@postresearchApprove')->name('postresearchApprove');


/*
! สหกิจศึกษา
TODO ขั้นตอนการดำเนินการ */
Route::get('/operationMethod', 'PagesController@operationMethod')->name('operationMethod');
Route::get('/admin/operationMethod/Gd47EQAs5', 'AdminController@operationMethod_Admin')->name('operationMethod_Admin');
Route::get('/admin/operationMethodEdit/Gd47EQAs5', 'AdminController@operationMethod_Edit')->name('operationMethod_Edit');

Route::post('/admin/postoperationMethodEdit/Gd47EQAs5', 'AdminController@postoperationMethodEdit')->name('postoperationMethodEdit');

/*
TODO ค้นหาโครงการสหกิจ */
Route::get('/operationFind', 'PagesController@operationFind')->name('operationFind');
Route::get('/operationFindDetail/{id}', 'PagesController@operationFindDetail')->name('operationFindDetail');
Route::get('/admin/operationFind/Gd47EQAs5', 'AdminController@operationFind_Admin')->name('operationFind_Admin');
Route::post('/admin/operationFindAdminSearch/Gd47EQAs5', 'AdminController@operationFindAdminSearch')->name('operationFindAdminSearch');

Route::get('/admin/operationExcelAdmin/Gd47EQAs5', 'AdminController@operationExcelAdmin')->name('operationExcelAdmin');

Route::get('/admin/operationFindAdd/Gd47EQAs5', 'AdminController@operationFind_Add')->name('operationFind_Add');
Route::get('/admin/operationFindEdit/Gd47EQAs5/{id}', 'AdminController@operationFind_Edit')->name('operationFind_Edit');
Route::get('/admin/operationFindDelete/Gd47EQAs5/{id}', 'AdminController@operationFind_Delete')->name('operationFind_Delete');
Route::post('/admin/postAdminoperationManageEdit', 'AdminController@postAdminoperationManageEdit')->name('postAdminoperationManageEdit');
Route::post('/operationFindSearch', 'PagesController@operationFindSearch')->name('operationFindSearch');

/*
TODO จัดการข้อมูลสหกิจ */
Route::get('/operationManage', 'PagesController@operationManage')->name('operationManage');
Route::post('/postoperationManageAdd', 'PagesController@postoperationManageAdd')->name('postoperationManageAdd');
Route::post('/postoperationManageEdit', 'PagesController@postoperationManageEdit')->name('postoperationManageEdit');

/*
TODO อัพโหลดไฟล์สหกิจศึกษา */
Route::get('/operationUpload', 'PagesController@operationUpload')->name('operationUpload');
Route::post('/postoperationUpload', 'PagesController@postoperationUpload')->name('postoperationUpload');

Route::get('admin/operationUploadDelete/{id}', 'AdminController@operationUploadDelete')->name('operationUploadDelete');


/*
! ติดต่อ
TODO ติดต่อภาควิชา */
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/admin/contact/Gd47EQAs5', 'AdminController@contact_Admin')->name('contact_Admin');
Route::post('/admin/postcontactEdit/Gd47EQAs5', 'AdminController@postcontactEdit')->name('postcontactEdit');


// Route::get('/admin', 'LoginAdminController@index')->name('admin');
// Route::post('/adminlogin', 'LoginAdmin@MakeLogin')->name('adminlogin');

// Route::get('/admin/login', 'LoginAdmin@showLogin')->name('showAdminLogin');
// Route::post('/admin/login', 'LoginAdmin@doLogin')->name('doAdminLogin');









// Route::view('/upload', 'upload');
// Route::post('/uploadfile', 'ProjectController@uploadfile');

// Route::get('/project/{id}/list', 'TaskController@index')->name('task.index');
// Route::get('/project/{project_id}/task/create', 'TaskController@create')->name('task.create');
// Route::post('/project/{project_id}/task/store', 'TaskController@store')->name('task.store');
// Route::get('/task/{id}/edit', 'TaskController@edit')->name('task.edit');
// Route::put('/task/{id}/update', 'TaskController@update')->name('task.update');
// Route::delete('/task/{id}/destroy', 'TaskController@destroy')->name('task.destroy');


