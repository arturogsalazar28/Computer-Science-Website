README

This is meant to be just a concept for the CELO project. Currently it is in a very early state, with basic database functions and sample webpages. Here are some things we need to develop and/or fix:

Dynamic Page Generation - Currently, we have COSC 3332 as a sample course here alongside a few of its topics. As seen in the number of pages here, it is obvious we need to set up a system where the system automatically generates the webpages according to some database value (course ID, topic ID, etc.) instead of hard-coding every webpage which will be extremely infeasible.

Forum Portion - The forum is currently non-working, but the premise is that every course has its own forum and subforums for student/instructor discussion. What we have is basically only one for the sample 3332 course, and we would want to have a forum per course. This may require us to explicitly create a table for our database that tracks each course forum, having different entries based on the course.

Magic Points - Dr. Rizk seems to be very fond of this Magic Points system where students can get extra credit by answering mystery questions correctly, but this is only used for her course and will not be available to others - unless the instructors want such a thing on their curriculum as well.

Gradebook - Gradebook is not available at the moment (just an empty page) but the idea is that if the admin is logged in and owns the course, he/she has access to the database's entries for student grades and other data. We need to make sure proper constraints and accesses are enforced to prevent data loss/theft/manipulation.

UI - I will be handling the UI functionality of the site, which includes the format of the webpage body as well as the sidebar. Currently it uses the Material Design UX from Google, using JavaScript. I feel its minimal design and focus on typography make it suitable for use in such a site as this. My idea is that you guys just focus on the core functionalities of the site, and I will style them accordingly once they're ready.