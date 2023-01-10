<?php

use Core\Helpers\Helper;
?>
<div id="myinf" class="row">
</div>
<div class="m-auto col-md-8 mt-1">
    <div class=" card mb-3 content">
        <div class="d-flex justify-content-between ">
            <h1 class="m-3 pt-3">Item</h1>
            <div class=" edit m-3 pt-3 ml-5">
                <?php if (Helper::check_permission(['item:read', 'item:update'])) : ?>
                    <a href="/items/edit?id=<?= $data->item->id ?>" class="btn btn-warning">Edit</a>
                <? endif;
                if (Helper::check_permission(['item:read', 'item:delete'])) :
                ?>
                    <a href="/items/delete?id=<?= $data->item->id ?>" class="btn btn-danger">Delete</a>
                <?php endif ?>
                <a href="/items" class="btn btn-success">Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-3">
                    <h5>Item Name:</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <?= $data->item->item_name ?>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5>Item ID:</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <?= $data->item->id ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5>Qunttity:</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <?= $data->item->stock_availabel_quntity ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5>Cost:</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <?= $data->item->cost ?>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h5>Price:</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <?= $data->item->selling_price ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5>Created on:</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <?= $data->item->created_on ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>