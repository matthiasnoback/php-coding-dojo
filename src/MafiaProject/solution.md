#Code Test Mafia

This is an example organization for tests
- boss(60)
    - member1(40)
        - member4(30)
        - member5(25)
    - member2(30)
        - member6(27)
            - member10(18)
            - member11(24)
    - member3(50)
        - member7(32)
        - member8(33)
        - member9(42)


##How to use
- For create a Member:
```$boss = new Member('Juan', 60, true);```

- For create an organization:
```$myOrganization = new Organization($boss);```

- Is Important if a Member has more than 50 people under him
```$myOrganization->isImportantMember(member);```

- Member to Jail:
```$myOrganization->goToJail($member);```

- Member to released from jail:`
```$myOrganization->releasedFromJail($member);```

- Compare Members:
Returns < 0 if memberA is less than memberB; > 0 if memberA is greater than memberB, and 0 if they are equal.```$myOrganization->compareMembers($memberA, $memberB)```
```$myOrganization->releasedFromJail($member);```

I tried it with unit test anyone to understand the project.