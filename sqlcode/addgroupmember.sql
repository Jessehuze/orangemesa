CREATE TABLE IF NOT EXISTS GROUP_MEMBERS (
  	GID INT REFERENCES GROUPS(GROUP),
  	memberid VARCHAR(15) REFERENCES PEOPLE(username),
  	PRIMARY KEY (GID, memberid)
);