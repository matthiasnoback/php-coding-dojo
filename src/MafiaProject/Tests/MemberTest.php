<?php

namespace MafiaProject\Tests;

use MafiaProject\Member;

class MemberTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateAMemberOk()
    {
        $memberToTest = new Member('Joselito', 35);

        $this->assertSame('Joselito', $memberToTest->getName());
        $this->assertSame(35, $memberToTest->getAge());
        $this->assertSame(true, $memberToTest->getIsFree());
        $this->assertEmpty($memberToTest->getSubordinates());
    }

    public function testAddSubordinateMemberOk()
    {
        $subordinateMember = new Member('Pepe', 20, true);
        $bossMember = new Member('Joselito', 40, true);

        $bossMember->addSubordinate($subordinateMember);

        $this->assertCount(1, $bossMember->getSubordinates(), 'El jefe debe tener subordinado');
        $this->assertSame($bossMember, $subordinateMember->getBoss());
    }
}
