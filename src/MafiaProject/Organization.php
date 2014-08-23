<?php

namespace MafiaProject;


class Organization
{
    const NUMBER_SUBORDINATES_TO_BE_IMPORTANT = 50;
    protected $organization = [];
    protected $bigBoss;

    public function __construct(Member $boss)
    {
        $this->bigBoss = $boss;
    }

    public function getBigBoss()
    {
        return $this->bigBoss;
    }

    public function getOrganization()
    {
        return $this->organization;
    }

    public function isImportantMember(Member $member)
    {
        return $member->getNumberOfSubordinates() > Organization::NUMBER_SUBORDINATES_TO_BE_IMPORTANT;
    }

    public function goToJail(Member $member)
    {
        $member->setIsFree(false);
        $newBoss = $this->getSusbstituteSameRange($member);
        if (is_null($newBoss)) {
            $newBoss = $this->promoteSubordinate($member);
        }
        $this->addSubordinatesToNewBoss($member, $newBoss);
    }

    protected function getSusbstituteSameRange(Member $member)
    {
        $posiblesBosses = $member->getBoss()->getSubordinates();
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

    protected function promoteSubordinate(Member $member)
    {
        $posiblesBosses = $member->getSubordinates();
        $maxAge = 0;
        $newBoss = null;
        /** @var Member $posible */
        foreach ($posiblesBosses as $posible) {
            if ($posible->getAge() > $maxAge) {
                $maxAge = $posible->getAge();
                $newBoss = $posible;
            }
        }

        $member->getBoss()->addSubordinate($newBoss);
        return $newBoss;
    }

    protected function addSubordinatesToNewBoss(Member $oldBoss, Member $newBoss)
    {
        foreach ($oldBoss->getSubordinates() as $subordinateToMove) {
            /** @var $subordinateToMove Member */
            if (strcmp($subordinateToMove->getName(), $newBoss->getName()) !== 0) {
                $newBoss->addSubordinate($subordinateToMove);
            }
        }
    }

    public function releasedFromJail(Member $member)
    {
        $member->setIsFree(true);
        foreach ($member->getSubordinates() as $KeyMemberNeedChangeBoss => $memberNeedChangeBoss) {
            /** @var $memberNeedChangeBoss Member */
            $actuaSubordinateMembers = $memberNeedChangeBoss->getBoss()->getSubordinates();
            foreach ($actuaSubordinateMembers as $actualMember) {
                /** @var $actualMember Member */
                if (strcmp($actualMember->getName(), $memberNeedChangeBoss->getName()) === 0) {
                    unset($actuaSubordinateMembers[$KeyMemberNeedChangeBoss]);
                }
            }
            $memberNeedChangeBoss->getBoss()->setSubordinates($actuaSubordinateMembers);
            $memberNeedChangeBoss->setBoss($member);
        }
    }

    public function compareMembers(Member $memberA, Member $memberB)
    {
        $a = $this->getRankOfMember($memberA);
        $b = $this->getRankOfMember($memberB);
        if ($a < $b) {
            return 1;
        } elseif ($a > $b) {
            return -1;
        } else {
            return 0;
        }

    }

    protected function getRankOfMember(Member $member)
    {
        if (is_null($member->getBoss())) {
            return 1;
        } else {
            return 1 + $this->getRankOfMember($member->getBoss());
        }

    }
}
