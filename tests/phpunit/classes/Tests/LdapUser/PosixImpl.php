<?php

namespace Tests\LdapUser;

class PosixImpl implements \LdapUser\Posix {
    
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