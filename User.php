<?php

interface User {
    /**
     * 
     * @param type $groupName
     * @return boolean
     */
    public function hasPermission($groupName);
}
