<?php

class Clogin
{

    public function signInEmail($email, $password)
    {
        global $db;
        $query = $db->from('c_users')
            ->where('c_email', $email)
            ->all();
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                if ($value['c_password'] == md5($password)) {
                    if (!isset($_SESSION['data'])) {
                        $date = strtotime($value['c_date']);
                        $_SESSION['data'] = true;
                        $_SESSION['username'] = $value['c_username'];
                        $_SESSION['email'] = $value['c_email'];
                        $_SESSION['date_format'] = date("d-m-Y", $date);
                        $_SESSION['date'] = $value['c_date'];
                        return ['text' => 'Giriş başarılı', 'case' => true];
                    } else {
                        return ['text' => 'Zaten giriş yaptınız', 'case' => false];
                    }
                } else {
                    return ['text' => 'Email veya şifre yanlış', 'case' => false];
                }
            }
        } else {
            return ['text' => 'Email veya şifre yanlış', 'case' => false];
        }
    }

    public function signInUsername($username, $password)
    {
        global $db;
        $query = $db->from('c_users')
            ->where('c_username', $username)
            ->all();
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                if ($value['c_password'] == md5($password)) {
                    if (!isset($_SESSION['data'])) {
                        $date = strtotime($value['c_date']);
                        $_SESSION['data'] = true;
                        $_SESSION['username'] = $value['c_username'];
                        $_SESSION['email'] = $value['c_email'];
                        $_SESSION['date_format'] = date("d-m-Y", $date);
                        $_SESSION['date'] = $value['c_date'];
                        return ['text' => 'Giriş Başarılı', 'case' => true];
                    } else {
                        return ['text' => 'Zaten giriş yaptınız', 'case' => false];
                    }
                } else {
                    return ['text' => 'Kullanıcı adı veya şifre yanlış', 'case' => false];
                }
            }
        } else {
            return ['text' => 'Kullanıcı adı veya şifre yanlış', 'case' => false];
        }
    }

    public function signUp($username, $email, $password)
    {
        global $db;
        $query = $db->insert('c_users')
            ->set(array(
                'c_username' => $username,
                'c_email' => $email,
                'c_password' => md5($password)
            ));
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function control($username, $email)
    {

        global $db;
        $query = $db->select('c_email,c_username')
            ->from('c_users')
            ->all();
        $error = array();
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                if ($value['c_username'] == $username) {
                    $error = array(
                        'continue' => false,
                        'error_text' => 'Böyle bir kullanıcı adı zaten var!'
                    );
                } elseif ($value['c_email'] == $email) {
                    $error = array(
                        'continue' => false,
                        'error_text' => 'Böyle bir e-mail adresi zaten var!'
                    );
                } else {
                    $error = array(
                        'continue' => true,
                        'error_text' => null
                    );
                }
            }
            return $error;
        } else {
            return array('continue' => true, 'error_text' => null);
        }
    }

    public function _eSign($text)
    {
        echo json_encode($text);
    }

    public function _s($text, $case = false)
    {
        echo json_encode(array('case' => $case, 'text' => $text));
    }
}