<form action="/items/update" method="POST">
    <input type="hidden" name="id" value="<?= $data->item->id ?>">
    <div id="myinf" class="row">
    </div>
    <div class="m-auto col-md-8 mt-1">
        <div class=" card mb-3 content">
            <div class="d-flex justify-content-between ">
                <h1 class="m-3 pt-3">Edit Item</h1>
                <div class=" edit m-3 pt-3 ml-5">
                    <button type="submit" class="btn btn-success">Updeate</button>
                    <a href="/item?id=<?= $data->item->id ?>" class="btn btn-danger ms-3">Cancel</a>

                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-3">
                        <h5>Item Name</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                        <input type="text" class="form-control" id="item-name" name="item_name" value="<?= $data->item->item_name ?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Cost</h5>
                    </div>
                    <div class="col-md-9 text-secondary">

                        <input type="text" class="form-control" id="cost" name="cost" value="<?= $data->item->cost ?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Price</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                        <input type="text" class="form-control" id="selling_price" name="selling_price" value="<?= $data->item->selling_price ?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Quntity</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                        <input type="text" class="form-control" id="stock_availabel_quntity" name="stock_availabel_quntity" value="<?= $data->item->selling_price ?>">
                    </div>
                </div>
            </div>

</form>
</div>

</div>

</div>