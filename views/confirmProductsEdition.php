<div class="register">
<h4>
  <?php
  //Vista que confirma el registre
  if($mop == 1){
    echo("Producte amb id: $result inserted successfully");
  }else{
    echo("Product with id: $pid modified successfully");
  }

   ?>
   <br>
   Per continuar a la pagina principal,
   <a href="index.php?accio=portada">
    Fes click aqui
  </a>
</h4>
</div>
