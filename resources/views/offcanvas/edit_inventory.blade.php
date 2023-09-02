<!-- Offcanvas to add new user -->
<div class="modal-dialog modal-dialog-scrollable modal-fullscreen" style="float: right; width: 65vh; height: 100vh;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Data Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="add-new-user pt-0" id="addNewUserForm" enctype="multipart/form-data" action="{{ route('inventori.update') }}" method="POST">

                @csrf

                <input type="hidden" name="id" value="{{$data->id}}">

                <img class="center mb-2 img-preview" src="{{ asset('/') }}assets/img/bahan/{{$data->gambar_barang}}" alt="" style="width: 200px; height: 200px;display: block;
margin-left: auto;
margin-right: auto;border-radius: 100%">

                <div class="mb-3">
                    <label class="form-label" for="">Foto Barang</label>
                    <input type="file" class="form-control" id="avatar" placeholder="John Doe" name="gambar_barang" aria-label="John Doe" onchange="preview_img_2()" accept="image/*" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nomor_notifikasi">Nomor Notifikasi</label>
                    <input type="text" class="form-control" id="nomor_notifikasi" required placeholder="" name="nomor_notifikasi" value="{{ $data->nomor_notifikasi }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" required placeholder="" name="nama_barang" value="{{ $data->nama_barang }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="kadaluarsa_barang">Tgl Kadaluarsa</label>
                    <input type="date" class="form-control" id="kadaluarsa_barang" required placeholder="12" name="kadaluarsa_barang" value="{{ $data->kadaluarsa_barang }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="satuan_barang">Satuan Barang</label>
                    <input type="text" class="form-control" id="satuan_barang" placeholder="Contoh: pcs, pax" required name="satuan_barang" value="{{ $data->kadaluarsa_barang }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="kondisi_barang">Kondisi Barang</label>
                    <select id="kondisi_barang" class="form-select" name="kondisi_barang" required>
                        <option value="" selected disabled>---- Pilih ----</option>
                        <option value="1" {{($data->status_barang == '1') ? 'selected' : ''}}>Bagus</option>
                        <option value="2" {{($data->status_barang == '2') ? 'selected' : ''}}>Rusak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="id_supplier">Supplier</label>
                    <select id="id_supplier" class="form-select" name="id_supplier" required>
                        <option value="" selected disabled>---- Pilih ----</option>
                        @foreach($supplier as $supplier)
                        <option value="{{$supplier->id}}" {{($data->id_supplier == $supplier->id) ? 'selected' : ''}}>{{$supplier->nama}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="infomasi_barang">Informasi Barang</label>
                    <input type="text" class="form-control" id="infomasi_barang" required placeholder="Input Informasi Barang" name="infomasi_barang" value="{{$data->informasi_barang}}" />
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