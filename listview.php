<?php
    include("src/database.php");
    $db = $connect;

    //Games list
    $sql = "SELECT *
        FROM games";
    $gamelist = $db->query($sql);
    
    /*//Attempt getting content
    $sql = "SELECT f.questid, i.questid, name, inuse
        FROM (frontiers AS f, frontiers_indev AS i) 
        WHERE (f.questid = i.questid)
        ORDER BY f.questid ASC;";
    $content = $db->query($sql);

    $sql = "SELECT *
        FROM frontiers;";
    $difference = $db->query($sql);*/

    //Close connection
    mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/flex.css">
    <link rel="stylesheet" href="css/defaults.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/overwrites.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="lib/jquery-3.6.1.min.js"></script>
</head>

<body>
    <!--All main content stuff-->
    <div id="page" class="flex fCol">
        <header class="flex fRow">
            <a href="manage.php" class="fNoShrink"><h3>&#60;</h3></a>
            <h3 class="f100">List Editor</h3>
        </header>  
        <main class="flex fCol">

            <header class="overwrite__listview flex fJustifyCenter fWrap">
                <div>
                    <select name="game" class="dropdown-dark" required id="listGame">
                        <option value="none" selected disabled>Game</option>    
                        <?php
                            $rowcount = $gamelist->num_rows;

                            if ($rowcount > 0) {
                                //output data of each row
                                while($row = $gamelist->fetch_assoc()) {
                                    echo '<option value="' .$row["tablename"]. '">'.$row["title"].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <select name="options" class="dropdown-dark" required id="listOption" disabled>
                        <option value="none" selected disabled>Option</option>
                    </select>
                </div>
            </header>


            <ul id="items" class="flex f100 fWrap">
                <div class="item unset"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item unset"></div>
                <div class="item unset"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item unset"></div>
                <div class="item"></div>
                <div class="item"></div>
            </ul>

        </main>
    </div>

    <script src="js/functions.js"></script>
    <script src="js/database.js"></script>
</body>

</html>