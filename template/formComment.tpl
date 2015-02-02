<!--*************************************-->
<!--********** COMMENT TEMPLATE *********-->
<!--*************************************-->

<form action="<?php print($_SESSION['url']); ?>" method="post" name="co_form" id="co_form">
  <div>
    <label for="co_content">Commentaire : </label>
      <textarea name="co_content" id="co_content"></textarea>  
  </div>
    <input type="submit" name="co_submit" value="Commenter">
  </div>
</form>
