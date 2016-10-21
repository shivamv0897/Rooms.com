<?php
$q = $_REQUEST['q'];
$cl=0;
$query = "select * from register where type='$q'";
require_once 'db.php';
$query1="select * from price where no='$q'";
$result = mysql_query($query);
$result1=  mysql_query($query1);
if($o=  mysql_fetch_assoc($result1))
        $offer=$o['offers'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
        <style>
            #s
            {
                font-family: Segoe Print;
                color:wheat;
                text-align: center;

            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="menu-wrapper">
                <div id="menu" class="container">
                    <ul>
                        <li class="current_page_item"><a href="#">Homepage</a></li>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">login</a></li>
                        <li><a href="contact.php">contact</a></li>
                    </ul>
                </div>
                <div id="header-wrapper">
                    <div id="header" class="container">
                         <div id="logo" style="min-height:100px;">
                            <h1 style="color:wheat;">Rooms.com</h1><br>
                            <p style="color:blue;font-family:Segoe Script;">Plan your trip...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="banner"></div>

            <table id="s" class="table table-hover">
                <?php
                $i = 0;
                while ($row = mysql_fetch_assoc($result)) {
                    ?>
                 <tr>
                        <td>
                            <img class="img-circle" src="<?php echo 'uploads/' . $row['photo1']; ?>" height="100em" width="100em">
                            <br> <br>
                            <img class="img-circle" src="<?php echo 'uploads/' . $row['photo2']; ?>" height="100em" width="100em">
                        </td>
                        <td>
                            <br><a href="show.php?d=<?php echo $row['no']; $cl=1;?>&q=<?php echo $q;?>"><p><?php echo $row['hotel_name']; ?></p></a>
                        </td>
                        <td>
                            <br><p><?php echo $row['address']; ?></p>
                        </td>
                        <td>
                            <br><p><?php echo $row['city']; ?></p>
                        </td>
                        <td>
                            <br><p><?php echo $row['description']; ?></p>
                        </td>
                        <?php if($cl==1){ echo'<td>';
                            $d=$_REQUEST['d'];
                            $q="select * from register where no='$d'";
                            $res=  mysql_query($q);
                            if($r=  mysql_fetch_assoc($res)){
                                $p=$r['phone'];
                                echo "<br> $p ";
                                }
                            echo'</td>';
                            $cl=0;
                        }?>
                 <br><br><td><marquee><?php echo "$offer";?></marquee></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
            <div id="copyright" class="container">
        <p>&copy; Rooms.com | Design by <a href="https://www.linkedin.com/in/shivam-verma-46b357a4" rel="nofollow">Shivam verma</a>.</p>
    </div>
    </body>
</html>


