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

    public function goToJail()
    {
        $this->isFree = false;
        $newBoss = $this->getSusbstituteSameRange();
        if (is_null($newBoss)) {
            $newBoss = $this->promoteSubordinate();
        }
        $this->addSubordinatesToNewBoss($newBoss);
    }

    protected function getSusbstituteSameRange()
    {
        $posiblesBosses = $this->getBoss()->getSubordinates();
        $maxAge = 0;
        /** @var Member $newBoss */
        $newBoss = null;
        /** @var Member $posible */
        foreach ($posiblesBosses as $posible) {
            if ($posible->getAge() > $maxAge && $posible->getIsFree()) {
                $maxAge = $posible->getAge();
                $newBoss = $posible;
            }
        }
        return $newBoss;
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

    protected function promoteSubordinate()
    {
        $posiblesBosses = $this->getSubordinates();
        $maxAge = 0;
        $newBoss = null;
        /** @var Member $posible */
        foreach ($posiblesBosses as $posible) {
            if ($posible->getAge() > $maxAge) {
                $maxAge = $posible->getAge();
                $newBoss = $posible;
            }
        }

        $this->getBoss()->addSubordinate($newBoss);
        return $newBoss;
    }

    public function addSubordinate(Member $member)
    {
        $this->subordinates[] = $member;
        $member->setBoss($this);
    }

    protected function addSubordinatesToNewBoss(Member $newBoss)
    {
        foreach ($this->getSubordinates() as $subordinateToMove) {
            /** @var $subordinateToMove Member */
            if (strcmp($subordinateToMove->getName(), $newBoss->getName()) !== 0) {
                $newBoss->addSubordinate($subordinateToMove);
            }
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function isImportantMember()
    {
        return $this->getNumberOfSubordinates() > 50;
    }
}
