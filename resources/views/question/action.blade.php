<div class="d-flex">
    <a href="{{ route('question.show', $id) }}">
        <i class="fas fa-eye mr-3" data-toggle="tooltip" data-placement="top" title="View {{ $question }}"></i>
    </a>
    <a href="{{ route('question.edit', $id) }}">
        <i class="fas fa-edit mr-3" data-toggle="tooltip" data-placement="top" title="Edit {{ $question }}"></i>
    </a>
    <a href="javascript:void(0);" onclick="deleteQuestion('{{ route('question.destroy', $id) }}')">
        <i class="fas fa-trash text-danger mr-2" data-toggle="tooltip" data-placement="top"
            title="Delete {{ $question }}"></i>
    </a>
</div>
