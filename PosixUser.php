<?php

require_once 'User.php';
require_once 'Possix.php';

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
        $posix = new Possix();
        $groupInfo = $posix->getgrnam($groupName);
        if (!$groupInfo) {
            return False;
        } else {
            if (in_array($groupInfo['members'], $this->remoteName)) {
                return True;
            }
        }    
        return FALSE;
    }
}

