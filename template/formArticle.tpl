<!--*************************************-->
<!--********** ARTICLE TEMPLATE *********-->
<!--*************************************-->

<form action="articleController.php" method="post" name="at_form" id="at_form">
  <div>
    <label for="at_title">Titre : </label>
      <input type="text" id="at_title" name="at_title" required><br>    
  </div>
  <div>
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
        {
          echo '<option value="'.$affiche['id'].'">'.$affiche['name_categ'].'</option>';
        } 
      ?>
    </select>
  </p>
  <div>
    <input type="submit" name="at_submit" value="Validation">
  </div>
</form>
