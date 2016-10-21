<?php
session_start();
$d = $_SESSION['no'];
if (!$d) {
    header("location:login.php");
}
include_once 'db.php';
include_once 'name.php';
$error = 0;
$s = 0;
$type = $_POST['type'];
$hotel = $_POST['hotel'];
$manager = $_POST['manager'];
$address = $_POST['address'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$des = $_POST['description'];
$photo1 = $_FILES['photo1']['name'];
$photo2 = $_FILES['photo2']['name'];
$near1=$r['near1'];
$near2=$r['near2'];
$near3=$r['near3'];
if ($photo1) {
    $file_tmp1 = $_FILES['photo1']['tmp_name'];
    $file_name1 = get_name($photo1);
    $target_dir1 = 'uploads/' . $file_name1;
    move_uploaded_file($file_tmp1, $target_dir1);
    $p1 = 1;
}
if ($photo2) {
    $file_tmp2 = $_FILES['photo2']['tmp_name'];
    $file_name2 = get_name($photo2);
    $target_dir2 = 'uploads/' . $file_name2;
    move_uploaded_file($file_tmp2, $target_dir2);
    $p2 = 2;
}
$s = $p1 + $p2;
if ($s == 3) {
    $query = "UPDATE register SET manager_name='$manager',address='$address',city='$city',phone='$phone',photo1='$file_name1',photo2='$$file_name2',description='$des',near1='$near1',near2='$near2',near3='$near3' where no='$d';";
} else if ($s == 1) {
    $query = "UPDATE register SET manager_name='$manager',address='$address',city='$city',phone='$phone',photo1='$$file_name1',description='$des',near1='$near1',near2='$near2',near3='$near3' where no='$d';";
} else if ($s == 2) {
    $query = "UPDATE register SET manager_name='$manager',address='$address',city='$city',phone='$phone',photo2='$$file_name2',description='$des',near1='$near1',near2='$near2',near3='$near3' where no='$d';";
} else if ($s == 0) {
    $query = "UPDATE register SET manager_name='$manager',address='$address',city='$city',phone='$phone',description='$des' where no='$d';";
}
$result = mysql_query($query);
if ($result == 1) {
    header('location:login.php?f=1&error=2');
    
} else { header('location:login.php?f=2&error=2');
    }
?>
