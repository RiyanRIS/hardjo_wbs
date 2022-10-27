<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?=site_url('admin/dashboard')?>" class="nav-link <?=is_active("Dashboard", $title)?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?=site_url('pengaduan')?>" class="nav-link <?=is_active(["List Pengaduan", "Buat Pengaduan"], $title)?>">
                <i class="nav-icon fa fa-file"></i>
                <p>Pengaduan</p>
            </a>
        </li>

        <?php if($this->session->userdata('role_admin') == 1){ ?>
        <li class="nav-item">
            <a href="<?=site_url('admin/akun')?>" class="nav-link <?=is_active("Akun", $title)?>">
                <i class="nav-icon fa fa-cog"></i>
                <p>Pengaturan Akun</p>
            </a>
        </li>
        <?php } ?>

        <li class="nav-item">
            <a href="<?=site_url('auth/logout')?>" class="nav-link">
                <i class="nav-icon fa fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
        </li>

    </ul>
</nav>

</div>

</aside>