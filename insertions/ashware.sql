DROP DATABASE IF EXISTS ashware;

CREATE DATABASE ashware;
USE ashware;

CREATE TABLE Students (
	Student_id INT NOT NULL AUTO_INCREMENT,
    Fname VARCHAR(60) NOT NULL,
    Lname VARCHAR(60) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Studentpassword VARCHAR(80) NOT NULL,
    PRIMARY KEY(Student_id)
);

CREATE TABLE Departments(
	Dept_id INT NOT NULL AUTO_INCREMENT,
    Dept_name VARCHAR(100) NOT NULL,
    PRIMARY KEY(Dept_id)
);

CREATE TABLE Lecturers(
	Lecturer_id INT NOT NULL AUTO_INCREMENT,
    Fname VARCHAR(60) NOT NULL,
    Lname VARCHAR(60) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Department INT NOT NULL,
    PRIMARY KEY(Lecturer_id),
    FOREIGN KEY(Department) REFERENCES Departments(Dept_id)
);

CREATE TABLE Courses(
	Course_id INT NOT NULL AUTO_INCREMENT,
    Course_name VARCHAR(100) NOT NULL,
    Course_desc TEXT NOT NULL,
    Course_lecturer INT NOT NULL,
    Course_image BLOB,
    PRIMARY KEY(Course_id),
    FOREIGN KEY(Course_lecturer) REFERENCES Lecturers(Lecturer_id)
);

CREATE TABLE Enrollments(
	Student_id INT NOT NULL,
    Course_id INT NOT NULL,
    FOREIGN KEY(Student_id) REFERENCES Students(Student_id),
    FOREIGN KEY(Course_id) REFERENCES Courses(Course_id)
);

CREATE TABLE Lessons(
	Lesson_id INT NOT NULL AUTO_INCREMENT,
    Course_id INT NOT NULL,
    Lesson_title TEXT NOT NULL,
    Lesson_desc TEXT NOT NULL,
    PRIMARY KEY(Lesson_id, Course_id),
    FOREIGN KEY(Course_id) REFERENCES Courses(Course_id)
);

CREATE TABLE CompletedLessons(
	Student_id INT NOT NULL,
	Course_id INT NOT NULL,
    Lesson_id INT NOT NULL,
    FOREIGN KEY(Course_id) REFERENCES Courses(Course_id),
    FOREIGN KEY(Lesson_id) REFERENCES Lessons(Lesson_id)
);