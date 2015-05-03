-- buildorangemesa.sql - Building OrangeMesa

USE orangemesa;

CREATE TABLE IF NOT EXISTS PEOPLE (
    username VARCHAR(15),
    usr_pass VARCHAR(255) NOT NULL,
    fname VARCHAR(15) NOT NULL,
    minit CHAR(1),
    lname VARCHAR(15) NOT NULL,
    description TEXT,
    dob DATE NOT NULL,
    ppid INT(15),
    PRIMARY KEY (username)
);

CREATE TABLE IF NOT EXISTS FRIENDS (
    userid VARCHAR(15) 
      REFERENCES PEOPLE(username)
      ON UPDATE CASCADE ON DELETE CASCADE,
    friendid VARCHAR(15) 
      REFERENCES PEOPLE(username)
      ON UPDATE CASCADE ON DELETE CASCADE,
    request_state CHAR(1) CHECK(request_state = 'a' OR
                                request_state = 'd' OR
                                request_state = 'p'),
   	PRIMARY KEY (userid, friendid)
);

CREATE TABLE IF NOT EXISTS PHOTOS (
    photoid INT(15),
    owner VARCHAR(15) 
      REFERENCES PEOPLE(username)
      ON UPDATE CASCADE ON DELETE CASCADE,
    caption TEXT,
    uploaddate DATE NOT NULL,
  	photourl VARCHAR(2083),
    PRIMARY KEY (photoid, owner)
);

ALTER TABLE PEOPLE
ADD FOREIGN KEY (ppid) 
REFERENCES PHOTOS(photoid)
ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS GROUPS (
    groupid INT(15) AUTO_INCREMENT,
    name VARCHAR(15) NOT NULL,
    ocstatus CHAR(1) NOT NULL CHECK(ocstatus = 'o' OR ocstatus = 'c'),
    description TEXT,
    owner VARCHAR(15) 
      REFERENCES PEOPLE(username)
      ON UPDATE CASCADE ON DELETE CASCADE,
    gpid INT(15) 
      REFERENCES PHOTOS(photoid)
      ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (groupid)
);

CREATE TABLE IF NOT EXISTS GROUP_MEMBERS (
  	gid INT(15) 
      REFERENCES GROUPS(groupid)
      ON UPDATE CASCADE ON DELETE CASCADE,
  	memberid VARCHAR(15) 
      REFERENCES PEOPLE(username)
      ON UPDATE CASCADE ON DELETE CASCADE,
  	PRIMARY KEY (gid, memberid)
);

CREATE TABLE IF NOT EXISTS PAGES (
    pageid INT(15) AUTO_INCREMENT,
    pagename VARCHAR(15) NOT NULL UNIQUE,
    description TEXT,
    creation_date DATE NOT NULL,
    owner VARCHAR(15) 
      REFERENCES PEOPLE(username)
      ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (pageid)
);

CREATE TABLE IF NOT EXISTS EVENTS (
    eventid INT(15) AUTO_INCREMENT,
    eventname VARCHAR(255) NOT NULL,
    description TEXT,
    eventdate DATETIME NOT NULL,
    creatorid VARCHAR(15) 
      REFERENCES PEOPLE(username)
      ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (eventid)
);


CREATE TABLE IF NOT EXISTS EVENT_INVITES(
	eventid INT(15) 
    REFERENCES EVENT(eventid)
    ON UPDATE CASCADE ON DELETE CASCADE,
	invitee VARCHAR(15)
    REFERENCES PEOPLE(username)
    ON UPDATE CASCADE ON DELETE CASCADE,
	status CHAR(1) CHECK(status = 'g' OR status = 'n' OR status = 'u'),
	PRIMARY KEY (eventid,invitee)
);

CREATE TABLE IF NOT EXISTS PAGE_FOLLOWERS (
  	pid INT(15) 
      REFERENCES PAGES(pageid)
      ON UPDATE CASCADE ON DELETE CASCADE,
  	followerid VARCHAR(15) 
      REFERENCES PEOPLE(username)
      ON UPDATE CASCADE ON DELETE CASCADE,
  	PRIMARY KEY (pid, followerid)
);

CREATE TABLE IF NOT EXISTS POST_PEOPLE2PAGE (
  postid INT(15) AUTO_INCREMENT,
  reciever INT(15) 
    REFERENCES PAGES(pageid)
    ON UPDATE CASCADE ON DELETE CASCADE,
  sender VARCHAR(15) 
    REFERENCES PEOPLE(username)
    ON UPDATE CASCADE ON DELETE CASCADE,
  timestamp DATETIME NOT NULL,
  message TEXT,
  PRIMARY KEY (postid, reciever, sender)
);

CREATE TABLE IF NOT EXISTS POST_PAGE2PEOPLE (
  postid INT(15) AUTO_INCREMENT,
  reciever VARCHAR(15) 
    REFERENCES PEOPLE(username)
    ON UPDATE CASCADE ON DELETE CASCADE,
  sender INT(15) 
    REFERENCES PAGES(pageid)
    ON UPDATE CASCADE ON DELETE CASCADE,
  timestamp TIMESTAMP NOT NULL,
  message TEXT,
  PRIMARY KEY (postid, reciever, sender)
);
  
CREATE TABLE IF NOT EXISTS POST_PEOPLE2EVENT (
  postid INT(15) AUTO_INCREMENT,
  reciever INT(15) 
    REFERENCES EVENTS(eventid)
    ON UPDATE CASCADE ON DELETE CASCADE,
  sender VARCHAR(15) 
    REFERENCES PEOPLE(username)
    ON UPDATE CASCADE ON DELETE CASCADE,
  timestamp TIMESTAMP NOT NULL,
  message TEXT,
  PRIMARY KEY (postid, reciever, sender)
);

CREATE TABLE IF NOT EXISTS POST_PEOPLE2GROUP (
  postid INT(15) AUTO_INCREMENT,
  reciever INT(15) 
    REFERENCES GROUPS(groupid)
    ON UPDATE CASCADE ON DELETE CASCADE,
  sender VARCHAR(15) 
    REFERENCES PEOPLE(username)
    ON UPDATE CASCADE ON DELETE CASCADE,
  timestamp TIMESTAMP NOT NULL,
  message TEXT,
  PRIMARY KEY (postid, reciever, sender)
);

CREATE TABLE IF NOT EXISTS POST_PAGE2PAGE (
  	postid INT(15) AUTO_INCREMENT,
    reciever INT(15) 
      REFERENCES PAGES(pageID)
      ON UPDATE CASCADE ON DELETE CASCADE,
  	sender INT(15) 
      REFERENCES PAGES(pageID)
      ON UPDATE CASCADE ON DELETE CASCADE,
    timestamp TIMESTAMP NOT NULL,
  	message TEXT,
  	PRIMARY KEY (postid, sender, reciever)
);

CREATE TABLE IF NOT EXISTS POST_PEOPLE2PEOPLE(
	postid INT(15) AUTO_INCREMENT,
	reciever VARCHAR(15) 
    REFERENCES PEOPLE(username)
    ON UPDATE CASCADE ON DELETE CASCADE,
 	sender VARCHAR(15) 
    REFERENCES PEOPLE(username)
    ON UPDATE CASCADE ON DELETE CASCADE,
  timestamp TIMESTAMP NOT NULL,
  message TEXT,
	PRIMARY KEY (postid,reciever,sender)
);

CREATE TABLE IF NOT EXISTS POST_PAGE2GROUP (
  	postid INT(15) AUTO_INCREMENT,
  	reciever INT(15) 
      REFERENCES GROUPS(groupid)
      ON UPDATE CASCADE ON DELETE CASCADE,
  	sender INT(15) 
      REFERENCES PAGES(pageid)
      ON UPDATE CASCADE ON DELETE CASCADE,
    timestamp TIMESTAMP NOT NULL,
  	message TEXT,
  	PRIMARY KEY (postid, reciever, sender)
);

CREATE TABLE IF NOT EXISTS POST_PAGE2EVENT(
	postid INT(15) AUTO_INCREMENT,
	reciever INT(15) 
    REFERENCES PAGE(pageid)
    ON UPDATE CASCADE ON DELETE CASCADE,
	sender INT(15) 
    REFERENCES EVENT(eventid)
    ON UPDATE CASCADE ON DELETE CASCADE,
  timestamp TIMESTAMP NOT NULL,
	message TEXT,
	PRIMARY KEY (postid,reciever,sender)
);
