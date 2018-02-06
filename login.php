<?php

include_once "models/connectdb.php";

?>


<body style="height:auto;">

<div class="menu" id="formlogin"> 
<br /><br /><br /><br /><br /><br />
   
    <div class="formlogin">
    	
        <form method="post">
        <h3>Lecteur</h3>
    	 <table>      
    	    <tr><td>Login</td><td><input name="idclient"/></td></tr>
    		<tr><td>Password</td><td><input type="password"name="password"/></td></tr>
    		<tr><td colspan="2"><input type="submit" name="client" value="Entrez"/></td></tr>
    	 </table>
    	</form>	
    </div>
   
    <div class="formlogin">
    	<form method="post">
        
    	 <table>
         <h3>Admin</h3>
    	    <tr><td>Login</td><td><input name="idadmin"/></td></tr>
    		<tr><td>Password</td><td><input type="password" name="password"/></td></tr>
    		<tr><td colspan="2"><input type="submit" name="admin" value="Entrez"/></td></tr>
    	 </table>
    	</form>
    </div>
<p align="center" style="background: #b3ffb3;color: red;width: 400px;margin: 20px auto;">    
<?php

include_once "models/connectdb.php";
if (isset($_POST['client']))
{
    $login = $_POST['idclient'];
    $pass = $_POST['password'];
    $requete = mysqli_query($conn, "select * from  jc_lecteur where code='$login' and password='$pass'");
    $nbre = mysqli_num_rows($requete);
    if ($nbre > 0)
    {
        while ($resultat = mysqli_fetch_row($requete))
        {
            $_SESSION['code'] = $resultat[0];
            $_SESSION['prenomclient'] = $resultat[1];
            $_SESSION['nomclient'] = $resultat[2];
            $_SESSION['client'] = 'client';
            header('Location:lecteur/indexlecteur.php');
            //echo "okokok";
        }
    }
    else
    {
        echo "USERNAME/PASSWORD  INCORRECT";
    }
}


//session_start();
if (isset($_POST['admin']))
{
    $login = $_POST['idadmin'];
    $pass = $_POST['password'];
    $requete = mysqli_query($conn, "select * from jc_admin where login='$login' and password='$pass'");
    $nbre = mysqli_num_rows($requete);
    if ($nbre > 0)
    {
        while ($resultat = mysqli_fetch_row($requete))
        {
            $_SESSION['codeadmin'] = $resultat[0];
            $_SESSION['admin'] = 'admin';
            header('Location:admin/indexadmin.php');
        }
    }
    else
    {
        echo "USERNAME/PASSWORD  INCORRECT";
    }
}

?>
 </p>
</div>
