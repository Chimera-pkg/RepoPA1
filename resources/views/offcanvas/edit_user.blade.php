<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasEditUserLabel" class="offcanvas-title">
            Edit Data Pengguna
        </h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="editUserForm" enctype="multipart/form-data"
            action="{{ route('kelola_pengguna.update') }}" method="POST">
            @csrf

            <img class="center mb-2 img-preview" src="{{ asset('/') }}assets/img/avatars/20.png" alt=""
                style="width: 200px; height: 200px;display: block;
            margin-left: auto;
            margin-right: auto;border-radius: 100%">

            <input type="hidden" name="avatar_old" id="avatar_old">
            <input type="hidden" name="id_user" id="id_user">
            <input type="hidden" name="password_old" id="password_old">

            <div class="mb-3">
                <label class="form-label" for="">Foto Pengguna</label>
                <input type="file" class="form-control" id="avatar" placeholder="John Doe" name="avatar"
                    aria-label="John Doe" onchange="preview_img_2()" accept="image/*" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="John Doe" name="name"
                    aria-label="John Doe" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" class="form-control" placeholder="abizardd_" name="username" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="user-plan">Pilih Role</label>
                <select id="role" class="form-select" name="role">
                    <option value="" selected disabled>---- Pilih ----</option>
                    <option value="admin">Admin</option>
                    <option value="gudang">Gudang</option>
                    <option value="manajer">Manajer</option>
                    <option value="kasir">Kasir</option>
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
