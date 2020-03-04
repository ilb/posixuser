<?php

class UserTest extends \PHPUnit_Framework_TestCase {
    
    /**
     * @dataProvider providerAccess
     */
    public function testAccess($securityLevel, $remoteUser, $level) {
        $user = new \User\User($securityLevel, $remoteUser);
        $this->assertTrue($user->hasPermission($level));
    }
    
    public function providerAccess() {
        return array(
            [10, "Name", 9],
            [50, "sd", 50],
            [10, "Ad", 0]
        );
    }
    
    /**
     * @dataProvider providerAuth
     */
    public function testAuthorizationSuccess($securityLevel, $remoteUser) {
        $user = new \User\User($securityLevel, $remoteUser);
        $this->assertEmpty($user->checkAuth());
    }
    
    public function providerAuth() {
        return array(
            [50, "Name"],
            [40, "Name"]
        );
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