<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pinnackl</title>
        <meta name="description" content="description de ma page">


        <link href="assets/css/header.css" rel="stylesheet" media="all"/>
        <link href="assets/css/footer.css" rel="stylesheet" media="all"/>
        <link href="assets/css/form.css" rel="stylesheet" media="all"/>
        <link href="assets/css/main.css" rel="stylesheet" media="all"/>

        <script type="text/javascript" src="assets/js/libs/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="assets/js/coreAjax.js"></script>
        <script type="text/javascript" src="assets/js/datepicker.js"></script>

    </head>
    <body>

        <?php
            $requestURI = explode('/', $_SERVER['REQUEST_URI']);
            $scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
             
            for($i= 0;$i < sizeof($scriptName);$i++)
                    {
                  if ($requestURI[$i] == $scriptName[$i])
                          {
                            unset($requestURI[$i]);
                        }
                  }
             
            $command = array_values($requestURI);
        ?>
        
        <?php include("header.tpl"); ?>


        <div  class="content">
            <section >
                <div>
<!--                     <form method="post" action="controller/formControle.php" class="login">
                        <label>Login</label>
                        <input type="text" name="pseudo"><br>
                        <label>Password*</label>
                        <input type="password" name="mdp"><br>
                        <input type="submit" value="Connexion" name="signin">
                    </form>
                    <a href="">S'inscrire</a> -->

                    <form method="POST" action="index.php" class="">
                        <!-- <div id="error"><?php //echo $displayErr ?></div> -->
                        <div>
                            <input id="male" type="radio" name="genre" value="homme" <?php if(!empty($gender_male))echo $gender_male ?> required><label for="male">Monsieur</label>
                            <input id="female" type="radio" name="genre" value="femme" <?php if(!empty($gender_female))echo $gender_female ?> required><label for="female">Madame</label>
                            </br><span id="msgErr_gender"><?php if(!empty($msgErr_gender))echo $msgErr_gender ?></span>
                        </div>
                        <div>
                            <label for="name">Nom</label><input id="name" type="text" name="si_name" required
                            <?php if(!empty($value_name))echo "value=".$value_name."" ?> ></br>
                            <span id="msgErr_name"><?php if(!empty($msgErr_name))echo $msgErr_name ?></span>
                        </div>
                        <div>
                            <label for="fistname">Prenom</label><input id="fistname" type="text" name="si_fistname" required
                            <?php if(!empty($value_firstname))echo "value=".$value_firstname."" ?> ></br>
                            <span id="msgErr_fistName"><?php if(!empty($msgErr_fistName))echo $msgErr_fistName ?></span>
                        </div>
                        <div>
                            <label for="email">Email</label><input id="email" type="email" name="si_email" required
                            <?php if(!empty($value_mail_1))echo "value=".$value_mail_1."" ?> ></br>
                            <span id="msgErr_mail_1"><?php if(!empty($msgErr_mail_1))echo $msgErr_mail_1; ?></span>
                            <span id="msgErr_mail_2"><?php if(!empty($msgErr_mail_2))echo $msgErr_mail_2; ?></span>
                        </div>
                        <div>
                            <label for="email_2">Confirmation Email</label><input id="email_2" type="email" name="si_conf_email"
                                required <?php if(!empty($value_mail_2))echo "value=".$value_mail_2."" ?> ></br>
                            <span id="msgErr_mail_3"><?php if(!empty($msgErr_mail_3))echo $msgErr_mail_3; ?></span>
                        </div>
                        <div>
                            <label for="pseudo">Pseudo</label><input id="pseudo" type="login" name="si_pseudo" required
                            <?php if(!empty($value_pseudo))echo "value=".$value_pseudo."" ?> ></br>
                            <span id="msgErr_pseudo"><?php if(!empty($msgErr_pseudo))echo $msgErr_pseudo; ?></span>
                        </div>
                        <div>
                            <label for="password">Mot de passe</label><input id="password" type="password" name="si_psw" maxlength="" required></br>
                            <span id="msgErr_psw_1"><?php if(!empty($msgErr_psw_1))echo $msgErr_psw_1; ?></span>
                        </div>
                        <div>
                            <label for="password_2">Confirmation Mdp</label><input id="password_2" type="password" name="si_conf_psw" maxlength="" required></br>
                            <span id="msgErr_psw_2"><?php if(!empty($msgErr_psw_2))echo $msgErr_psw_2; ?></span>
                        </div>
                        <div>
                            <label for="date">Date de naissance</label>
                            <div style="display:inline-block;position:relative;width:300px;">
                                <input id="date" type="text" name="date" placeholder="  JJ/MM/AAAA" required 
                                <?php if(!empty($value_date))echo "value=".$value_date."" ?> >
                            </div></br>
                            <span id="msgErr_date"><?php if(!empty($msgErr_date))echo $msgErr_date; ?></span>
                        </div>
                        <div>
                            <input type="submit" name="valider" value="valider">
                        </div>
                    </form>
                </div>

            </section>

            <section class="">
                <div>

                </div>

            </section>
        </div>

        <aside>
        </aside>

        <?php include("footer.tpl"); ?>
        <style type="text/css">
        span{
            color:darkred;
        }
        </style>