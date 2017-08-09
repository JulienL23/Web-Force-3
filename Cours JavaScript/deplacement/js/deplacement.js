window.onload = function (){
    var myForm = document.getElementById("myForm");
    var left = document.getElementById("left");
    var top = document.getElementById("top");

    myForm.addEventListener("submit", function (e) {

        e.preventDefault();

    function togglePosition (position) {
        document.getElementById("left").style.left
        document.getElementById("top").style.top
    }
    });
}; 
