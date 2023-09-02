<div class="modal-dialog modal-dialog-scrollable modal-fullscreen" style="float: right; width: 65vh; height: 100vh;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Input Pesan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="add-new-user pt-0" id="editNewUserForm" enctype="multipart/form-data" action="{{ route('pesan.store') }}" method="POST">
                @csrf

                <input type="hidden" name="id" id="id" value="{{ $data->barang->id  }}">

                <img class="center mb-2 img-preview" src="{{ asset('/') }}assets/img/bahan/{{$data->barang->gambar_barang}}" alt="" style="width: 200px; height: 200px;display: block;
margin-left: auto;
margin-right: auto;border-radius: 100%">

                <div class="mb-3">
                    <div class="mb-3">
                        <label class="form-label" for="id_inventory">Nama Barang</label>
                        <input type="text" readonly class="form-control" id="stok" placeholder="Input Informasi Barang" name="stok_saat_ini" value="{{ $data->barang->nama_barang }}" />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="stok">Stok Barang</label>
                    <input type="text" readonly class="form-control" id="stok" placeholder="Input Informasi Barang" name="stok_saat_ini" value="{{ $data->barang->stok_barang }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="kadaluarsa_barang">Tgl Kadaluarsa</label>
                    <input type="date" readonly class="form-control" id="kadaluarsa_barang" placeholder="12" name="kadaluarsa_barang" value="{{ $data->barang->kadaluarsa_barang }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="pesan">Pesan</label>
                    <input type="text" class="form-control" id="pesan" placeholder="Input Pesan" name="pesan" required />
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
</div>