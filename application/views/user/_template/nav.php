
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  <li class="nav-item">
    <a href="<?=site_url('user/index')?>" class="nav-link <?=is_active("Dashboard", $title)?>">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
    </a>
  </li>

  <li class="nav-item">
    <a href="<?=site_url('pengaduan/index')?>" class="nav-link <?=is_active(["List Pengaduan", "Buat Pengaduan"], $title)?>">
      <i class="nav-icon fa fa-file"></i>
      <p>
        Pengaduan Saya
      </p>
    </a>
  </li>

  <li class="nav-item">
    <a href="<?=site_url('user/akun')?>" class="nav-link <?=is_active("Pengaturan Akun", $title)?>">
      <i class="nav-icon fa fa-cog"></i>
      <p>
        Pengaturan Akun
      </p>
    </a>
  </li>

  <li class="nav-item">
    <a href="<?=site_url('auth/logout')?>" class="nav-link">
      <i class="nav-icon fa fa-sign-out-alt"></i>
      <p>
        Logout
      </p>
    </a>
  </li>

</ul>
</nav>

</div>

</aside>