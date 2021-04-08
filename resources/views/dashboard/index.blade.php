@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">หน้าแรก</a></li>
    </ol>
</nav>

<div class="row mt-5">
    <div class="col-md-4 text-center">
        <div class="icon-box mb-4">
            <div class="icon icon-primary mb-4">
                <span class="fas fa-book"></span>
            </div>
            <h3 class="h5 icon-box-title">รายวิชา</h3>
            <span class="counter display-3 text-gray d-block">{{$subject}}</span>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="icon-box mb-4">
            <div class="icon icon-primary mb-4">
                <span class="fas fa-question-circle"></span>
            </div>
            <h3 class="h5 icon-box-title">คำถาม</h3>
            <span class="counter display-3 text-gray d-block">{{$question}}</span>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="icon-box mb-4">
            <div class="icon icon-primary mb-4">
                <span class="fas fa-paste"></span>
            </div>
            <h3 class="h5 icon-box-title">จำนวนการโพส</h3>
            <span class="counter display-3 text-gray d-block">{{$log_post}}</span>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
</script>
@endpush
