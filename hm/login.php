<?php
if (isset($_POST['submit'])) {
    $error = 0;
    $manager_name = $_POST['manager_name'];
    $password = $_POST['pass'];
    $pass = sha1($password);
    include_once 'db.php';
    $quer = "select * from register where manager_name='$manager_name' and password='$pass';";
    $result = mysql_query($quer);
    if ($r = mysql_fetch_assoc($result)) {
        $error = 2;
        $d = $r['no'];
        session_start();
        $_SESSION['no'] = $d;
        header("location:login.php?error=$error");
    } else {
        $error = 1;
    }
}
$error = $_GET['error'];
$f = $_GET['f'];
if ($error == 2) {
    session_start();
    if (!isset($_SESSION['no'])) {
        header('location:login.php');
    }
    $d = $_SESSION['no'];
    $q = "select * from register where no='$d'";
    include_once 'db.php';
    $result = mysql_query($q);
    if ($r = mysql_fetch_assoc($result)) {
        $hn = $r['hotel_name'];
        $mn = $r['manager_name'];
        $ph = $r['phone'];
        $c = $r['city'];
        $add = $r['address'];
        $des = $r['description'];
        $photo1 = $r['photo1'];
        $photo2 = $r['photo2'];
        $near1 = $r['near1'];
        $near2 = $r['near2'];
        $near3 = $r['near3'];
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
                        <li><a href="register.php">Register</a></li>
                        <li class="current_page_item"><a href="#">login</a></li>
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
                    <div class="title"> <?php if ($error != 2) { ?>

                            <h2 style="font-family:Comic Sans MS;">login to your desktop</h2><br>
                            <form method="post" >
                                <table>  <tr>  
                                        <td> Manger's name:</td>
                                        <td><input type="text" name="manager_name" placeholder="enter manager's name"/><br></td>
                                    </tr>
                                    <tr> <td>Password:</td>
                                        <td><input type="password" name="pass"/><br></td></tr>
                                    <tr><td colspan="2"> <center><input type="submit" name="submit" value="login"/></center></td></tr>

                                </table></form> <?php } ?>
                        <?php
                        if ($error == 1) {
                            echo '<p style="color:red;">INVALID USERNAME OR PASSWORD...</p>';
                        } else if ($error == 2) {
                            if ($f == 1)
                                echo '<p style="color:green">Done!!...changes have been saved</p>';
                            else if ($f == 2)
                                echo '<p style="color:red">Sorry!!...please try again later</p>';
                            echo '<h2 style="color:green;">WELCOME</h2>';
                            ?>

                            <div id="sidebar" style="float: right;">
                                <div class="box2" style="float: right;">
                                    <div class="title" style="float:right;margin-left:400em;">

                                        <table style="float: right; "><tr>
                                                <td style="text-align: right;"> <img src="<?php echo 'uploads/' . $photo1; ?>" height="150em" width="150em"></td>
                                            <br> <br>
                                            <td style="text-align: right;"><img src="<?php echo 'uploads/' . $photo2; ?>" height="150em" width="150em"></td>

                                            </tr></table>
                                    </div>

                                </div>
                            </div>

                            <p>edit the fields if you want to make changes:</p><form action="su.php" method="post">
                                <table border = "0">
                                    <tbody>
                                        <tr>
                                            <td>Hotel name:</td>
                                            <td><input type = "text" value = "<?php echo $hn; ?>" readonly = "readonly" /></td>
                                        </tr>
                                        <tr>
                                            <td>Manager name:</td>
                                            <td><input type = "text" value = "<?php echo $mn; ?>" name="manager" /></td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td><input type = "text" value = "<?php echo $ph; ?>" name="phone" /></td>
                                        </tr>
                                        <tr>
                                            <td>City:</td>
                                            <td><input type = "text" value = "<?php echo $c; ?>" name="city" /></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td><input type = "text" value = "<?php echo $add; ?>" name="address" /></td>
                                        </tr>
                                        <tr>
                                            <td>Description:</td>
                                            <td><textarea name="description" rows="5" cols="10"><?php echo $des; ?></textarea></td>

                                        </tr>
                                        <tr>
                                            <td>photo1:</td>
                                            <td><input type = "file" value = "<?php echo $photo1; ?>" name="photo1" /></td>
                                        </tr>
                                        <tr>
                                            <td>photo2:</td>
                                            <td><input type = "file" value = "<?php echo $photo2; ?>" name="photo2" /></td>
                                        </tr>
                                        <tr>
                                            <td>Places near by(if any):</td>
                                            <td><input type="text" name="near1" value="<?php echo $near1; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="text" name="near2" value="<?php echo $near2; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="text" name="near3" value="<?php echo $near3; ?>"/></td>
                                        </tr>
                                        <tr><td colspan="2"><center><input type="submit" value="submit" name="submit" /></center></td></tr>
                                    </tbody>
                                </table>

                            </form><br>
                            <a href="lout.php">logout</a>
                        <?php } ?>
                    </div>

                </div>
            </div>

        </div>

        <div id="copyright" class="container">
        <p>&copy; Rooms.com | Design by <a href="https://www.linkedin.com/in/shivam-verma-46b357a4" rel="nofollow">Shivam verma</a>.</p>
    </div>
</body>
</html>
