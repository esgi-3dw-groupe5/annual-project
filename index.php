<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Titre du Blog</title>
        <meta name="description" content="description de ma page">


        <link href="assets/css/header.css" rel="stylesheet" media="all"/>
        <link href="assets/css/footer.css" rel="stylesheet" media="all"/>
        <link href="assets/css/form.css" rel="stylesheet" media="all"/>
        <link href="assets/css/main.css" rel="stylesheet" media="all"/>

        <script type="text/javascript" src="//cdn.sublimevideo.net/js/8tsd8kyn.js"></script>


    </head>
    <body>

        <?php
            $requestURI = explode(‘/’, $_SERVER[‘REQUEST_URI’]);
            $scriptName = explode(‘/’,$_SERVER[‘SCRIPT_NAME’]);
             
            for($i= 0;$i < sizeof($scriptName);$i++)
                    {
                  if ($requestURI[$i] == $scriptName[$i])
                          {
                            unset($requestURI[$i]);
                        }
                  }
             
            $command = array_values($requestURI);
        ?>
        
        <?php include("template/header.tpl"); ?>


        <div  class="content">
            <section class="login">
                <div>
                    <form method="" >
                        <label>Login</label>
                        <input type="text" name="pseudo"><br>
                        <label>Password*</label>
                        <input type="password" name="mdp"><br>
                        <input type="submit" value="Connexion" name="envoyer">
                    </form>
                    <button href="">S'inscrire</a>
                </div>

            </section>

            <section class="">
                <div>

                </div>

            </section>
        </div>

        <aside>
        </aside>

        <?php include("template/footer.tpl"); ?>
       
    </body>
</html>
