<section class="content-header">
    <h1>Transaksi
        <small>Pembelian</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaksi</li>
        <li class="active">Pembelian</li>
    </ol>
</section>

<section class="content">
<?php  ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success');?>"></div>
	<div class="box">
        <div class="box-header">
            
               <?php $this->view('peringatan') ?>

            <u>
            </u>
    <div class="row">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">

                    <table width="100%">
                    <tr>
                            <td style="vertical-align:top">
                                <label for="date">Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?=date('Y-m-d')?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="user">Pengguna</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user" value="<?=$this->fungsi->user_login()->name?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>

                         <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="user">No. Kwitansi </label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="invoice"  value="0" class="form-control" >
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                         <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="user">Kode Barang</label>
                            </td>
                            
                              <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="item_id">
                                    <input type="hidden" id="stock">
                                    <input type="hidden" id="price">
                                    <input type="hidden" id="qty_cart">
                                    <input type="text" id="kode_barang" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="qty">Jumlah</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>
                        </tr>
                    
                        
                
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <button type="button" id="add_cart" class="btn btn-primary">
                                        <i class="fa fa-cart-plus"></i> Tambah
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <tr>

           

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th width="15%">Total</th>
                                <th>Pengaturan</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                            
                            <?php $this->view('transaction/pembelian/cart_data') ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="sub_total"> Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="sub_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                </div>
            </div>
        </div>

       
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            
                            <td>
                               
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div><br><br>
                <button id="proses_cetak" class="btn btn-flat btn-lg btn-success">
                    <i class="fa fa-paper-plane-o"></i> Proses Cetak
                </button>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
    
</section>

