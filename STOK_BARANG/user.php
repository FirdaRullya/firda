<?php
$isset = $_SESSION['MEMBER'];
if(isset($sesi) && $sesi ['role'] != 'karyawan'){

$ar_judul = ['No','Nama Lengkap','Username','Email','Role','',''];
//ciptakan object dari PegawaiModel
$model = new UserModel();
$rs = $model->getAll();

?>
<h3>Kelola User</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
          include_once 'form_user.php'; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<br/>
<br/> 
<table class="table">
  <thead class="thead-dark">
    <tr>
      <?php
      foreach ($ar_judul as $judul) {

      
      ?>
      <th scope="col"><?= $judul ?></th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($rs as $user) {
    ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $user['fullname'] ?></td>
      <td><?= $user['username'] ?></td>
      <td><?= $user['email'] ?></td>
      <td><?= $user['role'] ?></td>
      <td align="right">
        <a class="btn btn-primary btn-sm" href="index.php?hal=form_user&idedit=<?= $user['id'] ?>">Update</a>
        <!-- <a class="btn btn-danger btn-sm" href="#" onclick="return confirm('Confirm')">Delete</a> -->
      </td>
      <td align="left"> 
        <form method="POST" action="controllerUser.php">
        <button class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Confirm')">Delete</button>
        <input type="hidden" name="idx" value="<?= $user['id'] ?>"/>
        </form>
      </td>
    </tr>
  <?php 
  $no++; 
  } ?>
  </tbody>
</table>
<?php }else{
  include_once 'terlarang.php';
} 
?>