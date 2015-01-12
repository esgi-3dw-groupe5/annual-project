<!--*************************************-->
<!--********** ARTICLE TEMPLATE *********-->
<!--*************************************-->
<<<<<<< HEAD
<?php
    require_once(__ROOT__."/model/dbconnect.php");
?>
<form action="http://127.0.0.1/annual-project/" method="post" name="at_form" id="at_form">
=======

<form action="articleController.php" method="post" name="at_form" id="at_form">
>>>>>>> origin/AlexisWorkSpace
  <div>
    <label for="at_title">Titre : </label>
      <input type="text" id="at_title" name="at_title" required><br>    
  </div>
  <div>
<<<<<<< HEAD
    <label for="at_content">Texte : </label>
      <textarea name="at_content" id="at_content"></textarea>
  </div>
  <p>Catégorie :<br/>
    <select name="at_category" id="at_category">
      <option value="">Selectionnez une catégorie</option>
      <?php
        $link = db_connect();
        $categorie = $link -> prepare("SELECT * FROM pp_categorie");
        $categorie -> execute();
        while($affiche = $categorie->fetch())
=======
    <label for="at_text">Texte : </label>
      <textarea name="at_text" id="at_text"></textarea>
  </div>
  <p>Catégorie :<br/>
    <select name="cat">
      <option value="">Selectionnez une catégorie</option>
      <?php
        require_once(__ROOT__."/model/dbconnect.php");
        $categorie = $link -> prepare("SELECT * FROM pp_categorie");
        $categorie = execute();
        while($affiche = $categorie->fetch(PDO::FETCH_ASSOC))
>>>>>>> origin/AlexisWorkSpace
        {
          echo '<option value="'.$affiche['id'].'">'.$affiche['name_categ'].'</option>';
        } 
      ?>
    </select>
  </p>
<<<<<<< HEAD
    <span class="form-error" id="at_msgErr"><?php if(!empty($si_msgErr_psw_1))echo $si_msgErr_psw_1; ?></span>
  <div>
    <input type="submit" name="at_submit" value="Envoyer">
=======
  <div>
    <input type="submit" name="at_submit" value="Validation">
>>>>>>> origin/AlexisWorkSpace
  </div>
</form>
