<?php //Vista del menu de categories ?>
<nav class="categoryMenu" id="dynamicMenu">
    <ul>
        <li><a class="ctarget" data-custom-value="-1" href='#'>Mostrar tot</a>
            <?php foreach($categories as $cat){ ?>
        <li><?php echo "<a class='ctarget' data-custom-value={$cat['id']} href='#'>{$cat['nom']}</a>"; ?></li>
        <?php } ?>

    </ul>

</nav>