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

                    <form method="POST" action="corePHP.php" class="">
                        <!-- <div id="error"><?php //echo $displayErr ?></div> -->
                        <div>
                            <input id="male" type="radio" name="genre" value="homme" checked required><label for="male">Monsieur</label>
                            <input id="female" type="radio" name="genre" value="femme" required><label for="female">Madame</label>
                            </br><span id="msgErr_gender"><?php if(!empty($msgErr_gender))echo $msgErr_gender ?></span>
                        </div>
                        <div>
                            <label for="name">Nom</label><input id="name" type="text" name="nom" required></br>
                            <span id="msgErr_name"><?php if(!empty($msgErr_name))echo $msgErr_name ?></span>
                        </div>
                        <div>
                            <label for="fistname">Prenom</label><input id="fistname" type="text" name="prenom" required></br>
                            <span id="msgErr_fistName"><?php if(!empty($msgErr_fistName))echo $msgErr_fistName ?></span>
                        </div>
                        <div>
                            <label for="email">Email</label><input id="email" type="email" name="email" required></br>
                            <span id="msgErr_mail_1"><?php if(!empty($msgErr_mail_1))echo $msgErr_mail_1; ?></span>
                            <span id="msgErr_mail_2"><?php if(!empty($msgErr_mail_2))echo $msgErr_mail_2; ?></span>
                        </div>
                        <div>
                            <label for="email_2">Confirmation Email</label><input id="email_2" type="email_2" name="confirmEmail" required></br>
                            <span id="msgErr_mail_3"><?php if(!empty($msgErr_mail_3))echo $msgErr_mail_3; ?></span>
                        </div>
                        <div>
                            <label for="pseudo">Pseudo</label><input id="pseudo" type="login" name="pseudo" required></br>
                            <span id="msgErr_pseudo"><?php if(!empty($msgErr_pseudo))echo $msgErr_pseudo; ?></span>
                        </div>
                        <div>
                            <label for="password">Mot de passe</label><input id="password" type="password" name="mdp" maxlength="" required></br>
                            <span id="msgErr_psw_1"><?php if(!empty($msgErr_psw_1))echo $msgErr_psw_1; ?></span>
                        </div>
                        <div>
                            <label for="password_2">Confirmation Mdp</label><input id="password_2" type="password" name="confirmMdp" maxlength="" required></br>
                            <span id="msgErr_psw_2"><?php if(!empty($msgErr_psw_2))echo $msgErr_psw_2; ?></span>
                        </div>
                        <div>
                            <label for="date">Date de naissance</label><input id="date" type="date" name="dateNaissance" placeholder="  JJ/MM/AAAA" required></br>
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
    </body>
</html>
