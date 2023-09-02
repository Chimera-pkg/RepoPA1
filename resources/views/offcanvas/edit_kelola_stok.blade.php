<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasEditUserLabel" class="offcanvas-title">
            Edit Kelola Stok
        </h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif --}}


    <form class="add-new-user pt-0 form-field" id="editKelolaStok" action="{{ url('inventori/update_kelola_stok') }}" method="POST" enctype="multipart/form-data">

        @csrf


        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
        <input type="hidden" name="inventory_id" value="{{ $inventory->id }}">


        <div class="mb-3">
            <label class="form-label" for="stok">Jumlah Stok ({{ $inventory->satuan_barang }})</label>
            <input type="number" class="form-control" id="stok" placeholder="12" name="stok" value="{{ old('stok') }}" />
        </div>

        <div class="mb-3">
            <label class="form-label" for="tanggal_kelola">Tanggal Kelola</label>
            <input type=datetime-local value="2013-10-24T20:36:00" step="1" class="form-control" id="tanggal_kelola" name="tanggal_kelola" value="{{ old('tanggal_kelola') }}" />
        </div>


        <div class="mb-3">
            <label class="form-label" for="kadaluarsa_barang">Tgl Kadaluarsa</label>
            <input type="date" class="form-control" id="kadaluarsa_barang" placeholder="12" name="kadaluarsa_barang" value="{{ old('kadaluarsa_barang') }}" />
        </div>

        <div class="mb-3">
            <label class="form-label" for="satuan_barang">Satuan Barang</label>
            <input type="text" class="form-control" id="satuan_barang" placeholder="Contoh: pcs, pax, " name="satuan_barang" value="{{ old('satuan_barang') }}" />
        </div>


        <div class="mb-3">
            <label class="form-label" for="status">Pilih Kegiatan</label>
            <select id="status_edit" class="form-select" name="status_edit">
                <option value="" {{ old('status_edit') == '' ? 'selected' : '' }} disabled>---- Pilih ----
                </option>
                <option value="1" {{ old('status_edit') == '1' ? 'selected' : '' }}>Barang Masuk</option>
                <option value="0" {{ old('status_edit') == '0' ? 'selected' : '' }}>Barang Keluar</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label" for="stok">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" placeholder="Contoh: Digunakan untuk membuat tahu" name="keterangan" value="{{ old('keterangan') }}" />
        </div>


        <div id="addFieldEdit" style="display: none">
            <div class="mb-3" id="pemasok_inp">
                <label class="form-label" for="pemasok">Pemasok</label>
                <input type="text" class="form-control" id="pemasok" name="pemasok" value="{{ old('pemasok') }}" placeholder="PT. Satu bagi dua" />

                @error('pemasok')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3" id="harga_inp">
                <label class="form-label" for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" />

                @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3" id="nota_inp">
                <label class="form-label" for="nota">Nota Pembelian</label>
                <input type="file" class="form-control" id="nota" name="nota" value="" accept="image/*" />

                @error('nota')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
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