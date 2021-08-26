<?php


class M_User
{

    function auth($login, $pass)
    {
        if ('' == $login || '' == $pass) {
            return false;
        }
        if ($_SESSION['login'] == $login && $_SESSION['pass'] == $pass) {
            return true;
        }

        return false;
    }

    function reg($login, $pass)
    {
        if ('' == $login || '' == $pass) {
            return false;
        }
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;
        return true;
    }


}