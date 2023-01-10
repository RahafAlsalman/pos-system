<form action="/users/update" method="POST">
    <input type="hidden" name="id" value="<?= $data->user->id ?>">
<div id="myinf" class="row">
</div>
<div class="m-auto col-md-8 mt-1 xl-6 sm-1">
        <div class=" card mb-3 content">
            <div class="d-flex justify-content-between ">
                <h1 class="m-3 pt-3">Edit User</h1>
                <div class=" edit m-3 pt-3 ml-5">
                    <button type="submit" class="btn btn-success">Updeate</button>
                    <a href="/profiles?id=<?= $data->user->id ?>" class="btn btn-danger ms-3">Cancel</a>

        </div>
            </div>
                <div class="card-body">
                <div class="row">
           
                    <div class="col-md-3 xl-6 sm-1">
                        <h5>full name</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <input type="text" class="form-control" id="display-name" name="display_name" value="<?= $data->user->display_name ?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Email</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    
        <input type="email" class="form-control" id="user-email" name="email" value="<?= $data->user->email ?>">
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-3">
                        <h5>Password</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <input type="password" class="form-control" id="user-password" name="password" value="<?= $data->user->password ?>">
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-3">
                        <h5>Addrees</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <input type="password" class="form-control" id="user-password" name="password" value="<?= $data->user->address ?>">
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-3">
                        <h5>Phone</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <input type="password" class="form-control" id="user-password" name="password" value="<?= $data->user->phone ?>">
                    </div>
                    </div>
                </div>
              
            </div>

</form>
        </div>
        
        </div>
        
</div>
