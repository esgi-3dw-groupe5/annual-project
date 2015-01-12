<!--*************************************-->
<!--*********** LOGIN TEMPLATE **********-->
<!--*************************************-->
<span class="form-error" id="li_msgErr"><?php if( !empty( $li_msgErr ) ){ echo $li_msgErr; }?></span>
<form method="post" action="http://127.0.0.1/annual-project/" class="" id="li_form" name="li_form">
    <h1>Connexion</h1>
    <div>
    	<label for="li_login">Login : </label>
    		<input id="li_login" type="text" name="li_login" required><br>
    		<span class="form-error" id="msgErr_gender"><?php if(!empty($li_msgErr_login))echo $li_msgErr_login ?></span>
    </div>
</br>
    <div>
    	<label for="li_password">Password : </label>
    		<input id="li_password" type="password" name="li_password" required><br>
    		<span class="form-error" id="msgErr_gender"><?php if(!empty($li_msgErr_psw))echo $li_msgErr_psw ?></span>
    </div>
</br>
    <input type="submit" name="li_submit" value="Connexion">
</form>