<div class="d-flex">
  <a href="{{ route('pengumuman.show', $uuid) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-xs text-info me-1">
      <i class="fa fa-edit fa-lg fa-fw"></i>
  </a>
  @if ($is_publish == 1)
  <form action="{{ route('pengumuman.turunkanTayang', $uuid) }}" method="POST" style="display: inline;">
      @csrf
      @method('PATCH')
      <button type="submit" class="btn btn-xs text-warning" data-toggle="tooltip" data-original-title="Turunkan Tayang">
          <i class="fa fa-eye-slash fa-lg fa-fw"></i>
      </button>
  </form>
  @else
  <form action="{{ route('pengumuman.tayangkanPengumuman', $uuid) }}" method="POST" style="display: inline;">
      @csrf
      @method('PATCH')
      <button type="submit" class="btn btn-xs text-success" data-toggle="tooltip" data-original-title="Tayangkan Berita">
          <i class="fa fa-eye fa-lg fa-fw"></i>
      </button>
  </form>
  @endif
  <button type="button" class="btn btn-xs text-danger delete-btn" data-toggle="tooltip" data-original-title="Hapus" data-target="#hapusModal{{ $uuid }}" data-uuid="{{ $uuid }}">
      <i class="fa fa-lg fa-fw fa-trash"></i>
  </button>
</div>

 <!-- Modal Hapus -->
<div class="modal fade" id="hapusModal{{ $uuid }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $uuid }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="hapusModalLabel{{ $uuid }}">Hapus</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Yakin Ingin Menghapus Data ?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
              <form action="{{ route('pengumuman.destroy', $uuid) }}" method="POST" class="me-1">
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
<script>
  $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();

      $('.delete-btn').on('click', function () {
          var uuid = $(this).data('uuid');
          $('#hapusModal' + uuid).modal('show');
      });
  });
</script>