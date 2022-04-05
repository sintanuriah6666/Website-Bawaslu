<section class="content-header">
    <h1>Data Jabatan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Jabatan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<?php  ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success');?>"></div>
	<div class="box">
        <div class="box-header">
            
            <h3 class="box-title">Data TTD</h3>
            
               <?php $this->view('peringatan') ?>

            <u>
            </u>
            <div class="pull-right">
                <a href="<?=site_url('ttd/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Pengaturan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?=$no++?>.</td>
                        <td><?=$data->name?></td>
                        <td><?=$data->nip?></td>
                        <td><?=$data->jabatan?></td>
                        <td class="text-center" width="160px">
                        <a href="<?=site_url('ttd/edit/'.$data->ttd_id)?>" class="btn btn-primary btn-xs">
                            <i class="fa fa-pencil"></i> Edit
                            </a>
                            <!-- <a href="<?=site_url('ttd/del/'.$data->ttd_id)?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete
                            </a> -->
                             <a href="<?=site_url('ttd/del/'.$data->ttd_id)?>" id="btn-hapus" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

