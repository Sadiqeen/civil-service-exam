@extends('layouts.app')

@section('content')
<div class="card">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{ route('setting.index') }}">ตั้งค่า</a></li>
        </ol>
    </nav>

    <div class="card-body">
        <h1>ตั้งค่า</h1>
        <form action="{{ route('setting.update') }}" method="post">
            @csrf

            @php
            $facebook_app_id = '';
            if (old('facebook_app_id')) {
            $facebook_app_id = old('facebook_app_id');
            } elseif (isset($app_id)) {
            $facebook_app_id = $app_id->value;
            }
            @endphp
            <div class="form-group">
                <label for="">Facebook App ID</label>

                <input type="text" class="form-control @error('facebook_app_id') is-invalid @enderror"
                    value="{{ $facebook_app_id ?? '' }}" name="facebook_app_id" id="facebook_app_id" placeholder="">

                @error('facebook_app_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            @php
            $facebook_app_secret = '';
            if (old('facebook_app_secret')) {
            $facebook_app_secret = old('facebook_app_secret');
            } elseif (isset($app_secret)) {
            $facebook_app_secret = $app_secret->value;
            }
            @endphp
            <div class="form-group">
                <label for="">Facebook App Secret</label>

                <input type="text" class="form-control @error('facebook_app_secret') is-invalid @enderror"
                    value="{{ $facebook_app_secret ?? '' }}" name="facebook_app_secret" id="facebook_app_secret" placeholder="">

                @error('facebook_app_secret')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            @php
            $facebook_page_id = '';
            if (old('page')) {
            $facebook_page_id = old('facebook_page_id');
            } elseif (isset($page_id)) {
            $facebook_page_id = $page_id->value;
            }
            @endphp
            <div class="form-group">
                <label for="">Facebook Page ID</label>

                <input type="text" class="form-control @error('facebook_page_id') is-invalid @enderror"
                    value="{{ $facebook_page_id ?? '' }}" name="facebook_page_id" id="facebook_page_id" placeholder="">

                @error('facebook_page_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            @php
            $facebook_page_token = '';
            if (old('facebook_page_token')) {
            $facebook_page_token = old('facebook_page_token');
            } elseif (isset($page_token)) {
            $facebook_page_token = $page_token->value;
            }
            @endphp
            <div class="form-group">
                <label for="">Facebook Token</label>

                <textarea class="form-control @error('facebook_page_token') is-invalid @enderror" name="facebook_page_token" id="facebook_page_token" cols="30"
                    rows="5">{{ $facebook_page_token ?? '' }}</textarea>

                @error('facebook_page_token')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('script')
@endpush
