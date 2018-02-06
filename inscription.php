
<head>
  <link rel="stylesheet" type="text/css" href="css/inscription.css "/>
</head>

<body style="height:auto;">

<div >
<br /><br /><br /><br />


     <div class="formlogin" style="  padding-right: 50px;  padding-left: 50px;">
        <form id='insertlecteur' method='post' onsubmit="return check()">
            <h3>inscription</h3>
            <table>
                <tr><td>prenom: </td><td><input type='text' name='prenom' required="required"/></td></tr>
                <tr><td>nom: </td><td><input type='text' name='nom' required="required"/></td></tr>
                <tr><td>email: </td><td><input type='text' name='email'/></td></tr>
                <tr><td>password: </td><td><input type='text' name='passwd'required="required" /></td></tr>
                <tr><td colspan="2" align="right"><input type='submit' name='insert' value='Insert lecteur'/></td></tr>
            </table>
       </form>
    </div>
<p align="center" style="./css/mystyle.css">
<?php

include_once "models/connectdb.php";



if (isset($_POST['insert']))
{
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['passwd'];
     $code = strtoupper(substr($nom, 0, 3).substr($prenom, 0, 1));
    $requete = mysqli_query($conn, "insert into jc_lecteur values ('$code','$prenom','$nom','$email','$password')");
    $nbre = mysqli_affected_rows($conn);
    if ($nbre <= 0)
    {
        echo "<center><h2 style='color:red'>Echec de insert!</h2></center> ";
    }
    else
    {
        echo "<center><h2 style='color:red'>insert ok!</h2></center>";
    }
    header("refresh:1; url=index.php");
    return;
}

?>
 </p>
</div>
<script type="text/javascript">
function check()
    {
        var email= $("#insertlecteur input[name='email']").val();
        if(checkmail(email)==false)
        {
            alert("email format pas correct");
            return false;
        }
        return true;
    }
</script>
