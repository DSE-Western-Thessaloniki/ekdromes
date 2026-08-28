<?php

function populate_ekdromes(&$ary_ekdromes)//populate ekdromes array
{
	//##1update position
	$ary_ekdromes= array (
			//titlosekdr => katigoria(default:empty), nomothesia(text), arxeia nomothesias(folder), protypa(folder), typos sxoleiou(ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ EK), elaxisto plithos arxeion poy apaitoyntai gia anebasma sto protokolo
"Σχολικός Περίπατος"  => 
	array('',"Άρθρο 1 Υ.Α. 20883/ΓΔ4/12-2-2020 (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/peripatos/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",1),
"Ημερήσια δίχως διανυκτέρευση"  =>
	array('',"Άρθρο 2, § 1,2,3,4 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/hmerisiaxoris/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",1),
"Πολυήμερη τελευταίας τάξης στο εσωτερικό"  => 
	array('',"Άρθρο 2 § 5 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/pollesesot/", "ΛΥΚΕΙΟ ΕΠΑΛ",1),
"Πολυήμερη τελευταίας τάξης στο εξωτερικό"  =>
	array('',"Άρθρο 2 § 5 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/pollesejot/", "ΛΥΚΕΙΟ ΕΠΑΛ",3),
"Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό) στο εσωτερικό"  =>
	array('',"Άρθρο 3  § 1  Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/programma_esoteriko/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",1),
"Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο εγκεκριμένων εκπαιδευτικών προγραμμάτων σχολικών δραστηριοτήτων"  =>
	array('',"Άρθρο 3 § 1 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/programmata_ejoteriko/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),
"Εκπαιδευτική εκδρομή στο εσωτερικό"  => 
	array('',"Άρθρο 3 § 2 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/ekp_esoteriko/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",1),
"Εκπαιδευτική εκδρομή στο εξωτερικό"  => 
	array('',"Άρθρο 3 § 2 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/ekp_ejot/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",3),
"Διδακτική επίσκεψη"  => 
	array('',"Άρθρο 4 της Y.A. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/didaktikes/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",1),
"Επίσκεψη στη Βουλή των Ελλήνων"  =>
	array('',"Άρθρο 7 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/vouli/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",1),
"Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού"  => 
	array('',"Άρθρο 8 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/diagon/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",1),
			
	"Εκπαιδευτικών ανταλλαγών σε συνέχεια διακρατικών συμφωνιών/μνημονίων συνεργασίας/εκτελεστικών προγραμμάτων"  => array('(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',"Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/europ/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),
	
	"Αδελφοποιήσεων"  => array('(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',"Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/adel/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),
	
	"Εκπαιδευτικών προγραμμάτων της Γενικής Γραμματείας Θρησκευμάτων"  => array('(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',"Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/europ/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),
	"Ευρωπαϊκών προγραμμάτων δραστηριοτήτων/προγραμμάτων που δε γίνονται στο πλαίσιο του ευρωπαϊκού προγράμματος Erasmus"  => array('(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',"Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/europ/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),
	"Προγραμμάτων διεθνών οργανισμών"  => array('(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',"Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/europ/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),
	"Συμμετοχών σε διεθνείς συναντήσεις, συνέδρια, ημερίδες, διαγωνισμούς, μαθητικές επιστημονικές ολυμπιάδες και άλλες διεθνής εκδηλώσεις"  => array('(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',"Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/europ/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),
	"Προσκλήσεις σχολείων της περ.α του άρθρου 3 του ν. 4415/2016 (Α΄ 159)"  => array('(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',"Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/europ/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),
	"Βράβευσης με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας"  => array('(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',"Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/europ/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),
	"Πιλοτικών προγραμμάτων διεθνών σχολικών δικτύων που εγκρίνονται ή συντονίζονται από το Υπουργείο Παιδείας"  => array('(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',"Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/europ/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),
	"Επισκέψεων σε ερευνητικά κέντρα, εκπαιδευτικά ιδρύματα, πανεπιστήμια, κέντρα πολιτισμού και/ή αθλητισμού"  => array('(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',"Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/europ/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),
	"Επισκέψεων σε ευρωπαϊκούς θεσμούς/διεθνείς οργανώσεις κατόπιν σχετικής πρόσκλησης και αποδοχής τυχόν αιτήματος από το διεθνή οργανισμό"  => array('(Μέσω ευρωπαϊκών ή διεθνών δράσεων)',"Άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/europ/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",5),

"Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2"  => 
	array('',"Υ.Α.25735/Η1/20-02-2020 (ΦΕΚ 625/τ.Β’/27-02-2020) και Υ.Α.20883/ΓΔ4/12-02-2020 (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/erasmus2/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",6),

"Μετακίνηση εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1"  => 
	array('',"Υ.Α.25735/Η1/20-02-2020 (ΦΕΚ 625/τ.Β’/27-02-2020) και Υ.Α.20883/ΓΔ4/12-02-2020 (ΦΕΚ 456/τ.Β’/13-02-2020)", "nomoi/erasmus1/", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ",6)
	
	);
}

function populate_stiles(&$ary_stiles) //single position to set record structure
{
	$ary_stiles= array (
		'idaitisi',
		'kodikos_sxoleiou',
		'ar_prot',
		'submit_datetime',

		'status',
		'eidos_ekdromis', 
		'paratiriseis',
		'diarkeia_hmeres',
		'a_arithmos',
		'ar_prajis_syllogou',
		'ar_pr_egrisis_programmatosdde',
		'eidos_programmatos',
		'titlos_programmatos', //επίσης χρησιμοποιείται για τίτλο εκδήλωσης ή διαγωνισμού ή έγγραφο πρόσκλησης
		'mathimata', 
		'tmimata', //χρησιμοποιείται για τάξεις ή τμήματα
		'proorismos',
		'onoma_jenodoxeio',
		'onoma_praktoreio',
		'metaforika_mesa',
		'aritmoi_mesa_anaxorisis',
		'arithmoi_mesa_epistrofis',
		'hmera_ekdromis_anaxorisis',
		'hmera_epistrofis',
		'ora_anaxorisis',
		'ora_afijis',
		'ora_apoxorisis',
		'ora_epistrofis',
		'ar_mathiton',
		'ar_metakinoumenon',
		'onoma_arxigos',
		'onoma_anaplirotis_arxigos',
		'plithos_synodoi',
		'plithos_ektosomadas_synodoi',
		'onomata_synodoi',
		'anaplirotes_synodoi',
		'asf_symbolaio',
		'praji_epilogi_praktoreiou',
		'ar_pr_anartisisprok',
		'onoma_ypografonta',
		'prosfonisi_ypografonta',
		'ar_prot_sxoleiou',
		'hmera_diavivastikou',
		
		'erasmus_ar_simbasis',						 
		'erasmus_ar_prajis_syllogou_sigrotisi',		
		'erasmus_ar_prajis_syllogou_anasigrotisi',    
		'erasmus_ar_prajis_syllogon_sinainesi',     
		'erasmus_ar_prot_beb_dieythinton',              
		'erasmus_lista_mathites_kaitaji',
		'erasmus_lista_kathig_kaieidikotita',
		'erasmus_lista_anaplirkathig_kaieid'
	);	
}

function SetUndefinedAsEmpty(&$ary_assoc) //initialize database record data
{
	$times= array();
	populate_stiles($times);

	//use the last onoma_ypografonta used from previous ekdromes if it exists:
	if ( !isset($ary_assoc['onoma_ypografonta']) )
	{
		$kodikos_sxoleiou= $_SESSION['kodikos_sxoleiou']; //$currentuser, $_SESSION['currentuser']
		require('db.php');
			
		//use the last name used
			$amount=0;
			try {
				
				$result = mysqli_query($mySqlConnection, "SELECT kodikos_sxoleiou,submit_datetime,status ,onoma_ypografonta FROM
				$pinakas_ekdromes WHERE kodikos_sxoleiou='$kodikos_sxoleiou' AND status='ΥΠΟΒΛΗΘΗΚΕ' ORDER BY submit_datetime DESC");
			}
			catch (mysqli_sql_exception $e) 
			{
				//echo '<p>Σφάλμα:'.$e->getMessage() .'</p>';
				//die();//return;
				$amount=0;
			}
		if (mysqli_errno($mySqlConnection)) $amount=0;//echo 'Σφάλμα βάσης δεδομένων:<br>'.mysqli_error($mySqlConnection).'<br>';return;}
		else
			$amount = mysqli_num_rows($result);

		if ($amount==0) $ary_assoc['onoma_ypografonta']='';
		else {
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);//first row
			$ary_assoc['onoma_ypografonta']= $row['onoma_ypografonta'];
		}
	}
	
	foreach ($times as $k){
		//if ($k=='eidos_ekdromis') continue;//skip this
		if (!isset($ary_assoc["$k"])) $ary_assoc["$k"]='';
	}
		
	if ($ary_assoc['a_arithmos']=='') $ary_assoc['a_arithmos']=1;//initialize
	if ($ary_assoc['prosfonisi_ypografonta']=='') $ary_assoc['prosfonisi_ypografonta']='Ο/Η ΔΙΕΥΘΥΝΤΗΣ/ΝΤΡΙΑ ΤΗΣ ΣΧΟΛΙΚΗΣ ΜΟΝΑΔΑΣ';
	//if ($ary_assoc['ar_prot_sxoleiou']=='') $ary_assoc['ar_prot_sxoleiou']='ΔΥ'; //ar_prot_sxoleiou is now mandatory
	
}

function display_ekdromi(&$ary_assoc)
{
	SetUndefinedAsEmpty($ary_assoc);
	TrimSqlHours($ary_assoc);
	if ($ary_assoc['hmera_diavivastikou']==''||$ary_assoc['hmera_diavivastikou']=='0000-00-00')
		$ary_assoc['hmera_diavivastikou']= date('Y-m-d'); //set to today when not set
//##2 update pos

echo <<<EOF_SCRIPT_FOR_CALENDARUSE
<!-- calendar: -->
  <link rel="stylesheet" type="text/css" media="all" href="./calendar/calendar-brown.css" title="calendar-brown" />
  <script type="text/javascript" src="./calendar/calendar_mod.js"></script>
  <script type="text/javascript" src="./calendar/calendar-gr-utf8.js"></script>
  <script type="text/javascript" src="./calendar/calendar-setup.js"></script>
<!-- calendar -->
EOF_SCRIPT_FOR_CALENDARUSE;

	if (!isset($_POST['odhgiesok']) && isset($_POST['action']) && $_POST['action']=='new_ekdromi')//make sure user knows
		{ForceDisplayOdhgies($ary_assoc['eidos_ekdromis']);return;}

	switch ($ary_assoc['eidos_ekdromis'])
	{
		case 'Σχολικός Περίπατος':
		{
			echo '<p>Σχολικοί περίπατοι (Άρθρο 1) Υ.Α. 20883/ΓΔ4/12-2-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)</p>';

			if ($ary_assoc['metaforika_mesa']!='') {$selected_metaf='selected';$display_nometaf="style='display:none'";$display_metaf_input= "";}
			else {$selected_metaf=''; $display_nometaf=""; $display_metaf_input= "style='display:none'";}
//depricated titlos:
//<div class="form-group"><label for="titlos">Τίτλος:</label> <input class="form-control" type=text name=titlos id=titlos value="{$ary_assoc['titlos']}" size='50' placeholder='Τίτλος της εκδρομής για αναφορά'></div>
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>
		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
		<div class="form-group"><label for="a_arithmos">Αύξων αριθμός εκδρομής αυτού του είδους(π.χ.1 αν είναι η πρώτη για φέτος):</label> <input class="form-control" type=number class="form-control" name=a_arithmos id=a_arithmos value="{$ary_assoc['a_arithmos']}" size=3 min=1></div><p></p>
			
		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="ονομασία τοποθεσίας" size=30></div><p></p>
		
		<div class="form-group"><label for="metakinisi">Τρόπος μετακίνησης:</label> <select class="form-select" name=metakinisi id=metakinisi onchange='javascript:if(document.getElementById("metakinisi").value=="Πεζή") {document.getElementById("display_div").style.display="";document.getElementById("metaforika_mesa").style.display="none";}else {document.getElementById("display_div").style.display="none";document.getElementById("metaforika_mesa").style.display="";}'><option>Πεζή</option><option $selected_metaf>Με μεταφορικό μέσο</option></select></div><p></p>
		<div class="form-group"><label for="metaforika_mesa">Μεταφορικό μέσο:</label> <span id=display_div $display_nometaf><i>Χωρίς μεταφορικό μέσο</i></span> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa $display_metaf_input value="{$ary_assoc['metaforika_mesa']}" placeholder="π.χ. Λεωφορείο"></div> <p></p>

			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνία</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία εκδρομής:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<p></p>
		
			</div>
		</div>

		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<!-- <small>(μπορεί να είναι κενό για υποβολή μίας μόνο εκδρομής ανά ημέρα)</small> -->
		<small>(απαιτείται για οριστική υποβολή)</small> </p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'> <span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span> </div>
		<p></p>
		
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);
		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_diavivastikou');
		}
		break;
		case 'Ημερήσια δίχως διανυκτέρευση':
		{
		echo '<p>Ημερήσια εκπαιδευτική εκδρομή εντός ή εκτός νομού Άρθρο 2, § 1,2,3,4 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)</p>';
		
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		
		
		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
		<div class="form-group"><label for="a_arithmos">Αύξων αριθμός εκδρομής αυτού του είδους:</label> <input class="form-control" type=text class="form-control" name=a_arithmos id=a_arithmos value="1" size=1 readonly>(επιτρέπεται μία ανά σχ. έτος)</div><p></p>
		
		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Πόλη ή/και τοποθεσία" size=30></div><p></p>
		
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>

		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="π.χ. Λεωφορείο"></div><p></p>

			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνία</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία διεξαγωγής εκδρομής:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10> [Ενημερώστε τη ΔΔΕ (με οριστική υποβολή) τουλάχιστον μία ημέρα πριν]</div>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">
				
		<div class="form-group"><label for="ar_mathiton">Αριθμός φοιτούντων μαθητών/τριών:</label> <input class="form-control" type=number size=5 min=1 name=ar_mathiton id=ar_mathiton value="{$ary_assoc['ar_mathiton']}"></div>
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		Συμμετέχουν σε ποσοστό 70%: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_pososto" id=check_pososto checked><label class="form-check-label" for="check_pososto">NAI</label></div>
		<p></p>
		
		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών εκπαιδευτικών(εκτός από τον αρχηγό της εκδρομής):</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=25*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=25*document.getElementById('plithos_synodoi').value</script> </div><p></p>
		Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_ypefth" id=check_ypefth checked><label class="form-check-label" for="check_ypefth">NAI</label></div>
		
			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<!-- <small>(μπορεί να είναι κενό για υποβολή μίας μόνο εκδρομής ανά ημέρα)</small> -->
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');

		SendCalendarInit('hmera_diavivastikou');
			
		}
		break;
		case 'Πολυήμερη τελευταίας τάξης στο εσωτερικό':
		{
		echo '<p>Πολυήμερη εκπαιδευτική εκδρομή τελευταίας τάξης ΓΕ.Λ., ΕΠΑ.Λ., ΕΝ.Ε.Ε.ΓΥ.-Λ. εντός Ελλάδας</p>';
		
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		

		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"> (20 ημέρες πριν την εκδρομή)</div><p></p>
		<div class="form-group"><label for="a_arithmos">Αύξων αριθμός εκδρομής αυτού του είδους:</label> <input class="form-control" type=text class="form-control" name=a_arithmos id=a_arithmos value="1" size=1 readonly>(επιτρέπεται μία ανά σχ. έτος)</div><p></p>
			
		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Πόλη ή τοποθεσία" size=30></div><p></p>
		
		<div class="form-group"><label for="onoma_jenodoxeio">Όνομα Ξενοδοχείου:</label> <input class="form-control" type=text name=onoma_jenodoxeio id=onoma_jenodoxeio value="{$ary_assoc['onoma_jenodoxeio']}" size=30 placeholder="Επωνυμία"></div>
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>

		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="Αεροπλάνο, πλοίο κτλ."></div><p></p>

			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία αναχώρησης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="hmera_epistrofis">Ημερομηνία επιστροφής:</label> <input class="form-control" type='text' readonly id='hmera_epistrofis' name='hmera_epistrofis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_epistrofis']}' size=10 maxlength=10></div>
		<br><small>[επιτρεπτό χρονικό διάστημα διεξαγωγής από 15 Οκτωβρίου έως 19 Δεκεμβρίου & από 1 Φεβρουαρίου έως και δέκα (10) ημέρες πριν από τη λήξη των μαθημάτων]</small><br> <br>
		
		<div class="form-group"><label for="diarkeia_hmeres">Διάρκεια (ημέρες):</label> <input class="form-control" type=text name=diarkeia_hmeres id=diarkeia_hmeres value="{$ary_assoc['diarkeia_hmeres']}" size=2></div>
		<small>[Έως πέντε (5) εργάσιμες ημέρες ή έως επτά (7) ημέρες, εάν συμπεριληφθούν έως δύο (2) αργίες]</small>
		<p></p>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">
				
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		Υπάρχει το ποσοστό τουλάχιστον 70% φοιτώντων μαθητών και μαθητριών: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_pososto" id=check_pososto checked><label class="form-check-label" for="check_pososto">NAI</label></div>
		<p></p>
		
		<div class="form-group"><label for="onoma_arxigos">Αρχηγός:</label> <input class="form-control" type=text name=onoma_arxigos id=onoma_arxigos value="{$ary_assoc['onoma_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div>
		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών(εκτός του αρχηγού):</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=25*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=25*document.getElementById('plithos_synodoi').value</script> </div>
		<br>[Στο πρακτικό αναγράφονται τα ονοματεπώνυμα του αρχηγού, του αναπληρωτή του καθώς και τα αυτά των συνοδών και των αναπληρωτών τους]<br>
		<p></p>
		

		Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_ypefth" id=check_ypefth checked><label class="form-check-label" for="check_ypefth">NAI</label></div>
		
			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_epistrofis');
		SendCalendarInit('hmera_diavivastikou');
			
		}
		break;
		case 'Πολυήμερη τελευταίας τάξης στο εξωτερικό':
		{
		echo '<p>Πολυήμερη εκπαιδευτική εκδρομή τελευταίας τάξης ΓΕ.Λ. , ΕΠΑ.Λ., ΕΝ.Ε.Ε.ΓΥ.-Λ.. στο ΕΞΩΤΕΡΙΚΟ</p>';
		
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		
		
		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
		<div class="form-group"><label for="asf_symbolaio">Αριθμός ασφαλιστηρίου συμβολαίου για τη διάρκεια του ταξιδιού και της διαμονής:</label> <input class="form-control" type=text class="form-control" name=asf_symbolaio id=asf_symbolaio value="{$ary_assoc['asf_symbolaio']}" placeholder="Αριθμός ή αναγνωριστικό συμβολαίου" size=30></div><p></p>
		<div class="form-group"><label for="praji_epilogi_praktoreiou">Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:</label> <input class="form-control" type=text class="form-control" name=praji_epilogi_praktoreiou id=praji_epilogi_praktoreiou value="{$ary_assoc['praji_epilogi_praktoreiou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
			
		<div class="form-group"><label for="ar_pr_anartisisprok">Αρ. Πρ. & ημ. διαβίβασης αιτήματος ανάρτησης προκήρυξης:</label> <input class="form-control" type=text class="form-control" name=ar_pr_anartisisprok id=ar_pr_anartisisprok value="{$ary_assoc['ar_pr_anartisisprok']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
		
		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Πόλη ή/και τοποθεσία/χώρα" size=30></div><p></p>
		
		<div class="form-group"><label for="onoma_jenodoxeio">Όνομα Ξενοδοχείου:</label> <input class="form-control" type=text name=onoma_jenodoxeio id=onoma_jenodoxeio value="{$ary_assoc['onoma_jenodoxeio']}" size=30 placeholder="Επωνυμία"></div>
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>

		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="Αεροπλάνο, πλοίο κτλ."></div><p></p>

			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες και ώρες</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία αναχώρησης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="hmera_epistrofis">Ημερομηνία επιστροφής:</label> <input class="form-control" type='text' readonly id='hmera_epistrofis' name='hmera_epistrofis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_epistrofis']}' size=10 maxlength=10></div>
		<br><small>[επιτρεπτό χρονικό διάστημα διεξαγωγής από 15 Οκτωβρίου έως 19 Δεκεμβρίου & από 1 Φεβρουαρίου έως και δέκα (10) ημέρες πριν από τη λήξη των μαθημάτων]</small><br> <br>
		
		<div class="form-group"><label for="diarkeia_hmeres">Διάρκεια (ημέρες):</label> <input class="form-control" type=text name=diarkeia_hmeres id=diarkeia_hmeres value="{$ary_assoc['diarkeia_hmeres']}" size=2></div>
		<small>[Έως πέντε (5) εργάσιμες ημέρες ή έως επτά (7) ημέρες, εάν συμπεριληφθούν έως δύο (2) αργίες]</small>
		<p></p>
		
		<div class="form-group"><label for="ora_anaxorisis">Ώρα αναχώρησης από το σχολείο ή από άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_anaxorisis id=ora_anaxorisis value="{$ary_assoc['ora_anaxorisis']}" ></div> [μετά τις 6:00πμ]<p></p>
		<div class="form-group"><label for="ora_afijis">Εκτιμώμενη (τοπική) ώρα άφιξης στον/στους προορισμό/σμούς:</label> <input class="form-control" type=time step=60 name=ora_afijis id=ora_afijis value="{$ary_assoc['ora_afijis']}" ></div><p></p>
		<div class="form-group"><label for="ora_apoxorisis">Εκτιμώμενη (τοπική) ώρα αποχώρησης:</label> <input class="form-control" type=time step=60 name=ora_apoxorisis id=ora_apoxorisis value="{$ary_assoc['ora_apoxorisis']}" ></div><p></p>
		<div class="form-group"><label for="ora_epistrofis">Ώρα επιστροφής στο σχολείο ή σε άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_epistrofis id=ora_epistrofis value="{$ary_assoc['ora_epistrofis']}"></div> [το αργότερο έως τις 10:00μμ]<p></p>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">
				
		<div class="form-group"><label for="ar_mathiton">Αριθμός φοιτούντων μαθητών/τριών:</label> <input class="form-control" type=number size=5 min=1 name=ar_mathiton id=ar_mathiton value="{$ary_assoc['ar_mathiton']}"></div>
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		Υπάρχει το ποσοστό τουλάχιστον 70% φοιτώντων μαθητών και μαθητριών: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_pososto" id=check_pososto checked><label class="form-check-label" for="check_pososto">NAI</label></div>
		<p></p>
		
		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών (εκτός του αρχηγού):</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=20*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=20*document.getElementById('plithos_synodoi').value</script> </div><p></p>
		Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_ypefth" id=check_ypefth checked><label class="form-check-label" for="check_ypefth">NAI</label></div>
		
			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_epistrofis');
		SendCalendarInit('hmera_diavivastikou');
			
		}
		break;
		case 'Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό) στο εσωτερικό':
		{
		echo '<p>Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό) στο εσωτερικό 
				-άρθρο 3 § 1 της Υ.Α 20883/ΓΔ4/12-02-2020 (ΦΕΚ 456/τ.Β’/13-02-2020)</p>';
		
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		
		
		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="eidos_programmatos">Είδος προγράμματος:</label> 
		<select class="form-select" name=eidos_programmatos id=eidos_programmatos"><option>{$ary_assoc['eidos_programmatos']}</option><option disabled></option><option>Περιβαλλοντικής εκπαίδευσης</option><option>Αγωγής υγείας</option><option>Πολιτιστικών θεμάτων</option><option>Αγωγής σταδιοδρομίας</option></select></div>
		<div class="form-group"><label for="titlos_programmatos">Τίτλος του προγράμματος:</label> <input class="form-control" type=text name=titlos_programmatos id=titlos_programmatos value="{$ary_assoc['titlos_programmatos']}" size="50"></div><p></p>
		<div class="form-group"><label for="ar_pr_egrisis_programmatosdde">Αρ. πρωτ. έγκρισης του προγράμματος σχολικών δραστηριοτήτων:</label> <input class="form-control" type=text class="form-control" name=ar_pr_egrisis_programmatosdde id=ar_pr_egrisis_programmatosdde value="{$ary_assoc['ar_pr_egrisis_programmatosdde']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>

		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>

		<div class="form-group"><label for="a_arithmos">Αύξων αριθμός εκδρομής αυτού του είδους(π.χ.1 αν είναι η πρώτη για φέτος):</label> <input class="form-control" type=number class="form-control" name=a_arithmos id=a_arithmos value="{$ary_assoc['a_arithmos']}" size=3 min=1></div><p></p>
			
			
		
		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Πόλη ή τοποθεσία" size=30></div><p></p>
		
		<div class="form-group"><label for="onoma_jenodoxeio">Όνομα Ξενοδοχείου:</label> <input class="form-control" type=text name=onoma_jenodoxeio id=onoma_jenodoxeio value="{$ary_assoc['onoma_jenodoxeio']}" size=30 placeholder="Επωνυμία">[αφήστε κενό αν δεν υπάρχει διανυκτέρευση]</div><p></p>
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>

		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="Αεροπλάνο, πλοίο κτλ."></div><p></p>

			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες και ώρες</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία αναχώρησης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="hmera_epistrofis">Ημερομηνία επιστροφής:</label> <input class="form-control" type='text' readonly id='hmera_epistrofis' name='hmera_epistrofis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_epistrofis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="diarkeia_hmeres">Διάρκεια (ημέρες):</label> <input class="form-control" type=number name=diarkeia_hmeres id=diarkeia_hmeres value="{$ary_assoc['diarkeia_hmeres']}" min="1" max="7" size=2></div><p></p>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">
				
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		Υπάρχει το ποσοστό 70% της παιδαγωγικής ομάδας: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_pososto" id=check_pososto checked><label class="form-check-label" for="check_pososto">NAI</label></div>
		<p></p>
		
		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών (εκτός του αρχηγού):</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=25*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=25*document.getElementById('plithos_synodoi').value</script> </div><p></p>
		Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_ypefth" id=check_ypefth checked><label class="form-check-label" for="check_ypefth">NAI</label></div>
		
			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_epistrofis');
		SendCalendarInit('hmera_diavivastikou');
			
			
		}
		break;
		case 'Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο εγκεκριμένων εκπαιδευτικών προγραμμάτων σχολικών δραστηριοτήτων':
		{
		echo '<p>Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο εγκεκριμένων εκπαιδευτικών προγραμμάτων σχολικών δραστηριοτήτων
			(περιβαλλοντικής εκπαίδευσης, αγωγής υγείας, πολιτιστικών θεμάτων και αγωγής σταδιοδρομίας) άρθρο 3 § 1 της 20883/ΓΔ4/12-02-2020 Y.A. (ΦΕΚ 456/τ.Β’/13-02-2020)</p>';
		
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		
		
		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="eidos_programmatos">Είδος προγράμματος:</label> 
		<select class="form-select" name=eidos_programmatos id=eidos_programmatos"><option>{$ary_assoc['eidos_programmatos']}</option><option disabled></option><option>Περιβαλλοντικής εκπαίδευσης</option><option>Αγωγής υγείας</option><option>Πολιτιστικών θεμάτων</option><option>Αγωγής σταδιοδρομίας</option></select></div>
		<div class="form-group"><label for="titlos_programmatos">Τίτλος του προγράμματος:</label> <input class="form-control" type=text name=titlos_programmatos id=titlos_programmatos value="{$ary_assoc['titlos_programmatos']}" size="50"></div><p></p>
		<div class="form-group"><label for="ar_pr_egrisis_programmatosdde">Αρ. πρωτ. έγκρισης του προγράμματος σχολικών δραστηριοτήτων:</label> <input class="form-control" type=text class="form-control" name=ar_pr_egrisis_programmatosdde id=ar_pr_egrisis_programmatosdde value="{$ary_assoc['ar_pr_egrisis_programmatosdde']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>

		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
		<div class="form-group"><label for="asf_symbolaio">Αριθμός ασφαλιστηρίου συμβολαίου για τη διάρκεια του ταξιδιού και της διαμονής:</label> <input class="form-control" type=text class="form-control" name=asf_symbolaio id=asf_symbolaio value="{$ary_assoc['asf_symbolaio']}" placeholder="Αριθμός ή αναγνωριστικό συμβολαίου" size=30></div><p></p>
		<div class="form-group"><label for="praji_epilogi_praktoreiou">Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:</label> <input class="form-control" type=text class="form-control" name=praji_epilogi_praktoreiou id=praji_epilogi_praktoreiou value="{$ary_assoc['praji_epilogi_praktoreiou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
		<div class="form-group"><label for="a_arithmos">Αύξων αριθμός εκδρομής αυτού του είδους(π.χ.1 αν είναι η πρώτη για φέτος):</label> <input class="form-control" type=number class="form-control" name=a_arithmos id=a_arithmos value="{$ary_assoc['a_arithmos']}" size=3 min=1></div><p></p>
			
		<div class="form-group"><label for="ar_pr_anartisisprok">Αρ. Πρ. & ημ. διαβίβασης αιτήματος ανάρτησης προκήρυξης:</label> <input class="form-control" type=text class="form-control" name=ar_pr_anartisisprok id=ar_pr_anartisisprok value="{$ary_assoc['ar_pr_anartisisprok']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
			
		
		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Πόλη ή τοποθεσία" size=30></div><p></p>
		
		<div class="form-group"><label for="onoma_jenodoxeio">Όνομα Ξενοδοχείου:</label> <input class="form-control" type=text name=onoma_jenodoxeio id=onoma_jenodoxeio value="{$ary_assoc['onoma_jenodoxeio']}" size=30 placeholder="Επωνυμία"></div>
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>

		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="Αεροπλάνο, πλοίο κτλ."></div><p></p>

<!--		Πτήσεις και Αριθμοί πτήσεων αναχώρησης και επιστροφής ή ακτοπλοϊκά δρομολόγια κ.ο.κ.:<br>
		<div class="form-group"><label for="aritmoi_mesa_anaxorisis">Aναχώρησης:</label> <input class="form-control" type=text name=aritmoi_mesa_anaxorisis id=aritmoi_mesa_anaxorisis value="{$ary_assoc['aritmoi_mesa_anaxorisis']}" ></div>
		<div class="form-group"><label for="arithmoi_mesa_epistrofis">Eπιστροφής:</label> <input class="form-control" type=text name=arithmoi_mesa_epistrofis id=arithmoi_mesa_epistrofis value="{$ary_assoc['arithmoi_mesa_epistrofis']}" ></div><p></p>
-->			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες και ώρες</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία αναχώρησης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="hmera_epistrofis">Ημερομηνία επιστροφής:</label> <input class="form-control" type='text' readonly id='hmera_epistrofis' name='hmera_epistrofis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_epistrofis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="diarkeia_hmeres">Διάρκεια (ημέρες):</label> <input class="form-control" type=text name=diarkeia_hmeres id=diarkeia_hmeres value="{$ary_assoc['diarkeia_hmeres']}" size=2></div><p></p>
		
		<div class="form-group"><label for="ora_anaxorisis">Ώρα αναχώρησης από το σχολείο ή από άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_anaxorisis id=ora_anaxorisis value="{$ary_assoc['ora_anaxorisis']}" ></div><p></p>
		<div class="form-group"><label for="ora_afijis">Εκτιμώμενη (τοπική) ώρα άφιξης στον/στους προορισμό/σμούς:</label> <input class="form-control" type=time step=60 name=ora_afijis id=ora_afijis value="{$ary_assoc['ora_afijis']}" ></div><p></p>
		<div class="form-group"><label for="ora_apoxorisis">Εκτιμώμενη (τοπική) ώρα αποχώρησης:</label> <input class="form-control" type=time step=60 name=ora_apoxorisis id=ora_apoxorisis value="{$ary_assoc['ora_apoxorisis']}" ></div><p></p>
		<div class="form-group"><label for="ora_epistrofis">Ώρα επιστροφής στο σχολείο ή σε άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_epistrofis id=ora_epistrofis value="{$ary_assoc['ora_epistrofis']}"></div><p></p>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">
				
		<div class="form-group"><label for="ar_mathiton">Αριθμός συμμετεχόντων μαθητών στην παιδαγωγική ομάδα:</label> <input class="form-control" type=number size=5 min=1 name=ar_mathiton id=ar_mathiton value="{$ary_assoc['ar_mathiton']}"></div>
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		Υπάρχει το ποσοστό 70% της παιδαγωγικής ομάδας: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_pososto" id=check_pososto checked><label class="form-check-label" for="check_pososto">NAI</label></div>
		<p></p>
		
<!--	<div class="form-group"><label for="onoma_arxigos">Αρχηγός:</label> <input class="form-control" type=text name=onoma_arxigos id=onoma_arxigos value="{$ary_assoc['onoma_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div>
		<div class="form-group"><label for="onoma_anaplirotis_arxigos">Αναπληρωτής αρχηγός:</label> <input class="form-control" type=text name=onoma_anaplirotis_arxigos id=onoma_anaplirotis_arxigos value="{$ary_assoc['onoma_anaplirotis_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div><p></p>
-->
		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών:</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=20*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=20*document.getElementById('plithos_synodoi').value</script> </div><p></p>
		<div class="form-group"><label for="plithos_ektosomadas_synodoi">Πόσοι από τους παραπάνω συνοδούς δεν ανήκουν στην παιδαγωγική ομάδα:</label> <input class="form-control" type=number min=0 size=4 name=plithos_ektosomadas_synodoi id=plithos_ektosomadas_synodoi value="{$ary_assoc['plithos_ektosomadas_synodoi']}"> [Φυσιολογικά είναι μηδέν(εισάγετε 0 ή αφήστε κενό). Μόνο σε εξαιρετικές περιπτώσεις για λόγους ανωτέρας βίας επιτρέπονται συνοδοί εκτός ομάδας] </div><p></p>

<!--
		<div class="form-group"><label for="onomata_synodoi">Συνοδοί:</label> (Προσοχή 1 ανά 20 μαθητές για εξωτερικό) <textarea class="form-control" name=onomata_synodoi id=onomata_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['onomata_synodoi']}</textarea></div>
		<div class="form-group"><label for="anaplirotes_synodoi">Αναπληρωτές συνοδοί:</label> <textarea class="form-control" name=anaplirotes_synodoi id=anaplirotes_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['anaplirotes_synodoi']}</textarea></div><p></p>
-->		Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_ypefth" id=check_ypefth checked><label class="form-check-label" for="check_ypefth">NAI</label></div>
		
			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_epistrofis');
		SendCalendarInit('hmera_diavivastikou');
		}
		break;
		case 'Εκπαιδευτική εκδρομή στο εσωτερικό':
		{
		echo '<p>Εκπαιδευτικές επισκέψεις  στο εσωτερικό στο πλαίσιο του Αναλυτικού Προγράμματος άρθρο 3, § 2 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)</p>';
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		
		
		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>

		<div class="form-group"><label for="mathimata">Μαθήματα Αναλυτικού Προγράμματος σχετικά με την εκδρομή:</label> <textarea class="form-control" name=mathimata id=mathimata rows="2" cols="35" placeholder="1ο μάθημα, 2ο μάθημα, κτλ.">{$ary_assoc['mathimata']}</textarea> [διαχωρίστε με κόμματα]</div><p></p>

		<div class="form-group"><label for="a_arithmos">Αύξων αριθμός εκδρομής αυτού του είδους(π.χ.1 αν είναι η πρώτη για φέτος):</label> <input class="form-control" type=number class="form-control" name=a_arithmos id=a_arithmos value="{$ary_assoc['a_arithmos']}" size=3 min=1></div><p></p>
			
		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Πόλη ή τοποθεσία" size=30></div><p></p>
		
		<div class="form-group"><label for="onoma_jenodoxeio">Όνομα Ξενοδοχείου:</label> <input class="form-control" type=text name=onoma_jenodoxeio id=onoma_jenodoxeio value="{$ary_assoc['onoma_jenodoxeio']}" size=30 placeholder="Επωνυμία"> [αφήστε κενό αν δεν υπάρχει διανυκτέρευση]</div><p></p>
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>

		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="Αεροπλάνο, πλοίο κτλ."></div><p></p>

<!--		Πτήσεις και Αριθμοί πτήσεων αναχώρησης και επιστροφής ή ακτοπλοϊκά δρομολόγια κ.ο.κ.:<br>
		<div class="form-group"><label for="aritmoi_mesa_anaxorisis">Aναχώρησης:</label> <input class="form-control" type=text name=aritmoi_mesa_anaxorisis id=aritmoi_mesa_anaxorisis value="{$ary_assoc['aritmoi_mesa_anaxorisis']}" ></div>
		<div class="form-group"><label for="arithmoi_mesa_epistrofis">Eπιστροφής:</label> <input class="form-control" type=text name=arithmoi_mesa_epistrofis id=arithmoi_mesa_epistrofis value="{$ary_assoc['arithmoi_mesa_epistrofis']}" ></div><p></p>
-->			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες και ώρες</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία αναχώρησης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="hmera_epistrofis">Ημερομηνία επιστροφής:</label> <input class="form-control" type='text' readonly id='hmera_epistrofis' name='hmera_epistrofis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_epistrofis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="diarkeia_hmeres">Διάρκεια (ημέρες):</label> <input class="form-control" type=text name=diarkeia_hmeres id=diarkeia_hmeres value="{$ary_assoc['diarkeia_hmeres']}" size=2></div><p></p>
		
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">
				
		<div class="form-group"><label for="tmimata">Τάξεις ή τμήματα:</label> <input class="form-control" type=text name=tmimata id=tmimata value="{$ary_assoc['tmimata']}" size="30" placeholder="Α, Β, Γ"> [διαχωρίστε με κόμματα αν χρειάζεται] </div><p></p>
		
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		Υπάρχει το ποσοστό 70% των φοιτώντων μαθητών/τριών: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_pososto" id=check_pososto checked><label class="form-check-label" for="check_pososto">NAI</label></div>
		<p></p>
		
<!--	<div class="form-group"><label for="onoma_arxigos">Αρχηγός:</label> <input class="form-control" type=text name=onoma_arxigos id=onoma_arxigos value="{$ary_assoc['onoma_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div>
		<div class="form-group"><label for="onoma_anaplirotis_arxigos">Αναπληρωτής αρχηγός:</label> <input class="form-control" type=text name=onoma_anaplirotis_arxigos id=onoma_anaplirotis_arxigos value="{$ary_assoc['onoma_anaplirotis_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div><p></p>
-->
		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών (εκτός από τον αρχηγό της εκδρομής):</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=25*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=25*document.getElementById('plithos_synodoi').value</script> </div><p></p>

<!--
		<div class="form-group"><label for="onomata_synodoi">Συνοδοί:</label> (Προσοχή 1 ανά 20 μαθητές για εξωτερικό) <textarea class="form-control" name=onomata_synodoi id=onomata_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['onomata_synodoi']}</textarea></div>
		<div class="form-group"><label for="anaplirotes_synodoi">Αναπληρωτές συνοδοί:</label> <textarea class="form-control" name=anaplirotes_synodoi id=anaplirotes_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['anaplirotes_synodoi']}</textarea></div><p></p>
-->		Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_ypefth" id=check_ypefth checked><label class="form-check-label" for="check_ypefth">NAI</label></div>
		
			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_epistrofis');
		SendCalendarInit('hmera_diavivastikou');
	
		}
		break;
		case 'Εκπαιδευτική εκδρομή στο εξωτερικό':
		{
		echo '<p>Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο του Αναλυτικού Προγράμματος άρθρο 3, § 2 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)</p>';
		
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		
		
		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
		<div class="form-group"><label for="asf_symbolaio">Αριθμός ασφαλιστηρίου συμβολαίου για τη διάρκεια του ταξιδιού και της διαμονής:</label> <input class="form-control" type=text class="form-control" name=asf_symbolaio id=asf_symbolaio value="{$ary_assoc['asf_symbolaio']}" placeholder="Αριθμός ή αναγνωριστικό συμβολαίου" size=30></div><p></p>
		<div class="form-group"><label for="praji_epilogi_praktoreiou">Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:</label> <input class="form-control" type=text class="form-control" name=praji_epilogi_praktoreiou id=praji_epilogi_praktoreiou value="{$ary_assoc['praji_epilogi_praktoreiou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
		<div class="form-group"><label for="a_arithmos">Αύξων αριθμός εκδρομής αυτού του είδους(π.χ.1 αν είναι η πρώτη για φέτος):</label> <input class="form-control" type=number class="form-control" name=a_arithmos id=a_arithmos value="{$ary_assoc['a_arithmos']}" size=3 min=1></div><p></p>
			
		<div class="form-group"><label for="ar_pr_anartisisprok">Αρ. Πρ. & ημ. διαβίβασης αιτήματος ανάρτησης προκήρυξης:</label> <input class="form-control" type=text class="form-control" name=ar_pr_anartisisprok id=ar_pr_anartisisprok value="{$ary_assoc['ar_pr_anartisisprok']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
			
		
		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Πόλη ή τοποθεσία" size=30></div><p></p>
		
		<div class="form-group"><label for="onoma_jenodoxeio">Όνομα Ξενοδοχείου:</label> <input class="form-control" type=text name=onoma_jenodoxeio id=onoma_jenodoxeio value="{$ary_assoc['onoma_jenodoxeio']}" size=30 placeholder="Επωνυμία"></div>
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>

		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="Αεροπλάνο, πλοίο κτλ."></div><p></p>

<!--		Πτήσεις και Αριθμοί πτήσεων αναχώρησης και επιστροφής ή ακτοπλοϊκά δρομολόγια κ.ο.κ.:<br>
		<div class="form-group"><label for="aritmoi_mesa_anaxorisis">Aναχώρησης:</label> <input class="form-control" type=text name=aritmoi_mesa_anaxorisis id=aritmoi_mesa_anaxorisis value="{$ary_assoc['aritmoi_mesa_anaxorisis']}" ></div>
		<div class="form-group"><label for="arithmoi_mesa_epistrofis">Eπιστροφής:</label> <input class="form-control" type=text name=arithmoi_mesa_epistrofis id=arithmoi_mesa_epistrofis value="{$ary_assoc['arithmoi_mesa_epistrofis']}" ></div><p></p>
-->			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες και ώρες</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία αναχώρησης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="hmera_epistrofis">Ημερομηνία επιστροφής:</label> <input class="form-control" type='text' readonly id='hmera_epistrofis' name='hmera_epistrofis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_epistrofis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="diarkeia_hmeres">Διάρκεια (ημέρες):</label> <input class="form-control" type=text name=diarkeia_hmeres id=diarkeia_hmeres value="{$ary_assoc['diarkeia_hmeres']}" size=2></div><p></p>
		
		<div class="form-group"><label for="ora_anaxorisis">Ώρα αναχώρησης από το σχολείο ή από άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_anaxorisis id=ora_anaxorisis value="{$ary_assoc['ora_anaxorisis']}" ></div><p></p>
		<div class="form-group"><label for="ora_afijis">Εκτιμώμενη (τοπική) ώρα άφιξης στον/στους προορισμό/σμούς:</label> <input class="form-control" type=time step=60 name=ora_afijis id=ora_afijis value="{$ary_assoc['ora_afijis']}" ></div><p></p>
		<div class="form-group"><label for="ora_apoxorisis">Εκτιμώμενη (τοπική) ώρα αποχώρησης:</label> <input class="form-control" type=time step=60 name=ora_apoxorisis id=ora_apoxorisis value="{$ary_assoc['ora_apoxorisis']}" ></div><p></p>
		<div class="form-group"><label for="ora_epistrofis">Ώρα επιστροφής στο σχολείο ή σε άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_epistrofis id=ora_epistrofis value="{$ary_assoc['ora_epistrofis']}"></div><p></p>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">
				
		<div class="form-group"><label for="ar_mathiton">Συνολικός αριθμός φοιτούντων μαθητών/τριών :</label> <input class="form-control" type=number size=5 min=1 name=ar_mathiton id=ar_mathiton value="{$ary_assoc['ar_mathiton']}"></div>
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών/τριών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		Υπάρχει το ποσοστό 70% των μαθητών/τριών: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_pososto" id=check_pososto checked><label class="form-check-label" for="check_pososto">NAI</label></div>
		<p></p>
		
<!--	<div class="form-group"><label for="onoma_arxigos">Αρχηγός:</label> <input class="form-control" type=text name=onoma_arxigos id=onoma_arxigos value="{$ary_assoc['onoma_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div>
		<div class="form-group"><label for="onoma_anaplirotis_arxigos">Αναπληρωτής αρχηγός:</label> <input class="form-control" type=text name=onoma_anaplirotis_arxigos id=onoma_anaplirotis_arxigos value="{$ary_assoc['onoma_anaplirotis_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div><p></p>
-->
		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών (εκτός του/της αρχηγού):</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=20*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=20*document.getElementById('plithos_synodoi').value</script> </div><p></p>
		

<!--
		<div class="form-group"><label for="onomata_synodoi">Συνοδοί:</label> (Προσοχή 1 ανά 20 μαθητές για εξωτερικό) <textarea class="form-control" name=onomata_synodoi id=onomata_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['onomata_synodoi']}</textarea></div>
		<div class="form-group"><label for="anaplirotes_synodoi">Αναπληρωτές συνοδοί:</label> <textarea class="form-control" name=anaplirotes_synodoi id=anaplirotes_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['anaplirotes_synodoi']}</textarea></div><p></p>
-->		Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_ypefth" id=check_ypefth checked><label class="form-check-label" for="check_ypefth">NAI</label></div>
		
			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_epistrofis');
		SendCalendarInit('hmera_diavivastikou');
			
		}
		break;
		case 'Διδακτική επίσκεψη':
		{
		echo '<p>Διδακτική επίσκεψη -άρθρο 4 της Y.A. 20883/ΓΔ4/12-02-2020 (ΦΕΚ 456/τ.Β’/13-02-2020)</p>';
		
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		
		
		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="titlos_programmatos">Στο πλαίσιο του μαθήματος:</label> <input class="form-control" type=text name=titlos_programmatos id=titlos_programmatos value="{$ary_assoc['titlos_programmatos']}" size="50"></div><p></p>

		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"> [Απόφαση του Σ.Δ. για τη μετακίνηση 10 ημέρες πριν] </div>  <p></p>

		<div class="form-group"><label for="a_arithmos">Αύξων αριθμός εκδρομής αυτού του είδους(π.χ.1 αν είναι η πρώτη για φέτος):</label> <input class="form-control" type=number class="form-control" name=a_arithmos id=a_arithmos value="{$ary_assoc['a_arithmos']}" size=3 min=1> [Έως εννέα (9) διδακτικές επισκέψεις, ανά τάξη ή τμήμα ή ομάδες τμημάτων, τομέα ειδικότητα ή τμήμα ειδικότητας] </div><p></p>
		
		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Τοποθεσία" size=30></div><p></p>

			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες και ώρες</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία επίσκεψης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">
				
		<div class="form-group"><label for="tmimata">Τάξεις ή τμήματα:</label> <input class="form-control" type=text name=tmimata id=tmimata value="{$ary_assoc['tmimata']}" size="30" placeholder="Α, Β, Γ"> [διαχωρίστε με κόμματα αν χρειάζεται] </div><p></p>
		
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		<p></p>
		
		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών (εκτός του αρχηγού):</label> <input class="form-control" type=number min=1 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=25*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=25*document.getElementById('plithos_synodoi').value</script> </div><p></p>
[Ένας 1 συνοδός/25 μαθητές (εκτός του αρχηγού). Σε εξαιρετικές περιπτώσεις επιτρέπονται μέχρι δύο επιπλέον συνοδοί εφόσον ο Σύλλογος Διδασκόντων
 το κρίνει απαραίτητο και το αιτιολογεί πλήρως]
		
			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_diavivastikou');
			
		}
		break;
		case 'Επίσκεψη στη Βουλή των Ελλήνων':
		{
		echo '<p>Επίσκεψη στη Βουλή των Ελλήνων -άρθρο 7 της 20883/ΓΔ4/12-02-2020 Y.A. (ΦΕΚ 456/τ.Β’/13-02-2020)</p>';
		
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		
		
		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"> [20 ημέρες πριν από τη μετακίνηση] </div><p></p>
		
		<div class="form-group"><label for="onoma_jenodoxeio">Όνομα Ξενοδοχείου:</label> <input class="form-control" type=text name=onoma_jenodoxeio id=onoma_jenodoxeio value="{$ary_assoc['onoma_jenodoxeio']}" size=30 placeholder="Επωνυμία"></div>
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>

		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="Αεροπλάνο, λεωφορείο κτλ."></div><p></p>

			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες και ώρες</div>
			<div class="panel-body">

		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία αναχώρησης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="hmera_epistrofis">Ημερομηνία επιστροφής:</label> <input class="form-control" type='text' readonly id='hmera_epistrofis' name='hmera_epistrofis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_epistrofis']}' size=10 maxlength=10></div> <br>[Από την έναρξη του διδακτικού έτους έως και δέκα (10) ημέρες πριν από τη λήξη των μαθημάτων]<br> <br>
		<div class="form-group"><label for="diarkeia_hmeres">Διάρκεια (ημέρες):</label> <input class="form-control" type=text name=diarkeia_hmeres id=diarkeia_hmeres value="{$ary_assoc['diarkeia_hmeres']}" size=2> [Μπορεί να συμπεριλαμβάνονται έως 2 διανυκτερεύσεις]</div><p></p>
		
		<div class="form-group"><label for="ora_anaxorisis">Ώρα αναχώρησης από το σχολείο ή από άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_anaxorisis id=ora_anaxorisis value="{$ary_assoc['ora_anaxorisis']}" > [μετά τις 6.00 π.μ.]</div><p></p>
		<div class="form-group"><label for="ora_epistrofis">Ώρα επιστροφής στο σχολείο ή σε άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_epistrofis id=ora_epistrofis value="{$ary_assoc['ora_epistrofis']}"> [το αργότερο έως τις 10.00 μ.μ. όταν η εκδρομή  πραγματοποιείται οδικώς] </div><p></p>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">
				
		<div class="form-group"><label for="tmimata">Τάξη ή/και τμήμα:</label> <input class="form-control" type=text name=tmimata id=tmimata value="{$ary_assoc['tmimata']}" size="30"></div><p></p>
		<div class="form-group"><label for="ar_mathiton">Συνολικός αριθμός μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_mathiton id=ar_mathiton value="{$ary_assoc['ar_mathiton']}"></div>
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		Υπάρχει το ποσοστό 50% των μαθητών: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_pososto" id=check_pososto checked><label class="form-check-label" for="check_pososto">NAI</label></div>
		<p></p>
		
<!--	<div class="form-group"><label for="onoma_arxigos">Αρχηγός:</label> <input class="form-control" type=text name=onoma_arxigos id=onoma_arxigos value="{$ary_assoc['onoma_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div>
		<div class="form-group"><label for="onoma_anaplirotis_arxigos">Αναπληρωτής αρχηγός:</label> <input class="form-control" type=text name=onoma_anaplirotis_arxigos id=onoma_anaplirotis_arxigos value="{$ary_assoc['onoma_anaplirotis_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div><p></p>
-->
		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών(εκτός του/της αρχηγού):</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=25*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=25*document.getElementById('plithos_synodoi').value</script> </div> [Σε εξαιρετικές περιπτώσεις επιτρέπονται μέχρι δύο επιπλέον συνοδοί εφόσον ο Σύλλογος Διδασκόντων το κρίνει απαραίτητο και το αιτιολογεί πλήρως]<p></p>

<!--
		<div class="form-group"><label for="onomata_synodoi">Συνοδοί:</label> (Προσοχή 1 ανά 20 μαθητές για εξωτερικό) <textarea class="form-control" name=onomata_synodoi id=onomata_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['onomata_synodoi']}</textarea></div>
		<div class="form-group"><label for="anaplirotes_synodoi">Αναπληρωτές συνοδοί:</label> <textarea class="form-control" name=anaplirotes_synodoi id=anaplirotes_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['anaplirotes_synodoi']}</textarea></div><p></p>
