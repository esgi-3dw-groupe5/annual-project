 <section  class="right-block">
    <?php if( !isset( $gender_male ) ){ $gender_male="checked"; }?>
    <form method="POST" action="" class="form-update" id="si_form" name="si_form">
        <h2>Modifier vos informations</h2>
        <div class="line">
            <input id="male" type="radio" name="gender" value="0" <?php if(!empty($gender_male))echo $gender_male ?> ><label for="male">Monsieur</label>
            <input id="female" type="radio" name="gender" value="1" <?php if(!empty($gender_female))echo $gender_female ?> ><label for="female">Madame</label>
            </br><span class="form-error" id="msgErr_gender"><?php if(!empty($si_msgErr_gender))echo $si_msgErr_gender ?></span>
        </div>
    </br>
        <div class="line">
            <label for="name">Nom </label><input id="name" type="text" name="si_name" 
            <?php echo "value=".$data['name']; ?> ></br>
            <span class="form-error" id="msgErr_name"><?php if(!empty($si_msgErr_name))echo $si_msgErr_name ?></span>
        </div>
    </br>
        <div class="line">
            <label for="fistname">Prenom </label><input id="fistname" type="text" name="si_fistname" 
            <?php echo "value=".$data['firstname']; ?> ></br>
            <span class="form-error" id="msgErr_fistName"><?php if(!empty($si_msgErr_fistName))echo $si_msgErr_fistName ?></span>
        </div>
    </br>
        <div class="line">
            <label for="email">Email </label><input id="email" type="email" name="si_email" 
            <?php echo "value=".$data['email']; ?> required></br>
            <span class="form-error" id="msgErr_mail_1"><?php if(!empty($si_msgErr_mail_1))echo $si_msgErr_mail_1; ?></span>
            <span class="form-error" id="msgErr_mail_2"><?php if(!empty($si_msgErr_mail_2))echo $si_msgErr_mail_2; ?></span>
        </div>
    </br>
        <div class="line">
            <label for="pseudo">Pseudo </label><input id="pseudo" type="login" name="si_pseudo" 
            <?php echo "value=".$data['pseudo']; ?> required></br>
            <span class="form-error" id="msgErr_pseudo"><?php if(!empty($si_msgErr_pseudo))echo $si_msgErr_pseudo; ?></span>
        </div>
    <!-- </br>
        <div>
            <label for="password">Mot de passe </label><input id="password" type="password" name="si_psw" minlength="8" maxlength="20" required></br>
            <span class="form-error" id="msgErr_psw_1"><?php if(!empty($si_msgErr_psw_1))echo $si_msgErr_psw_1; ?></span>
        </div>
    </br>
        <div>
            <label for="password_2">Confirmation </label><input id="password_2" type="password" minlength="8" maxlength="20" name="si_conf_psw" maxlength="" required></br>
            <span class="form-error" id="msgErr_psw_2"><?php if(!empty($si_msgErr_psw_2))echo $si_msgErr_psw_2; ?></span>
        </div>
    </br> -->
        <div class="line">
            <label for="date">Date de naissance </label>
                <input id="date" type="text" name="date" placeholder="  JJ/MM/AAAA"  
                <?php echo "value=".$data['birth_date'];?> required>
            <span class="form-error" id="msgErr_date"><?php if(!empty($si_msgErr_date))echo $si_msgErr_date; ?></span>
        </div>
    </br>
        <div class="line">
            <input type="submit" name="si_submit" value="Modifier">
        </div>
    </br>
        <span class="form-error" id="si_msgErr"><?php if( !empty( $si_msgErr ) ){ echo $si_msgErr; }?></span>
    </form>
</section>