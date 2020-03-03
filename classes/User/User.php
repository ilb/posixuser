<?php

namespace User;

interface User {
    /**
     * 
     * @param Integer $level
     * @return boolean
     */
    public function checkSecurityLvl($level);
    
    /**
     * 
     * @param Integer $level
     * @return void
     * @throws Exception
     */
    public function enforce($level);
    
    /**
     * @return void
     */
    public function checkAuth();
}
