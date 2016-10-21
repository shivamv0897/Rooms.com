
<?php
require_once 'db.php';
$q = $_GET['q'];
$query = "select city from register where city like '%" . $q . "%'";
$city = array();
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)) {
    $city[] = $row['city'];
}
$str = json_encode($city);
echo $str;
?>