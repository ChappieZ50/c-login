<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config/config.php';
$sign = new Clogin($db);
if (post('signIn')):
    $format = post('format');
    $signInUsrEmail = post('signInUsrEmail');
    $signPassword = post('signPassword');
    if (!empty($format) && !empty($signInUsrEmail) && !empty($signPassword)):
        if ($format == 'email'):
            $signInUsrEmail = filter_var($signInUsrEmail, FILTER_SANITIZE_EMAIL);
            if (filter_var($signInUsrEmail, FILTER_VALIDATE_EMAIL)):
                $signEmail = $sign->signInEmail($signInUsrEmail, $signPassword);
                // SUCCESS
                echo $signEmail['case'] === true ? $sign->_s( 'Giriş Başarılı',true) : json_encode($signEmail);
            endif;
        else:
            // SUCCESS
            $signUsername = $sign->signInUsername($signInUsrEmail, $signPassword);
            echo $signUsername['case'] === true ? $sign->_s('Giriş Başarılı',true) : json_encode($signUsername);
        endif;
    else:
        $sign->_s('Boş değerler var!');
    endif;

elseif (post('signUp')):
    $username = post('username');
    $email = post('email');
    $password = post('password');
    $passwordVerify = post('passwordVerify');
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (empty($username) || empty($email) || empty($password) || empty($passwordVerify)):
        $sign->_s('Boş değerler var!');
    elseif (strlen($username) < 3):
        $sign->_s('Kullanıcı adı 3 karakterden az olamaz!');
    elseif (strlen($username) > 16):
        $sign->_s('Kullanıcı adı 16 karakterden fazla olamaz!');
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)):
        $sign->_s('Geçersiz e-mail adresi girdiniz!');
    elseif (strlen($password) < 8):
        $sign->_s('Şifre 8 karakterden küçük olamaz!');
    elseif (strlen($password) > 16):
        $sign->_s('Şifre 16 karakterden fazla olamaz!');
    elseif ($password != $passwordVerify):
        $sign->_s('Şifreler eşleşmiyor!');
    else:
        $control = $sign->control($username, $email);
        if (!isset($control['continue']) || $control['continue'] === true) {
            $signUp = $sign->signUp($username, $email, $password);
            if ($signUp === false)
                $sign->_s('Hata oluştu. Lütfen daha sonra tekrar deneyin');
            else
                $sign->_s('Kayıt Başarılı',true);
                $sign->signInUsername($username,$password);
        } else {
            $sign->_s($control['error_text']);
        }
    endif;
endif;