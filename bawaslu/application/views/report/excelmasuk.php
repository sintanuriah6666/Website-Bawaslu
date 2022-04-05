  <?php
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>
</style>
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-size:16px;line-height:115%;font-family:"Arial",sans-serif;'>LAPORAN BARANG MASUK</span></strong></p>
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-size:16px;line-height:115%;font-family:"Arial",sans-serif;'>BAWASLU KABUPATEN/KOTA</span></strong></p>
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'> <?=   isset($post4['date1']) ? $post4['date2'] : '' ?> - <?=isset($post4['date1']) ? $post4['date2'] : '' ?></span></strong></p>

</style>
<table border="1" width="100%">
</head>
                   <tr>
                  
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>                       
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>                                          
                    </tr>
                 
                      <?php
                      
                      $no = 1;    
                      $total_masuk = 0;
                      $total_stockin = 0;             
                       foreach($row->result() as $key => $data): ?>
                    <tr>
                            <td><?=$no++?>.</td>
                            <td><?=indo_date($data->date)?></td>
                            <td><?=$data->name?></td>                          
                            <td ><?=$data->qty?></td>  
                            <td><?=$data->price?></td>
                            <td><?=indo_currency($data->total)?></td>
                    </tr>  


                     <?php {
                     
                     $total_masuk += $data->total; 
                      $total_stockin += $data->qty; 
                      
                                
                                
                
                }
                      ?>
        <?php endforeach; ?>
           
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>                     
                                                            
                        <td><?=$total_stockin?></td>                      
                         <td></td>
                          <td><?=indo_currency($total_masuk)?></td>
                         
                    </tr>
        </table>
