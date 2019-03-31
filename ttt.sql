--- DDL --


create table students(
	s_id Serial primary key not null,
	s_f_name varchar(50) not null,
	s_m_name varchar(50),
	s_l_name varchar(50),
	s_username varchar(50) not null,
	s_password varchar(50) not null,
	s_address varchar(50) NOT NULL,
	s_dob DATE not null,
	s_m_no bigint NOT NULL,
	s_email varchar(30) NOT NULL
);


CREATE TABLE parents(
  	p_id Serial primary key not null,
  	p_f_name varchar(50) not null,
	p_m_name varchar(50),
	p_l_name varchar(50),
	p_username varchar(50) not null,
	p_password varchar(50) not null,
	p_address varchar(50) NOT NULL,
	p_dob DATE not null,
	p_m_no bigint NOT NULL,
	p_email varchar(30) NOT NULL,
	s_id int not null,
  	FOREIGN KEY(s_id) REFERENCES students(s_id) on UPDATE CASCADE ON DELETE SET NULL											 
);


create table subjects(
	sub_id Serial primary key not null,
	sub_name varchar(50) not null
);



create table teachers(
	t_id Serial primary key not null,
	t_f_name varchar(50) not null,
	t_m_name varchar(50),
	t_l_name varchar(50),
	t_username varchar(50) not null,
	t_password varchar(50) not null,
	t_address varchar(50) NOT NULL,
	t_dob DATE not null,
	t_m_no bigint NOT NULL,
	t_email varchar(30) NOT NULL,
	sub_id INTEGER NOT NULL,
	FOREIGN KEY(sub_id) REFERENCES subjects(sub_id) on UPDATE CASCADE ON DELETE SET NULL	
);


create table stu_sub(
	t_id Serial primary key not null,
	s_id int,
  	FOREIGN KEY(s_id) REFERENCES students(s_id) on UPDATE CASCADE ON DELETE SET NULL,
	sub_id INTEGER NOT NULL,
	FOREIGN KEY(sub_id) REFERENCES subjects(sub_id) on UPDATE CASCADE ON DELETE SET NULL	
);




create table stu_marks(
	t_id Serial primary key not null,
	s_id INTEGER NOT NULL,
  	FOREIGN KEY(s_id) REFERENCES students(s_id) on UPDATE CASCADE ON DELETE SET NULL,
	sub_id INTEGER NOT NULL,
	FOREIGN KEY(sub_id) REFERENCES subjects(sub_id) on UPDATE CASCADE ON DELETE SET NULL,
	marks INTEGER NOT NULL
);


create table user_type(
	u_id Serial primary key not null,
	u_role varchar(50) not null
);



create table attendance (
	a_id INTEGER primary key not null,
	t_id int not null,
  	FOREIGN KEY(t_id) REFERENCES teachers(t_id) on UPDATE CASCADE ON DELETE SET NULL,
  	s_id INTEGER NOT NULL,
  	FOREIGN KEY(s_id) REFERENCES students(s_id) on UPDATE CASCADE ON DELETE SET NULL,
	sub_id INTEGER NOT NULL,
	FOREIGN KEY(sub_id) REFERENCES subjects(sub_id) on UPDATE CASCADE ON DELETE SET NULL,
	status boolean,
	a_day DATE
);




 create table events(
	e_id INTEGER primary key not null,
	e_name varchar(250) not null,
	e_date DATE not null,
	e_place varchar(100) not null
);


 create table holiday(
h_id INTEGER primary key not null,
	h_name varchar(250) not null,
	h_date Date not null
);



create table announcement(
a_id INTEGER primary key not null,
a_details varchar(250) not null,
a_note varchar(250));


create table sports_events(
sp_id INTEGER primary key not null,
sp_details varchar(250) not null,
sp_date DATE,
sp_venue varchar(250));


create table result_report(
rr_id INTEGER primary key not null,
rr_std int not null,
rr_per real not null
);






--- INSER QUERY ---


