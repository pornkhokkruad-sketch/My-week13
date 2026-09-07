@extends('layouts.app')

@section('title', 'แก้ไขบทความ')

@section('content')
<div class="container page-container-md">
    
    <div class="d-flex align-items-center gap-3 mb-4">
        <span class="category-tag">
            Creator Studio
        </span>
        <div class="category-divider"></div>
    </div>

    <div class="mb-4">
        <h2 class="page-heading">แก้ไขบทความ</h2>
        <p class="page-description">ปรับปรุงเนื้อหาบทความให้ทันสมัยและถูกต้องอยู่เสมอ</p>
    </div>

    @if(session('success'))
        <div class="alert-success-custom">
            <i class="bi bi-check-circle-fill alert-success-icon"></i>
            <div class="alert-success-text">{{ session('success') }}</div>
        </div>
    @endif

    <div class="card-panel">
        <form action="{{ route('update', $blog->id) }}" method="POST">
            @csrf

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
                    value="{{ old('title', $blog->title) }}"
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
                    placeholder="เริ่มเขียนเนื้อหารายละเอียดของบทความที่นี่...">{{ old('content', $blog->content) }}</textarea>

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
                    <i class="bi bi-file-earmark-check fs-5"></i> บันทึกการแก้ไข
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

    // เช็คทันทีตอนโหลดหน้า เผื่อมีค่าเดิมของบทความอยู่แล้ว
    document.addEventListener('DOMContentLoaded', checkTitleLength);
</script>
@endsection