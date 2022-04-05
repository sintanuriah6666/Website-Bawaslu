<section class="content-header">
	<h1>Barang
		<small>Data Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Barang</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
   
    <?php  ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success');?>"></div>
	<div class="box">
        <div class="box-header">
            
            <h3 class="box-title">Data Barang</h3>
            
               <?php $this->view('peringatan') ?>

            <u>
            </u>
            <div class="pull-right">
                <a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Tambah 
                </a>
            </div>
        </div>

   
        </div>
        <div class="box">
        <div class="box-header">
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Unit</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Bukti Harga Naik</th>
                        <th>Pengaturan</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?=$no++?>.</td>
                        <td>
                            <?=$data->kode_barang?><br>
                            <a href="<?=site_url('item/kode_barang_qrcode/'.$data->item_id)?>" class="btn btn-default btn-xs">
                                Generate <i class="fa fa-kode_barang"></i> <i class="fa fa-qrcode"></i>
                            </a>
                        </td>
                        <td><?=$data->name?></td>
                        <td><?=$data->category_name?></td>
                        <td><?=$data->unit_name?></td>
                        <td class="text-right"><?=indo_currency($data->price)?></td>
                        <td class="text-right"><?=$data->stock?></td>
                        <td>
                            <?php if($data->image != null) { ?>
                                <img src="<?=base_url('uploads/product/'.$data->image)?>" style="width:100px">
                            <?php } ?>
                        </td>
                        <td class="text-center" width="140px">
                            <a href="<?=site_url('item/edit/'.$data->item_id)?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <a href="<?=site_url('item/del/'.$data->item_id)?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                    } ?> -->
                </tbody>
            </table>
        </div>
    </div>

</section>

<script>
	$(document).ready(function() {
		$('#table1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?=site_url('item/get_ajax')?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [5, 6],
                    "className": 'text-right'
                },
                {
                    "targets": [7, -1],
                    "className": 'text-center'
                },
                {
                    "targets": [0, 7, -1],
                    "orderable": false
                }
            ],
            "order": []
        })
	})
</script>