INSERT INTO students VALUES(1,'Dhrumil','Kalpeshbhai','Modi','201812001','abc123','Ahmedabad','05/04/1996',7359324923,'dkmodi@gmail.com');
INSERT INTO students VALUES(2,'Vrushti','S','Shah','201812002','abc123','Ahmedabad','05/04/1997',7874353439,'vshah1997@gmail.com');
INSERT INTO students VALUES(3,'Laleet','M','Avaiya','201812003','abc123','Surat','01/01/1996',7359324923,'lmavaiya@gmail.com');
INSERT INTO students VALUES(4,'Yogesh','J','Thakkar','201812004','abc123','Gandhinagar','01/07/1996',9925606620,'yogeshth96@gmail.com');
INSERT INTO students VALUES(5,'Jayswee','N','Shah','201812005','abc123','Ahmedabad','01/07/1997',9925608820,'jnshas@gmail.com');


INSERT INTO parents VALUES(1,'Kalpeshbhai','B','Modi','201712001','abc123','Ahmedabad','05/04/1972',9856856985,'kbmodi@gmail.com',1);
INSERT INTO parents VALUES(2,'Sureshbhai','M','Shah','201712002','abc123','Ahmedabad','07/05/1972',9857756985,'smshah@gmail.com',2);
INSERT INTO parents VALUES(3,'Maheshbhai','M','Avaiya','201712003','abc123','Surat','06/15/1971',9723782695,'mraaviya@gmail.com',3);
INSERT INTO parents VALUES(4,'Jitendrabhai','M','Thakkar','201712004','abc123','Ahmedabad','01/04/1973',9856856985,'kbmodi@gmail.com',4);
INSERT INTO parents VALUES(5,'Nirajbhai','B','Shah','201712005','abc123','Ahmedabad','05/04/1970',9855556985,'kbmodi@gmail.com',5);


INSERT INTO subjects VALUES(1,'Maths');
INSERT INTO subjects VALUES(2,'Gujarati');
INSERT INTO subjects VALUES(3,'Hindi');
INSERT INTO subjects VALUES(4,'English');
INSERT INTO subjects VALUES(5,'Science');

INSERT INTO teachers VALUES(1,'Manish','M','Khare','201612001','abc123','Ahmedabad','02/02/1975',7874587845,'manishkhare@gmail.com',1);
INSERT INTO teachers VALUES(2,'Rahul','M','Patel','201612002','abc123','Gandhinagar','02/02/1975',7874587845,'Rahulsg@gmail.com',2);
INSERT INTO teachers VALUES(3,'Deep','V','Raj','201612003','abc123','Surat','02/02/1975',7874587845,'Deeps@gmail.com',3);
INSERT INTO teachers VALUES(4,'Manish','M','Khare','201612004','abc123','Ahmedabad','02/02/1975',7874587845,'Manishm@gmail.com',4);
INSERT INTO teachers VALUES(5,'Ramesh','S','Mehta','201612005','abc123','Surat','02/02/1975',7874587845,'Rameshs@gmail.com',5);


INSERT INTO stu_sub VALUES(1,1,1);
INSERT INTO stu_sub VALUES(2,1,2);
INSERT INTO stu_sub VALUES(3,1,3);
INSERT INTO stu_sub VALUES(4,1,4);
INSERT INTO stu_sub VALUES(5,1,5);
INSERT INTO stu_sub VALUES(6,2,1);
INSERT INTO stu_sub VALUES(7,2,2);
INSERT INTO stu_sub VALUES(8,2,3);
INSERT INTO stu_sub VALUES(9,2,4);
INSERT INTO stu_sub VALUES(10,2,5);
INSERT INTO stu_sub VALUES(11,3,1);
INSERT INTO stu_sub VALUES(12,3,2);
INSERT INTO stu_sub VALUES(13,3,3);
INSERT INTO stu_sub VALUES(14,3,4);
INSERT INTO stu_sub VALUES(15,3,5);
INSERT INTO stu_sub VALUES(16,4,1);
INSERT INTO stu_sub VALUES(17,4,2);
INSERT INTO stu_sub VALUES(18,4,3);
INSERT INTO stu_sub VALUES(19,4,4);
INSERT INTO stu_sub VALUES(20,4,5);
INSERT INTO stu_sub VALUES(21,5,1);
INSERT INTO stu_sub VALUES(22,5,2);
INSERT INTO stu_sub VALUES(23,5,3);
INSERT INTO stu_sub VALUES(24,5,4);
INSERT INTO stu_sub VALUES(25,5,5);


