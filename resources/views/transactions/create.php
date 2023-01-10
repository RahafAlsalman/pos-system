<div id="sillingside" class="row ">
    <div class="col-md-4 ">
        <div class="card text-center sidebar">
            <div class="card-body2">
                <img src="https://htumarket.com/wp-content/uploads/2021/10/htu-markets.png" class="rounded-circle mt-3" width="250">

                <div class="link mt-4">
                    <div class="mt-4">
                        <form id="userInputContainer" class="my-4 d-flex justify-content-between">
                            <input type="hidden" value="<?= $_SESSION['user']['user_id'] ?>">
                            <div class="sellinput input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Items</span>
                                <select class="form-select" name="item" id="item" required>
                                    <option selected>Select Items</option>
                                    <?php foreach ($data->items as $item) :
                                        if ($item->stock_availabel_quntity == 0) {
                                            continue;
                                        }
                                    ?>

                                        <option value="<?= $item->id ?>" data-price="<?= $item->selling_price ?>" data-Quantity="<?= $item->stock_availabel_quntity ?>"><?= $item->item_name ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                    </div>
                </div>
                <div>
                    <div class="row g-3 align-items-center">
                        <div class="sellinput input-group flex-nowrap">

                            <span class="input-group-text w-5" id="addon-wrapping">Quantity</span>
                            <input id="quantity" id="quantity" type="number" class="form-control" aria-describedby="addon-wrapping" min="0">

                        </div>
                        <input type="hidden" name="itemprice" id="itemprice">
                        <input id="total" name="total" type="hidden">
                        <div class="input-group flex-nowrap">
                        </div>
                    </div>
                    <div>
                        <button id="add" type="button" class="add btn btn-primary btn-lg">Add</button>

                    </div>

                </div>
            </div>
        </div>

    </div>
    </form>

    <div id="sell" class=" col-md-8 mt-1">
        <div class=" card mb-3 content">
            <div class="d-flex justify-content-between ">
                <h3 class="m-3 pt-3">Total Sales:
                    <span id="total-sales">0</span>
                </h3>
                <div class=" edit m-3 pt-3 ml-5">
                    <a href="/transaction/seller" id="seeall" class="btn btn-primary ms-3">see all</a>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price Per Unit</th>
                        <th scope="col">Total</th>
                        <th id="action" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>



    <div id="editpag" style="display: none" class=" col-md-8 mt-1">
        <form action="" method="">

            <div id="myinf" class="row">
            </div>
            <div>
                <div class=" card mb-3 content">
                    <div class="d-flex justify-content-between ">
                        <h1 class="m-3 pt-3">Edit Transaction</h1>
                        <div class=" edit m-3 pt-3 ml-5">
                            <button type="submit" id="editQ" class="btn btn-success">Updeate</button>
                            <button id="redirect" class="btn btn-danger ms-3">Cancel</button>

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">
                                <h5>Quntity</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <input type="text" class="form-control" id="quantity" name="quantity">

                            </div>
                        </div>
                        <hr>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>
    let currentId = <?= $_SESSION['user']['user_id'] ?>;
    console.log(currentId)
    const totalSalesElement = $('#total-sales');

    let totalSales = 0;
    let counter = 1;

    $('#editaction').click(function(e) {
        e.preventDefault()
        $('#sell').hide();
        $('#editpag').show();
    })

    $('#redirect').click(function(e) {
        e.preventDefault()
        $('#sell').show();
        $('#editpag').hide();
    })

    $(function() {
        $('#item').change(function() {
            $('#itemprice').val($('#item option:selected').attr('data-price'));
        });
    });
    $("#quantity").change(function() {
        let stock = $('#stockQ').val() - $('#quantity').val();
        console.log(stock)
    });

    $('#add').click(function(e) {
        e.preventDefault();
        let data = {
            item_id: $('#item').val(),
            quantity: $('#quantity').val(),
            price: $('#itemprice').val(),
            total: $('#quantity').val() * $('#itemprice').val(),
            user_id: currentId
        };
        //============== to create data ON DB================
        $.ajax({
            type: "post",
            url: "http://htu.local/api/transactions/create",
            data: JSON.stringify(data),
            success: function(response) {
                alert('done')
            },
            error: function(e) {
                alert('not done');
            }
        });
        //===============to updeate the stock avilabel quntity(stock-quntity)================
        $.ajax({
            type: "put",
            url: "http://htu.local/api/transactions/update",
            data: JSON.stringify({
                id: $('#item').val(),
                quantity: $('#quantity').val(),
            }),
            success: function(response) {
                alert('updeate')
            },
            error: function(e) {
                alert('not updeate');
            }
        });
        //================= Get all data and apeend to the tabel===================================
        $.ajax({
            type: "get",
            url: "http://htu.local/api/transactions",
            success: function(response) {
                response.body.forEach(element => {
                    $('tbody').append(`
        <tr data-id=${element.id}>
        <td>${element.id}</td>
        <td>${element.item_id}</td>
        <td>${element.quantity}</td>
        <td>${element.price}</td>
        <td>${element.total}</td>
        <td>  
        <input type="hidden" id="transid" name='transid'data-id=id${element.id} value=${element.id}>
        <button id="editaction" data-id=edit${element.id} class="text-center btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
        <button location.href="/transactions/delete?id=${element.id}"  id="deletaction" data-id=delete${element.id} class="text-center btn btn-danger" type="button"><i class="fa-solid fa-trash"></i></button>
        </td>
        </tr>
        `);

                    totalSales += $('#quantity').val() * $('#itemprice').val();
                    totalSalesElement.text(totalSales);
                    counter++;
                    $('#userInputContainer').trigger('reset');

                    //============== updeate quantity to new quntety on click to updeat button ==========
                    $('#editQ').click(function(e) {
                        e.preventDefault()
                        $.ajax({
                            type: "put",
                            url: "http://htu.local/api/transactions/update/quntity",
                            data: JSON.stringify({
                                id: $('#transid').val(),
                                quantity: $('#quantity').val(),
                            }),
                            dataType: "application/json",
                            success: function(response) {
                                alert('updeate');
                            },
                            error: function(e) {
                                console.log(e);
                            }
                        });
                        $('#sell').show();
                        $('#editpag').hide();
                    });

                    //======================= Delete the single transaction==========================
                    $(`tr[data-id="${element.id}"] #deletaction`).click(function() {
                        $.ajax({
                            type: "DELETE",
                            url: "http://htu.local/api/transactions/delete",
                            data: JSON.stringify({
                                id: $('#transid').val()
                            }),
                            dataType: "application/json",
                            success: function(response) {
                                console.log(response);
                                alert('are you suer you want to delet it??');
                            },
                            error: function(e) {
                                console.log(e);
                            }


                        });
                        $(this).parent().hide('slow', function() {
                            $(this).parents('tr').remove();
                        });
                    });


                    $("#editaction").click(function() {
                        $('#sell').hide();
                        $('#editpag').show();
                    });
                });
            }
        });
    });
</script>