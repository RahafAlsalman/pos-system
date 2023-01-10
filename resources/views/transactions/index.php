
<h1 class="">Transactions</h1>
<div class=>

<table  class="table ">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Proudect</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Availabel Quantity</th>
      <th scope="col">Seller Name</th>
      <th scope="col">Seller Email</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

   
      <?php foreach ($data->users as $user):?>
       
        <tr>
        <td> <?=$user->id?></td>
        <td> <?=$user->item_name?></td>
        <td> <?=$user->quantity?></td>
        <td> <?=$user->total?></td>
        <td> <?=$user->stock_availabel_quntity?></td>
        <td> <?=$user->display_name?></td>
        <td> <?=$user->email?></td>
      <td><a href="./transaction?id=<?= $user->id ?>" class="btn btn-primary">Check</a></td>
       
      </tr>
      
      <?php endforeach?>
   
  </tbody>
</table>
</div>
</div>
</div>
