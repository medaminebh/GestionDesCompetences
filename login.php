<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Internet Dreams</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="index.html"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
		<!-- start login-inner -->

<div id="login-inner">
<form method="post" action="">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<th>Username :</th>
<td><input type="text" name="username" class="login-inp" placeholder="Username" required="required"/></td>
</tr>
<tr>
<th>Password :</th>
<td><input type="password" name="password" onfocus="this.value=''" class="login-inp" placeholder="********" required="required"/></td>
</tr>
<tr>
<th></th>
<td align="center"><input type="submit" class="submit-login" name="login"/></td>
</tr>
</tbody>
</table>
</form>
</div>
<!-- end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Forgot Password?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Entrez votre Email</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
			<form method="post" action="">

			
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value="" name="email"  class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="submit" class="submit-login"  /></td>
		</tr>
		</table>
		</form>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>
<?php
if( (isset( $_POST['email'] ) ) ){ 		
include_once "class.phpmailer.php";
include_once "class.smtp.php";


	  $destinataire = $_POST['email'];
	  

mysql_connect("localhost", "root", "azerty") or die("Connection Failed");
mysql_select_db("novatrice")or die("Connection Failed");
$query1 = "Select * from user where email='".$destinataire."'";
$result= mysql_query($query1);
$total = mysql_num_rows($result);
if($total) {
$line = mysql_fetch_array($result, MYSQL_ASSOC) ;
		 $login=$line["login"] ;
		 $pass=$line["pwd"] ;
		 $nom=$line["nom_user"] ;
		 
		 
$mail  = new PHPMailer();   
$mail->IsSMTP();

//GMAIL config
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the server
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "assma.saidi@gmail.com";  // GMAIL username
$mail->Password   = "";            // GMAIL password
//End Gmail

$mail->From       = "assma.saidi@gmail.com";
$mail->FromName   = "Administration";
$mail->Subject    = "vos paramétres d'identification";
$mail->MsgHTML("Vos paramétres d'identification \n Login ='".$login."' \nMot de passe='".$pass. "' ");

//$mail->AddReplyTo("reply@email.com","reply name");//they answer here, optional
$mail->AddAddress( $destinataire,$nom);
$mail->IsHTML(true); // send as HTML

if(!$mail->Send()) {//to see if we return a message or a value bolean
    echo "Mailer Error: " . $mail->ErrorInfo;
} else  echo "Vos paramétres on été envoyés";
}
else
{echo "réponse incorrecte";}

}
?>












