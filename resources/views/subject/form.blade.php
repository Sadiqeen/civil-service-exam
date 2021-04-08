@php
$name = '';
if (old('name')) {
$name = old('name');
} elseif (isset($subject)) {
$name = $subject->name;
}
@endphp
<div class="form-group">
    <label for="">ชื่อวิชา</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $name ?? '' }}" name="name"
        id="name" placeholder="">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
