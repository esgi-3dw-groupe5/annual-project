<!--*************************************-->
<!--********** ARTICLE TEMPLATE *********-->
<!--*************************************-->
<?php
    require_once(__ROOT__."/model/dbconnect.php");
?>
<form action="http://127.0.0.1/annual-project/" method="post" name="at_form" id="at_form">
  <div>
    <label for="at_title">Titre : </label>
      <input type="text" id="at_title" name="at_title" required><br>    
  </div>
  <div>
    <label for="at_content">Texte : </label>
      <textarea name="at_content" id="at_content" required></textarea>
  </div>
  <p>Catégorie :<br/>
    <select name="at_category" id="at_category">
      <option value="">Selectionnez une catégorie</option>
      <?php
        $link = db_connect();
        $categorie = db_get_category($link);
        while($affiche = $categorie->fetch())
        {
          echo '<option value="'.$affiche['id'].'">'.$affiche['name_categ'].'</option>';
        } 
      ?>
    </select>
  </p>
    <span class="form-error" id="at_msgErr"><?php if(!empty($si_msgErr_psw_1))echo $si_msgErr_psw_1; ?></span>
  <div>
    <input type="submit" name="at_submit" value="envoyer">
  </div>
</form>
