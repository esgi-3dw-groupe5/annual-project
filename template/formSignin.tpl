<!--*************************************-->
<!--********** SIGNIN TEMPLATE **********-->
<!--*************************************-->
<div class="content">
<?php if( !isset( $gender_male ) ){ $gender_male="checked"; }?>
<form class="si_form" method="POST" action="<?php print($_SESSION['url']); ?>" class="" id="si_form" name="si_form">
    <h2>S'inscrire</h2>
    <div>
        <input id="male" type="radio" name="gender" value="0" <?php if(!empty($gender_male))echo $gender_male ?> ><label for="male">Monsieur</label>
        <input id="female" type="radio" name="gender" value="1" <?php if(!empty($gender_female))echo $gender_female ?> ><label for="female">Madame</label>
        </br><span class="form-error" id="msgErr_gender"><?php if(!empty($si_msgErr_gender))echo $si_msgErr_gender ?></span>
    </div>
    <div class="si-label-input">
        <div class='form-left'>
            <label for="name">Nom </label>
        </div>
        <div class='form-right'>
            <input id="name" type="text" class="text-input" name="si_name" 
            <?php if(!empty($value_name))echo "value=".$value_name."" ?> placeholder="Nom">
        </div>
        <span class="form-error" id="msgErr_name"><?php if(!empty($si_msgErr_name))echo $si_msgErr_name ?></span>
    </div>
    <div class="si-label-input">
        <div class='form-left'><label for="fistname">Prenom </label></div>
        <div class='form-right'><input id="fistname" class="text-input" type="text" name="si_fistname" 
        <?php if(!empty($value_firstname))echo "value=".$value_firstname."" ?> placeholder="Prenom">
        <span class="form-error" id="msgErr_fistName"><?php if(!empty($si_msgErr_fistName))echo $si_msgErr_fistName ?></span>
    </div></div>
    <div class="si-label-input">
        <div class='form-left'><label for="email">Email </label></div>
        <div class='form-right'><input id="email" type="email" class="text-input" name="si_email" 
        <?php if(!empty($value_mail_1))echo "value=".$value_mail_1."" ?> placeholder="Email" required></div>
        <span class="form-error" id="msgErr_mail_1"><?php if(!empty($si_msgErr_mail_1))echo $si_msgErr_mail_1; ?></span>
        <span class="form-error" id="msgErr_mail_2"><?php if(!empty($si_msgErr_mail_2))echo $si_msgErr_mail_2; ?></span>
    </div>
    <div class="si-label-input">
        <div class='form-left'><label for="email_2">Confirmation </label></div>
        <div class='form-right'><input id="email_2" class="text-input" type="email" name="si_conf_email"
             <?php if(!empty($value_mail_2))echo "value=".$value_mail_2."" ?> placeholder="Email" required></div>
        <span class="form-error" id="msgErr_mail_3"><?php if(!empty($si_msgErr_mail_3))echo $si_msgErr_mail_3; ?></span>
    </div>
    <div class="si-label-input">
        <div class='form-left'><label for="pseudo">Pseudo </label></div>
        <div class='form-right'><input id="pseudo" class="text-input" type="login" name="si_pseudo" 
        <?php if(!empty($value_pseudo))echo "value=".$value_pseudo."" ?> placeholder="Pseudo" required></div>
        <span class="form-error" id="msgErr_pseudo"><?php if(!empty($si_msgErr_pseudo))echo $si_msgErr_pseudo; ?></span>
    </div>
    <div class="si-label-input">
        <div class='form-left'><label for="password">Mot de passe </label></div>
        <div class='form-right'><input id="password" class="text-input" type="password" name="si_psw" minlength="8" maxlength="20" placeholder="Mot de passe" required></div>
        <span class="form-error" id="msgErr_psw_1"><?php if(!empty($si_msgErr_psw_1))echo $si_msgErr_psw_1; ?></span>
    </div>
    <div class="si-label-input">
        <div class='form-left'><label for="password_2">Confirmation </label></div>
        <div class='form-right'><input id="password_2" class="text-input" type="password" minlength="8" maxlength="20" name="si_conf_psw" maxlength="" placeholder="Mot de passe" required></div>
        <span class="form-error" id="msgErr_psw_2"><?php if(!empty($si_msgErr_psw_2))echo $si_msgErr_psw_2; ?></span>
    </div>
    <div class="si-label-input">
        <div class='form-left'><label for="date">Date de naissance </label></div>
        <div class='form-right'>
        <div style="display:inline-block;position:relative;">
            <input id="date" class="text-input" type="text" name="date" placeholder="  JJ/MM/AAAA"  
            <?php if(!empty($value_date))echo "value=".$value_date."" ?> required>
        </div></div>
        <span class="form-error" id="msgErr_date"><?php if(!empty($si_msgErr_date))echo $si_msgErr_date; ?></span>
    </div>
</br>
    <div>
        <input type="submit" name="si_submit" value="valider">
    </div>
</br>
    <span class="form-error" id="si_msgErr"><?php if( !empty( $si_msgErr ) ){ echo $si_msgErr; }?></span>
</form>
</div>