@extends('layouts.app')

@section('title', 'แจ้งเคลมสินค้าชำรุด')

@section('content')
<div class="container page-container-sm">

    <!-- เส้นป้ายบอกหมวดหมู่สไตล์โมเดิร์น คุมโทนระบบ -->
    <div class="d-flex align-items-center gap-3 mb-4">
        <span class="category-tag">
            Support & Services
        </span>
        <div class="category-divider"></div>
    </div>

    <!-- หัวข้อหน้า -->
    <div class="mb-4">
        <h2 class="page-heading">แจ้งเคลมสินค้าชำรุด</h2>
        <p class="page-description">กรอกข้อมูลรหัสสินค้าและอธิบายอาการชำรุดเพื่อส่งเรื่องให้เจ้าหน้าที่ตรวจสอบ</p>
    </div>

    <!-- แจ้งเตือนเมื่อบันทึกสำเร็จ (ดีไซน์มินิมอล) -->
    @if (session('success'))
        <div class="alert-success-custom">
            <i class="bi bi-check-circle-fill alert-success-icon"></i>
            <div class="alert-success-text">{{ session('success') }}</div>
        </div>
    @endif

    <!-- กล่องฟอร์มดีไซน์พรีเมียมคลีน -->
    <div class="card-panel">
        <form action="{{ route('claim.store') }}" method="POST">
            @csrf

            <!-- ฟิลด์: รหัสสินค้า -->
            <div class="mb-4">
                <label class="form-label form-label-custom">
                    รหัสสินค้า (Serial Number) <span class="text-danger">*</span>
                </label>
                <input
                    type="text"
                    name="serial_number"
                    class="form-control custom-input @error('serial_number') is-invalid @enderror"
                    value="{{ old('serial_number') }}"
                    placeholder="เช่น SN12345678">
                
                @error('serial_number')
                    <div class="invalid-feedback invalid-feedback-custom">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ฟิลด์: อีเมลผู้ติดต่อ -->
            <div class="mb-4">
                <label class="form-label form-label-custom">
                    อีเมลผู้ติดต่อ <span class="text-danger">*</span>
                </label>
                <input
                    type="email"
                    name="email"
                    class="form-control custom-input @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    placeholder="example@mail.com">
                
                @error('email')
                    <div class="invalid-feedback invalid-feedback-custom">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ฟิลด์: อาการชำรุด -->
            <div class="mb-4">
                <label class="form-label form-label-custom">
                    อาการชำรุด <span class="text-danger">*</span>
                </label>
                <textarea
                    name="issue_description"
                    rows="4"
                    class="form-control custom-textarea @error('issue_description') is-invalid @enderror"
                    placeholder="ระบุรายละเอียดอาการชำรุดอย่างน้อย 10 ตัวอักษร...">{{ old('issue_description') }}</textarea>
                
                @error('issue_description')
                    <div class="invalid-feedback invalid-feedback-custom">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ฟิลด์: ระดับความเร่งด่วน -->
            <div class="mb-4">
                <label class="form-label form-label-custom">
                    ระดับความเร่งด่วน <span class="text-danger">*</span>
                </label>
                <select
                    name="urgency_level"
                    class="form-select custom-input @error('urgency_level') is-invalid @enderror">
                    <option value="" disabled {{ old('urgency_level') ? '' : 'selected' }}>-- กรุณาเลือกระดับความเร่งด่วน --</option>
                    <option value="low"    {{ old('urgency_level') == 'low'    ? 'selected' : '' }}>ต่ำ</option>
                    <option value="medium" {{ old('urgency_level') == 'medium' ? 'selected' : '' }}>ปานกลาง</option>
                    <option value="high"   {{ old('urgency_level') == 'high'   ? 'selected' : '' }}>สูง</option>
                </select>
                
                @error('urgency_level')
                    <div class="invalid-feedback invalid-feedback-custom">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ปุ่มส่งข้อมูล -->
            <div class="pt-2">
                <button type="submit" class="btn-submit-full">
                    <i class="bi bi-send-check fs-5"></i> ส่งข้อมูลแจ้งเคลมสินค้า
                </button>
            </div>

        </form>
    </div>
</div>
@endsection