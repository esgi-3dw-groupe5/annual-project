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

        <link href="assets/css/formSignin.css" rel="stylesheet" media="all"/>

        <script type="text/javascript" src="assets/js/libs/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="assets/js/coreAjax.js"></script>
        <script type="text/javascript" src="assets/js/datepicker.js"></script>
        <script type="text/javascript" src="assets/js/clock.js"></script>

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
                <h1>
                    <?php
                        if( $_SESSION['user']['pseudo'] ){
                            print($_SESSION['user']['pseudo']);
                            print("<a href='?act=logout'>logout</a>");
                        }
                    ?>
                </h1>
                <div>

                <?php if( !$_SESSION['user']['connected'] ){include_once("formLogin.tpl");} ?>
                <?php if( !$_SESSION['user']['connected'] ){include_once("formSignin.tpl");} ?>

                </div>

            </section>

            <section class="">
                <div id="clock">

                </div>
            </section>
        </div>

        <aside>
        </aside>