INSERT INTO stu_marks VALUES(1,1,1,80);
INSERT INTO stu_marks VALUES(2,1,2,89);
INSERT INTO stu_marks VALUES(3,1,3,87);
INSERT INTO stu_marks VALUES(4,1,4,81);
INSERT INTO stu_marks VALUES(5,1,5,82);
INSERT INTO stu_marks VALUES(6,2,1,85);
INSERT INTO stu_marks VALUES(7,2,2,84);
INSERT INTO stu_marks VALUES(8,2,3,87);
INSERT INTO stu_marks VALUES(9,2,4,70);
INSERT INTO stu_marks VALUES(10,2,5,60);
INSERT INTO stu_marks VALUES(11,3,1,50);
INSERT INTO stu_marks VALUES(12,3,2,40);
INSERT INTO stu_marks VALUES(13,3,3,55);
INSERT INTO stu_marks VALUES(14,3,4,79);
INSERT INTO stu_marks VALUES(15,3,5,90);
INSERT INTO stu_marks VALUES(16,4,1,95);
INSERT INTO stu_marks VALUES(17,4,2,97);
INSERT INTO stu_marks VALUES(18,4,3,50);
INSERT INTO stu_marks VALUES(19,4,4,60);
INSERT INTO stu_marks VALUES(20,4,5,66);
INSERT INTO stu_marks VALUES(21,5,1,70);
INSERT INTO stu_marks VALUES(22,5,2,93);
INSERT INTO stu_marks VALUES(23,5,3,70);
INSERT INTO stu_marks VALUES(24,5,4,82);
INSERT INTO stu_marks VALUES(25,5,5,74);


INSERT INTO user_type(u_role) VALUES('teacher');
INSERT INTO user_type(u_role) VALUES('parents');
INSERT INTO user_type(u_role) VALUES('student');


INSERT INTO attendance VALUES(1,1,1,1,'y','06/01/2018');
INSERT INTO attendance VALUES(2,1,2,1,'y','06/01/2018');
INSERT INTO attendance VALUES(3,1,3,1,'y','06/01/2018');
INSERT INTO attendance VALUES(4,1,4,1,'y','06/01/2018');
INSERT INTO attendance VALUES(5,1,5,1,'y','06/01/2018');
INSERT INTO attendance VALUES(6,2,1,2,'y','06/02/2018');
INSERT INTO attendance VALUES(7,2,2,2,'n','06/02/2018');
INSERT INTO attendance VALUES(8,2,3,2,'y','06/02/2018');
INSERT INTO attendance VALUES(9,2,4,2,'n','06/02/2018');
INSERT INTO attendance VALUES(10,2,5,2,'y','06/02/2018');
INSERT INTO attendance VALUES(11,3,1,3,'n','06/02/2018');
INSERT INTO attendance VALUES(12,3,2,3,'n','06/02/2018');
INSERT INTO attendance VALUES(13,3,3,3,'y','06/02/2018');
INSERT INTO attendance VALUES(14,3,4,3,'y','06/02/2018');
INSERT INTO attendance VALUES(15,3,5,3,'y','06/02/2018');
INSERT INTO attendance VALUES(16,4,1,4,'y','06/03/2018');
INSERT INTO attendance VALUES(17,4,2,4,'y','06/03/2018');
INSERT INTO attendance VALUES(18,4,3,4,'y','06/03/2018');
INSERT INTO attendance VALUES(19,4,4,4,'n','06/03/2018');
INSERT INTO attendance VALUES(20,4,5,4,'n','06/03/2018');
INSERT INTO attendance VALUES(21,5,1,5,'y','06/03/2018');
INSERT INTO attendance VALUES(22,5,2,5,'y','06/03/2018');
INSERT INTO attendance VALUES(23,5,3,5,'n','06/03/2018');
INSERT INTO attendance VALUES(24,5,4,5,'y','06/03/2018');
INSERT INTO attendance VALUES(25,5,5,5,'n','06/03/2018');
INSERT INTO attendance VALUES(26,1,1,1,'y','06/04/2018');
INSERT INTO attendance VALUES(27,1,2,1,'y','06/04/2018');
INSERT INTO attendance VALUES(28,1,3,1,'y','06/04/2018');
INSERT INTO attendance VALUES(29,1,4,1,'y','06/04/2018');
INSERT INTO attendance VALUES(30,1,5,1,'y','06/04/2018');
INSERT INTO attendance VALUES(31,2,1,2,'y','06/04/2018');
INSERT INTO attendance VALUES(32,2,2,2,'y','06/04/2018');
INSERT INTO attendance VALUES(33,2,3,2,'y','06/04/2018');
INSERT INTO attendance VALUES(34,2,4,2,'y','06/04/2018');
INSERT INTO attendance VALUES(35,2,5,2,'n','06/04/2018');
INSERT INTO attendance VALUES(36,3,1,3,'y','06/05/2018');
INSERT INTO attendance VALUES(37,3,2,3,'y','06/05/2018');
INSERT INTO attendance VALUES(38,3,3,3,'y','06/05/2018');
INSERT INTO attendance VALUES(39,3,4,3,'y','06/05/2018');
INSERT INTO attendance VALUES(40,3,5,3,'n','06/05/2018');
INSERT INTO attendance VALUES(41,4,1,4,'y','06/05/2018');
INSERT INTO attendance VALUES(42,4,2,4,'y','06/05/2018');
INSERT INTO attendance VALUES(43,4,3,4,'y','06/05/2018');
INSERT INTO attendance VALUES(44,4,4,4,'y','06/05/2018');
INSERT INTO attendance VALUES(45,4,5,4,'n','06/05/2018');
INSERT INTO attendance VALUES(46,5,1,5,'y','06/06/2018');
INSERT INTO attendance VALUES(47,5,2,5,'y','06/06/2018');
INSERT INTO attendance VALUES(48,5,3,5,'y','06/06/2018');
INSERT INTO attendance VALUES(49,5,4,5,'y','06/06/2018');
INSERT INTO attendance VALUES(50,5,5,5,'n','06/06/2018');


