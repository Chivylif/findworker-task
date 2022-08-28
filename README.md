# findworker-task
## Coding Task Invitation for Fullstack Engineers

At this step, we invite you to complete a small programming task that can take you
anywhere between a couple of hours up to a full day in total to complete.

## Objective
This task is designed to provide an opportunity for you to demonstrate general PHP
based restful API development knowledge in the sense that you:
● Write clean, structured, readable, and maintainable code.
● Create simple application components and building blocks.
● Understand fetching, transforming, and aggregating data from external APIs.
● Maintain a well-designed application state.
● Craft a pleasant API consumer experience.
● Consume your designed API endpoint
using a frontend technology.

## Task
Create a small set of rest API endpoints using PHP that can be used for listing the
names of books along with their authors and comment counts, adding and listing
anonymous comments for a book, and getting the character list for a book.
After which you will then implement your solution using a frontend technology, the
endpoint created in your solutions will then be consumed with an interface.
Kindly note, that the frontend technologies available for the second implementation
should be one of these ReactJS or VueJS.

## General requirements

The application should have basic documentation that lists available endpoints
and methods along with their request and response signatures.
The exact API design in terms of the total number of endpoints and HTTP verbs
is up to you.

Keep your application source code on a public Github repository.
Provide a live demo URL, you could spin up a virtual server on AWS or
a Heroku instance.

## Data requirements

The movie data should be fetched online from
https://anapioficeandfire.com/
Book names in the book list endpoint should be sorted by release date from
earliest to newest and each book should be listed along with authors and count of
comments.
Comments should be stored in a SQL database.

Error responses should be returned in case of errors.
Character list requirements
The endpoint should accept sort parameters to sort by one of name, gender, or age
in ascending or descending order.
The endpoint should also accept a filter parameter to filter by gender.
The response should also return metadata that contains the total number of
characters that match the criteria along with the total age of the characters that
match the criteria.
The total height should be provided both in months and in years. For instance,
28 months is 2.5 in years.

## Comment requirements
The comment list should be retrieved in reverse chronological order.
Comments should be retrieved along with the public IP address of the
commenter and UTC date&time they were stored.

Comment length should be limited to 500 characters

Please feel free to ask questions before or during working on this task and
remember to share with us the Github repository and live demo URLs.
After submitting, you might receive feedback as Github issues, might also be asked
to make some changes, also possibly create or review a pull request.
If by the end of five days you have not been able to address all the specs, please
submit your work along with an explanation of the features you had to leave out and
your reasons to deprioritize them.
