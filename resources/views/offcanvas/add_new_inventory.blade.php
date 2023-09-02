<div class="modal-dialog modal-dialog-scrollable modal-fullscreen" style="float: right; width: 65vh; height: 100vh;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="add-new-user pt-0" id="addNewUserForm" enctype="multipart/form-data" action="{{ route('inventori.store') }}" method="POST">

                @csrf

                <img class="center mb-2 img-preview" src="{{ asset('/') }}assets/img/default.jpg" alt="" style="width: 200px; height: 200px;display: block;
            margin-left: auto;
            margin-right: auto;border-radius: 100%">

                <div class="mb-3">
                    <label class="form-label" for="">Foto Barang</label>
                    <input type="file" class="form-control" id="avatar" required placeholder="John Doe" name="gambar_barang" aria-label="John Doe" onchange="preview_img_2()" accept="image/*" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nomor_notifikasi">Nomor Notifikasi</label>
                    <input type="text" class="form-control" id="nomor_notifikasi" required placeholder="" name="nomor_notifikasi" value="{{ old('nomor_notifikasi') }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" required placeholder="" name="nama_barang" value="{{ old('nama_barang') }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="kadaluarsa_barang">Tgl Kadaluarsa</label>
                    <input type="date" class="form-control" id="kadaluarsa_barang" required placeholder="12" name="kadaluarsa_barang" value="{{ old('kadaluarsa_barang') }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" required placeholder="12" name="stok" value="{{ old('stok') }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="satuan_barang">Satuan Barang</label>
                    <input type="text" class="form-control" id="satuan_barang" placeholder="Contoh: pcs, pax" required name="satuan_barang" value="{{ old('satuan_barang') }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="kondisi_barang">Kondisi Barang</label>
                    <select id="kondisi_barang" class="form-select" name="kondisi_barang" required>
                        <option value="" selected disabled>---- Pilih ----</option>
                        <option value="1">Bagus</option>
                        <option value="2">Rusak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="id_supplier">Supplier</label>
                    <select id="id_supplier" class="form-select" name="id_supplier" required>
                        <option value="" selected disabled>---- Pilih ----</option>
                        @foreach($supplier as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->nama}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="infomasi_barang">Informasi Barang</label>
                    <input type="text" class="form-control" id="infomasi_barang" required placeholder="Input Informasi Barang" name="infomasi_barang" value="{{ old('informasi_barang') }}" />
                </div>

                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="submitBtn">
                    Submit
                </button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
            </form>
        </div>
    </div>
</div>