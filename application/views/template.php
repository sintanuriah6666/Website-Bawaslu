<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bawaslu Kabupaten Sleman</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="icon" href="<?=base_url('assets/dist/img/logo.png')?>">
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?=base_url('assets/bower_components/bootstrap/dist/css/custom.css') ?>">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.css">


</head>
<body class="hold-transition skin-red sidebar-mini <?=$this->uri->segment(1) == 'pembelian' ? 'sidebar-collapse' : null?>">

    <div class="wrapper">
        <header class="main-header">
            <a href="<?=base_url('dashboard')?>" class="logo">
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown tasks-menu">
                        </li>
                        <!-- User Account -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=base_url()?>assets/dist/img/logo.png" class="user-image">
                                <span class="hidden-xs"><?=$this->fungsi->user_login()->username?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?=base_url()?>assets/dist/img/logo.png" class="img-square">
                                    <p><?=$this->fungsi->user_login()->name?>
                                        <small><?=$this->fungsi->user_login()->address?></small>
                                    </p>
                                </li>
                                <li class="user-footer">

                                    <div class="pull-right">
                                        <a href="<?=site_url('auth/logout')?>" class="btn btn-flat bg-red">Keluar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

		<!-- Left side column -->
		<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?=base_url()?>assets/dist/img/logo.png" class="profile-img">
					</div>
					<div class="pull-left info">
						<p class="text-center">BAWASLU</p>
						<p>Kabupaten Sleman</p>
					</div>
				</div>
			
				<!-- sidebar menu -->
				 <?php if($this->fungsi->user_login()->level == 2) { ?>
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					 
					<li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
						<a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
					</li>
				 
					 
					<li <?=$this->uri->segment(1) == 'supplier' ? 'class="active"' : ''?>>
						<a href="<?=site_url('supplier')?>"><i class="fa fa-truck"></i> <span>Supplier</span></a>
					</li>
				 
		
					<li class="treeview <?=$this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'active' : ''?>">
						<a href="#">
						 
							<i class="fa fa-archive"></i> <span>Barang</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							<li <?=$this->uri->segment(1) == 'category' ? 'class="active"' : ''?>><a href="<?=site_url('category')?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
							<li <?=$this->uri->segment(1) == 'unit' ? 'class="active"' : ''?>><a href="<?=site_url('unit')?>"><i class="fa fa-circle-o"></i> Unit</a></li>
							<li <?=$this->uri->segment(1) == 'item' ? 'class="active"' : ''?>><a href="<?=site_url('item')?>"><i class="fa fa-circle-o"></i> Data Barang</a></li>
						</ul>
					</li>
					
					<li class="treeview" <?=$this->uri->segment(1) == 'transaction'  ? 'active' : ''?>">
						<a href="#">
							<i class="fa fa-shopping-cart"></i> <span>Transaksi</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							
							<li <?=$this->uri->segment(1) == 'pembelian' ? 'class="active"' : ''?>><a href="<?=site_url('pembelian')?>"><i class="fa fa-circle-o"></i> Pembelian </a></li>
							<li <?=$this->uri->segment(1) == 'stock' ? 'class="active"' : ''?>><a href="<?=site_url('stock/out')?>"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
							
							

						</li>							
						</ul>
					</li>
					
					
					
					<li class="treeview" <?=$this->uri->segment(1) == 'report'  ? 'active' : ''?>">
						<a href="#">
							<i class="fa fa-pie-chart"></i> <span>Laporan</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							<li  <?=$this->uri->segment(1) == 'report'  && $this->uri->segment(2) == 'sale'  ? 'class="active"' : ''?>>
							<a href="<?=site_url('report/pembelian')?>"><i class="fa fa-circle-o"></i>Laporan Transaksi</a>
							<li <?=$this->uri->segment(1) == 'stock' ? 'class="active"' : ''?>><a href="<?=site_url('report/barang_masuk')?>"><i class="fa fa-circle-o"></i>Laporan Barang Masuk</a></li>
							<li  <?=$this->uri->segment(1) == 'sales'  && $this->uri->segment(2) == 'stocks'  ? 'class="active"' : ''?>>
							<a href="<?=site_url('report/barang_keluar')?>"><i class="fa fa-circle-o"></i>Laporan Barang Keluar</a>
							<li <?=$this->uri->segment(1) == 'laporan' ? 'class="active"' : ''?>><a href="<?=site_url('laporan')?>"><i class="fa fa-circle-o"></i>Laporan Persediaan Akhir</a></li>


						</li>
							
						</ul>

					
					</li>
					<?php } ?>
					<?php if($this->fungsi->user_login()->level == 1) { ?>
					<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					 
					<li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
						<a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
					</li>		

						<li class="treeview" <?=$this->uri->segment(1) == 'report'  ? 'active' : ''?>">
						<a href="#">
							<i class="fa fa-user"></i> <span>Admin</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							<li  <?=$this->uri->segment(1) == 'user'  && $this->uri->segment(2) == 'user'  ? 'class="active"' : ''?>>
							<a href="<?=site_url('user')?>"><i class="fa fa-circle-o"></i>Data User</a>
							<li <?=$this->uri->segment(1) == 'ttd' ? 'class="active"' : ''?>><a href="<?=site_url('ttd')?>"><i class="fa fa-circle-o"></i>Data TTD</a></li>

						</li>
					
					<?php } ?>
				 
				</ul>
			</section>
		</aside>

		<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Content Wrapper -->
		<div class="content-wrapper">
			<?php echo $contents ?>
		</div>	

	</div>

	<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>

	<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

	<script>
	var flash =  $('#flash').data('flash');
	if(flash){
		Swal.fire({
			icon: 'success',
			title: 'Berhasil',
			text: flash 
		})
	}
	$(document).on('click', '#btn-hapus', function(e) {
		
		e.preventDefault();
		var link = $(this).attr('href');

		Swal.fire({
		title: 'Apakah Anda yakin?',
		text: "Data akan terhapus!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
		if (result.isConfirmed) {
				window.location= link;
		
		}

		})
		
	
})
	</script>

	<script>
		$(document).ready(function() {
			$('#table1').DataTable()
		})
	</script>

</body>
</html>
