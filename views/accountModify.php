<form action="index.php?accio=updateAccount" method="post" id="infoForm" enctype="multipart/form-data">
    Nom:<br>
    <input type="text" name="name" required pattern="^[a-zA-Z]+$"  <?php echo("value='{$userinfo['nom']}'"); ?> > <br>
    Direcció:<br>
    <input type="text" name="adress" required maxlength="30" pattern="^[a-zA-Z\d\-_\s]+$"  <?php echo("value='{$userinfo['direccio']}'"); ?> > <br>
    Codi Postal:<br>
    <input type="text" name="cp" required maxlength="5" pattern="^[a-zA-Z\d\-_\s]+$" <?php echo("value='{$userinfo['cp']}'"); ?> ><br>
    Població:<br>
    <input type="text" name="poblacio" required maxlength="30" <?php echo("value='{$userinfo['poblacio']}'"); ?> ><br>
    <br>
    Imatge (Obligatori):<br>
    <input type="file" name="profile_image" id="profile_image">
    <br>
    <input type="submit" id="editAccc" value="Confirma">
</form>
