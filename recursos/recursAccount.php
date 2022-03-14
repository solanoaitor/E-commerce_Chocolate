
<?php
require("/home/TDIW/tdiw-a4/public_html/controllers/account.php");
?>
<script>
    $(document).ready(function() {
        initialise();
    });
    $(document).ajaxComplete(function () {
        initialise();
    });
    function initialise(){

        $("#editInfo").click(function() {
            console.log("Edit Account");
            showInfoForm();


        });
        $("#editAcc").click(function() {
            if(validateInputs()){
                console.log("Sent form");
                var name = $("#infoForm input[name=firstname]").val();
                var adress = $("#infoForm input[name=adress]").val();
                var cp = $("#infoForm input[name=cp]").val();
                var poblacio = $("#infoForm input[name=poblacio]").val();
                var imatge = $("#infoForm input[name=profile_image]").val();

                sendNewInfo(name,adress,cp,poblacio,imatge);
            }
        });
    }
    function validateInputs(){
        var valid = true;
        return valid;
    }

    function showInfoForm(){
        $.post("controllers/accountModify.php" , function(result) {
            //Pren les dades retornades del servidor i s’incrusta a l’HTML.
            $("#accountDiv").html(result);
        });
    }
    function sendNewInfo(name,adress,cp,poblacio,profile_image){
        $.post("controllers/updateAccount.php", {name : name , adress : adress , cp : cp , poblacio : poblacio, profile_image: profile_image} , function(result) {
            //Pren les dades retornades del servidor i s’incrusta a l’HTML.
            $("#accountDiv").html(result);
            console.log(name,adress,cp,poblacio);
        });
    }
</script>
