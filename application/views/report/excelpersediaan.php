 <?php
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>
<p style='margin:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'>BERITA ACARA STOCK OPNAME FISIK PERSEDIAAN</span></strong></p>
<p style='margin:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'>BAWASLU KABUPATEN/KOTA</span></strong></p>
<p style='margin:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'> <?=isset($post2['date1']) ? $post2['date1'] : '' ?> - <?=isset($post2['date2']) ? $post2['date2'] : '' ?></span></strong></p>
<p style="text-align:left;"><span style="font-family:'Times New Roman';color:rgb(0,0,0);font-size:16px;">Pada hari ini tanggal <?=isset($post2['date2']) ? $post2['date2'] : '' ?> bertempat di Kantor Bawaslu Daerah Istimewa Yogyakarta, kami yang&nbsp;</span><span style="font-family:'Times New Roman';color:rgb(0,0,0);font-size:16px;">bertanda tangan di bawah ini :</span></p>
<table border="1" width="100%">


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