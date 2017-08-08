// // commentaire en ligne
// /*
// commentaire sur plusieurs lignes
// */
//
// //on attend que le document soit entièrement chargé
// window.onload = function () {
//     var myForm = document.getElementById("my-form");
//
//     // on récupère les champs #number-1 et #number-2
//     var number1 = document.getElementById("number-1");
//     var number2 = document.getElementById("number-2");
//     var resultField = document.getElementById("result-field");
//
//     //on déclare la fonction calculate()
//     function calculate (){
//         // on récpère la propriété value (le contenu) des champs
//10 = je compte en décimale
//         var value1 = parseInt(number1.value, 10);
//         var value2 = parseInt(number2.value, 10);
//
//         // on additionne les deux valeurs
//         var result = value1 + value2;
//
//
//         resultField.value = result;
//
//         console.log(result);
//     }
//
//     // on exécute la fonction calculate
//     calculate();
//
//     // var calculate = function () {};
//
//     //ajout d'un écouteur sur l'élément "submit" du formulaire
//     /*myForm.onsubmit = function () {
//
//     };*/
//
//     //idem
//     myForm.addEventListener("submit", function(e) {
//         //alert("envoi du formulaire");
//
//         //bloque l'envoi du formulaire vers le serveur
//         e.preventDefault();
//
//         calculate();
//     });
// };


//_________________________________________________________

window.onload = function () {

    var myForm = document.getElementById("my-form");
    var number1 = document.getElementById("number-1");
    var number2 = document.getElementById("number-2");
    var resultField = document.getElementById("result-field");

    function calculate (value1,value2) {
        var result =(value1 + value2);

        resultField.value = result;

        console.log(result);
    }

    myForm.addEventListener("submit", function(e) {

        e.preventDefault();
        var value1 = parseInt(number1.value, 10);
        var value1 = parseInt(number1.value, 10);
        var value2 = parseInt(number2.value, 10);
        calculate(value1,value2);

        if (Number.isInteger(value1) && Number.isInteger(value2)){
            calculate(value1, value2);
        } else {
            alert("erreur")
        }

    });
};

//_________________________________________________________
