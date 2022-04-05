  
<?php
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>
</style>
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-size:16px;line-height:115%;font-family:"Arial",sans-serif;'>LAPORAN TRANSAKSI</span></strong></p>
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-size:16px;line-height:115%;font-family:"Arial",sans-serif;'>BAWASLU KABUPATEN/KOTA</span></strong></p>
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'> <?=isset($post4['date1']) ? $post4['date1'] : '' ?> - <?=isset($post4['date2']) ? $post4['date2'] : '' ?></span></strong></p>
<p>&nbsp;</p>
</style>

<table border="1" width="100%">
                    <tr>
                    <th>No</th>
                    <th>No. Kwitansi</th>
                    <th>Data</th>
                    <th>Total</th>
                        
                     </tr>
                    </thead>
                    <body>
                 
                    <?php
                    $no = 1;             
                    foreach($row->result() as $key => $data): ?>
                    <tr>
                      <td><?=$no++?>.</td>
                      <td><?=$data->invoice?></td>
                      <td><?=indo_date($data->date)?></td>
                      <td><?=indo_currency($data->total_price)?></td>
       
                   </tr>
                 <?php endforeach; ?>
           </body>
                       
        </table>
