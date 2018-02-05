<?php

#Detect AJAX and POST request, if is empty exit
if((empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') or empty($_POST)){
    exit("Unauthorized Acces");
}

require('inc/config.php');
require('inc/functions.php');

# Check if Login form is submitted
if(!empty($_POST)){

    # Define return variable. for further details see "output" function in functions.php
    $Return = array('result'=>array(), 'error'=>'');

    $email = $_POST['Email'];
    $password = $_POST['Password'];

    /* Server side PHP input validation */
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $Return['error'] = "Please enter a valid Email address.";
    } else if($password === '') {
        $Return['error'] = "Please enter Password.";
    }
    if($Return['error']!='') {
        output($Return);
    }

    # Checking Email and Password existence in DB

    # Selecting the email address of the user with the correct login credentials.
    $query = $db->query("SELECT Email,id FROM USERS WHERE Email='$email' AND Password='$password'");
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($query->rowCount() == 1) {
        # Success: Set session variables and redirect to Protected page
        $Return['result'] = $result;
		$_SESSION['UserData'] = $result["id"];
    } else {
        # Failure: Set error message
        $Return['error'] = 'Invalid Login Credential';
    }

    output($Return);
}

if(!empty($_POST) && isset($_POST['Name']) && isset($_POST['Surname'])) {

    # Define return variable. for further details see "output" function in functions.php
    $Return = array('result'=>array(), 'error'=>'');

    $name = $_POST['Name'];
	$surname = $_POST['Surname'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    # Server side PHP input validation
    if($name === '') {
        $Return['error'] = "Please enter Full name.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $Return['error'] = "Please enter a valid Email address.";
    } else if($password === '') {
        $Return['error'] = "Please enter Password.";
    }
    if($Return['error']!='') {
        output($Return);
    }

    # Check Email existence in DB
    $result = $db->query("SELECT Email FROM USERS WHERE firstname='$name' AND lastname='$surname' AND email='$email'");
    if($result->rowCount() == 1){
        # Email already exists: Set error message
        $Return['error'] = 'You have already registered with us, please login.';
    }else{
        # Insert the new user data inside the DB
        try{
            $result = $db->query("INSERT INTO USERS (id,email,firstname,lastname,password) VALUES (NULL, '$email', '$name', '$surname', '$password')");
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

        # Success: Set session variables and redirect to Protected page
        $Return['result'] = $_SESSION['UserData'] = $result;
    }

    output($Return);
}
