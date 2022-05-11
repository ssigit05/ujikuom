@if ( session('status')=='store')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil Simpan!</strong> Data berhasil disimpan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if ( session('status')=='update')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil Update!</strong> Data berhasil diubah.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if ( session('status')=='destroy')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil Hapus!</strong> Data berhasil dihapus.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if ( session('status')=='nochange')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> Data tidak ada perubahan.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if ( session('status')=='null')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Peringatan!!</strong> Jumlah Kamar Yang Tersedia Tidak Cukup.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if ( session('status')=='max')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Peringatan!!</strong> Kamar Yang Kamu Pilih Melebihi Kamar Tersedia.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif