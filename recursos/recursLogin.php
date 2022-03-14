
<?php
require("/home/TDIW/tdiw-a4/public_html/controllers/login.php");
?>
<script>
    $(document).ready(function() {
        $("#loginButton").click(function(event) {
            event.preventDefault();
            var email = $("#loginForm input[name=email]").val();
            var pw = $("#loginForm input[name=password]").val();
            console.log("Info sent: ",email,pw);
            if (validateLogin()){
                console.log("Validat");
                sendLogin(email,pw);
            }
        });
    });

    function validateLogin(){
        var valid = true;
        $("#loginError").html("");
        if(!$("#loginForm input[name=email]")[0].checkValidity()){
            $("#loginError").append("Correu invàlid<br>");
            valid = false;
        }
        if(!$("#loginForm input[name=password]")[0].checkValidity()){
            $("#loginError").append("Contrasenya invàlida<br>");
            valid = false;
        }
        return valid;
    }

    function sendLogin(email,pw,){
        $.post("controllers/checkLogin.php", {email : email, pw : pw} , function(result) {
            $("#loginDiv").html(result);
        });
    }
</script>
