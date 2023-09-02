<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasEditUserLabel" class="offcanvas-title">
            Update Stok Barang
        </h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="editNewUserForm" enctype="multipart/form-data" action="{{ route('kelola_stok.update') }}" method="POST">
            @csrf

            <input type="hidden" name="id" id="id">

            <img class="center mb-2 img-preview-add" src="{{ asset('/') }}assets/img/avatars/20.png" alt="" style="width: 200px; height: 200px;display: block;
        margin-left: auto;
        margin-right: auto;border-radius: 100%">

            <div class="mb-3">
                <label class="form-label" for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" required id="nama_barang" placeholder="" name="nama_barang" value="{{ old('nama_barang') }}" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="stok">Stok Barang</label>
                <input type="text" readonly class="form-control" id="stok" placeholder="Input Informasi Barang" name="stok_saat_ini" value="{{ old('stok') }}" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="tambah_stok">Tambah Stok Barang</label>
                <input type="number" class="form-control" id="tambah_stok" placeholder="Input stok" name="tambah_stok" value="0" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="kurang_stok">Kurang Stok Barang</label>
                <input type="number" class="form-control" id="kurang_stok" placeholder="Input stok" name="kurang_stok" value="0" />
            </div>

            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="submitBtn">
                Submit
            </button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">
                Cancel
            </button>
        </form>
    </div>
</div>