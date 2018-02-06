<?php

session_start();

?>
<html>
<head>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <link href="css/mystyle.css" rel="stylesheet" type="text/css"/>
<script src="code/functions.js"/>
</head>
<div class="title">

</div>
<body style="text-align:center;">

<?php
	//affiche le menu
    include_once "views/menu.php"
?>
<div class="main" id ="main">

<?php
//pour affiche recherche form
if(!isset($_GET['lien']))
	 echo "<center><h2>Bienvenue a la librairie Livre pour Tous! </h2></center> ";
?>

<?php

//1) Recuperation de la variable par GET

if (isset($_GET['lien']))
{
    $opt = $_GET['lien'];
    switch ($opt)
    {
        case "login":
            include ("login.php");
            break;

        case "find":
            include ("views/find.php");
            break;

        case "inscription":
            include ("inscription.php");
            break;
        default;
    }
}

?>

</div>

</body>
</html>
<script type="text/javascript">
    $("#search").keyup(function()
	{
		var idform= $("#idform").serialize();

		$("#details").load("../models/recherche.php?"+idform);

     })
 </script>
