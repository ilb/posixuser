<?php

namespace User;

interface Posix {
    /**
     * @param string $groupName
     * @return array
     */
    public function getgrnam($groupName);
}