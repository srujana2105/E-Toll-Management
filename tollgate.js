function show(id){
    document.getElementById(id).style.display = "block";
}
function hide(id){
    document.getElementById(id).style.display = "none";
}
document.getElementById("btn1").onclick =
    function () 
{
    //window.alert("hai");
    show("operatoropen");
    hide("useropen");
    hide("usersignup");
    //hide("operatorsignup");
    
    }

document.getElementById("btn2").onclick =
    function ()
{
    show("useropen");
    hide("operatoropen");
    hide("usersignup");
    //hide("operatorsignup");
}
/*document.getElementById("span1").onclick =
    function () {
    show("operatorsignup");
    hide("useropen");
    hide("usersignup");
    hide("operatoropen");
}*/

document.getElementById("here").onclick =
    function () {
    show("usersignup");
    hide("useropen");
    hide("operatoropen");
   // hide("operatorsignup");
}
document.getElementById("curr_pass").onclick =
    function () {
    window.alert("passes");
    show("current_passes");
}
s