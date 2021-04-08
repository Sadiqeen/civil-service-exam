@extends('layouts.app')

@section('content')
<div class="card">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">รายวิชา</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">เพิ่ม</a></li>
        </ol>
    </nav>

    <div class="card-body">
        <h1>เพิ่มรายวิชา</h1>
        <form action="{{ route('subject.store') }}" method="post">
            @csrf

            @include('subject.form')

            <div class="form-group">
                <a href="{{ route('subject.index') }}" class="btn btn-secondary text-white">กลับ</a>
                <button type="submit" class="btn btn-success float-right">บันทึก</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('script')
@endpush
