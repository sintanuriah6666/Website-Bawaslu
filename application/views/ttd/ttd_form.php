<section class="content-header">
    <h1>Data Jabatan
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Data</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Jabatan</h3>
            <div class="pull-right">
                <a href="<?=site_url('ttd')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('ttd/process')?>" method="post">
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="hidden" name="id" value="<?=$row->ttd_id?>">
                            <input type="text" name="name" value="<?=$row->name?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" name="nip" value="<?=$row->nip?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" value="<?=$row->jabatan?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="simpan" name="<?=$page?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                            <button type="Ulang" class="btn btn-flat">Ulang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>