<?php

namespace Tests\LdapUser;

class PosixLdapUserTest extends \PHPUnit_Framework_TestCase {
    
    protected $posix;
    
    public function setUp(){
        $this->posix = new PosixImpl();
    }

    public function testSuccess() {
        $user = new \LdapUser\PosixLdapUser("Tom");
        $user->setPosix($this->posix);
        $this->assertTrue($user->hasPermission(""));
        $user1 = new \LdapUser\PosixLdapUser("Jerry");
        $user1->setPosix($this->posix);
        $this->assertTrue($user1->hasPermission(""));
    }
    
    public function testFailure() {
        $user = new \LdapUser\PosixLdapUser("Galy");
        $user->setPosix($this->posix);
        $this->assertFalse($user->hasPermission(""));
        $user1 = new \LdapUser\PosixLdapUser("Name");
        $user1->setPosix($this->posix);
        $this->assertFalse($user1->hasPermission(""));
    }
    
    /**
     * @expectedException Exception 
     * @expectedExceptionCode 453
     */
    public function testException() {
        $user = new \LdapUser\PosixLdapUser("Galy");
        $user->setPosix($this->posix);
        $user->enforce("");
    }
    
    public function testEmpty() {
        $user = new \LdapUser\PosixLdapUser("Tom");
        $user->setPosix($this->posix);
        $this->assertEmpty($user->enforce(""));
    }
}
