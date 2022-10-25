<?php $this->load->view('header-admin.php');?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2><?= $this->session->flashdata('msg'); ?></h2>
  </div>
 <!-- Exportable Table -->
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                KOTAK MASUK LAPORAN PENGADUAN PELANGGARAN
                            </h2>
                          
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="font-size:12px;font-weight:bold;">
                                  
                                <thead>
                                        <tr>
                                            <th class="text-center">AKSI</th>
                                            <th class="text-center">NO</th>
                                            <th class="text-center">TGL</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">NAMA</th>
                                            <th class="text-center">NO HP</th>
                                            <th class="text-center">EMAIL</th>
                                            <th class="text-center">URAIAN</th>
                                            <th class="text-center">BERKAS</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody >
                                  
                                        <tr >
                                        <?php $no=1;foreach($data as $row){ ?> 
                                            <td class="text-center">
 <?php if(!empty($row->nama_berkas)){?> 
<a class="btn btn-info btn-sm" title="Unduh Berkas" href="<?= base_url('pengaduan/download/'.$row->id); ?>"><i class="material-icons">file_download</i></a>
<?php }else{} ?>

<a class="btn btn-danger btn-sm" data-toggle="modal" title="Hapus" data-target="#modal_hapus<?= $row->id;?>"><i class="material-icons">delete_forever</i></a>

<a class="btn btn-success btn-sm" title="Cetak" href="<?= base_url('pengaduan/print/'.$row->id); ?>" target="_blank"><i class="material-icons">print</i></a>

</td>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-center"><?= date('d/m/y', strtotime($row->timeinit)); ?></td>
                                            <td class="text-center"><?= $row->nik; ?></td>
                                            <td class="text-center"><?= $row->nama; ?></td>
                                            <td class="text-center"><?= $row->no_hp; ?></td>
                                            <td class="text-center"><?= $row->email; ?></td>
                                            <td class="text-center"><a type="button" class="btn btn-sm btn-default btn-circle" data-toggle="modal" title="Lihat Uraian" data-target="#modal_uraian<?= $row->id;?>"><i class="material-icons">zoom_in</i></a></td>
                                            <td class="text-center"><?php if(!empty($row->nama_berkas)){echo "Ada";}else{echo "Nihil"; } ?></td>
                                            
                                        </tr>
                                         <!-- ============ MODAL HAPUS =============== -->
        <div class="modal fade" id="modal_hapus<?= $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Laporan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?= base_url().'pengaduan/delete'?>">
                <div class="modal-body">
                    <p>Apakah Anda yakin akan menghapus laporan pengaduan atas nama <b><?= $row->nama;?></b> berikut file lampirannya? Tindakan ini tidak dapat dikembalikan.</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $row->id;?>">
                    <input type="hidden" name="nama_berkas" value="<?= $row->nama_berkas;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div> <!--END MODAL HAPUS -->

         <!-- ============ MODAL URAIAN =============== -->
         <div class="modal fade" id="modal_uraian<?= $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Detil Uraian Laporan <?= $row->nama;?></h3>
            </div>
            
                <div class="modal-body">
                    <div><?= $row->uraian;?></div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $row->id;?>">
                    <input type="hidden" name="nama_berkas" value="<?= $row->nama_berkas;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                   
                </div>
            </form>
            </div>
            </div>
        </div> <!--END MODAL URAIAN-->
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
            </div>

           
            
           <!-- Modal Dialogs ====================================================================================================================== -->
         
    </section>

    <?php $this->load->view('footer-admin.php');?>
