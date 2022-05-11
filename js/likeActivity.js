// UTILIZAMOS AJAX PARA PODER AÑADIR UN REGISTRO DE LIKE A LA BDD SIN RECARGAR LA PAGINA
// esto es una fumada wtf
// pero funciona :)

function like(act_id, user_id) {
    url = "../proc/like_activity.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            act_id: act_id,
            user_id: user_id
        },
        success: function(response) {
            var like_text = document.getElementById("act-" + act_id + "-like-bttn");
            var like_icon = document.getElementById("act-" + act_id + "-like-icon");
            console.log("RESPONSE: " + response);
            if (response) {
                //suma like
                console.log("suma like");
                like_text.innerHTML = parseInt(like_text.innerHTML) + 1;
                // like_icon.classList.add("red-icon");
            } else {
                //resta like
                console.log("resta like");
                like_text.innerHTML = parseInt(like_text.innerHTML) - 1;
                // like_icon.classList.remove("red-icon");
            }
        }
    }).done(function() {
        console.log("Success.");
    }).fail(function() {
        console.log("Failed.");
    }).always(function() {
        //console.log("Complete.");
    });
}