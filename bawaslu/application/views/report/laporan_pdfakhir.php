<!DOCTYPE html>
<html><head>
 
</head><body>
<div class="title">
   
    <br> </br>
    <br> </br>
</div>
<style> 
    table, 
    td, 
    th {
       
        border: 1px solid #333;
    }

    table {
        width: 100%;
        border-collapse: collapse 
    }
    td, th {
        padding: 2px;
    }
    th {
        background-color: #CCC;
    }
    <!DOCTYPE html>
<html>
<head>
    
<style> 
     .title {
        text-align: center;
        font-size:13px;

    
    }

    .line-litle{
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
    }

    table, 
    td, 
    th {

        border: 1px solid #333;
    }

    table {
        width: 100%;
        border-collapse: collapse 
    }
    td, th {
        padding: 2px;
    }
    th {
        background-color: #CCC;
    }
    @media print {
        @page {
            width: 80mm;
            margin: 0mm;
        }
</style>
<p style='margin:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'>BERITA ACARA STOCK OPNAME FISIK PERSEDIAAN</span></strong></p>
<p style='margin:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'>BAWASLU KABUPATEN/KOTA</span></strong></p>
<p style='margin:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'> <?=indo_date($post2['date1'])?> - <?=indo_date($post2['date2'])?></span></strong></p>
</style>
<br></br>
   <br></br>
    <table> 
                     <tr>
                         <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Unit</th>
                        <th>Harga</th>
                        <th>Stock Saat Ini</th>
                        <th>Nominal</th>
                       
                    </tr>

        <?php $no = 1;
        $total_harga = 0;                    
        foreach($row->result() as $key => $data):  ?>
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
        
        <?php endforeach; ?>
           
                     
        </table>

        <br>
    </br>
    <br>
</br>

      <br></br> <p style="text-align: center;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; <?=$ttd1[0]->jabatan ?></p> <p
                        style="text-align: center;">&nbsp;</p> <p style="text-align:
                        center;">&nbsp;</p> <p style="text-align: center;"><strong>&nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;<u><?=$ttd1[0]->name?></u></strong></p> <p
                        style="text-align: center;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;NIP.
                       <?=$ttd1[0]->nip?></p>


</body></html>