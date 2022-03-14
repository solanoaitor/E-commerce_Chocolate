
<?php
require("/home/TDIW/tdiw-a4/public_html/controllers/productsPage.php");
?>
<script>
$(document).ready(function() {
    initialise();
    $(".ctarget").click(function() {
        var cvalue = $(this).data("custom-value");
        var search = 0;
        if(cvalue == -2){
            search = $("#search").val();
            console.log("serch",search);
        }
        console.log("Categoria",cvalue);
        loadProducts(cvalue,search);
    });
});
$(document).ajaxComplete(function () {
    initialise();
});

//Calculem el total del cabas
function initialise(){
    $(".ptarget").click(function() {
        var pvalue = $(this).data("custom-value");
        console.log("Producte",pvalue);
        loadProduct(pvalue);
    });
    $(".cartbutton").click(function() {
        var quantitat = $("#idForm input[name=quantitat]").val();
        var cartid = parseInt($(this).val());
        var price = parseInt($(this).data("custom-value"));
        var total = price * quantitat;
        console.log("Carrito",cartid);
        loadProducts(-1);
        cartAdd(cartid,total,quantitat);
    });
}

function loadProducts(catid,search){
    getCat = catid;
    $.post("controllers/filterProducts.php", {cid : getCat, word : search} , function(result) {
        $("#prod").html(result);
    });
}

function loadProduct(prodid){
    getProd = prodid;
    $.post("controllers/showProduct.php", {pid : getProd} , function(result) {
        $("#prod").html(result);
    });
}

//Afegim els productes a la pagina del cabas
function cartAdd(cartid,price,quantitat){
    console.log("Afegeix",cartid,price);
    $.post("controllers/cartPreviewUpdate.php", {cartop : 1,pid: cartid,price : price,quantitat:quantitat } , function(result) {
        $("#divCart").html(result);
    });
}

</script>
