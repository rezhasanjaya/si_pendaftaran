<div class="d-flex">
    <a href="{{ route('calon-siswa.show', $uuid) }}" data-toggle="tooltip" data-original-title="Detail" class="btn btn-xs text-primary me-1">
        <i class="fa fa-info fa-lg fa-fw"></i>
    </a>
    <form action="{{ route('calon-siswa.unapprove', $uuid) }}" method="POST" class="me-1" data-toggle="tooltip" data-original-title="Batal Konfirmasi">
        @csrf
        @method('PUT')
        <button type="submit" name="submit" class="btn float-right btn-xs text-secondary px-3 btn">
            <i class="fa fa-arrow-left fa-lg fa-fw"></i>
        </button>
    </form>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
