<?php


# Function to get users data
/* function get_user_name($user_id) {

    # for $db variable call
    try {
        $db = new PDO("mysql=progettotweb;host=localhost", "test", "test");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # for error detection
    } catch (PDOException $exception) {
        echo "functions.php: Error with the DB, details below: ";
        $exception->getMessage();
    }

    $result = $db->query("SELECT U.Name FROM USERS U WHERE U.ID_user='$user_id' ");
    if($result->rowCount() == 1){
        return $result;
    }else{
    	return false;
    }
} */

# Function to set JSON output
function output($Return=array()){
    #header('Content-Type: application/json; charset=UTF-8');
    #exit(json_encode($Return)); # Final JSON response
    echo json_encode($Return);
}

?>
