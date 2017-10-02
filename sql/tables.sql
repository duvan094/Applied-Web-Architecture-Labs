Create table Author(
    ssn varchar(9),
    firstname varchar(50) NOT NULL,
    lastname varchar(50) NOT NULL,
    birthyear INT,
    website varchar(50),
    id INT AUTO_INCREMENT,
    primary key(id)
)engine = innodb;

Insert into Author values
(null,"John","Steinbeck",1883,null,null),
(null,"George","Orwell",1903,null,null),
("620221123","Chuck","Palahniuk",1962,"http://chuckpalahniuk.net/",null)
;


Create table Book(
	isbn varchar(13) NOT NULL,
	title varchar(50) NOT NULL,
	noOfPages INT,
	edition INT,
	PublicationYear INT,
	Publisher varchar(50),
	Primary key(isbn),
	Foreign key(id) references Author(id)
)engine = innodb;


/*Task 2*/
Create table Books(
	isbn varchar(13) NOT NULL,
	title varchar(50) NOT NULL,
	author varchar(100) Not NULL,
	noOfPages INT,
	edition INT,
	publicationYear INT,
	publisher varchar(50),
	reserved varchar(3) DEFAULT "No",
	Primary key(ISBN)
)engine = innodb;

Insert into Books (isbn,title,author,noOfPages,edition,publicationYear,publisher) values
("1234567891011","Thinking With Type","Johan Andersson",123,1,1998,"Bonnier"),
("6662367891032","A 100 Things About Pencils","Stefan Andersson",1001,4,2014,"Atlas"),
("7474567578544","Thinking With Your Head","Roger Gruneberg",142,4,2009,"Penguin"),
("1238673721919","My Life","Ulf Svensson",404,1,1998,"Bonnier"),
("9012341238888","Writing With Text","Birgitta Andersson",255,1,2017,"Penguin"),
("9877626262626","Typing Text With A Keyboard","Ylva Unebeck",422,3,2001,"Bonnier")
;

Create table Users(
	username varchar(50) NOT NULL,
	password varchar(50) NOT NULL,
	Primary key(username)
)engine = innodb;

Insert into Users (username,password) values
("steffe87","6367c48dd193d56ea7b0baad25b19455e529f5ee")/*abc123*/,
("mihirre1","77ba9cd915c8e359d9733edcfe9c61e5aca92afb")/*1337*/,
("joppe94","7aec5e6ec029660f668f7756f89dab65ac1e23f7")/*joppe94*/
("skurt","40bd001563085fc35165329ea1ff5c5ecbdbbeef")/*123*/
;