<?php

//Wrote this based on what I read on w3, possibly what most of our functions look like
function CreateProfile($fname, $lname, $Minit, $username, $password, $DoB, $Description)
{
	$servername = "localhost";
	$username = "username";
	$password = "password";
	
	$conn = new mysqli($servername, $username, $password);
	
	if($conn->connect_error)
	{
		die("Connection failed, try again stupid." . $conn->connect_error);
	}
	
	$query = "Insert into People(username, password, fname, minit, lname, description, dob) Values($username, $password, $fname, $Minit, $lname, $description, $DoB)";
	
	if($conn->query($query) === TRUE)
	{
		echo "Created Successfully";
	}else
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
}

function EditProfile(){}

function SendFriendRequest($UserId, $FirendID){}

function ReplytoFriendRequest(){}

function MakePost($sender, $reciever, $Message){}

function JoinGroup(){}

function FollowPage(){}

function MakeEvent)(){}

function SendEventInvite(){}

function ReplyToInvite(){}

function CreatePage($Pagename, $Description, $Owner){}


?>