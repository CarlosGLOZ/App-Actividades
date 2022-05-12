function copyLink(id, link) {
    var elemento = document.getElementById(id);

    navigator.clipboard.writeText(link);
    console.log(elemento + "copied");

    elemento.style.display = "block";
    setTimeout(function() { elemento.style.display = "none"; }, 1000);
    // EL TIME OUT TIENE QUE SER AL LLAMAR UNA FUNCION EL SEGUNDO CAMPO ES MILISEGUNDOS 1SEGUNDO=1000 EN EL SET TIME OUT
    // const myTimeout = setTimeout(myGreeting, 5000);

    // function myGreeting() {
    //     document.getElementById("demo").innerHTML = "Happy Birthday!"
    //   }
    // PUEDES HACER UNA FUNCION QUE META LA CALSE SHOW Y LLAME A OTRA ESPERANDO 5000 MILISEGUNDOS QUE META LA CALSE HIDDEN

}