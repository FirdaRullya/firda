<?php
session_start();
//file2terkait
include_once 'koneksi.php';
include_once 'BarangModel.php';
include_once 'SupplierModel.php';
include_once 'KategoriModel.php';
include_once 'UserModel.php';
include_once 'PembelianModel.php';
include_once 'LoginModel.php';

//layout
include_once 'header.php';
include_once 'menu.php';
echo '<br/>';
include_once 'sidebar.php';
echo '<br/>';
include_once 'main.php';
echo '<br/>';

include_once 'footer.php';