-->		
			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_epistrofis');
		SendCalendarInit('hmera_diavivastikou');
			
		}
		break;
		case 'Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού':
		{
		echo '<p>Συμμετοχή μαθητών και μαθητριών σε διαγωνισμούς, μαθητικά συνέδρια, ημερίδες και λοιπές εκδηλώσεις στο εσωτερικό 
		άρθρο 8 της Y.A.20883/ΓΔ4/12-02-2020 (ΦΕΚ 456/τ.Β’/13-02-2020)</p>';
		
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		
		
		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="titlos_programmatos">Τίτλος εκδήλωσης:</label> <input class="form-control" type=text name=titlos_programmatos id=titlos_programmatos value="{$ary_assoc['titlos_programmatos']}" size="50" placeholder="Διαγωνισμός Φυσικής, Συνέδριο κτλ."> [διαγωνισμός/εκδήλωση/συνέδριο κτλ.]</div><p></p>

		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"> [10 ημέρες πριν από ημερήσια μετακίνηση και 20 ημέρες πριν από μετακίνηση με διανυκτέρευση] </div><p></p>
		<div class="form-group"><label for="a_arithmos">Αύξων αριθμός εκδρομής αυτού του είδους(π.χ.1 αν είναι η πρώτη για φέτος):</label> <input class="form-control" type=number class="form-control" name=a_arithmos id=a_arithmos value="{$ary_assoc['a_arithmos']}" size=3 min=1></div><p></p>
			
		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Πόλη ή τοποθεσία" size=30></div><p></p>
		
		<div class="form-group"><label for="onoma_jenodoxeio">Όνομα Ξενοδοχείου:</label> <input class="form-control" type=text name=onoma_jenodoxeio id=onoma_jenodoxeio value="{$ary_assoc['onoma_jenodoxeio']}" size=30 placeholder="Επωνυμία"> [αφήστε κενό αν δεν υπάρχει διανυκτέρευση]</div>
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>

		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="Αεροπλάνο, πλοίο κτλ."></div><p></p>

			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες και ώρες</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία αναχώρησης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="hmera_epistrofis">Ημερομηνία επιστροφής:</label> <input class="form-control" type='text' readonly id='hmera_epistrofis' name='hmera_epistrofis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_epistrofis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="diarkeia_hmeres">Διάρκεια (ημέρες):</label> <input class="form-control" type=text name=diarkeia_hmeres id=diarkeia_hmeres value="{$ary_assoc['diarkeia_hmeres']}" size=2></div><p></p>
		
		<div class="form-group"><label for="ora_anaxorisis">Ώρα αναχώρησης από το σχολείο ή από άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_anaxorisis id=ora_anaxorisis value="{$ary_assoc['ora_anaxorisis']}" > [μετά τις 6.00 π.μ.]</div><p></p>
		<div class="form-group"><label for="ora_epistrofis">Ώρα επιστροφής στο σχολείο ή σε άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_epistrofis id=ora_epistrofis value="{$ary_assoc['ora_epistrofis']}"> [το αργότερο έως τις 10.00 μ.μ. όταν η εκδρομή  πραγματοποιείται οδικώς]</div><p></p>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">
				
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		<p></p>
		
		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών (εκτός του αρχηγού):</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=25*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=25*document.getElementById('plithos_synodoi').value</script> </div><p></p>

		Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_ypefth" id=check_ypefth checked><label class="form-check-label" for="check_ypefth">NAI</label></div>
		
			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_epistrofis');
		SendCalendarInit('hmera_diavivastikou');
			
		}
		break;
		case 'Εκπαιδευτικών ανταλλαγών σε συνέχεια διακρατικών συμφωνιών/μνημονίων συνεργασίας/εκτελεστικών προγραμμάτων':
			display_europaika($ary_assoc);
		break;
		case 'Αδελφοποιήσεων':
			display_europaika($ary_assoc);
		break;
		case 'Εκπαιδευτικών προγραμμάτων της Γενικής Γραμματείας Θρησκευμάτων':	
			display_europaika($ary_assoc);
		break;
		case 'Ευρωπαϊκών προγραμμάτων δραστηριοτήτων/προγραμμάτων που δε γίνονται στο πλαίσιο του ευρωπαϊκού προγράμματος Erasmus':
			display_europaika($ary_assoc);
		break;
		case 'Προγραμμάτων διεθνών οργανισμών':
			display_europaika($ary_assoc);
		break;
		case 'Συμμετοχών σε διεθνείς συναντήσεις, συνέδρια, ημερίδες, διαγωνισμούς, μαθητικές επιστημονικές ολυμπιάδες και άλλες διεθνής εκδηλώσεις':
			display_europaika($ary_assoc);
		break;
		case 'Προσκλήσεις σχολείων της περ.α του άρθρου 3 του ν. 4415/2016 (Α΄ 159)':
			display_europaika($ary_assoc);break;
		case 'Βράβευσης με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας':
			display_europaika($ary_assoc);
		break;
		case 'Πιλοτικών προγραμμάτων διεθνών σχολικών δικτύων που εγκρίνονται ή συντονίζονται από το Υπουργείο Παιδείας':
			display_europaika($ary_assoc);
		break;
		case 'Επισκέψεων σε ερευνητικά κέντρα, εκπαιδευτικά ιδρύματα, πανεπιστήμια, κέντρα πολιτισμού και/ή αθλητισμού':
			display_europaika($ary_assoc);break;
		case 'Επισκέψεων σε ευρωπαϊκούς θεσμούς/διεθνείς οργανώσεις κατόπιν σχετικής πρόσκλησης και αποδοχής τυχόν αιτήματος από το διεθνή οργανισμό':
			display_europaika($ary_assoc);break;
		case 'Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2':
		{
		echo '<p>Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2</p>';
		
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="eidos_programmatos">Είδος προγράμματος:</label> <input class="form-control" type=text name=eidos_programmatos id=eidos_programmatos value="{$ary_assoc['eidos_programmatos']}" size="50"></div><br> <br>
		
		<div class="form-group"><label for="titlos_programmatos">Τίτλος του προγράμματος:</label> <input class="form-control" type=text name=titlos_programmatos id=titlos_programmatos value="{$ary_assoc['titlos_programmatos']}" size="50"></div><p></p>
		<div class="form-group"><label for="ar_pr_egrisis_programmatosdde">Κωδικός προγράμματος:</label> <input class="form-control" type=text class="form-control" name=ar_pr_egrisis_programmatosdde id=ar_pr_egrisis_programmatosdde value="{$ary_assoc['ar_pr_egrisis_programmatosdde']}"></div>
		<div class="form-group"><label for="erasmus_ar_simbasis">Αρ. Σύμβασης:</label> <input class="form-control" type=text class="form-control" name=erasmus_ar_simbasis id=erasmus_ar_simbasis value="{$ary_assoc['erasmus_ar_simbasis']}"><small>[εάν χρειάζεται]</small></div><p></p>

		<div class="form-group"><label for="ar_pr_anartisisprok">Αρ. Πρ. & ημ. διαβίβασης αιτήματος ανάρτησης προκήρυξης:</label> <input class="form-control" type=text class="form-control" name=ar_pr_anartisisprok id=ar_pr_anartisisprok value="{$ary_assoc['ar_pr_anartisisprok']}" placeholder="Αριθμός και ημερομηνία"></div><small>[δε γίνεται ανάρτηση όταν οι μετακινούμενοι είναι έως 10 μαζί με τους Εκπ/κούς]</small><p></p>
		<div class="form-group"><label for="praji_epilogi_praktoreiou">Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:</label> <input class="form-control" type=text class="form-control" name=praji_epilogi_praktoreiou id=praji_epilogi_praktoreiou value="{$ary_assoc['praji_epilogi_praktoreiou']}" placeholder="Αριθμός και ημερομηνία"></div><small>[δε γίνεται όταν οι μετακινούμενοι είναι έως 10 μαζί με τους Εκπ/κούς]</small><p></p>

		<div class="form-group"><label for="erasmus_ar_prajis_syllogou_sigrotisi">Αριθμός και ημερομηνία πράξης συλλόγου για τη συγκρότηση της παιδαγωγικής ομάδας:</label> <input class="form-control" type=text class="form-control" name=erasmus_ar_prajis_syllogou_sigrotisi id=erasmus_ar_prajis_syllogou_sigrotisi value="{$ary_assoc['erasmus_ar_prajis_syllogou_sigrotisi']}"></div><p></p>
		<div class="form-group"><label for="erasmus_ar_prajis_syllogou_anasigrotisi">Αριθμός και ημερομηνία πράξης συλλόγου για την ανασυγκρότηση της παιδαγωγικής ομάδας:</label> <input class="form-control" type=text class="form-control" name=erasmus_ar_prajis_syllogou_anasigrotisi id=erasmus_ar_prajis_syllogou_anasigrotisi value="{$ary_assoc['erasmus_ar_prajis_syllogou_anasigrotisi']}"></div><small>[εάν έχει τροποποιηθεί αλλιώς κενό]</small><p></p>

		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>

		<div class="form-group"><label for="erasmus_ar_prajis_syllogon_sinainesi">Αριθμός και ημερομηνία πράξης συλλόγου του/των ΕΠΑΛ ότι συναινεί/ούν για τη μετακίνηση του Ε.Κ.:</label> <input class="form-control" type=text class="form-control" name=erasmus_ar_prajis_syllogon_sinainesi id=erasmus_ar_prajis_syllogon_sinainesi value="{$ary_assoc['erasmus_ar_prajis_syllogon_sinainesi']}" placeholder="Αριθμός και ημερομηνία"></div><small>[εφόσον χρειάζεται]</small><p></p>

		<div class="form-group"><label for="erasmus_ar_prot_beb_dieythinton">Αριθμός πρωτοκόλλου και ημερομηνία βεβαίωσης/σεων του Διευθυντή/ντών του/των σχολείου/σχολείων για τον/τους εκπαιδευτικό/κούς που διδάσκουν και σε αυτό/τά:</label> <input class="form-control" type=text class="form-control" name=erasmus_ar_prot_beb_dieythinton id=erasmus_ar_prot_beb_dieythinton value="{$ary_assoc['erasmus_ar_prot_beb_dieythinton']}" placeholder="Αριθμός και ημερομηνία"></div><small>[κενό αν δεν ισχύει]</small><p></p>
		<div class="form-group"><label for="asf_symbolaio">Αριθμός ασφαλιστηρίου συμβολαίου αστικής-επαγγελματικής ευθύνης για τη διάρκεια του ταξιδιού και της διαμονής:</label> <input class="form-control" type=text class="form-control" name=asf_symbolaio id=asf_symbolaio value="{$ary_assoc['asf_symbolaio']}" placeholder="Αριθμός ή αναγνωριστικό συμβολαίου" size=30></div><p></p>


		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Πόλη ή τοποθεσία" size=30></div><p></p>
		
<!--		<div class="form-group"><label for="onoma_jenodoxeio">Όνομα Ξενοδοχείου:</label> <input class="form-control" type=text name=onoma_jenodoxeio id=onoma_jenodoxeio value="{$ary_assoc['onoma_jenodoxeio']}" size=30 placeholder="Επωνυμία"></div>
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>
-->
		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="Αεροπλάνο, πλοίο κτλ."></div><p></p>

<!--		Πτήσεις και Αριθμοί πτήσεων αναχώρησης και επιστροφής ή ακτοπλοϊκά δρομολόγια κ.ο.κ.:<br>
		<div class="form-group"><label for="aritmoi_mesa_anaxorisis">Aναχώρησης:</label> <input class="form-control" type=text name=aritmoi_mesa_anaxorisis id=aritmoi_mesa_anaxorisis value="{$ary_assoc['aritmoi_mesa_anaxorisis']}" ></div>
		<div class="form-group"><label for="arithmoi_mesa_epistrofis">Eπιστροφής:</label> <input class="form-control" type=text name=arithmoi_mesa_epistrofis id=arithmoi_mesa_epistrofis value="{$ary_assoc['arithmoi_mesa_epistrofis']}" ></div><p></p>
-->			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες και ώρες</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία αναχώρησης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="hmera_epistrofis">Ημερομηνία επιστροφής:</label> <input class="form-control" type='text' readonly id='hmera_epistrofis' name='hmera_epistrofis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_epistrofis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="diarkeia_hmeres">Διάρκεια (ημέρες):</label> <input class="form-control" type=text name=diarkeia_hmeres id=diarkeia_hmeres value="{$ary_assoc['diarkeia_hmeres']}" size=2></div><p></p>
		
		<div class="form-group"><label for="ora_anaxorisis">Ώρα αναχώρησης από το σχολείο ή από άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_anaxorisis id=ora_anaxorisis value="{$ary_assoc['ora_anaxorisis']}" ></div><p></p>
		<div class="form-group"><label for="ora_afijis">Εκτιμώμενη (τοπική) ώρα άφιξης στον/στους προορισμό/σμούς:</label> <input class="form-control" type=time step=60 name=ora_afijis id=ora_afijis value="{$ary_assoc['ora_afijis']}" ></div><p></p>
		<div class="form-group"><label for="ora_apoxorisis">Εκτιμώμενη (τοπική) ώρα αποχώρησης:</label> <input class="form-control" type=time step=60 name=ora_apoxorisis id=ora_apoxorisis value="{$ary_assoc['ora_apoxorisis']}" ></div><p></p>
		<div class="form-group"><label for="ora_epistrofis">Ώρα επιστροφής στο σχολείο ή σε άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_epistrofis id=ora_epistrofis value="{$ary_assoc['ora_epistrofis']}"></div><p></p>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">

		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών:</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=20*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=20*document.getElementById('plithos_synodoi').value</script> </div><p></p>
			
		<div class="form-group"><label for="onoma_arxigos">Αρχηγός:</label> <input class="form-control" type=text name=onoma_arxigos id=onoma_arxigos value="{$ary_assoc['onoma_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div>
		<div class="form-group"><label for="onoma_anaplirotis_arxigos">Αναπληρωτής αρχηγός:</label> <input class="form-control" type=text name=onoma_anaplirotis_arxigos id=onoma_anaplirotis_arxigos value="{$ary_assoc['onoma_anaplirotis_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div><p></p>

			<div class="form-group"><label>Ονομαστική λίστα συνοδών: (Ονοματεπώνυμο και ειδικότητα)</label> 
				<div id="atomaline-holderA" 
				style="display: flex;  height: 200px;  background: #666;  border: 1px solid #666;">
					<textarea id="atomaline-numbersA"
					style="
					outline: none;  background: lightgrey;    border: none;  height: 99%;  resize: none;
					width: 3em;  text-align: right;  pointer-events: none;  overflow: hidden;  padding-right: 3px;  "></textarea>
				<textarea id="erasmus_lista_kathig_kaieidikotita" name="erasmus_lista_kathig_kaieidikotita" oninput="genNumbersA()" onchange="genNumbersA()"
				style= "
				outline: none;  background: #f5f5f5;    border: none;  height: 99%;  resize: none;
				width: 100%;  padding-left: 3px;  margin-left: 1px;  white-space: nowrap;" placeholder="Επώνυμο Ονομα ΠΕΧΧ">{$ary_assoc['erasmus_lista_kathig_kaieidikotita']}</textarea>
				</div>
			</div>
			
			<div class="form-group"><label>Ονομαστική λίστα <u>αναπληρωτών</u> συνοδών: (Ονοματεπώνυμο και ειδικότητα)</label> 
				<div id="atomaline-holderΒ" 
				style="display: flex;  height: 200px;  background: #666;  border: 1px solid #666;">
					<textarea id="atomaline-numbersB"
					style="
					outline: none;  background: lightgrey;    border: none;  height: 99%;  resize: none;
					width: 3em;  text-align: right;  pointer-events: none;  overflow: hidden;  padding-right: 3px;  "></textarea>
				<textarea id="erasmus_lista_anaplirkathig_kaieid" name="erasmus_lista_anaplirkathig_kaieid" oninput="genNumbersB()" onchange="genNumbersB()"
				style= "
				outline: none;  background: #f5f5f5;    border: none;  height: 99%;  resize: none;
				width: 100%;  padding-left: 3px;  margin-left: 1px;  white-space: nowrap;" placeholder="Επώνυμο Ονομα ΠΕΧΧ">{$ary_assoc['erasmus_lista_anaplirkathig_kaieid']}</textarea>
				</div>			
			</div>
			
			<div class="form-group"><label>Ονομαστική λίστα μαθητών/τριών: (Ονοματεπώνυμο και <b>τάξη</b>)</label> 
				<div id="atomaline-holderC" 
				style="display: flex;  height: 200px;  background: #666;  border: 1px solid #666;">
					<textarea id="atomaline-numbersC"
					style="
					outline: none;  background: lightgrey;    border: none;  height: 99%;  resize: none;
					width: 3em;  text-align: right;  pointer-events: none;  overflow: hidden;  padding-right: 3px;  "></textarea>
				<textarea id="erasmus_lista_mathites_kaitaji" name="erasmus_lista_mathites_kaitaji" oninput="genNumbersC()" onchange="genNumbersC()"
				style= "
				outline: none;  background: #f5f5f5;    border: none;  height: 99%;  resize: none;
				width: 100%;  padding-left: 3px;  margin-left: 1px;  white-space: nowrap;" placeholder="Επώνυμο Ονομα της Χ' τάξης">{$ary_assoc['erasmus_lista_mathites_kaitaji']}</textarea>
				</div>			
			</div>		
		
			<p></p>

		
<!--		<div class="form-group"><label for="ar_mathiton">Αριθμός συμμετεχόντων μαθητών στην παιδαγωγική ομάδα:</label> <input class="form-control" type=number size=5 min=1 name=ar_mathiton id=ar_mathiton value="{$ary_assoc['ar_mathiton']}"></div>
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		Υπάρχει το ποσοστό 70% της παιδαγωγικής ομάδας: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_pososto" id=check_pososto checked><label class="form-check-label" for="check_pososto">NAI</label></div>
-->

<!--
		<div class="form-group"><label for="onomata_synodoi">Συνοδοί:</label> (Προσοχή 1 ανά 20 μαθητές για εξωτερικό) <textarea class="form-control" name=onomata_synodoi id=onomata_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['onomata_synodoi']}</textarea></div>
		<div class="form-group"><label for="anaplirotes_synodoi">Αναπληρωτές συνοδοί:</label> <textarea class="form-control" name=anaplirotes_synodoi id=anaplirotes_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['anaplirotes_synodoi']}</textarea></div><p></p>
