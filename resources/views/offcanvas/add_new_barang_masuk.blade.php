<div class="modal-dialog modal-dialog-scrollable modal-fullscreen" style="float: right; width: 65vh; height: 100vh;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Masuk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="add-new-user pt-0" id="addNewUserForm" enctype="multipart/form-data" action="{{ route('barang_masuk.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label" for="id_inventory">Nama Barang</label>
                    <select id="id_inventory" class="form-select" name="id_inventory" required>
                        <option value="" selected disabled>---- Pilih ----</option>
                        @foreach($inventori as $inventori)
                        <option value="{{$inventori->id}}">{{$inventori->nama_barang}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="jumlah">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" placeholder="" name="jumlah" value="" required />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="harga_satuan">Harga Satuan</label>
                    <input type="text" class="form-control" id="harga_satuan" placeholder="" name="harga_satuan" value="" required />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tanggal">Tanggal Kelola</label>
                    <input type="date" class="form-control" id="tanggal" placeholder="12" name="tanggal" required />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="jam">Jam Kelola</label>
                    <input type="time" class="form-control" id="jam" placeholder="12" name="jam" required />
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