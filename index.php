<?php
	//if (headers_sent()) {
	//	echo "<script>document.location.href='http://srv-dide-v.thess.sch.gr/portal/';</script>\n";
	//} else {
	//	@ob_end_clean(); // clear output buffer
	//	header( "Location: https://srv-dide-v.thess.sch.gr/portal/" ); /* Redirect browser */
	//}
	//exit();
	
	$country= getenv('GEOIP_COUNTRY_NAME');
	if ($country!=false && $country!='GREECE' && $country!='greece' && $country!='Greece' )
	{	//wrong country
		echo '<html><head><title>Access Denied.</title></head><body>Access Denied (Wrong path). Service not available.</body></html>';
		die();
	}
	
	if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true) 
	{
		//we shouldnt be here...
		header("Location:login.php");
		die();
	}
	
$backgroundcolor= 'rgb(255, 122, 89)'; // blue #B9DCFF	
echo <<<ENDOFPAGE_1
<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=iso-8859-7">
<LINK REL="SHORTCUT ICON" HREF="./icons8-bus-16.png">
<title>Σχολικές Εκδρομές-Σύνδεση</title>

<style>
a {
	text-decoration: none;
}
a:hover {
	color: #FF0000;
}
</style>

<style>
	body {
	  font-family: Verdana, Arial, Helvetica, sans-serif;
	  font-size: 16px;
	  background-color: $backgroundcolor;
	  line-height: 1.295;
	  background-image: linear-gradient(to right, #FFFFFF, $backgroundcolor); 
	}	
</style>

			
</head>

<body lang=EL link=blue vlink=blue leftmargin=0 topmargin=0 marginwidth=0>

<p align=center style='text-align:center'><span style='font-size:14.0pt'>
<a href="http://dide-v.thess.sch.gr" title="http://dide-v.thess.sch.gr">Διεύθυνση
Δευτεροβάθμιας Εκπαίδευσης Δυτικής Θεσσαλονίκης</a></span> </p>

<noscript><center><b><span style="color:red">Δεν είναι ενεργοποιημένη η υποστήριξη javascript! <br>
	Για να συνδεθείτε απαιτείται να είναι ενεργοποιημένη η υποστήριξη javascript.</span></b></center>
	</noscript>
ENDOFPAGE_1;

$yearnow= @date('Y');

echo <<<EOF_PAGEBODY

  <form id="identity" action="login.php" method="post">
  <center>	
 	<table style="background-color:#FFFFFF;">
	<tr><td colspan=2> <center><img src="./icons8-bus.gif" width="128" height="128"></center> </td></tr>
	<tr><td colspan=2> <h4 style='text-align:center;font-size:125%'>Σχολικές Εκδρομές</h4> </td></tr>
	<tr><td colspan=2> </td></tr>
	
	<tr><td colspan=2> <center> <u>Απαιτείται πιστοποίηση χρήστη:</u><br>
	Χρησιμοποιήστε το λογαριασμό του σχολείου στο 
	Πανελλήνιο Σχολικό Δίκτυο για να συνδεθείτε<br>
	</td></tr>
	</table>
	<p><INPUT TYPE="submit" VALUE="Σύνδεση" name="submitButton" id="submitButton" style="font-size:125%"> </p>
	<br>
	<noscript><b><span style="color:red">Δεν είναι ενεργοποιημένη η υποστήριξη javascript! <br>
	Για να συνδεθείτε απαιτείται να είναι ενεργοποιημένη η υποστήριξη javascript.</span></b>
	</noscript>
 
 </center>
 </form>
<p style='text-align:center'><center>Εάν η εφαρμογή δεν αποκρίνεται, δοκιμάστε λίγα λεπτά αργότερα.<br>Εάν αντιμετωπίσετε κάποιο πρόβλημα επικοινωνήστε με το τμήμα Πληροφορικής της Δ/νσης<br> <br>
</p>

<CENTER><span style='font-size:10.0pt'><i> Τμήμα Πληροφορικής ΔΔΕ Δυτ. Θεσσαλονίκης &copy; 2023- $yearnow </i></span></CENTER>
</body></html>
EOF_PAGEBODY;

?>
