<h3 class="">All Transactions for today  <i class="fa-regular fa-face-smile"></i></h3>

<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">Item ID</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach($data->transactions as $transaction):?>
    <tr>
    <td><?=$transaction->item_id?></td>
      <td><?=$transaction->item_name?></td>
      <td><?=$transaction->price?></td>
      <td><?=$transaction->quantity?></td>
      <td><?=$transaction->total?></td>
      
    </tr>
   <?php endforeach?>
  </tbody>
</table>