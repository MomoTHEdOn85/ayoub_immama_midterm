# MMED3014 - Midterm
 With the following database tables (create and populate in phpmyadmin):


Users                  Roles

ID (PK)               ID (PK)
Last name          Name
First Name        Description
Username
Password
Photo
Role (FK)


(1) Using our in-class build as a guide, build out an MVC-oriented CRUD for the provided users table.  You do not have to create CRUD functionality for the Roles table! (But see below.)  However, queries for users need to include information from the linked table via an inner join.

(2) Customize the UI views and styling. Add at a minimum a form view to add a new user. Re-adjust the code in views/change the number of view files as you see fit.

(3) PDO implementation (connection and prepared statements) for all database querying.

(4) Users need a role property: unregistered (the default for new users), admin, guest.  Create users with different auth roles.

(5) Restrict access to at least 1 route by user level - only admin-level users can specifically set the role property for other users.

(6) Setter-getter methods for the level property, UI to allow setting of the level safely (only by an Admin)

(7) At least 1 route that returns content as JSON only. No other views/markup should be generated in this case.


Bonus:

CRUD for the roles table, with appropriate UI to allow adding/editing/deleting.

Encrypt the password and store the encrypted version only.

Form view for updating users.


DUE: Week of March 6-10th.
