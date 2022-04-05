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
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-size:16px;line-height:115%;font-family:"Arial",sans-serif;'>LAPORAN BARANG KELUAR</span></strong></p>
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-size:16px;line-height:115%;font-family:"Arial",sans-serif;'>BAWASLU KABUPATEN/KOTA</span></strong></p>
<p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;line-height:115%;'><strong><span style='font-family:"Arial",sans-serif;'><?=isset($post3['date1']) ? $post3['date1'] : '' ?> - <?=isset($post3['date2']) ? $post3['date2'] : '' ?></span></strong></p>

</style>
  <br>
  </br>
  <br>
  </br>
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

        <br>
    </br>
    <br>
</br>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:150%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:150%;font-family:"Arial",sans-serif;color:black;'>Keterangan:</span></p>
<p><span style='font-size:16px;line-height:107%;font-family:"Arial",sans-serif;color:black;'>1. Total Barang keluar <?=$total_stockout?>&nbsp;</span></p>
<p><span style='font-size:16px;line-height:107%;font-family:"Arial",sans-serif;color:black;'>2. Total Stock Saat ini <?=$total_sisa?>&nbsp;</span></p>
<p><span style='font-size:16px;line-height:107%;font-family:"Arial",sans-serif;color:black;'>3. Total Pengeluaran <?=indo_currency($total_pengeluaran)?>,-&nbsp;</span></p>

      <script type="text/javascript">
          window.print();
      </script>

</body>
</html>