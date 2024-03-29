<?php
    include("database.php");
    $db = $connect;

    if(isset($_POST['tablename'])){
        $tablename = $_POST['tablename'];
        
        $fetchData = fetch_data();
        echo json_encode($fetchData);
    }else{
        echo "requested data could not be found in the database";
    }

    //Close connection
    mysqli_close($db);

    //fetch query
    function fetch_data(){
        global $db;
        global $tablename;

        $sqlterm = "N'" .$tablename. "'";

        //Options list
        $sql = "SELECT *
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_NAME = ".$sqlterm;

        $optionlist = $db->query($sql);
        $rowcount = $optionlist->num_rows;

        if($rowcount>0){
            $html="";

            //create html to be added to select box
            while($row = $optionlist->fetch_assoc()) {

                $val = $row["COLUMN_NAME"];
                $html .= "<option value=$val>$val</option>";
            }
    
            return $html;
        }else{
            return $html="";
        }

        
    }  
?>