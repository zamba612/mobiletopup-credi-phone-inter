<?php

namespace Panda\Mobiletopup;

class Session
{
    private $URL_LOGIN;
    private $URL_ACCOUNT;
    private $URL_REGISTRATION;
    private $URL_CODE_404;
    private $URL_SUCCESS;

    public function __construct()
    {
    }
    public function URL_LOGIN($page)
    {
        if ($page === "login") {
            $this->URL_SUCCESS = 'http://localhost/mobiletopup/login.php';
        }
        return $this->URL_SUCCESS;
    }
    public function URL_ACCOUNT($page)
    {
        if ($page === "account") {
            $this->URL_SUCCESS = 'http://localhost/mobiletopup/account.php';
        }
        return $this->URL_SUCCESS;
    }
}
