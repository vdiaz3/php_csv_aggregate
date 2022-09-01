# php_csv_aggregate

PHP Dataset Story
You are a developer on an agile team in an insurance organization. Implement the
following user story as if it were a pull request in your organization's code base. Treat
your repo and code for the exercise as if it were a part of an existing, large enterprise
repository where code quality, performance, and maintainability are important
organization tenants. Can you foresee any needs for flexibility in this code?
User Story:
As a user, I want to have a TIV (Total Insurable Value) summarized by county and
line so that I can make comparisons to other states.
During backlog grooming, the following technical requirements are identified.
Using this data set:
https://support.spatialkey.com/wp-content/uploads/2021/02/FL_insurance_sample.
csv.zip
Produce an aggregate total of the column tiv_2012 by county and by line and place
into a file named output.json
Requirement: do the aggregations in code without the use of a database
Example output:
1{
2 "county":{"CLAY COUNTY":{"tiv_2012":12345}, ... },
3 "line":{"Residential":{"tiv_2012":12345}, ... }
4}
Implement this story and be prepared to talk about it with us as if
this were a team code review.
