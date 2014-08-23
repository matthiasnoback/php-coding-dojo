<?php

namespace MafiaProject;


class Member
{
    /** must be unique */
    protected $name;
    protected $age;
    protected $isFree;
    protected $subordinates = [];
    /** @var  Member */
    protected $boss;
    protected $numberOfSubordinates;

    public function __construct($name, $age, $isFree = true, $subordinates = [])
    {
        $this->name = $name;
        $this->age = (int)$age;
        $this->isFree = (bool)$isFree;
        $this->subordinates = $subordinates;
        $this->numberOfSubordinates = $this->getNumberOfSubordinates();
    }

    public function getNumberOfSubordinates()
    {
        $subordinates = $this->getSubordinates();
        $numberSubordinates = count($subordinates);
        /** @var Member $member */
        $member = null;
        foreach ($subordinates as $member) {
            $numberSubordinates += count($member->getSubordinates());
        }
        return $numberSubordinates;
    }

    public function getSubordinates()
    {
        return $this->subordinates;
    }

    public function setSubordinates($subordinates)
    {
        $this->subordinates = $subordinates;
    }

    public function getBoss()
    {
        return $this->boss;
    }

    public function setBoss($boss)
    {
        $this->boss = $boss;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getIsFree()
    {
        return $this->isFree;
    }

    public function setIsFree($isFree)
    {
        $this->isFree = $isFree;
    }

    public function addSubordinate(Member $member)
    {
        $this->subordinates[] = $member;
        $member->setBoss($this);
    }

    public function getName()
    {
        return $this->name;
    }

}
