<html moznomarginboxes mozdisallowselectionprint>
    <headh>
    <title> Kwitansi Pembelian </title>
    <style type = "text/css">
        html {  font-family : "Verdana, Arial" ; }
    .content {
        width: 80mm;
        font-size:12px;
        padding: 5px;
    }
    .title {
        text-align: center;
        font-size:13px;
        padding-bottom: 5px;
        border-bottom: 1px dashed;
    }
    .head {
        margin-top: 5px;
        margin-bottom:10px;
        padding-bottom: 10px;
        border-bottom: 1px solid;
    }
    table {
        width: 100%;
        font-size:12px;
    }
    .thanks {
        margin-top: 10px;
        padding-top:10px;
        text-align: center;
        border-top: 1px dashed;

    }

    @media print {
        @page {
            width: 80mm;
            margin: 0mm;
        }
    }

</style>
</head>
<body onload= "window.print()">
<div class= "content">
<div class="title">
    <b>Kwitansi Pembelian</b>
    <br>
   
</div> 

<div class="head">
    <table cellspacing="0" cellpadding = "0">
    </tr>
    <td> Tanggal </td>
        <td style="text-align:center: width:10px"> : </td>
        <td stle="width:200px">
            <?php
            echo Date("d/m/Y", strtotime($sale->date))." ". Date("H:i", strtotime($sale->sale_created));
        ?>
        </td>
        <tr>
        <tr>
        </td>
        <td> Pengguna </td>
        <td style="text-align:center: width:10px"> : </td>
        <td style= "text-align:left">
            <?=ucfirst($sale->user_name)?>
        </td>
    </tr>
    <tr>
        <td> No. Kwitansi </td>
        <td style="text-align:center: width:10px"> : </td>
        <td style= "text-align:left">
            <?=$sale->invoice?>
        </td>
    </tr>
</table>
</div>
<div class="transaction">
    <table class="transaction-table" cellspacing="0" cellpadding="0">
    <?php 
    $arr_discount = array();
    foreach ($sale_detail as $key => $value) {  ?>
        <tr>
            <td style= "width: 165px"><?=$value->name?></td>
            <td><?=$value->qty?></td>
            <td style="text-align:right; width: 60px"><?=indo_currency($value->price)?></td>
            <td style="text-align: right; width: 60px"><?=indo_currency($value->price  * $value->qty) ?></td>
        </tr>

    <?php
} ?>

<tr>
    <td colspan="4" style="border-bottom: 1px dashed; padding-top: 5px"></td>
</tr>
<tr>
    <td colspan="2"></td>
    <td style="text-align:right; padding-top: 5px"> Total</td>
   <td style="text-align:right; padding-top: 5px">
     <?=indo_currency($sale->total_price)?>
    </td>
</tr>


</table>

</div>
<div class="Thanks">
    Bawaslu Kabupaten Sleman
    <br>

</div>
</div>
</body>
</html>