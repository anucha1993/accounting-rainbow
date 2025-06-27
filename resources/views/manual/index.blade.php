@extends('layouts.main')

@section('content')
<div class="container-fluid">
    {{-- Header Section --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body text-white text-center py-5">
                    <h1 class="display-4 mb-3">📚 คู่มือการใช้งานระบบ</h1>
                    <p class="lead mb-0">ศูนย์รวมคู่มือและเอกสารประกอบการใช้งานระบบ Visa Service</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Stats --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-success text-white h-100">
                <div class="card-body text-center">
                    <i class="mdi mdi-check-circle display-4 mb-3"></i>
                    <h4>1</h4>
                    <p class="mb-0">คู่มือพร้อมใช้งาน</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white h-100">
                <div class="card-body text-center">
                    <i class="mdi mdi-clock display-4 mb-3"></i>
                    <h4>3</h4>
                    <p class="mb-0">คู่มือกำลังจัดทำ</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white h-100">
                <div class="card-body text-center">
                    <i class="mdi mdi-book-open-page-variant display-4 mb-3"></i>
                    <h4>4</h4>
                    <p class="mb-0">คู่มือทั้งหมด</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-primary text-white h-100">
                <div class="card-body text-center">
                    <i class="mdi mdi-account-multiple display-4 mb-3"></i>
                    <h4>{{ Auth::user()->isAdmin ?? 'All' }}</h4>
                    <p class="mb-0">ระดับการเข้าถึง</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Manual Cards --}}
    <div class="row">
        @foreach($manuals as $manual)
        <div class="col-lg-6 col-xl-4 mb-4">
            <div class="card h-100 shadow-sm border-0 manual-card" style="transition: all 0.3s ease;">
                <div class="card-header bg-{{ $manual['color'] }} text-white">
                    <div class="d-flex align-items-center">
                        <i class="{{ $manual['icon'] }} fs-2 me-3"></i>
                        <div>
                            <h5 class="mb-0">{{ $manual['title'] }}</h5>
                            @if($manual['status'] === 'available')
                                <span class="badge bg-light text-{{ $manual['color'] }} mt-1">พร้อมใช้งาน</span>
                            @else
                                <span class="badge bg-warning text-dark mt-1">กำลังจัดทำ</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text text-muted">{{ $manual['description'] }}</p>
                    
                    @if($manual['status'] === 'available')
                        <div class="d-grid gap-2">
                            <a href="{{ route($manual['route']) }}" class="btn btn-{{ $manual['color'] }} btn-lg">
                                <i class="mdi mdi-book-open-page-variant me-2"></i>เปิดคู่มือ
                            </a>
                        </div>
                    @else
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-{{ $manual['color'] }} btn-lg" disabled>
                                <i class="mdi mdi-clock me-2"></i>กำลังจัดทำ
                            </button>
                        </div>
                        <small class="text-muted">
                            <i class="mdi mdi-information me-1"></i>
                            คู่มือนี้อยู่ระหว่างการจัดทำ จะเปิดให้ใช้งานเร็ว ๆ นี้
                        </small>
                    @endif
                </div>
                <div class="card-footer bg-light">
                    <small class="text-muted">
                        <i class="mdi mdi-update me-1"></i>
                        อัปเดตล่าสุด: {{ date('d/m/Y') }}
                    </small>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Help Section --}}
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="mdi mdi-help-circle me-2"></i>ต้องการความช่วยเหลือ?
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h6><i class="mdi mdi-phone text-success me-2"></i>ติดต่อ IT Support</h6>
                            <p class="text-muted">หากพบปัญหาทางเทคนิคหรือต้องการความช่วยเหลือ</p>
                        </div>
                        <div class="col-md-4">
                            <h6><i class="mdi mdi-email text-primary me-2"></i>ส่งข้อเสนอแนะ</h6>
                            <p class="text-muted">แนะนำการปรับปรุงคู่มือหรือฟีเจอร์ใหม่</p>
                        </div>
                        <div class="col-md-4">
                            <h6><i class="mdi mdi-book-plus text-warning me-2"></i>ขอคู่มือเพิ่มเติม</h6>
                            <p class="text-muted">หากต้องการคู่มือในหัวข้ออื่น ๆ เพิ่มเติม</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.manual-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}

.manual-card {
    cursor: default;
}

.manual-card .btn:hover {
    transform: translateY(-2px);
}

.display-4 {
    font-size: 3rem;
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2rem;
    }
    
    .lead {
        font-size: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // เอฟเฟกต์สำหรับการ์ดคู่มือ
    const cards = document.querySelectorAll('.manual-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endsection
