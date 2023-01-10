<h3 class=" ">All Product :<?= $data->items_count ?></h3>
<div class="row">
<?php
     foreach ($data->items as $item) : ?>
     
  <div class=" htu-card-wrapper col-sm-3 md-6 lg-4 xl-3  mt-5">
    <div  class="pos-card card">
    <a id="itemclick" style="text-decoration:none" href="./item?id=<?= $item->id ?>">
      <div id="color-cards"class= "card-body d-flex justify-content-between ">
      <h6 class="card-title text-center"> <?= $item->item_name?></h6>
        <h5> <i class="fa-solid fa-cookie-bite"></i></h5>       
      </div>
      </a>
    </div>
    
  </div>
  <?php endforeach?>
</div>











<!-- <div class="row mt-5">

    <?php
     foreach ($data->items as $item) : ?>
        <div class="htu-card-wrapper mb-3 col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card w-100">
                <div  id="itemC"class="card-body">
                    <h5 class="card-title text-center">
                        <?= $item->item_name?>
                    </h5>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="./item?id=<?= $item->id ?>" class="btn btn-primary">Check</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>  -->