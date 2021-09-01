@extends('layouts.admin-app')

@section('content')
<div class="vue-container">
    <div class="title-head">
        <h1>ข้อมูลสหกิจทั้งหมด</h1>
        <div class="manage-temp">
           <!-- <a href="{{route('researchFind_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มปริญญานิพนธ์</a>  -->
            <!--
           <a href="#" class="btn-addAboutDepartmentExcel"><i class="fas fa-file-excel"></i>Excel</a>
            --> 
           <a href="{{route('operationFind_Admin')}}" class="btn-addAboutDepartment">ย้อนกลับ</a>
           <button onclick="exportTableToExcel('tblData', 'operationFind')" class="btn-addAboutDepartmentExcel"><i class="fas fa-file-excel"></i>Export Excel</button>
        
        </div>
    </div>

    <table class="article-container"  id="tblData" border="1">
        <tr>
            <td>รหัสนักศึกษา</td>
            <td>ชื่อ-สกุล</td>
            <td>สาขา</td>
            <td>เบอร์โทรศัพท์</td>
            <td>อีเมล</td>
            <td>ชื่อสถานที่ฝึกงาน</td>
            <td>ประเภท</td>
            <td>วันเริ่ม</td>
            <td>วันสิ้นสุด</td>
            <td>นำเสนอ</td>
            <td>พี่เลี้ยง</td>
            <td>เบอร์โทรศัพท์พี่เลี้ยง</td>
        </tr>
        @foreach ($operations as $operation)
        <tr>
            <td>{{ $operation->student_id }}</td>
            <td>{{ $operation->student_name }}</td>
            <td>{{ $operation->sub }}</td>
            <td>{{ $operation->tel }}</td>
            <td>{{ $operation->email }}</td>
            <td>{{ $operation->address }}</td>
            <td>{{ $operation->type_address }}</td>
            <td>{{ $operation->date_start }}</td>
            <td>{{ $operation->date_end }}</td>
            <td>{{ $operation->name_to }}</td>
            <td>{{ $operation->name_subport }}</td>
            <td>{{ $operation->tel_subport }}</td>
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