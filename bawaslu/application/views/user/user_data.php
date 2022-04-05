<section class="content-header">
	<h1>User
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Users</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

<?php  ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success');?>"></div>
	<div class="box">
        <div class="box-header">
            
            <h3 class="box-title">Data User</h3>
            
               <?php $this->view('peringatan') ?>

            <u>
            </u>
            <div class="pull-right">
                <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Tambah
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Level</th>
                        <th>Pengaturan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?=$no++?>.</td>
                        <td><?=$data->username?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->address?></td>
                        <td><?=$data->level == 1 ? "Admin" : "Operator"?></td>
                        <td class="text-center" width="160px">
                       
                        <a href="<?=site_url('user/edit/'.$data->user_id)?>" class="btn btn-primary btn-xs">
                            <i class="fa fa-pencil"></i> Edit
                            </a>
                            <!-- <a href="<?=site_url('user/del/'.$data->user_id)?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete
                            </a> -->
                             <a href="<?=site_url('user/del/'.$data->user_id)?>" id="btn-hapus" class="btn btn-xs btn-danger">
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