-->		
		Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων: 
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_ypefth" id=check_ypefth checked><label class="form-check-label" for="check_ypefth">NAI</label></div>
		

<script type='text/javascript'>
let elmsA = {
  genList: document.getElementById('erasmus_lista_kathig_kaieidikotita'),
  genNumbers: document.getElementById('atomaline-numbersA'),
}
let elmsB = {
  genList: document.getElementById('erasmus_lista_anaplirkathig_kaieid'),
  genNumbers: document.getElementById('atomaline-numbersB'),
}
let elmsC = {
  genList: document.getElementById('erasmus_lista_mathites_kaitaji'),
  genNumbers: document.getElementById('atomaline-numbersC'),
}


elmsA.genList.addEventListener('scroll', (e) => {
  elmsA.genNumbers.scrollTop = elmsA.genList.scrollTop
})
elmsB.genList.addEventListener('scroll', (e) => {
  elmsB.genNumbers.scrollTop = elmsB.genList.scrollTop
})
elmsC.genList.addEventListener('scroll', (e) => {
  elmsC.genNumbers.scrollTop = elmsC.genList.scrollTop
})

function genNumbersA() {

  elmsA.genNumbers.value = ''

  var ln = (Array.from(elmsA.genList.value.matchAll('\\n')).length) + 1
  
  for (let i = 1; i <= ln; i++) {
    elmsA.genNumbers.value += i + '\\n'
  }
}
function genNumbersB() {

  elmsB.genNumbers.value = ''

  var ln = (Array.from(elmsB.genList.value.matchAll('\\n')).length) + 1
  
  for (let i = 1; i <= ln; i++) {
    elmsB.genNumbers.value += i + '\\n'
  }
}
function genNumbersC() {

  elmsC.genNumbers.value = ''

  var ln = (Array.from(elmsC.genList.value.matchAll('\\n')).length) + 1
  
  for (let i = 1; i <= ln; i++) {
    elmsC.genNumbers.value += i + '\\n'
  }
}
genNumbersA();
genNumbersB();
genNumbersC();
</script>			

			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;

		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_epistrofis');
		SendCalendarInit('hmera_diavivastikou');
		}
		
			break;
		case 'Μετακίνηση εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1':
		{
		echo '<p>Μετακίνηση εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1</p>';
		
		echo <<<EOF_FORM
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="eidos_programmatos">Είδος προγράμματος:</label> <input class="form-control" type=text name=eidos_programmatos id=eidos_programmatos value="{$ary_assoc['eidos_programmatos']}" size="50"></div><br> <br>
		
		<div class="form-group"><label for="titlos_programmatos">Τίτλος του προγράμματος:</label> <input class="form-control" type=text name=titlos_programmatos id=titlos_programmatos value="{$ary_assoc['titlos_programmatos']}" size="50"></div><p></p>
		<div class="form-group"><label for="ar_pr_egrisis_programmatosdde">Κωδικός προγράμματος:</label> <input class="form-control" type=text class="form-control" name=ar_pr_egrisis_programmatosdde id=ar_pr_egrisis_programmatosdde value="{$ary_assoc['ar_pr_egrisis_programmatosdde']}"></div>
		<div class="form-group"><label for="erasmus_ar_simbasis">Αρ. Σύμβασης:</label> <input class="form-control" type=text class="form-control" name=erasmus_ar_simbasis id=erasmus_ar_simbasis value="{$ary_assoc['erasmus_ar_simbasis']}"><small>[εάν χρειάζεται]</small></div><p></p>

		<div class="form-group"><label for="ar_pr_anartisisprok">Αρ. Πρ. & ημ. διαβίβασης αιτήματος ανάρτησης προκήρυξης:</label> <input class="form-control" type=text class="form-control" name=ar_pr_anartisisprok id=ar_pr_anartisisprok value="{$ary_assoc['ar_pr_anartisisprok']}" placeholder="Αριθμός και ημερομηνία"></div><small>[δε γίνεται ανάρτηση όταν οι μετακινούμενοι είναι έως 10 μαζί με τους Εκπ/κούς]</small><p></p>
		<div class="form-group"><label for="praji_epilogi_praktoreiou">Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:</label> <input class="form-control" type=text class="form-control" name=praji_epilogi_praktoreiou id=praji_epilogi_praktoreiou value="{$ary_assoc['praji_epilogi_praktoreiou']}" placeholder="Αριθμός και ημερομηνία"></div><small>[δε γίνεται όταν οι μετακινούμενοι είναι έως 10 μαζί με τους Εκπ/κούς]</small><p></p>

		<div class="form-group"><label for="erasmus_ar_prajis_syllogonu_sigrotisi">Αριθμός και ημερομηνία πράξης συλλόγου για τη συγκρότηση της παιδαγωγικής ομάδας:</label> <input class="form-control" type=text class="form-control" name=erasmus_ar_prajis_syllogou_sigrotisi id=erasmus_ar_prajis_syllogou_sigrotisi value="{$ary_assoc['erasmus_ar_prajis_syllogou_sigrotisi']}"></div><p></p>
		<div class="form-group"><label for="erasmus_ar_prajis_syllogou_anasigrotisi">Αριθμός και ημερομηνία πράξης συλλόγου για την ανασυγκρότηση της παιδαγωγικής ομάδας:</label> <input class="form-control" type=text class="form-control" name=erasmus_ar_prajis_syllogou_anasigrotisi id=erasmus_ar_prajis_syllogou_anasigrotisi value="{$ary_assoc['erasmus_ar_prajis_syllogou_anasigrotisi']}"></div><small>[εάν έχει τροποποιηθεί αλλιώς κενό]</small><p></p>

		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>

		<div class="form-group"><label for="erasmus_ar_prajis_syllogon_sinainesi">Αριθμός και ημερομηνία πράξης συλλόγου του/των ΕΠΑΛ ότι συναινεί/ούν για τη μετακίνηση του Ε.Κ.:</label> <input class="form-control" type=text class="form-control" name=erasmus_ar_prajis_syllogon_sinainesi id=erasmus_ar_prajis_syllogon_sinainesi value="{$ary_assoc['erasmus_ar_prajis_syllogon_sinainesi']}" placeholder="Αριθμός και ημερομηνία"></div><small>[εφόσον χρειάζεται]</small><p></p>

		<div class="form-group"><label for="erasmus_ar_prot_beb_dieythinton">Αριθμός πρωτοκόλλου και ημερομηνία βεβαίωσης/σεων του Διευθυντή/ντών του/των σχολείου/σχολείων για τον/τους εκπαιδευτικό/κούς που διδάσκουν και σε αυτό/τά:</label> <input class="form-control" type=text class="form-control" name=erasmus_ar_prot_beb_dieythinton id=erasmus_ar_prot_beb_dieythinton value="{$ary_assoc['erasmus_ar_prot_beb_dieythinton']}" placeholder="Αριθμός και ημερομηνία"></div><small>[κενό αν δεν ισχύει]</small><p></p>
		<div class="form-group"><label for="asf_symbolaio">Αριθμός ασφαλιστηρίου συμβολαίου αστικής-επαγγελματικής ευθύνης για τη διάρκεια του ταξιδιού και της διαμονής:</label> <input class="form-control" type=text class="form-control" name=asf_symbolaio id=asf_symbolaio value="{$ary_assoc['asf_symbolaio']}" placeholder="Αριθμός ή αναγνωριστικό συμβολαίου" size=30></div><p></p>


		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Πόλη ή τοποθεσία" size=30></div><p></p>
		
<!--		<div class="form-group"><label for="onoma_jenodoxeio">Όνομα Ξενοδοχείου:</label> <input class="form-control" type=text name=onoma_jenodoxeio id=onoma_jenodoxeio value="{$ary_assoc['onoma_jenodoxeio']}" size=30 placeholder="Επωνυμία"></div>
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>
-->
		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="Αεροπλάνο, πλοίο κτλ."></div><p></p>

<!--		Πτήσεις και Αριθμοί πτήσεων αναχώρησης και επιστροφής ή ακτοπλοϊκά δρομολόγια κ.ο.κ.:<br>
		<div class="form-group"><label for="aritmoi_mesa_anaxorisis">Aναχώρησης:</label> <input class="form-control" type=text name=aritmoi_mesa_anaxorisis id=aritmoi_mesa_anaxorisis value="{$ary_assoc['aritmoi_mesa_anaxorisis']}" ></div>
		<div class="form-group"><label for="arithmoi_mesa_epistrofis">Eπιστροφής:</label> <input class="form-control" type=text name=arithmoi_mesa_epistrofis id=arithmoi_mesa_epistrofis value="{$ary_assoc['arithmoi_mesa_epistrofis']}" ></div><p></p>
-->			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες και ώρες</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία αναχώρησης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="hmera_epistrofis">Ημερομηνία επιστροφής:</label> <input class="form-control" type='text' readonly id='hmera_epistrofis' name='hmera_epistrofis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_epistrofis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="diarkeia_hmeres">Διάρκεια (ημέρες):</label> <input class="form-control" type=text name=diarkeia_hmeres id=diarkeia_hmeres value="{$ary_assoc['diarkeia_hmeres']}" size=2></div><p></p>
		
		<div class="form-group"><label for="ora_anaxorisis">Ώρα αναχώρησης από το σχολείο ή από άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_anaxorisis id=ora_anaxorisis value="{$ary_assoc['ora_anaxorisis']}" ></div><p></p>
		<div class="form-group"><label for="ora_afijis">Εκτιμώμενη (τοπική) ώρα άφιξης στον/στους προορισμό/σμούς:</label> <input class="form-control" type=time step=60 name=ora_afijis id=ora_afijis value="{$ary_assoc['ora_afijis']}" ></div><p></p>
		<div class="form-group"><label for="ora_apoxorisis">Εκτιμώμενη (τοπική) ώρα αποχώρησης:</label> <input class="form-control" type=time step=60 name=ora_apoxorisis id=ora_apoxorisis value="{$ary_assoc['ora_apoxorisis']}" ></div><p></p>
		<div class="form-group"><label for="ora_epistrofis">Ώρα επιστροφής στο σχολείο ή σε άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_epistrofis id=ora_epistrofis value="{$ary_assoc['ora_epistrofis']}"></div><p></p>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">

<!--		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών:</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=20*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=20*document.getElementById('plithos_synodoi').value</script> </div><p></p>
			
		<div class="form-group"><label for="onoma_arxigos">Αρχηγός:</label> <input class="form-control" type=text name=onoma_arxigos id=onoma_arxigos value="{$ary_assoc['onoma_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div>
		<div class="form-group"><label for="onoma_anaplirotis_arxigos">Αναπληρωτής αρχηγός:</label> <input class="form-control" type=text name=onoma_anaplirotis_arxigos id=onoma_anaplirotis_arxigos value="{$ary_assoc['onoma_anaplirotis_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div><p></p>
-->
			<div class="form-group"><label>Ονομαστική λίστα μετακινούμενων εκπαιδευτικών: (Ονοματεπώνυμο και ειδικότητα)</label> 
				<div id="atomaline-holderA" 
				style="display: flex;  height: 200px;  background: #666;  border: 1px solid #666;">
					<textarea id="atomaline-numbersA"
					style="
					outline: none;  background: lightgrey;    border: none;  height: 99%;  resize: none;
					width: 3em;  text-align: right;  pointer-events: none;  overflow: hidden;  padding-right: 3px;  "></textarea>
				<textarea id="erasmus_lista_kathig_kaieidikotita" name="erasmus_lista_kathig_kaieidikotita" oninput="genNumbersA()" onchange="genNumbersA()"
				style= "
				outline: none;  background: #f5f5f5;    border: none;  height: 99%;  resize: none;
				width: 100%;  padding-left: 3px;  margin-left: 1px;  white-space: nowrap;" placeholder="Επώνυμο Ονομα ΠΕΧΧ">{$ary_assoc['erasmus_lista_kathig_kaieidikotita']}</textarea>
				</div>
			</div>
	
			<p></p>

		
<!--		<div class="form-group"><label for="ar_mathiton">Αριθμός συμμετεχόντων μαθητών στην παιδαγωγική ομάδα:</label> <input class="form-control" type=number size=5 min=1 name=ar_mathiton id=ar_mathiton value="{$ary_assoc['ar_mathiton']}"></div>
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		Υπάρχει το ποσοστό 70% της παιδαγωγικής ομάδας: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_pososto" id=check_pososto checked><label class="form-check-label" for="check_pososto">NAI</label></div>
-->

<!--
		<div class="form-group"><label for="onomata_synodoi">Συνοδοί:</label> (Προσοχή 1 ανά 20 μαθητές για εξωτερικό) <textarea class="form-control" name=onomata_synodoi id=onomata_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['onomata_synodoi']}</textarea></div>
		<div class="form-group"><label for="anaplirotes_synodoi">Αναπληρωτές συνοδοί:</label> <textarea class="form-control" name=anaplirotes_synodoi id=anaplirotes_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['anaplirotes_synodoi']}</textarea></div><p></p>
		
		Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων: 
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_ypefth" id=check_ypefth checked><label class="form-check-label" for="check_ypefth">NAI</label></div>
-->		

<script type='text/javascript'>
let elmsA = {
  genList: document.getElementById('erasmus_lista_kathig_kaieidikotita'),
  genNumbers: document.getElementById('atomaline-numbersA'),
}

elmsA.genList.addEventListener('scroll', (e) => {
  elmsA.genNumbers.scrollTop = elmsA.genList.scrollTop
})

function genNumbersA() {

  elmsA.genNumbers.value = ''

  var ln = (Array.from(elmsA.genList.value.matchAll('\\n')).length) + 1
  
  for (let i = 1; i <= ln; i++) {
    elmsA.genNumbers.value += i + '\\n'
  }
}

genNumbersA();
</script>			

			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;

		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_epistrofis');
		SendCalendarInit('hmera_diavivastikou');
		}
		
			break;
		default: echo 'Σφάλμα. Δε βρέθηκε το είδος εκδρομής<br>';break;
	}//end of switch
}

function display_europaika(&$ary_assoc)
{
		echo "<p>{$ary_assoc['eidos_ekdromis']} άρθρο 5 της Y.A.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)</p>";
		
		echo <<<EOF_FORM1
		<form method=post action="mainindex.php" class="form-inline">
		
		<div class="panel panel-info " style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Στοιχεία καταχώρησης</div>
			<div class="panel-body">

		<input type=hidden name=idaitisi value="{$ary_assoc['idaitisi']}" >
		<input type=hidden name=kodikos_sxoleiou value="{$ary_assoc['kodikos_sxoleiou']}" >

		<div class="form-group"><label for="eidos_ekdromis">Είδος:</label> <input class="form-control" type=text name=eidos_ekdromis id=eidos_ekdromis value="{$ary_assoc['eidos_ekdromis']}" readonly size=50></div>
		<div class="form-group"><label for="submit_datetime">Ημερομηνία Υποβολής/<br>Αποθήκευσης:</label> <input class="form-control" type=text disabled size=16 name=submit_datetime id=submit_datetime value="{$ary_assoc['submit_datetime']}"></div>
		<div class="form-group"><label for="ar_prot">Αρ. Πρωτ. ΔΔΕ:</label>	<input class="form-control" type=text class="form-control" name=ar_prot id=ar_prot size=5 value="{$ary_assoc['ar_prot']}" disabled></div><p></p>

		
		
		<div class="form-group"><label for="status">Κατάσταση:</label> <input class="form-control" type=text name=status id=status title="{$ary_assoc['status']}" value="{$ary_assoc['status']}" size='11' disabled></div>
		<div class="form-group"><label for="paratiriseis">Παρατηρήσεις:</label> <textarea class="form-control" name=paratiriseis id=paratiriseis rows="2" cols="20" placeholder="Σημειώσεις (που δε θα εκτυπωθούν πουθενά)">{$ary_assoc['paratiriseis']}</textarea></div>
		<p></p>
		
			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Γενικά</div>
			<div class="panel-body">

		<div class="form-group"><label for="titlos_programmatos">Κυρίως έγγραφο μετακίνησης:</label> <input class="form-control" type=text name=titlos_programmatos id=titlos_programmatos value="{$ary_assoc['titlos_programmatos']}" size="50" placeholder="π.χ. Διακρατική συμφωνία...">[Τίτλος εγγράφου που να αποδεικνύει το λόγο της μετακίνησης πχ. την πρόσκληση, το επιβεβαιωμένο ραντεβού, την αποδοχή αιτήματος, το πρόγραμμα διοργάνωσης (π.χ. MUN) ή το αντίγραφο έγκρισης προγράμματος από το ΥΠΑΙΘ ή αντίγραφο διακρατικής συμφωνίας/μνημόνιο, κλπ]</div><p></p>
EOF_FORM1;

//telika den xreiazetai ar. egrisis:
//if ($ary_assoc['eidos_ekdromis']=='Αδελφοποιήσεων') echo "<div class='form-group'><label for='ar_pr_egrisis_programmatosdde'>Αρ. Πρ. έγκρισης του εκπαιδευτικού προγράμματος της επίσκεψης, από το/την Διευθυντή/τρια της ΔΔΕ:</label> <input class='form-control' type=text class='form-control' name=ar_pr_egrisis_programmatosdde id=ar_pr_egrisis_programmatosdde value='{$ary_assoc['ar_pr_egrisis_programmatosdde']}' placeholder='Αριθμός και ημερομηνία'></div><p></p>";
		
		echo <<<EOF_FORM
		<div class="form-group"><label for="ar_prajis_syllogou">Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:</label> <input class="form-control" type=text class="form-control" name=ar_prajis_syllogou id=ar_prajis_syllogou value="{$ary_assoc['ar_prajis_syllogou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
		<div class="form-group"><label for="asf_symbolaio">Αριθμός ασφαλιστηρίου συμβολαίου για τη διάρκεια του ταξιδιού και της διαμονής:</label> <input class="form-control" type=text class="form-control" name=asf_symbolaio id=asf_symbolaio value="{$ary_assoc['asf_symbolaio']}" placeholder="Αριθμός ή αναγνωριστικό συμβολαίου" size=30></div><p></p>
		<div class="form-group"><label for="praji_epilogi_praktoreiou">Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:</label> <input class="form-control" type=text class="form-control" name=praji_epilogi_praktoreiou id=praji_epilogi_praktoreiou value="{$ary_assoc['praji_epilogi_praktoreiou']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
<!--	<div class="form-group"><label for="a_arithmos">Αύξων αριθμός εκδρομής αυτού του είδους(π.χ.1 αν είναι η πρώτη για φέτος):</label> <input class="form-control" type=number class="form-control" name=a_arithmos id=a_arithmos value="{$ary_assoc['a_arithmos']}" size=3 min=1></div><p></p>
-->		

		<div class="form-group"><label for="ar_pr_anartisisprok">Αρ. Πρ. & ημ. διαβίβασης αιτήματος ανάρτησης προκήρυξης:</label> <input class="form-control" type=text class="form-control" name=ar_pr_anartisisprok id=ar_pr_anartisisprok value="{$ary_assoc['ar_pr_anartisisprok']}" placeholder="Αριθμός και ημερομηνία"></div><p></p>
		
		<div class="form-group"><label for="proorismos">Προορισμός:</label> <input class="form-control" type=text name=proorismos id=proorismos value="{$ary_assoc['proorismos']}" placeholder="Πόλη ή τοποθεσία" size=30></div><p></p>
		
		<div class="form-group"><label for="onoma_jenodoxeio">Όνομα Ξενοδοχείου:</label> <input class="form-control" type=text name=onoma_jenodoxeio id=onoma_jenodoxeio value="{$ary_assoc['onoma_jenodoxeio']}" size=30 placeholder="Επωνυμία"></div>
		<div class="form-group"><label for="onoma_praktoreio">Όνομα Πρακτορείου:</label> <input class="form-control" type=text name=onoma_praktoreio id=onoma_praktoreio value="{$ary_assoc['onoma_praktoreio']}" size=30 placeholder="Επωνυμία"></div><p></p>

		<div class="form-group"><label for="metaforika_mesa">Μεταφορικά μέσα:</label> <input class="form-control" type=text name=metaforika_mesa id=metaforika_mesa value="{$ary_assoc['metaforika_mesa']}" placeholder="Αεροπλάνο, πλοίο κτλ."></div><p></p>

<!--		Πτήσεις και Αριθμοί πτήσεων αναχώρησης και επιστροφής ή ακτοπλοϊκά δρομολόγια κ.ο.κ.:<br>
		<div class="form-group"><label for="aritmoi_mesa_anaxorisis">Aναχώρησης:</label> <input class="form-control" type=text name=aritmoi_mesa_anaxorisis id=aritmoi_mesa_anaxorisis value="{$ary_assoc['aritmoi_mesa_anaxorisis']}" ></div>
		<div class="form-group"><label for="arithmoi_mesa_epistrofis">Eπιστροφής:</label> <input class="form-control" type=text name=arithmoi_mesa_epistrofis id=arithmoi_mesa_epistrofis value="{$ary_assoc['arithmoi_mesa_epistrofis']}" ></div><p></p>
-->			</div>
		</div>
		
		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Ημερομηνίες και ώρες</div>
			<div class="panel-body">
			
		<div class="form-group"><label for="hmera_ekdromis_anaxorisis">Ημερομηνία αναχώρησης:</label> <input class="form-control" type='text' readonly name='hmera_ekdromis_anaxorisis' id='hmera_ekdromis_anaxorisis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_ekdromis_anaxorisis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="hmera_epistrofis">Ημερομηνία επιστροφής:</label> <input class="form-control" type='text' readonly id='hmera_epistrofis' name='hmera_epistrofis' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_epistrofis']}' size=10 maxlength=10></div>
		<div class="form-group"><label for="diarkeia_hmeres">Διάρκεια (ημέρες):</label> <input class="form-control" type=text name=diarkeia_hmeres id=diarkeia_hmeres value="{$ary_assoc['diarkeia_hmeres']}" size=2></div><p></p>
		
		<div class="form-group"><label for="ora_anaxorisis">Ώρα αναχώρησης από το σχολείο ή από άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_anaxorisis id=ora_anaxorisis value="{$ary_assoc['ora_anaxorisis']}" ></div><p></p>
		<div class="form-group"><label for="ora_afijis">Εκτιμώμενη (τοπική) ώρα άφιξης στον/στους προορισμό/σμούς:</label> <input class="form-control" type=time step=60 name=ora_afijis id=ora_afijis value="{$ary_assoc['ora_afijis']}" ></div><p></p>
		<div class="form-group"><label for="ora_apoxorisis">Εκτιμώμενη (τοπική) ώρα αποχώρησης:</label> <input class="form-control" type=time step=60 name=ora_apoxorisis id=ora_apoxorisis value="{$ary_assoc['ora_apoxorisis']}" ></div><p></p>
		<div class="form-group"><label for="ora_epistrofis">Ώρα επιστροφής στο σχολείο ή σε άλλο καθορισμένο χώρο:</label> <input class="form-control" type=time step=60 name=ora_epistrofis id=ora_epistrofis value="{$ary_assoc['ora_epistrofis']}"></div><p></p>
		
			</div>
		</div>

		<div class="panel panel-default" style="background-color: transparent; border: 2px solid black;border-radius: 4px;">
			<div class="panel-heading">Συμμετοχές</div>
			<div class="panel-body">
				
		<div class="form-group"><label for="ar_metakinoumenon">Αριθμός μετακινούμενων μαθητών:</label> <input class="form-control" type=number size=5 min=1 name=ar_metakinoumenon id=ar_metakinoumenon value="{$ary_assoc['ar_metakinoumenon']}" ></div><p></p>
		<p></p>
		
<!--	<div class="form-group"><label for="onoma_arxigos">Αρχηγός:</label> <input class="form-control" type=text name=onoma_arxigos id=onoma_arxigos value="{$ary_assoc['onoma_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div>
		<div class="form-group"><label for="onoma_anaplirotis_arxigos">Αναπληρωτής αρχηγός:</label> <input class="form-control" type=text name=onoma_anaplirotis_arxigos id=onoma_anaplirotis_arxigos value="{$ary_assoc['onoma_anaplirotis_arxigos']}" placeholder="ονοματεπώνυμο ολογράφως" size=25></div><p></p>
-->
		<div class="form-group"><label for="plithos_synodoi">Πλήθος συνοδών (εκτός του αρχηγού):</label> <input class="form-control" type=number min=0 size=4 name=plithos_synodoi id=plithos_synodoi value="{$ary_assoc['plithos_synodoi']}" onchange="javascript:document.getElementById('helpcalc').innerHTML=20*this.value"> Καλυπτώμενοι μαθητές/τριες: <span id=helpcalc>0</span> <script>document.getElementById('helpcalc').innerHTML=20*document.getElementById('plithos_synodoi').value</script> </div><p></p>

<!--
		<div class="form-group"><label for="onomata_synodoi">Συνοδοί:</label> (Προσοχή 1 ανά 20 μαθητές για εξωτερικό) <textarea class="form-control" name=onomata_synodoi id=onomata_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['onomata_synodoi']}</textarea></div>
		<div class="form-group"><label for="anaplirotes_synodoi">Αναπληρωτές συνοδοί:</label> <textarea class="form-control" name=anaplirotes_synodoi id=anaplirotes_synodoi rows="3" cols="25" placeholder="1ο Oνοματεπώνυμo ολογράφως\n2o Ονοματεπώνυμο κτλ.">{$ary_assoc['anaplirotes_synodoi']}</textarea></div><p></p>
-->		Υπάρχουν υπεύθυνες δηλώσεις γονέων και κηδεμόνων: 
		
		<div class="form-group"><input class="form-check-input" type="checkbox" value="" name="check_ypefth" id=check_ypefth checked><label class="form-check-label" for="check_ypefth">NAI</label></div>
		
			</div>
		</div>
		
		<div class="form-group"><label for="prosfonisi_ypografonta">Προσφώνηση υπογραφής:</label> <input class="form-control" type=text name=prosfonisi_ypografonta id=prosfonisi_ypografonta value="{$ary_assoc['prosfonisi_ypografonta']}" size=40></div>
		<div class="form-group"><label for="onoma_ypografonta">Ονοματεπώνυμο υπογράφοντα:</label> <input class="form-control" type=text name=onoma_ypografonta id=onoma_ypografonta value="{$ary_assoc['onoma_ypografonta']}" size=25 placeholder="Όνοματεπώνυμο Δντη/ντριας"></div>
		<p><div class="form-group"><label for="ar_prot_sxoleiou">Αρ. Πρωτ. του σχολείου για το διαβιβαστικό που θα δημιουργηθεί:</label> <input class="form-control" type=text name=ar_prot_sxoleiou id=ar_prot_sxoleiou value="{$ary_assoc['ar_prot_sxoleiou']}" size=10 placeholder="Αρ. Πρωτ."></div>
		<small>(απαιτείται για οριστική υποβολή)</small>
		</p>
		
		<div class="form-group"><label for="hmera_diavivastikou">Ημερομηνία διαβιβαστικού:</label> <input class="form-control" type='text' readonly name='hmera_diavivastikou' id='hmera_diavivastikou' title='ημέρα-μήνας-έτος' value='{$ary_assoc['hmera_diavivastikou']}' size=10 maxlength=10 onchange='javascript:checkdatediav();'><span id=hmera_diav_warning> <span class="glyphicon glyphicon-warning-sign" style="color:#cc3300;font-size:1.3em;"></span> Προσοχή! Ημέρα διαβιβαστικού μεταγενέστερη της σημερινής</span></div> 
		
		<p></p>
		
		<hr>
EOF_FORM;
		
		ShowButtons($ary_assoc);

		SendCalendarInit('hmera_ekdromis_anaxorisis');
		SendCalendarInit('hmera_epistrofis');
		SendCalendarInit('hmera_diavivastikou');
	
}

function ShowButtons(&$ary_assoc)
{
	if ($ary_assoc['ar_prot']=='')
	{
		echo '
		<table border=0 style="width:100%"><tr>
		<td style="text-align:left;width:33%"><a href="mainindex.php"><button type="button" class="btn btn-warning" title="Ακύρωση αλλαγών χωρίς αποθήκευση"><span class="glyphicon glyphicon-menu-left"></span>Επιστροφή</button></a> </td>
		<td style="text-align:center;width:33%"><button type="submit" class="btn btn-primary" title="Αποθήκευση αλλαγών (χωρίς υποβολή)" name="action" value="save">Αποθήκευση αλλαγών</button> </td>
		<td style="text-align:right;width:33%"><button type="submit" class="btn btn-success" title="Αρχεία για Υποβολή στη ΔΔΕ" name="action" value="preparefiles">Επόμενο: Αρχεία Υποβολής<span class="glyphicon glyphicon-menu-right"></span></button>
		</td></tr></table>
		</form>
		<br> <br>';
	}
	else
	{
		echo '</form> <p><u>Λίστα αρχείων υποβολής στη ΔΔΕ:</u></p><br>';
		$filelist= array();
		GetFileList($ary_assoc['idaitisi'], $filelist,false);
		display_filelist($filelist,$ary_assoc['idaitisi'],$ary_assoc['eidos_ekdromis'], true); //$ary_assoc['titlos'] replaced with $ary_assoc['eidos_ekdromis']
		echo '<br><a href="mainindex.php"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-menu-left"></span>Επιστροφή</button>';
	}
}

function BuildPdfs(&$ary_data)
{
	//when building many files, last pdf will be named "idF_..."
//##3 update pos
	$ds = DIRECTORY_SEPARATOR;  
	$storeFolder = 'arxeia'.$ds. $_SESSION['ekdromes_currentYear'] .$ds. $_SESSION['kodikos_sxoleiou'];
	
	if (isset($ary_data['plithos_synodoi']) && $ary_data['plithos_synodoi']>0) $plithos_ekp= $ary_data['plithos_synodoi']+1;//increase one to include leader
	else $plithos_ekp='';
	
	switch ($ary_data['eidos_ekdromis'])
	{
		case 'Σχολικός Περίπατος':
		{
			if ($ary_data['metaforika_mesa']=='') $str_display_metakinisi='ΠΕΖΗ';
			else $str_display_metakinisi= "ΜΕ ΜΕΤΑΦΟΡΙΚΟ ΜΕΣΟ ({$ary_data['metaforika_mesa']})";
			
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 

			$str_html= <<<ENDOFDOC
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<b><p align="center">Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
	ΓΙΑ ΠΡΑΓΜΑΤΟΠΟΙΗΣΗ ΠΕΡΙΠΑΤΟΥ<br>
	$str_display_metakinisi<br></b></p>
	<p><br></p>
<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020) και την πράξη <b>{$ary_data['ar_prajis_syllogou']}</b>, του Συλλόγου Διδασκόντων/ουσών σας ενημερώνουμε ότι:
<ul style="line-height: 150%;">
1.	Οι μαθητές/τριες του σχολείου μας πρόκειται να πραγματοποιήσουν περίπατο<br>
 του άρθρου 1 με τον εξής προορισμό: <b>{$ary_data['proorismos']}</b>, στις <b>$hmera_ekdromis</b> <br>
2.	Πρόκειται για τον <b>{$ary_data['a_arithmos']}ο</b> περίπατο για το τρέχον σχ. έτος<br>
3.	Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία <br>
4.	Έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α. <br>
</ul></p>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file U==user uploaded file
		}	
		break;
		case 'Ημερήσια δίχως διανυκτέρευση':
		{
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 

			$str_html= <<<ENDOFDOC
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
	ΓΙΑ ΠΡΑΓΜΑΤΟΠΟΙΗΣΗ ΗΜΕΡΗΣΙΑΣ ΕΚΠΑΙΔΕΥΤΙΚΗΣ ΕΚΔΡΟΜΗΣ<br></b></p>
	<p><br></p>
<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020) και την πράξη <b>{$ary_data['ar_prajis_syllogou']}</b>, του Συλλόγου Διδασκόντων/ουσών σας ενημερώνω ότι:
<ul style="line-height: 150%;">
1.	<b>{$ary_data['ar_metakinoumenon']}</b> μαθητές/τριες του σχολείου μας και <b>$plithos_ekp</b> εκπαιδευτικοί πρόκειται να πραγματοποιήσουν ημερήσια εκπαιδευτική εκδρομή
 του άρθρου 2 παρ.1,2,3,4 με τον εξής προορισμό: <b>{$ary_data['proorismos']}</b>, στις <b>$hmera_ekdromis</b> <br>
2.	Η μετακίνηση θα γίνει με το/τα εξής μεταφορικό/α μέσο/α: {$ary_data['metaforika_mesa']}. Το πρακτορείο είναι το εξής: {$ary_data['onoma_praktoreio']}<br>
3.	Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία <br>
4.	Έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α. <br>
</ul></p>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
		}
		break;
		case 'Πολυήμερη τελευταίας τάξης στο εσωτερικό':
		{
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_epistrofis']);
			$hmera_epistrofis= date_format($datetime,"d-m-Y"); 


			$str_html= <<<ENDOFDOC
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
	ΓΙΑ ΠΡΑΓΜΑΤΟΠΟΙΗΣΗ ΠΟΛΥΗΜΕΡΗΣ ΕΚΠΑΙΔΕΥΤΙΚΗΣ ΕΚΔΡΟΜΗΣ<br>
	της τελευταίας τάξης στο εσωτερικό<br></b></p>
	<p><br></p>
<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020) και την πράξη <b>{$ary_data['ar_prajis_syllogou']}</b>, του Συλλόγου Διδασκόντων/ουσών σας ενημερώνω ότι:
<ul style="line-height: 150%;">
1.	<b>{$ary_data['ar_metakinoumenon']}</b> μαθητές/τριες της τελευταίας τάξης του σχολείου μας και <b>$plithos_ekp</b> εκπαιδευτικοί πρόκειται να πραγματοποιήσουν πολυήμερη εκπαιδευτική εκδρομή
 του άρθρου 2 παρ.5 με τον εξής προορισμό: <b>{$ary_data['proorismos']}</b>, από <b>$hmera_ekdromis</b> έως <b>$hmera_epistrofis</b> <br>
