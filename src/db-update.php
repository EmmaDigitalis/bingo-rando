<?php
    //Establish connection
    include("database.php");
    $db = $connect;

    if(isset($_POST['eID']) && isset($_POST['eName']) && isset($_POST['eDescription'])){ 
        //Variables
        $eID = $_POST['eID'];
        $eName = $_POST['eName'];
        $eDescription = $_POST['eDescription'];
        $eLevel = $_POST['eLevel'];
        $eHard = $_POST['eHard'];
        $eBoss = $_POST['eBoss'];
        $eGlitch = $_POST['eGlitch'];
        $eLocation = $_POST['eLocation'];
    

        $sql = "
        UPDATE frontiers
        SET name = '$eName', description = '$eDescription', level = '$eLevel', location = '$eLocation', hard = '$eHard', glitch = '$eGlitch', boss = '$eBoss' 
        WHERE questid = '$eID'
        ";
        
        if (mysqli_query($db, $sql)) {
            echo json_encode(array("statusCode"=>200));
        }else{
            echo json_encode(array("statusCode"=>201));
        }
    }else{
        echo json_encode(array("statusCode"=>202));
    }

    //Close connection
    mysqli_close($db);
?>