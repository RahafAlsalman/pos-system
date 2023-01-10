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
                <?php if (Helper::check_permission(['item:read', 'item:update'])) : ?>
        <a href="/transactions/edit?id=<?= $data->transaction->id ?>" class="btn btn-warning">Edit</a>
    <?php endif;
    if (Helper::check_permission(['transaction:read', 'transaction:delete'])) :
    ?>
        <a href="/transactions/delete?id=<?= $data->transaction->id?>" class="btn btn-danger">Delete</a>
    <?php endif; ?>
                    <a href="/transactions" class="btn btn-success">Back</a>
        </div>
            </div>
                <div class="card-body">
                <div class="row">
           
                    <div class="col-md-3">
                        <h5>Item ID</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <?= $data->transaction->item_id?>
                    </div>
                  
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Item Quantity:</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <?= $data->transaction->quantity?>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-3">
                        <h5>Price: </h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <?= $data->transaction->price?>
                    </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Total price:</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                        <?= $data->transaction->total ?>
                    </div>
                    <hr>
                    <div class="row">
                <div class="col-md-3">
                    <h5>Created on:</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <?= $data->transaction->created_at ?>
                </div>
            </div>
    </div>
        </div>
        </div>
</div>
</div>





















