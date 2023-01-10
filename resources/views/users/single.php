<?php 
use Core\Helpers\Helper;
?>

<div id="myinf" class="row">
</div>
<div class="m-auto col-md-8 mt-1">
        <div class=" card mb-3 content">
            <div class="d-flex justify-content-between ">
                <h1 class="m-3 pt-3">About</h1>
                <div class=" edit m-3 pt-3 ml-5">
                    <a href="/users/edit?id=<?= $data->user->id ?>" class="btn btn-warning">Edit</a>
                    <?php if (Helper::check_permission(['transaction:read', 'transaction:delete'])) :
                    ?>
                    <a href="/users/delete?id=<?= $data->user->id ?>" class="btn btn-danger">Delete</a>
                    <?php endif ?>
                    <a href="/users" class="btn btn-success">Back</a>
        </div>
            </div>
                <div class="card-body">
                <div class="row">
           
                    <div class="col-md-3">
                        <h5>full name</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <?= $data->user->display_name ?>
                    </div>
                  
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Email</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                        <?= $data->user->email ?>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-3">
                        <h5>Permission</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                        Admin
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>User Name</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                        <?= $data->user->username ?>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Address</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    street no.345 yul
                </div>
            </div>
        </div>
        </div>
</div>
</div>


