//Function for toggling menu for adding new entries
function toggleAddMenu(e){
    $("#menu-add").toggleClass("hidden");
    $("#menu-add").toggleClass("show");
    $("#menu-add>.menu").toggleClass("anim-appear1");
}

$(".button-toggleAdd").on("click", function() {
    toggleAddMenu();
})

$(".button-close").on("click", function() {
    location.reload();
})

//Function for folding side menu
function foldSide(){
    $("#page>aside>.container").toggleClass("fold");
    $("#page>.sidefill").toggleClass("fold");
    $("#page>aside>.toggle>div").toggleClass("arrow-left");
    $("#page>aside>.toggle>div").toggleClass("arrow-right");
}

$("#page>aside>.toggle").on("click", function() {
    foldSide();
})
