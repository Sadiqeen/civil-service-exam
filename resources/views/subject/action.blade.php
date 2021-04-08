<div class="d-flex">
    <a href="{{ route('subject.question.index', $id) }}">
        <i class="fas fa-eye mr-3" data-toggle="tooltip" data-placement="top" title="View {{ $name }}"></i>
    </a>
    <a href="{{ route('subject.edit', $id) }}">
        <i class="fas fa-edit mr-3" data-toggle="tooltip" data-placement="top" title="Edit {{ $name }}"></i>
    </a>
    <a href="javascript:void(0);" onclick="deleteSubject('{{ route('subject.destroy', $id) }}')">
        <i class="fas fa-trash text-danger mr-2" data-toggle="tooltip" data-placement="top"
            title="Delete {{ $name }}"></i>
    </a>
</div>
