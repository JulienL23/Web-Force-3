// Rendre actif les 2 bouttons Red et Blue
function toggleBackgroundColor (color) {
    document.body.style.backgroundColor = color;
    document.getElementById("para").style.color = "#fff";
    // crée Html dans mon JS
    var newParagraph = document.createElement("p");
    newParagraph.innerHTML = "<strong>Du texte</strong>";
    document.body.appendChild(newParagraph
    );
}

window.onload = function () {
    var blueButton = document.getElementById("btn-blue");

    blueButton.addEventListener("click", function (){
        toggleBackgroundColor ("blue");
    });
}