<!-- Modal Add Product Item -->
<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Tambah Produk Item</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($item as $i => $data) { ?>
                        <tr>
                            <td><?=$data->kode_barang?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->unit_name?></td>
                            <td class="text-right"><?=indo_currency($data->price)?></td>
                            <td class="text-right"><?=$data->stock?></td>
                            <td class="text-right">
                                <button class="btn btn-xs btn-info" id="select"
                                    data-id="<?=$data->item_id?>"
                                    data-kode_barang="<?=$data->kode_barang?>"
                                    data-price="<?=$data->price?>"
                                    data-stock="<?=$data->stock?>">
                                    <i class="fa fa-check"></i> Pilih
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Cart Item -->
<div class="modal fade" id="modal-item-edit">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Produk Item</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cartid_item">
                <div class="form-group">
                    <label for="product_item">Produk Item</label>
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" id="kode_barang_item" class="form-control" readonly>
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="product_item" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price_item">Harga</label>
                    <input type="number" id="price_item" min="0" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-7">
                            <label for="qty_item">Qty</label>
                            <input type="number" id="qty_item" min="1" class="form-control">
                        </div>
                        <div class="col-md-5">
                            <label>Stock Item</label>
                            <input type="number" id="stock_item" class="form-control" readonly>
                        </div>
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="total_item">Total</label>
                    <input type="number" id="total_item" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button type="button" id="edit_cart" class="btn btn-flat btn-success">
                        <i class="fa fa-paper-plane"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>


$(document).on('click', '#select', function() {
    var kode_barang = $(this).data('kode_barang')

    $('#item_id').val($(this).data('id'))
    $('#kode_barang').val(kode_barang)
    $('#price').val($(this).data('price'))
    $('#stock').val($(this).data('stock'))
    $('#modal-item').modal('hide')

    get_cart_qty(kode_barang)
})

function get_cart_qty(kode_barang) {
    $('#cart_table tr').each(function() {
       
        var qty_cart = $("#cart_table td.kode_barang:contains('"+kode_barang+"')").parent().find("td").eq(4).html()
        if(qty_cart != null) {
            $('#qty_cart').val(qty_cart)
        } else {
            $('#qty_cart').val(0)
        }
    })
}

$(document).on('click', '#add_cart', function() {
    var item_id = $('#item_id').val()
    var price = $('#price').val()
    var stock = $('#stock').val()
    var qty = $('#qty').val()
    var qty_cart = $('#qty_cart').val()
    if(item_id == '') {
        ('Product belum dipilih')
        $('#kode_barang').focus()
    }  else {
        $.ajax({
            type: 'POST',
            url: '<?=site_url('pembelian/process')?>',
            data: {'add_cart' : true, 'item_id' : item_id, 'price' : price, 'qty' : qty},
            dataType: 'json',
            success: function(result) {
                if(result.success == true) {
                    $('#cart_table').load('<?=site_url('pembelian/cart_data')?>', function() {
                        calculate()
                    })
                    $('#item_id').val('')
                    $('#kode_barang').val('')
                    $('#qty').val(1)
                    $('#kode_barang').focus()
                } else {
                    alert('Gagal tambah item cart')
                }
            }
        })
    }
})

$(document).on('click', '#del_cart', function() {
    if(confirm('Apakah Anda yakin?')) {
        var cart_id = $(this).data('cartid')
        $.ajax({
            type: 'POST',
            url: '<?=site_url('pembelian/cart_del')?>',
            dataType: 'json',
            data: {'cart_id': cart_id},
            success: function(result) {
                if(result.success == true) {
                    $('#cart_table').load('<?=site_url('pembelian/cart_data')?>', function() {
                        calculate()
                    })
                } else {
                    alert('Gagal hapus item cart');
                }
            } 
        })
    }
})

$(document).on('click', '#update_cart', function() {
    $('#cartid_item').val($(this).data('cartid'))
    $('#kode_barang_item').val($(this).data('kode_barang'))
    $('#product_item').val($(this).data('product'))
    $('#stock_item').val($(this).data('stock'))
    $('#price_item').val($(this).data('price'))
    $('#qty_item').val($(this).data('qty'))
    $('#total_item').val($(this).data('total'))
})
function count_edit_modal() {
    var price = $('#price_item').val()
    var qty = $('#qty_item').val()

    total = price * qty
    $('#total_item').val(total)

}

$(document).on('keyup mouseup', '#price_item, #qty_item', function() {
    count_edit_modal()
})

$(document).on('click', '#edit_cart', function() {
    var cart_id = $('#cartid_item').val()
    var price = $('#price_item').val()
    var qty = $('#qty_item').val()
    var total = $('#total_item').val()
    var stock = $('#stock_item').val()
    if(price == '' || price < 1) {
        alert('Harga tidak boleh kosong')
        $('#pice_item').focus()
    } else if(qty == '' || qty < 1) {
        alert('Qty tidak boleh kosong')
        $('#qty_item').focus()
    } else {
        $.ajax({
            type: 'POST',
            url: '<?=site_url('pembelian/process')?>',
            data: {'edit_cart' : true, 'cart_id' : cart_id, 'price' : price, 
                    'qty' : qty, 'total' : total},
            dataType: 'json',
            success: function(result) {
                if(result.success == true) {
                    $('#cart_table').load('<?=site_url('pembelian/cart_data')?>', function() {
                        calculate()
                    })
                    alert('Item cart berhasil ter-update')
                    $('#modal-item-edit').modal('hide')
                } else {
                    alert('Data item cart tidak ter-update')
                    $('#modal-item-edit').modal('hide')
                }
            }
        })
    }
})


function calculate() {
    var subtotal = 0;
    $('#cart_table tr').each(function() {
        subtotal += parseInt($(this).find('#total').text())
    })
    isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

    var discount = $('#discount').val()
    var grand_total = subtotal - discount
    if(isNaN(grand_total)) {
        $('#grand_total').val(0)
        $('#grand_total2').text(0)
    } else {
        $('#grand_total').val(grand_total)
        $('#grand_total2').text(grand_total)
    }

    var cash = $('#cash').val();
    cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

    if(discount == '') {
        $('#discount').val(0)
    }
}
$(document).on('keyup mouseup', '#discount, #cash', function() {
    calculate()
})

$(document).ready(function() {
    calculate()
})

// process payment
$(document).on('click', '#proses_cetak', function() {
    var subtotal = $('#sub_total').val()
    var date = $('#date').val()
    var invoice = $('#invoice').val()
    if(subtotal < 1) {
        alert('Belum ada product item yang dipilih')
        $('#kode_barang').focus()
    } else if(invoice < 1) {
        alert('Nomor Kwitansi belum di masukkan')
        $('#invoice').focus()
    } else {
        if(confirm('Yakin proses transaksi ini?')) {
            $.ajax({
                type: 'POST',
                url: '<?=site_url('pembelian/process')?>',
                data: {'proses_cetak': true, 'subtotal': subtotal, 
                   'date': date, 'invoice' : invoice,},
                dataType: 'json',
                success: function(result) {
                    if(result.success) {
                        alert('Transaksi berhasil');
                        window.open('<?=site_url('pembelian/cetak/')?>' + result.sale_id, '_blank')
                    } else {
                        alert('Transaksi gagal');
                    }

                    location.href='<?=site_url('pembelian')?>'
                }
            })
        }
    }
})



</script>
