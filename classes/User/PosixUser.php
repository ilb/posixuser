<?php

namespace User;

/**
 * Проверка прав внешнего пользователя
 */
class PosixUser implements User {
    
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
     * Проверяет уровень доступа пользователя
     * @param Integer $level
     * @return boolean
     */
    public function checkSecurityLvl($level) {
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
        if (!$this->checkSecurityLvl($level)) {
            throw new Exception("", 453);
        }
    }
    
    /**
     * Проверяет авторизован ли пользователь
     * @return void
     */
    public function checkAuth() {
        if ($this->securityLevel < 40) {
            header("Location: /auth.php");
        }
    }
}