<?php

	ini_set("session.gc_maxlifetime","21600"); // 6 hours 3600*6
	session_start();

	date_default_timezone_set('Europe/Athens');
	
// logout if desired
if (isset($_REQUEST['logout'])) 
{
	header("location:login.php?logout=1");
	die();
}

	
if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] ||
	!isset($_SESSION["currentuser"]) || $_SESSION["currentuser"]==''
	) // If the user IS NOT logged in, send him the login page
{
	header("location:index.php");
	die(); 
}

	$backgroundcolor= 'rgb(255, 122, 89)'; // blue #B9DCFF
	echo <<<END_OF_BASIC_HEADER
	<!DOCTYPE html>
	<html>
		<head>
			<title>Εκδρομές - ΔΔΕ Δυτ. Θεσ/νίκης</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
				
			<LINK REL="SHORTCUT ICON" HREF="./icons8-bus-16.png">

			<!-- Bootstrap core CSS -->
			<link href="./css/bootstrap.min.css" rel="stylesheet">
			<script src="./js/3.6.4_jquery.min.js"></script>
			<script src="./js/3.4.1_bootstrap.min.js"></script>
			
			<link rel="stylesheet" type="text/css" href="./js/datatables.min.css"/> 
			<script src="./js/datatables.min.js"></script>
			
			<script src="./js/ekdromes_funcs.js"></script>
			
			<link rel="stylesheet" href="./js/dropzone5.min.css" type="text/css" />
			
			
	<!--		<style>
			.navbar-customheight {
				height: 100px;
			}
			</style>
		-->	
		
