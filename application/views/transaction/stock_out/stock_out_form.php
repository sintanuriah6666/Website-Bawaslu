<section class="content-header">
	<h1>Form Barang Keluar
		<small>Barang Keluar </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaksi</li>
		<li class="active">Stok Barang Keluar</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
        <div class="box-header">
            
            <h3 class="box-title">Tambah Data Barang</h3>
            
               <?php $this->view('peringatan') ?>

            <u>
            </u>
            <div class="pull-right">
                <a href="<?=site_url('stock/out')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('stock/process')?>" method="post">
                        <div class="form-group">
                            <label>Tanggal *</label>
                            <input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control" required>
                        </div>
                        <div>
                            <label for="kode_barang">Kode Barang *</label>
                        </div>
                        <div class="form-group input-group">
                            <input type="hidden" name="item_id" id="item_id">
                            <input type="text" name="kode_barang" id="kode_barang" class="form-control" required autofocus>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="item_name">Nama Barang *</label>
                            <input type="text" name="item_name" id="item_name" class="form-control" readonly>
                        </div>
                         <div class="form-group">
                            <label for="pricebrg">Harga *</label>
                            <input type="number" name="" id="pricebrg" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="unit_name">Nama Unit *</label>
                                    <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="stock">Stok Barang *</label>
                                    <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Info *</label>
                            <input type="text" name="detail" class="form-control" placeholder="Terpakai / Habis / Kadaluarsa" required>
                        </div>
                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Jumlah *</label>
                                    <input type="text" name="qty" id="qty" value="" class="form-control" required="">
                                </div>
                                <div class="col-md-8">
                                    <label>Total *</label>
                                    <input type="text" name="total_out" id="total_out" value="" class="form-control" required="">
                                </div>
                            </div>
                        </div>                   
 
                       
                        
                        <div class="form-group">
                            <button type="submit" name="out_add" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                            <button type="Reset" class="btn btn-flat">Ulang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Pilih Produk Item</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Unit</th>
                            <th>Barang Keluar</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($item as $i => $data) { ?>
                        <tr>
                            <td><?=$data->kode_barang?></td>
                            <td><?=$data->name?></td>
                            <td class="text-right"><?=indo_currency($data->price)?></td>
                              <td><?=$data->unit_name?></td>
                            <td class="text-right"><?=$data->stock?></td>
                            <td class="text-right">
                                <button class="btn btn-xs btn-info" id="select"
                                    data-id="<?=$data->item_id?>"
                                    data-kode_barang="<?=$data->kode_barang?>"
                                    data-name="<?=$data->name?>"
                                    data-price="<?=$data->price?>"
                                    data-unit="<?=$data->unit_name?>"
                                    data-stock="<?=$data->stock?>">
                                    <i class="fa fa-check"></i> Pilih
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    
    $(document).on('click', '#select', function() {
        var item_id = $(this).data('id');
        var kode_barang = $(this).data('kode_barang');
        var name = $(this).data('name');
        var price = $(this).data('price');
        var unit_name = $(this).data('unit');
        var stock = $(this).data('stock');
      
        $('#item_id').val(item_id);
        $('#kode_barang').val(kode_barang);
        $('#item_name').val(name);
        $('#pricebrg').val(price);
        $('#unit_name').val(unit_name);
        $('#stock').val(stock);
        $('#modal-item').modal('hide');
        
    })

    $("#qty")[0].addEventListener("change", function () { 
  let pricebrg = $("#pricebrg").val();
  let qty = $("#qty").val();
  $("#total_out").val(pricebrg * qty);
});
 
})
 </script>
