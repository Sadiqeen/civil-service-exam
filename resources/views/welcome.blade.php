@extends('layouts.guest')

@section('content')
<!-- Hero -->
<div class="section section-xl bg-primary overflow-hidden">
    <div class="container z-2">
        <div class="row py-4 py-md-6 pb-1 justify-content-center text-white text-center">
            <div class="col-12 col-md-10">
                <div class="mb-3">
                    <h1 class="display-3 font-size-md-down-5 font-weight-light mb-0">แชร์ข้อสอบ <span
                            class="font-weight-bold">ราชการ</span> เพื่อติวด้วยกัน</h1>
                </div>
                <p class="my-4 px-0 px-lg-7 lead">แชร์ข้อสอบ ช่วยกันตรวจสอบ ช่วยกันอธิบาย ช่วยกันทำความเข้าใจ.
                </p>
                <a href="#add-question" class="btn btn-tertiary mr-3 animate-up-2">เพิ่มข้อสอบ</a>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<section class="section section-md pt-0" id="add-question">
    <div class="container">
        <div class="card border mt-n5 z-2">
            <div class="card-body">
                <h2 class="text-center h1 my-5">เพิ่มข้อสอบ</h2>
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <question :subjects='@json($subject)'></question>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