2.	Η μετακίνηση θα γίνει με το/τα εξής μεταφορικό/α μέσο/α: {$ary_data['metaforika_mesa']}.<br>
3.  Το όνομα του καταλύματος είναι: {$ary_data['onoma_jenodoxeio']} <br>
Το πρακτορείο είναι το εξής: {$ary_data['onoma_praktoreio']}<br>
4.	Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία <br>
5.	Έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α. <br>
</ul></p>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
		}
		break;
		case 'Πολυήμερη τελευταίας τάξης στο εξωτερικό':
		{
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_epistrofis']);
			$hmera_epistrofis= date_format($datetime,"d-m-Y"); 

			$str_html= <<<ENDOFDOC
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>ΔΙΑΒΙΒΑΣΤΙΚΟ</b></p>
	<p><br></p>
	<p><b>ΘΕΜΑ: Έγκριση πολυήμερης εκπαιδευτικής εκδρομής μαθητών/τριών και εκπαιδευτικών με το άρθρο 2 § 5 με προορισμό: {$ary_data['proorismos']}</p>
	<p><br></p>

<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το αρ. 16 της Υ.Α. 20883/ΓΔ4/12-02-2020 ΦΕΚ 456/τ.Β’/13-02-2020, σας 
διαβιβάζουμε την αίτηση μαζί με τα απαραίτητα δικαιολογητικά σχετικά με την έγκριση της πολυήμερης εκπαιδευτικής εκδρομής μαθητών/τριών και εκπαιδευτικών του σχολείου μας 
με προορισμό: <i>{$ary_data['proorismos']}</i>, από:<i>$hmera_ekdromis</i> εώς:<i>$hmera_epistrofis</i>
<br> <br>
Ο/Η Διευθυντής/ντρια του σχολείου και ο Σύλλογος Διδασκόντων <u>εισηγούμαστε</u> για την πραγματοποίησή της.<br> <br>
Παρακαλούμε για τις δικές σας ενέργειες.<br> <br>
</p>
<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
			
			//build aitisi:
			TrimSqlHours($ary_data);
			
			$ary_datahmera_ekdromis_anaxorisis = (new DateTime($ary_data['hmera_ekdromis_anaxorisis']))->format('d-m-Y');
			$ary_datahmera_epistrofis = (new DateTime($ary_data['hmera_epistrofis']))->format('d-m-Y');


			$str_html= <<<ENDOFDOC2
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>

	<p align="center"><b>ΑΙΤΗΣΗ ΕΓΚΡΙΣΗΣ ΜΕΤΑΚΙΝΗΣΗΣ ΜΑΘΗΤΩΝ ΚΑΙ ΕΚΠΑΙΔΕΥΤΙΚΩΝ ΣΤΟ ΕΞΩΤΕΡΙΚΟ</b></p>
	<p align="center">Παρακαλούμε να εγκρίνετε την παρακάτω πολυήμερη εκπαιδευτική εκδρομής των μαθητών του σχολείου μας, στο εξωτερικό</p>
	<p><br></p>

<table>
<tr><td><b>Α. ΣΤΟΙΧΕΙΑ ΣΧΟΛΙΚΗΣ ΜΟΝΑΔΑΣ</b><br>
Σχ. Μονάδα: {$_SESSION['displayname']}<br>
Τηλ. Επικοινωνίας: {$_SESSION['phonenumbers']}<br>
email: {$_SESSION['usermail']}<br>
{$ary_data['prosfonisi_ypografonta']}: {$ary_data['onoma_ypografonta']}
</td>
<td>
<b>Β. ΣΤΟΙΧΕΙΑ ΕΚΔΡΟΜΗΣ</b><br>
Τόπος Επίσκεψης: {$ary_data['proorismos']}
</td></tr>
</table>	
<p style="line-height: 150%;">
<b>Γ. ΣΤΟΙΧΕΙΑ ΕΚΔΡΟΜΗΣ</b> (Η μετακίνηση πραγματοποιείται στο πλαίσιο της Υ.Α 20883/ΓΔ4/12-02-2020, ΦΕΚ 456/τ.Β/13-02-2020) άρθρο 2 § 5.<br> <br>

Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:<br> {$ary_data['ar_prajis_syllogou']}<br>
Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:<br> {$ary_data['praji_epilogi_praktoreiou']}<br>
Αρ. Πρ. & ημ. διαβίβασης αιτήματος ανάρτησης προκήρυξης:<br> {$ary_data['ar_pr_anartisisprok']}<br>
Αριθμός ασφαλιστηρίου συμβολαίου για τη διάρκεια του ταξιδιού και της διαμονής:<br> {$ary_data['asf_symbolaio']}<br>
Όνομα ξενοδοχείου: {$ary_data['onoma_jenodoxeio']}  Όνομα πρακτορείου: {$ary_data['onoma_praktoreio']}
<br> <br>
Ημερομηνία Αναχώρησης: {$ary_datahmera_ekdromis_anaxorisis} Ημερομηνία Επιστροφής: {$ary_datahmera_epistrofis}<br>
(οποτεδήποτε μέσα στο διδακτικό έτος και μέχρι 10 μέρες πριν τη λήξη των μαθημάτων)<br> <br>

Διάρκεια μετακίνησης (σύνολο ημερών): {$ary_data['diarkeia_hmeres']}<br>

Ώρα αναχώρησης: {$ary_data['ora_anaxorisis']} Ώρα επιστροφής: {$ary_data['ora_epistrofis']}<br>

Ώρα άφιξης στον προορισμό: {$ary_data['ora_afijis']} Ώρα αναχώρησης για επιστροφή: {$ary_data['ora_apoxorisis']}<br>

Μεταφορικό μέσο: {$ary_data['metaforika_mesa']}<br>

Σύνολο  φοιτώντων μαθητών/τριών: {$ary_data['ar_mathiton']} Μετακινούμενοι μαθητές/τριες: {$ary_data['ar_metakinoumenon']}<br>
(Αριθμός μαθητών/τριών ≥ 70%) <b>&#x2611;</b> <br>

Αριθμός συνοδών εκπαιδευτικών (εκτός του αρχηγού): {$ary_data['plithos_synodoi']} (1/20μαθητές/τριες)<br>
</p>
ENDOFDOC2;
			$pdf_aitisi = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf_aitisi, 10);
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			$pdf_aitisi->writeHTML($str_html);
			
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			$str_html= <<<ENDOFDOC2PAGE2
<p style="line-height: 150%;">
<br> <br>
<b>Δ. ΣΥΝΗΜΜΕΝΑ ΥΠΟΒΑΛΛΟΝΤΑΙ:</b><br>

1. Αντίγραφο της πράξης του συλλόγου διδασκόντων για τη μετακίνηση <br>
(στην οποία αναγράφονται, εκτός των άλλων, το αναλυτικό πρόγραμμα της μετακίνησης, ολογράφως τα ονοματεπώνυμα των εκπαιδευτικών)<br> <br>

<b>Ε. ΜΕ ΤΟ ΠΑΡΟΝ ΒΕΒΑΙΩΝΩ ΟΤΙ:</b><br>

1. Έχουν κατατεθεί και τηρούνται στο σχολείο οι υπεύθυνες δηλώσεις των γονέων/κηδεμόνων των
    συμμετεχόντων μαθητών.<br>
2. Ο αρχηγός της μετακίνησης και ο αναπληρωτής του είναι μόνιμοι εκπαιδευτικοί (ή αναπληρωτές πλήρους 
     ωραρίου εφόσον δεν υπάρχει μόνιμος), οι  συνοδοί και οι αναπληρωτές τους είναι εκπαιδευτικοί της Δ.Ε. 
     και δεν είναι αναπληρωτές με μειωμένο ωράριο, ούτε  ωρομίσθιοι.<br>
3. Οι συνοδοί ανήκουν στο σύλλογο διδασκόντων του σχολείου και η αναλογία, κατά τη μετακίνηση, είναι 1/20 
    μαθητές εκτός του αρχηγού. <br>
5. Καλύπτεται ο προβλεπόμενος  αριθμός συμμετοχής  μαθητών ≥ 70%, της τάξης ή της ομάδας 
    τμημάτων, βάσει των υπεύθυνων δηλώσεων των γονέων/κηδεμόνων.<br>
6. Υπάρχει ασφάλεια επαγγελματικής -αστικής ευθύνης του τουριστικού πρακτορείου/διοργανωτή<br>
7. Όλοι οι συμμετέχοντες έχουν ιατροφαρμακευτική κάλυψη<br>
8. Δε διαταράσσεται η ομαλή λειτουργία της σχολικής μονάδας και δεν προκύπτει δαπάνη 
    για το δημόσιο.<br>
9. Εφαρμόστηκαν όλα τα προβλεπόμενα της Υ.Α  20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)<br>
</p>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC2PAGE2;
			$pdf_aitisi->writeHTML($str_html);
			SavepdfBook($pdf_aitisi,$ary_data['idaitisi'].'A_Αίτηση',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
			
		}
		break;
		case 'Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό) στο εσωτερικό':
		{
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_epistrofis']);
			$hmera_epistrofis= date_format($datetime,"d-m-Y"); 

			if ($ary_data['onoma_jenodoxeio']!='') $name_katalyma = "Το όνομα του καταλύματος είναι: {$ary_data['onoma_jenodoxeio']} <br>";
			else $name_katalyma='';

			if ($hmera_ekdromis!=$hmera_epistrofis) $hmerominies= "από <b>$hmera_ekdromis</b> έως <b>$hmera_epistrofis</b>";
			else $hmerominies="στις <b>$hmera_ekdromis</b>";

			$str_html= <<<ENDOFDOC
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
	Για εκπαιδευτική επίσκεψη με εγκεκριμένο πρόγραμμα <i>{$ary_data['eidos_programmatos']}</i> 
	με τον εξής προορισμό: <i>{$ary_data['proorismos']}</i></b></p>

<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020) και την πράξη <b>{$ary_data['ar_prajis_syllogou']}</b>, του Συλλόγου Διδασκόντων/ουσών σας ενημερώνουμε ότι:
<ul style="line-height: 150%;">
Α)	<b>{$ary_data['ar_metakinoumenon']}</b> μαθητές και μαθήτριες του σχολείου μας και <b>$plithos_ekp</b> εκπαιδευτικοί πρόκειται να μετακινηθούν 
με τον εξής προορισμό: <b>{$ary_data['proorismos']}</b>, $hmerominies. Πρόκειται για πρόγραμμα με τίτλο: <i>{$ary_data['titlos_programmatos']}</i> 
εγκεκριμένο από τη Δ.Δ.Ε. με αρ. πρ. έγκρισης: {$ary_data['ar_pr_egrisis_programmatosdde']} στο πλαίσιο του άρθρου <b>3§1</b>.<br>
Η μετακίνηση θα πραγματοποιηθεί με το/τα εξής μεταφορικό/α μέσο/α: {$ary_data['metaforika_mesa']}.<br>
$name_katalyma
Το πρακτορείο είναι το εξής: {$ary_data['onoma_praktoreio']}<br>
Β)	Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία <br>
Γ)	Έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α.
</ul></p>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
			
		}
		break;
		case 'Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο εγκεκριμένων εκπαιδευτικών προγραμμάτων σχολικών δραστηριοτήτων':
		{
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_epistrofis']);
			$hmera_epistrofis= date_format($datetime,"d-m-Y"); 
			
			if ($hmera_ekdromis!=$hmera_epistrofis) $hmerominies= "από <b>$hmera_ekdromis</b> έως <b>$hmera_epistrofis</b>";
			else $hmerominies="στις <b>$hmera_ekdromis</b>";
	
			$str_html= <<<ENDOFDOC
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>ΔΙΑΒΙΒΑΣΤΙΚΟ</b></p>
	<p><br></p>
	<p><b>ΘΕΜΑ: Έγκριση μετακίνησης μαθητών/τριών και εκπαιδευτικών με προορισμό: <i>"{$ary_data['proorismos']}"</i> με εγκεκριμένο πρόγραμμα σχολικών δραστηριοτήτων του άρθρου 3§1</p>

<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το αρ. 16 της Υ.Α. 20883/ΓΔ4/12-02-2020 ΦΕΚ 456/τ.Β’/13-02-2020, σας 
διαβιβάζουμε την αίτηση μαζί με τα απαραίτητα δικαιολογητικά σχετικά με την έγκριση της μετακίνησης μαθητών/τριών και εκπαιδευτικών του
σχολείου μας με προορισμό: <i>{$ary_data['proorismos']}</i>, $hmerominies με εγκεκριμένο <i>{$ary_data['eidos_programmatos']}</i> 
πρόγραμμα σχολικών δραστηριοτήτων με τίτλο <i>{$ary_data['titlos_programmatos']}</i> <br>
&nbsp;&nbsp;&nbsp;&nbsp;Ο/Η Διευθυντής/ντρια του σχολείου και ο Σύλλογος Διδασκόντων <u>εισηγούμαστε</u> για την πραγματοποίησή της.<br>&nbsp;&nbsp;&nbsp;&nbsp;Παρακαλούμε για τις δικές σας ενέργειες.<br> 
</p>
<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>
ENDOFDOC;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
			
			//build aitisi:
			TrimSqlHours($ary_data);
			
			$ary_datahmera_ekdromis_anaxorisis = (new DateTime($ary_data['hmera_ekdromis_anaxorisis']))->format('d-m-Y');
			$ary_datahmera_epistrofis = (new DateTime($ary_data['hmera_epistrofis']))->format('d-m-Y');


			$str_html= <<<ENDOFDOC2
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table><p align="center"><b>ΑΙΤΗΣΗ ΕΓΚΡΙΣΗΣ ΜΕΤΑΚΙΝΗΣΗΣ ΜΑΘΗΤΩΝ ΚΑΙ ΕΚΠΑΙΔΕΥΤΙΚΩΝ ΣΤΟ ΠΛΑΙΣΙΟ ΕΚΠΑΙΔ. ΕΠΙΣΚΕΨΗΣ</b></p>
	<p align="center">Παρακαλούμε να εγκρίνετε την παρακάτω εκπαιδευτική επίσκεψη των μαθητών του σχολείου μας στο εξωτερικό</p>
	<p></p>

<table>
<tr><td><b>Α. ΣΤΟΙΧΕΙΑ ΣΧΟΛΙΚΗΣ ΜΟΝΑΔΑΣ</b><br>
Σχ. Μονάδα: {$_SESSION['displayname']}<br>
Τηλ. Επικοινωνίας: {$_SESSION['phonenumbers']}<br>
email: {$_SESSION['usermail']}<br>
{$ary_data['prosfonisi_ypografonta']}: {$ary_data['onoma_ypografonta']}
</td>
<td>
<b>Β. ΣΤΟΙΧΕΙΑ ΕΚΔΡΟΜΗΣ</b><br>
Τόπος Επίσκεψης: {$ary_data['proorismos']}<br>
<u>Η μετακίνηση γίνεται με:</u><br>
α/ Είδος προγράμματος: {$ary_data['eidos_programmatos']}<br>
β/ Τίτλος προγράμματος: {$ary_data['titlos_programmatos']}<br>
</td></tr>
</table>	
<p style="line-height: 150%;">
<b>Γ. ΣΤΟΙΧΕΙΑ ΕΠΙΣΚΕΨΗΣ</b> (Η μετακίνηση πραγματοποιείται στο πλαίσιο της Υ.Α 20883/ΓΔ4/12-02-2020, ΦΕΚ 456/τ.Β/13-02-2020) άρθρο 3, §1.<br> <br>

Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:<br> {$ary_data['ar_prajis_syllogou']}<br>
Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:<br> {$ary_data['praji_epilogi_praktoreiou']}<br>
Αρ. Πρ. & ημ. διαβίβασης αιτήματος ανάρτησης προκήρυξης:<br> {$ary_data['ar_pr_anartisisprok']}<br>
Αριθμός ασφαλιστηρίου συμβολαίου για τη διάρκεια του ταξιδιού και της διαμονής:<br> {$ary_data['asf_symbolaio']}<br>
Αρ. Πρ. έγκρισης του εκπαιδευτικού προγράμματος από τη ΔΔΕ: {$ary_data['ar_pr_egrisis_programmatosdde']}<br>
Όνομα ξενοδοχείου: {$ary_data['onoma_jenodoxeio']}  Όνομα πρακτορείου: {$ary_data['onoma_praktoreio']}
<br> <br>
Ημερομηνία Αναχώρησης: {$ary_datahmera_ekdromis_anaxorisis} Ημερομηνία Επιστροφής: {$ary_datahmera_epistrofis}<br>
(οποτεδήποτε μέσα στο διδακτικό έτος και μέχρι 10 μέρες πριν τη λήξη των μαθημάτων)<br> <br>

Διάρκεια μετακίνησης (σύνολο ημερών): {$ary_data['diarkeia_hmeres']}<br>

Ώρα αναχώρησης: {$ary_data['ora_anaxorisis']} Ώρα επιστροφής: {$ary_data['ora_epistrofis']}<br>

Ώρα άφιξης στον προορισμό: {$ary_data['ora_afijis']} Ώρα αναχώρησης για επιστροφή: {$ary_data['ora_apoxorisis']}<br>

Μεταφορικό μέσο: {$ary_data['metaforika_mesa']}<br>

<b>Σύνολο</b> μαθητών/τριών παιδ/κής ομάδας: {$ary_data['ar_mathiton']} <b>Μετακινούμενοι</b> μαθητές/τριες παιδ/κής ομάδας: {$ary_data['ar_metakinoumenon']}<br>
(Αριθμός μαθητών/τριών ≥ 70%) <b>&#x2611;</b> <br>

Αριθμός συνοδών εκπαιδευτικών (εκτός του αρχηγού): {$ary_data['plithos_synodoi']} (1/20μαθητές/τριες)<br>
</p>
ENDOFDOC2;
			$pdf_aitisi = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf_aitisi, 10);
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			$pdf_aitisi->writeHTML($str_html);
			
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			
			if ($ary_data['plithos_ektosomadas_synodoi']==NULL || $ary_data['plithos_ektosomadas_synodoi']=='0')
				$synodoi= 'Όλοι οι συμμετέχοντες εκπαιδευτικοί και μαθητές είναι μέλη της παιδαγωγικής ομάδας.';
			else if  ($ary_data['plithos_ektosomadas_synodoi']=='1')
				$synodoi= 'Όλοι οι συμμετέχοντες μαθητές είναι μέλη της παιδαγωγικής ομάδας. Από τους εκπαιδευτικούς, 1 εκτός παιδαγωγικής ομάδας συνοδεύει για λόγους ανωτέρας βίας';
			else $synodoi= 'Όλοι οι συμμετέχοντες μαθητές είναι μέλη της παιδαγωγικής ομάδας. Από τους εκπαιδευτικούς για 
			λόγους ανωτέρας βίας συνοδεύουν '. $ary_data['plithos_ektosomadas_synodoi'] .' εκτός παιδαγωγικής ομάδας';
			
			
			$str_html= <<<ENDOFDOC2PAGE2
<p style="line-height: 150%;">
<br> <br>
<b>Δ. ΣΥΝΗΜΜΕΝΑ ΥΠΟΒΑΛΛΟΝΤΑΙ:</b><br>

1. Αντίγραφο της πράξης του συλλόγου διδασκόντων για τη μετακίνηση (στην οποία αναγράφονται, εκτός των άλλων, 
    ολογράφως τα ονοματεπώνυμα των συμμετεχόντων μαθητών/τριών και  εκπαιδευτικών, το αναλυτικό πρόγραμμα της
    μετακίνησης, ο αρ. πρ. έγκρισης  του  προγράμματος  σχολικών δραστηριοτήτων από τη ΔΔΕ και ο τίτλος του.)<br>

2. Αντίγραφο της απόφασης της έγκρισης του εκπαιδευτικού προγράμματος σχολικών δραστηριοτήτων
     από τη ΔΔΕ.<br>

3. Ο πίνακας  με το όνομα του σχολείου, το αντίστοιχο εκπαιδευτικό πρόγραμμα σχολικών δραστηριοτήτων
    και τα ονόματα των εκπαιδευτικών, όπως αυτή έχει αποσταλεί από τη Δ.Δ.Ε.<br> <br>

<b>Ε. ΜΕ ΤΟ ΠΑΡΟΝ ΒΕΒΑΙΩΝΩ ΟΤΙ:</b><br>

1. Έχουν κατατεθεί και τηρούνται στο σχολείο οι υπεύθυνες δηλώσεις των γονέων/κηδεμόνων των
    συμμετεχόντων μαθητών.<br>
2. Ο αρχηγός της μετακίνησης και ο αναπληρωτής του είναι μόνιμοι εκπαιδευτικοί (ή αναπληρωτές πλήρους 
     ωραρίου εφόσον δεν υπάρχει μόνιμος) οι  συνοδοί και οι αναπληρωτές τους είναι εκπαιδευτικοί της Δ.Ε. 
     και δεν είναι αναπληρωτές με μειωμένο ωράριο, ούτε  ωρομίσθιοι.<br>
3. Οι συνοδοί ανήκουν στο σύλλογο διδασκόντων του σχολείου και η αναλογία, κατά τη μετακίνηση, είναι 1/20 
    μαθητές εκτός του αρχηγού. <br>
4. $synodoi <br>
5. Καλύπτεται ο προβλεπόμενος  αριθμός συμμετοχής  μαθητών ≥ 70%, της παιδαγωγικής  ομάδας, βάσει των
    υπεύθυνων δηλώσεων των γονέων/κηδεμόνων.<br>
6. Υπάρχει ασφάλεια επαγγελματικής -αστικής ευθύνης του τουριστικού πρακτορείου/διοργανωτή<br>
7. Όλοι οι συμμετέχοντες έχουν ιατροφαρμακευτική κάλυψη<br>
8. Δε διαταράσσεται η ομαλή λειτουργία της σχολικής μονάδας και δεν προκύπτει δαπάνη 
    για το δημόσιο.<br>
9. Εφαρμόστηκαν όλα τα προβλεπόμενα στην με αρ.  20883/ΓΔ4/12-02-2020 Y.A (ΦΕΚ 456/τ.Β’/13-02-2020)<br>

</p>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC2PAGE2;
			$pdf_aitisi->writeHTML($str_html);
			SavepdfBook($pdf_aitisi,$ary_data['idaitisi'].'A_Αίτηση',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file

//--------------
			// Logo: (placed over the text)
			//$image_file = 'edsmall.gif';
			//$pdf->Image($image_file, 37, 10, //x,y placement
			//'', '', //width and height (keep as is)
			//'GIF', '', //type and url
			//'T', //pointer alignment  T (top), M (middle), B (bottom), N (next line)
			//false, //resize
			//300, //dpi
			//'', //  align L (left), C (center), R (right)
			//false, false, //image is not a mask 
			//0, //no border
			//false, false, false);			
			////- public function Image($file, $x=null, $y=null, $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='',
			////- $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array())

			//watermark:
			//$pdf->setPage( 1 );
			//// Find the middle of the page and adjust.
			//$myX = ( $pdf->getPageWidth() / 2 ) - 80;
			//$myY = ( $pdf->getPageHeight() / 2 ) + 30;
			//$pdf->SetAlpha(0.09);// Set the transparency of the text to really light
			//// Rotate 45 degrees and write the watermarking text
			//$pdf->StartTransform();
			//$pdf->Rotate(45, $myX, $myY);
			//$pdf->SetFont("", "", 40);
			//$pdf->Text($myX, $myY,"ΠΡΟΣΩΡΙΝΗ ΑΠΟΘΗΚΕΥΣΗ");
			//$pdf->StopTransform();
			////$pdf->SetAlpha(1);// Reset the transparency to default			
		}
		break;
		case 'Εκπαιδευτική εκδρομή στο εσωτερικό':
		{
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_epistrofis']);
			$hmera_epistrofis= date_format($datetime,"d-m-Y"); 

			if ($ary_data['onoma_jenodoxeio']!='') $name_katalyma = "Το όνομα του καταλύματος είναι: {$ary_data['onoma_jenodoxeio']} <br>";
			else $name_katalyma='';

			if ($hmera_ekdromis!=$hmera_epistrofis) $hmerominies= "από <b>$hmera_ekdromis</b> έως <b>$hmera_epistrofis</b>";
			else $hmerominies="στις <b>$hmera_ekdromis</b>";

			$str_html= <<<ENDOFDOC
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
	Για εκπαιδευτική επίσκεψη στο πλαίσιο του αναλυτικού προγράμματος με τον εξής προορισμό: <i>{$ary_data['proorismos']}</i></b></p>

<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020) και την πράξη <b>{$ary_data['ar_prajis_syllogou']}</b>, του Συλλόγου Διδασκόντων/ουσών σας ενημερώνω
 ότι:</p><ul style="line-height: 150%;">
Α)	<b>{$ary_data['ar_metakinoumenon']}</b> μαθητές και μαθήτριες του σχολείου μας των τάξεων/τμημάτων: {$ary_data['tmimata']} και <b>$plithos_ekp</b> εκπαιδευτικοί πρόκειται να μετακινηθούν 
με τον εξής προορισμό: <b>{$ary_data['proorismos']}</b>, $hmerominies με το Αναλυτικό Πρόγραμμα σχετικά με το/τα μάθημα/ματα: <i>{$ary_data['mathimata']}</i> στο πλαίσιο της παρ. 2 του άρθρου 3.<br>
Η μετακίνηση θα πραγματοποιηθεί με το/τα εξής μεταφορικό/α μέσο/α: {$ary_data['metaforika_mesa']}.<br>
$name_katalyma
Το πρακτορείο είναι το εξής: {$ary_data['onoma_praktoreio']}<br>
Β)	Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία <br>
Γ)	Έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α.
</ul>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file

		}
		break;
		case 'Εκπαιδευτική εκδρομή στο εξωτερικό':
		{
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_epistrofis']);
			$hmera_epistrofis= date_format($datetime,"d-m-Y"); 
			
			if ($hmera_ekdromis!=$hmera_epistrofis) $hmerominies= "από <b>$hmera_ekdromis</b> έως <b>$hmera_epistrofis</b>";
			else $hmerominies="στις <b>$hmera_ekdromis</b>";
	
			$str_html= <<<ENDOFDOC
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>ΔΙΑΒΙΒΑΣΤΙΚΟ</b></p>
	<p><br></p>
	<p><b>ΘΕΜΑ: Έγκριση μετακίνησης μαθητών/τριών και εκπαιδευτικών με προορισμό: <i>"{$ary_data['proorismos']}"</i> στο πλαίσιο του αναλυτικού προγράμματος του άρθρου 3 § 2.</p>

<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το αρ. 16 της Y.A. 20883/ΓΔ4/12-02-2020 ΦΕΚ 456/τ.Β’/13-02-2020, σας διαβιβάζουμε την αίτηση
 μαζί με τα απαραίτητα δικαιολογητικά σχετικά με την έγκριση της μετακίνησης μαθητών/τριών και εκπαιδευτικών του σχολείου μας 
με προορισμό: <i>{$ary_data['proorismos']}</i>, $hmerominies στο πλαίσιο του αναλυτικού προγράμματος του άρθρου 3 § 2. 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;Ο/Η Διευθυντής/ντρια του σχολείου και ο Σύλλογος Διδασκόντων <u>εισηγούμαστε</u> για την πραγματοποίησή της.<br>&nbsp;&nbsp;&nbsp;&nbsp;Παρακαλούμε για τις δικές σας ενέργειες.<br> 
</p>
<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>
ENDOFDOC;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
			
			//build aitisi:
			TrimSqlHours($ary_data);

			$ary_datahmera_ekdromis_anaxorisis = (new DateTime($ary_data['hmera_ekdromis_anaxorisis']))->format('d-m-Y');
			$ary_datahmera_epistrofis = (new DateTime($ary_data['hmera_epistrofis']))->format('d-m-Y');

			
			$str_html= <<<ENDOFDOC2
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table><p align="center"><b>ΑΙΤΗΣΗ ΕΓΚΡΙΣΗΣ ΜΕΤΑΚΙΝΗΣΗΣ ΜΑΘΗΤΩΝ ΚΑΙ ΕΚΠΑΙΔΕΥΤΙΚΩΝ ΣΤΟ ΠΛΑΙΣΙΟ ΕΚΠΑΙΔ. ΕΠΙΣΚΕΨΗΣ</b></p>
	<p align="center">Παρακαλούμε να εγκρίνετε την παρακάτω εκπαιδευτική επίσκεψη των μαθητών του σχολείου μας στο ΕΞΩΤΕΡΙΚΟ</p>
	<p></p>

<table>
<tr><td><b>Α. ΣΤΟΙΧΕΙΑ ΣΧΟΛΙΚΗΣ ΜΟΝΑΔΑΣ</b><br>
Σχ. Μονάδα: {$_SESSION['displayname']}<br>
Τηλ. Επικοινωνίας: {$_SESSION['phonenumbers']}<br>
email: {$_SESSION['usermail']}<br>
{$ary_data['prosfonisi_ypografonta']}: {$ary_data['onoma_ypografonta']}
</td>
<td>
<b>Β. ΣΤΟΙΧΕΙΑ ΕΚΔΡΟΜΗΣ</b><br>
Τόπος μετακίνησης: {$ary_data['proorismos']}<br>
</td></tr>
</table>	
<p style="line-height: 150%;">
<b>Γ. ΣΤΟΙΧΕΙΑ ΕΠΙΣΚΕΨΗΣ</b> (Η μετακίνηση πραγματοποιείται στο πλαίσιο της Υ.Α 20883/ΓΔ4/12-02-2020, ΦΕΚ 456/τ.Β/13-02-2020) άρθρο 3, §2.<br> <br>

Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:<br> {$ary_data['ar_prajis_syllogou']}<br>
Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:<br> {$ary_data['praji_epilogi_praktoreiou']}<br>
Αρ. Πρ. & ημ. διαβίβασης αιτήματος ανάρτησης προκήρυξης:<br> {$ary_data['ar_pr_anartisisprok']}<br>
Αριθμός ασφαλιστηρίου συμβολαίου για τη διάρκεια του ταξιδιού και της διαμονής:<br> {$ary_data['asf_symbolaio']}<br>

Όνομα ξενοδοχείου: {$ary_data['onoma_jenodoxeio']}  Όνομα πρακτορείου: {$ary_data['onoma_praktoreio']}
<br> <br>
<b>Ημερομηνία Αναχώρησης:</b> {$ary_datahmera_ekdromis_anaxorisis} <b>Ημερομηνία Επιστροφής:</b> {$ary_datahmera_epistrofis}<br>
(οποτεδήποτε μέσα στο διδακτικό έτος και μέχρι 10 μέρες πριν τη λήξη των μαθημάτων)<br> <br>

Διάρκεια μετακίνησης (σύνολο ημερών): {$ary_data['diarkeia_hmeres']}<br>

Ώρα αναχώρησης: {$ary_data['ora_anaxorisis']} Ώρα επιστροφής: {$ary_data['ora_epistrofis']}<br>

Ώρα άφιξης στον προορισμό: {$ary_data['ora_afijis']} Ώρα αναχώρησης για επιστροφή: {$ary_data['ora_apoxorisis']}<br>

Μεταφορικό μέσο: {$ary_data['metaforika_mesa']}<br>

<b>Σύνολο</b> μαθητών/τριών : {$ary_data['ar_mathiton']} <b>Μετακινούμενοι</b> μαθητές/τριες : {$ary_data['ar_metakinoumenon']}<br>
(Αριθμός μαθητών/τριών ≥ 70%) <b>&#x2611;</b> <br>

Αριθμός συνοδών εκπαιδευτικών (εκτός του αρχηγού): {$ary_data['plithos_synodoi']} (1/20μαθητές/τριες)<br>
</p>
ENDOFDOC2;
			$pdf_aitisi = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf_aitisi, 10);
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			$pdf_aitisi->writeHTML($str_html);
			
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			
			$str_html= <<<ENDOFDOC2PAGE2
<p style="line-height: 150%;">
<br> <br>
<b>Δ. ΣΥΝΗΜΜΕΝΑ ΥΠΟΒΑΛΛΟΝΤΑΙ:</b><br>

1. Αντίγραφο της πράξης του συλλόγου διδασκόντων για τη μετακίνηση 
    (στην οποία αναγράφονται, εκτός των άλλων, το αναλυτικό πρόγραμμα της μετακίνησης, <b>ολογράφως</b> 
    τα ονοματεπώνυμα των εκπαιδευτικών και γίνεται περιγραφή των διδακτικών στόχων του αναλυτικού προγράμματος
    και η σύνδεσή τους με τη συγκεκριμένη δράση)<br>

<br> <br>

<b>Ε. ΜΕ ΤΟ ΠΑΡΟΝ ΒΕΒΑΙΩΝΩ ΟΤΙ:</b><br>

1. Έχουν κατατεθεί και τηρούνται στο σχολείο οι υπεύθυνες δηλώσεις των γονέων/κηδεμόνων των
    συμμετεχόντων μαθητών.<br>
2. Ο αρχηγός της μετακίνησης και ο αναπληρωτής του είναι μόνιμοι εκπαιδευτικοί (ή αναπληρωτές πλήρους 
     ωραρίου εφόσον δεν υπάρχει μόνιμος), οι  συνοδοί και οι αναπληρωτές τους είναι εκπαιδευτικοί της Δ.Ε. 
     και δεν είναι αναπληρωτές με μειωμένο ωράριο, ούτε ωρομίσθιοι.<br>
3. Οι συνοδοί ανήκουν στο σύλλογο διδασκόντων του σχολείου και η αναλογία, κατά τη μετακίνηση, είναι 1/20 
    μαθητές εκτός του αρχηγού. <br>
5. Καλύπτεται ο προβλεπόμενος  αριθμός συμμετοχής  μαθητών ≥ 70% της τάξης βάσει των
    υπεύθυνων δηλώσεων των γονέων/κηδεμόνων.<br>
6. Υπάρχει ασφάλεια επαγγελματικής -αστικής ευθύνης του τουριστικού πρακτορείου/διοργανωτή<br>
7. Όλοι οι συμμετέχοντες έχουν ιατροφαρμακευτική κάλυψη<br>
8. Δε διαταράσσεται η ομαλή λειτουργία της σχολικής μονάδας και δεν προκύπτει δαπάνη 
    για το δημόσιο.<br>
