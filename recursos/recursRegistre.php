<head>
    <title> Botiga </title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>
<body>
<?php
require("/home/TDIW/tdiw-a4/public_html/controllers/register.php");
?>
<script>
    $(document).ready(function() {
        $("#theButton").click(function(event) {
            event.preventDefault();
            var name = $("#registerForm input[name=firstname]").val();
            var pw = $("#registerForm input[name=password]").val();
            var email = $("#registerForm input[name=email]").val();
            var adress = $("#registerForm input[name=adress]").val();
            var cp = $("#registerForm input[name=cp]").val();
            var poblacio = $("#registerForm input[name=poblacio]").val();
            console.log("Info sent: ",name,pw,email,adress,cp,poblacio);
            if (validate()){
                sendRegistration(name,pw,email,adress,cp,poblacio);
            }
        });
    });

    function sendRegistration(name,pw,email,adress,cp,poblacio){
        $.post("controllers/insertAccount.php", {name : name, pw : pw, email : email, adress : adress, cp : cp, poblacio : poblacio} , function(result) {
            $("#registerDiv").html(result);
        });
    }
    function validate(){
        var valid = true;
        $("#registerError").html("");
        if(!$("#registerForm input[name=firstname]")[0].checkValidity()){
            $("#registerError").append("- Introdueix un nom<br>");
            valid = false;
        }
        if(!$("#registerForm input[name=password]")[0].checkValidity()){
            $("#registerError").append("- Introdueix una contrasenya<br>");
            valid = false;
        }
        if(!$("#registerForm input[name=email]")[0].checkValidity()){
            $("#registerError").append("- Introdueix una adreça de correu vàlida<br>");
            valid = false;
        }
        if(!$("#registerForm input[name=adress]")[0].checkValidity()){
            $("#registerError").append("- Introdueix una direcció<br>");
            valid = false;
        }
        if(!$("#registerForm input[name=cp]")[0].checkValidity()){
            $("#registerError").append("- Introdueix un codi postal<br>");
            valid = false;
        }
        return valid;
    }
</script>
</body>