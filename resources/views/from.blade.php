@extends('layouts.app')

@section('title', 'เขียนบทความ')

@section('content')
<div class="container page-container-md">
    
    <!-- เส้นป้ายบอกหมวดหมู่สไตล์โมเดิร์น -->
    <div class="d-flex align-items-center gap-3 mb-4">
        <span class="category-tag">
            Creator Studio
        </span>
        <div class="category-divider"></div>
    </div>

    <!-- หัวข้อหน้า -->
    <div class="mb-4">
        <h2 class="page-heading">เขียนบทความใหม่</h2>
        <p class="page-description">สร้างสรรค์เนื้อหาใหม่และแบ่งปันเรื่องราวของคุณลงในระบบ</p>
    </div>

    <!-- แจ้งเตือนเมื่อบันทึกสำเร็จ (ดีไซน์มินิมอล) -->
    @if(session('success'))
        <div class="alert-success-custom">
            <i class="bi bi-check-circle-fill alert-success-icon"></i>
            <div class="alert-success-text">{{ session('success') }}</div>
        </div>
    @endif

    <!-- กล่องฟอร์มสไตล์ Dashboard พรีเมียม -->
    <div class="card-panel">
        <form action="{{ route('insert') }}" method="POST">
            @csrf

            <!-- ฟิลด์: ชื่อบทความ -->
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label form-label-custom mb-0">ชื่อบทความ</label>
                    <small id="titleCounter" class="char-counter"></small>
                </div>

                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control custom-input @error('title') is-invalid @enderror"
                    value="{{ old('title') }}"
                    maxlength="150"
                    placeholder="ตั้งชื่อหัวข้อบทความให้น่าสนใจ..."
                    oninput="checkTitleLength()">

                @error('title')
                    <div class="invalid-feedback invalid-feedback-custom">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ฟิลด์: เนื้อหา -->
            <div class="mb-4">
                <label class="form-label form-label-custom">เนื้อหาบทความ</label>

                <textarea
                    name="content"
                    rows="7"
                    class="form-control custom-textarea @error('content') is-invalid @enderror"
                    placeholder="เริ่มเขียนเนื้อหารายละเอียดของบทความที่นี่...">{{ old('content') }}</textarea>

                @error('content')
                    <div class="invalid-feedback invalid-feedback-custom">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ปุ่มควบคุมด้านล่าง -->
            <div class="d-flex align-items-center justify-content-between pt-3 border-top">
                <a href="{{ url('/blog') }}" class="btn-cancel">
                    ยกเลิก
                </a>
                
                <button type="submit" class="btn-submit">
                    <i class="bi bi-file-earmark-check fs-5"></i> บันทึกบทความ
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    function checkTitleLength() {
        const input = document.getElementById('title');
        const counter = document.getElementById('titleCounter');
        const length = input.value.length;
        const limit = 50;

        counter.textContent = length + ' / ' + limit;

        if (length > limit) {
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
            counter.style.color = '#dc2626';
        } else if (length > 0) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            counter.style.color = '#16a34a';
        } else {
            input.classList.remove('is-invalid');
            input.classList.remove('is-valid');
            counter.style.color = '#94a3b8';
        }
    }

    // เช็คทันทีตอนโหลดหน้า เผื่อมีค่าเก่าจาก old('title') ค้างอยู่
    document.addEventListener('DOMContentLoaded', checkTitleLength);
</script>
@endsection