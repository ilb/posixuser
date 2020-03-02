<?php

namespace Tests\User;

class PosixImpl implements \User\Posix {
    
    /**
     * @return array
     */
    public function getgrnam($groupName) {
        return array(
            "name" => $groupName,
            "passwd" => "x",
            "members" => array(
                "Tom",
                "Jerry"
            ),
            "gid" => "20"
        );
    }
    
}