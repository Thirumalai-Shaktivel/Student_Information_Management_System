# Student Information Management System
## Overview
Student Information Management System (SIMS) is a fully computerized system or a database where all the student related data can be stored, retrieved, monitored & analysed. The data is saved at a centralized location & role-based login access is given to all the users for ensuring student data security.
Our 'Student Information Management System' aids in managing, storing, data such as admission number, tracking attendance, exam & test marks, notice board, teacher info, subject info and other student related data. The system gives both the student and teacher an overall view of the ongoing academic activities.
## PROBLEM STATEMENT
Students form the main part of any institution that concerns with. But the institution finds it difficult to keep the details of all the students. Thus, it involves a lot of paper work. Sometimes there will be huge heap of files bundled up and must be stored in some corner of the office.
Managing student records manually is a troublesome job, this increases as the number of students increases. This method may lead to missing or destroying important information and is also difficult to maintain. Since this method of managing student data is outdated, we propose a better way, i.e., using a computer software which can automate most of the work in maintaining such records.
## TECHNOLOGY
* **HTML** is used for the front-end design. It provides a means to structure text-based information in a document. It allows users to produce web pages that include text, graphics and hyperlinks.
* **CSS** (Cascading Style Sheets) is a style sheet language used for describing the presentation of a document written in a mark-up language. Although most often used to set the visual style of web pages and user interfaces written in HTML, the language can be applied to any XML document.
* **SQL** is the language used to manipulate relational databases. It is tied closely with the relational model. It is issued for the purpose of data definition and data manipulation.
* **PHP** is a server-side scripting language that is embedded in HTML. It is used to manage dynamic content, databases, session tracking. PHP Syntax is C-Like.
* **JavaScript** is a scripting language, primarily used on the Web. It is used to enhance HTML pages and is commonly found embedded in HTML code.

## ROLES AND FEATURES
The resulting system is able to:
* Teacher View:
    - Register New Teacher credentials for login.
    - Login as Teacher for Academics records handling.
    - Admit, Update Students details for Specific Class.
    - View the Details of all the Students in the Class.
    - Add, update, delete the Subject details along with its instructor.
    - Create new Announcement and circulate the same.
    - Update Attendance for each student in the Class.
    - Update Internal Assessment Marks for each student.
    - Update Final Exam Marks For each Student.
* Student View:
    - Register New Student credentials for login.
    - Login as Student for Curriculum Activities.
    - View any Recent Announcements made by specific Subject teacher.
    - View Subject Details and Contact information of the subject teachers.
    - View Internal Assessment Marks for each Subject.
    - View Final Exam Marks for each subject.
    - View the Attendance details.

### RELATIONAL SCHEMA
![Relational schema](image/ER%20Mapping.png)

For screenshots and more details about the project, please checkout [Final Report](Final-Report.pdf)
## Software Requirements
* [XAMPP](https://www.apachefriends.org/index.html)
* Browser of your choice

## Steps to run the project
- Install XAMPP on your local machine.
- Clone the project using
    ```console
    $ git clone https://github.com/Thirumalai-Shaktivel/Student_Information_Management_System.git
    ```
- Remove the contents of htdocs (xampp), and add all the items from the project which were cloned before.
- Start the Apache and MySQL servers.
- Create a database named `student details(mini project)`
- Now, just import the sql file i.e., [student_details_mini_project_.sql](resource/student_details_mini_project_.sql)
- Goto: `https:\\http://localhost/`

If you have any doubt related to this project, feel free to contact me on [twitter](https://twitter.com/sh0ck_thi) or [mail](mailto:thirumalaishaktivel@gmail.com) me.
