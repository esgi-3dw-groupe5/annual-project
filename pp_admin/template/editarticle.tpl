<section  class="right-block">
<?php
    require_once($source."model/dbconnect.php");
?>
<form  method="post" name="at_update_form" id="at_update_form" action="<?php printf('http://127.0.0.1/annual-project/pp_admin/?article=%s&update=true' , $data['id']); ?>">
  <div class="line">
    <label for="at_title">Titre : </label>
      <input type="text" id="at_title" name="at_title" value="<?php echo $data['title'];?>" required><br>    
  </div>
  <div class="line">
    <label for="at_content">Texte : </label>
      <textarea name="at_content" id="at_content" title="<?php echo $data['content'];?>"> <?php echo $data['content']; ?> </textarea>
  </div>
  <Div class="line">Catégorie :<br/>
    <select name="at_category" id="at_category">
      <option value="">Selectionnez une catégorie</option>
      <?php
        $link = db_connect();
        $categorie = $link -> prepare("SELECT * FROM pp_page");
        $categorie -> execute();
        while($affiche = $categorie->fetch())
        {
          echo '<option value="'.$affiche['id'].'">'.$affiche['name_category'].'</option>';
        } 
      ?>
    </select>
  </div>
    <span class="form-error" id="at_msgErr"><?php if(!empty($si_msgErr_psw_1))echo $si_msgErr_psw_1; ?></span>
  <div>
    <input type="submit" name="at_update_submit" value="Modifier">
  </div>
</form>
