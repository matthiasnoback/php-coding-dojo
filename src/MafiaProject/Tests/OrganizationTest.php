<?php

namespace MafiaProject\Tests;


use MafiaProject\Organization;
use MafiaProject\Member;

class OrganizationTest extends \PHPUnit_Framework_TestCase
{

    /** @var Organization */
    protected $myOrganization;
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
        $this->myOrganization = new Organization($this->boss);

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

    public function testIsImportantMember()
    {
        $this->assertFalse($this->myOrganization->isImportantMember($this->member1));
    }

    public function testMemberGoToJailAndAddSubordinatesToOldBoss()
    {
        //when
        $this->myOrganization->goToJail($this->member1);
        //then
        $this->assertFalse($this->member1->getIsFree());
        $this->assertCount(5, $this->member3->getSubordinates());
    }

    public function testMemberGoToJailAndAddSubordinatesPromotes()
    {
        //given
        $this->assertCount(0, $this->member11->getSubordinates());
        //when
        $this->myOrganization->goToJail($this->member6);
        //then
        $this->assertFalse($this->member6->getIsFree());
        $this->assertNotSame($this->member6->getName(), $this->member11->getName());
        $this->assertCount(1, $this->member11->getSubordinates());
    }

    public function testMemberReleasedFromJailOldBoss()
    {
        //given
        $this->myOrganization->goToJail($this->member1);
        $this->assertCount(5, $this->member3->getSubordinates());
        $this->assertFalse($this->member1->getIsFree());
        //when
        $this->myOrganization->releasedFromJail($this->member1);
        //then
        $this->assertTrue($this->member1->getIsFree());
        $this->assertCount(3, $this->member3->getSubordinates());
        $this->assertSame($this->member1, $this->member4->getBoss());
        $this->assertSame($this->member1, $this->member5->getBoss());
    }

    public function testMemberReleasedFromJailAndAddSubordinatesDownGrade()
    {
        //given
        $this->assertCount(0, $this->member11->getSubordinates());
        $this->myOrganization->goToJail($this->member6);
        $this->assertFalse($this->member6->getIsFree());
        $this->assertNotSame($this->member6->getName(), $this->member11->getName());
        $this->assertCount(1, $this->member11->getSubordinates());
        //when
        $this->myOrganization->releasedFromJail($this->member6);
        //then
        $this->assertCount(0, $this->member11->getSubordinates());
        $this->assertCount(0, $this->member10->getSubordinates());
    }

    public function testCompareMembers()
    {
        $this->assertSame(1, $this->myOrganization->compareMembers($this->member1, $this->member10));
        $this->assertSame(0, $this->myOrganization->compareMembers($this->member1, $this->member3));
        $this->assertSame(-1, $this->myOrganization->compareMembers($this->member11, $this->member2));
    }

}