insert into events values(1,'Republic day celebration','01/26/2018','School Ground');
insert into events values(2,'Independence day celebration','08/15/2018','School Ground');
insert into events values(3,'Teachers Day celebration','09/05/2018','School');
insert into events values(4,'Swachhata Day','09/07/2018','School campus');
insert into events values(5,'Sport Festival','09/15/2018','School campus');


insert into holiday values(1,'New Year','01/01/2018');
insert into holiday values(2,'Republic Day','01/26/2018');
insert into holiday values(3,'Maha Shivaratri','02/14/2018');
insert into holiday values(4,'Holi','03/02/2018');
insert into holiday values(5,'Mahavir Jayanti','03/29/2018');
insert into holiday values(6,'Good Friday','03/30/2018');
insert into holiday values(7,'Buddha Purnima','04/30/2018');
insert into holiday values(8,'Idul Fitr','06/16/2018');
insert into holiday values(9,'Independence Day','08/15/2018');
insert into holiday values(10,'Bakrid','08/22/2018');
insert into holiday values(11,'Janmashtami','09/03/2018');
insert into holiday values(12,'Muharram','09/21/2018');
insert into holiday values(13,'Mahatma Gandhi Birthday','10/02/2018');
insert into holiday values(14,'Dussehra','10/09/2018');
insert into holiday values(15,'Diwali ','11/07/2018');


Insert into announcement values(1,'Seminar on Thinking','Near LT-3 on 04/15/2018 @ 5:00 PM');
Insert into announcement values(2,'Seminar on AI','At OAT 09/08/2018');
Insert into announcement values(3,'Workshop on Home Automation','CEP 207 on 04/15/2018 @ 5:00 PM');
Insert into announcement values(4,'Workshop on Android','IN LT-2 on 04/25/2018 @ 3:00 PM');
Insert into announcement values(5,'Seminar on IoT','IN SAC on 04/15/2018 @ 5:00 PM');



insert into result_report values(1,1,98);
insert into result_report values(2,2,93);
insert into result_report values(3,3,100);
insert into result_report values(4,4,86);
insert into result_report values(5,5,85);
insert into result_report values(6,6,82);
insert into result_report values(7,7,70);
insert into result_report values(8,8,55);
insert into result_report values(9,9,60);
insert into result_report values(10,10,99);

