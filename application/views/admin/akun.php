<?php $this->load->view("admin/_template/head");?>

<?php $this->load->view("admin/_template/atas");?>
<?php $this->load->view("admin/_template/nav");?>

<div class="content-wrapper">

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= ($title ?: "Dashboard") ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url('user')?>">Home</a></li>
                    <li class="breadcrumb-item active"><?= ($title ?: "Dashboard") ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary tambah">
              <i class="fa fa-plus"></i> Tambah Akun
            </button>
            <hr>
            <div class="table-responsive">
                <table id="tbl_data" class="table table-bordered">
                    <thead>
                        <tr>
                          <th width="10%">#</th>
                          <th width="30%">NAMA</th>
                          <th width="20%">USERNAME</th>
                          <th width="20%">TERAHIR LOGIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   if(!empty($record)): ?>
                            <?php $no = 1; foreach ($record as $key => $value) { ?>
                                <tr>
                                <td nowrap align="center"> 
                                    <button type="button" data-id="<?=$value->id ?>" class="btn btn-info btn-sm edit_data" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    
                                    <button type="button" data-id="<?=$value->id ?>" class="btn btn-danger btn-sm delete_data" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->username ?></td>
                                <td><?= date("d F Y H:i", strtotime($value->lastlogin)) ?></td>
                                </tr>
                            <?php } ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center">Data tidak ditemukan!!!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=site_url('admin/tambah')?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label for="nama">Nama User</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama User">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="password2">Konfirmasi Password</label>
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=site_url('admin/edit')?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label for="nama">Nama User</label>
          <input type="hidden" class="form-control" id="id1" name="id" placeholder="Nama User">
          <input type="hidden" class="form-control" id="username2" name="username2" placeholder="Nama User">
          <input type="text" class="form-control" id="nama1" name="nama" placeholder="Nama User">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username1" name="username" placeholder="Username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password1" name="password" placeholder="Isi password untuk merubahnya">
        </div>
        <div class="form-group">
          <label for="password2">Konfirmasi Password</label>
          <input type="password" class="form-control" id="password22" name="password2" placeholder="Konfirmasi Password">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>

    </div>
  </div>
</div>

<?php $this->load->view("admin/_template/foot");?>

<script>

  <?php if($this->session->flashdata('user_msg')){?>
    <?php if($this->session->flashdata('user_msg')[0] != 0){ ?>
      Swal.fire({
        title: '<?=$this->session->flashdata('user_msg')[1]?>',
        icon: 'success',
        confirmButtonText: 'Okey',
      })
     <?php }else{ ?>
      Swal.fire({
        title: '<?=$this->session->flashdata('user_msg')[1]?>',
        icon: 'error',
        confirmButtonText: 'Okey',
      })
    <?php } ?>
  <?php }?>
  $('.delete_data').click(function (e) {
    e.preventDefault()
    let id = $(this).data('id')
    Swal.fire({
      title: 'Hapus user ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Hapus',
      cancelButtonText: `Batalkan`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        // Swal.fire('Terhapus!', '', 'success')
        window.location = '<?=site_url('admin/hapus/')?>' + id
      } else {
        Swal.fire('Tidak jadi dihapus', '', 'info')
      }
    })
    // console.log(id)
  })

  $('.tambah').click(function (e){
    e.preventDefault()
    $('#exampleModal').modal('show')
  })

  $('.edit_data').click(function (e){
    e.preventDefault()
    let id = $(this).data('id')
    $.getJSON('<?=site_url('admin/getById/')?>' + id, (data) => {
      $('#id1').val(data.id)
      $('#nama1').val(data.nama)
      $('#username1').val(data.username)
      $('#username2').val(data.username)
      $('#exampleModal2').modal('show')
    });
  })
</script>
  
</body>
</html>
