<div id="titel-user" class="d-flex d-flex justify-content-between">
<h2 id="user"class="mt-3">USER </h2>
<button location.href="/users/create" id="creat-user" type="button" class="btn btn-primary"><i class="fa-solid fa-plus align-center"></i></button>

</div>

<table class="table">
  <thead>
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>permissions</th>
    <th>Acction</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  <?php foreach ($data->users as $user) : ?>
    <tr>
    <td><?= $user->display_name ?></td>
    <td><?= $user->email ?></td>
    <td><?= $user->username?></td>
    <td><a href="./user?id=<?= $user->id?>" class="btn btn-info" id="actionuser1">Deteils</a>

    </tr>
    <?php endforeach?>
  </tbody>
</table>




