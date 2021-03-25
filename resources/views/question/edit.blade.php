@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>Edit {{ $question_store->question }}</h1>
        <form action="{{ route('question.update', $question_store) }}" method="post">
            @csrf
            @method('PUT')

            @include('question.form')

            <div class="form-group">
                <a href="{{ route('question.index') }}" class="btn btn-secondary text-white">Back</a>
                <button type="submit" class="btn btn-success float-right">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('script')
@endpush
