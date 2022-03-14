
<div id="productEditor">
  <div class="fancy">
  <table>
       <tr>
         <th>Product ID</th>
         <th>Name</th>
         <th>Category</th>
         <th>Short Desc</th>
         <th>Long Desc</th>
         <th>Price</th>
       </tr>
       <?php
       foreach($products as $prod){ ?>
       <tr>
         <td><?php echo($prod['ID']); ?></td>
         <td><?php echo($prod['Nombre']); ?></td>
         <td><?php echo($prod['Precio']); ?></td>
         <td><?php echo($prod['Descripción']); ?></td>
         <td><?php //echo($prod[3]); ?></td>
         <td><?php //echo($prod[4]); ?></td>
         <td><?php echo("<button type='button' class='editbutton' value='{$prod['ID']}'>Edit</button>"); ?></td>
       </tr>
     <?php } ?>
    </table>
    <button type='button' id='insertproduct' value='#'>Add Product</button>
</div>
</div>
