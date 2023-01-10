<form action="/transactions/update" method="POST">
    <input type="hidden" name="id" value="<?= $data->transaction->id ?>">
<div id="myinf" class="row">
</div>
<div class="m-auto col-md-8 mt-1">
        <div class=" card mb-3 content">
            <div class="d-flex justify-content-between ">
                <h1 class="m-3 pt-3">Edit Transaction</h1>
                <div class=" edit m-3 pt-3 ml-5">
                    <button type="submit" class="btn btn-success">Updeate</button>
                    <a href="/transaction?id=<?= $data->transaction->id ?>" class="btn btn-danger ms-3">Cancel</a>

        </div>
            </div>
                <div class="card-body">
                <div class="row">
           
                    <div class="col-md-3">
                        <h5>Item ID:</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <input type="text" class="form-control" id="item_id" name="item_id" value="<?= $data->transaction->item_id ?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Item Quantity</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    
        <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $data->transaction->quantity ?>">
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-3">
                        <h5> Total Price</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <input type="text" class="form-control" id="total" name="total" value="<?= $data->transaction->total ?>">
                    </div>
                    </div>
                    
                </div>
              
            </div>

</form>
        </div>
        
        </div>
        
</div>


