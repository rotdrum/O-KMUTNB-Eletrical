@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ค้นหาโครงการสหกิจ</h1>
            <div class="manage-temp">
                <a href="{{route('operationExcelAdmin')}}" class="btn-addAboutDepartmentExcel"><i class="fas fa-file-excel"></i>Excel</a>
            </div>
        </div>

        <form class="article-container" method="POST" action="{{route('operationFindAdminSearch')}}" id="tblData">
         @csrf   
         <div class="article-tools">
                <div class="article-search">
                    <input class="search" name="search" type="search" placeholder="ค้นหาสถานประกอบการ หรือ รหัสนักศึกษา">
                    <i class="fas fa-search"></i>
                    <button>ค้นหา</button>
                </div>
            </div>



            {{-- row card --}}
            <div class="trr">
                <div class="thh">ลำดับ</div>
                <div class="thh">สถานประกอบการ</div>
                <div class="thh">ระยะเวลาออกสหกิจ</div>
                <div class="thh">ชื่อนักศึกษา</div>
                <div class="thh">รายละเอียด</div>
            </div>
            @php
                $count = 1 ;
            @endphp
            @foreach ($operations as $operation)
            <div class="trr">
                <div class="tdd">
                    <p class="th-responsive">ลำดับ</p>
                    {{ $count }}
                </div>
                <div class="tdd">
                    <p class="th-responsive">สถานะประกอบ</p>
                    {{ $operation->address }}
                </div>
                <div class="tdd">
                    <p class="th-responsive">ระยะเวลาออกสหกิจ</p>
                    {{ $operation->date_start }} ถึง  {{ $operation->date_end }}
                </div>
                <div class="tdd">
                    <p class="th-responsive">ชื่อนักศึกษา</p>
                    <p>{{ $operation->student_id }}</p>
                    <p>{{ $operation->student_name }}</p>
                </div>
                <div class="tdd">
                    <p class="th-responsive">รายละเอียด</p>
                    <div class="more">
                        <a href="{{route('operationFind_Edit', ['id'=>$operation->id])}}" class="btn-edit">แก้ไข</a>
                        <a href="{{route('operationFind_Delete', ['id'=>$operation->id])}}" class="btn-delete">ลบ</a>
                    </div>
                </div>
            </div>
            @php
                $count = $count + 1 ;
            @endphp
            @endforeach

        </form>

    </div>

    <section class="pagesNav">
        <div class="pagination-section">
            <ul class="pagination first">
                <li><a href="#"><i class="fas fa-chevron-left"></i></a></li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i></a></li>
            </ul>
            </div>
    </section>

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