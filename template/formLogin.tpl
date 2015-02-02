<!--*************************************-->
<!--*********** LOGIN TEMPLATE **********-->
<!--*************************************-->
<span class="form-error" id="li_msgErr"><?php if( !empty( $li_msgErr ) ){ echo $li_msgErr; }?></span>
<form method="post" action="<?php print($_SESSION['url']); ?>" class="" id="li_form" name="li_form">
    <div>
    	<label for="li_login">Login : </label>
    		<input id="li_login" type="text" name="li_login" required><br>
    		<span class="form-error" id="msgErr_gender"><?php if(!empty($li_msgErr_login))echo $li_msgErr_login ?></span>
    </div>
    <div>
    	<label for="li_password">Password : </label>
    		<input id="li_password" type="password" name="li_password" required><br>
    		<span class="form-error" id="msgErr_gender"><?php if(!empty($li_msgErr_psw))echo $li_msgErr_psw ?></span>
    </div>

    <input type="submit" name="li_submit" value="connexion">
</form>