9. Εφαρμόστηκαν όλα τα προβλεπόμενα στην με αρ. 20883/ΓΔ4/12-02-2020 Y.A (ΦΕΚ 456/τ.Β’/13-02-2020)<br>
</p>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC2PAGE2;
			$pdf_aitisi->writeHTML($str_html);
			SavepdfBook($pdf_aitisi,$ary_data['idaitisi'].'A_Αίτηση',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
			
		}
		break;
		case 'Διδακτική επίσκεψη':
		{
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$str_html= <<<ENDOFDOC
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
	ΓΙΑ ΠΡΑΓΜΑΤΟΠΟΙΗΣΗ ΔΙΔΑΚΤΙΚΗΣ ΕΠΙΣΚΕΨΗΣ </b></p>

 
<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020) και την πράξη
<b>{$ary_data['ar_prajis_syllogou']}</b> του Συλλόγου Διδασκόντων σας ενημερώνω ότι:
<ul style="line-height: 150%;">

α/ <b>{$ary_data['ar_metakinoumenon']}</b> μαθητές και μαθήτριες της/των {$ary_data['tmimata']} τάξης/τμήματος ή τάξεων/τμημάτων του σχολείου μας και
 <b>$plithos_ekp</b> εκπαιδευτικοί πρόκειται να πραγματοποιήσουν διδακτική επίσκεψη με 
 τον εξής προορισμό: <b>{$ary_data['proorismos']}</b> στις $hmera_ekdromis, στο πλαίσιο του μαθήματος: {$ary_data['titlos_programmatos']} σύμφωνα  με το άρθρο 4.<br>
β/ έχω ολοκληρώσει όλη την προβλεπόμενη διαδικασία <br>
γ/ έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α. <br>
</ul></p>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
			
		}
		break;
		case 'Επίσκεψη στη Βουλή των Ελλήνων':
		{
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_epistrofis']);
			$hmera_epistrofis= date_format($datetime,"d-m-Y"); 

			if ($ary_data['onoma_jenodoxeio']!='') $name_katalyma = "Το όνομα του καταλύματος είναι: {$ary_data['onoma_jenodoxeio']} <br>";
			else $name_katalyma='';

			if ($hmera_ekdromis!=$hmera_epistrofis) $hmerominies= "από <b>$hmera_ekdromis</b> έως <b>$hmera_epistrofis</b>";
			else $hmerominies="στις <b>$hmera_ekdromis</b>";

			$str_html= <<<ENDOFDOC
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
	ΓΙΑ ΠΡΑΓΜΑΤΟΠΟΙΗΣΗ ΜΕΤΑΚΙΝΗΣΗΣ ΣΤΗ ΒΟΥΛΗ</b></p>

<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020) και την πράξη <b>{$ary_data['ar_prajis_syllogou']}</b>, του Συλλόγου Διδασκόντων/ουσών σας ενημερώνω
 ότι:</p>
<ul style="line-height: 150%;">
1. <b>{$ary_data['ar_metakinoumenon']}</b> μαθητές και μαθήτριες της {$ary_data['tmimata']} τάξης του σχολείου μας και <b>$plithos_ekp</b> εκπαιδευτικοί πρόκειται να μετακινηθούν 
στην Αθήνα στη Βουλή των Ελλήνων στο πλαίσιο του άρθρου 7, $hmerominies, <br>
2. Η μετακίνηση θα γίνει με το/τα εξής μεταφορικό/α μέσο/α: {$ary_data['metaforika_mesa']}.<br>
 $name_katalyma
 Το πρακτορείο είναι το εξής: {$ary_data['onoma_praktoreio']}<br>
3. έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία <br>
4. έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α. 
</ul>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file

			
		}
		break;
		case 'Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού':
		{
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_epistrofis']);
			$hmera_epistrofis= date_format($datetime,"d-m-Y"); 

			if ($ary_data['onoma_jenodoxeio']!='') $name_katalyma = "Το όνομα του καταλύματος είναι: {$ary_data['onoma_jenodoxeio']} <br>";
			else $name_katalyma='';

			if ($hmera_ekdromis!=$hmera_epistrofis) $hmerominies= "από <b>$hmera_ekdromis</b> έως <b>$hmera_epistrofis</b>";
			else $hmerominies="στις <b>$hmera_ekdromis</b>";

			$str_html= <<<ENDOFDOC
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>Ε Ν Η Μ Ε Ρ Ω Σ Η<br>
	<b>Για συμμετοχή μαθητών και μαθητριών στο εξής: {$ary_data['titlos_programmatos']}</b></p>

<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το άρθρο 17 της Υ.Α. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020) και την πράξη <b>{$ary_data['ar_prajis_syllogou']}</b>, του Συλλόγου Διδασκόντων/ουσών σας ενημερώνω
 ότι:</p><ul style="line-height: 150%;">
1)	<b>{$ary_data['ar_metakinoumenon']}</b> μαθητές και μαθήτριες του σχολείου μας και <b>$plithos_ekp</b> εκπαιδευτικοί πρόκειται να μετακινηθούν 
με τον εξής προορισμό: <b>{$ary_data['proorismos']}</b> για την εξής εκδήλωση: <b>{$ary_data['titlos_programmatos']}</b>, $hmerominies στο πλαίσιο του άρθρου 8.<br>
2) Η μετακίνηση θα πραγματοποιηθεί με το/τα εξής μεταφορικό/α μέσο/α: {$ary_data['metaforika_mesa']}.<br>
$name_katalyma
Το πρακτορείο είναι το εξής: {$ary_data['onoma_praktoreio']}<br>
3)	Έχει ολοκληρωθεί όλη η προβλεπόμενη διαδικασία <br>
4)	Έχουν τηρηθεί όλα τα αναφερόμενα της ανωτέρω Υ.Α.
</ul>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file

		}
		break;
		case 'Εκπαιδευτικών ανταλλαγών σε συνέχεια διακρατικών συμφωνιών/μνημονίων συνεργασίας/εκτελεστικών προγραμμάτων':
			Buldpdfs_europaika($ary_data);
		break;		
		case 'Αδελφοποιήσεων':
			Buldpdfs_europaika($ary_data);
		break;
		case 'Εκπαιδευτικών προγραμμάτων της Γενικής Γραμματείας Θρησκευμάτων':
			Buldpdfs_europaika($ary_data);
		break;
		case 'Ευρωπαϊκών προγραμμάτων δραστηριοτήτων/προγραμμάτων που δε γίνονται στο πλαίσιο του ευρωπαϊκού προγράμματος Erasmus':
			Buldpdfs_europaika($ary_data);
		break;
		case 'Προγραμμάτων διεθνών οργανισμών':
			Buldpdfs_europaika($ary_data);
		break;
		case 'Συμμετοχών σε διεθνείς συναντήσεις, συνέδρια, ημερίδες, διαγωνισμούς, μαθητικές επιστημονικές ολυμπιάδες και άλλες διεθνής εκδηλώσεις':
			Buldpdfs_europaika($ary_data);
		break;
		case 'Προσκλήσεις σχολείων της περ.α του άρθρου 3 του ν. 4415/2016 (Α΄ 159)':
			Buldpdfs_europaika($ary_data);
		break;
		case 'Βράβευσης με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας':
			Buldpdfs_europaika($ary_data);
		break;
		case 'Πιλοτικών προγραμμάτων διεθνών σχολικών δικτύων που εγκρίνονται ή συντονίζονται από το Υπουργείο Παιδείας':
			Buldpdfs_europaika($ary_data);
		break;
		case 'Επισκέψεων σε ερευνητικά κέντρα, εκπαιδευτικά ιδρύματα, πανεπιστήμια, κέντρα πολιτισμού και/ή αθλητισμού':
			Buldpdfs_europaika($ary_data);
		break;
		case 'Επισκέψεων σε ευρωπαϊκούς θεσμούς/διεθνείς οργανώσεις κατόπιν σχετικής πρόσκλησης και αποδοχής τυχόν αιτήματος από το διεθνή οργανισμό':
			Buldpdfs_europaika($ary_data);
		break;
		case 'Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2':
			Buildpdfs_erasmusKA2($ary_data);
		break;
		case 'Μετακίνηση εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1':
			Buildpdfs_erasmusKA1_monoekp($ary_data);
		break;
		default: echo 'Σφάλμα. Δε δημιουργήθηκαν αρχεία γιατί δε βρέθηκε το είδος εκδρομής<br>'; break;
	}
}

function Buildpdfs_erasmusKA1_monoekp(&$ary_data) 
{
	$ds = DIRECTORY_SEPARATOR;  
	$storeFolder = 'arxeia'.$ds. $_SESSION['ekdromes_currentYear'] .$ds. $_SESSION['kodikos_sxoleiou'];
	
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_epistrofis']);
			$hmera_epistrofis= date_format($datetime,"d-m-Y"); 
			
			if ($hmera_ekdromis!=$hmera_epistrofis) $hmerominies= "από <b>$hmera_ekdromis</b> έως <b>$hmera_epistrofis</b>";
			else $hmerominies="στις <b>$hmera_ekdromis</b>";
	
			$str_html= <<<ENDOFDOC1
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>ΔΙΑΒΙΒΑΣΤΙΚΟ</b></p>
	<p></p>
	<p><b>ΘΕΜΑ: Αποστολή αίτησης και δικαιολογητικών για την έγκριση μετακίνησης εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1</b></p>

<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;
Σύμφωνα με τις Υ.Α 25735/Η1/20-02-2020, (ΦΕΚ 625/τ.Β’/27-02-2020) και Υ.Α.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020), σας 
διαβιβάζουμε την αίτηση μαζί με τα απαραίτητα δικαιολογητικά σχετικά με την έγκριση της μετακίνησης στον προορισμό:<i>{$ary_data['proorismos']}</i> 
των:<br>
ENDOFDOC1;

$ekp_list= explode("\n",$ary_data['erasmus_lista_kathig_kaieidikotita']);
$i=0;
foreach ($ekp_list as $ekp) {$i++;$str_html.= "$i. $ekp<br>";}

			$str_html.= <<<ENDOFDOC2
<br>στο πλαίσιο  του Ευρωπαϊκού Προγράμματος Erasmus+ ΚΑ1 <i>{$ary_data['eidos_programmatos']}</i>, με τίτλο: « {$ary_data['titlos_programmatos']} »  και κωδικό : {$ary_data['ar_pr_egrisis_programmatosdde']}.<br>
Η μετακίνηση θα πραγματοποιηθεί $hmerominies. <br> <br>

Ο/Η Διευθυντής/ντρια του σχολείου και ο Σύλλογος Διδασκόντων <u>εισηγούμαστε</u> για την πραγματοποίησή της.<br> <br>
			
Συνημμένα, σας υποβάλλουμε:<br>
ENDOFDOC2;	

$str_html.='1. Αίτηση για την έγκριση της μετακίνησης <br>
2.	Πρόσκληση ονομαστική για την επίσκεψη/συμμετοχή από το φορέα υποδοχής/διοργάνωσης<br>
3.	Πρόγραμμα της επίσκεψης από  το φορέα υποδοχής/διοργάνωσης<br>';

$str_html.='4. Eπίσημο έγγραφο ((υπογεγραμμένo)) έγκρισης του προγράμματος από τον φορέα συντονισμού σε εθνικό επίπεδο. (Ι.Κ.Υ.) <br>
5. Σύμβαση (υπογεγραμμένη) με τον φορέα συντονισμού/διοργάνωσης στο σχετικό παράρτημα της οποίας αναγράφονται το/τα όνομα/ματα του/των συμμετέχοντος/χόντων<br>
6. Αντίγραφο του Πρακτικού του Συλλόγου Διδασκόντων για τη συγκρότηση της παιδ/γικής ομάδας<br>
';
$i=7;
if (trim($ary_data['erasmus_ar_prajis_syllogou_anasigrotisi'],' ')!='')
	{$str_html.="$i. Αντίγραφο του Πρακτικού του Συλλόγου Διδασκόντων για ανασυγκρότηση της παιδαγωγικής ομάδας.<br>";$i++;}

$str_html.="$i. Αντίγραφο του πρακτικού του Συλλόγου Διδασκόντων για τη μετακίνηση (όπου αναγράφονται η Υ.Α. για το Erasmus+ΚΑ1/ο τίτλος και ο κωδικός του προγράμματος/ προορισμός-πόλη - χώρα/ μεταφορικό μέσο/ διαμονή/ υγειονομική περίθαλψη/ ονόματα και επίθετα των εκπαιδευτικών/ αριθμοί πτήσεων και εταιρεία/ αναλυτικό πρόγραμμα της κάθε ημέρας)<br>";
$i++;

if (trim($ary_data['erasmus_ar_prajis_syllogon_sinainesi'],' ')!='')
	{$str_html.="$i. Αντίγραφο του/των Πρακτικού/κών του Συλλόγου Διδασκόντων του/των ΕΠΑΛ ότι συναινεί/ουν για τη μετακίνηση των μαθητών/τριών και εκπαιδευτικών του Ε.Κ.<br>";$i++;}
   
if (trim($ary_data['erasmus_ar_prot_beb_dieythinton'],' ')!='')
	{$str_html.="$i. Για τους εκπαιδευτικούς που διδάσκουν και σε άλλο/άλλα σχολεία βεβαίωση του/των Διευθυνή/ντών του/των άλλου/άλλων σχολείων ότι συναινεί/νουν για τη μετακίνηση του/των εκπαιδευτικών.<br>";$i++;}

if (trim($ary_data['praji_epilogi_praktoreiou'],' ')!='')
	{$str_html.="$i. Βεβαίωση του/της Διευθυντή/ντριας ότι πραγματοποιήθηκε  μειοδοτικός διαγωνισμός για την επιλογή ταξιδιωτικού γραφείου.<br>";$i++;}

$str_html.="$i. Αντίγραφο ασφαλιστηρίου συμβολαίου αστικής- επαγγελματικής ευθύνης.<br>";
$i++;

$str_html.="$i. Για την περίπτωση μετακίνησης που απαιτείται: Βεβαίωση του/της Διευθυντή/τριας ότι όλοι οι συμμετέχοντες έχουν Ευρωπαϊκή κάρτα ασφάλισης ή αντίγραφο του ασφαλιστηρίου συμβολαίου για ιατροφαρμακευτική
 κάλυψη ή αντίγραφο της σχετικής βεβαίωσης της ασφαλιστικής εταιρείας όπου αναφέρονται τα ονόματα των ασφαλισμένων, η χρονική  διάρκεια  της κάλυψης και οι καλύψεις.<br>";
$i++;
		
			
$str_html.= <<<ENDOFDOC3
<br>Παρακαλούμε για τις δικές σας ενέργειες.<br> 
</p>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>
ENDOFDOC3;

			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
	
			//build aitisi:
			TrimSqlHours($ary_data);
			
			$str_html= <<<ENDOFDOC2a
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table><p align="center"><b>ΑΙΤΗΣΗ<br>

Για έγκριση μετακίνησης εκπαιδευτικών με πρόγραμμα ERASMUS+
</b><br>
	Παρακαλούμε να εγκρίνετε την παρακάτω μετακίνηση των εκπαιδευτικών, στο εξωτερικό με πρόγραμμα Erasmus+ΚΑ1</p>

<table>
<tr><td><b>Α. ΣΤΟΙΧΕΙΑ ΣΧΟΛΙΚΗΣ ΜΟΝΑΔΑΣ</b><br>
Σχ. Μονάδα: {$_SESSION['displayname']}<br>
Τηλ. Επικοινωνίας: {$_SESSION['phonenumbers']}<br>
email: {$_SESSION['usermail']}<br>
{$ary_data['prosfonisi_ypografonta']}: {$ary_data['onoma_ypografonta']}
</td>
<td>
<b>Β. ΤΟΠΟΣ, ΠΛΑΙΣΙΟ ΜΕΤΑΚΙΝΗΣΗΣ</b><br>
Τόπος μετακίνησης: {$ary_data['proorismos']}<br>
Τίτλος προγράμματος: {$ary_data['titlos_programmatos']}<br>
Κωδικός: {$ary_data['ar_pr_egrisis_programmatosdde']}<br>
Αρ. Σύμβασης: {$ary_data['erasmus_ar_simbasis']}<br>
</td></tr>
</table>	
<p style="line-height: 150%;">
<b>Γ. ΣΤΟΙΧΕΙΑ ΜΕΤΑΚΙΝΗΣΗΣ</b> 
(Η μετακίνηση πραγματοποιείται στο πλαίσιο των Y.A. 25735/H1/20-02-2020, (ΦΕΚ 625/τ.Β΄/27-02-2020)  και Y.A. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)<br> <br>

1. Αρ. πρωτοκόλλου και ημερομηνία διαβίβασης αιτήματος ανάρτησης προκήρυξης:<br> {$ary_data['ar_pr_anartisisprok']}
[Ανάρτηση για μειοδοτικό δε γίνεται όταν οι μετακινούμενοι είναι έως δέκα (10)]
<br>
2. Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:<br> {$ary_data['praji_epilogi_praktoreiou']}
[δε γίνεται όταν οι μετακινούμενοι είναι έως δέκα (10)]<br>
3. Αριθμός και ημερομηνία της πράξης του Σ.Δ. για τη συγκρότηση της  παιδαγωγικής ομάδας:{$ary_data['erasmus_ar_prajis_syllogou_sigrotisi']}<br>
4. Αριθμός και ημερομηνία της πράξης του Σ.Δ. για την ανασυγκρότηση  της παιδαγωγικής ομάδας: {$ary_data['erasmus_ar_prajis_syllogou_anasigrotisi']} (εάν η Π.Ο. έχει τροποποιηθεί).<br>
5. Αριθμός και ημερομηνία της πράξης του Σ.Δ.  για την απόφαση της μετακίνησης: {$ary_data['ar_prajis_syllogou']}<br>
ENDOFDOC2a;

$i=6;
if (trim($ary_data['erasmus_ar_prajis_syllogon_sinainesi'],' ')!='')
	{$str_html.="$i. Αριθμός και ημερομηνία της πράξης του/των Σ.Δ του/των ΕΠΑΛ ότι συναινεί/ούν για 
	τη μετακίνηση του Ε.Κ: {$ary_data['erasmus_ar_prajis_syllogon_sinainesi']}<br>";$i++;}

if (trim($ary_data['erasmus_ar_prot_beb_dieythinton'],' ')!='')
	{$str_html.="$i. Αριθμός/οί πρωτοκόλλου και ημερομηνία/ες βεβαίωσης/σεων του Διευθυντή/ντών του/των 
σχολείου/σχολείων για τον/τους εκπαιδευτικό/κούς που διδάσκουν και σε αυτό/τά: {$ary_data['erasmus_ar_prot_beb_dieythinton']}<br>";$i++;}
	
$str_html.="$i. Αριθμός Ασφαλιστηρίου Συμβολαίου Αστικής-Επαγγελματικής Ευθύνης για τη διάρκεια του 
ταξιδιού και της διαμονής: {$ary_data['asf_symbolaio']}<br>";

$ary_datahmera_ekdromis_anaxorisis = (new DateTime($ary_data['hmera_ekdromis_anaxorisis']))->format('d-m-Y');
$ary_datahmera_epistrofis = (new DateTime($ary_data['hmera_epistrofis']))->format('d-m-Y');

			$str_html.= <<<ENDOFDOC3
Ημερομηνία Αναχώρησης: {$ary_datahmera_ekdromis_anaxorisis} Ημερομηνία Επιστροφής: {$ary_datahmera_epistrofis}<br>
(Οποτεδήποτε μέσα στο σχολικό έτος εκτός της περιόδου των ενδοσχολικών και πανελλαδικών εξετάσεων και  σύμφωνα με τις ημερομηνίες του προγράμματος)<br> <br>

Διάρκεια μετακίνησης (σύνολο ημερών): {$ary_data['diarkeia_hmeres']}<br>

Ώρα αναχώρησης: {$ary_data['ora_anaxorisis']} Ώρα επιστροφής: {$ary_data['ora_epistrofis']}<br>

Ώρα άφιξης στον προορισμό: {$ary_data['ora_afijis']} Ώρα αναχώρησης για επιστροφή: {$ary_data['ora_apoxorisis']}<br>

Μεταφορικό μέσο: {$ary_data['metaforika_mesa']}<br>
</p>
ENDOFDOC3;

			$pdf_aitisi = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf_aitisi, 10);
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			$pdf_aitisi->writeHTML($str_html);
			
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			
$str_html= '<p style="line-height: 150%;"><br>Ονοματεπώνυμο μετακινούμενων:<br>';

$ekp_list= explode("\n",$ary_data['erasmus_lista_kathig_kaieidikotita']);
$i=0;
foreach ($ekp_list as $ekp) {$i++;$str_html.= "$i. $ekp<br>";}
			
			$pdf_aitisi->writeHTML($str_html);
			//$pdf_aitisi->AddPage();
			
			$str_html= <<<ENDOFDOC2PAGE2
<p style="line-height: 150%;">
<br> <br>
<b>Δ. ΜΕ ΤΟ ΠΑΡΟΝ ΒΕΒΑΙΩΝΩ ΟΤΙ:</b><br>

1. Οι μετακινούμενοι είναι μόνιμοι εκπαιδευτικοί (ή αναπληρωτές πλήρους ωραρίου) της Δ.Ε., ανήκουν στο σχολείο και είναι μέλη της παιδαγωγικής ομάδας.<br>
2. Ότι πραγματοποιήθηκε  μειοδοτικός διαγωνισμός για την επιλογή ταξιδιωτικού γραφείου ή ότι 
	δεν απαιτείται (όταν οι μετακινούμενοι είναι έως δέκα (10) μαζί με τους εκπαιδευτικούς)<br>
3. Όλοι οι συμμετέχοντες έχουν Ευρωπαϊκή κάρτα ασφάλισης ή επισυνάπτονται τα ασφαλιστήρια 
    συμβόλαια ιατροφαρμακευτικής κάλυψης των συμμετεχόντων.<br>
4. Δε διαταράσσεται η ομαλή λειτουργία της σχολικής μονάδας και δεν προκύπτει δαπάνη 
    για το δημόσιο.<br>
5. Εφαρμόστηκαν όλα τα προβλεπόμενα στις με αρ.  25735/H1/20-02-2020 Y.A. (ΦΕΚ 625/τ.Β΄/27-02-2020) και 
    20883/ΓΔ4/12-02-2020 Y.A. (ΦΕΚ 456/τ.Β’/13-02-2020) <br>
<br> <br>
Παρακαλούμε για τις δικές σας ενέργειες.<br>
</p>

ΟΙ ΣΥΜΜΕΤΕΧΟΝΤΕΣ/ΧΟΥΣΕΣ ΕΚΠΑΙΔΕΥΤΙΚΟΙ (υπογραφή)<br>
ENDOFDOC2PAGE2;

$ekp_list= explode("\n",$ary_data['erasmus_lista_kathig_kaieidikotita']);
$i=0;
foreach ($ekp_list as $ekp) {$i++;$str_html.= "$i. $ekp  ______<br> <br>";}

$str_html.= <<<ENDOFDOC2PAGE2b
<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}<br>(σφραγίδα – υπογραφή)</p>
ENDOFDOC2PAGE2b;

			$pdf_aitisi->writeHTML($str_html);
			SavepdfBook($pdf_aitisi,$ary_data['idaitisi'].'A_Αίτηση',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
	
}

function Buildpdfs_erasmusKA2(&$ary_data) 
{
	$ds = DIRECTORY_SEPARATOR;  
	$storeFolder = 'arxeia'.$ds. $_SESSION['ekdromes_currentYear'] .$ds. $_SESSION['kodikos_sxoleiou'];
	
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_epistrofis']);
			$hmera_epistrofis= date_format($datetime,"d-m-Y"); 
			
			if ($hmera_ekdromis!=$hmera_epistrofis) $hmerominies= "από <b>$hmera_ekdromis</b> έως <b>$hmera_epistrofis</b>";
			else $hmerominies="στις <b>$hmera_ekdromis</b>";
	
			$str_html= <<<ENDOFDOC1
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>ΔΙΑΒΙΒΑΣΤΙΚΟ</b></p>
	<p></p>
	<p><b>ΘΕΜΑ: Αποστολή αίτησης και δικαιολογητικών για την έγκριση μετακίνησης μαθητών/τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2</b></p>

<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;
Σύμφωνα με τις Υ.Α 25735/Η1/20-02-2020, (ΦΕΚ 625/τ.Β’/27-02-2020) και Υ.Α.20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020), σας 
διαβιβάζουμε την αίτηση μαζί με τα απαραίτητα δικαιολογητικά σχετικά με την έγκριση της μετακίνησης στον προορισμό:<i>{$ary_data['proorismos']}</i> 
των μαθητών/τριών:<br>
ENDOFDOC1;

$mathites_list= explode("\n",$ary_data['erasmus_lista_mathites_kaitaji']);
$i=0;
foreach ($mathites_list as $mathitis) {$i++;$str_html.= "$i. $mathitis<br>";}

$str_html.='<br>και εκπαιδευτικών:<br>';
$ekp_list= explode("\n",$ary_data['erasmus_lista_kathig_kaieidikotita']);
$i=0;
foreach ($ekp_list as $ekp) {$i++;$str_html.= "$i. $ekp<br>";}

			$str_html.= <<<ENDOFDOC2
<br>στο πλαίσιο  του Ευρωπαϊκού Προγράμματος - <i>{$ary_data['eidos_programmatos']}</i> του σχολείου μας, με τίτλο: « {$ary_data['titlos_programmatos']} »  και κωδικό : {$ary_data['ar_pr_egrisis_programmatosdde']}.<br>
Η μετακίνηση θα πραγματοποιηθεί $hmerominies. <br> <br>

Ο/Η Διευθυντής/ντρια του σχολείου και ο Σύλλογος Διδασκόντων <u>εισηγούμαστε</u> για την πραγματοποίησή της.<br> <br>
			
Συνημμένα, σας υποβάλλουμε:<br>
ENDOFDOC2;	

$str_html.='1. Αίτηση για την έγκριση της μετακίνησης <br>
2.	Πρόσκληση για την επίσκεψη από το ξένο σχολείο ή το φορέα υποδοχής<br>';
if ($_SESSION["typos_sxoleiou"]!='ΕΠΑΛ') 
	$str_html.='3. Πρόγραμμα της επίσκεψης από το ξένο σχολείο ή το φορέα υποδοχής <br>';
else $str_html.='3.	Letter of intent και πρόγραμμα της επίσκεψης (όπως έχουν σταλεί στο ΙΚΥ)<br>';	

$str_html.='4. Eπίσημο έγγραφο ((υπογεγραμμένo)) έγκρισης του προγράμματος από τον φορέα συντονισμού σε εθνικό επίπεδο. (Ι.Κ.Υ.) <br>
5. Σύμβαση (υπογεγραμμένη) με τον φορέα συντονισμού στο σχετικό παράρτημα της οποίας αναγράφεται ο κατάλογος των εταίρων. 
(Συμπεριλαμβάνεται μόνο για την περίπτωση συμμετοχής των σχολικών μονάδων ως εταίρων σε διευρυμένη σύμπραξη, όπου ο συντονιστής είναι ελληνικός φορέας
 ή φορέας του εξωτερικού και όχι για τη σύμπραξη ανταλλαγών μόνο μεταξύ σχολείων). <br>
6. Αντίγραφο του Πρακτικού του Συλλόγου Διδασκόντων για τη συγκρότηση της παιδ/γικής ομάδας<br>
';
$i=7;
if (trim($ary_data['erasmus_ar_prajis_syllogou_anasigrotisi'],' ')!='')
	{$str_html.="$i. Αντίγραφο του Πρακτικού του Συλλόγου Διδασκόντων για ανασυγκρότηση της παιδαγωγικής ομάδας.<br>";$i++;}

$str_html.="$i. Αντίγραφο του πρακτικού του Συλλόγου Διδασκόντων για τη μετακίνηση (όπου αναγράφονται η Υ.Α. για τα Erasmus+/ο τίτλος και ο κωδικός του προγράμματος/ προορισμός-πόλη - χώρα/ μεταφορικό μέσο/ διαμονή/ υγειονομική περίθαλψη/ ονόματα και επίθετα των μαθητών/τριών και εκπαιδευτικών/ αριθμοί πτήσεων και εταιρεία/ αναλυτικό πρόγραμμα της κάθε ημέρας)<br>";
$i++;

if (trim($ary_data['erasmus_ar_prajis_syllogon_sinainesi'],' ')!='')
	{$str_html.="$i. Αντίγραφο του/των Πρακτικού/κών  του Συλλόγου Διδασκόντων του/των ΕΠΑΛ ότι συναινεί/ουν για τη μετακίνηση των μαθητών/τριών και εκπαιδευτικών του Ε.Κ.<br>";$i++;}
   
$str_html.="$i. Βεβαίωση του/της Διευθυντή/ντριας ότι τηρεί τις υπεύθυνες δηλώσεις των γονέων/ κηδεμόνων των μαθητών/τριών και ότι η μετακίνηση δεν γίνεται πριν από τις 6:00 ή/και μετά τις 10:00. (Όταν η μετακίνηση γίνεται πριν από τις 06:00 ή/και μετά τις 22:00  αναγράφεται στην υπεύθυνη δήλωση που υπογράφουν οι γονείς/κηδεμόνες).<br>";
$i++;

$str_html.="$i. Βεβαίωση του/της Διευθυντή/ντριας  ότι ο αρχηγός της μετακίνησης και ο αναπληρωτής του είναι μόνιμοι εκπαιδευτικοί (ή αναπληρωτές πλήρους ωραρίου εφόσον δεν υπάρχει μόνιμος)  
   οι  συνοδοί και οι αναπληρωτές τους είναι εκπαιδευτικοί της Δ.Ε. και δεν είναι αναπληρωτές με μειωμένο ωράριο, ούτε  ωρομίσθιοι. <br>";
$i++;  

if (trim($ary_data['erasmus_ar_prot_beb_dieythinton'],' ')!='')
	{$str_html.="$i. Για τους εκπαιδευτικούς που διδάσκουν και σε άλλο/άλλα σχολεία βεβαίωση του/των Διευθυνή/ντών του/των άλλου/άλλων σχολείων ότι συναινεί/νουν για τη μετακίνηση του/των εκπαιδευτικών.<br>";$i++;}

if (trim($ary_data['praji_epilogi_praktoreiou'],' ')!='')
	{$str_html.="$i. Βεβαίωση του/της Διευθυντή/ντριας ότι  πραγματοποιήθηκε  μειοδοτικός διαγωνισμός για την επιλογή ταξιδιωτικού γραφείου.<br>";$i++;}

$str_html.="$i. Αντίγραφο ασφαλιστηρίου συμβολαίου αστικής- επαγγελματικής ευθύνης.<br>";
$i++;

$str_html.="$i. Για την περίπτωση μετακίνησης που απαιτείται: Βεβαίωση του/της Διευθυντή/τριας ότι όλοι οι συμμετέχοντες έχουν Ευρωπαϊκή κάρτα ασφάλισης ή αντίγραφο του ασφαλιστηρίου συμβολαίου για ιατροφαρμακευτική
 κάλυψη ή αντίγραφο της σχετικής βεβαίωσης της ασφαλιστικής εταιρείας όπου αναφέρονται τα ονόματα των ασφαλισμένων, η χρονική  διάρκεια  της κάλυψης και οι καλύψεις.<br>";
$i++;
		
			
$str_html.= <<<ENDOFDOC3
<br>Παρακαλούμε για τις δικές σας ενέργειες.<br> 
</p>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>
ENDOFDOC3;

			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
	
			//build aitisi:
			TrimSqlHours($ary_data);
			
			$str_html= <<<ENDOFDOC2a
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table><p align="center"><b>ΑΙΤΗΣΗ<br>

Για έγκριση μετακίνησης μαθητών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2
</b><br>
	Παρακαλούμε να εγκρίνετε την παρακάτω μετακίνηση των μαθητών/τριών και εκπαιδευτικών του σχολείου μας, στο εξωτερικό με πρόγραμμα Erasmus+ΚΑ2</p>

