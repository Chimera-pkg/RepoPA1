<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddUserLabel" class="offcanvas-title">
            Tambah Pengajuan Barang Baru
        </h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm"
            action="{{ route('pengajuan.gudang.baru.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="nama_barang">Nama Barang Baru</label>
                <input type="text" class="form-control" id="nama_barang" placeholder="Bedak ..." name="nama_barang" value="{{ old('nama_barang') }}" />
                @error('nama_barang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="jumlah_barang">Jumlah Stok yang ingin ditambahkan</label>
                <input type="number" class="form-control" id="jumlah_barang" placeholder="123" name="jumlah_barang" value="{{ old('jumlah_barang') }}" />
                @error('jumlah_barang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="informasi_barang">Informasi Barang Baru</label>
                <input type="text" class="form-control" id="informasi_barang" placeholder="Barang bagus ..." name="informasi_barang" value="{{ old('informasi_barang') }}" />
                @error('informasi_barang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">
                Submit
            </button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">
                Cancel
            </button>
        </form>
    </div>
</div>
