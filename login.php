<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Form Login Administrator</h3>
            </div>
            <div class="panel-body">
                <div class="row">   
                    <div class="col-md-10 col-md-offset-1">       
                        <?php if($_POST) include 'aksi.php'; ?>
                        <form class="form-signin" method="post">                        
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="user" autofocus />
                            </div>
                            <div class="form-group">            
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="pass" />  
                            </div>      
                            <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>        
                        </form>      
                    </div>
                </div>
            </div>
        </div>                  
    </div>
</div>