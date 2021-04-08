<div class="d-flex">
    <a href="{{ route('subject.question.edit', [$subject_id ,$id]) }}">
        <i class="fas fa-edit mr-3" data-toggle="tooltip" data-placement="top" title="Edit {{ $question }}"></i>
    </a>
    <a href="javascript:void(0);" onclick="deleteQuestion('{{ route('subject.question.destroy', [$subject_id ,$id]) }}')">
        <i class="fas fa-trash text-danger mr-2" data-toggle="tooltip" data-placement="top"
            title="Delete {{ $question }}"></i>
    </a>
</div>
