<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Ubah Password</h3>
            </div>
            <div class="panel-body">
                <div class="row">   
                    <div class="col-md-10 col-md-offset-1">
                        <?php if($_POST) include'aksi.php'; ?>
                        <form method="post" action="?m=password&act=password_ubah">
                            <div class="form-group">
                                <label>Password Lama <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="pass1"/>
                            </div>
                            <div class="form-group">
                                <label>Password Baru <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="pass2"/>
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="pass3"/>
                            </div>
                            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>