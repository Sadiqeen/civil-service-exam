@php
$question = '';
if (old('question')) {
$question = old('question');
} elseif (isset($question_store)) {
$question = $question_store->question;
}
@endphp
<div class="form-group">
    <label for="">คำถาม</label>
    <textarea name="question" id="question"
        class="form-control @error('question') is-invalid @enderror">{{ $question ?? '' }}</textarea>
    @error('question')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

@php
$choice_1 = '';
if (old('choice_1')) {
$choice_1 = old('choice_1');
} elseif (isset($question_store)) {
$choice_1 = $question_store->answer[0]->answer;
}
@endphp
<div class="form-group">
    <label for="">ตัวเลือกที่ 1</label>
    <input type="text" class="form-control @error('choice_1') is-invalid @enderror" value="{{ $choice_1 ?? '' }}"
        name="choice_1" id="choice_1" placeholder="">
    @error('choice_1')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

@php
$choice_2 = '';
if (old('choice_2')) {
$choice_2 = old('choice_2');
} elseif (isset($question_store)) {
$choice_2 = $question_store->answer[1]->answer;
}
@endphp
<div class="form-group">
    <label for="">ตัวเลือกที่ 2</label>
    <input type="text" class="form-control @error('choice_2') is-invalid @enderror" value="{{ $choice_2 ?? '' }}"
        name="choice_2" id="choice_2" placeholder="">
    @error('choice_2')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

@php
$choice_3 = '';
if (old('choice_3')) {
$choice_3 = old('choice_3');
} elseif (isset($question_store)) {
$choice_3 = $question_store->answer[2]->answer;
}
@endphp
<div class="form-group">
    <label for="">ตัวเลือกที่ 3</label>
    <input type="text" class="form-control @error('choice_3') is-invalid @enderror" value="{{ $choice_3 ?? '' }}"
        name="choice_3" id="choice_3" placeholder="">
    @error('choice_3')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>


@php
$choice_4 = '';
if (old('choice_4')) {
$choice_4 = old('choice_4');
} elseif (isset($question_store)) {
$choice_4 = $question_store->answer[3]->answer;
}
@endphp
<div class="form-group">
    <label for="">ตัวเลือกที่ 4</label>
    <input type="text" class="form-control @error('choice_4') is-invalid @enderror" value="{{ $choice_4 ?? '' }}"
        name="choice_4" id="choice_4" placeholder="">
    @error('choice_4')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>


@php
$correct = '';
if (old('correct')) {
$correct = old('correct');
} elseif (isset($question_store)) {
for ($i=0; $i < count($question_store->answer); $i++) {
    if ($question_store->answer[$i]->is_correct) {
    $correct = $i + 1;
    }
    }
    }
    @endphp
    <div class="form-group">
        <label for="">คำตอบ</label>

        <select name="correct" id="" class="form-control @error('correct') is-invalid @enderror">
            <option value="1" {{ $correct === 1 ? "selected" : "" }}>ตัวเลือกที่ 1</option>
            <option value="2" {{ $correct === 2 ? "selected" : "" }}>ตัวเลือกที่ 2</option>
            <option value="3" {{ $correct === 3 ? "selected" : "" }}>ตัวเลือกที่ 3</option>
            <option value="4" {{ $correct === 4 ? "selected" : "" }}>ตัวเลือกที่ 4</option>
        </select>
        @error('correct')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
