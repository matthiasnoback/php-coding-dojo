#Code Test Mafia

The FBI has captured some Mafia internal records dating from 1985 until the present. They
wish to use these records to map the entire mafia organization so they can put their resources
towards catching the most important members. We need to track closely who reports to who in
the organization because if a boss has more than 50 people under him he should be put under
special surveillance.
During these years there have been restructurings, murders and imprisonment. Based on
previous investigations, we know how the mafia works when one of these events takes place:

— When an organization member goes to jail, he temporarily disappears from the organization.
All his direct subordinates are immediately relocated and now work for the oldest remaining
boss at the same level as their previous boss. If there is no such possible alternative boss the
oldest direct subordinate of the previous boss is promoted to be the boss of the others.

— When the imprisoned member is released from prison, he immediately recovers his old
position in the organization (meaning that he will have the same boss that he had at the moment
of being imprisoned). All his former direct subordinates are transferred to work for the recently
released member, even if they were previously promoted or have a different boss now.

You are asked to create a computer system for the FBI that allows them to store and manipulate
all the records found. Please make sure to write a method to find out whether a boss has more
than 50 people under him.

Keep in mind good design considerations applicable to the problem such as extensibility,
maintainability, and modularity, among others. Try to develop the most optimal data structure
and algorithms possible to implement the rules described.

Bonus: Write a method that given two mafia members identifies which one ranks higher in the
organization.

Also note that no UI development is required.
