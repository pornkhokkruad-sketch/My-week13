@extends('layouts.app')

@section('title', 'ประวัตินักศึกษา')

@section('content')
<div class="container page-container-lg">
    
    <!-- เส้นป้ายบอกหมวดหมู่สไตล์โมเดิร์น คุมโทนระบบ -->
    <div class="d-flex align-items-center gap-3 mb-4">
        <span class="category-tag">
            Student Profile
        </span>
        <div class="category-divider"></div>
    </div>

    <!-- หัวข้อหน้า -->
    <div class="mb-5">
        <h2 class="page-heading">ข้อมูลนักศึกษา</h2>
        <p class="page-description">ระบบจัดการและแสดงข้อมูลประวัติส่วนตัวในรูปแบบดิจิทัลโปรไฟล์</p>
    </div>

    <!-- การ์ดโปรไฟล์สไตล์ Premium Studio -->
    <div class="profile-card">
        
        <!-- แถบสีส้มเล็กๆ ด้านข้างตัวการ์ดเพิ่มกิมมิคของธีม -->
        <div class="profile-card-stripe"></div>

        <div class="row g-4 align-items-center">
            
            <!-- ฝั่งซ้าย: รูปโปรไฟล์มินิมอลขอบส้ม -->
            <div class="col-md-4 text-center text-md-start">
                <div class="profile-avatar-wrapper">
                    <div class="profile-avatar-inner">
                        <!-- ใส่รูปภาพของคุณแทนเครื่องหมาย # ตรงนี้ได้เลยครับ -->
                        <img src="#" alt="Student Photo" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" class="profile-avatar-img">
                        <div class="profile-avatar-fallback">
                            <i class="bi bi-person profile-avatar-icon"></i>
                        </div>
                    </div>
                    
                    <!-- ตรา Badge สถานะกำลังศึกษา สีเขียวมินิมอล -->
                    <span class="profile-status-badge">
                        <span class="profile-status-dot"></span>
                        Active Student
                    </span>
                </div>
            </div>

            <!-- ฝั่งขวา: ชื่อและรหัสนักศึกษาเด่นชัด -->
            <div class="col-md-8 text-center text-md-start ps-md-4 mt-5 mt-md-0">
                <div class="student-id-badge">
                    STUDENT ID: 68152310243-6
                </div>
                <h3 class="student-name">ธนภรณ์ พรโคกกรวด</h3>
                <p class="student-subname">Tanaporn Pornkhokkruad</p>
            </div>

        </div>

        <!-- เส้นคั่นบางๆ -->
        <div class="divider-subtle"></div>

        <!-- ส่วนรายละเอียดข้อมูล Grid โปร่งโล่ง สไตล์ Dashboard -->
        <div class="row g-4">
            
            <!-- ข้อมูล: ระดับการศึกษา -->
            <div class="col-sm-6 col-md-4">
                <div class="info-block">
                    <div class="info-icon"><i class="bi bi-mortarboard"></i></div>
                    <div>
                        <div class="info-label">ระดับการศึกษา</div>
                        <div class="info-value">ปริญญาตรี</div>
                    </div>
                </div>
            </div>

            <!-- ข้อมูล: คณะ -->
            <div class="col-sm-6 col-md-8">
                <div class="info-block">
                    <div class="info-icon"><i class="bi bi-building"></i></div>
                    <div>
                        <div class="info-label">คณะ / สำนัก</div>
                        <div class="info-value">Faculty of Business Administration</div>
                    </div>
                </div>
            </div>

            <!-- ข้อมูล: สาขาวิชา -->
            <div class="col-12">
                <div class="info-block">
                    <div class="info-icon"><i class="bi bi-cpu"></i></div>
                    <div>
                        <div class="info-label">สาขาวิชา / เอกวิชา</div>
                        <div class="info-value">สาขาระบบสารสนเทศ (Information Systems)</div>
                    </div>
                </div>
            </div>

            <!-- ข้อมูล: มหาวิทยาลัย -->
            <div class="col-12">
                <div class="info-block info-block-institution">
                    <div class="info-icon info-icon-white"><i class="bi bi-shield-check"></i></div>
                    <div>
                        <div class="info-label">สถาบันการศึกษา</div>
                        <div class="info-value info-value-institution">
                            มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน <br>
                            <span class="info-subvalue">Rajamangala University of Technology Isan</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection