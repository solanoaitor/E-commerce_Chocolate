<div class="fancy">
  <table>
    <?php if($uid == -1) {
      echo("Admin Mode \n");
      ?>
     <tr>
       <th>Order ID</th>
       <th>Date</th>
       <th>User ID</th>
       <th>Cost</th>
     </tr>
     <?php
     foreach($orders as $ord){ ?>
     <tr>
       <td><?php echo($ord['id']); ?></td>
       <td><?php echo($ord['data']); ?></td>
       <td><?php echo($ord['preu']); ?></td>
     </tr>
   <?php }
 }else{

   ?>
    <h2>Les meves comandes:</h2>
   <tr>
     <th>Id.comanda</th>
     <th>Data comanda</th>
     <th>Preu comanda</th>
   </tr>
   <?php
   foreach($orders as $ord){ ?>
   <tr>
     <td><?php echo($ord['id']); ?></td>
     <td><?php echo($ord['data']); ?></td>
     <td><?php echo($ord['preu']); ?> €</td>
   </tr>
 <?php } } ?>
  </table>
</div>
