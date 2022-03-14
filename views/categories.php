<div class="categories">
  <h1>CATEGORIES</h1>
  <ul>
  <?php
  foreach($categories as $cat){
    echo "<li><a href='index.php?accio=products&cid={$cat['id']}'>{$cat['nom']}</a></li>";
  }
  ?>
  </ul>
</div>
