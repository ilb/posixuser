<?php

class PosixUser implements User {
    /**
     *
     * @var String
     */
    private $remoteName;
    
    /**
     * 
     * @param String $remoteName
     * @return void
     */
    public function __construct($remoteName) {
        $this->remoteName = $remoteName;
    }
    
    /**
     * 
     * @param type $groupName
     * @return boolean
     */
    public function hasPermission($groupName) {
        $groupInfo = Posix::getgrnam($groupName);
        if (!$groupInfo) {
            return false;
        } else {
            if (in_array($this->remoteName, $groupInfo['members'])) {
                return true;
            }
        }    
        return false;
    }
    
    public function enforce($groupName) {
        if (!$this->hasPermission($groupName)) {
            throw new Exception("Нет доступа пользователю: ".$this->remoteName, 453);
        }
    }
}

