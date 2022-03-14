<head>
    <title> Botiga </title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>
<body>
<?php
require("/home/TDIW/tdiw-a4/public_html/controllers/cart.php");
?>
<script>
    $(document).ready(function() {
        $("#order").click(function() {
            console.log("Order placed");
            sendOrder();
        });
        $("#esborrar").click(function() {
            console.log("Order placed delete");
            $("#cartDiv").hide();
            cartClear();
        });
    });

    //Enviem comanda a la bd i, seguidament, esborrem cabas de compra
    function sendOrder(){
        $.post("controllers/placeOrder.php", function(result) {
            //Pren les dades retornades del servidor i s’incrusta a l’HTML.
            $("#cartDiv").html(result);
            cartClear();
        });
    }

    //Esborrem el cabas de compra
    function cartClear(){
        console.log("Clear");
        $.post("controllers/cartPreviewUpdate.php", {cartop : 2} , function(result) {
            //Pren les dades retornades del servidor i s’incrusta a l’HTML.
            $("#divCart").html(result);
        });
    }
</script>
</body>