<?php
    // include("src/database.php");
    // $db = $connect;

    // //Attempt getting content
    // $sql = "SELECT f.questid, i.questid, name, inuse
    //     FROM (frontiers AS f, frontiers_indev AS i) 
    //     WHERE (f.questid = i.questid)
    //     ORDER BY f.questid ASC;";
    // $content = $db->query($sql);

    // $sql = "SELECT *
    //     FROM frontiers;";
    // $difference = $db->query($sql);

    // //Close connection
    // mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/flex.css">
    <link rel="stylesheet" href="css/defaults.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="lib/jquery-3.6.1.min.js"></script>
</head>

<body>
    <a href="index.php"><div class="button funnytempbutton">&#60;</div></a>
    <!--All main content stuff-->
    <div id="page">
        <div id="popup" class="positive hidden"><h2></h2></div>
        <aside>

            <div class="toggle">
                <div class="arrow-left"></div>
            </div>
            <div class="container">

                <header>
                    <h2>Objectives</h2>
                </header>
                
                <section>
                    <table class="objectives selectable">
                        <tr>
                            <th>
                                Use?
                            </th>
                            <th>
                                Name
                            </th>
                        </tr>

                        
                        <?php
                            // $rowcount = $content->num_rows;
                            // $diffcount = $difference->num_rows;

                            // if ($diffcount - $rowcount != 0){
                            //     echo '
                            //         <tr class="warning">    
                            //             <td>
                            //                 !!!
                            //             </td>
                            //             <td>
                            //                 INCOMPLETE INDEV DB
                            //             </td>
                            //         </tr>
                            //     ';
                            // }

                            // if ($rowcount > 0) {
                            //     //output data of each row
                            //     while($row = $content->fetch_assoc()) {
                            //         echo '<tr>    
                            //         <td>';

                            //         if ($row["inuse"] == 0){
                            //             echo '<input type="checkbox" name="name" onclick="return false;">';
                            //         }else{
                            //             echo '<input type="checkbox" name="name" onclick="return false;" checked="checked">';
                            //         }

                            //         echo'
                            //         </td>
                            //         <td>
                            //             <button value=' .$row["questid"]. ' class="entry">' .$row["name"]. '</button>
                            //         </td>
                            //     </tr>';
                            //     }
                            // }
                        ?>
                    </table>

                </section>  
                
                <footer>
                    <div class="button button-toggleAdd">
                        <img src="img/btnAdd.png" alt="+">
                    </div>
                    <a href="listview.php">
                        <div class="button">
                            <img src="img/btnList.png" alt="List">
                        </div>
                    </a>
                </footer>
            </div>
            
        </aside>
        
        <div class="sidefill"></div>
        <div class="disable"></div>

        <main class="flex fCol">
            <header>
                <h3>Edit View</h3>
            </header>        

            <section class="lightarea">
                    
                    <!--ID, name and description-->
                <div class="flex-col-left">
                    <h3>General Information</h3>
                    <div class="flex">
                        <div class="flex fCol">
                            <h4>ID:</h4>
                            <input type="text" name="id" required id="dbID" readonly>
                        </div>
                        <div class="flex fCol">
                            <h4>Name:</h4>
                            <input type="text" name="name" required id="dbName" maxlength="50">
                        </div>
                    </div>
                    <div class="flex fCol">
                        <h4>Description:</h4>
                        <textarea name="description" cols="40" rows="2" required id="dbDescription" maxlength="200"></textarea>
                    </div>
                </div>

                <hr>

                <!--Area of challenge-->
                <div class="flex fCol">
                    <h3>Area of Challenge</h3>
                    <div class="flex fRow">
                        <div class="fCol">
                            <h4>Level:</h4>
                            <select name="level" class="dropdown-dark" required id="dbLevel">
                                <option value="0">All Islands</option>
                                <option value="1">Chronos Island</option>
                                <option value="2">Ares Island</option>
                                <option value="3">Island 3</option>
                                <option value="4">Island 4</option>
                                <option value="5">Island 5</option>
                            </select>
                        </div>
                        <div class="fCol">
                            <h4>Location:</h4>
                            <select name="location" class="dropdown-dark" required id="dbLocation">
                                <option value="0">Anywhere</option>
                                <option value="1">Open Zone</option>
                                <option value="2">Cyber Space</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr>

                <!--Properties-->
                <div class="flex fCol">
                    <h3>Properties</h3>
                    <div class="flex fRow">
                        <div class="flex fCol wideboi">
                            <h4>Hard:</h4>
                            <input type="checkbox" name="hard" id="dbHard">
                        </div>
                        <div class="flex fCol wideboi">
                            <h4>Boss:</h4>
                            <input type="checkbox" name="boss" id="dbBoss">
                        </div>
                        <div class="flex fCol wideboi">
                            <h4>Glitch:</h4>
                            <input type="checkbox" name="glitch" id="dbGlitch">

                        </div>
                    </div>
                </div>

                <hr>

                <!--Actions-->
                <div class="flex fCol">
                    <h3>Actions</h3>
                    <div class="flex fRow">
                        <div class="flex fRow fAlignCenter fJustifyCenter wideboi">
                            <h4 class="flex wideboi">Confirm:</h4>
                            <div class="button submit" id="btnUpdate">
                                <img src="img/btnConfirm.png" alt="V">
                            </div>
                        </div>
                        <div class="flex fRow fAlignCenter fJustifyCenter wideboi">
                            <h4 class="flex wideboi">Refresh:</h4>
                            <div class="button submit" id="btnRefresh">
                                <img src="img/btnRefresh.png" alt="V">
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </main>
    </div>
    


    <!--Overlay for adding new items-->
    <div class="overlay hidden" id="menu-add">
        <div class="button button-close" >
            <img src="img/btnClose.png" alt="X">
        </div>
        <section class="menu">
            <header>
                <h2>Add new objectives</h2>
            </header>
            
            <form>
                <div class="tabs">

                    <div class="tab current">
                        ?
                    </div>

                </div>

                <table class="addition">
                    <tr>
                        <td>
                            Name
                        </td>
                        <td>
                            <input type="text" name="name" required id="addName" maxlength="50">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Description
                        </td>
                        <td>
                            <textarea name="description" cols="40" rows="2" required id="addDescription" maxlength="200"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Level
                        </td>
                        <td>
                            <select name="level" class="dropdown-light" required id="addLevel">
                                <option value="none" selected disabled>---</option>    
                                <option value="0">All Islands</option>
                                <option value="1">Chronos Island</option>
                                <option value="2">Ares Island</option>
                                <option value="3">Island 3</option>
                                <option value="4">Island 4</option>
                                <option value="5">Island 5</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Location
                        </td>
                        <td>
                        <select name="location" class="dropdown-light" required id="addLocation">
                            <option value="none" selected disabled>---</option>    
                            <option value="0">Anywhere</option>
                            <option value="1">Open Zone</option>
                            <option value="2">Cyber Space</option>
                        </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Hard
                        </td>
                        <td>
                            <input type="checkbox" name="hard" id="addHard">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Boss
                        </td>
                        <td>
                            <input type="checkbox" name="boss" id="addBoss">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Glitch
                        </td>
                        <td>
                            <input type="checkbox" name="glitch" id="addGlitch">
                        </td>
                    </tr>

                </table>

                <div class="options">
                    <div class="button submit">
                        <img src="img/btnConfirm.png" alt="V">
                    </div>
                </div>

            </form>
        </section>
    </div>

    <script src="js/functions.js"></script>
    <script src="js/database.js"></script>
</body>

</html>