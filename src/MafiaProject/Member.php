<?php

namespace MafiaProject;


class Member
{
    protected $name;
    protected $age;
    protected $isFree;
    protected $subordinates = [];
    /** @var  Member */
    protected $boss;

    public function __construct($name, $age, $isFree = true, $subordinates = [])
    {
        $this->name = $name;
        $this->age = (int)$age;
        $this->isFree = (bool)$isFree;
        $this->subordinates = $subordinates;
    }

    public function addSubordinate(Member $member)
    {
        $this->subordinates[] = $member;
        $member->setBoss($this);
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setBoss($boss)
    {
        $this->boss = $boss;
    }

    public function getBoss()
    {
        return $this->boss;
    }

    public function getIsFree()
    {
        return $this->isFree;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSubordinates()
    {
        return $this->subordinates;
    }

}