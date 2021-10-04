<?php
session_start();
function login(){
    if(isset($_POST['login'])){
        //getting the form data
        $adminid = $_POST['id'];
        $pw = $_POST['pw'];

        $query= "SELECT * FROM admins WHERE BINARY adminID='$adminid' && adminPw='$pw'";

        require_once('dbconn.php');

        $result = mysqli_query($db,$query) or die("Problem Encounter: Please check your ID or password");
        $count = mysqli_num_rows($result);
        if($count == 1){
            
            $_SESSION['user'] = $adminid;           
            header('Location: index.php');
        }
        else{
            echo "<script>alert('Problem Encounter: Please check your ID or password')</script>";
        }
        
    }
}

?>
<?php login() ?>



<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel - Login</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
  <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<body>
	<!-- ============================================================== -->
    <script>
        function showPw() {
            var x = document.getElementById("pw");
            if (x.type === "password") {
                x.type = "text";
            }
            else {
                x.type = "password";
            }
        }
    </script>
    <!-- ============================================================== -->
    <div class="splash-container" >
        <div class="card" style="border-radius: 20px;">
		<div class="card-header text-center" style="border-radius: 20px;"><a class="navbar-brand" href="login.php">Admin Panel</a><span class="splash-description">Login to admin panel.</span></div>
			<div class="card-body">
            
                <form id="loginform" action="" method="POST">
                    <div id="login_div">
                        <div class="form-group">
                            <input class="form-control form-control-lg"  type="text" name="id" required="required" placeholder="Admin ID" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input id="pw" class="form-control form-control-lg" type="password" name="pw" required="required" placeholder="Password">
                        </div>
                        <div class="form-group">
                        <input type="checkbox" onclick="showPw()"> Show Password 
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" style="border-radius: 20px;">Sign in</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
</body>
</html>
