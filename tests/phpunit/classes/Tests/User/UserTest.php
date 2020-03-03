<?php

namespace Tests\User;

class UserTest extends \PHPUnit_Framework_TestCase {
    
    public function testAccess() {
        $user = new \User\User(10, "Name");
        $this->assertTrue($user->hasPermision(9));
    }
}