<?php

class UserTest extends \PHPUnit_Framework_TestCase {
    
    public function testAccess() {
        $user = new \User\User(10, "U");
        $this->assertTrue($user->hasPermission(9));
        $user1 = new \User\User(10, "U");
        $this->assertTrue($user1->hasPermission(10));
    }
    
    public function testAuthorization() {
       /**
        * Доделать
        */
    }
    
    /**
     * @expectedException Exception 
     * @expectedExceptionCode 453
     */
    public function testException() {
        $user = new \User\User(10, "U");
        $user->enforce(25);
    }
    
}