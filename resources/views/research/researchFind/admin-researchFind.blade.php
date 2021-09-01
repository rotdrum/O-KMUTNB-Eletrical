@extends('layouts.admin-app')

@section('content')
    <div class="vue-container">
        <div class="title-head">
            <h1>ค้นหาปริญญานิพนธ์</h1>
            <div class="manage-temp">
               <!-- <a href="{{route('researchFind_Add')}}" class="btn-addAboutDepartment"><i class="fas fa-plus-circle"></i>เพิ่มปริญญานิพนธ์</a>  -->
               <a href="{{route('researchExcel')}}" class="btn-addAboutDepartmentExcel"><i class="fas fa-file-excel"></i>Excel</a>
            
            </div>
        </div>

        <div class="article-container" >
       
            <div class="article-tools">
                <!--
                <p class="article-p header1">ค้นหาปริญญานิพนธ์</p>
                -->
                <form method="POST" action="{{ route('researchFindAdminSearch') }}">
                @csrf
                    <div class="article-search">
                        <input class="search" type="search" name="search" placeholder="ค้นหา ชื่อปริญญานิพนธ์ หรือ ชื่อนักศึกษา หรือ ปีการศึกษา">
                        <i class="fas fa-search"></i>
                        <button>
                            <i class="fas fa-search-plus"></i>
                            ค้นหา
                        </button>
                    </div>
                </form>

                <p class="article-p header2">คัดแยกปริญญานิพนธ์</p>
                <form method="POST" action="{{ route('researchFindAdminSearchSelect') }}">
                @csrf
                    <div class="article-filter">
                    <select name="file_type" class="adviser" required >
                        <option value="">--สถานะปริญญานิพนธ์---</option>
                        <option value="หัวข้อปริญญานิพนธ์">ผ่านหัวข้อปริญญานิพนธ์</option>
                        <option value="ก้าวหน้าปริญญานิพนธ์">ผ่านก้าวหน้าปริญญานิพนธ์</option>
                        <option value="ป้องกันปริญญานิพนธ์">ผ่านป้องกันปริญญานิพนธ์</option>
                        <option value="ปริญญานิพนธ์ฉบับสมบูรณ์">ปริญญานิพนธ์ฉบับสมบูรณ์</option>

                    </select>
         
                    <select name="teacher" class="adviser" required>
                        <option value="">---อาจารย์ที่ปรึกษาหลัก/ร่วม---</option>
                        @foreach ($personals as $personal)
                            <option value="{{ $personal->id }}">{{ $personal->name_thai }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-filter-search"><i class="fas fa-filter"></i> กรอง</button>
                </div>

            </form>
        
            </div>




            <div class="tr">
                <div class="th">ลำดับ</div>
                <div class="th">รหัส ปพ.</div>
                <div class="th">ปีการศึกษา</div>
                <div class="th">ชื่อปริญญานิพนธ์</div>
                <div class="th">นักศึกษา</div>
                <div class="th">สถานะ</div>
                <div class="th">อัพเดทล่าสุด</div>
                <div class="th">รายละเอียด</div>
            </div>
            @php
                $count = 1; 
            @endphp
            @foreach ($researchs as $research)


            <div class="tr">
                <div class="td">
                    <p class="th-responsive">ลำดับ</p>
                    {{ $count }}
                </div>
                <div class="td">
                    <p class="th-responsive">รหัส ปพ.</p>
                    {{ $research->research_id }}
                </div>
                <div class="td">
                    <p class="th-responsive">ปีการศึกษา</p>
                    {{ $research->year }}
                </div>
                <div class="td">
                    <p class="th-responsive">ชื่อปริญญานิพนธ์</p>
                    {{ $research->thai_name }}
                </div>
                <div class="td">
                    <p class="th-responsive">นักศึกษา</p>
                    <p>{{ $research->student_one }}</p>
                    <p>{{ $research->student_two }}</p>
                    <p>{{ $research->student_three }}</p>

                </div>
                <div class="td">
                    <p class="th-responsive">สถานะ</p>
                    <div class="th-status">
                        <span class="step1"></span>
                        <p class="step1">ผ่าน{{ $research->file_type }}</p>
                    </div>
                </div>
                <div class="td">
                    <p class="th-responsive">อัพเดทล่าสุด</p>
                    {{ $research->updated_at }}
                </div>
                <div class="td">
                    <p class="th-responsive">รายละเอียด</p>
                    <div class="btn-admin-commit">
                        <a class="btn-read" href="{{route('AdminresearchFindDetail', ['id' => $research->id ] )}}">เพิ่มเติม</a>
                        <a class="btn-read" style="background-color: #e74c3c;" href="{{route('researchFindDelete', ['id' => $research->id ] )}}">ลบ</a>
                    </div>
                </div>
            </div>
            @php
                $count = $count +  1; 
            @endphp

            @endforeach


   

        </div>

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