<!Doctype HTML>
<?php
if (isset($_POST['submit'])) {
    include_once 'db.php';
    include_once 'name.php';  
    $hotel_name=$_POST['hotel_name'];
    $manager_name=$_POST['manager_name'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    $photo1 = $_FILES['photo1']['name'];
    $file_tmp1 = $_FILES['photo1']['tmp_name'];
    $file_name1=  get_name($photo1);
    $target_dir1 = 'uploads/'.$file_name1;
    move_uploaded_file($file_tmp1,$target_dir1);
    $photo2=$_FILES['photo2']['name'];
    $file_tmp2 = $_FILES['photo2']['tmp_name'];
    $file_name2=  get_name($photo2);
    $target_dir2 = 'uploads/'.$file_name2;
    move_uploaded_file($file_tmp2,$target_dir2);
    $query="insert into register (hotel_name,manager_name,address,city,phone,photo1,photo2) values('$hotel_name','$manager_name','$address',$city','$phone','$file_name1','$file_name2')";
    $result=mysql_query($query);
    if($result==1)
    {echo '<h1 style="color:green;">done</h1>';}
    else {
        echo '<h1 style="color:red;">not done'
        . '<br>'.$hotel_name.'<br>'.$manager_name.'<br>'.$address.'<br>'.$city.'<br>'.$photo1.'<br>'.$photo2.'<br>'.$query.'<br>'.$result
                . '</h1>';        
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
                        <li><a href="about.php">About</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li class="current_page_item"><a href="#">Register</a></li>
                        <li><a href="login.php">login</a></li>
                        <li><a href="contact.php">contact</a></li>
                    </ul>
                </div>
                <div id="header-wrapper">
                    <div id="header" class="container"
                         <div id="logo" style="min-height:100px;">
                            <h1 style="color:wheat;">Hotels.com</h1><br>
                            <p style="color:blue;font-family:Segoe Script;">Plan your trip...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="banner"></div>
            <div id="page" class="container">
                <div id="content">
                    <div class="title">
                        <frameset>
                            <form action="h.php" method="POST" enctype="multipart/form-data">

                                <legend>enter the details below</legend>
                                <table border="0" cellpadding="10" style="font-family:Comic Sans MS;">
                                    <tbody>
                                        <tr>
                                            <td>Hotel's name:</td>
                                            <td><input type="text" name="hotel_name" placeholder="enter Hotels's name"/></td>
                                        </tr>
                                        <tr>
                                            <td>Manager's name:</td>
                                            <td><input type="text" name="manager_name" placeholder="enter Manager's name"/></td>
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
                                            <td colspan="2" style="text-align:center"><input type="submit" name="submit" value="submit"/><?php $count=1;?></td>

                                        </tr>
                                    </tbody>
                                </table>
                        </frameset>
                        </form>

                    </div>




                    <div id="copyright" class="container">
                        <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
                    </div>
                    </body>
                    </html>
