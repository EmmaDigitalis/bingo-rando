//Show the selected entry upon clicking on it
function dbPreview(entryValue) {
    $.ajax({
        type: "POST",
        url: "../src/db-display.php",
        data: {
            entryID: entryValue
        },
        dataType: "JSON",
        success: function (data) {
            /* If succesful: get database info as JSON object */
            displayPreview(data);
            //$.getJSON(data, displayPreview(jd));
        },
        error: function () {
            /* If php does not work: kick a generic error */
            alert("Somehow couldn't get data from database")
        }
    });


    //function for showing entry
    function displayPreview(data) {
        let jsonResults = data;
        
        $("#dbID").val(jsonResults[0].id);
        $("#dbName").val(jsonResults[0].name);
        $("#dbDescription").val(jsonResults[0].description);
        $("#dbLevel").val(jsonResults[0].level);
        $("#dbHard").prop('checked', parseInt(jsonResults[0].hard));
        $("#dbBoss").prop('checked', parseInt(jsonResults[0].boss));
        $("#dbGlitch").prop('checked', parseInt(jsonResults[0].glitch));
        $("#dbLocation").val(jsonResults[0].location);

        $("#page>.disable").removeClass("disable");
    }
}

$("button.entry").on("click", function () {
    dbPreview($(this).val());
})




//Add new entry to database
function dbAdd() {
    var vName = $("#addName").val();
    var vDescription = $("#addDescription").val();
    var vLevel = parseInt($("#addLevel").val());
    var vHard = $("#addHard").prop("checked");
    var vBoss = $("#addBoss").prop("checked");
    var vGlitch = $("#addGlitch").prop("checked");
    var vLocation = parseInt($("#addLocation").val());

    if ((vName != "") && (vDescription != "") && (vLevel != "none") && (vLocation != "none")){
        $.ajax({
            type: "POST",
            url: "../src/db-add.php",
            data: {
                eName: vName,
                eDescription: vDescription,
                eLevel: vLevel,
                eHard: vHard,
                eBoss: vBoss,
                eGlitch: vGlitch,
                eLocation: vLocation
            },
            cache: false,
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    alert("upload succesful");
                }
                else if(dataResult.statusCode==201){
                    alert("Error occured!");
                }
            },
            error: function () {
                /* If php does not work: kick a generic error */
                alert("Somehow couldn't get data from database")
            }
        });
    }else{
        alert("form not filled out");
        
    }
}

$("#menu-add>section>form>.options>.submit").on("click", function() {
    dbAdd();
})




//Update entry in database
function dbUpdate() {
    var vID = $("#dbID").val();
    var vName = $("#dbName").val();
    var vDescription = $("#dbDescription").val();
    var vLevel = parseInt($("#dbLevel").val());
    var vLocation = parseInt($("#dbLocation").val());
    var vBoss = +$("#dbBoss").prop("checked");
    var vHard = +$("#dbHard").prop("checked");
    var vGlitch = +$("#dbGlitch").prop("checked");

    if ((vName != "") && (vDescription != "")){
        $.ajax({
            type: "POST",
            url: "../src/db-update.php",
            data: {
                eID: vID,
                eName: vName,
                eDescription: vDescription,
                eLevel: vLevel,
                eHard: vHard,
                eGlitch: vGlitch,
                eBoss: vBoss,
                eLocation: vLocation
            },
            cache: false,
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    alert("upload succesful");
                }
                else if(dataResult.statusCode==201){
                    alert("Error occured!");
                }
                else if(dataResult.statusCode==202){
                    alert("form somehow not entirely filled out");
                }
            },
            error: function () {
                /* If php does not work: kick a generic error */
                alert("Somehow couldn't get data from database")
            }
        });
    }else{
        alert("form not filled out");
    }
}


$("#btnUpdate").on("click", function() {
    dbUpdate();
})



//Show option list
function updateOptions() {
    var table = $("#listGame").val();

    if (table != "UNSET"){
        $.ajax({
            type: "POST",
            url: "../src/db-optionlist.php",
            data: {
                tablename: table
            },
            cache: false,
            success: function (dataResult) {
                //var data = JSON.parse(dataResult);
                data = dataResult.replaceAll("\\", "");

                console.log(data);
                $("#listOption").prop("disabled", false);
                $("#listOption").html(
                    "<option value='none' selected disabled>Option</option>" + data
                );
                

            },
            error: function () {
                /* If php does not work: kick a generic error */
                alert("Somehow couldn't get column names from database")
            }
        });
    }else{
        alert("DATABASE DOES NOT EXIST");
        $("#listOption").prop("disabled", true);
                $("#listOption").html(
                    "<option value='none' selected disabled>Option</option>"
                );
    }
}

$("#listGame").on("change", function() {
    updateOptions();
})


//Show quest list
function showList() {
    var table = $("#listGame").val();

    if (table != "UNSET"){
        $.ajax({
            type: "POST",
            url: "../src/db-optionlist.php",
            data: {
                tablename: table
            },
            cache: false,
            success: function (dataResult) {
                //var data = JSON.parse(dataResult);
                data = dataResult.replaceAll("\\", "");

                console.log(data);
                $("#listOption").prop("disabled", false);
                $("#listOption").html(
                    "<option value='none' selected disabled>Option</option>" + data
                );
                

            },
            error: function () {
                /* If php does not work: kick a generic error */
                alert("Somehow couldn't get column names from database")
            }
        });
    }else{
        alert("DATABASE DOES NOT EXIST");
        $("#listOption").prop("disabled", true);
                $("#listOption").html(
                    "<option value='none' selected disabled>Option</option>"
                );
    }
}

$("#listOption").on("change", function() {
    showList();
})