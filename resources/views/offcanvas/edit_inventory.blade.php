<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasEditUserLabel" class="offcanvas-title">
            Update Data Barang
        </h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="editNewUserForm" enctype="multipart/form-data"
            action="{{ route('inventori.update') }}" method="POST">

            @csrf

            <input type="hidden" name="id" id="id">

            <img class="center mb-2 img-preview-add" src="{{ asset('/') }}assets/img/avatars/20.png" alt=""
                style="width: 200px; height: 200px;display: block;
        margin-left: auto;
        margin-right: auto;border-radius: 100%">

            <div class="mb-3">
                <label class="form-label" for="">Foto Barang</label>
                <input type="file" class="form-control" id="avatar_add" placeholder="John Doe" name="gambar_bahan"
                    aria-label="John Doe" onchange="preview_img()" accept="image/*" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" placeholder="Botol Kaca" name="nama_barang"
                    value="{{ old('nama_barang') }}" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="satuan_bahan">Satuan Barang</label>
                <input type="text" class="form-control" id="satuan_bahan" placeholder="Contoh: Kg"
                    name="satuan_bahan" value="{{ old('satuan_bahan') }}" />
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
