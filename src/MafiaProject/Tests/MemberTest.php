<?php

namespace MafiaProject\Tests;

use MafiaProject\Member;

class MemberTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Member */
    protected $boss;
    /** @var  Member */
    protected $member1;
    /** @var  Member */
    protected $member2;
    /** @var  Member */
    protected $member3;
    /** @var  Member */
    protected $member4;
    /** @var  Member */
    protected $member5;
    /** @var  Member */
    protected $member6;
    /** @var  Member */
    protected $member7;
    /** @var  Member */
    protected $member8;
    /** @var  Member */
    protected $member9;
    /** @var  Member */
    protected $member10;
    /** @var  Member */
    protected $member11;

    public function setUp()
    {
        $this->createMafiaOrg();
    }

    protected function createMafiaOrg()
    {
        $this->boss = new Member('Juan', 60, true);

        $this->member1 = new Member('Member1', 40, true);
        $this->member2 = new Member('Member2', 30, true);
        $this->member3 = new Member('Member3', 50, true);
        $this->member4 = new Member('Member4', 30, true);
        $this->member5 = new Member('Member5', 25, true);
        $this->member6 = new Member('Member6', 27, true);
        $this->member7 = new Member('Member7', 32, true);
        $this->member8 = new Member('Member8', 35, true);
        $this->member9 = new Member('Member9', 42, true);
        $this->member10 = new Member('Member10', 18, true);
        $this->member11 = new Member('Member11', 24, true);

        $this->boss->addSubordinate($this->member1);
        $this->boss->addSubordinate($this->member2);
        $this->boss->addSubordinate($this->member3);
        $this->member1->addSubordinate($this->member4);
        $this->member1->addSubordinate($this->member5);
        $this->member2->addSubordinate($this->member6);
        $this->member3->addSubordinate($this->member7);
        $this->member3->addSubordinate($this->member8);
        $this->member3->addSubordinate($this->member9);
        $this->member6->addSubordinate($this->member10);
        $this->member6->addSubordinate($this->member11);
    }

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

    public function testIsImportantMember()
    {
        $memberToTest = new Member('Joselito', 35);
        $this->assertFalse($memberToTest->isImportantMember());
    }

    public function testMemberGoToJailAndAddSubordinatesToOldBoss()
    {
        $this->member1->goToJail();

        $this->assertFalse($this->member1->getIsFree());
        $this->assertCount(5, $this->member3->getSubordinates());
    }

    public function testMemberGoToJailAndAddSubordinatesPromotes()
    {
        $this->assertCount(0, $this->member11->getSubordinates());
        $this->member6->goToJail();
        $this->assertFalse($this->member6->getIsFree());
        $this->assertNotSame($this->member6->getName(), $this->member11->getName());
        $this->assertCount(1, $this->member11->getSubordinates());
    }

}

