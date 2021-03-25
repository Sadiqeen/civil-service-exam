@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Create New Subject</h1>
        <form action="{{ route('subject.store') }}" method="post">
            @csrf

            @include('subject.form')

            <div class="form-group">
                <a href="{{ route('subject.index') }}" class="btn btn-secondary text-white">Back</a>
                <button type="submit" class="btn btn-success float-right">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('script')
@endpush
