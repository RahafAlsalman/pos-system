<?php 
use Core\Helpers\Helper;
if (Helper::check_permission(['user:create'])):?>
<div class="row">
  <div class="col-sm-3 md-6 lg-4 xl-3  mt-5">
    <div  class="pos-card card">
      <div id="color-card"class= "card-body d-flex justify-content-between ">
        <h6 class="card-title text-center">USERS :  <?= $data->users_count ?></h6>
        <h5> <i class="fa-solid fa-users"></i></h5>
      </div>
    </div>
  </div>
  <div class="col-sm-3 md-6 lg-4 xl-3  mt-5">
    <div class=" pos-card card">
      <div id="color-card1" class="card-body  d-flex justify-content-between ">
        <h6 class="card-title">PROUDUCT :<?= $data->items_count ?></h6>
       <h6> <i class="fa-solid fa-cookie"></i></h6>
      </div>
    </div>
  </div>
  <div class="col-sm-3 md-6 lg-4 xl-3  mt-5">
    <div  class=" pos-card card">
      <div id="color-card2" class="card-body d-flex justify-content-between">
    
        <h6 class="card-title">ORDERS :<?=$data->transactions_count?> </h6>

        <h5><i class="fa-solid fa-basket-shopping"></i></h5>
      </div>
    </div>
  </div>
  <div class="col-sm-3 md-6 lg-4 xl-3  mt-5">
    <div class=" pos-card card">
      <div  id="color-card3"  class="card-body d-flex justify-content-between">
        <h5 class="card-title">Sales  :<?=$data->total_sum?>
        </h5>
     <h5><i class="fa-sharp fa-solid fa-file-invoice-dollar"></i><h5>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<hr class="hr">
<div class="row mt-5">
  <div class="col-8">
  <!-- <div id="titel-user" class="d-flex d-flex justify-content-between">
<!--   
  <h3 id="user"class="mt-3">Top five expinsiv prouduct</h3>
   -->
  
  <!-- </div> -->
  
  <table id="width-tabel" class="table">
    <thead>
      <tr>
       <th>Top expinsiv<th>
      </tr>
      <tr>
      <th>Prouduct</th>
      <th>Price</th>
      <th>Acction</th>
      </tr>
    </thead>
    <tbody>
    <tr>
    <?php foreach (array_slice($data->top_selling_price,0,5,true) as $price) :?>
        <td> <?=$price->item_name?></td>
        <td><?=$price->selling_price?>$</td>
      <td><button id="actionuser" type="button" class="btn btn-info">Deteils</button>
    </td>
      </tr>
      <?php endforeach?>
    </tbody>
  </table>
  
  
  </div>
  <div class="col-4">
  <!-- <div id="titel-user" class="d-flex d-flex justify-content-between">
  
  <h3 id="user"class="mt-3"></h3>
  
  
  </div>
   -->
  <table class="table">
    <thead>
     <h3></h3>
      <th> All user</th>
    </thead>
    <tbody>
    <tr>
    <?php foreach ($data->users as $user) :?>
        <td><img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="rounded-circle "width="40" ></td>
        <td><?=$user->display_name?></td>
        <td><a href="./user?id=<?= $user->id?>" class="btn btn-info" id="actionuser">Deteils</a></td>
    
      </tr>
      <?php endforeach?>
    </tbody>
  </table>
  
  </div>
</div>








<!-- </table>
<hr class="hr mt-5">
<h3 class="text-center">ALL product</h3>
<div class=" top mt-5">

<table  class="table ">
  <thead>
    <tr>
      
      <th scope="col">Prouduct</th>
      <th scope="col">Quntitty</th>
    
    </tr>
  </thead>
  <tbody>
  
    <?php foreach ($data->items as $item) :?>
      <?php foreach ($data->transactions as $transaction) :?>
        <tr>
      <td> <?=$item->item_name?></td>
        <td> <?=$transaction->quantity?></td>
      
      <?php endforeach?>
      <?php endforeach?>
   
        </tr>
  </tbody>
</table> -->
</div>
</div>
</div>

<?php endif;
if ($_SESSION['user']["username"] !== "admin"):?>
<img  id="imguser"src="https://fjwp.s3.amazonaws.com/blog/wp-content/uploads/2021/05/20063810/first-day-remote-work-1024x512.png">
<?php endif?>