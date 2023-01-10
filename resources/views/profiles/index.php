
<!-- <form method="POST">
<input type="hidden" value="$_SESSION['user']['user_id']">
</form> -->
<div id="myinf" class="row">
    <div class="col-md-4 xl-6 sm-1 ">
    <div class="card text-center sidebar">
                <div class="card-body1">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                    class="rounded-circle mt-3"width="160">
       
                    <div  class="link mt-4">
                    <div  class="mt-4"> <h3><?=$data->user->display_name?></h3></div>
                    <div  class="mt-4"><a href="./dashboard"><strong>Home</strong></a></div>
                    <div  class="mt-4"><a href="@"><strong>Work</strong></a></div>
                    <div  class="mt-4"><a href="@"> <strong>Sitting</strong></a></div>
                    <div  class="mt-4"><a href="/logout"><strong>Singout</strong></a></div>
                    </div>
            </div>
    </div>
    
</div>
<div class=" col-md-8 mt-1">
        <div class=" card mb-3 content">
            <div class="d-flex justify-content-between ">
            <h1 class="m-3 pt-3">About</h1>
     <div class=" edit m-3 pt-3 ml-5">
     
     <a href="/profiles/edit?id=<?= $data->user->id ?>" class="btn btn-warning">Edit</a>    </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <h5>full name</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                <?=$data->user->display_name ?>
                </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Email</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <?=$data->user->email?>
                    </div>
                    </div>
                    <hr>
                    <!-- <div class="row">
                    <div class="col-md-3">
                        <h5>Permission</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <?=$data->user->permissions?>
                    </div>
                    </div> -->
                    
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Phone</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            07889170
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


<div id="editinf" class="row" style="display: none;">
    <div class="col-md-4 ">
    <div class="card text-center sidebar">
                <div class="card-body1">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                    class="rounded-circle mt-3"width="160">
                    
                    <div  class="link mt-5">
                    <div  class="mt-4"> <h3>Rahaf Alsalman</h3></div>
                    <div  class="mt-4"><a href="./dashbord"><strong>Home</strong></a></div>
                    <div  class="mt-4"><a href="@"><strong>Work</strong></a></div>
                    <div  class="mt-4"><a href="@"> <strong>Sitting</strong></a></div>
                    <div  class="mt-4"><a href="/logout"><strong>Singout</strong></a></div>
                    </div>
            </div>
    </div>
    
</div>
<div class=" col-md-8 mt-1">
        <div class=" card mb-3 content ">
            <div class="d-flex justify-content-between">
            <h1 class="m-3 pt-3">About</h1>
     <div class=" edit m-3 pt-3 ml-5">
        <button id=>Updeat</button>
    </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <h5>full name</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
  <div class="col-auto">
    <input type="text"name="name" id="inputPassword6" class="form-control w-50">
                    </div>
                  
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Email</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <input type="email"name="email" id="inputPassword6" class="form-control w-50">
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Phone</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                        <input type="text"name="phone" id="inputPassword6" class="form-control w-50">
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Address</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                    <input type="text"name="address" id="inputPassword6" class="form-control w-50">
                </div>
            </div>
        </div>
        </div>
</div>
</div>



<!-- 
        <script>
            var mydata = "test data";
$(document).ready(function(){
    // e.preventDefault();
  $("#button").click(function(){
    $("#myinf").hide();
    $("#editinf").show();

  });
});

   </script> -->
      

        