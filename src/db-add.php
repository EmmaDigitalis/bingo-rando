<?php
//Establish connection
include("database.php");
$db = $connect;

if(isset($_POST['eName']) && isset($_POST['eDescription']) && isset($_POST['eLevel']) && isset($_POST['eLocation'])){
    //Variables
    $eName = $_POST['eName'];
    $eDescription = $_POST['eDescription'];
    $eLevel = $_POST['eLevel'];
    $eHard = $_POST['eHard'];
    $eBoss = $_POST['eBoss'];
    $eGlitch = $_POST['eGlitch'];
    $eLocation = $_POST['eLocation'];
    
    $sql = "INSERT INTO frontiers (gameid, questid, name, description, level, hard, glitch, boss, location) VALUES (1, DEFAULT, '$eName', '$eDescription', $eLevel, $eHard, $eGlitch, $eBoss, $eLocation);";
    $sql .= "INSERT INTO frontiers_indev (questid, inuse) VALUES (LAST_INSERT_ID(), true);";

    if (mysqli_multi_query($db, $sql)) {
        echo json_encode(array("statusCode"=>200));
    }else{
		echo json_encode(array("statusCode"=>201));
    }
}else{
    echo "form somehow not entirely filled out";
}

//Close connection
mysqli_close($db);
?>
 