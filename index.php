<?php require_once __DIR__ . '/config/config.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chappie Login</title>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="vendor/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css/util.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100" style="background-image: url('vendor/images/bg-01.jpg');">
        <div class="wrap-login100">
            <div class="login100-form validate-form sign-in-limiter">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                <span class="login100-form-title p-b-34 p-t-27">
						Giriş Yap
                </span>

                <div class="wrap-input100 validate-input" data-validate="Kullanıcı adı veya E-mail Geçersiz">
                    <input class="input100" type="text" name="username_or_email" placeholder="Kullanıcı adı veya E-posta">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Geçersiz Şifre">
                    <input class="input100" type="password" name="password" placeholder="Şifre">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="container-login100-form-btn sign-in-btn">
                    <button class="login100-form-btn">
                        Giriş Yap
                    </button>
                </div>
                <div class="text-center p-t-10 error-sign-in">
                    <hr class="mb-1" style="border-color:red;">
                    <span class="txt1"></span>
                    <hr class="mt-1" style="border-color:red;">
                </div>
                <div class="text-center p-t-10 success-sign-in">
                    <hr class="mb-1" style="border-color:green;">
                    <span class="txt1"></span>
                    <hr class="mt-1" style="border-color:green;">
                </div>
                <div class="text-center p-t-10">
                    <span class="txt1">Üye değil misin ? </span> <a class="txt1" id="sign-up" href="javascript:;" style="font-size:15px;">Üye Ol</a>
                </div>
            </div>
            <div class="login100-form validate-form sign-up-limiter">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                <span class="login100-form-title p-b-34 p-t-27">
						Üye Ol
                </span>

                <div class="wrap-input100 validate-input" data-validate="Kullanıcı adı geçersiz">
                    <input class="input100" type="text" name="username" placeholder="Kullanıcı adı">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="email" name="email" placeholder="E-posta">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Şifre geçersiz">
                    <input class="input100" type="password" name="password" placeholder="Şifre">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Şifre tekrar geçersiz">
                    <input class="input100" type="password" name="password_verify" placeholder="Şifre Tekrar">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="container-login100-form-btn sign-up-btn">
                    <button class="login100-form-btn">
                        Üye Ol
                    </button>
                </div>
                <div class="text-center p-t-10 error-sign-up">
                    <hr class="mb-1" style="border-color:red;">
                    <span class="txt1"></span>
                    <hr class="mt-1" style="border-color:red;">
                </div>
                <div class="text-center p-t-10 success-sign-up">
                    <hr class="mb-1" style="border-color:green;">
                    <span class="txt1"></span>
                    <hr class="mt-1" style="border-color:green;">
                </div>
                <div class="text-center p-t-10">
                    <span class="txt1">Zaten üyeliğin var mı ? </span> <a class="txt1" href="javascript:;" id="sign-in" style="font-size:15px;">Giriş Yap</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="vendor/js/main.js"></script>
<script src="vendor/js/ajax.js"></script>
</body>
</html>