@extends('layouts.app')

@section('title')
    เกี่ยวกับเรา
@endsection

@section('content')
<div class="container page-container-xl">
    
    <!-- เส้นป้ายบอกหมวดหมู่สไตล์โมเดิร์น -->
    <div class="d-flex align-items-center gap-3 mb-4">
        <span class="category-tag">
            ABOUT THE DEVELOPER
        </span>
        <div class="category-divider"></div>
    </div>

    <div class="row g-4">
        <!-- ฝั่งซ้าย: การ์ดโปรไฟล์ผู้พัฒนา (Profile Card) -->
        <div class="col-md-5 col-lg-4">
            <div class="card-panel">
                <div class="about-icon-badge">
                    <i class="bi bi-person-badge"></i>
                </div>
                
                <h3 class="about-card-title">ข้อมูลทั่วไป</h3>
                
                <div class="mb-3">
                    <small class="about-field-label">ผู้พัฒนาระบบ</small>
                    <span class="about-field-value">{{ $name }}</span>
                </div>
                
                <div>
                    <small class="about-field-label">วันเกิด</small>
                    <span class="about-field-value">{{ $date }}</span>
                </div>
            </div>
        </div>

        <!-- ฝั่งขวา: รายละเอียดเนื้อหาและปุ่มนำทาง (Content Card) -->
        <div class="col-md-7 col-lg-8">
            <div class="about-content-card">
                <div>
                    <h2 class="about-heading">เกี่ยวกับเรา</h2>
                    <p class="about-text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem eveniet, quis odit architecto illum dicta
                        earum totam aliquam id, corrupti consectetur delectus corporis sapiente minus. Amet optio inventore ipsa ut!
                    </p>
                </div>
                
                <!-- ปุ่มกลับหน้าแรกสไตล์ส้ม-ขาวแบบมีเงาพรีเมียม -->
                <div class="card-panel-footer">
                    <a href="/" class="btn-back-home">
                        <i class="bi bi-arrow-left"></i> กลับหน้าแรก
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection