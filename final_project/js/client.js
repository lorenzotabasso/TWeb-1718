/*Login or Registration Form Submit*/

$(document).ready(function() {

    // AJAX request on submit
    $("#login_form").submit(function (e) {
        e.preventDefault();
        var email = document.getElementById('login_email').value;
        var password = document.getElementById('login_password').value;
        $.ajax({
            type: "POST",
            url: "submit.php",
            data: { Email: email, Password: password },
            cache: false,
            success: alert("Post effettuata con successo!"),
            complete: function(json){
                alert(json.responseText);
                window.location.href = "home.php"; // load the home.php page in the default folder
            }
        });
    });
});