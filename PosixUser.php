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
            if (in_array($groupInfo['members'], $this->remoteName)) {
                return true;
            }
        }    
        return false;
    }
}

