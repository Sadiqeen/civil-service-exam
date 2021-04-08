@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-text-light breadcrumb-primary text-white">
        <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">รายวิชา</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $subject->name }}</a></li>
    </ol>
</nav>

{{$dataTable->table()}}

<form id="delete-question" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('script')
{{$dataTable->scripts()}}

<script>
    function deleteQuestion(del) {
        $('#delete-question').attr('action', del);

        Swal.fire({
            icon: 'warning',
            title: 'Oops...?',
            text: 'Do you want to delete question?',
            showCancelButton: true,
            confirmButtonText: `Yes`,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-question').submit();
            }
        })
    }
</script>
@endpush
