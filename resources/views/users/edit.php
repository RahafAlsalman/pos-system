<form action="/users/update" method="POST">
    <input type="hidden" name="id" value="<?= $data->user->id ?>">
<div id="myinf" class="row">
</div>
<div class="m-auto col-md-8 xl-6 sm-1 mt-1">
        <div class=" card mb-3 content">
            <div class="d-flex justify-content-between ">
                <h1 class="m-3 pt-3">Edit User</h1>
                <div class=" edit m-3 pt-3 ml-5">
                    <button type="submit" class="btn btn-success">Updeate</button>
                    <a href="/user?id=<?= $data->user->id ?>" class="btn btn-danger ms-3">Cancel</a>

        </div>
            </div>
                <div class="card-body">
                <div class="row">
           
                    <div class="col-md-3">
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
                            <h5>Role</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                        <select class="form-select" aria-label="Role" name="role">
                            <option value="admin">Admin</option>
                            <option value="seller">Seller</option>
                            <option value="procurement">Procurement</option>
                            <option value="accountant">Accountant</option>
                        </select>         
                    </div>
                    <hr>
                </div>
              
            </div>

</form>
        </div>
        
        </div>
        
</div>


