@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>{{ $subject->name }}</h1>
    </div>
</div>
@endsection

@push('script')
@endpush
