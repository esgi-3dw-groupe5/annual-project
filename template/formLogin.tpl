<!--*************************************-->
<!--*********** LOGIN TEMPLATE **********-->
<!--*************************************-->
<div class="li_form">
    <form method="post" action="<?php print($_SESSION['url']); ?>" class="" id="li_form" name="li_form">
        <h2>Connexion</h2>
            <div class="label-input">
            	<label for="li_login">Email :</label>
            		<input id="li_login" class="text-input" type="text" name="li_login" placeholder="Email" required><br>
            		<span class="form-error" id="msgErr_gender"><?php if(!empty($li_msgErr_login))echo $li_msgErr_login ?></span>
            </div>
            <div class="label-input">
            	<label for="li_password">Mot de passe :</label>
            		<input id="li_password" class="text-input" type="password" name="li_password" placeholder="Mot de passe" required><br>
            		<span class="form-error" id="msgErr_gender"><?php if(!empty($li_msgErr_psw))echo $li_msgErr_psw ?></span>
            </div>
            <div>
                <input type="submit" name="li_submit" value="connexion">
            </div>
            <div>
                <span class="form-error" id="li_msgErr"><?php if( !empty( $li_msgErr ) ){ echo $li_msgErr; }?></span>
            </div>
    </form>
    <span>Pas de compte ? <a href="<?php echo$uri?>inscription">Incription</a><span>
</div>