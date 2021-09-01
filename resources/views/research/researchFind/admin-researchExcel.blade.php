@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ข้อมูลปริญญานิพนธ์ทั้งหมด</h1>
            <div class="manage-temp">
               <!-- <a href="{{route('researchFind_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มปริญญานิพนธ์</a>  -->
                <!--
               <a href="#" class="btn-addAboutDepartmentExcel"><i class="fas fa-file-excel"></i>Excel</a>
                --> 
               <a href="{{route('researchFind_Admin')}}" class="btn-addAboutDepartment">ย้อนกลับ</a>
               <button onclick="exportTableToExcel('tblData', 'researchFind')" class="btn-addAboutDepartmentExcel"><i class="fas fa-file-excel"></i>Export Excel</button>
            
            </div>
        </div>

        <table class="article-container"  id="tblData" border="1">
            <tr>
                <td>รหัสโปรเจค</td>
                <td>ชื่อโปรเจค (ภาษาไทย)</td>
                <td>ชื่อโปรเจค (ภาษาอังกฤษ)</td>
                <td>ลักษณะปริญญานิพนธ์</td>
                <td>ประเภทโปรเจค</td>
                <td>รูปแบบปริญญานิพนธ์</td>
                <td>ปีการศึกษา</td>
                <td>ภาคเรียน</td>
                <td>ห้องเรียน</td>
                <td>ที่ปรึกษาหลัก</td>
                <td>ที่ปรึกษาร่วม</td>
                <td>นักศึกษาคนที่ 1</td>
                <td>นักศึกษาคนที่ 2</td>
                <td>นักศึกษาคนที่ 3</td>

            </tr>
            @foreach ($researchs as $research)
                
            <tr>
                <td>{{ $research->research_id }}</td>
                <td>{{ $research->thai_name }}</td>
                <td>{{ $research->eng_name }}</td>
                <td>{{ $research->research_look }}</td>
                <td>{{ $research->research_type }}</td>
                <td>{{ $research->format }}</td>
                <td>{{ $research->year }}</td>
                <td>{{ $research->term }}</td>
                <td>{{ $research->class }}</td>
                <td>{{ $research->teacherid_one }}</td>
                <td>{{ $research->teacherid_two }}</td>
                <td>{{ $research->student_one }}</td>
                <td>{{ $research->student_two }}</td>
                <td>{{ $research->student_three }}</td>

                  
            </tr>
            @endforeach

        </table>
    </div>

  

    <script src="{{ asset('js/pagesNavigation.js') }}"></script>
    <script>
        function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
    </script>
    
@endsection