<style>
	body {
	  font-family: Verdana, Arial, Helvetica, sans-serif;
	  font-size: 16px;
	  background-color: $backgroundcolor;
	  line-height: 1.295;
	  background-image: linear-gradient(to right, #FFC9BB, $backgroundcolor); 
	}	
</style>		
		
		</head>
END_OF_BASIC_HEADER;

//<p class="navbar-text navbar-right"><i>Σχολικό έτος:{$_SESSION['ekdromes_currentYear']}</i></p>

$posted_action=null;
if (isset($_POST['action'])) $posted_action= $_POST['action'];

if ($posted_action==null && (!isset($_GET['inf']) || $_GET['inf']!='1') && (!isset($_GET['sx']) || $_GET['sx']!='1')) $list_isactive= 'class="active"'; else $list_isactive= '';
if ($posted_action==null && isset($_GET['inf']) && $_GET['inf']=='1' && (!isset($_GET['sx']) || $_GET['sx']!='1')) $od_isactive='class="active"';else $od_isactive='';

$allowedyears= array();
if (isset($_GET['sx']) && !isset($_GET['inf']) && $posted_action==null)
{
	//change sx. etos
	$allowedyears= array( //whitelist
		'2023_2024',
		'2024_2025',
		'2025_2026',
		'2026_2027',
		'2028_2029',
		'2030_2031'
		);
	foreach ($allowedyears as $sxetos) {
		if ($_GET['sx']==$sxetos) {$_SESSION['ekdromes_currentYear']=$sxetos;break;}
	}//change sx etos
}

if ($_SESSION['ekdromes_currentYear']!=$_SESSION['ekdromes_actualCurrentYear']) {
	$yearalteredcolor="style='background-color:#FBD603;'";$warningsign='</i><span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;"></span><i>';
}
else {$yearalteredcolor='';$warningsign='';}

	echo <<<END_OF_COMMONBODY
	<body>
 <nav class="navbar navbar-customheight navbar-inverse navbar-fixed-top" $yearalteredcolor>
  <div class="container-fluid">
    <div class="navbar-header">
	<a class="navbar-brand" href="mainindex.php">
      <img src="./icons8-bus-64.png" alt="" width="52px" height="52px"> 
    </a>
   </div>

	<p class="navbar-text"><i>Σχ.Εκδρομές $warningsign <a href="mainindex.php?sx=1" title="πατήστε για αλλαγή σχ. έτους"><span class="glyphicon glyphicon-education"></span> {$_SESSION['ekdromes_currentYear']}</a> $warningsign</i></p>
	 
    <ul class="nav navbar-nav">
      <li $list_isactive><a href="mainindex.php"><span class="glyphicon glyphicon-list-alt"></span> Λίστα εκδρομών</a></li>
      <li $od_isactive><a href="mainindex.php?inf=1"><span class="glyphicon glyphicon-info-sign"></span> Οδηγίες</a></li>
     <!-- <li><a href="#">Page 2</a></li> -->
    </ul>
	
    <ul class="nav navbar-nav navbar-right">
	 <li><a href="login.php?logout=1" title='{$_SESSION['displayname']}'><span class="glyphicon glyphicon-log-in"></span> Έξοδος</a></li>
    </ul>
	<p class="navbar-text navbar-right"><i title='{$_SESSION['displayname']}'><span class="glyphicon glyphicon-user"></span> {$_SESSION['currentuser']}</i></p>
		
	<form method="post" action="mainindex.php"><button class="btn btn-primary navbar-btn" type="submit" value="new_ekdromi" name="action"><span class='glyphicon glyphicon-pencil'></span> Καταχώρηση νέας εκδρομής</button></form>
  </div>
</nav> 	

<div style="margin-top: 72px;margin-left:auto;margin-right:auto;width: 92%;">
END_OF_COMMONBODY;

if (isset($_SESSION["adminuser"]) && $_SESSION["adminuser"]==true)
{
//admin user:
	echo "<form action=mainindex.php method=post id=displayallform> <input type=hidden name=setschool value='-0-'></form>";
	if (isset($_POST['setschool'])) //update current setting
	{ 
		if ($_POST['setschool']=='9999999') {
			$_SESSION['displayname']= 'Προσωπικό ΔΔΕ - Δοκιμαστικό Σχολείο';
			$_SESSION['kodikos_sxoleiou']= '9999999';
			$_SESSION["usermail"]='';
		}
		else if ($_POST['setschool']=='-0-') //special case to view all records in db
		{
			$_SESSION['displayname']= 'Χωρίς επιλογή:Προβολή όλων';
			$_SESSION['kodikos_sxoleiou']= '-0-';
			$_SESSION["usermail"]='';
		}
		else
		{
			require('db.php');
			$error=false;
			try { $result = mysqli_query($mySqlConnection, "SELECT onomasia,mail,typos_sxoleiou FROM $pinakas_sx WHERE kodikos_sxoleiou='".mysqli_real_escape_string($mySqlConnection,$_POST['setschool'])."'");
			}
			catch (mysqli_sql_exception $e) {$error=true;echo $e->getMessage();}
			if (!$error)
			{
				$amount = mysqli_num_rows($result);
				if ($amount==0) 
				{
					echo '<b>Σφάλμα με τη ΒΔ! -Δεν βρέθηκε η σχολική μονάδα '.$_POST['setschool'].'</b><br>';
					$_SESSION['displayname']= mysqli_real_escape_string($mySqlConnection,$_POST['setschool']);
					$_SESSION['kodikos_sxoleiou']= mysqli_real_escape_string($mySqlConnection,$_POST['setschool']);
					$_SESSION["usermail"]= '';
					$_SESSION["typos_sxoleiou"]= '';					
				}
				else if ($amount!=1) echo 'Σφάλμα με τη ΒΔ! -Πολλαπλες εγγραφές<br>';
				else 
				{
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$_SESSION['displayname']= $row['onomasia'];
					$_SESSION['kodikos_sxoleiou']= mysqli_real_escape_string($mySqlConnection,$_POST['setschool']);
					$_SESSION["usermail"]=$row['mail'];
					$_SESSION["typos_sxoleiou"]=$row['typos_sxoleiou'];
				}
			}
			else echo '<b>--Σφάλμα με τη ΒΔ!</b><br>';
		}		
	}
	
	if ($_SESSION['kodikos_sxoleiou']== '-0-') $label_epilogi_allo='Επιλογή Σχολείου';
	else $label_epilogi_allo='Αλλαγή Σχολείου';
	
	if (isset($_POST['chooseschool']))
	{
		echo "<center>Διάδραση ως: <b>{$_SESSION["displayname"]}</b> <button type=submit form=displayallform title='Προβολή εκδρομών από όλα τα σχολεία'><span class='glyphicon glyphicon glyphicon-th-list'></span> Όλα</button>
		</center> <br>";
		//Display school select. Get school list:
		require('db.php');
		$error=false;
		try { $result = mysqli_query($mySqlConnection, "SELECT kodikos_sxoleiou,onomasia FROM $pinakas_sx"); }
		catch (mysqli_sql_exception $e) {$error=true; echo $e->getMessage();}
		if (!$error)
		{
			$amount = mysqli_num_rows($result);
			for ($i=1; $i<=$amount; $i++) {
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$schoollist[]= $row;
			}

			echo "<center><form action=mainindex.php method=post>Αλλαγή σε: <select name=setschool onchange='javascript:submit()'><option value='{$_SESSION['kodikos_sxoleiou']}'>{$_SESSION["displayname"]}</option><option disabled></option><option value='9999999'>Προσωπικό ΔΔΕ - Δοκιμαστικό Σχολείο</option><option value='-0-'>Προβολή όλων</option>";
			foreach ($schoollist as $aryschools)
				echo "<option value='{$aryschools['kodikos_sxoleiou']}'>{$aryschools['onomasia']}</option>";
			
			echo '</select><!-- <input type=submit value="Ενημέρωση"> --> </form></center>';
		}
		else echo '<b>-Σφάλμα με τη ΒΔ!</b><br>';
	}
	else 
		echo '<center><form action=mainindex.php method=post>Διάδραση ως: <b>'.$_SESSION["displayname"].'</b> <input type=submit name=chooseschool value="'.$label_epilogi_allo.'"> &nbsp;
		<button type=submit form=displayallform title="Προβολή εκδρομών από όλα τα σχολεία"><span class="glyphicon glyphicon glyphicon-th-list"></span> Όλα</button>
		 </form>
		</center>';
	
	if ($_SESSION['kodikos_sxoleiou']== '-0-') echo '<b>Γίνεται μόνο προβολή όλων των εκδρομών της ΒΔ. Δε γίνονται άλλες ενέργειες (καταχωρήσεις, αλλαγές, κτλ.)</b>';
	echo '<hr>';
}


//require(dirname(__FILE__)."/db.php");
require('ekdromesfunctions.php');

if (isset($_GET['inf']) && $_GET['inf']=='1' && $posted_action==null)
{
	echo '<p align=center>Οδηγίες - Πληροφορίες<p>';
	
	echo '<p>Τα σχολεία υποχρεούνται από τη νομοθεσία να ενημερώνουν τη Διεύθυνση Εκπαίδευσης για όλες τις σχολικές εκδρομές.<br> <br>

	Στην κεντρική σελίδα φαίνονται σε λίστα όλες οι υποβολές εκδρομών που έχουν γίνει για το τρέχον σχολικό έτος.<br> <br>

	Για να ενημερωθεί η Δ/νση για μία μελλοντική εκδρομή του σχολείου πατάμε το κουμπί "<i>Καταχώρηση νέας εκδρομής</i>" και ακολουθούμε
	τα βήματα της εφαρμογής. <br> <br>
	Μπορούμε να αποθηκεύσουμε τις επιλογές μας για τη συγκεκριμένη καταχώρηση και να ξανασυνεχίσουμε κάποια άλλη στιγμή.
	Κάθε αποθηκευμένη εκδρομή μπορεί να διαγραφεί και η διαδικασία να ακυρωθεί <u>αρκεί να μην έχει υποβληθεί</u> στη Δ/νση.<br>
	Όταν η καταχώρηση δεδομένων ολοκληρωθεί, τα στοιχεία υποβάλλονται οριστικά στη Δ/νση πατώντας το κουμπί "Υποβολή".
	Μετά την υποβολή στην Δ/νση, δεν μπορούμε να κάνουμε αλλαγές μέσα από την εφαρμογή γιατί τα αρχεία που υποβάλλονται λαμβάνουν αριθμό πρωτοκόλλου.
	Οποιεσδήποτε συμπληρώσεις ή αλλαγές μετά από αυτό το σημείο γίνονται μόνο μετά από συννενόηση με το γραφείο εκδρομών της Δ/νσης.
<br> <br>
	
	Η χρήση της εφαρμογής προτείνεται με στόχο τη διευκόλυνση των σχολείων και της Δ/νσης.<br>

	Τί προσφέρει αυτή η εφαρμογή στις Σχολικές Μονάδες;<br>
	<ul>
		<li>Άμεση καταχώρηση δεδομένων εκδρομών χωρίς προετοιμασία διαβιβαστικού και χωρίς αποστολή ηλ. αλληλογραφίας,</li>
		<li>Καθοδήγηση και ενημέρωση ως προς τις απαιτήσεις της νομοθεσίας για κάθε είδος εκδρομής,</li>
		<li>Ελαχιστοποίηση παραλήψεων & κατά συνέπεια χρονοβόρων διορθώσεων,</li>
		<li>Αυτόματη πρωτοκόλληση των εγγράφων στο πρωτόκολλο της Δ/νσης μετά την οριστική τους υποβολή,</li>
		<li>Συγκέντρωση ιστορικού εκδρομών ανά σχολικό έτος & παραγωγή στατιστικών στοιχείων,</li>
		<li>Μείωση όγκου αλληλογραφίας & εξοικονόμηση χρόνου.</li>
	</ul>
		
	</p>
	<p>Για παρατηρήσεις ή απορίες απευθυνθείτε στα γραφεία υπευθύνων Εκδρομών ή/και Πληροφορικής της <a href="https://srv-dide-v.thess.sch.gr/portal/mainmenu-29" target="_blank">Δ/νσης</a>.
	</p> <br>';

	echo '</div>
<center><i><small>Τμήμα Πληροφορικής Δ.Δ.Ε. Δυτικής Θεσσαλονίκης</small></i></center>
</body></html>';
	die();
}

if (isset($_GET['sx']) && !isset($_GET['inf']) && $posted_action==null)
{
	//print menu to change sx. etos
	if ($_GET['sx']=='1') {
		echo '<div id=changey style="background-color: #FBD603;width: max-content;border: 1px solid black;padding: 10px; margin: 10px;">
		<form action=mainindex.php method=get>Αλλαγή σχολικού έτους:<select name=sx><option>'.$_SESSION['ekdromes_currentYear'].'</option><option disabled> </option>';
		foreach ($allowedyears as $sxetos) echo "<option>$sxetos</option>";
		echo "</select> &nbsp;<button type=submit>Αλλαγή</button>&nbsp;&nbsp;<small><button type=button title='Κλείσιμο' onclick='javascript:document.getElementById(\"changey\").style.display=\"none\";'><span class='glyphicon glyphicon-remove'></span></button></small> </form> </div>";
	}
}
 
if ($_SESSION['kodikos_sxoleiou']=='-0-' && isset($_SESSION["adminuser"]) && $_SESSION["adminuser"]==true) display_mainadmin();//admin view all ekdromes
else //normal handling:
{
	switch ($posted_action)
	{
		case "new_ekdromi":	new_ekdromi();
		break;
		case "save": save_ekdromi(true); //save and display on success
		break;
		case "preparefiles": if (!prepare_display_files()) echo 'Εσωτερικό σφάλμα.<br>';
		break;
		case "edit": if (!edit_ekdromi()) display_mainuser();
		break;
		case "view": if (!isset($_POST['ar_prot']) || $_POST['ar_prot']!='') {
						if (!edit_ekdromi()) display_mainuser();
		}
		break;
		case "delete": deleteekdromi();display_mainuser();
		break;
		case "ypoboli": finalsubmit();
			echo '<p> <br> <br><form action="mainindex.php"><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-menu-left"></span> Επιστροφή στη λίστα εκδρομών</button></form></p>';
		break;
		default: display_mainuser();
		break;
	}	
}
echo <<<COMMONFOOTER
</div>
<center><i><small>Τμήμα Πληροφορικής Δ.Δ.Ε. Δυτικής Θεσσαλονίκης</small></i></center>
</body></html>
COMMONFOOTER;
?>
