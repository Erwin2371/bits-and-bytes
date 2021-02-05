<?php
include('security.php'); 

include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<head>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="modal">
        <img src="image/profile.png" alt="">
        <div class="close"></div>
    </div>
    
    <div class="container">
        <div class="card">
            <div class="header">
                <div class="hamburger-menu">
                    <div class="center"></div>
                </div>
                <a href="#" class="mail">
                    <i class="far fa-envelope"></i>
                </a>
                <div class="main">
                    <div class="image">
                        <div class="hover">
                            <i class="fas fa-camera fa-2x"></i>
                        </div>
                    </div>

                    <?php

                        $connection = mysqli_connect("localhost","root","","b&b","3308");
                        $sql = "SELECT `AdminID`, `Name`, `Email`, `ContactNumber`, `Password` FROM `admin` WHERE `Name` = ?";
                        $result = mysqli_prepare($connection, $sql);
                        mysqli_stmt_bind_param($result, 's', $email_login);
                        mysqli_stmt_execute($result);
                        mysqli_stmt_store_result($result);
                        mysqli_stmt_bind_result($result, $ID, $Name, $Email, $ContactNumber, $Password);

                        if(mysqli_stmt_num_rows($result) == 1)
                        {
                            while (mysqli_stmt_fetch($result))
                            {
                    ?>
        <form action="code.php" method="POST">
        <h3 class="name"><?php echo $Name ?></h3>
        <h3 class="sub-name">@Admin_B&B</h3>
                </div>
            </div>

            <div class="content">
                <div class="left">
                    <div class="about-container">
                            
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="edit_email" value="<?php echo $Email ?>" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label> Contact Number </label>
                                <input type="text" name="edit_contact" value="<?php echo $ContactNumber ?>" class="form-control" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="edit_password" value="<?php echo $Password ?>" class="form-control" placeholder="Enter Password">
                            </div>

                            <a href="register.php" class="btn btn-danger" > CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
                    </div>
                    <div class="buttons-wrap">
                        <div class="follow-wrap">
                        </div>
                        <div class="share-wrap">
                        </div>
                    </div>
                </div>

                <div class="right">
                    <div>
                        <h3 class="number-title">Admin ID</h3>
                        <h3 class="number"><?php echo $ID ?></h3>
                    </div>
        </form>
                         <?php
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <script src="js/profile.js"></script>
</body>

<?php
include('includes/scripts.php');
?>
