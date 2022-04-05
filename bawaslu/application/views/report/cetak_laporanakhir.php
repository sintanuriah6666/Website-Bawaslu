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
            margin: 5mm;
        }
</style>
<img src="<?=base_url('assets/dist/img/bawaslukop.png')?>" style="width:800px; height: auto;position: relative;;">
</head>
<body>

<p style='margin:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'>BERITA ACARA STOCK OPNAME FISIK PERSEDIAAN</span></strong></p>
<p style='margin:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'>BAWASLU KABUPATEN/KOTA</span></strong></p>
<p style='margin:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'> <?=   isset($post2['date1']) ? $post2['date2'] : '' ?> - <?=isset($post2['date1']) ? $post2['date2'] : '' ?></span></strong></p>
<p style="text-align:left;"><span style="font-family:'Times New Roman';color:rgb(0,0,0);font-size:16px;">Pada hari ini Kamis tanggal 31/12/2021 bertempat di Kantor Bawaslu Daerah Istimewa Yogyakarta, kami yang&nbsp;</span><span style="font-family:'Times New Roman';color:rgb(0,0,0);font-size:16px;">bertanda tangan di bawah ini :</span></p>
<p style="text-indent:36.0000pt;"><span style="font-family:'Times New Roman';font-size:16px;">Nama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style="font-family:'Times New Roman';font-size:16px;">: <?=$ttd1[0]->name?></span></p>
<p style="text-indent:36.0000pt;"><span style="font-family:'Times New Roman';font-size:16px;">NIP &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style="font-family:'Times New Roman';font-size:16px;">: <?=$ttd1[0]->nip?>&nbsp;</span></p>
<p style="text-indent:36.0000pt;"><span style="font-family:'Times New Roman';font-size:16px;">Jabatan &nbsp; &nbsp; &nbsp;</span><span style="font-family:'Times New Roman';font-size:16px;">: <?=$ttd1[0]->jabatan?>&nbsp;</span></p>
<p><span style="font-family:'Times New Roman';font-size:16px;">Menyatakan bahwa telah melakukan Opname Fisik (Stock Opname) persediaan terhadap :&nbsp;</span></p>
<p style="text-indent:36.0000pt;"><span style="font-family:'Times New Roman';font-size:16px;">Nama&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="font-family:'Times New Roman';font-size:16px;">: <?=$ttd2[0]->name?>&nbsp;</span></p>
<p style="text-indent:36.0000pt;"><span style="font-family:'Times New Roman';font-size:16px;">NIP&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style="font-family:'Times New Roman';font-size:16px;">: <?=$ttd2[0]->nip?>&nbsp;</span></p>
<p style="text-indent:36.0000pt;"><span style="font-family:'Times New Roman';font-size:16px;">Jabatan&nbsp; &nbsp; &nbsp;</span><span style="font-family:'Times New Roman';font-size:16px;">: <?=$ttd2[0]->jabatan?></span></p>
<p style='margin:0cm;font-size:16px;font-family:"Times New Roman",sans-serif;text-align:left;line-height:115%;'><strong><span style='font-family:"Times New Roman",sans-serif;'>Dengan hasil sebagai berikut :.</span></strong></p><br>
    </tbody>
</table>  
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
            </div> 
 
           
                    <br>
                    <br>

                    <span>
                      <p id="isPasted" style="text-align:left;"><span style="font-family:'Times New Roman';color:rgb(0,0,0);font-size:16px;">Demikian Berita Acara Stock Opname Fisik Persediaan ini dibuat untuk dipergunakan sebagaimana mestinya.&nbsp;</span><span style="font-family:'Times New Roman';color:rgb(0,0,0);font-size:16px;">Apabila dikemudian hari terdapat kekeliruan akan dilakukan perbaikan sebagaimana mestinya.</span></p>
                       <br>
                    <br>

     <table style="border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width:217.85pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:24.7pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Arial",sans-serif;'><?=$ttd1[0]->jabatan?></span></p>
            </td>
            <td style="width:214.5pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;height:24.7pt;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:150%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Arial",sans-serif;'><?=$ttd2[0]->jabatan?></span></p>
            </td>
        </tr>
        <tr>
            <td style="width: 217.85pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 98.85pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><br></p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><br></p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><br></p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><br></p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><u><span style='font-family:"Arial",sans-serif;'><?=$ttd1[0]->name?></span></u></strong></p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Arial",sans-serif;'>NIP. <?=$ttd1[0]->nip?></span></p>
            </td>
            <td style="width: 214.5pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 98.85pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><br></p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><br></p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><br></p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><br></p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><u><span style='font-family:"Arial",sans-serif;'><?=$ttd2[0]->name?></span></u></strong></p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span id="isPasted" style='font-size:15px;line-height:107%;font-family:"Arial",sans-serif;'>NIP. <?=$ttd2[0]->nip?></span></p>
            </td>
        </tr>
    </tbody>

</body>
</html>

