<head>
    <title> Botiga </title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>
<body>
<?php
require("/home/TDIW/tdiw-a4/public_html/controllers/productsList.php");
?>
<script>
    $(document).ready(function() {
        initialise();
    });
    $(document).ajaxComplete(function () {
        initialise();
    });

    function initialise(){
        $(".editbutton").click(function() {
            var pid = $(this).val();
            console.log("Edit Product");
            editProduct(pid);
        });

        $("#insertproduct").click(function() {
            console.log("Insert Product");
            insertProduct();
        });

        $("#editForm").on("submit", function(event) {
            event.preventDefault();
            var name = $("#editForm input[name=name]").val();


            if (validateProduct()){
                var name = $("#editForm input[name=name]").val();
                var cat = $("#editForm select[name=cat]").val();
                var shortdesc = $("#editForm input[name=shortdesc]").val();
                var price = $("#editForm input[name=price]").val();
                var formesito = new FormData(this);
                sendProduct(formesito);

            }else{
                console.log("invalid");
            }
        });

    }
    function insertProduct(){
        $.post("controllers/productModify.php", {mop : 1} , function(result) {
            $("#productEditor").html(result);
        });
        console.log("Try Insert");
    }
    function editProduct(pid){
        $.post("controllers/productModify.php", {mop : 2, pid : pid} , function(result) {
            $("#productEditor").html(result);
        });
        console.log("Try Mod");
    }

    function validateProduct(){
        var valid = true;
        return valid;
    }

    function sendProduct(formesito){
        $.ajax({
            url: "controllers/insertProduct.php",
            type: 'POST',
            data: formesito,
            success: function (data) {
                $("#productEditor").html(data);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }

</script>
</body>