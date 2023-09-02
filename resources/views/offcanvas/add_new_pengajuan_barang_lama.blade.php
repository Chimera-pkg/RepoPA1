<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddUserLabel" class="offcanvas-title">
            Tambah Pengajuan Barang Lama
        </h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm"
            action="{{ route('pengajuan.store') }}" method="POST">

            @csrf
            <div class="mb-3">
                <label class="form-label" for="id_inventory">Pilih Barang</label>
                <select id="id_inventory" class="form-select" name="id_inventory">
                    <option selected disabled>---- Pilih ----</option>
                    @foreach ($inventories as $inventory)
                        <option value="{{ $inventory->id  }}">{{ $inventory->nama_barang }} (Stok : {{ $inventory->stok_barang }})</option>
                    @endforeach
                </select>
                @error('id_inventory')
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
            <!-- Fitur Baru -->
            <div class="mb-3">
    <label class="form-label" for="supplier">Supplier</label>
    <select id="id_supplier" class="form-select" name="id_supplier" required>
        <option value="" selected disabled>---- Pilih ----</option>
        @foreach($supplier as $supplier)
        <option value="{{$supplier->id}}">{{$supplier->nama}}</option>
        @endforeach
    </select>
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
