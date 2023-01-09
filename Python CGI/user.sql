use student_registration;

create table student(
student_id int(10) Not Null auto_increment,
aadhar_card varchar(16) Not NUll,
student_name varchar(25) Not null,
student_email varchar(30) Not null,
student_mobile bigint(10),
student_password varchar(35) NOT Null,
student_gender varchar(10) NOT NULL,
primary key (student_id)
);

Insert into student values (1,0147258736980145,'Sammed Singalkar','sammedsingalkar@gmail.com',9658741238,'skfjb@554#6fu','Male');

select * from student;