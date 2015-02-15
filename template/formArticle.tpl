<!--*************************************-->
<!--********** ARTICLE TEMPLATE *********-->
<!--*************************************-->
<?php
    require_once($source."model/dbconnect.php");
?>
<form action="http://127.0.0.1/annual-project/" method="post" name="at_form" id="at_form" enctype= "multipart/form-data">
      <span class="form-error" id="at_msgErr"><?php if(!empty($at_msgErr))echo $at_msgErr; ?></span>
      <span class="form-error" id="at_msgErr_image"><?php if(!empty($at_msgErr_image))echo $at_msgErr_image; ?></span>
      <span class="form-error" id="at_msgErr_image1"><?php if(!empty($at_msgErr_image1))echo $at_msgErr_image1; ?></span>
  <div>
    <label for="at_title">Titre : </label>

      <input type="text" id="at_title" name="at_title"><br>    

  </div>
  <div>
    <label for="at_image">Image de présentation : </label>
    <input type="hidden" name="MAX_FILE_SIZE" value="99999999999999999" />
    <input type="file" id="at_image" name="at_image"><br>
  </div>
  <div>
    <label for="at_content">Texte : </label>
      <textarea name="at_content" id="at_content"></textarea>
  </div>
  <p>Catégorie :<br/>
    <select name="at_category" id="at_category">
      <option value="">Selectionnez une catégorie</option>
      <?php
        $link = db_connect();
        $categorie = $link -> prepare("SELECT * FROM pp_category");
        $categorie -> execute();
        while($affiche = $categorie->fetch())
        {
          echo '<option value="'.$affiche['id'].'">'.$affiche['name_category'].'</option>';
        } 
      ?>
    </select>
  </p>

  <div>
    <input type="submit" name="at_submit" value="envoyer">
  </div>
</form>
