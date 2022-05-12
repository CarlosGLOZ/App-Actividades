function copyLink(id, link) {
    var elemento = document.getElementById(id);

    navigator.clipboard.writeText(link);
    console.log(elemento + "copied");

    elemento.style.display = "block";
    setTimeout(function() { elemento.style.display = "none"; }, 1000);


}