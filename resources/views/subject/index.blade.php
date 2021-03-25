@extends('layouts.app')

@section('content')
{{$dataTable->table()}}

<form id="delete-subject" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('script')
{{$dataTable->scripts()}}

<script>
    function deleteSubject(del) {
        $('#delete-subject').attr('action', del);

        Swal.fire({
            icon: 'warning',
            title: 'Oops...?',
            text: 'Do you want to delete subject?',
            showCancelButton: true,
            confirmButtonText: `Yes`,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-subject').submit();
            }
        })
    }
</script>
@endpush
