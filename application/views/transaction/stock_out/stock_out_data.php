<section class="content-header">
    <h1>Transaksi
        <small>Barang Keluar </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaksi </li>
        <li class="active">Barang Keluar</li>
    </ol>
</section>
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
                <a href="<?=site_url('stock/out/add')?>"class="btn btn-primary btn-flat">
                      <i class="fa fa-plus"></i> Tambah Barang Keluar
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>

                        <th>No</th>
                        <th>Kode barang</th>                       
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok Saat ini</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Info</th>                       
                        <th>Tanggal</th>                    
                        <th>Pengaturan</th>
                     </tr>
            </thead>
            <tbody>
                    <?php $no = 1;
                    foreach($row as $key => $data) { ?>
                    </tr>
                            <td style="width:5%;"><?=$no++?>.</td>
                            <td><?=$data->kode_barang?></td>
                            <td><?=$data->item_name?></td>
                             <td class="text-right"><?=indo_currency($data->pricebrg)?></td>
                             <td class= "text-right"><?=$data->stock?></td>
                            <td class= "text-right"><?=$data->qty?></td>
                            
                           <td class="text-right"><?=indo_currency($data->total_out)?></td>
                            <td class= "text-right"><?=$data->detail?></td>
                            <td class= "text-center"><?=indo_date($data->date)?></td>                                    
                            <td  class="text-center" width="160px">
                            
                      
                        <a href="<?=site_url('stock/out/del/'.$data->stock_id.'/'.$data->item_id)?>"
                         id="btn-hapus" class="btn btn-danger btn-xs">
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

</script>