<table>
<tr><td><b>Α. ΣΤΟΙΧΕΙΑ ΣΧΟΛΙΚΗΣ ΜΟΝΑΔΑΣ</b><br>
Σχ. Μονάδα: {$_SESSION['displayname']}<br>
Τηλ. Επικοινωνίας: {$_SESSION['phonenumbers']}<br>
email: {$_SESSION['usermail']}<br>
{$ary_data['prosfonisi_ypografonta']}: {$ary_data['onoma_ypografonta']}
</td>
<td>
<b>Β. ΤΟΠΟΣ, ΠΛΑΙΣΙΟ ΜΕΤΑΚΙΝΗΣΗΣ</b><br>
Τόπος μετακίνησης: {$ary_data['proorismos']}<br>
Τίτλος προγράμματος: {$ary_data['titlos_programmatos']}<br>
Κωδικός: {$ary_data['ar_pr_egrisis_programmatosdde']}<br>
Αρ. Σύμβασης: {$ary_data['erasmus_ar_simbasis']}<br>
</td></tr>
</table>	
<p style="line-height: 150%;">
<b>Γ. ΣΤΟΙΧΕΙΑ ΜΕΤΑΚΙΝΗΣΗΣ</b> 
(Η μετακίνηση πραγματοποιείται στο πλαίσιο των Y.A. 25735/H1/20-02-2020, (ΦΕΚ 625/τ.Β΄/27-02-2020)  και Y.A. 20883/ΓΔ4/12-02-2020, (ΦΕΚ 456/τ.Β’/13-02-2020)<br> <br>

1. Αρ. πρωτοκόλλου και ημερομηνία διαβίβασης αιτήματος ανάρτησης προκήρυξης:<br> {$ary_data['ar_pr_anartisisprok']}
[Ανάρτηση για μειοδοτικό δε γίνεται όταν οι μετακινούμενοι είναι έως δέκα (10) μαζί με τους Εκπ/κούς]
<br>
2. Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:<br> {$ary_data['praji_epilogi_praktoreiou']}
[δε γίνεται όταν οι μετακινούμενοι είναι έως δέκα (10) μαζί με τους Εκπ/κούς]<br>
3. Αριθμός και ημερομηνία της πράξης του Σ.Δ. για τη συγκρότηση της  παιδαγωγικής ομάδας:{$ary_data['erasmus_ar_prajis_syllogou_sigrotisi']}<br>
4. Αριθμός και ημερομηνία της πράξης του Σ.Δ. για την ανασυγκρότηση  της παιδαγωγικής ομάδας: {$ary_data['erasmus_ar_prajis_syllogou_anasigrotisi']} (εάν η Π.Ο. έχει τροποποιηθεί).<br>
5. Αριθμός και ημερομηνία της πράξης του Σ.Δ.  για την απόφαση της μετακίνησης: {$ary_data['ar_prajis_syllogou']}<br>
ENDOFDOC2a;

$i=6;
if (trim($ary_data['erasmus_ar_prajis_syllogon_sinainesi'],' ')!='')
	{$str_html.="$i. Αριθμός και ημερομηνία της πράξης του/των Σ.Δ του/των ΕΠΑΛ ότι συναινεί/ούν για 
	τη μετακίνηση του Ε.Κ: {$ary_data['erasmus_ar_prajis_syllogon_sinainesi']}<br>";$i++;}

if (trim($ary_data['erasmus_ar_prot_beb_dieythinton'],' ')!='')
	{$str_html.="$i. Αριθμός/οί πρωτοκόλλου και ημερομηνία/ες βεβαίωσης/σεων του Διευθυντή/ντών του/των 
σχολείου/σχολείων για τον/τους εκπαιδευτικό/κούς που διδάσκουν και σε αυτό/τά: {$ary_data['erasmus_ar_prot_beb_dieythinton']}<br>";$i++;}
	
$str_html.="$i. Αριθμός Ασφαλιστηρίου Συμβολαίου Αστικής-Επαγγελματικής Ευθύνης για τη διάρκεια του 
ταξιδιού και της διαμονής: {$ary_data['asf_symbolaio']}<br>";

$ary_datahmera_ekdromis_anaxorisis = (new DateTime($ary_data['hmera_ekdromis_anaxorisis']))->format('d-m-Y');
$ary_datahmera_epistrofis = (new DateTime($ary_data['hmera_epistrofis']))->format('d-m-Y');


			$str_html.= <<<ENDOFDOC3
Ημερομηνία Αναχώρησης: {$ary_datahmera_ekdromis_anaxorisis} Ημερομηνία Επιστροφής: {$ary_datahmera_epistrofis}<br>
(Οποτεδήποτε μέσα στο σχολικό έτος εκτός της περιόδου των ενδοσχολικών και πανελλαδικών εξετάσεων και  σύμφωνα με τις ημερομηνίες του προγράμματος)<br> <br>

Διάρκεια μετακίνησης (σύνολο ημερών): {$ary_data['diarkeia_hmeres']}<br>

Ώρα αναχώρησης: {$ary_data['ora_anaxorisis']} Ώρα επιστροφής: {$ary_data['ora_epistrofis']}<br>

Ώρα άφιξης στον προορισμό: {$ary_data['ora_afijis']} Ώρα αναχώρησης για επιστροφή: {$ary_data['ora_apoxorisis']}<br>

Μεταφορικό μέσο: {$ary_data['metaforika_mesa']}<br>
</p>
ENDOFDOC3;

			$pdf_aitisi = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf_aitisi, 10);
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			$pdf_aitisi->writeHTML($str_html);
			
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			
$str_html= '<p style="line-height: 150%;"><br>Ονοματεπώνυμο και τάξη μετακινούμενων  μαθητών/τριών:<br>';

$mathites_list= explode("\n",$ary_data['erasmus_lista_mathites_kaitaji']);
$i=0;
foreach ($mathites_list as $mathitis) {$i++;$str_html.= "$i. $mathitis<br>";}

$str_html.='<br>Ονοματεπώνυμο και ειδικότητα συνοδών εκπαιδευτικών<br>';
$ekp_list= explode("\n",$ary_data['erasmus_lista_kathig_kaieidikotita']);
$i=0;
foreach ($ekp_list as $ekp) {$i++;$str_html.= "$i. $ekp<br>";}
			
$str_html.='<br>Ονοματεπώνυμο και ειδικότητα αναπληρωτών συνοδών εκπαιδευτικών<br>';
$ekp_list= explode("\n",$ary_data['erasmus_lista_anaplirkathig_kaieid']);
$i=0;
foreach ($ekp_list as $ekp) {$i++;$str_html.= "$i. $ekp<br>";}			
			
			$pdf_aitisi->writeHTML($str_html);
			$pdf_aitisi->AddPage();
			
			$str_html= <<<ENDOFDOC2PAGE2
<p style="line-height: 150%;">
<br> <br>
<b>Δ. ΜΕ ΤΟ ΠΑΡΟΝ ΒΕΒΑΙΩΝΩ ΟΤΙ:</b><br>

1. Έχουν κατατεθεί και τηρούνται στο σχολείο οι υπεύθυνες δηλώσεις των γονέων/κηδεμόνων των
    συμμετεχόντων μαθητών/τριών, με τις οποίες εγκρίνουν τη μετακίνηση τους, αφού προηγουμένως
    ενημερώθηκαν εγγράφως για το πρόγραμμα και τις υποχρεώσεις των μαθητών/τριών και αναγράφουν
    κάποιο πρόβλημα υγείας (εάν ναι επισυνάπτεται ενημερωτικό σημείωμα). (Σε περίπτωση που η μετακίνηση γίνεται 
    πριν από τις 06:00 ή/και μετά τις 22:00 αναγράφεται στην υπεύθυνη δήλωση).<br>
2. Ο αρχηγός της μετακίνησης και ο αναπληρωτής του είναι μόνιμοι εκπαιδευτικοί (ή αναπληρωτές πλήρους 
     ωραρίου εφόσον δεν υπάρχει μόνιμος)  οι  συνοδοί και οι αναπληρωτές τους είναι εκπαιδευτικοί της Δ.Ε. 
     και δεν είναι αναπληρωτές με μειωμένο ωράριο, ούτε  ωρομίσθιοι. <br>
3. Οι μετακινούμενοι εκπαιδευτικοί ανήκουν στο  σχολείο και η αναλογία, κατά τη μετακίνηση, είναι 1/20 
    μαθητές εκτός του αρχηγού. <br>
4. Ότι πραγματοποιήθηκε  μειοδοτικός διαγωνισμός για την επιλογή ταξιδιωτικού γραφείου ή ότι 
	δεν απαιτείται (όταν οι μετακινούμενοι είναι έως δέκα (10) μαζί με τους εκπαιδευτικούς)<br>
5. Όλοι οι εκπαιδευτικοί και οι αναπληρωτές τους είναι μέλη της παιδαγωγικής ομάδας.<br>
6. Όλοι οι συμμετέχοντες έχουν Ευρωπαϊκή κάρτα ασφάλισης ή επισυνάπτονται τα ασφαλιστήρια 
    συμβόλαια ιατροφαρμακευτικής κάλυψης των συμμετεχόντων.<br>
7. Δε διαταράσσεται η ομαλή λειτουργία της σχολικής μονάδας και δεν προκύπτει δαπάνη 
    για το δημόσιο.<br>
8. Εφαρμόστηκαν όλα τα προβλεπόμενα στις με αρ.  25735/H1/20-02-2020 Y.A. (ΦΕΚ 625/τ.Β΄/27-02-2020) και 
    20883/ΓΔ4/12-02-2020 Y.A. (ΦΕΚ 456/τ.Β’/13-02-2020) <br>
<br> <br>
Παρακαλούμε για τις δικές σας ενέργειες.<br>
</p>

ΟΙ ΣΥΜΜΕΤΕΧΟΝΤΕΣ/ΧΟΥΣΕΣ ΕΚΠΑΙΔΕΥΤΙΚΟΙ (υπογραφή)<br>
ENDOFDOC2PAGE2;

$ekp_list= explode("\n",$ary_data['erasmus_lista_kathig_kaieidikotita']);
$i=0;
foreach ($ekp_list as $ekp) {$i++;$str_html.= "$i. $ekp  ______<br> <br>";}

$str_html.= <<<ENDOFDOC2PAGE2b
<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}<br>(σφραγίδα – υπογραφή)</p>
ENDOFDOC2PAGE2b;

			$pdf_aitisi->writeHTML($str_html);
			SavepdfBook($pdf_aitisi,$ary_data['idaitisi'].'A_Αίτηση',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
	
}

function Buldpdfs_europaika(&$ary_data)
{
	$ds = DIRECTORY_SEPARATOR;  
	$storeFolder = 'arxeia'.$ds. $_SESSION['ekdromes_currentYear'] .$ds. $_SESSION['kodikos_sxoleiou'];
	
			$datetime= date_create($ary_data['hmera_diavivastikou']);
			$str_date_diav= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_ekdromis_anaxorisis']);
			$hmera_ekdromis= date_format($datetime,"d-m-Y"); 
			
			$datetime= date_create($ary_data['hmera_epistrofis']);
			$hmera_epistrofis= date_format($datetime,"d-m-Y"); 
			
			if ($hmera_ekdromis!=$hmera_epistrofis) $hmerominies= "από <b>$hmera_ekdromis</b> έως <b>$hmera_epistrofis</b>";
			else $hmerominies="στις <b>$hmera_ekdromis</b>";
	
			$str_html= <<<ENDOFDOC1
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table>
	ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:<br>
	Σχολείο: {$_SESSION['displayname']}<br>
	Τηλ.: {$_SESSION['phonenumbers']}<br>
	email: {$_SESSION['usermail']}<br>
	
	<p align="center"><b>ΔΙΑΒΙΒΑΣΤΙΚΟ</b></p>
	<p><br></p>
	<p><b>ΘΕΜΑ: Έγκριση μετακίνησης μαθητών/τριών και εκπαιδευτικών με προορισμό: <i>"{$ary_data['proorismos']}"</i> με 
	το άρθρο 5, περίπτωση: <i>{$ary_data['eidos_ekdromis']}</i></b></p>

<p style="line-height: 200%;">&nbsp;&nbsp;&nbsp;&nbsp;Σύμφωνα με το αρ. 16 της Υ.Α. με αρ. 20883/ΓΔ4/12-02-2020 (ΦΕΚ 456/τ.Β’/13-02-2020), σας 
διαβιβάζουμε την αίτηση μαζί με τα απαραίτητα δικαιολογητικά σχετικά με την έγκριση της μετακίνησης μαθητών/τριών και εκπαιδευτικών του
σχολείου μας με προορισμό: <i>{$ary_data['proorismos']}</i>, $hmerominies <br>
&nbsp;&nbsp;&nbsp;&nbsp;Ο/Η Διευθυντής/ντρια του σχολείου και ο Σύλλογος Διδασκόντων <u>εισηγούμαστε</u> για την πραγματοποίησή της.<br>&nbsp;&nbsp;&nbsp;&nbsp;Παρακαλούμε για τις δικές σας ενέργειες.<br> 
</p>
<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>
ENDOFDOC1;
			require('pdf_functions.php');
			$pdf = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf, 11);
			$pdf->AddPage(); //-no headers or footers needed
			$pdf->writeHTML($str_html);
			SavepdfBook($pdf,$ary_data['idaitisi'].'F_Διαβιβαστικό',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file
			
			//build aitisi:
			TrimSqlHours($ary_data);
			
			$str_html= <<<ENDOFDOC2a
	<table>
	<tr><td><p align="center"><img src="edsmall.gif">&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td> </td><td> </td></tr>
	<tr><td><p align="center">ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
	ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
	ΘΡΗΣΚΕΥΜΑΤΩΝ & ΑΘΛΗΤΙΣΜΟΥ<br>
	ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
	Π/ΘΜΙΑΣ & Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
	Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
	ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ<br>
	</p>
	</td>
	<td></td>
	<td>
	<p>
	Θεσσαλονίκη: $str_date_diav<br>
	Αρ. Πρωτ.: {$ary_data['ar_prot_sxoleiou']}<br>
	</p>
	ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ	ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
	</td></tr>
	</table><p align="center"><b>ΑΙΤΗΣΗ ΕΓΚΡΙΣΗΣ ΜΕΤΑΚΙΝΗΣΗΣ ΜΑΘΗΤΩΝ ΚΑΙ ΕΚΠΑΙΔΕΥΤΙΚΩΝ ΣΤΟ ΕΞΩΤΕΡΙΚΟ</b><br>
	Παρακαλούμε να εγκρίνετε την παρακάτω εκπαιδευτική επίσκεψη των μαθητών/τριων του σχολείου μας στο εξωτερικό</p>

<table>
<tr><td><b>Α. ΣΤΟΙΧΕΙΑ ΣΧΟΛΙΚΗΣ ΜΟΝΑΔΑΣ</b><br>
Σχ. Μονάδα: {$_SESSION['displayname']}<br>
Τηλ. Επικοινωνίας: {$_SESSION['phonenumbers']}<br>
email: {$_SESSION['usermail']}<br>
{$ary_data['prosfonisi_ypografonta']}: {$ary_data['onoma_ypografonta']}
</td>
<td>
<b>Β. ΤΟΠΟΣ, ΠΛΑΙΣΙΟ ΜΕΤΑΚΙΝΗΣΗΣ</b><br>
Τόπος μετακίνησης: {$ary_data['proorismos']}<br>
Η μετακίνηση ανήκει στην περίπτωση: {$ary_data['eidos_ekdromis']}<br>
</td></tr>
</table>	
<p style="line-height: 150%;">
<b>Γ. ΣΤΟΙΧΕΙΑ ΜΕΤΑΚΙΝΗΣΗΣ</b> (Η μετακίνηση πραγματοποιείται στο πλαίσιο της Υ.Α 20883/ΓΔ4/12-02-2020, ΦΕΚ 456/τ.Β/13-02-2020) άρθρο 5.<br> <br>

Αριθμός και ημερομηνία πράξης συλλόγου βάσει της οποίας γίνεται η μετακίνηση:<br> {$ary_data['ar_prajis_syllogou']}<br>
Αριθμός και ημερομηνία πράξης του διευθυντή για την επιλογή του τουριστικού γραφείου:<br> {$ary_data['praji_epilogi_praktoreiou']}<br>
Αρ. Πρ. & ημ. διαβίβασης αιτήματος ανάρτησης προκήρυξης:<br> {$ary_data['ar_pr_anartisisprok']}<br>
Αριθμός ασφαλιστηρίου συμβολαίου για τη διάρκεια του ταξιδιού και της διαμονής:<br> {$ary_data['asf_symbolaio']}<br>
ENDOFDOC2a;

//telika den xreiazetai ar. egrisis:
//if ($ary_data['eidos_ekdromis']=='Αδελφοποιήσεων') $str_html.= "Αρ. Πρ. έγκρισης του εκπαιδευτικού προγράμματος της επίσκεψης, από το/την Διευθυντή/τρια της ΔΔΕ: {$ary_data['ar_pr_egrisis_programmatosdde']}<br>";

$ary_datahmera_ekdromis_anaxorisis = (new DateTime($ary_data['hmera_ekdromis_anaxorisis']))->format('d-m-Y');
$ary_datahmera_epistrofis = (new DateTime($ary_data['hmera_epistrofis']))->format('d-m-Y');

$str_html.= <<<ENDOFDOC2b

Όνομα ξενοδοχείου: {$ary_data['onoma_jenodoxeio']}  Όνομα πρακτορείου: {$ary_data['onoma_praktoreio']}
<br> <br>
Ημερομηνία Αναχώρησης: {$ary_datahmera_ekdromis_anaxorisis} Ημερομηνία Επιστροφής: {$ary_datahmera_epistrofis}<br>
(Οποτεδήποτε μέσα στο σχολικό έτος. Εξαιρείται το χρονικό διάστημα μίας εβδομάδας πριν την έναρξη των εξετάσεων ενδοσχολικών και πανελλαδικών έως τη λήξη τους)<br> <br>

Διάρκεια μετακίνησης (σύνολο ημερών): {$ary_data['diarkeia_hmeres']}<br>

Ώρα αναχώρησης: {$ary_data['ora_anaxorisis']} Ώρα επιστροφής: {$ary_data['ora_epistrofis']}<br>

Ώρα άφιξης στον προορισμό: {$ary_data['ora_afijis']} Ώρα αναχώρησης για επιστροφή: {$ary_data['ora_apoxorisis']}<br>

Μεταφορικό μέσο: {$ary_data['metaforika_mesa']}<br>

Αριθμός μετακινούμενων μαθητών/τριών: {$ary_data['ar_metakinoumenon']} Αριθμός συνοδών εκπαιδευτικών (εκτός του αρχηγού): {$ary_data['plithos_synodoi']} (1/20μαθητές/τριες)<br>
</p>
ENDOFDOC2b;
			$pdf_aitisi = new MYPDF('P', //Page orientation (P=portrait, L=landscape).
				'mm', //measurement units [pt=point, mm=millimeter, cm=centimeter, in=inch]
				'A4', //page format
				true, 'UTF-8', false);
			InitializepdfBook($pdf_aitisi, 10);
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			$pdf_aitisi->writeHTML($str_html);
			
			$pdf_aitisi->AddPage(); //-no headers or footers needed
			
			$str_html= <<<ENDOFDOC2PAGE2
<p style="line-height: 150%;">
<br> <br>
<b>Δ. ΣΥΝΗΜΜΕΝΑ ΥΠΟΒΑΛΛΟΝΤΑΙ:</b><br>

1. Αντίγραφο της πράξης του συλλόγου διδασκόντων για τη μετακίνηση [στην οποία αναγράφονται, εκτός των άλλων, ολογράφως τα ονοματεπώνυμα των συμμετεχόντων μαθητών/τριών και εκπαιδευτικών, το αναλυτικό πρόγραμμα της μετακίνησης και ο αρ. πρ. έγκρισης του προγράμματος (όταν η μετακίνηση γίνεται μέσω προγράμματος)<br>

2. Αντίγραφο της απόφασης της έγκρισης του προγράμματος (εφόσον η μετακίνηση γίνεται μέσω προγράμματος).<br>

3. Το εγκεκριμένο από το Σ.Δ. αναλυτικό πρόγραμμα της κάθε ημέρας της μετακίνησης<br>

4. Έγγραφο που αποδεικνύει το λόγο της μετακίνησης: {$ary_data['titlos_programmatos']} 
<br> <br>

<b>Ε. ΜΕ ΤΟ ΠΑΡΟΝ ΒΕΒΑΙΩΝΩ ΟΤΙ:</b><br>
1. Έχουν κατατεθεί και τηρούνται στο σχολείο οι υπεύθυνες δηλώσεις των γονέων/κηδεμόνων των
    συμμετεχόντων μαθητών.<br>
2. Ο αρχηγός της μετακίνησης και ο αναπληρωτής του είναι μόνιμοι εκπαιδευτικοί (ή αναπληρωτές πλήρους 
     ωραρίου εφόσον δεν υπάρχει μόνιμος) οι  συνοδοί και οι αναπληρωτές τους είναι εκπαιδευτικοί της Δ.Ε. 
     και δεν είναι αναπληρωτές με μειωμένο ωράριο, ούτε  ωρομίσθιοι.<br>
3. Οι συνοδοί ανήκουν στο σύλλογο διδασκόντων του σχολείου και η αναλογία, κατά τη μετακίνηση, είναι 1/20 
    μαθητές εκτός του αρχηγού. <br>
4. Όλοι οι  μαθητές/τριες συμμετέχουν με αιτιολογημένη απόφαση του Σ.Δ.<br>
5. Οι εκπαιδευτικοί και οι μαθητές/τριες είναι μέλη της παιδαγωγικής ομάδας (εφόσον η μετακίνηση γίνεται μέσω προγράμματος)<br>
6. Υπάρχει ασφάλεια επαγγελματικής αστικής ευθύνης του τουριστικού πρακτορείου/διοργανωτή<br>
7. Όλοι οι συμμετέχοντες έχουν ιατροφαρμακευτική κάλυψη<br>
8. Δε διαταράσσεται η ομαλή λειτουργία της σχολικής μονάδας και δεν προκύπτει δαπάνη για το δημόσιο.<br>
9. Εφαρμόστηκαν όλα τα προβλεπόμενα στην με αρ. 20883/ΓΔ4/12-02-2020 Y.A (ΦΕΚ 456/τ.Β’/13-02-2020)<br>

</p>

<p align="center">{$ary_data['prosfonisi_ypografonta']}<br> <br> <br>
{$ary_data['onoma_ypografonta']}</p>

ENDOFDOC2PAGE2;
			$pdf_aitisi->writeHTML($str_html);
			SavepdfBook($pdf_aitisi,$ary_data['idaitisi'].'A_Αίτηση',$storeFolder);//save file to disk, will not overwrite, A==autogenerated, F==last autogenerated file

}

function display_mainuser()
{
	require('db.php');

	$selected_sx_etos= $_SESSION['ekdromes_currentYear'];
	$kodikos_sxoleiou= $_SESSION['kodikos_sxoleiou']; //$currentuser, $_SESSION['currentuser']
	
	$amount=0;
	//mysqli_report(MYSQLI_REPORT_ERROR);//not strict or it will kill everything on error
	
	try {
		
    	$result = mysqli_query($mySqlConnection, "SELECT idaitisi,ar_prot,submit_datetime,status,eidos_ekdromis,paratiriseis,a_arithmos,ar_prot_sxoleiou FROM
		$pinakas_ekdromes WHERE kodikos_sxoleiou='$kodikos_sxoleiou' ORDER BY submit_datetime DESC");

	}
	catch (mysqli_sql_exception $e) 
	{
		echo '<p>Σφάλμα:'.$e->getMessage() .'</p>';
		die();//return;
		//throw $e;
	}
	
	if (mysqli_errno($mySqlConnection)) {echo 'Σφάλμα βάσης δεδομένων:<br>'.mysqli_error($mySqlConnection).'<br>';return;}
	else
		$amount = mysqli_num_rows($result);

	if ($amount==0) {echo 'Δε βρέθηκαν εγγραφές εκδρομών. Δημιουργήστε την πρώτη με το κουμπί "Καταχώρηση νέας εκδρομής"<br> <br>';return;}
	
	//<th>Τίτλος&nbsp;&#8645;</th>
	$stiles='<th>αα&nbsp;&#8645;</th>
		<th>Αρ.Πρωτ.&nbsp;&#8645;</th>
		<th>Είδος&nbsp;&#8645;</th>
		
		<th title="αριθμός εκδρομής αυτού του είδους για το τρέχον σχ. έτος">αα είδους&nbsp;&#8645;</th>
		<th>Κατάσταση&nbsp;&#8645;</th>
		<th>Παρατηρήσεις&nbsp;&#8645;</th>
		<th>Ημερομηνία Υποβολής ή Αποθήκευσης&nbsp;&#8645;</th>
		<th>Επεξεργασία/ Προβολή</th>';
		
echo '
Υποβολές Εκδρομών:<br><center>
<table id="ekdromesTable" class="table table-hover table-bordered" cellspacing="0" width="100%" align=center>
		<thead style="background: Silver;">
		<tr>'.$stiles.'</tr>
		</thead>
		<tbody>';
	for ($i=1; $i<=$amount; $i++) {
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if ($row['status']=='ΥΠΟΒΛΗΘΗΚΕ') $displaystatus= 'ΥΠΟΒΛΗΘΗΚΕ ΑΠ(ΔΔΕ):'.$row['ar_prot'];
		else $displaystatus=$row['status'];
		
		//if (mb_strlen($row['eidos_ekdromis'])>22) $truncatedstr_eidos= mb_substr($row['eidos_ekdromis'],0,18) .'...';
		//else $truncatedstr_eidos= $row['eidos_ekdromis'];
		if (mb_strlen($row['eidos_ekdromis'])>32) $truncatedstr_eidos= mb_substr($row['eidos_ekdromis'],0,28) .'...';
		else $truncatedstr_eidos= $row['eidos_ekdromis'];
		
		//<td>{$row['titlos']}</td>
		echo "<tr> 
			<td>$i</td>
			<td>{$row['ar_prot_sxoleiou']}</td>
			<td title='{$row['eidos_ekdromis']}'><span title='{$row['eidos_ekdromis']}'>$truncatedstr_eidos</span></td>
			
			<td>{$row['a_arithmos']}</td>
			<td><small>$displaystatus</small></td> 
			<td><small>{$row['paratiriseis']}</small></td>
			<td>{$row['submit_datetime']}</td>
			<td style='text-align:center'><form method=post action=mainindex.php id=frm$i>";

		if 	($row['status']=='ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ' && $row['ar_prot']=='')
			echo "<input type=hidden name='idaitisis' value='{$row['idaitisi']}'>
				  <button type=submit name='action' id='editbutton' value='edit' title='Επεξεργασία'><span class='glyphicon glyphicon-edit'></span></button>
				  &nbsp;
				  <input type=hidden name=delete id=delete$i value=delete>
				  <button type=button name='action' id='delbutton' value='delete' title='Διαγραφή' onclick='javascript:if(window.confirm(\"Είστε σίγουροι για τη διαγραφή; Θα διαγραφούν και όλα τα αρχεία αν υπάρχουν.\")){document.getElementById(\"delete$i\").name=\"action\"; document.getElementById(\"frm$i\").submit();}'><span class='glyphicon glyphicon-trash'></span></button>
				  ";
		else //if ($row['status']=='ΥΠΟΒΛΗΘΗΚΕ')
			echo "<input type=hidden name='idaitisis' value='{$row['idaitisi']}'>
				  <button type=submit name='action' id='viewbutton' value='view' title='Προβολή'><span class='glyphicon glyphicon-eye-open'></span></button>
				  &nbsp;
				  <button type=button name='cancel' id='cancelbutton' title='Ακύρωση/Διαγραφή' onClick='javascript:alert(". '"Η εκδρομή έχει λάβει αρ. πρωτ. στη ΔΔΕ και δεν ακυρώνεται αυτόματα.\nΓια ακύρωση επικοινωνήστε με τη ΔΔΕ.\nΑΠ:'.$row['ar_prot'].'"' .");'><span class='glyphicon glyphicon-remove-circle'></span></button>
				  ";
				  
		//<span id='status_1' style='background-color:#ff726f;'>red on error</span>
		echo '</form></td></tr>';
	}//end of aitiseis iteration

	$stiles= str_replace('&nbsp;&#8645;','',$stiles);
echo '</tbody>
		<tfoot style="background: Silver;">
		<tr>'.$stiles.'</tr>
	  </tfoot>		
		</table></center>';
	
}

function display_mainadmin()//admin view only all ekdromes
{
	//display list of all records for admin only. List is readonly.
	require('db.php');

	$selected_sx_etos= $_SESSION['ekdromes_currentYear'];
	//$_SESSION['ekdromes_actualCurrentYear']
	$pinakas_sx = "sxoleia$selected_sx_etos";
	$kodikos_sxoleiou= $_SESSION['kodikos_sxoleiou']; //$currentuser, $_SESSION['currentuser']
	
	$amount=0;
	//mysqli_report(MYSQLI_REPORT_ERROR);//not strict or it will kill everything on error
	
	try {
		
    	$result = mysqli_query($mySqlConnection, "SELECT idaitisi,ar_prot,submit_datetime,status,eidos_ekdromis,paratiriseis,a_arithmos,ar_prot_sxoleiou,$pinakas_ekdromes.kodikos_sxoleiou,$pinakas_sx.onomasia
		FROM $pinakas_ekdromes 
		LEFT JOIN $pinakas_sx ON $pinakas_ekdromes.kodikos_sxoleiou=$pinakas_sx.kodikos_sxoleiou
		ORDER BY kodikos_sxoleiou,submit_datetime DESC");

	}
	catch (mysqli_sql_exception $e) 
	{
		echo '<p>Σφάλμα:'.$e->getMessage() .'</p>';
		die();//return;
		//throw $e;
	}
	
	if (mysqli_errno($mySqlConnection)) {echo 'Σφάλμα βάσης δεδομένων:<br>'.mysqli_error($mySqlConnection).'<br>';return;}
	else
		$amount = mysqli_num_rows($result);

	if ($amount==0) {echo 'Δε βρέθηκαν εγγραφές εκδρομών. Δημιουργήστε την πρώτη με το κουμπί "Καταχώρηση νέας εκδρομής"<br> <br>';return;}
	
	//<th>Τίτλος&nbsp;&#8645;</th>
	$stiles='<th>αα&nbsp;&#8645;</th>
		<th>Σχ.Μονάδα&nbsp;&#8645;</th>
		<th>Αρ.Πρωτ.&nbsp;&#8645;</th>
		<th>Είδος&nbsp;&#8645;</th>
		
		<th title="αριθμός εκδρομής αυτού του είδους για το τρέχον σχ. έτος">αα είδους&nbsp;&#8645;</th>
		<th>Κατάσταση&nbsp;&#8645;</th>
		<th>Παρατηρήσεις&nbsp;&#8645;</th>
		<th>Ημερομηνία Υποβολής ή Αποθήκευσης&nbsp;&#8645;</th>
		';
		
		
echo '
Υποβολές Εκδρομών:<br>
<table id="ekdromesTable" class="table table-hover table-bordered" cellspacing="0" width="100%">
		<thead style="background: Silver;">
		<tr>'.$stiles.'</tr>
		</thead>
		<tbody>';
	for ($i=1; $i<=$amount; $i++) {
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if ($row['kodikos_sxoleiou']=='9999999') $onomasia= 'Προσωπικό ΔΔΕ - Δοκιμαστικό Σχολείο';
		else $onomasia= $row['onomasia'];
		
		if ($row['status']=='ΥΠΟΒΛΗΘΗΚΕ') $displaystatus= 'ΥΠΟΒΛΗΘΗΚΕ ΑΠ(ΔΔΕ):'.$row['ar_prot'];
		else $displaystatus=$row['status'];
		
		if (mb_strlen($row['eidos_ekdromis'])>32) $truncatedstr_eidos= mb_substr($row['eidos_ekdromis'],0,28) .'...';
		else $truncatedstr_eidos= $row['eidos_ekdromis'];
		
		//<td>{$row['titlos']}</td>
		echo "<tr> 
			<td>$i</td>
			<td> 
			<form action=mainindex.php method=post> <input type=hidden name=setschool value='{$row['kodikos_sxoleiou']}'>
			<button type=submit title='Προβολή εκδρομών από αυτό το σχολείο' style='background:none;  margin:0; padding:0;' >$onomasia</button>
			 </form>
			</td>
			<td>{$row['ar_prot_sxoleiou']}</td>
			<td><span title='{$row['eidos_ekdromis']}'>".$truncatedstr_eidos."</span></td>
			
			<td>{$row['a_arithmos']}</td>
			<td><small>$displaystatus</small></td> 
			<td><small>{$row['paratiriseis']}</small></td>
			<td>{$row['submit_datetime']}</td>
			";

		echo '</tr>';
	}//end of aitiseis iteration

	$stiles= str_replace('&nbsp;&#8645;','',$stiles);
echo '</tbody>
		<tfoot style="background: Silver;">
		<tr>'.$stiles.'</tr>
	  </tfoot>		
		</table>';
	
}

function deleteekdromi()
{
	require_once('db.php');

	$selected_sx_etos= $_SESSION['ekdromes_currentYear'];
	
	$pinakas_ekdromes= "ekdromes_ait$selected_sx_etos";
	$kodikos_sxoleiou= mysqli_real_escape_string($mySqlConnection,$_SESSION['kodikos_sxoleiou']); //$currentuser, $_SESSION['currentuser']
	$idaitisis= mysqli_real_escape_string($mySqlConnection,$_POST['idaitisis']);
	
	try {
		$result = mysqli_query($mySqlConnection, "SELECT ar_prot,status FROM	$pinakas_ekdromes WHERE kodikos_sxoleiou='$kodikos_sxoleiou' AND idaitisi='$idaitisis'");
		if (mysqli_errno($mySqlConnection)) {echo 'Σφάλμα βάσης δεδομένων:<br>'.mysqli_error($mySqlConnection).'<br>';return false;}
		else $amount = mysqli_num_rows($result);
	}
	catch (mysqli_sql_exception $e) {
		echo '<p>Σφάλμα ΒΔ:'.$e->getMessage() .'</p>';
		return false;
	}	
	if ($amount!=1) {
		 echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Σφάλμα. Η εγγραφή δε βρέθηκε!</strong></div>';return false;
	}
	else $row = mysqli_fetch_array($result,MYSQLI_ASSOC );

	if (($row['ar_prot']!='' && $row['ar_prot']!='0') || $row['status']!='ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ'){
		 echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Η εκδρομή έχει υποβληθεί στη ΔΔΕ. Δε γίνεται να διαγραφεί.</strong></div>';return false;
	}
	
	$sql= "DELETE FROM $pinakas_ekdromes WHERE idaitisi= '$idaitisis' AND kodikos_sxoleiou='$kodikos_sxoleiou' AND (ar_prot=NULL OR ar_prot='' OR ar_prot=0) AND status='ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ'";
	$error=false;
	try {
		if (mysqli_query($mySqlConnection,$sql)===TRUE) {}
		else $error=true;
	}
	catch (mysqli_sql_exception $e) {
		echo '<p>Σφάλμα ΒΔ:'.$e->getMessage() .'</p>';
		$error=true;
	}

	if (!$error)
	{
		//remove any files if they exist:
		$ds = DIRECTORY_SEPARATOR;  
		$storeFolder = 'arxeia'.$ds. $_SESSION['ekdromes_currentYear'] .$ds. $_SESSION['kodikos_sxoleiou'];
		$filelist= array();
		GetFileList($idaitisis, $filelist, false);
		foreach ($filelist as $file) unlink($storeFolder.$ds.$file);
		
		echo '<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Έγινε Διαγραφή</strong>
			</div>';
	}
}

function edit_ekdromi()
{
	require_once('db.php');
	
	if (!isset($_POST['idaitisis'])) return false;
	$idaitisi= mysqli_real_escape_string($mySqlConnection,$_POST['idaitisis']);
	$kodikos_sxoleiou= $_SESSION['kodikos_sxoleiou'];
	$selected_sx_etos= $_SESSION['ekdromes_currentYear'];
	$pinakas_ekdromes= "ekdromes_ait$selected_sx_etos";
	
	$amount=0;
	//mysqli_report(MYSQLI_REPORT_ERROR);//not strict or it will kill everything on error
	try {
		$result = mysqli_query($mySqlConnection, "SELECT * FROM	$pinakas_ekdromes WHERE kodikos_sxoleiou='$kodikos_sxoleiou' AND idaitisi='$idaitisi'");
		if (mysqli_errno($mySqlConnection)) {echo 'Σφάλμα βάσης δεδομένων:<br>'.mysqli_error($mySqlConnection).'<br>';return false;}
		else $amount = mysqli_num_rows($result);
	}
	catch (mysqli_sql_exception $e) {
		echo '<p>Σφάλμα ΒΔ:'.$e->getMessage() .'</p>';
		return false;
	}	
	if ($amount==0) {
		 echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Η εγγραφή δε βρέθηκε!</strong></div>';return false;}
	if ($amount>1) {
			echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Σφάλμα! Πολλαπλές εγγραφές!<br></strong></div>'; return false;}

	$row = mysqli_fetch_array($result,MYSQLI_ASSOC );
	
	display_ekdromi($row);
	return true;
}

function new_ekdromi()
{
	echo '<p style=text-align:center><u><b>Νέα εκδρομή</b></u></p>';
	if (!isset($_POST['step']) || $_POST['step']=='0')
		echo '	<p>Επιλέξτε για προσθήκη νέας εκδρομής:</p>
				<form method=post>
				<input type=hidden name=action value=new_ekdromi>
				<p>&nbsp;&nbsp;<button type=submit class="btn btn-success" name=step value="start">Α. Εκκίνηση οδηγού βήμα-βήμα για επιλογή του τύπου εκδρομής</button></p>
				<br>
				<p>&nbsp;&nbsp;<button type=submit class="btn btn-success" name=step value="listall">Β. Γνωρίζω ήδη τον τύπο της εκδρομής που θα προστεθεί, επιλογή απευθείας από λίστα</button></p>
				</form>';
	else
	{
		switch ($_POST['step'])
		{
			case 'listall':
			echo '<table style="width:100%;border:none;"><tr><td>Διαλέξτε το είδος της νέας εκδρομής:</td>
			<td style="text-align:right"><form method=post><input type=hidden name=action value=new_ekdromi>
			<button type=submit class="btn btn-success" name=step value="start"><span class="glyphicon glyphicon-question-sign"></span> Χρειάζομαι καθοδήγηση</button></form>
			</td></tr></table><br>';
			
			$ary_ekdromes=array();
			populate_ekdromes($ary_ekdromes);
			
			echo '<form method=post>
				<input type=hidden name=action value=new_ekdromi>';
			echo '<style>table.simpletable tbody tr td{padding:10px;}</style><table border=1 class=simpletable><tr><th>αα</th><th>Τίτλος</th><th>Είδη σχ. μονάδων</th><th>Νομοθεσία</th><th>Αρχεία Οδηγιών/ Νομοθεσίας</th></tr>';
			$i=1;
			foreach ($ary_ekdromes as $titlosekdr=>$data) //'extratitlos',"nomothesia", "nomoi/...", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ ΕΠΑΣ ΕΕΕΕΚ")
			{	//echo "<tr><td style='padding:5px;'>
				//<div class='form-check'>
				//<input class='form-check-input' type='radio' id='$titlos' name='step' value='$titlos'>
				//<label class='form-check-label' for='$titlos'>&nbsp;$titlos {$data[0]}</label>
				//</div></td>";
				echo "<tr><td>$i</td><td style='padding:5px;'>
				<button type=submit value='$titlosekdr' name='step'>$titlosekdr {$data[0]}</button>
				</td>";
				echo "<td style='padding:0.2em;'>{$data[3]}</td><td style='padding:5px;'> {$data[1]}</td>";
				//folder contents:
				echo '<td>';
				$scandir= scandir($data[2]);
				if ($scandir!== false){
					$files_dirs = array_diff($scandir, array('.', '..'));
					foreach ($files_dirs as $filename)
						if (is_file($data[2].$filename))//ignore dirs
						{
							//if (strpos($filename, '.pdf') !== false || strpos($filename, '.html') !== false) continue;//skip html
							if (mb_substr($filename,-4,4)!='.pdf' && mb_substr($filename,-4,4)!='.doc' &&mb_substr($filename,-5,5)!='.docx' ) continue;//allow only pdf and doc
							echo "<a href='{$data[2]}$filename' target='_blank' style='color:#000000;'>$filename <span class='glyphicon glyphicon-download-alt' style='color:#0000C8;'></span></a><br>";
						}
				}
				else echo 'Δ/Υ';
				echo '</td>';//<a href='{$data[2]}' class='glyphicon glyphicon-download-alt' target='_blank'></a>
				
				echo '</tr>';
				$i++;
			}	
			echo '</table></form>';

			echo '<br><form method=post style="text-align:right"><input type=hidden name=action value=new_ekdromi>
			<button type=submit class="btn btn-success" name=step value="start"><span class="glyphicon glyphicon-question-sign"></span> Χρειάζομαι καθοδήγηση</button>
			</form> <br>';

			//echo'<p><center><button type=submit class="btn btn-success">Επόμενο <span class="glyphicon glyphicon-menu-right"></span></button></center></p></form>';
			
			break;
			case 'start':
				DispProgress(1);
				echo '<p>Απαντήστε σε μερικές απλές ερωτήσεις για να εντοπιστεί το κατάλληλο είδος εκδρομής με βάση τη νομοθεσία:</p>';
				Ask('Η εκδρομή γίνεται στα πλαίσια Ευρωπαικών ή Διεθνών δράσεων; ή Διεθνών Προγραμμάτων; (συμπερ. των Erasmus)', '0',
				'Όχι','>ΥΠΟΛΟΙΠΕΣ', 
				'Ναι, έχει σχέση με άλλο κράτος ή διεθνή οργανισμό','>ΕΔ_ERASM' );
			break;
			
			case '>ΕΔ_ERASM':
				DispProgress(5);
				Ask('Η εκδρομή γίνεται στα πλαίσια προγράμματος Erasmus;', 'start',
				'Όχι','>ΕΔ', 
				'Ναι, είναι εκδρομή προγράμματος Erasmus','>ERASMUS' );
				
			break;
			case '>ERASMUS':
				DispProgress(50);
				Ask('Θα μετακινηθούν μόνο εκπαιδευτικοί ή εκπαιδευτικοί μαζί με μαθητές/τριες;', '>ΕΔ_ERASM',
				'Μόνο εκπαιδευτικοί (ERASMUS KA1)','>ERASMUS>ΜΟΝΟΕΚΠ',
				'Εκπαιδευτικοί και μαθητές/τριες (ERASMUS KA2)','>ERASMUS>ΕΚΠΜΑΘ' );
			break;
			
			case '>ERASMUS>ΜΟΝΟΕΚΠ':
				DispProgress(90);
				echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
				Με βάση τις προηγούμενες απαντήσεις, καταχωρήστε νέα εκδρομή:<br> <br>
				<button type=submit class='btn btn-primary' value='Μετακίνηση εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1' name='step'>Μετακίνηση εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ1</button></form>";

				echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
				<p><button type=submit name=step value='>ERASMUS' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
			break;
			case '>ERASMUS>ΕΚΠΜΑΘ':
				DispProgress(90);
				echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
				Με βάση τις προηγούμενες απαντήσεις, καταχωρήστε νέα εκδρομή:<br> <br>
				<button type=submit class='btn btn-primary' value='Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2' name='step'>Μετακίνηση μαθητών-τριών και εκπαιδευτικών με πρόγραμμα ERASMUS+ΚΑ2</button></form>";

				echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
				<p><button type=submit name=step value='>ERASMUS' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
			break;				
			
			case '>ΕΔ':
				DispProgress(10);
				//echo 'Ευρωπαικές δρασεις';
				Ask('Η εκδρομή αφορά βράβευση με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας;', '>ΕΔ_ERASM',
				'Ναι, βράβευση με ταξίδι μετά από διαγωνισμό','>ΕΔ>ΒΡΑΒΕΥΣΗ',
				'Όχι','>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ' );
			break;
			case '>ΕΔ>ΒΡΑΒΕΥΣΗ':
				DispProgress(70);
				echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
				Με βάση τις προηγούμενες απαντήσεις, καταχωρήστε νέα εκδρομή:<br> <br>
				<button type=submit class='btn btn-primary' value='Βράβευσης με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας' name='step'>Βράβευσης με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας</button></form>";

				echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
				<p><button type=submit name=step value='>ΕΔ' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
			
			break;
			case '>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ':
				DispProgress(20);
				Ask('Η εκδρομή αφορά αδελφοποίηση σχολείων;', '>ΕΔ',
				'Ναι, αφορά σύναψη αδελφοποίησης','>ΕΔ>ΒΡΑΒΕΥΣΗ>ΑΔΕΛ',
				'Όχι','>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ' );
			break;
			case '>ΕΔ>ΒΡΑΒΕΥΣΗ>ΑΔΕΛ':
				DispProgress(80);
				echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
				Με βάση τις προηγούμενες απαντήσεις, καταχωρήστε νέα εκδρομή:<br> <br>
				<button type=submit class='btn btn-primary' value='Αδελφοποιήσεων' name='step'>Αδελφοποιήσεων</button></form>";

				echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
				<p><button type=submit name=step value='>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
			break;
			case '>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ':
				DispProgress(30);
				Ask('Η εκδρομή αφορά εκπ/κό πρόγραμμα της Γενικής Γραμματείας Θρησκευμάτων;', '>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ',
				'Ναι, γίνεται στα πλαίσια προγράμματος της Γενικής Γραμματείας Θρησκευμάτων','>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ>ΘΡΗΣΚ',
				'Όχι','>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ>ΟΧΙΘΡΗΣΚ' );
			break;
			case '>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ>ΘΡΗΣΚ':
				DispProgress(80);
				echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
				Με βάση τις προηγούμενες απαντήσεις, καταχωρήστε νέα εκδρομή:<br> <br>
				<button type=submit class='btn btn-primary' value='Εκπαιδευτικών προγραμμάτων της Γενικής Γραμματείας Θρησκευμάτων' name='step'>Εκπαιδευτικών προγραμμάτων της Γενικής Γραμματείας Θρησκευμάτων</button></form>";

				echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
				<p><button type=submit name=step value='>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
			break;
			
			case '>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ>ΟΧΙΘΡΗΣΚ':
				DispProgress(70);
				echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
					Με βάση τις προηγούμενες απαντήσεις, επιλέξτε το είδος της νέας εκδρομής για καταχώρηση από τις παρακάτω επιλογές:<br> <br>
					<div style='text-align:left;display: inline-block;'>
					<button type=submit class='btn btn-primary' value='Εκπαιδευτικών ανταλλαγών σε συνέχεια διακρατικών συμφωνιών/μνημονίων συνεργασίας/εκτελεστικών προγραμμάτων' name='step'>Εκπαιδευτικών ανταλλαγών σε συνέχεια διακρατικών συμφωνιών/μνημονίων συνεργασίας/εκτελεστικών προγραμμάτων</button><br> <br>
					<button type=submit class='btn btn-primary' value='Ευρωπαϊκών προγραμμάτων δραστηριοτήτων/προγραμμάτων που δε γίνονται στο πλαίσιο του ευρωπαϊκού προγράμματος Erasmus' name='step'>Ευρωπαϊκών προγραμμάτων δραστηριοτήτων/προγραμμάτων που δε γίνονται στο πλαίσιο του ευρωπαϊκού προγράμματος Erasmus</button><br> <br>
					<button type=submit class='btn btn-primary' value='Προγραμμάτων διεθνών οργανισμών' name='step'>Προγραμμάτων διεθνών οργανισμών</button><br> <br>
					<button type=submit class='btn btn-primary' value='Συμμετοχών σε διεθνείς συναντήσεις, συνέδρια, ημερίδες, διαγωνισμούς, μαθητικές επιστημονικές ολυμπιάδες και άλλες διεθνής εκδηλώσεις' name='step'>Συμμετοχών σε διεθνείς συναντήσεις, συνέδρια, ημερίδες, διαγωνισμούς, μαθητικές επιστημονικές ολυμπιάδες και άλλες διεθνής εκδηλώσεις</button><br> <br>
					<button type=submit class='btn btn-primary' value='Προσκλήσεις σχολείων της περ.α του άρθρου 3 του ν. 4415/2016 (Α΄ 159)' name='step'>Προσκλήσεις σχολείων της περ.α του άρθρου 3 του ν. 4415/2016 (Α΄ 159)</button><br> <br>
					<button type=submit class='btn btn-primary' value='Πιλοτικών προγραμμάτων διεθνών σχολικών δικτύων που εγκρίνονται ή συντονίζονται από το Υπουργείο Παιδείας' name='step'>Πιλοτικών προγραμμάτων διεθνών σχολικών δικτύων που εγκρίνονται ή συντονίζονται από το Υπουργείο Παιδείας</button><br> <br>
					<button type=submit class='btn btn-primary' value='Επισκέψεων σε ερευνητικά κέντρα, εκπαιδευτικά ιδρύματα, πανεπιστήμια, κέντρα πολιτισμού και/ή αθλητισμού' name='step'>Επισκέψεων σε ερευνητικά κέντρα, εκπαιδευτικά ιδρύματα, πανεπιστήμια, κέντρα πολιτισμού και/ή αθλητισμού</button><br> <br>
					<button type=submit class='btn btn-primary' value='Επισκέψεων σε ευρωπαϊκούς θεσμούς/διεθνείς οργανώσεις κατόπιν σχετικής πρόσκλησης και αποδοχής τυχόν αιτήματος από το διεθνή οργανισμό' name='step'>Επισκέψεων σε ευρωπαϊκούς θεσμούς/διεθνείς οργανώσεις κατόπιν σχετικής πρόσκλησης και αποδοχής τυχόν αιτήματος από το διεθνή οργανισμό</button>
					</div></form>";
				
					echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
					<p><button type=submit name=step value='>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
				
			break;
			case '>ΥΠΟΛΟΙΠΕΣ':
				DispProgress(20);
				Ask('Θα συμμετέχει στην εκδρομή όλο το σχολείο;', 'start',
				'Όχι, μόνο κάποια τμήματα ή μερικοί μαθητές','>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ', 
				'Ναι, θα πάει εκδρομή όλο το σχολείο','>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ' );
				
			break;
			case '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ':
				DispProgress(50);
				Ask('Η εκδρομή αφορά 1 ημέρα; ή πολλές;', '>ΥΠΟΛΟΙΠΕΣ',
				'1 ημέρα','>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ', 
				'Πολλές ημέρες','>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>ΠΟΛΛΕΣΗΜ' );
				

			break;
				case '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ':
				DispProgress(70);
				Ask('Η εκδρομή θα έχει διάρκεια εντός ωραρίου του σχολείου;', '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ',
				'Ναι, εντός ωραρίου','>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ>ΕΝΤΟΣ_Ω', 
				'Οχι, πλέον ωραρίου (ημερήσια εκδρομή)','>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ>ΠΛΕΟΝ_Ω' );
			
				break;
					case '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ>ΕΝΤΟΣ_Ω':
					
						DispProgress(80);
						echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
						Με βάση τις προηγούμενες απαντήσεις, έχετε δύο (2) επιλογές για καταχώρηση νέας εκδρομής:<br> <br>
						
						<div style='text-align:left;display: inline-block;'>
						<button type=submit class='btn btn-primary' value='Σχολικός Περίπατος' name='step'>Απλός Σχολικός Περίπατος</button><br> <br>
						<button type=submit class='btn btn-primary' value='Διδακτική επίσκεψη' name='step'>Διδακτική επίσκεψη</button>
						</div>
						</form>";

						echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
						<p><button type=submit name=step value='>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
						
					break;
					case '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ>ΠΛΕΟΝ_Ω':
						DispProgress(80);
						echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
						Με βάση τις προηγούμενες απαντήσεις, καταχωρήστε νέα εκδρομή:<br> <br>
						<button type=submit class='btn btn-primary' value='Ημερήσια δίχως διανυκτέρευση' name='step'>Ημερήσια δίχως διανυκτέρευση</button></form>";
						
						echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
						<p><button type=submit name=step value='>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
						
					break;
				case '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>ΠΟΛΛΕΣΗΜ':
					DispProgress(80);
					echo '<p style="text-align:center">Με βάση τις προηγούμενες απαντήσεις <b>δε βρέθηκαν</b> συμβατά είδη εκδρομών.<br>
					Παρακαλούμε επικοινωνήστε με το τμήμα εκδρομών της ΔΔΕ για οδηγίες.';
					echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
					<p><button type=submit name=step value='>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
					
				break;
			
			
			case '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ':
				DispProgress(30);
				Ask('O προορισμός της εκδρομής είναι εντός της χώρας ή στο εξωτερικό;', '>ΥΠΟΛΟΙΠΕΣ',
				'Εσωτερικό','>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ', 
				'Εξωτερικό','>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΞΩΤ' );

			break;
				case '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ':
					DispProgress(60);

				Ask('Η εκδρομή θα αφορά μία ημέρα ή πολλές;', '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ',
				'Μία ημέρα','>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>1ΗΜ', 
				'Πολλές ημέρες','>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ' );
				
				break;
					case '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>1ΗΜ':
						DispProgress(80);
					//echo 'βουλή, 9 και 11<br> ';
						echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
						Με βάση τις προηγούμενες απαντήσεις, επιλέξτε το είδος της νέας εκδρομής για καταχώρηση από τις παρακάτω επιλογές:<br> <br>
						<div style='text-align:left;display: inline-block;'>
						<button type=submit class='btn btn-primary' value='Διδακτική επίσκεψη' name='step'>Διδακτική επίσκεψη</button><br> <br>
						<button type=submit class='btn btn-primary' value='Επίσκεψη στη Βουλή των Ελλήνων' name='step'>Επίσκεψη στη Βουλή των Ελλήνων</button><br> <br>
						<button type=submit class='btn btn-primary' value='Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού' name='step'>Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού</button>
						</div></form>";
					
					echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
					<p><button type=submit name=step value='>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";

					break;
					case '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ':
					DispProgress(70);
					
					Ask('Πρόκειται για την ετήσια πολυήμερη εκδρομή της τελευταίας τάξης του Λυκείου;', '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ',
					'Ναι',  '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ>ΤΕΛΤΑΞΗ',
					'Όχι',  '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ>ΟΧΙΤΕΛΤΑΞΗ'); 
					break;
					
					case '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ>ΤΕΛΤΑΞΗ':
						DispProgress(80);
						echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
						Με βάση τις προηγούμενες απαντήσεις, καταχωρήστε νέα εκδρομή:<br> <br>
						<button type=submit class='btn btn-primary' value='Πολυήμερη τελευταίας τάξης στο εσωτερικό' name='step'>Πολυήμερη τελευταίας τάξης στο εσωτερικό</button></form>";

						echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
						<p><button type=submit name=step value='>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
					
					break;
					case '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ>ΟΧΙΤΕΛΤΑΞΗ':
						DispProgress(80);
						//echo '5,7,10,11';
						echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
						Με βάση τις προηγούμενες απαντήσεις, επιλέξτε το είδος της νέας εκδρομής για καταχώρηση από τις παρακάτω επιλογές:<br> <br>
						<div style='text-align:left;display: inline-block;'>
						<button type=submit class='btn btn-primary' value='Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό) στο εσωτερικό' name='step'>Εκπαιδευτική επίσκεψη μέσω προγράμματος(περιβαλλοντικό/πολιτισμικό κτλ) στο εσωτερικό</button><br> <br>
						<button type=submit class='btn btn-primary' value='Εκπαιδευτική εκδρομή στο εσωτερικό' name='step'>Εκπαιδευτική εκδρομή στο εσωτερικό(στο πλαίσιο του αναλυτικού προγράμματος)</button><br> <br>
						<button type=submit class='btn btn-primary' value='Επίσκεψη στη Βουλή των Ελλήνων' name='step'>Επίσκεψη στη Βουλή των Ελλήνων</button><br> <br>
						<button type=submit class='btn btn-primary' value='Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού' name='step'>Συμμετοχή μαθητών/τριών σε διαγωνισμούς/εκδηλώσεις εσωτερικού</button>
						</div></form>";
					
					echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
					<p><button type=submit name=step value='>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
					
					break;
				case '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΞΩΤ':
				DispProgress(70);
				//echo '4,6,8';
					echo "<form method=post style='text-align:center'><input type=hidden name=action value=new_ekdromi>
					Με βάση τις προηγούμενες απαντήσεις, επιλέξτε το είδος της νέας εκδρομής για καταχώρηση από τις παρακάτω επιλογές:<br> <br>
					<div style='text-align:left;display: inline-block;'>
					<button type=submit class='btn btn-primary' value='Πολυήμερη τελευταίας τάξης στο εξωτερικό' name='step'>Πολυήμερη τελευταίας τάξης στο εξωτερικό</button><br> <br>
					<button type=submit class='btn btn-primary' value='Εκπαιδευτικές επισκέψεις στο ΕΞΩΤΕΡΙΚΟ στο πλαίσιο εγκεκριμένων εκπαιδευτικών προγραμμάτων σχολικών δραστηριοτήτων' name='step'>Εκπαιδευτική εκδρομή στο εξωτερικό(στο πλαίσιο εκπ/κού προγράμματος σχολικών δραστηριοτήτων)</button><br> <br>
					<button type=submit class='btn btn-primary' value='Εκπαιδευτική εκδρομή στο εξωτερικό' name='step'>Εκπαιδευτική εκδρομή στο εξωτερικό(στο πλαίσιο του αναλυτικού προγράμματος)</button>
					</div></form>";
				
					echo "<br><form method=post><input type=hidden name=action value=new_ekdromi>
					<p><button type=submit name=step value='>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
				
				break;
			
			default:
			$ary_ekdromes=array();
			populate_ekdromes($ary_ekdromes);
			if (array_key_exists($_POST['step'], $ary_ekdromes))
			{
				$ary_assoc= array();
				$ary_assoc['eidos_ekdromis']= $_POST['step'];
				display_ekdromi($ary_assoc);
			}

			break;
		} //end of switch
	}
	
}

function DispProgress($percent)
{
	$imageplacement= $percent;
	if ($imageplacement>80) $imageplacement=80;//force max limit
	
	echo "<p>
	<img src='bus-big-compressed.gif' height='89' width='216' style='position:relative;left:$imageplacement%;'><br>
	
	<div class='progress'>
	<div class='progress-bar progress-bar-info' role='progressbar' aria-valuemin='0' aria-valuemax='100' aria-valuenow='$percent' style='width:$percent%'>
	$percent%
	</div>
	</div>
	";
}

function Ask($question,$prevstep, $replyA,$stepA, $replyB,$stepB)
{
	echo "<div style='margin-left:auto;margin-right:auto;width: 90%;'>
			<div class='panel panel-default' style='background-color: transparent; border: 2px solid black;border-radius: 4px;'>
			<div class='panel-heading'>$question</div>
			<div class='panel-body'>
		
	<form method=post>
		<input type=hidden name=action value=new_ekdromi>
		<p><button type=submit class='btn btn-info' name=step value='$stepA'>$replyA <span class='glyphicon glyphicon-menu-right'></span></button></p>
		<p><button type=submit class='btn btn-info' name=step value='$stepB'>$replyB <span class='glyphicon glyphicon-menu-right'></span></button></p>
	</form>
			</div>
			</div>
	</div>
	<br>
	<form method=post><input type=hidden name=action value=new_ekdromi>
	<p><button type=submit name=step value='$prevstep' class='btn btn-warning'> <span class='glyphicon glyphicon-menu-left'></span> Προηγούμενο βήμα</button></p></form>";
}

function ForceDisplayOdhgies($eidos)
{
	//before adding new ekdromi

	$ary_ekdromes= array();
	populate_ekdromes($ary_ekdromes);//'extratitlos',"nomothesia", "nomoi/...", "ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ")

	if (!isset($ary_ekdromes[$eidos])) {echo "Σφάλμα! Δε βρέθηκε το είδος εκδρομής ($eidos)<br>";return;}

	echo "<p>$eidos</p>";
	echo '<p>Κατεβάστε τις οδηγίες και τη νομοθεσία:</p>';
	
		//folder contents:
		$files_dirs = array_diff(scandir($ary_ekdromes[$eidos][2]), array('.', '..'));
		foreach ($files_dirs as $filename)
			if (is_file($ary_ekdromes[$eidos][2].$filename))//ignore dirs
			{
				if (mb_substr($filename,-4,4)!='.pdf' && mb_substr($filename,-4,4)!='.doc' &&mb_substr($filename,-5,5)!='.docx' ) continue;//allow only pdf and doc
				echo "<p><a href='{$ary_ekdromes[$eidos][2]}$filename' target='_blank'>$filename <span class='glyphicon glyphicon-download-alt'></span></a></p>";
			}
	echo "<p></p>";
	
	switch ($eidos)
	{
		case 'Πολυήμερη τελευταίας τάξης στο εσωτερικό':
		echo "
Επιλογή Μεταφορικού μέσου: <br>
Ο Δ/ντής του σχολείου προκηρύσσει στην ιστοσελίδα της Δ.Δ.Ε. εκδήλωση  ενδιαφέροντος (αποστολή e-mail στη διεύθυνση: mail@dide-v.thess.sch.gr), με καταληκτική ημερομηνία κατάθεσης των προσφορών τουλάχιστον πέντε (5) ημέρες μετά την ανάρτηση (βλ. άρθρο 14)
<br> <br>
Στη περίπτωση που ο διαγωνισμός κηρυχθεί άγονος, το σχολείο απευθύνεται  σε συγκεκριμένο τουριστικό γραφείο, αφού ενημερωθεί η ΔΔΕ με σχετικό πρακτικό, το οποίο αποστέλλεται με το αντίστοιχο διαβιβαστικό. 
<br> <br>                 
Ανάρτηση στην ιστοσελίδα του σχολείου:<br>
Προς αποφυγή δυσάρεστων καταστάσεων  (πχ. καταγγελιών από πρακτορεία), ιδιαίτερη προσοχή θα πρέπει να δίδεται στις παρακάτω υποχρεώσεις:<br>
α/ Το πρακτικό του διευθυντή με την αιτιολόγηση επιλογής του πρακτορείου αναρτάται στην ιστοσελίδα του σχολείου. Ενστάσεις μπορούν να υποβληθούν μέσα σε τρεις (3) μέρες από την ανάρτησή του. 
<br>
β/ Μετά την εξέταση των πιθανών ενστάσεων γίνεται η τελική επιλογή με πρακτικό του διευθυντή. 
<br>
γ/Στη συνέχεια, υπογράφεται η σύμβαση και το σχολείο υποχρεούται να αναρτά στον πίνακα ανακοινώσεων και στην ιστοσελίδα του τις προσφορές των τουριστικών γραφείων, τη σύμβαση οργανωμένου ταξιδιού που υπογράφτηκε, καθώς και τον αριθμό του ασφαλιστηρίου συμβολαίου επαγγελματικής ευθύνης.
<br> <br>
ΣΗΜΕΙΩΣΗ: Σε περίπτωση μετακίνησης με τουριστικά λεωφορεία, ο/η Διευθυντής/ντρια του σχολείου απευθύνεται εγγράφως στη Διεύθυνση τροχαίας της Ελληνικής Αστυνομίας ώστε να διενεργηθεί ο έλεγχος των οχημάτων (έγγραφα καταλληλότητας οχήματος, επαγγελματική άδεια οδήγησης, έγγραφα οδηγού κ.λ.π), λίγο πριν την αναχώρηση των εκδρομέων.
<br> <br>
		";
		break;
		case 'Πολυήμερη τελευταίας τάξης στο εξωτερικό':
		echo "
Μειοδοτικοί διαγωνισμοί: <br>
Ο Δ/ντής του σχολείου προκηρύσσει στην ιστοσελίδα της Δ.Δ.Ε. εκδήλωση ενδιαφέροντος (αποστολή e-mail στη διεύθυνση: mail@dide-v.thess.sch.gr), με καταληκτική ημερομηνία κατάθεσης των προσφορών τουλάχιστον πέντε (5) ημέρες μετά την ανάρτηση  (βλ. άρθρο 14) 
<br> <br>
Στη περίπτωση που ο διαγωνισμός κηρυχθεί άγονος, το σχολείο απευθύνεται σε συγκεκριμένο τουριστικό γραφείο, αφού ενημερωθεί η ΔΔΕ με σχετικό πρακτικό, το οποίο αποστέλλεται με το αντίστοιχο διαβιβαστικό.
<br> <br>
Ανάρτηση στην ιστοσελίδα του σχολείου:<br>
Προς αποφυγή καταγγελιών από πρακτορεία, ιδιαίτερη προσοχή θα πρέπει να δίδεται στις παρακάτω υποχρεώσεις:
<br>
α/ Το πρακτικό του διευθυντή με την αιτιολόγηση επιλογής του πρακτορείου αναρτάται στην ιστοσελίδα του σχολείου. Ενστάσεις μπορούν να υποβληθούν μέσα σε τρεις (3) μέρες από την ανάρτησή του. 
<br>
β/ Μετά την εξέταση των πιθανών ενστάσεων γίνεται η τελική επιλογή με πρακτικό του διευθυντή. 
<br>
γ/Στη συνέχεια, υπογράφεται η σύμβαση και το σχολείο υποχρεούται να αναρτά στον πίνακα ανακοινώσεων και στην ιστοσελίδα του τις προσφορές των τουριστικών γραφείων, τη σύμβαση οργανωμένου ταξιδιού που υπογράφτηκε, καθώς και τον αριθμό του ασφαλιστηρίου συμβολαίου επαγγελματικής ευθύνης.
<br> <br>";
		break;
		case 'Εκπαιδευτικών ανταλλαγών σε συνέχεια διακρατικών συμφωνιών/μνημονίων συνεργασίας/εκτελεστικών προγραμμάτων':
		case 'Εκπαιδευτικών προγραμμάτων της Γενικής Γραμματείας Θρησκευμάτων':	
		case 'Ευρωπαϊκών προγραμμάτων δραστηριοτήτων/προγραμμάτων που δε γίνονται στο πλαίσιο του ευρωπαϊκού προγράμματος Erasmus':
		case 'Προγραμμάτων διεθνών οργανισμών':
		case 'Συμμετοχών σε διεθνείς συναντήσεις, συνέδρια, ημερίδες, διαγωνισμούς, μαθητικές επιστημονικές ολυμπιάδες και άλλες διεθνής εκδηλώσεις':
		case 'Βράβευσης με ταξίδι στο εξωτερικό κατόπιν συμμετοχής σε διαγωνιστική διαδικασία εγκεκριμένη από το Υπουργείο Παιδείας':
		case 'Πιλοτικών προγραμμάτων διεθνών σχολικών δικτύων που εγκρίνονται ή συντονίζονται από το Υπουργείο Παιδείας':
		{
			echo "<p><b>Υπάρχει δυνατότητα δημιουργίας <u>διασχολικής ομάδας</u> για κοινή συμμετοχή στην εκδρομή.</b><br>
			Σε αυτή την περίπτωση πρέπει να έχει προηγηθεί έγκριση (διαδικασία που κάνει το σχολείο με τους περισσότερους μαθητές). Δείτε τις οδηγίες:<ul>";
			//folder contents:
			$files_dirs = array_diff(scandir($ary_ekdromes[$eidos][2].'eidika/'), array('.', '..'));
			foreach ($files_dirs as $filename)
				if (is_file($ary_ekdromes[$eidos][2].'eidika/'.$filename))//ignore dirs
				{
					if (mb_substr($filename,-4,4)!='.pdf' && mb_substr($filename,-4,4)!='.doc' &&mb_substr($filename,-5,5)!='.docx' ) continue;//allow only pdf and doc
					echo "<p><a href='{$ary_ekdromes[$eidos][2]}eidika/$filename' target='_blank'>$filename <span class='glyphicon glyphicon-download-alt'></span></a></p>";
				}
			echo '</ul></p>';
		}
		break;
		case 'Αδελφοποιήσεων':
		{
			echo '<ul><p><b>Θα πρέπει να εγκριθεί η αδελφοποίηση μεταξύ των σχολείων από την Αιρετή Περιφέρεια με αίτημα προς αυτήν. Το αίτημα διαβιβάζεται μέσω της ΔΔΕ.</b><br>
			Δείτε πρώτα τη διαδικασία που περιγράφεται στο/στα σχετικά αρχεία:<br> ';
				//folder contents:
				$files_dirs = array_diff(scandir($ary_ekdromes[$eidos][2].'eidika/'), array('.', '..'));
				foreach ($files_dirs as $filename)
					if (is_file($ary_ekdromes[$eidos][2].'eidika/'.$filename))//ignore dirs
					{
						if (mb_substr($filename,-4,4)!='.pdf' && mb_substr($filename,-4,4)!='.doc' &&mb_substr($filename,-5,5)!='.docx' ) continue;//allow only pdf and doc
						echo "<p><a href='{$ary_ekdromes[$eidos][2]}eidika/$filename' target='_blank'>$filename <span class='glyphicon glyphicon-download-alt'></span></a></p>";
					}
			echo '</ul></p>';
		}
		break;
	}//endof switch
	
	echo "<center><form method=post>
		<input type=hidden name=action value=new_ekdromi>
		<input type=hidden name=step value='$eidos'>
		<input type=hidden name=odhgiesok value=ok>
		";
	echo '<button class="btn btn-success" type=submit>Έχω ενημερωθεί, συνέχεια <span class="glyphicon glyphicon-menu-right"></span> </button></form></center>';
	echo "<a href='mainindex.php'> <button type='button' class='btn btn-warning' title='Ακύρωση'><span class='glyphicon glyphicon-menu-left'></span>Ακύρωση</button></a>";
}

function prepare_display_files()
{
	require_once('db.php');
	$kodikos_sxoleiou= $_SESSION['kodikos_sxoleiou'];
	$selected_sx_etos= $_SESSION['ekdromes_currentYear'];
	$pinakas_ekdromes= "ekdromes_ait$selected_sx_etos";
	
	$idaitisi='';
	$filelist= array();
	
	if (isset($_POST['displayupdate']) && isset($_POST['id']) && isset($_POST['headertitle']) /*&& isset($_POST['ar_prot_sxoleiou'])*/) //update list only. Called after file uploads. No file generation checks.
	{
		$idaitisi= mysqli_real_escape_string($mySqlConnection,$_POST['id']);
		$headertitle= mysqli_real_escape_string($mySqlConnection,$_POST['headertitle']);
		// $ar_prot_sxoleiou= mysqli_real_escape_string($mySqlConnection,$_POST['ar_prot_sxoleiou']);
		
		if (isset($_POST['delfile'])){ //try to delete a file
			$ds = DIRECTORY_SEPARATOR;  
			$storeFolder = 'arxeia'.$ds. $_SESSION['ekdromes_currentYear'] .$ds. $_SESSION['kodikos_sxoleiou'];
			$targetFile =  $storeFolder.$ds. $idaitisi. 'U_'. $_POST['delfile'];
			unlink($targetFile);
		}
		GetFileList($idaitisi, $filelist, false);
	}
	else
	{
		$update_required= false;
		$ary_saved_ekdromi= array();
		if(!isset($_POST['idaitisi']) || $_POST['idaitisi']=='') $update_required=true;//user is adding new, save it first.
		else
		{
			//user is editing data or already saved new data.
			//1.read from posted data, 2.read from db, 3.compare the two arrays to see if we need to update auto-generated files.
			$keys= array();	populate_stiles($keys);
			$ary_postedrecords= array(); 
			SetUndefinedAsEmpty($ary_postedrecords);//initialize as "empty"
			
			foreach ($keys as $key)
			{
				if (!isset($_POST[$key])) continue;//all disabled ones will not be posted
				$ary_postedrecords[$key]= $_POST[$key];
			}
			//2.read from db
			$idaitisi= mysqli_real_escape_string($mySqlConnection,$_POST['idaitisi']);

			$amount=0;
			try {
				$result = mysqli_query($mySqlConnection, "SELECT * FROM	$pinakas_ekdromes WHERE kodikos_sxoleiou='$kodikos_sxoleiou' AND idaitisi='$idaitisi'");
				if (mysqli_errno($mySqlConnection)) {echo 'Σφάλμα βάσης δεδομένων:<br>'.mysqli_error($mySqlConnection).'<br>';return false;}
				else $amount = mysqli_num_rows($result);
			}
			catch (mysqli_sql_exception $e) {
				echo '<p>Σφάλμα ΒΔ:'.$e->getMessage() .'</p>';
				return false;
			}	
			if ($amount==0) {
				 echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Η εγγραφή δε βρέθηκε!</strong></div>';return false;}
			if ($amount>1) {
					echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Σφάλμα! Πολλαπλές εγγραφές!<br></strong></div>'; return false;}

			$ary_saved_ekdromi = mysqli_fetch_array($result,MYSQLI_ASSOC );
			TrimSqlHours($ary_saved_ekdromi);
			
			//done
			/*3. compare $ary_saved_ekdromi with $ary_postedrecords
			foreach ($ary_saved_ekdromi as $key=>$data)
			{
				if (isset($ary_postedrecords[$key]))
				{
					if ($data==$ary_postedrecords[$key]) continue;//echo 'SAME ';
					echo "$key => $data posted:".$ary_postedrecords[$key].'<br>';
				}
				else echo "$key => $data NOT POSTED<br>";
			}
			return;
			*/

			foreach ($keys as $key)
			{
				if ($key=='submit_datetime') continue; //skip submit date(is never posted as it is disabled)
				if ($key=='status') continue; //skip (is never posted as it is disabled)
					
				if ($ary_postedrecords[$key]!= $ary_saved_ekdromi[$key]) {$update_required=true;$ary_saved_ekdromi=array();break;}
			}
		}

		if ($update_required)
		{
			if(!save_ekdromi(false, $ary_saved_ekdromi) ) return false;//save posted data,
			//else echo 'Έγινε αποθηκεύση αλλαγών.<br>';
			
			//re-generate pdfs
			BuildPdfs($ary_saved_ekdromi);
			echo 'Δημιουργήθηκε αυτόματα αρχείο(α).<br> <br>';
			GetFileList($ary_saved_ekdromi['idaitisi'], $filelist, true);
		}
		else
		{
			//see if pdfs exist on disk, generate if not(based on eidos_ekdromis).
			if (empty($ary_saved_ekdromi))//never going to happen unless an id is posted
			{
				echo 'Φόρτωση δεδομένων...';
				$idaitisi= mysqli_real_escape_string($mySqlConnection,$_POST['idaitisi']);
				$result = mysqli_query($mySqlConnection, "SELECT * FROM	$pinakas_ekdromes WHERE kodikos_sxoleiou='$kodikos_sxoleiou' AND idaitisi='$idaitisi'");
				if (mysqli_errno($mySqlConnection)) {echo 'Σφάλμα βάσης δεδομένων:<br>'.mysqli_error($mySqlConnection).'<br>';return false;}
				else $amount = mysqli_num_rows($result);
				if ($amount==0) {
					 echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Η εγγραφή δε βρέθηκε!</strong></div>';return false;}
				if ($amount>1) {
						echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Σφάλμα! Πολλαπλές εγγραφές!<br></strong></div>'; return false;}
				$ary_saved_ekdromi = mysqli_fetch_array($result,MYSQLI_ASSOC );
				TrimSqlHours($ary_saved_ekdromi);
				echo '&#10004;<br>';//OK
			}
			
			GetFileList($ary_saved_ekdromi['idaitisi'], $filelist, true);
			$found=false;
			foreach ($filelist as $filename) if (str_starts_with($filename,"$idaitisi".'F_')) {$found=true;break;}
			if (!$found) 
			{
				BuildPdfs($ary_saved_ekdromi);
				echo 'Δημιουργήθηκε αυτόματα αρχείο(α)...<br> <br>';
				GetFileList($ary_saved_ekdromi['idaitisi'], $filelist, true);
			}
		}
		//display list of pdfs (both auto gen or uploaded
		//print files already on server and allow deletion
		$idaitisi= $ary_saved_ekdromi['idaitisi'];
		$headertitle= $ary_saved_ekdromi['eidos_ekdromis'];//$ary_saved_ekdromi['titlos'];
		$ar_prot_sxoleiou= $ary_saved_ekdromi['ar_prot_sxoleiou'];
	}
	//ready to display:

	echo "<form action=mainindex.php method=post id=refreshfilelist>
		// <input type=hidden name=action value='preparefiles'>
		<input type=hidden name=displayupdate value='1'>
		<input type=hidden name=headertitle value='$headertitle'>
		<input type=hidden name=id value='$idaitisi'>
		<input type=hidden name='ar_prot_sxoleiou' value='$ar_prot_sxoleiou'>
		</form>";

	echo "<p> Εκδρομή: <b>$headertitle</b></p> <p>Τα παρακάτω αρχεία θα υποβληθούν στη ΔΔΕ (θα λάβουν
	αριθμό πρωτοκόλλου). Παρακαλούμε σιγουρευτείτε για την ορθότητα τους πριν την υποβολή. Αν χρειάζεται μπορείτε να συμπεριλάβετε κι άλλα αρχεία
	(με το <b>+</b>) </p><br>";
	
	//allow user to upload files. update page after upload.
	echo <<<EOD
	<button type="button" title="Προσθήκη αρχείων" class="btn btn-default btn-sm" onclick='javascript:if (document.getElementById("uploadfiles").style.display=="none") document.getElementById("uploadfiles").style.display="";else document.getElementById("uploadfiles").style.display="none";'><span class="glyphicon glyphicon-plus"></span> Επιπλέον Αρχεία</button>
	
	<div id=uploadfiles style="display:none"><p>Προσθέστε αρχεία με το παρακάτω πλαίσιο. Αφού επιλέξετε τα αρχεία που θέλετε από τον υπολογιστή σας, πατήστε το κουμπί 
		<button type="button" class="btn btn-primary btn-sm" id="sendfiles">Αποστολή των αρχείων</button> για
		να προστεθούν. Αρχεία με το ίδιο όνομα αντικαθιστούν τα προηγούμενα. Μέγιστο μέγεθος αρχείου 10MB.<br></p>	
		<form action="fileuploads.php" class="dropzone" enctype="multipart/form-data" id="filesdropform">
		<div class="fallback">
			<input name="file" type="file" multiple />
			<input type="submit" value="Υποβολή αρχείων" />
		</div>
		<input type="hidden" name="idaitisis" value="$idaitisi">
		</form>
	</div>
		<script src="./js/dropzone5.min.js"></script>
		<script>
		  Dropzone.options.filesdropform = { 
			dictDefaultMessage : "Σύρτε αρχεία για επιλογή ή πατήστε εδώ",
			dictFallbackMessage : "Δεν υποστηρίζεται μεταφορά και απόθεση",
			dictFallbackText : "Χρησιμοποιήστε το παρακάτω πεδίο για να επιλέξετε πολλαπλά αρχεία για ανέβασμα.",
			dictFileTooBig : "Το αρχείο είναι πολύ μεγάλο ({{filesize}}MiB). Μέγιστο μέγεθος: {{maxFilesize}}MiB.",
			dictResponseError : "Ο server απάντησε με κωδικό {{statusCode}}.",
			dictCancelUpload : "Ακύρωση",
			dictCancelUploadConfirmation : "Είστε σίγουροι για την ακύρωση;",
			dictRemoveFile : "Απομάκρυνση",
			dictMaxFilesExceeded : "Δεν μπορείτε να ανεβάσετε περισσότερα αρχεία.",
			dictInvalidFileType : "Δεν μπορείτε να ανεβάσετε αρχεία αυτού του τύπου (μόνο pdf,doc,docx,excel)",
			acceptedFiles: ".pdf,.doc,.docx,.xls,.xlsx,.txt",
	
			paramName: "file", // The name that will be used to transfer the file
			createImageThumbnails: true,
			maxFilesize: 10, // MB
			parallelUploads: 100,
			uploadMultiple: true,
					addRemoveLinks: true,
					maxFiles: 100,
					autoProcessQueue: false,
					removedfile: function(file) {

if (this.files.length==0) document.getElementById('ypobolibutton').disabled=false;
						
					var _ref;
					return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
					},
					accept: function(file, done) {
					  if (file.name == "justinbieber.jpg") {
						done("Naha, you don't.");
					  }
					  else { done(); }
					  document.getElementById('ypobolibutton').disabled=true;
					},
					init: function() {
					var submitButton = document.querySelector('#sendfiles')
					mydropzone = this; // closure

					this.on('queuecomplete', function () {
								//window.location.href="test.php";//location.reload();
								document.getElementById('refreshfilelist').submit();
							});

					submitButton.addEventListener('click', function() {
					mydropzone.processQueue(); // Tell Dropzone to process all queued files.
						});
					}
				  };
				</script>
EOD;
	
	echo '<u>Λίστα αρχείων προς υποβολή στη ΔΔΕ:</u><br>';
	
	$fileamount= display_filelist($filelist,$idaitisi,$headertitle, false);

	echo <<<BUTTONS
	<hr>
		<form method=post action=mainindex.php id=telikiypoboli>
		<input type=hidden name='idaitisis' value='$idaitisi'>
		<input type=hidden name='ar_prot_sxoleiou' value='$ar_prot_sxoleiou'>
		<input type=hidden name=headertitle value='$headertitle'>
		<input type=hidden name=action value='ypoboli'>
		
		<table border=0 style="width:100%"><tr>
		<td style='text-align:left;width:33%'><button type="submit" class="btn btn-warning" title="Πίσω στα πεδία" name=action value=edit><span class='glyphicon glyphicon-menu-left'></span>Επιστροφή</button></td>
	
		<td style='text-align:right;width:33%'><button type="button" id=ypobolibutton class="btn btn-danger" title="Οριστική Υποβολή" name="action" value="ypoboli"
		onclick='javascript:if(window.confirm("Είστε σίγουροι; Δε γίνονται αλλαγές μετά την υποβολή.")){document.getElementById("ypobolibutton").disabled = true;document.getElementById("telikiypoboli").submit();}'>
		Οριστική υποβολή ($fileamount αρχεία) στη ΔΔΕ<span class='glyphicon glyphicon-menu-right'></span></button>
		</td></tr></table>
		
		</form>
BUTTONS;

	return true;
}

function display_filelist($filelist,$idaitisi,$headertitle, $readonly)
{
	if (!$readonly)
		echo "<form action=mainindex.php method=post id=removefile>
			<input type=hidden name=action value=preparefiles>
			<input type=hidden name=displayupdate value=1>
			<input type=hidden name=headertitle value=\"$headertitle\">
			<input type=hidden name=id value=\"$idaitisi\">
			<input type=hidden name=delfile id=delfile value=\"0\">
			</form>";

	echo "
		<form action=filedownload.php method=post id=getfile target=\"_blank\">
		<input type=hidden name=action value=preparefiles>
		<input type=hidden name=displayupdate value=1>
		<input type=hidden name=headertitle value=\"$headertitle\">
		<input type=hidden name=id value=\"$idaitisi\">
		<input type=hidden name=whichfile id=whichfile value=\"0\">
		<input type=hidden name=autogen id=autogen value=\"0\">
		</form>
		";
	
	echo '<table class="table table-hover table-condensed">';
	$i=1;
	foreach ($filelist as $filename)
	{
		$autogenerated=false;
		if (str_starts_with($filename,"$idaitisi".'F_'))
			{$filename= mb_substr($filename, mb_strlen("$idaitisi".'F_'));$autogenerated=true;}
		
		if (str_starts_with($filename,"$idaitisi".'A_'))
			{$filename= mb_substr($filename, mb_strlen("$idaitisi".'A_'));$autogenerated=true;}
		
		if (str_starts_with($filename,"$idaitisi".'U_')) //user uploaded
			$filename= mb_substr($filename, mb_strlen("$idaitisi".'U_'));

		echo "<tr><td>$i</td>";

		echo "<td><button title='Εμφάνιση/Λήψη αρχείου' 
		onclick='javascript:document.getElementById(\"whichfile\").value=\"$filename\";";
		if ($autogenerated) echo "document.getElementById(\"autogen\").value=\"1\";";	
		echo "document.getElementById(\"getfile\").submit();'><span class='glyphicon glyphicon glyphicon-eye-open'></span></button>";
		echo " &nbsp; <span class='glyphicon glyphicon-file'></span> &nbsp;$filename&nbsp;";
		if ($autogenerated) echo '(Δημιουργήθηκε αυτόματα)';
		echo "</td>";
		
		echo "<td> &nbsp;<button title='Εμφάνιση/Λήψη αρχείου' 
		onclick='javascript:document.getElementById(\"whichfile\").value=\"$filename\";";
		if ($autogenerated) echo "document.getElementById(\"autogen\").value=\"1\";";	
		echo "document.getElementById(\"getfile\").submit();'><span class='glyphicon glyphicon glyphicon-eye-open'></span></button> </td>";
		
		if (!$readonly && !$autogenerated) echo "<td> &nbsp;<button title='Διαγραφή' 
		onclick='javascript:if(window.confirm(\"Είστε σίγουροι για τη διαγραφή;\")){document.getElementById(\"delfile\").value=\"$filename\"; document.getElementById(\"removefile\").submit();}'><span class='glyphicon glyphicon-trash'></span></button></td>";
		else echo '<td></td>';
		
		echo '</tr>';
		$i++;
	}
	$i--;
	echo '</table>';
	return $i;//return the number of files
}

function finalsubmit()
{
	$kodikos_sxoleiou= $_SESSION['kodikos_sxoleiou'];
	
	if (!isset($_POST['idaitisis'])) return;
	
	require_once('db.php');
	$idaitisi= mysqli_real_escape_string($mySqlConnection,$_POST['idaitisis']);
	
	if (isset($_POST['ar_prot_sxoleiou'])) $ar_prot_sxoleiou=  mysqli_real_escape_string($mySqlConnection,$_POST['ar_prot_sxoleiou']);
	else $ar_prot_sxoleiou="";//$ar_prot_sxoleiou='-'; this is mandatory.

	if (isset($_POST['headertitle'])) $headertitle= mysqli_real_escape_string($mySqlConnection,$_POST['headertitle']);//not actually used
	else $headertitle='';
	
	if ($ar_prot_sxoleiou=="" || trim($ar_prot_sxoleiou," -_")=="") 
	{
			echo "Δεν μπορεί να γίνει υποβολή χωρίς Αρ. Πρωτοκόλλου Σχολικής Μονάδας.<br> <br>";
			
			echo "<form action=mainindex.php method=post id=refreshfilelist>
			<input type=hidden name=action value='preparefiles'>
			<input type=hidden name=displayupdate value='1'>
			<input type=hidden name=headertitle value='$headertitle'>
			<input type=hidden name=id value='$idaitisi'>
			<input type=hidden name='ar_prot_sxoleiou' value='$ar_prot_sxoleiou'>
			
			<button type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-menu-left'></span>Επιστροφή στη λίστα αρχείων της εκδρομής</button>
			</form>";

			return false;
	}

	$filelist= array();
	GetFileList($idaitisi, $filelist, false);
	if (empty($filelist)) {echo 'Δεν βρέθηκαν αρχεία προς υποβολή.<br>';return;}

	//based on type of submit, check amount of files required. Do not allow less files.
	$selected_sx_etos= $_SESSION['ekdromes_currentYear'];
	$pinakas_ekdromes= "ekdromes_ait$selected_sx_etos";	
 
	try {
		$result = mysqli_query($mySqlConnection, "SELECT eidos_ekdromis,status,hmera_diavivastikou FROM	$pinakas_ekdromes WHERE kodikos_sxoleiou='$kodikos_sxoleiou' AND idaitisi='$idaitisi'");
		if (mysqli_errno($mySqlConnection)) {echo 'Σφάλμα βάσης δεδομένων:<br>'.mysqli_error($mySqlConnection).'<br>';return false;}
		else $amount = mysqli_num_rows($result);
	}
	catch (mysqli_sql_exception $e) {
		echo '<p>Σφάλμα ΒΔ:'.$e->getMessage() .'</p>';
		return false;
	}	
	if ($amount!=1) {
		 echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Σφάλμα. Η εγγραφή δε βρέθηκε!</strong></div>';return false;
	}
	else $row = mysqli_fetch_array($result,MYSQLI_ASSOC );
	if ($row['status']=='ΥΠΟΒΛΗΘΗΚΕ') {echo 'Σφάλμα! Η εκδρομή έχει ήδη υποβληθεί. <br> <br>';return false;}
	$hmera_diavivastikou= $row['hmera_diavivastikou'];
	$datetime= date_create($hmera_diavivastikou);
	$str_date_diav= date_format($datetime,"d-m-Y");

	$ary_typoi_ekdrom= array();
	populate_ekdromes($ary_typoi_ekdrom);
	if ( !isset($ary_typoi_ekdrom[$row['eidos_ekdromis']]) ) {echo 'Σημαντικό σφάλμα. Δε βρέθηκε ο τύπος εκδρομής: <i>'.$row['eidos_ekdromis'].'</i><br> <br>';return false;}
	$fileamount_required= $ary_typoi_ekdrom[$row['eidos_ekdromis']][4];
	if (count($filelist)< $fileamount_required) {
		echo "ΔΕΝ ΕΓΙΝΕ ΥΠΟΒΟΛΗ.<br>Υπάρχουν λιγότερα αρχεία (".count($filelist).") από αυτά που απαιτούνται ($fileamount_required) για να γίνει η υποβολή. (μήπως ξεχάστηκε να προστεθεί κάποιο πρακτικό; )<br> <br>";
		
		echo "<form action=mainindex.php method=post id=refreshfilelist>
		<input type=hidden name=action value='preparefiles'>
		<input type=hidden name=displayupdate value='1'>
		<input type=hidden name=headertitle value='$headertitle'>
		<input type=hidden name=id value='$idaitisi'>
		<input type=hidden name='ar_prot_sxoleiou' value='$ar_prot_sxoleiou'>
		
		<button type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-menu-left'></span>Επιστροφή στη λίστα αρχείων της εκδρομής</button>
		</form>";
		
		return false;
	}
	//-file number check done.
	$protocol_title= "Ενημέρωση-Έγκριση εκδρομής(". $row['eidos_ekdromis'].")";
	$protocol_title= mb_substr($protocol_title,0,200);//max 200 chars
	if ($protocol_title=='' || mb_strlen($protocol_title)<20) $protocol_title= 'Αίτημα Ενημέρωσης-Έγκρισης εκδρομής';//when something goes wrong, reset to default

	$mainfilename='';
	foreach ($filelist as $key=>$filename) {
		if (str_starts_with($filename,"{$idaitisi}F_")) {$mainfilename=$filename; unset($filelist[$key]); break;} //remove main file from filelist
	}
	if ($mainfilename=='') {echo 'Δε βρέθηκε διαβιβαστικό. Η καταχώρηση δε μπορεί να γίνει.<br>';return;}
	
	//---addToProtocol:
				
		require('addToProtocol/vendor/autoload.php');
		
		$client = new GuzzleHttp\Client();
		$jar = new GuzzleHttp\Cookie\CookieJar();

		/////////////////////////////////////////
		// Login
		////////////////////////////////////////
		$env= parse_ini_file('../../addToProtocol/.env');
		if ($env===false) {echo 'Σφάλμα πρόσβασης σε παραμέτρους<br>';return;}
		
		$username= $env['USERNAME'];
		$password= $env['PASSWORD'];
		
		//$base_url defined in db.php
		
		$base_url='http://10.135.250.11/protocol'; // http://e-protocol/protocol
		try {
		
			$status = $client->get("$base_url/index.php", [
				'cookies' => $jar
			])->getStatusCode();
		}
		catch (Exception  $exception)
		{
			echo "Σφάλμα πρωτοκόλλου! Κωδ.1 Το πρωτόκολλο δεν είναι διαθέσιμο για κάποιο λόγο. Παρακαλούμε προσπαθήστε αργότερα.";
			return;
		}

		if ($status !== 200) {
			echo "Δεν ανοίγει η σελίδα για το login! Κωδικός: $status";
			return;
		}

		try {
			$result = $client->post("$base_url/checkLogin.php", [
				'form_params' => [
					'username' => $username,
					'password' => $password
				],
				'cookies' => $jar
			]);
		}
		catch (Exception  $exception)
		{
			echo "Σφάλμα πρωτοκόλλου! Κωδ. 2 Το πρωτόκολλο δεν είναι διαθέσιμο για κάποιο λόγο. Παρακαλούμε προσπαθήστε αργότερα.";
			return;			
		}
		$status = $result->getStatusCode();

		if ($status !== 200) {
			echo "Σφάλμα κατά την προσπάθεια σύνδεσης. Κωδικός: $status";
			return;
		}

		try {
			$body = $result->getBody();
		}
		catch (Exception  $exception)
		{
			echo "Σφάλμα πρωτοκόλλου! Κωδ. 3 Το πρωτόκολλο δεν είναι διαθέσιμο για κάποιο λόγο. Παρακαλούμε προσπαθήστε αργότερα.";
			return;			
		}
		
		if ($body != "") {
			echo $body;//error
			return;
		}

		/////////////////////////////////////
		// Νέο πρωτόκολλο
		////////////////////////////////////

		$arxiEkdosis = $_SESSION["displayname"];
			
			// Ετοίμασε τα δεδομένα της φόρμας
		$post_data = [
			'dateParalavis' => date('d-m-Y'),
			'arithmosEiserxomenou' => "$ar_prot_sxoleiou", //δε γίνεται από ίδιο χρήστη την ίδια ημέρα ίδιος αριθμός
			'dateEiserxomenou' => "$str_date_diav",
			'perilipsiEiserxomenou' => "$protocol_title", //το θεμα που θα εμφανίζεται στο πρωτόκολλο
			'toposEkdosis' => 'ΘΕΣΣΑΛΟΝΙΚΗ',
			'knownArxiEkdosis' => '0',
			'arxiEkdosis' => $arxiEkdosis,
			'hiddenEntry' => '0',
			'orientation' => 'Επάνω',
		];
			
		$form_data = [];
		$form_data['multipart'] = [];
		foreach($post_data as $index=>$value) {
						$form_data['multipart'][] = [
							'name' => $index,
							'contents' => $value,
						];
					}
			
		// Πρόσθεσε και το αρχείο
		$ds = DIRECTORY_SEPARATOR;  
		$storeFolder = 'arxeia'.$ds. $_SESSION['ekdromes_currentYear'] .$ds. $_SESSION['kodikos_sxoleiou'];

		$form_data['multipart'][] = [
			'name' => 'mainFile',
			'contents' => fopen($storeFolder.$ds.$mainfilename, "r"),
			'filename' => 'autogenmain.pdf', //actual filename is "lost" anyway //mb_substr($mainfilename, mb_strlen($_POST['idaitisis'].'F_')), //remove 'id#F_' from filename
		];
		
		//add extra files:
		$ary_extrafiles= array();
		$i=1;
		foreach ($filelist as $otherfile)
		{
			if (str_starts_with($otherfile,$idaitisi.'A_'))
				$cleanfilename= mb_substr($otherfile, mb_strlen($idaitisi.'A_'));
			else if (str_starts_with($otherfile,$idaitisi.'U_')) //user uploaded
				$cleanfilename= mb_substr($otherfile, mb_strlen($idaitisi.'U_'));			
			else $cleanfilename= $otherfile;
			
			$form_data['multipart'][]= [
				'name' => "$i",
				'contents' => fopen($storeFolder.$ds. $otherfile, "r"),
				'filename' => "$cleanfilename",//this will become 'name' attribute in server after request is processed
			];
			$i++;
		}
			
		$form_data['cookies'] = $jar;

		echo 'Υποβολή αρχείου/αρχείων...';//echo "Ανέβασμα αρχείου: $mainfilename<br>";

		try {
			$result = $client->request(
				"POST", 
				"$base_url/addNewProtocolEntryIN_ekdromes.php",
				$form_data
				);
		}
		catch (Exception  $exception)
		{
			echo "Σφάλμα πρωτοκόλλου! Κωδ. 4 Το πρωτόκολλο δεν είναι διαθέσιμο για κάποιο λόγο. Παρακαλούμε προσπαθήστε αργότερα.";
			return;			
		}
		
		//echo "Αποτέλεσμα: {$result->getStatusCode()}<br>";
		$response = json_decode($result->getBody());

		if ($response[0] !== "done") {
			echo 'Σφάλμα!<br>';
			if (isset($response[0])) {
				echo 'Μήνυμα:'.$response[0] . "<br>";
			} else {
				echo 'Αποτέλεσμα:'.$result->getBody() . "<br>";
			}
		} else {
			echo '&nbsp;<b>&#10004;</b><br> <br>';
			//update db
			$sql= "UPDATE $pinakas_ekdromes	SET ar_prot ='{$response[2]}',status='ΥΠΟΒΛΗΘΗΚΕ' WHERE idaitisi='$idaitisi'";
			if (mysqli_query($mySqlConnection, $sql)==false) echo '(Δεν έγινε αποθήκευση του ΑΠ στην εγγραφή)<br> <br>';
			
			echo 'Η υποβολή ολοκληρώθηκε. Αρ.Πρωτ.: <b>'.$response[2].'</b> Συννημένα αρχεία(εκτός διαβιβαστικού): '.$response[3].'<br>';
		}

//echo '<pre>';print_r($form_data);echo '</pre>';

}

function GetFileList($idaitisi, &$filelist, $createfolder = false)
{
	$ds = DIRECTORY_SEPARATOR;  
	$storeFolder = 'arxeia'.$ds. $_SESSION['ekdromes_currentYear'] .$ds. $_SESSION['kodikos_sxoleiou'];
	// arxeia/2023_2024/9999999

	if (!file_exists( $storeFolder.$ds )){
		if ($createfolder){ //create dir if it doesnt exist
			if (mkdir( $storeFolder . $ds, 0777, true)==FALSE) return false;
		}
		else return false;
	}
	
	$filelist = scandir($storeFolder);	
	
	foreach ($filelist as $key=>$filename)
	{
		if (!str_starts_with($filename,"$idaitisi".'U_') && //user uploaded
			!str_starts_with($filename,"$idaitisi".'F_') && //auto generated,final.
			!str_starts_with($filename,"$idaitisi".'A_') //auto generated
			) unset($filelist[$key]);//remove unwanted
	}
	$filelist= array_values($filelist);
	
	return true;
}

function save_ekdromi($display_after_success, &$datareadback =null)
{
	//temp save, no checks
	
	if (isset($_POST['ar_prot']) && $_POST['ar_prot']!='' && $_POST['ar_prot']!='0') return;
	
	require('db.php');
	
	$selected_sx_etos= $_SESSION['ekdromes_currentYear'];//$_SESSION['ekdromes_actualCurrentYear']
	
	$pinakas_ekdromes= "ekdromes_ait$selected_sx_etos";
	$kodikos_sxoleiou= $_SESSION['kodikos_sxoleiou']; //$currentuser, $_SESSION['currentuser']
	
	$ary_records= array();
	populate_stiles($ary_records);
	
	if (isset($_POST['metakinisi']) && $_POST['metakinisi']=='Πεζή') $_POST['metaforika_mesa']='';//force saving as empty
	
	$sql='';
	if(!isset($_POST['idaitisi']) || $_POST['idaitisi']=='') //adding new record INSERT INTO pinakas (data1,data2,...) VALUES ('d1','d2',...)
	{
		$_POST['status']='ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ';//force status value
		
		$sql= "INSERT INTO $pinakas_ekdromes (";
		foreach ($ary_records as $rec)
		{
			if ($rec=='idaitisi') continue;//skip auto-inc when adding new
			if ($rec=='submit_datetime') {$sql.= "$rec,";continue;}//always included
			if ($rec=='kodikos_sxoleiou') {$sql.= "$rec,";continue;}//always included
			
			if (!isset($_POST[$rec])) continue;//all disabled ones will not be posted
			$sql.= "$rec,";
		}
		$sql= substr_replace($sql,")",-1);//replace last comma
		$sql.= ' VALUES (';
		foreach ($ary_records as $rec)
		{
			if ($rec=='idaitisi') continue;//skip auto-inc 
			if ($rec=='submit_datetime') {$sql.="'".date("Y-m-d H:i:s")."',";continue;}
			if ($rec=='kodikos_sxoleiou') {$sql.="'".$_SESSION['kodikos_sxoleiou']."',";continue;}

			if (!isset($_POST[$rec])) continue;//all disabled ones will not be posted
			$sql.="'".mysqli_real_escape_string($mySqlConnection,$_POST[$rec])."',";
		}
		$sql= substr_replace($sql,")",-1);
	}
	else //update existing record
	{
		$idaitisis= mysqli_real_escape_string($mySqlConnection,$_POST['idaitisi']);
		try {
			$result = mysqli_query($mySqlConnection, "SELECT ar_prot,status FROM	$pinakas_ekdromes WHERE kodikos_sxoleiou='$kodikos_sxoleiou' AND idaitisi='$idaitisis'");
			if (mysqli_errno($mySqlConnection)) {echo 'Σφάλμα βάσης δεδομένων:<br>'.mysqli_error($mySqlConnection).'<br>';return false;}
			else $amount = mysqli_num_rows($result);
		}
		catch (mysqli_sql_exception $e) {
			echo '<p>Σφάλμα ΒΔ:'.$e->getMessage() .'</p>';
			return false;
		}	
		if ($amount!=1) {
			 echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Σφάλμα. Η εγγραφή δε βρέθηκε!</strong></div>';return false;
		}
		else $row = mysqli_fetch_array($result,MYSQLI_ASSOC );	
		
		if (($row['ar_prot']!='' && $row['ar_prot']!='0') || $row['status']!='ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ'){
			 echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Η εκδρομή έχει υποβληθεί στη ΔΔΕ. Δε γίνεται να διαγραφεί.</strong></div>';return false;
		}
		
		
		$sql= "UPDATE $pinakas_ekdromes	SET ";
		foreach ($ary_records as $rec)
		{
			if ($rec=='idaitisi') continue;
			if ($rec=='eidos_ekdromis') continue; //never update eidos_ekdromis
			if ($rec=='kodikos_sxoleiou') continue;
			if ($rec=='status') continue;
			if ($rec=='submit_datetime') { $sql.= "$rec = '" .date("Y-m-d H:i:s")."',"; continue;}
			
			if (!isset($_POST[$rec])) continue;//all disabled ones will not be posted
			$sql.= "$rec = '" . mysqli_real_escape_string($mySqlConnection,$_POST[$rec]) ."',";
		}
		$sql= substr_replace($sql,"",-1);
		$sql.=" WHERE idaitisi='$idaitisis'";
	}

	$error=false;
	try {
    	$result = mysqli_query($mySqlConnection, $sql);
	}
	catch (mysqli_sql_exception $e) 
	{
		echo '<p>Σφάλμα ΒΔ:'.$e->getMessage() .'</p>';
		$error=true;
	}

	if (!$error) {
		
		if (!isset($_POST['idaitisi']) || $_POST['idaitisi']=='')	$idaitisis= mysqli_insert_id($mySqlConnection);//new
		else {
			$idaitisis= mysqli_real_escape_string($mySqlConnection,$_POST['idaitisi']); //existing
			
			//since we updated data, delete any auto generated files if they exist:
			$ds = DIRECTORY_SEPARATOR;  
			$storeFolder = 'arxeia'.$ds. $_SESSION['ekdromes_currentYear'] .$ds. $_SESSION['kodikos_sxoleiou'];
			$filelist= array();
			GetFileList($idaitisis, $filelist,false);
			foreach ($filelist as $filename) if (str_starts_with($filename,"$idaitisis".'F_')||str_starts_with($filename,"$idaitisis".'A_')) unlink($storeFolder.$ds.$filename);// xxA_==autogenerated, F==last autogenerated file U==user uploaded file
		}
		
		$result = mysqli_query($mySqlConnection, "SELECT * FROM	$pinakas_ekdromes WHERE kodikos_sxoleiou='$kodikos_sxoleiou' AND idaitisi='$idaitisis'");
		if (mysqli_errno($mySqlConnection)) {echo 'Σφάλμα βάσης δεδομένων:<br>'.mysqli_error($mySqlConnection).'<br>';return false;}
		else{
			$amount = mysqli_num_rows($result);
			if ($amount!=1) {echo 'Σφάλμα βάσης δεδομένων: Δεν βρέθηκε η εγγραφή.<br>';return false;}
			else //update success
				echo '<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Έγινε Αποθήκευση</strong>
				</div>';					

			if ($display_after_success) 
			{
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC );
				display_ekdromi($row);
				if (!is_null($datareadback)) $datareadback= $row;
				return true;
			}

			if (!is_null($datareadback)) $datareadback= mysqli_fetch_array($result,MYSQLI_ASSOC );
			
			return true;
		}
	}
	else return false;
}

function SendCalendarInit($calendarid)
{
	$currentyear= Date('Y');
	echo "<script type='text/javascript'>
		Calendar.setup({
			inputField      :    '$calendarid',
			ifFormat        :    '%Y-%m-%d',
			firstDay        :    1,
			weekNumbers     :    false,
			range			:	[$currentyear-1, $currentyear+1]
			});
		</script>";

	if ($calendarid=='hmera_diavivastikou')
	{
		$currentdate= date('Y-m-d');
echo <<<ENDOFSCR
<script type="text/javascript">
function checkdatediav() {
	if(document.getElementById('hmera_diavivastikou').value >"$currentdate" )
		document.getElementById('hmera_diav_warning').style.display='';
	else
		document.getElementById('hmera_diav_warning').style.display='none';
}
checkdatediav();
</script>
ENDOFSCR;		
	}
}

function TrimSqlHours(&$ary_ekdromidata)
{
	//turn sql 00:00:00 to 00:00
	
	if(isset($ary_ekdromidata['ora_anaxorisis']) && strtotime($ary_ekdromidata['ora_anaxorisis'])) {//isvalid
		$datetime= date_create($ary_ekdromidata['ora_anaxorisis']);
		$ary_ekdromidata['ora_anaxorisis']= date_format($datetime,"H:i"); 
	}
	if(isset($ary_ekdromidata['ora_afijis']) && strtotime($ary_ekdromidata['ora_afijis'])) {//isvalid
		$datetime= date_create($ary_ekdromidata['ora_afijis']);
		$ary_ekdromidata['ora_afijis']= date_format($datetime,"H:i"); 
	}
	if(isset($ary_ekdromidata['ora_apoxorisis']) && strtotime($ary_ekdromidata['ora_apoxorisis'])) {//isvalid
		$datetime= date_create($ary_ekdromidata['ora_apoxorisis']);
		$ary_ekdromidata['ora_apoxorisis']= date_format($datetime,"H:i"); 
	}
	if(isset($ary_ekdromidata['ora_epistrofis']) && strtotime($ary_ekdromidata['ora_epistrofis'])) {//isvalid
		$datetime= date_create($ary_ekdromidata['ora_epistrofis']);
		$ary_ekdromidata['ora_epistrofis']= date_format($datetime,"H:i"); 
	}	
}

?>
