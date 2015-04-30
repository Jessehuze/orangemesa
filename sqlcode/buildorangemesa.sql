-- buildorangemesa.sql - Building OrangeMesa

USE ORANGEMESA;

CREATE TABLE IF NOT EXISTS PEOPLE (
    username VARCHAR(15),
    usr_pass VARCHAR(15) NOT NULL,
    fname VARCHAR(15) NOT NULL,
    minit CHAR(1),
    lname VARCHAR(15) NOT NULL,
    description VARCHAR(144),
    dob DATE NOT NULL,
    ppid VARCHAR(15),
    PRIMARY KEY (username)
);

CREATE TABLE IF NOT EXISTS FRIENDS (
    userid VARCHAR(15) REFERENCES PEOPLE(username),
    friendid VARCHAR(15) REFERENCES PEOPLE(username),
    request_state CHAR(1) CHECK(request_state = 'a' OR
                                request_state = 'd' OR
                                request_state = 'p'),
   	PRIMARY KEY (userid, friendid)
);

CREATE TABLE IF NOT EXISTS PHOTOS (
    photoid VARCHAR(15),
    owner VARCHAR(15) REFERENCES PEOPLE(username),
    caption VARCHAR(144),
    uploaddate DATE NOT NULL,
  	photoURL VARCHAR(2083),
    PRIMARY KEY (photoid, owner)
);

ALTER TABLE PEOPLE
ADD FOREIGN KEY (ppid) 
REFERENCES PHOTOS(photoid);

CREATE TABLE IF NOT EXISTS GROUPS (
    groupid VARCHAR(15),
    name VARCHAR(15) NOT NULL,
    ocstatus CHAR(1) NOT NULL CHECK(ocstatus = 'o' OR ocstatus = 'c'),
    description VARCHAR(144),
    owner VARCHAR(15) REFERENCES PEOPLE(username),
    gpid VARCHAR(15) REFERENCES PHOTOS(photoid),
    PRIMARY KEY (groupid)
);

CREATE TABLE IF NOT EXISTS PAGES (
    pageid VARCHAR(15),
    pagename VARCHAR(15) NOT NULL UNIQUE,
    description VARCHAR(144),
    creation_date DATE NOT NULL,
    owner VARCHAR(15) REFERENCES PEOPLE(username),
    PRIMARY KEY (pageid)
);

CREATE TABLE IF NOT EXISTS EVENTS (
    eventid VARCHAR(15),
    eventname VARCHAR(15) NOT NULL,
    description VARCHAR(144),
    eventdate DATE NOT NULL,
    creatorid VARCHAR(15) REFERENCES PEOPLE(username),
    PRIMARY KEY (eventid)
);

CREATE TABLE IF NOT EXISTS PAGE_FOLLOWERS (
  	PID INT REFERENCES PAGES(pageid),
  	FollowerID VARCHAR(15) REFERENCES PEOPLE(username),
  	PRIMARY KEY (PID, FollowerID)
);

CREATE TABLE IF NOT EXISTS POST_PEOPLE2PAGE (
  postid INT,
  reciever VARCHAR(15) REFERENCES PAGES(pageid),
  sender VARCHAR(15) REFERENCES PEOPLE(username),
  message VARCHAR(144),
  PRIMARY KEY (postid, reciever, sender)
);

CREATE TABLE IF NOT EXISTS POST_PAGE2PEOPLE (
  postid INT,
  reciever VARCHAR(15) REFERENCES PEOPLE(username),
  sender VARCHAR(15) REFERENCES PAGES(pageid),
  message VARCHAR(144),
  PRIMARY KEY (postid, reciever, sender)
);
  
CREATE TABLE IF NOT EXISTS POST_PEOPLE2EVENT (
  postid INT,
  reciever VARCHAR(15) REFERENCES EVENTS(eventid),
  sender VARCHAR(15) REFERENCES PEOPLE(username),
  message VARCHAR(144),
  PRIMARY KEY (postid, reciever, sender)
);

CREATE TABLE IF NOT EXISTS POST_PEOPLE2GROUP (
  postid INT,
  reciever VARCHAR(15) REFERENCES GROUPS(GroupID),
  sender VARCHAR(15) REFERENCES PEOPLE(username),
  message VARCHAR(144),
  PRIMARY KEY (postid, reciever, sender)
  );

CREATE TABLE IF NOT EXISTS EVENT_INVITES(
	EVENT VARCHAR(15),
	INVITES VARCHAR(15),
	STATUS CHAR(1) CHECK(STATUS = 'g' OR STATUS = 'n' OR STATUS = 'u'),
	PRIMARY KEY (EVENT,INVITES)
);

CREATE TABLE IF NOT EXISTS POST_PAGE2PAGE (
  	postid INT,
 	reciever VARCHAR(15) REFERENCES PAGES(pageID),
  	sender VARCHAR(15) REFERENCES PAGES(pageID),
  	message VARCHAR(144),
  	PRIMARY KEY (postid, sender, reciever)
  );

CREATE TABLE IF NOT EXISTS POST_PEOPLE2PEOPLE(
	POSTID INT,
	RECIEVER VARCHAR(15) REFERENCES PEOPLE(USERNAME),
  	SENDER VARCHAR(15) REFERENCES PEOPLE(USERNAME),
  	MESSAGE VARCHAR(144),
	PRIMARY KEY (POSTID,RECIEVER,SENDER)
);

CREATE TABLE IF NOT EXISTS POST_PAGE2GROUP (
  	postid INT,
  	reciever VARCHAR(15) REFERENCES GROUPS(GroupID),
  	sender VARCHAR(15) REFERENCES PAGES(pageid),
  	message VARCHAR(144),
  	PRIMARY KEY (postid, reciever, sender)
);

CREATE TABLE IF NOT EXISTS POST_PAGE2EVENT(
	POSTID INT,
	RECIEVER VARCHAR(15) REFERENCES PAGE(PAGEID),
	SENDER VARCHAR(15) REFERENCES EVENT(EVENTID),
	MESSAGE VARCHAR(144),
	PRIMARY KEY (POSTID,RECIEVER,SENDER)
);
