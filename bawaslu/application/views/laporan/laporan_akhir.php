<section class="content-header">
    <h1>Laporan Persediaan Akhir
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Laporan Akhir</li>
    </ol>
</section>
<section class="content">
 
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Pilih Tanggal</h3>
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
                            <button type="submit" name="pilih" class="btn btn-info btn-flat">
                                <i class="fa fa-search"></i> Pilih
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
           <a id="btn_print" class="btn btn-danger" href="<?php echo base_url('report/cetaklaporanakhir')?>"> 
            <i class="fa fa-print"></i>Print</a>
               <a class="btn btn-warning" href="<?php echo base_url('report/excelakhir')?>"> 
            <i class="fa fa-download"></i>Excel</a>
             <a id="btn_pdf" class="btn btn-primary" href="<?php echo base_url('report/pdf_laporanakhir')?>"> 
          <i class="fa fa-file-pdf-o"></i>  PDF</a>
          <div class="dropdown inline">
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            </ul>
            <br>
            </br>

      
      </div>
              <table class="table table-bordered table-striped" id="table1">
                <thead>
                <tr>

                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Unit</th>
                        <th>Harga</th>
                        <th>Stok Saat Ini</th>
                        <th>Nominal</th>
    
            </tr>
            </thead>
            <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?></td>
                    
                        <td><?=$data->kode_barang?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->category_name?></td>
                        <td><?=$data->unit_name?></td>
                        <td><?=indo_currency($data->price)?></td>
                        <td><?=$data->stock?></td>
                         <td><?=indo_currency($nominal = $data->price * $data->stock)?></td>
        
                    
                    </tr>
                    <?php
                    } ?>
                </tbody>
                 
                    </table>

                     <td colspan="2">TTD</td>
                            <td>
                                <div>
                                   <select id="ttd_name1" name="ttd1" class="form-control " required=""> 
                                        <option value="">- Pilih Tanda Tangan -</option>
                                        <option value="null" <?=@$post['ttd1'] == 'null' ? 'selected' : '' ?>>Umum</option>
                                        <?php foreach($ttd as $td => $data) { ?>
                                            <option value="<?=$data->ttd_id?>" <?=@$post['ttd1'] == $data->ttd_id ? 'selected' : ''?>>
                                                <?=$data->name?></option>
                                        <?php } ?>
                                    </select>
                                     <select id="ttd_name2" name="ttd2" class="form-control " required=""> 
                                        <option value="">- Pilih Tanda Tangan -</option>
                                        <option value="null" <?=@$post['ttd2'] == 'null' ? 'selected' : '' ?>>Umum</option>
                                        <?php foreach($ttd as $td => $data) { ?>
                                            <option value="<?=$data->ttd_id?>" <?=@$post['ttd2'] == $data->ttd_id ? 'selected' : ''?>>
                                                <?=$data->name?></option>
                                        <?php } ?>
                                    </select>
                                    <script type="text/javascript">
                                        
                                        try {
                                          let c = function () {
                                                let encoded1 = encodeURIComponent($("#ttd_name1")[0].value);
                                                 let encoded2 = encodeURIComponent($("#ttd_name2")[0].value);
                                                $("#btn_print")[0].setAttribute(
                                                    "href",
                                                    "<?= base_url('report/cetaklaporanakhir')?>"+"?ttd1="+encoded1+"&ttd2="+encoded2
                                    
                                                );

                                                $("#btn_pdf")[0].setAttribute(
                                                    "href",
                                                    "<?= base_url('report/pdf_laporanakhir') ?>"+"?ttd1="+encoded1+"&ttd2="+encoded2
                                    
                                                );
                                            };
                                            $("#ttd_name1")[0].addEventListener("change", c );
                                            $("#ttd_name2")[0].addEventListener("change", c );
                                        } catch (e) {
                                            alert(e.message);
                                        }
                                 
                                    </script>
                                </div>    
                        </tr>
                     
                                    </table>            
             
                   
        </div>
   
         
</section>  

</script>