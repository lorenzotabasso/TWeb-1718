<?php

#Detect AJAX and POST request, if is empty exit
if((empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') or empty($_POST)){
    exit("Unauthorized Acces");
}

require('inc/config.php'); # needed for DB connection
require('inc/functions.php');

# Check if Login form is submitted
if(!empty($_POST)){

    # Define return variable. for further details see "output" function in functions.php
    $toReturn = array('result'=>array(), 'error'=>'');

    $email = $_POST['Email'];
    $password = $_POST['Password'];

    # Server side PHP input validation
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $toReturn['error'] = "Please enter a valid Email address.";
    } else if($password === '') {
        $toReturn['error'] = "Please enter Password.";
    }
    if($toReturn['error']!='') {
        output($toReturn);
    }

    # Checking Email and Password existence in DB

    # Selecting the email address of the user with the correct login credentials.
    $query_checkEmail = $db->query("SELECT email,id FROM users WHERE Email='$email' AND Password='$password'");
    $result = $query_checkEmail->fetch(PDO::FETCH_ASSOC);

    if($query_checkEmail->rowCount() == 1) {
        # Success: Set session variables and redirect to Protected page
        $toReturn['result'] = $result;
		$_SESSION['UserData'] = $result["id"];
    } else {
        # Failure: Set error message
        $toReturn['error'] = 'Invalid Login Credential';
    }

    output($toReturn);
}

# Check if Signin form is submitted
if(!empty($_POST) && isset($_POST['Name']) && isset($_POST['Surname'])) {

    # Define return variable. for further details see "output" function in functions.php
    $toReturn = array('result'=>array(), 'error'=>'');

    $name = $_POST['Name'];
	$surname = $_POST['Surname'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    # Server side PHP input validation
    if($name === '') {
        $toReturn['error'] = "Please enter Full name.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $toReturn['error'] = "Please enter a valid Email address.";
    } else if($password === '') {
        $toReturn['error'] = "Please enter Password.";
    }
    if($toReturn['error']!='') {
        output($toReturn);
    }

    # Check Email existence in DB
    $result = $db->query("SELECT Email FROM USERS WHERE firstname='$name' AND lastname='$surname' AND email='$email'");
    if($result->rowCount() == 1){
        # Email already exists: Set error message
        $toReturn['error'] = 'You have already registered with us, please login.';
    }else{
        # Insert the new user data inside the DB
        try{
            $result = $db->query("INSERT INTO USERS (id,email,firstname,lastname,password) VALUES (NULL, '$email', '$name', '$surname', '$password')");
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

        # Success: Set session variables and redirect to Protected page
        $toReturn['result'] = $_SESSION['UserData'] = $result;
    }

    output($toReturn);
}
