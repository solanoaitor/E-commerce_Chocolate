
<?php
require("/home/TDIW/tdiw-a4/public_html/controllers/cartPreview.php");
?>
<script>
    $(document).ready(function() {
        $("#cartclear").click(function() {
            console.log("Clear Petition");
            cartClear();
        });
    });

    //Esborrem el cabas de compra
    function cartClear(){
        console.log("Clear");
        $.post("controllers/cartPreviewUpdate.php", {cartop : 2} , function(result) {
            $("#divCart").html(result);
        });
    }
</script>
