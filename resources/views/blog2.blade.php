@extends('layouts.app')

@section('title', 'บทความทั้งหมด')

@section('content')
<div class="container py-5" style="margin-top: 90px; max-width: 1200px;">

    <div class="d-flex align-items-center gap-3 mb-4">
        <span class="category-tag">
            Articles Management
        </span>
        <div class="category-divider"></div>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-4 mb-4">
        <div>
            <h2 class="page-heading-lg">บทความทั้งหมด</h2>
            <p class="page-description">จัดการและตรวจสอบรายการบทความทั้งหมดในระบบ</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert-success-custom">
            <i class="bi bi-check-circle-fill alert-success-icon"></i>
            <div class="alert-success-text">{{ session('success') }}</div>
        </div>
    @endif

    @php
        $items = $blog2 ?? $blogs ?? [];
    @endphp

    @if (count($items) > 0)
        <div class="card-panel p-0 overflow-hidden shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover text-center align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="py-3 px-4 text-start">Title</th>
                         
                            <th scope="col" class="py-3">Status</th>
                            <th scope="col" class="py-3">Edit</th>
                            <th scope="col" class="py-3">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-start px-4 fw-medium text-dark">{{ $item->title }}</td>
                                <td>
                                    @if ($item->status == 1 || $item->status === 'published' || $item->status === true)
                                        <a href="{{ Route('change', $item->id) }}" class="badge-status-published">
                                            <span class="badge-dot badge-dot-green"></span>
                                            เผยแพร่
                                        </a>
                                    @else
                                        <a href="{{ Route('change', $item->id) }}" class="badge-status-draft">
                                            <span class="badge-dot badge-dot-red"></span>
                                            ไม่เผยแพร่
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ Route('edit', $item->id) }}" class="badge-status-edit">
                                        <span class="badge-dot badge-dot-orange"></span>
                                        แก้ไข
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ Route('delete', $item->id) }}" 
                                       class="btn btn-sm btn-outline-danger px-3 rounded-pill"
                                       onclick="return confirm('คุณต้องการลบบทความ {{ $item->title }} ใช่หรือไม่?');">
                                        ลบ
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

       
        <div class="d-flex justify-content-center mt-5 orange-pagination">
            {{ $items->links() }}
        </div>
    @else
       
        <div class="text-center py-5">
            <div class="empty-state-icon">
                <i class="bi bi-journal-x"></i>
            </div>
            <h4 class="empty-state-title">ไม่มีข้อมูลบทความในระบบ</h4>
            <p class="empty-state-desc">ยังไม่มีบทความใดๆ ถูกบันทึกเข้ามาในขณะนี้</p>
        </div>
    @endif

</div>
@endsection
