<section class="content-header">
	<h1>Dashboard
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Stok Barang</span>
              <span class="info-box-number"><?=$this->fungsi->count_item()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Supplier</span>
              <span class="info-box-number"><?=$this->fungsi->count_supplier()?></span>
          </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Transaksi</span>
              <span class="info-box-number"><?=$this->fungsi->count_sale()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">User</span>
              <span class="info-box-number"><?=$this->fungsi->count_user()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-sign-in"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Barang Masuk</span>
              <span class="info-box-number"><?=$this->fungsi->count_barangmasuk()?></span>
            </div>

            
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-navy"><i class="fa fa-sign-out"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Barang Keluar</span>
              <span class="info-box-number"><?=$this->fungsi->count_stock()?></span>
            </div>
      </div>
</section>
