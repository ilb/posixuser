<?php

namespace User;

/**
 * Проверка прав внешнего пользователя
 */
class User implements UserInterface {
    
    /**
     *
     * @var Integer
     */
    private $securityLevel;
    
    /**
     *
     * @var String
     */
    private $remoteUser;

        /**
     * 
     * @param Integer $securityLevel
     * @param String $remoteUser
     */
    public function __construct($securityLevel, $remoteUser) {
        $this->securityLevel = $securityLevel;
        $this->remoteUser = $remoteUser;
    }


    /**
     * Проверяет уровень доступа пользователя
     * @param Integer $level
     * @return boolean
     */
    public function hasPermission($level) {
        if ($level > $this->securityLevel) {
            return false;
        }
        return true;
    }
    
    /**
     * Выдает исключение если уровень пользователя ниже требуемого
     * @param Integer $level
     * @return void
     * @throws Exception
     */
    public function enforce($level) {
        if (!$this->hasPermission($level)) {
            throw new Exception("", 453);
        }
    }
    
    /**
     * Проверяет авторизован ли пользователь
     * @return void
     */
    public function checkAuth() {
        if (!$this->hasPermission(40)) {
            header("Location: /auth.php");
            exit();
        }
    }
    
    function getSecurityLevel() {
        return $this->securityLevel;
    }

    function getRemoteUser() {
        return $this->remoteUser;
    }

    function setSecurityLevel(Integer $securityLevel) {
        $this->securityLevel = $securityLevel;
    }

    function setRemoteUser(String $remoteUser) {
        $this->remoteUser = $remoteUser;
    }
}