 
  
<?php
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>
</style>
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-size:16px;line-height:115%;font-family:"Arial",sans-serif;'>LAPORAN BARANG KELUAR</span></strong></p>
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-size:16px;line-height:115%;font-family:"Arial",sans-serif;'>BAWASLU KABUPATEN/KOTA</span></strong></p>
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'><?=isset($post3['date1']) ? $post3['date1'] : '' ?> - <?=isset($post3['date2']) ? $post3['date2'] : '' ?></span></strong></p>
</style>
<table border="1" width="100%">
        
  <table>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode</th>                       
                        <th>Nama Produk</th>
                        <th>Info</th>
                         <th>Jumlah</th>
                         <th>Stock Sisa</th> 
                         <th>Total</th>
                     </tr>
                 
                    <?php
                     $no = 1;  
                     $total_pengeluaran = 0; 
                      $total_stockout = 0; 
                       $total_sisa =0;               
                       foreach($row->result() as $key => $data): ?>
                    <tr>
                            <td><?=$no++?>.</td>
                            <td><?=indo_date($data->date)?></td>
                            <td><?=$data->kode_barang?></td>
                            <td><?=$data->item_name?></td>
                            <td><?=$data->detail?></td>                            
                            <td ><?=$data->qty?></td>  
                            <td><?=$data->stock?></td>
                            <td><?=indo_currency($data->total_out)?></td>
                           
                             
                               </tr>
            <?php {
                     
                     $total_pengeluaran += $data->total_out; 
                      $total_stockout += $data->qty; 
                       $total_sisa += $data->stock; 
                                
                                
                
                }
                      ?>
        <?php endforeach; ?>
           
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>                      
                       <td></td>                      
                       <td></td>                                       
                        <td><?=$total_stockout?></td>                      
                         <td><?=$total_sisa?></td>
                          <td><?=indo_currency($total_pengeluaran)?></td>
                         
                    </tr>
        </table>
