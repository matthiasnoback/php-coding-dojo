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
        $bossMember = new Member('Joselito', 40, true);
        $subordinateMember = new Member('Pepe', 20, true);

        $bossMember->addSubordinate($subordinateMember);
        $this->assertCount(1, $bossMember->getSubordinates(), 'El jefe debe tener subordinado');
        $this->assertSame($bossMember, $subordinateMember->getBoss());
    }

    public function testGetNumberOfSubordinates()
    {
        $memberToTest = new Member('Joselito', 35);
        $this->assertSame(0, $memberToTest->getNumberOfSubordinates());

        $subordinateMember = new Member('Pepe', 20, true);
        $memberToTest->addSubordinate($subordinateMember);
        $this->assertSame(0, $subordinateMember->getNumberOfSubordinates());
        $this->assertSame(1, $memberToTest->getNumberOfSubordinates());

        $subSubordinateMember = new Member('Juan', 18, true);
        $subordinateMember->addSubordinate($subSubordinateMember);
        $this->assertSame(1, $subordinateMember->getNumberOfSubordinates());
        $this->assertSame(
            2,
            $memberToTest->getNumberOfSubordinates(),
            'Los subordinados de los subordinados tambien cuentan'
        );

        $subordinateMember2 = new Member('Carlos', 25, true);
        $memberToTest->addSubordinate($subordinateMember2);
        $this->assertSame(3, $memberToTest->getNumberOfSubordinates());
    }

}

