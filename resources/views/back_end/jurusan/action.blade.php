<a href="{{ route('jurusan.edit', $uuid) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-xs text-primary">
    <i class="fa fa-lg fa-fw fa-pen"></i>
</a>
<a href="javascript:void(0)" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-xs text-danger">
    <i class="fa fa-lg fa-fw fa-trash"></i>
</a>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>