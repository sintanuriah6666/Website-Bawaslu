<section class="content-header">
    <h1>Laporan Transaksi
        <small>Barang Keluar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Transaksi</li>
    </ol>
</section>
<section class="content">
 
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Filter Data</h3>
        </div>
        <div class="box-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal </label>
                                <div class="col-sm-9">
                                    <input type="date" name="date1" value="<?=@$post['date1']?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">s/d</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date2" value="<?=@$post['date2']?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row">
                   
                        <div class="pull-left">
                            <button type="submit" name="reset" class="btn btn-flat">Reset</button>
                            <button type="submit" name="filter" class="btn btn-info btn-flat">
                                <i class="fa fa-search"></i> Filter
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="box">
        <div class="box-header">    
        <div class="box-body table-responsive">
            <h3 class="box-title">Data Barang Keluar</h3>
        </div>
         <a id="btn_print" class="btn btn-danger" href="<?php echo base_url('report/cetaklaporankeluar')?>"> 
            <i class="fa fa-print"></i>Print</a>
               <a class="btn btn-warning" href="<?php echo base_url('report/excelbarangkeluar')?>"> 
            <i class="fa fa-download"></i>Excel</a>
             <a class="btn btn-primary" href="<?php echo base_url('report/pdf_keluar')?>"> 
          <i class="fa fa-file-pdf-o"></i>  PDF</a>
           
            <br>
            </br>
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode barang</th>                       
                        <th>Nama Produk</th>
                        <th>Info</th>
                        <th>Stok Saat ini</th>
                         <th>Jumlah</th>
                        <th>Total</th>                   
                                      
                     </tr>
            </thead>
            <tbody>
                    <?php $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                    $total_harga = 0;
                    $total_qty = 0;                    
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                            <td style="width:5%;"><?=$no++?>.</td>
                            <td class= "text-center"><?=indo_date($data->date)?></td>
                            <td><?=$data->kode_barang?></td>
                            <td><?=$data->item_name?></td>
                            <td class= "text-right"><?=$data->detail?></td>
                            <td class= "text-right"><?=$data->stock?></td>
                            <td class= "text-right"><?=$data->qty?></td>
                              <td class="text-right"><?=indo_currency($data->total_out)?></td>                                    
                            <td  class="text-center" width="160px">
                                  <a id="set_dtl" class="btn btn-defaul btn-xs"
                                    data-toggle="modal" data-target="#modal-detail"

                                    data-kode_barang="<?=$data->kode_barang?>"
                                    data-itemname="<?=$data->item_name?>"
                                    data-detail="<?=$data->detail?>"
                                    data-stock="<?=$data->stock?>"
                                    data-qty="<?=$data->qty?>"
                                    data-total_out="<?=indo_currency($data->total_out)?>">           
                                    <i class="fa fa-eye"></i> Detail
                        </a>                      
                        </td>
                </tr>
                 <?php                

                    $total_harga += $data->total_out;  
                    $total_qty +=$data->qty;            
                
                }
                 ?>
                    <tr>
                        <td colspan="3">Jumlah</td>
                      
                       <td></td>
                        <td></td>
                        <td></td>
                         <td class="text-right"><?=$total_qty?></td>
                          <td class="text-right"><?=indo_currency($total_harga)?></td>
                        
                    </tr>
                  
            </table>
    
        
        </div>
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <?=$pagination?>
            </ul>
        </div>
    </div>

        </div>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                 <h4 class="modal-title">Detail Data Barang Keluar</h4>
            </dv>
        <div class="modal-body table-responsive">
            <table class="table table-bordered no-margin">
        <tbody>
              
                <tr>
                     <th>Kode Barang</th>
                    <td><span id="kode_barang"></span></td>
                </tr>
                <tr>
                     <th>Nama Produk</th>
                    <td><span id="item_name"></span></td>
                </tr>           
                <tr>
                     <th>Detail</th>
                    <td><span id="detail"></span></td>
                </tr>   
                <tr>
                     <th>Stok Saat Ini</th>
                    <td><span id="stock"></span></td>
                </tr>
                <tr>
                     <th>Jumlah</th>
                    <td><span id="qty"></span></td>
                </tr>
                <tr>
                     <th>Total</th>
                    <td><span id="total_out"></span></td>
                </tr>
            </tbdoy>
        </table>
    </div>
    </div>
    </div>
    </div>
    
    <script>
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
           
            var kode_barang = $(this).data('kode_barang');
            var itemname = $(this).data('itemname');       ;
            var detail = $(this).data('detail');
            var stock = $(this).data('stock');
            var qty = $(this).data('qty');
            var total_out = $(this).data('total_out');
            
            $('#kode_barang').text(kode_barang);
            $('#item_name').text(itemname); 
            $('#detail').text(detail);    

            $('#stock').text(stock);
            $('#qty').text(qty);
            $('#total_out').text(total_out);
              
    })
})


</script>
   
         
</section> 