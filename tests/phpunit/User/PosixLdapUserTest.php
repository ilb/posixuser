<?php

class PosixLdapUserTest extends \PHPUnit_Framework_TestCase {
    
    protected $posix;
    
    public function setUp(){
        $this->posix = new \Tests\User\PosixImpl();
    }

    public function testSuccess() {
        $user = new \User\PosixLdapUser("Tom");
        $user->setPosix($this->posix);
        $this->assertTrue($user->hasPermission(""));
        $user1 = new \User\PosixLdapUser("Jerry");
        $user1->setPosix($this->posix);
        $this->assertTrue($user1->hasPermission(""));
    }
    
    public function testFailure() {
        $user = new \User\PosixLdapUser("Galy");
        $user->setPosix($this->posix);
        $this->assertFalse($user->hasPermission(""));
        $user1 = new \User\PosixLdapUser("Name");
        $user1->setPosix($this->posix);
        $this->assertFalse($user1->hasPermission(""));
    }
    
    /**
     * @expectedException Exception 
     * @expectedExceptionCode 453
     */
    public function testException() {
        $user = new \User\PosixLdapUser("Galy");
        $user->setPosix($this->posix);
        $user->enforce("");
    }
}
