<?php
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Tax | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to E-Tax</h2>

                
                <h3>
                    Sistem Aplikasi Pajak Daerah Online
                </h3>

                <p>
                    Merupakan sebuah sistem untuk memantau pendapatan pajak daerah seperti pajak PHRI dan Parkir
                </p>
				<br>
<!--
				<p>
                    Gunakan akun berikut untuk login.
                <br>
					<small>username : <strong>demo</strong></small>
<br>
					<small>password : <strong>demo1234</strong></small>
					</p>
-->
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                     <form class="m-t" role="form" action="act_login.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="txtUser" name="txtUser" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" id="txtPassword" name="txtPassword" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                       
                    </form>
                    <p class="m-t">
                        <small></small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>

		<div class="title-action">
					
                        <img alt="image" src="img/how-it-works.png" width='100%' height='550' align='center'/>
                    </div>
		<hr/>

        <div class="row">
            <div class="col-md-6">
                PT Pinisi Elektra
            </div>
            <div class="col-md-6 text-right">
               <small>© 2013-2016</small>
            </div>
        </div>
    </div>

</body>
</html>
