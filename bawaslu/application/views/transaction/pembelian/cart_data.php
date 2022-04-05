<?php $no = 1;
				if($cart->num_rows() > 0) {
					foreach($cart->result() as $c => $data) { ?>
                        <tr>
							<td><?=$no++?>.</td>
                            <td><?=$data->kode_barang?></td>
                            <td><?=$data->name?></td>							  
							<td class="text-right"><?=$data->cart_price?></td>
							<td class="text-center"><?=$data->qty?></td>            
                            <td class="text-right" id="total"><?=$data->total?></td>
                            
                            <td class="text-center" width="160px">
                                <button id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
                                    data-cartid="<?=$data->cart_id?>"
                                    data-kode_barang="<?=$data->kode_barang?>"
                                    data-product="<?=$data->item_name?>"
                                     data-stock="<?=$data->stock?>"                                   									data-price="<?=$data->cart_price?>"   
									data-qty="<?=$data->qty?>"                   
                                    data-total="<?=$data->total?>"
									class="btn btn-xs btn-primary">
                                   		 <i class="fa fa-pencil"></i> Edit
                                </button>
								<button id="del_cart" data-cartid="<?=$data->cart_id?>" id="btn-hapus" class="btn btn-xs btn-danger">
									<i class="fa fa-trash"></i> Hapus
								</button>
                            </td>
                        </tr>
                        <?php 
						} 
				} else {
					echo '<tr>
					<td colspan="8" class="text-center">Tidak ada item</td>
					</tr>';
				} ?>