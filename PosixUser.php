<?php

class PosixUser implements User {

    /**
     *
     * @var String
     */
    private $remoteUser;

    /**
     * 
     * @param String $remoteName
     * @return void
     */
    public function __construct($remoteUser) {
        $this->remoteUser = $remoteUser;
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
        }
        if (!in_array($this->remoteUser, $groupInfo['members'])) {
            return false;
        }
        return true;
    }

    /**
     * 
     * @param String $groupName
     * @return void
     * @throws Exception
     */
    public function enforce($groupName) {
        if (!$this->hasPermission($groupName)) {
            throw new Exception("Нет доступа пользователю: " . $this->remoteUser, 453);
        }
    }

}
