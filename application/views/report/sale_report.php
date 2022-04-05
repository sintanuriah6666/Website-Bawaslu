<section class="content-header">
    <h1>Laporan Transaksi
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
                                <label class="col-sm-3 control-label">Tanggal</label>
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
                            <button type="submit" name="reset" class="btn btn-flat">Ulang</button>
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
            <h3 class="box-title">Data Laporan Transaksi</h3>
        </div>
         <a id="btn_print" class="btn btn-danger" href="<?php echo base_url('report/cetaktransaksi')?>"> 
            <i class="fa fa-print"></i>Print</a>
               <a class="btn btn-warning" href="<?php echo base_url('report/exportexcel')?>"> 
            <i class="fa fa-download"></i>Excel</a>
             <a class="btn btn-primary" href="<?php echo base_url('report/pdf_transaksi')?>"> 
          <i class="fa fa-file-pdf-o"></i>  PDF</a>
            
        </div>
      
     
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No.Kwitansi</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Pengaturan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                    $total_harga = 0;                    
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?=$no++?>.</td>
                        <td><?=$data->invoice?></td>
                        <td><?=$data->name?></td>
                        <td><?=indo_date($data->date)?></td>
                        <td class="text-center"><?=indo_currency($data->total_price)?></td>
                        <td class="text-center" width="200px">
                            
                            <a href="<?=site_url('pembelian/cetak/'.$data->sale_id)?>" target="_blank" class="btn btn-info btn-xs">
                                <i class="fa fa-print"></i> Print
                            </a>
                            <a href="<?=site_url('pembelian/del/'.$data->sale_id)?>" id="btn-hapus" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                   
                    <?php                 

                    $total_harga += $data->total_price;            
                
                }
                 ?>
                    <tr>
                        <td></td>
                        <td colspan="2">Jumlah</td>
                         <td class="text-center"><?=indo_currency($total_harga)?></td>
                    </tr>
                    

                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <?=$pagination?>
            </ul>
        </div>
   
 
</section>
