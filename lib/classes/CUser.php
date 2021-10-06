<?php

namespace JustTasks;

class CUser
{
    public $isAuthorized = false;
    public function __construct() {
        if (isset($_SESSION['auth_id'])) {
            $this->isAuthorized = true;
        }
    }
    public function getName() {
        return $_SESSION['auth_name'];
    }
    public function authorize($login, $pass) {
        $mysqli = new DB();
        $stmt = $mysqli->stmt_init();
        $stmt->prepare('SELECT `NAME` FROM jt_users WHERE `LOGIN`=? AND `PASS`=?');
        $stmt->bind_param('ss', $login, $pass);
        $stmt->execute();
        $stmt->bind_result($userName);
        if ($stmt->fetch()) {
            $_SESSION['auth_id'] = md5($login . $pass);
            $_SESSION['auth_name'] = $userName;
            $this->isAuthorized = true;
        } else {
            unset($_SESSION['auth_id']);
            unset($_SESSION['auth_name']);
            $this->isAuthorized = false;
        }
    }
}