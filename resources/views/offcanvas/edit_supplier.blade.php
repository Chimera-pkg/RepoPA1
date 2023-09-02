<div class="modal-dialog modal-dialog-scrollable modal-fullscreen" style="float: right; width: 65vh; height: 100vh;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Supplier</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" action="{{ route('supplier.update',$data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="{{$data->nama}}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="no_telp">No Telp</label>
                    <input type="text" class="form-control" id="no_telp" placeholder="" name="no_telp" value="{{$data->no_telp}}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$data->alamat}}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="status">Status</label>
                    <select id="status" class="form-select" name="status" required>
                        <option value="" selected disabled>---- Pilih ----</option>
                        <option value="1" {{ ($data->status == '1') ? 'selected' : '' }}>Aktif</option>
                        <option value="2" {{ ($data->status == '2') ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <input type="submit" class="btn btn-primary" value="Submit">
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
            </form>
        </div>
        <div class="modal-footer justify-content-start">
        </div>
    </div>
</div>