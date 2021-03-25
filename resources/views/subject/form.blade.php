@php
$name = '';
if (old('name')) {
$name = old('name');
} elseif (isset($subject)) {
$name = $subject->name;
}
@endphp
<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $name ?? '' }}" name="name"
        id="name" placeholder="">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

@php
$year = '';
if (old('year')) {
$year = old('year');
} elseif (isset($subject)) {
$year = $subject->year;
}
@endphp
<div class="form-group">
    <label for="">Year</label>
    <input type="text" class="form-control @error('year') is-invalid @enderror" value="{{ $year ?? '' }}" name="year"
        id="year" placeholder="">
    @error('year')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
