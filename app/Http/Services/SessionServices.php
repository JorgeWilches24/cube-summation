<?php

namespace App\Http\Services;

class SessionServices
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    private function getValue($key)
    {
        if (isset($_SESSION[$key])) {
            return $value = $_SESSION[$key];
        }else{
            return null;
        }
    }

    public function setCube($cube)
    {
        $_SESSION['cube'] = $cube;
    }

    public function setOperation($operation)
    {
        $_SESSION['operation'] = $operation;
    }

    public function getCube()
    {
        return $this->getValue('cube');
    }

    public function getOperation()
    {
        return $this->getValue('operation');
    }

    public function finishSession(){
        session_destroy();
    }
}