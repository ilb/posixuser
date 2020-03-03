<?php

class UserTest extends \PHPUnit_Framework_TestCase {
    
    public function testAccess() {
        $user = new \User\User(10, "U");
        $this->assertTrue($user->hasPermission(9));
        $user1 = new \User\User(10, "U");
        $this->assertTrue($user1->hasPermission(10));
    }
    
    /**
     * @expectedException Exception 
     * @expectedExceptionCode 452
     */
    public function testException() {
        $user = new \User\User(10, "U");
        $user->enforce(11);
    }
    
    /**
     * @runInSeparateProcess
     */
    public function testAuthq() {
        $user = new \User\User(10, "U");
        $user->checkAuth();
        $this->assertContains(
          'Location: /auth.php', xdebug_get_headers()
        );
    }
    
}