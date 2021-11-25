USE ashware;

-- Value Insertion

INSERT INTO `Students` (Fname, Lname, Email, Studentpassword)
VALUES ("Excel", "Chukwu", "excel.chukwu@ashesi.edu.gh", "$2y$10$f0wexYvC9cT7EEgBJjYDDePNtMWBBbqlyd8set6uW0IT4.pRFQ3Ve
"),
("David", "Quarshie", "david.quarshie@ashesi.edu.gh", "$2y$10$iNwe.XcWiHGiyEgG4IjlYO46ngKEhlkKkwwQFA/NvAzRr7U0OzHdC"),
("Kekeli", "Mensah", "kekeli.mensah@ashesi.edu.gh", "$2y$10$egI9aXjiiYJr/hErCvXGUOm3ZDjZXONRgyqNAUuIfLX354YjI73Xy"),
("Elijah", "Boateng", "elijah.boateng@ashesi.edu.gh", "$2y$10$yiE78KrK5QfF1SlE4VvPVOT3Pw9TRxcX3fV5aQQ28SZVW82Ev8dmu"),
("Joshua", "Owusu-Ansah", "joshua.owusu@ashesi.edu.gh", "$2y$10$6tzzwc5/ava01d1rvs81EeTYc1sqce7.qrcdWidSq4AONCZaPMq8W");


INSERT INTO `Departments` (Dept_name) 
VALUES ("Humanities and Social Sciences"),
("Business Administration"),
("Computer Science and Information Systems"),
("Engineering");


INSERT INTO `Lecturers` (Fname, Lname, Email, Department) 
VALUES ("Ayorkor", "Korsah", "akorsah@ashesi.edu.gh", 3),
("Ayawoa", "Dagbovie", "adagbovie@ashesi.edu.gh", 3),
("David", "Sampah", "dsampah@ashesi.edu.gh", 3),
("David", "Ebo", "dadjepon@ashesi.edu.gh", 3),
("Rebecca", "Awuah", "rawuah@ashesi.edu.gh", 3),
("Joseph", "Mensah", "jamensah@ashesi.edu.gh", 3),
("Dennis", "Owusu", "dowusu@ashesi.edu.gh", 3),
("David", "Hutchul", "dhutchful@ashesi.edu.gh", 3);


INSERT INTO `Courses` (Course_name, Course_desc, Course_lecturer, Course_image)
VALUES ("Data Structures and Algorithms", "Introduces you to higher level programming efficiencies through application of data structures such us stacks, queues, etc.", 1, "http://localhost/Ashware/insertions/DSA.png"),
("Artificial Intelligence", "It is the science and engineering of making intelligent machines, especially intelligent computer programs, for the automation of processes.", 1, "http://localhost/Ashware/insertions/AI.png"),
("Database Systems", "It is the science and engineering of making intelligent machines, especially intelligent computer programs, for the automation of processes.", 3, "http://localhost/Ashware/insertions/EthHack.png"),
("Human Computer Interaction", "Introduces you to higher level design approaches through application of design principles for efficient solutions.", 8, "http://localhost/Ashware/insertions/HCI.png"),
("Web Technologies", "Learn the means by which computers communicate with each other, and the technologies that make up the internet", 3, "http://localhost/Ashware/insertions/webtech.jpeg");


INSERT INTO `Lessons` (Course_id, Lesson_title, Lesson_desc) 
VALUES (5, "The Internet", "The Internet is a vast network that connects computers all over the world. Through the Internet, people can share information and communicate from anywhere with an Internet connection."),
(5, "World Wide Web", "The World Wide Web (WWW), commonly known as the Web, is an information system where documents and other web resources are identified by Uniform Resource Locators"),
(1, "Binary Search", "An efficient algorithm for finding an item from a sorted list of items. It works by..."),
(1, "Graphs and Graph Algorithms", "Graph theory is the study of graphs, which are mathematical structures used to model pairwise relations between objects..."),
(2, "Introduction to AI", "Artificial Intelligence is an approach to make a computer, a robot, or a product to think how smart human think."),
(2, "Recommendation Systems", "On the Internet, where the number of choices is overwhelming, there is need to filter, prioritize and efficiently deliver relevant information..."),
(3, "Normalization", "The process of structuring a database..."),
(3, "Database Security", "Databases contain really important information, and thus must be secured..."),
(4, "Usability Principles", "Designing for maximum usability is the goal of interactive systems design..."),
(4, "Metaphors", "A mapping process from a familiar object to an unfamiliar object, and it provides the framework to familiarize an unknown concept through a mapping process.");

