<?php

class Posix {
    
    /**
     * @param string $groupName
     * @return array
     */
    public static function getgrnam($groupName) {
        return posix_getgrnam($groupName);
        // impl posix_getgrnam
    }
    
}