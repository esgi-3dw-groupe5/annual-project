<!--*************************************-->
<!--*********** LOGIN TEMPLATE **********-->
<!--*************************************-->
<form method="post" action="<?php print($_SESSION['url']); ?>" class="" id="li_form" name="li_form">
    </br>
        <div>
        	<label class="li_form" for="li_login">Email : </label>
        		<input id="li_login" type="text" name="li_login" required><br>
        		<span class="form-error" id="msgErr_gender"><?php if(!empty($li_msgErr_login))echo $li_msgErr_login ?></span>
        </div>
    </br>
        <div>
        	<label class="li_form" for="li_password">Password : </label>
        		<input id="li_password" type="password" name="li_password" required><br>
        		<span class="form-error" id="msgErr_gender"><?php if(!empty($li_msgErr_psw))echo $li_msgErr_psw ?></span>
        </div>
    </br>
        <input type="submit" name="li_submit" value="connexion">
    </br>
        <span class="form-error" id="li_msgErr"><?php if( !empty( $li_msgErr ) ){ echo $li_msgErr; }?></span>
    </br>
        <span>
            Pas  de compte ?</br>
            <a href="" >Inscription</a>
        </span>
</form>