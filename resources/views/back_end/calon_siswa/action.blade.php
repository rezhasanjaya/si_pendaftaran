<div class="d-flex">
  <form action="{{ route('calon-siswa.update', $uuid) }}" method="POST" class="me-1" data-toggle="tooltip" data-original-title="Setujui">
      @csrf
      @method('PUT')
      <button type="submit" name="submit" class="btn btn-xs text-success"> 
          <i class="fa fa-lg fa-fw fa-check"></i>
      </button>
  </form>
  <form action="{{ route('calon-siswa.tolakBerkas', $uuid) }}" method="POST" class="me-1" data-toggle="tooltip" data-original-title="Tolak Berkas">
      @csrf
      @method('PUT')
      <button type="submit" name="submit" class="btn btn-xs text-secondary"> 
          <i class="fa fa-lg fa-fw fa-times"></i>
      </button>
  </form>
  <a href="{{ route('calon-siswa.show', $uuid) }}" data-toggle="tooltip" data-original-title="Detail" class="btn btn-xs text-primary me-1">
      <i class="fa fa-info fa-lg fa-fw"></i>
  </a>

  <button type="button" class="btn btn-xs text-danger delete-button" data-id="{{ $uuid }}" data-toggle="tooltip" data-original-title="Hapus" data-target="#deleteModal-{{ $uuid }}">
    <i class="fa fa-lg fa-fw fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="deleteModal-{{ $uuid }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $uuid }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-{{ $uuid }}">Hapus Sebagai Spam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin Ingin Menghapus Data ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <form action="{{ route('calon-siswa.handleSpam', $uuid) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="submit" class="btn float-right btn-sm btn-success px-3"> 
                        <b>Ya</b>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
      // Tooltip initialization
      $('[data-toggle="tooltip"]').tooltip();
      
      // Handle delete button click
      $('body').on('click', '.delete-button', function () {
          var uuid = $(this).data('id');
          var modal = $('#deleteModal-' + uuid);

          // Set form action dynamically
          var form = modal.find('.delete-form');
          var action = form.attr('action');
          form.attr('action', action.replace(':uuid', uuid));

          // Show the modal
          modal.modal('show');
      });
  });
</script>