<?php
if (isset($_POST['submit'])) {
    include_once 'db.php';
    include_once 'name.php';
    $error = 0;
    $type = $_POST['type'];
    $hotel = $_POST['hotel'];
    $manager = $_POST['manager'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $des = $_POST['des'];
    $near1=$_POST['near1'];
    $near2=$_POST['near2'];
    $near3=$_POST['near3'];
    $photo1 = $_FILES['photo1']['name'];
    $file_tmp1 = $_FILES['photo1']['tmp_name'];
    $file_name1 = get_name($photo1);
    $target_dir1 = 'uploads/' . $file_name1;
    move_uploaded_file($file_tmp1, $target_dir1);
    $photo2 = $_FILES['photo2']['name'];
    $file_tmp2 = $_FILES['photo2']['tmp_name'];
    $file_name2 = get_name($photo2);
    $target_dir2 = 'uploads/' . $file_name2;
    move_uploaded_file($file_tmp2, $target_dir2);

    if ($pass === $cpass && $type != 1 && preg_match('/^\d{10}$/', $phone)) {
        $pass = sha1($pass);
        $query = "insert into register values(NULL,'$hotel','$manager','$address','$city','$phone','$pass', '$file_name1','$file_name2','$type','$des','$near1','$near2','$near2');";
        $result = mysql_query($query);
        echo $result;
        if ($result == 1) {
            $error=3;
            //echo '<h1 style="color:green;">done</h1>';
        } else {
            //echo '<h1 style="color:red;">not done'
            //. '<br>' . $hotel . '<br>' . $manager . '<br>' . $address . '<br>' . $city . '<br>' . $photo1 . '<br>' . $photo2 . '<br>' . $query . '<br>' . $result
            //. '</h1>';
            $error=4;
        }
    } if ($pass != $cpass) {
        $error = 1;
    } if ($type == 1) {
        $error = 2;
    }
    if (!preg_match('/^\d{10}$/', $phone)) { $error=5;
    
}
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>HM</title>
        <link href="default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <div id="wrapper">
            <div id="menu-wrapper">
                <div id="menu" class="container">
                    <ul>
                        <li><a href="index.php">Homepage</a></li>
                        <li class="current_page_item"><a href="#">Register</a></li>
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
            <div id="page" class="container">
                <div id="content">
                    <div class="title">

                        <form action="register.php" method="POST" enctype="multipart/form-data">
                             <?php if($error==3) echo '<p style="color:green">Done</p>';
                                elseif ($error==4)echo'<p style="color:red">Something went wrong</p>'; {
                                
                            }?>
                            <h2>enter the details below</h2> <br>
                            <table border="0" cellpadding="10" style="font-family:Comic Sans MS;">
                                <tbody>
                                    <tr>
                                        <td>Hotel's name:</td>
                                        <td><input type="text" name="hotel" placeholder="enter Hotels's name"/></td>
                                    </tr>
                                    <tr>
                                        <td>Manager's name:</td>
                                        <td><input type="text" name="manager" placeholder="enter Manager's name"/></td>
                                    </tr>
                                    <tr>
                                        <td>Complete address:</td>
                                        <td><input type="text" name="address" placeholder="enter complete address"/></td>
                                    </tr>
                                    <tr>
                                        <td>City:</td>
                                        <td><input type="text" name="city" placeholder="enter city"/></td>
                                    </tr>
                                    <tr>
                                        <td>Contact no:</td>
                                        <td><input type="text" name="phone" placeholder="enter contact no"/></td>
                                        <?php if($error==5) echo '<p style="color:red;">ENTER VALID CONTACT NUMBER...</p>';?>
                                    </tr>

                                    <tr>
                                        <td>password:</td>
                                        <td><input type="password" name="pass"/></td>
                                    </tr>
                                    <tr>
                                        <td>confirm password:</td>
                                        <td><input type="password" name="cpass"/></td>
                                        <?php
                                        if ($error == 1) {
                                            echo '<p style="color:red;">PASSWORD DID NOT MATCH...</p>';
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>specify the type:</td>
                                        <td><select name="type">
                                                <option value="1">select an option</option>
                                                <option value="hotel">Hotel</option>
                                                <option value="pgg">PG for girls</option>
                                                <option value="pgb">PG for boys</option>
                                                <option value="hostelg">Hostel for girls</option>
                                                <option value="hostelb">Hostel for boys</option>
                                                <option value="flat">Flat</option>
                                                <option value="room">Room</option>
                                            </select></td>
                                        <?php
                                        if ($error == 2) {
                                            echo '<p style="color:red;">PLEASE SELECT AN TYPE...</p>';
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>Description:</td>
                                        <td><textarea name="des" rows="4" cols="20" placeholder="enter the details">
                                            </textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Hotel's picture:</td>
                                        <td><input type="file" name="photo1"/></td>
                                    </tr>
                                    <tr>
                                        <td>Hotel's picture:</td>
                                        <td><input type="file" name="photo2"/></td>
                                    </tr>

                                    <tr>
                                        <td>Places near by(if any):</td>
                                        <td><input type="text" name="near1" placeholder="couching,mall or turist place near by"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="text" name="near2" placeholder="couching,mall or turist place near by"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="text" name="near3" placeholder="couching,mall or turist place near by"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align:center"><input type="submit" name="submit" value="submit"/><?php $count = 1; ?></td>

                                    </tr>
                                </tbody>
                            </table>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="copyright" class="container">
        <p>&copy; Rooms.com | Design by <a href="https://www.linkedin.com/in/shivam-verma-46b357a4" rel="nofollow">Shivam verma</a>.</p>
    </div>
    </body>
</html>
