<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddUserLabel" class="offcanvas-title">
            Tambah Pengguna Baru
        </h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm" enctype="multipart/form-data"
            action="{{ route('kelola_pengguna.store') }}" method="POST">

            @csrf

            <img class="center mb-2 img-preview-add" src="{{ asset('/') }}assets/img/default.jpg" alt=""
                style="width: 200px; height: 200px;display: block;
            margin-left: auto;
            margin-right: auto;border-radius: 100%">

            <div class="mb-3">
                <label class="form-label" for="">Foto Pengguna</label>
                <input type="file" class="form-control" id="avatar_add" placeholder="John Doe" name="avatar"
                    aria-label="John Doe" onchange="preview_img()" accept="image/*" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="John Doe" name="name"
                    aria-label="John Doe" value="{{ old('name') }}" />
            </div>


            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" class="form-control @error('username') invalid @enderror"
                    placeholder="abizardd_" name="username" value="{{ old('username') }}" />

                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label class="form-label" for="user-plan">Pilih Role</label>
                <select id="user-plan" class="form-select" name="role">
                    <option value="" selected disabled>---- Pilih ----</option>
                    <option value="admin">Admin</option>
                    <option value="gudang">Gudang</option>
                    <option value="manajer">Manajer</option>
                    <option value="sales">Sales</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" />
            </div>


            <div class="mb-3">
                <label class="form-label" for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control" name="confirm_password"
                    placeholder="Confirm Password" />
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
