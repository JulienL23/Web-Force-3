var i = 0;

i = 1 + 1; // i = 1
i += 1; // i = 2
i++; // i = 3

i += 2; // i = 5

i = i - 1; // 4
i -= 1; // 3
i --; // 2

i *= 2; // 4
i /= 2; // 2

i %= 2; // 0

/*
Tant que la condition renvoie TRUE la boucle va continuer jusqu'a ce que la condition renvoie FALSE

 while (condition) {

 }
*/
// Exemple
var j = 0;
while (j < 10) {// tant que j est inférieur à 10
    j++; // j'incrémente j de 1
}

for (i = 0; i < 10; i++){

}

//Array
var myArr = ["chat", "chien", "loutre", "poney"];
for (item in myArr) { // pour chaque entrée dans le tableau
    alert(item);
}


//Object
var myObject = {"nom" : "Ledoux", "prenom" : "Julien"};
for (property in myObject) { //Pour chaque propriété de l'objet
    alert(property);// affiche le nom de la propriété
    alert(myObject[property]);//affiche la valeur de la propriété
}

for (i = 0; i <myArr.length; i++){// pour chaque entrée dans le tableau myArr
    alert(myArr[i]);
}

var word = "pomme";
switch (word) { // on teste la valeur de word
    case "banane" : // if (word == "banane")
    break;

    case "pomme" : // else if (word == "pomme")

    break; // L'instruction break permet de terminer la boucle en cours ou l'instruction switch ou label en cours et de passer le contrôle du programme à l'instruction suivant l'instruction terminée.

    default : //cas par défaut (else)
    break;
}
