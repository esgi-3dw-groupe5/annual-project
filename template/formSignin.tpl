<!--*************************************-->
<!--********** SIGNIN TEMPLATE **********-->
<!--*************************************-->
<?php if( !isset( $gender_male ) ){ $gender_male="checked"; }?>
<form method="POST" action="<?php print($_SESSION['url']); ?>" class="" id="si_form" name="si_form">
    <h2>Inscription</h2>
</br>
    <div>
        <input id="male" type="radio" name="gender" value="0" <?php if(!empty($gender_male))echo $gender_male ?> ><label for="male">Monsieur</label>
        <input id="female" type="radio" name="gender" value="1" <?php if(!empty($gender_female))echo $gender_female ?> ><label for="female">Madame</label>
        </br><span class="form-error" id="msgErr_gender"><?php if(!empty($si_msgErr_gender))echo $si_msgErr_gender ?></span>
    </div>
</br>
    <div>
        <label for="name">Nom </label><input id="name" type="text" name="si_name" 
        <?php if(!empty($value_name))echo "value=".$value_name."" ?> ></br>
        <span class="form-error" id="msgErr_name"><?php if(!empty($si_msgErr_name))echo $si_msgErr_name ?></span>
    </div>
</br>
    <div>
        <label for="fistname">Prenom </label><input id="fistname" type="text" name="si_fistname" 
        <?php if(!empty($value_firstname))echo "value=".$value_firstname."" ?> ></br>
        <span class="form-error" id="msgErr_fistName"><?php if(!empty($si_msgErr_fistName))echo $si_msgErr_fistName ?></span>
    </div>
</br>
    <div>
        <label for="email">Email </label><input id="email" type="email" name="si_email" 
        <?php if(!empty($value_mail_1))echo "value=".$value_mail_1."" ?> required></br>
        <span class="form-error" id="msgErr_mail_1"><?php if(!empty($si_msgErr_mail_1))echo $si_msgErr_mail_1; ?></span>
        <span class="form-error" id="msgErr_mail_2"><?php if(!empty($si_msgErr_mail_2))echo $si_msgErr_mail_2; ?></span>
    </div>
</br>
    <div>
        <label for="email_2">Confirmation </label><input id="email_2" type="email" name="si_conf_email"
             <?php if(!empty($value_mail_2))echo "value=".$value_mail_2."" ?> required></br>
        <span class="form-error" id="msgErr_mail_3"><?php if(!empty($si_msgErr_mail_3))echo $si_msgErr_mail_3; ?></span>
    </div>
</br>
    <div>
        <label for="pseudo">Pseudo </label><input id="pseudo" type="login" name="si_pseudo" 
        <?php if(!empty($value_pseudo))echo "value=".$value_pseudo."" ?> required></br>
        <span class="form-error" id="msgErr_pseudo"><?php if(!empty($si_msgErr_pseudo))echo $si_msgErr_pseudo; ?></span>
    </div>
</br>
    <div>
        <label for="password">Mot de passe </label><input id="password" type="password" name="si_psw" minlength="8" maxlength="20" required></br>
        <span class="form-error" id="msgErr_psw_1"><?php if(!empty($si_msgErr_psw_1))echo $si_msgErr_psw_1; ?></span>
    </div>
</br>
    <div>
        <label for="password_2">Confirmation </label><input id="password_2" type="password" minlength="8" maxlength="20" name="si_conf_psw" maxlength="" required></br>
        <span class="form-error" id="msgErr_psw_2"><?php if(!empty($si_msgErr_psw_2))echo $si_msgErr_psw_2; ?></span>
    </div>
</br>
    <div>
        <label for="date">Date de naissance </label>
        <div style="display:inline-block;position:relative;width:300px;">
            <input id="date" type="text" name="date" placeholder="  JJ/MM/AAAA"  
            <?php if(!empty($value_date))echo "value=".$value_date."" ?> required>
        </div></br>
        <span class="form-error" id="msgErr_date"><?php if(!empty($si_msgErr_date))echo $si_msgErr_date; ?></span>
    </div>
</br>
    <div>
        <input type="submit" name="si_submit" value="valider">
    </div>
</br>
    <span class="form-error" id="si_msgErr"><?php if( !empty( $si_msgErr ) ){ echo $si_msgErr; }?></span>
</form>