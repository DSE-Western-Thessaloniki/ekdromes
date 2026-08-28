<?php

//identify user by white list
$adminlist = array ( 'kmouratid@sch.gr','georgio@sch.gr', 'theint@sch.gr', 'tilsotiria@sch.gr', 'iperchan@sch.gr');

/*
require('db.php');
$error=false;
try {
    	$result = mysqli_query($mySqlConnection, "SELECT * FROM $pinakas_sx");
	}
catch (mysqli_sql_exception $e) {$error=true;}
if (!$error)
{
	$amount = mysqli_num_rows($result);
	for ($i=1; $i<=$amount; $i++) {
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$schoollist[$row['mail']]= array($row['kodikos_sxoleiou'],$row['typos_sxoleiou'],$row['onomasia'],row['phonenumbers']);
	}
}
*/


//$schoollist = array( 'school-mail_used_to_login' => array('code','typeofschool','display name','phone','display_email_optional_when different than login')// ,
//					 //'kmouratid@sch.gr' => array('9999999','ΛΥΚΕΙΟ ΓΥΜΝΑΣΙΟ ΕΠΑΛ ΕK','ΔΟΚΙΜΑΣΤΙΚΟ ΣΧΟΛΕΙΟ','2310999999')
//);

//White list. Uncomment for production use:
$schoollist = array( 
'mail@3gym-menem.thess.sch.gr' 				=> array('1901041','ΓΥΜΝΑΣΙΟ','3ο Γ/Σ ΜΕΝΕΜΕΝΗΣ'					,'2310764115'),
'mail@1gym-stavroup.thess.sch.gr' 			=> array('1901060','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΣΤΑΥΡΟΥΠΟΛΗΣ'					,'2310657108'),
'mail@2gym-neapol.thess.sch.gr'				=> array('1901061','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΝΕΑΠΟΛΗΣ'						,'2310619653'),
'mail@3gym-neapol.thess.sch.gr'				=> array('1901131','ΓΥΜΝΑΣΙΟ','3ο Γ/Σ ΝΕΑΠΟΛΗΣ'						,'2316070833'),
'mail@4gym-neapol.thess.sch.gr' 			=> array('1901133','ΓΥΜΝΑΣΙΟ','4ο Γ/Σ ΝΕΑΠΟΛΗΣ'						,'2310619168'),
'mail@4gym-sykeon.thess.sch.gr' 			=> array('1901141','ΓΥΜΝΑΣΙΟ','4ο Γ/Σ ΣΥΚΕΩΝ'						,'2310630925'),
'mail@5gym-neapol.thess.sch.gr'		 		=> array('1901176','ΓΥΜΝΑΣΙΟ','5ο Γ/Σ ΝΕΑΠΟΛΗΣ'						,'2310612853'),
'mail@1gym-menem.thess.sch.gr'		 		=> array('1901185','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΜΕΝΕΜΕΝΗΣ'					,'2310732923'),
'mail@gym-diap-evosm.thess.sch.gr'	 		=> array('1901192','ΓΥΜΝΑΣΙΟ','Γ/Σ ΔΙΑΠΟΛ ΕΚΠ ΕΥΟΣΜΟΥ'				,'2310602559'),
'mail@gym-ag-athan.thess.sch.gr'		 	=> array('1901220','ΓΥΜΝΑΣΙΟ','1o Γ/Σ ΑΓΙΟΥ ΑΘΑΝΑΣΙΟΥ'				,'2310701366'),
'mail@gym-diavat.thess.sch.gr'		 		=> array('1901222','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΕΧΕΔΩΡΟΥ (ΔΙΑΒΑΤΑ)'			,'2310781804'),
'mail@gym-kaloch.thess.sch.gr'		 		=> array('1901225','ΓΥΜΝΑΣΙΟ','3ο Γ/Σ ΕΧΕΔΩΡΟΥ (ΚΑΛΟΧΩΡΙ)'			,'2310751790'),
'mail@3gym-el-kordel.thess.sch.gr' 			=> array('1901226','ΓΥΜΝΑΣΙΟ','3ο Γ/Σ ΕΛΕΥΘΕΡΙΟΥ-ΚΟΡΔΕΛΙΟΥ'			,'2310707898'),
'mail@1gym-el-kordel.thess.sch.gr'	 		=> array('1901227','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΕΛΕΥΘΕΡΙΟΥ-ΚΟΡΔΕΛΙΟΥ'			,'2310765777'),
'mail@1gym-neapol.thess.sch.gr'		 		=> array('1901228','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΝΕΑΠΟΛΗΣ'						,'2310622809'),
'mail@2gym-el-kordel.thess.sch.gr' 			=> array('1901229','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΕΛΕΥΘΕΡΙΟΥ-ΚΟΡΔΕΛΙΟΥ'			,'2311236454'),
'mail@gym-esp-ampel.thess.sch.gr'	 		=> array('1901255','ΓΥΜΝΑΣΙΟ','ΕΣΠΕΡ Γ/Σ ΑΜΠΕΛΟΚ'					,'2310742004'),
'mail@1gym-sykeon.thess.sch.gr'		 		=> array('1901256','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΣΥΚΕΩΝ'						,'2310203027'),
'mail@2gym-sykeon.thess.sch.gr'		 		=> array('1901257','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΣΥΚΕΩΝ'						,'2310219769'),
'mail@3gym-sykeon.thess.sch.gr'		 		=> array('1901258','ΓΥΜΝΑΣΙΟ','3ο Γ/Σ ΣΥΚΕΩΝ'						,'2310215586'),
'1901260@sch.gr'		 					=> array('1901260','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΑΜΠΕΛΟΚΗΠΩΝ'					,'2310731300','mail@1gym-ampel.thess.sch.gr'),
'mail@4gym-ampel.thess.sch.gr'		 		=> array('1901261','ΓΥΜΝΑΣΙΟ','4ο Γ/Σ ΑΜΠΕΛΟΚΗΠΩΝ'					,'2310737265'),
'mail@2gym-ampel.thess.sch.gr'		 		=> array('1901263','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΑΜΠΕΛΟΚΗΠΩΝ'					,'2310730038'),
'1901264@sch.gr'		 					=> array('1901264','ΓΥΜΝΑΣΙΟ','3ο Γ/Σ ΑΜΠΕΛΟΚΗΠΩΝ'					,'2310737590','mail@3gym-ampel.thess.sch.gr'),//'mail@3gym-ampel.thess.sch.gr'		 		=> array('1901264','ΓΥΜΝΑΣΙΟ','3ο ΓΥΜΝΑΣΙΟ ΑΜΠΕΛΟΚΗΠΩΝ'),
'mail@1gym-evosm.thess.sch.gr'		 		=> array('1901266','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΕΥΟΣΜΟΥ'			        	,'2310764026'),
'mail@4gym-stavroup.thess.sch.gr'	 		=> array('1901267','ΓΥΜΝΑΣΙΟ','4ο Γ/Σ ΣΤΑΥΡΟΥΠΟΛΗΣ'             	,'2310641200'),
'mail@2gym-evosm.thess.sch.gr'		 		=> array('1901268','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΕΥΟΣΜΟΥ'                  	,'2310765921'),
'mail@3gym-evosm.thess.sch.gr'		 		=> array('1901269','ΓΥΜΝΑΣΙΟ','3ο Γ/Σ ΕΥΟΣΜΟΥ'                  	,'2310607515'),
'mail@1gym-polichn.thess.sch.gr'	 		=> array('1901270','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΠΟΛΙΧΝΗΣ'                 	,'2310655704'),
'mail@2gym-polichn.thess.sch.gr'	 		=> array('1901271','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΠΟΛΙΧΝΗΣ'                 	,'2310663963'),
'mail@5gym-stavroup.thess.sch.gr'	 		=> array('1901272','ΓΥΜΝΑΣΙΟ','5ο Γ/Σ ΣΤΑΥΡΟΥΠΟΛΗΣ'             	,'2310650002'),
'mail@4gym-polichn.thess.sch.gr'	 		=> array('1901273','ΓΥΜΝΑΣΙΟ','4ο Γ/Σ ΠΟΛΙΧΝΗΣ'                 	,'2310619718'),
'mail@4gym-evosm.thess.sch.gr'		 		=> array('1901274','ΓΥΜΝΑΣΙΟ','4ο Γ/Σ ΕΥΟΣΜΟΥ'                  	,'2310666443'),
'mail@3gym-polichn.thess.sch.gr'	 		=> array('1901275','ΓΥΜΝΑΣΙΟ','3ο Γ/Σ ΠΟΛΙΧΝΗΣ'                 	,'2310652011'),
'mail@3gym-stavroup.thess.sch.gr'	 		=> array('1901276','ΓΥΜΝΑΣΙΟ','3ο Γ/Σ ΣΤΑΥΡΟΥΠΟΛΗΣ'             	,'2310656197'),
'mail@5gym-evosm.thess.sch.gr'		 		=> array('1901279','ΓΥΜΝΑΣΙΟ','5ο Γ/Σ ΕΥΟΣΜΟΥ'                  	,'2310759019'),
'mail@6gym-evosm.thess.sch.gr'		 		=> array('1901280','ΓΥΜΝΑΣΙΟ','6ο Γ/Σ ΕΥΟΣΜΟΥ'                  	,'2310587093'),
'mail@2gym-stavroup.thess.sch.gr'	 		=> array('1901282','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΣΤΑΥΡΟΥΠΟΛΗΣ'             	,'2310667513'),
'mail@6gym-stavroup.thess.sch.gr' 			=> array('1901283','ΓΥΜΝΑΣΙΟ','6ο Γ/Σ ΣΤΑΥΡΟΥΠΟΛΗΣ'             	,'2310601097'),
'mail@gym-zagkl.thess.sch.gr'		 		=> array('1903010','ΓΥΜΝΑΣΙΟ','Γ/Σ ΚΑΛΙΝΔΟΙΩΝ (ΖΑΓΚΛΙΒΕΡΙ)'     	,'2393031223'),
'mail@1gym-lagkad.thess.sch.gr'		 		=> array('1904010','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΛΑΓΚΑΔΑ'                  	,'2394022537'),
'mail@2gym-lagkad.thess.sch.gr'		 		=> array('1904011','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΛΑΓΚΑΔΑ'                  	,'2394024354'),
'mail@gym-lagkad.thess.sch.gr'		 		=> array('1904020','ΓΥΜΝΑΣΙΟ','Γ/Σ ΚΟΡΩΝΕΙΑΣ (ΛΑΓΚΑΔΙΚΙΑ)'      	,'2393022119'),
'mail@gym-n-apoll.thess.sch.gr'		 		=> array('1904030','ΓΥΜΝΑΣΙΟ','Γ/Σ Ν. ΑΠΟΛΛΩΝΙΑΣ'               	,'2393041215'),
'mail@gym-rentin.thess.sch.gr' 							=> array('1904040','ΓΥΜΝΑΣΙΟ','Γ/Σ ΡΕΝΤΙΝΑΣ (ΠΑΡ.ΣΤΑΥΡΟΥ)'      	,'2397061398','mail@gym-paral-stavr.thess.sch.gr'),
'mail@gym-asprov.thess.sch.gr'		 		=> array('1904042','ΓΥΜΝΑΣΙΟ','Γ/Σ ΑΓ.ΓΕΩΡΓΙΟΥ (ΑΣΠΡΟΒΑΛΤΑ)'    	,'2397023923'),
'mail@gym-xyloup.thess.sch.gr'		 		=> array('1904052','ΓΥΜΝΑΣΙΟ','Γ/Σ ΛΑΧΑΝΑ (ΞΥΛΟΥΠΟΛΗ)'          	,'2394093208'),
'mail@gym-kolch.thess.sch.gr'		 		=> array('1904060','ΓΥΜΝΑΣΙΟ','3ο Γ/Σ ΛΑΓΚΑΔΑ (ΚΟΛΧΙΚΟ) (ΛΤ)'   	,'2394041251'),
'mail@gym-profit.thess.sch.gr'		 		=> array('1904070','ΓΥΜΝΑΣΙΟ','Γ/Σ ΕΓΝΑΤΙΑΣ (ΠΡΟΦΗΤΗΣ)'         	,'2393051260'),
'mail@gym-koufal.thess.sch.gr'		 		=> array('1906010','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΚΟΥΦΑΛΙΩΝ (ΚΟΥΦΑΛΙΑ)'     	,'2391051247'),
'mail@gym-chalk.thess.sch.gr'		 		=> array('1906020','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΧΑΛΚΗΔΟΝΑΣ (ΧΑΛΚΗΔΟΝΑ)'   	,'2391022389'),
'mail@gym-adendr.thess.sch.gr'		 		=> array('1906030','ΓΥΜΝΑΣΙΟ','Γ/Σ ΑΔΕΝΔΡΟΥ'						,'2391031494'),
'mail@gym-sochou.thess.sch.gr'		 		=> array('1907010','ΓΥΜΝΑΣΙΟ','Γ/Σ ΣΟΧΟΥ'                       	,'2395022250'),
'mail@gym-areth.thess.sch.gr'		 		=> array('1907030','ΓΥΜΝΑΣΙΟ','Γ/Σ ΑΡΕΘΟΥΣΑΣ'                   	,'2395041325'),
'mail@gym-drimou.thess.sch.gr'		 		=> array('1908010','ΓΥΜΝΑΣΙΟ','Γ/Σ ΜΥΓΔΟΝΙΑΣ (ΔΡΥΜΟΣ)'          	,'2394031302'),
'mail@gym-n-madyt.thess.sch.gr'		 		=> array('1909010','ΓΥΜΝΑΣΙΟ','Γ/Σ ΜΑΔΥΤΟΥ'                     	,'2397041207'),
'mail@gym-n-efkarp.thess.sch.gr'	 		=> array('1909016','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ Ν. ΕΥΚΑΡΠΙΑΣ'             	,'2310681695'),
'mail@gym-pefkon.thess.sch.gr'		 		=> array('1909018','ΓΥΜΝΑΣΙΟ','1o Γ/Σ ΠΕΥΚΩΝ'                   	,'2310674659'),
'mail@gym-n-mesimvr.thess.sch.gr'	 		=> array('1910010','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΑΓΙΟΥ ΑΘΑΝΑΣΙΟΥ (Ν.ΜΕΣΗΜΒΡΙΑ)'	,'2310713204'),
'mail@gym-proch.thess.sch.gr'		 		=> array('1911010','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΚΟΥΦΑΛΙΩΝ (ΠΡΟΧΩΜΑ)'      		,'2310711307'),
'mail@gym-chalastr.thess.sch.gr'	 		=> array('1913010','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΧΑΛΑΣΤΡΑΣ (ΧΑΛΑΣΤΡΑ)'             ,'2310792216'),
'mail@gym-kymin.thess.sch.gr'		 		=> array('1913020','ΓΥΜΝΑΣΙΟ','Γ/Σ ΑΞΙΟΥ (ΚΥΜΙΝΑ)'                      ,'2391041285'),
'mail@gym-oraiok.thess.sch.gr'		 		=> array('1914010','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΩΡΑΙΟΚΑΣΤΡΟΥ'                  	,'2310696060'),
'mail@2gym-oraiok.thess.sch.gr'		 		=> array('1914015','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΩΡΑΙΟΚΑΣΤΡΟΥ'                  	,'2310695106'),
'mail@3gym-oraiok.thess.sch.gr'		 		=> array('1914020','ΓΥΜΝΑΣΙΟ','3ο Γ/Σ ΩΡΑΙΟΚΑΣΤΡΟΥ'                   	,'2310699639'),
'mail@gym-peir-uom.thess.sch.gr'	 		=> array('1915018','ΓΥΜΝΑΣΙΟ','ΠΕΙΡΑΜΑΤΙΚΟ Γ/ΣΙΟ ΠΑΝ. ΜΑΚΕΔΟΝΙΑΣ'       ,'2310587282'),
'mail@gym-anatol.thess.sch.gr'		 		=> array('1915020','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΧΑΛΑΣΤΡΑΣ (ΑΝΑΤΟΛΙΚΟ)'            ,'2310718050'),
//'gymkallampel@sch.gr'				 		=> array('1915025','ΓΥΜΝΑΣΙΟ','ΚΑΛΛΙΤΕΧΝΙΚΟ Γ/ΣΙΟ ΑΜΠΕΛΟΚΗΠΩΝ (ΛΤ)' 	,'2310727341'),
'1915025@sch.gr'				 		=> array('1915025','ΓΥΜΝΑΣΙΟ','ΚΑΛΛΙΤΕΧΝΙΚΟ Γ/ΣΙΟ ΑΜΠΕΛΟΚΗΠΩΝ (ΛΤ)' 	,'2310727341'),
'mail@gym-gefyr.thess.sch.gr'		 		=> array('1916010','ΓΥΜΝΑΣΙΟ','Γ/Σ ΓΕΦΥΡΑΣ'                				,'2310715301'),
'mail@gym-vathyl.thess.sch.gr'		 		=> array('1916050','ΓΥΜΝΑΣΙΟ','Γ/Σ ΒΑΘΥΛΑΚΟΥ'                         	,'2310719719'),
'mail@gym-sindou.thess.sch.gr'		 		=> array('1918010','ΓΥΜΝΑΣΙΟ','1ο Γ/Σ ΕΧΕΔΩΡΟΥ (ΣΙΝΔΟΣ)'             	,'2310796601'),
'mail@gym-assir.thess.sch.gr'		 		=> array('1920010','ΓΥΜΝΑΣΙΟ','Γ/Σ ΑΣΣΗΡΟΥ'                           	,'2394061385'),
'mail@gym-neoch-pental.thess.sch.gr' 		=> array('1921010','ΓΥΜΝΑΣΙΟ','Γ/Σ ΚΑΛΛΙΘΕΑΣ (ΝΕΟΧΩΡΟΥΔΑ)'              ,'2310788051'),
'1935004@sch.gr'					 		=> array('1935004','ΓΥΜΝΑΣΙΟ','4ο Γ/Σ ΛΑΓΚΑΔΑ (ΛΑΓΥΝΑ) (ΛΤ)'            ,'2394073736'),
'mail@5gym-oraiok.thess.sch.gr'		 		=> array('1935005','ΓΥΜΝΑΣΙΟ','5ο Γ/Σ ΩΡΑΙΟΚΑΣΤΡΟΥ'                  	,'2394033371'),
'mail@2gym-efkarp.thess.sch.gr'		 		=> array('1935006','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ Ν. ΕΥΚΑΡΠΙΑΣ'                 	,'2310689173'),
'mail@2gym-pefkon.thess.sch.gr'		 		=> array('1901002','ΓΥΜΝΑΣΙΟ','2ο Γ/Σ ΠΕΥΚΩΝ'                           ,'2316071894'),
'mail@4gym-echedor.thess.sch.gr'	 		=> array('1935003','ΓΥΜΝΑΣΙΟ','4ο Γ/Σ ΕΧΕΔΩΡΟΥ (ΔΙΑΒΑΤΑ)'               ,'2316009407'),
'mail@4gym-oraiok.thess.sch.gr'	 			=> array('1901000','ΓΥΜΝΑΣΙΟ','4ο Γ/Σ ΩΡΑΙΟΚΑΣΤΡΟΥ'                     ,'2311827048'),
'mail@1epal-stavr.thess.sch.gr'		 		=> array('1940010','ΕΠΑΛ','1ο ΕΠΑΛ ΣΤΑΥΡΟΥ'                             ,'2397065660'),
'mail@1epal-neapol.thess.sch.gr'	 		=> array('1940245','ΕΠΑΛ','1ο ΕΠΑΛ ΝΕΑΠΟΛΗΣ'                            ,'2310658619'),
'mail@epal-ag-athan.thess.sch.gr' 			=> array('1940246','ΕΠΑΛ','ΕΠΑΛ ΑΓΙΟΥ ΑΘΑΝΑΣΙΟΥ'                        ,'2311236456'),
'mail@1epal-chalastr.thess.sch.gr'	 		=> array('1940247','ΕΠΑΛ','ΕΠΑΛ ΧΑΛΑΣΤΡΑΣ'                              ,'2310792698'),
'mail@1epal-stavroup.thess.sch.gr'	 		=> array('1940250','ΕΠΑΛ','1ο ΕΠΑΛ ΣΤΑΥΡΟΥΠΟΛΗΣ'                        ,'2310653039'),
'mail@epal-esp-stavroup.thess.sch.gr' 		=> array('1940260','ΕΠΑΛ','ΕΣΠΕΡΙΝΟ ΕΠΑΛ ΣΤΑΥΡΟΥΠΟΛΗΣ'                  ,'2310587631'),
'mail@1epal-lagkad.thess.sch.gr'	 		=> array('1940360','ΕΠΑΛ','1ο ΕΠΑΛ ΛΑΓΚΑΔΑ'                             ,'2394024240'),
'mail@1epal-koufal.thess.sch.gr'	 		=> array('1940370','ΕΠΑΛ','1ο ΕΠΑΛ ΚΟΥΦΑΛΙΩΝ'                           ,'2391051107'),
'mail@2epal-stavroup.thess.sch.gr'	 		=> array('1940390','ΕΠΑΛ','2ο ΕΠΑΛ ΣΤΑΥΡΟΥΠΟΛΗΣ'                        ,'2310641672'),
'mail@1epal-sykeon.thess.sch.gr'	 		=> array('1940391','ΕΠΑΛ','1ο ΕΠΑΛ ΣΥΚΕΩΝ'                              ,'2310624751'),
'mail@1epal-evosm.thess.sch.gr'		 		=> array('1940400','ΕΠΑΛ','1ο ΕΠΑΛ ΕΥΟΣΜΟΥ'                             ,'2310768012'),
'mail@2epal-evosm.thess.sch.gr'		 		=> array('1940405','ΕΠΑΛ','2ο ΕΠΑΛ ΕΥΟΣΜΟΥ'                             ,'2310707071'),
'mail@eeeek-kordel.thess.sch.gr'	 		=> array('1941005','ΓΥΜΝΑΣΙΟ','ΕΕΕΕΚ ΕΛΕΥΘΕΡΙΟΥ-ΚΟΡΔΕΛΙΟΥ'              ,'2310559564'),
'mail@eeeek-psich.thess.sch.gr'		 		=> array('1941006','ΓΥΜΝΑΣΙΟ','ΕΕΕΕΚ ΙΝΑΑ ΠΕΥΚΩΝ'                       ,'2310587086'),
'mail@eeeek-ag-athan.thess.sch.gr'	 		=> array('1925000','ΓΥΜΝΑΣΙΟ','ΕΕΕΕΚ ΑΓΙΟΥ ΑΘΑΝΑΣΙΟΥ'                   ,'2310578010'),
'mail@lyk-ag-georgiou.thess.sch.gr' 		=> array('1944001','ΛΥΚΕΙΟ','ΓΕΛ ΑΓ.ΓΕΩΡΓΙΟΥ (ΑΣΠΡΟΒΑΛΤΑ)'              ,'2397022880'),
'mail@4lyk-evosm.thess.sch.gr'		 		=> array('1944002','ΛΥΚΕΙΟ','4ο ΓΕΛ ΕΥΟΣΜΟΥ'                            ,'2310709535'),
'mail@lyk-efkarp.thess.sch.gr'		 		=> array('1944005','ΛΥΚΕΙΟ','ΓΕΛ Ν. ΕΥΚΑΡΠΙΑΣ'                			,'2310685630'),
'mail@4epal-esp-evosm.thess.sch.gr' 		=> array('1950405','ΕΠΑΛ','ΕΣΠΕΡΙΝΟ ΕΠΑΛ ΕΥΟΣΜΟΥ'                       ,'2310758985'),
'mail@1epal-ampel.thess.sch.gr'		 		=> array('1950410','ΕΠΑΛ','1ο ΕΠΑΛ ΑΜΠΕΛΟΚΗΠΩΝ'                         ,'2310729160'),
'mail@1epal-polichn.thess.sch.gr'	 		=> array('1950415','ΕΠΑΛ','1ο ΕΠΑΛ ΠΟΛΙΧΝΗΣ'                            ,'2310587104'),
'mail@1epal-sindou.thess.sch.gr'	 		=> array('1950418','ΕΠΑΛ','1ο ΕΠΑΛ ΣΙΝΔΟΥ'                              ,'2310798422'),
'mail@1epal-kordel.thess.sch.gr'	 		=> array('1950420','ΕΠΑΛ','1ο ΕΠΑΛ ΕΛΕΥΘΕΡΙΟΥ-ΚΟΡΔΕΛΙΟΥ'                ,'2310763668'),
'mail@2lyk-stavroup.thess.sch.gr'	 		=> array('1951002','ΛΥΚΕΙΟ','2ο ΓΕΛ ΣΤΑΥΡΟΥΠΟΛΗΣ'                       ,'2310606007'),
'1951006@sch.gr'	 						=> array('1951006','ΕΠΑΛ','ΕΝΕΕΓΥΛ ΙΝΑΑ ΠΕΥΚΩΝ'         		        ,'2310676280','mail@tee-eaav-peykon.thess.sch.gr'),
'mail@2lyk-neapol.thess.sch.gr'		 		=> array('1951009','ΛΥΚΕΙΟ','2ο ΓΕΛ ΝΕΑΠΟΛΗΣ'                           ,'2310607521'),
'mail@2lyk-menem.thess.sch.gr'		 		=> array('1951041','ΛΥΚΕΙΟ','2ο ΓΕΛ ΜΕΝΕΜΕΝΗΣ'                          ,'2310765704'),
'mail@1lyk-stavroup.thess.sch.gr'	 		=> array('1951060','ΛΥΚΕΙΟ','1ο ΓΕΛ ΣΤΑΥΡΟΥΠΟΛΗΣ'                       ,'2310656387'),
'mail@2lyk-polichn.thess.sch.gr'	 		=> array('1951061','ΛΥΚΕΙΟ','2ο ΓΕΛ ΠΟΛΙΧΝΗΣ'                           ,'2310652566'),
'mail@1lyk-neapol.thess.sch.gr'		 		=> array('1951131','ΛΥΚΕΙΟ','1ο ΓΕΛ ΝΕΑΠΟΛΗΣ'                           ,'2310623926'),
'mail@1lyk-menem.thess.sch.gr'		 		=> array('1951185','ΛΥΚΕΙΟ','1ο ΓΕΛ ΜΕΝΕΜΕΝΗΣ'                          ,'2310748430'),
'mail@lyk-ag-athan.thess.sch.gr'	 		=> array('1951220','ΛΥΚΕΙΟ','1ο ΓΕΛ ΑΓΙΟΥ ΑΘΑΝΑΣΙΟΥ'                    ,'2310701034'),
'mail@lyk-diavat.thess.sch.gr'		 		=> array('1951222','ΛΥΚΕΙΟ','2ο ΓΕΛ ΕΧΕΔΩΡΟΥ (ΔΙΑΒΑΤΑ)'                 ,'2310781270'),
'mail@lyk-kaloch.thess.sch.gr'		 		=> array('1951225','ΛΥΚΕΙΟ','3ο ΓΕΛ ΕΧΕΔΩΡΟΥ (ΚΑΛΟΧΩΡΙ)'                ,'2310755517'),
'mail@1lyk-el-kordel.thess.sch.gr'	 		=> array('1951227','ΛΥΚΕΙΟ','1ο ΓΕΛ ΕΛΕΥΘΕΡΙΟΥ-ΚΟΡΔΕΛΙΟΥ'               ,'2310765655'),
'mail@2lyk-el-kordel.thess.sch.gr'	 		=> array('1951228','ΛΥΚΕΙΟ','2ο ΓΕΛ ΕΛΕΥΘΕΡΙΟΥ-ΚΟΡΔΕΛΙΟΥ'               ,'2310774948'),
'mail@lyk-diap-v-thess.thess.sch.gr' 		=> array('1951235','ΛΥΚΕΙΟ','ΓΕΛ ΔΙΑΠΟΛ ΕΚΠ ΕΥΟΣΜΟΥ'                   	,'2311236428'),
'mail@lyk-esp-ampel.thess.sch.gr'			=> array('1951255','ΛΥΚΕΙΟ','ΕΣΠΕΡ ΓΕΛ ΑΜΠΕΛΟΚ'                     	,'2310748552'),
'mail@1lyk-sykeon.thess.sch.gr'		 		=> array('1951256','ΛΥΚΕΙΟ','1ο ΓΕΛ ΣΥΚΕΩΝ'                             ,'2310211522'),
'mail@2lyk-sykeon.thess.sch.gr'		 		=> array('1951257','ΛΥΚΕΙΟ','2ο ΓΕΛ ΣΥΚΕΩΝ'                             ,'2310202091'),
'mail@1lyk-ampel.thess.sch.gr'		 		=> array('1951260','ΛΥΚΕΙΟ','1ο ΓΕΛ ΑΜΠΕΛΟΚΗΠΩΝ'                        ,'2310732064'),
'mail@2lyk-ampel.thess.sch.gr'		 		=> array('1951263','ΛΥΚΕΙΟ','2ο ΓΕΛ ΑΜΠΕΛΟΚΗΠΩΝ'                        ,'2310735720'),
'mail@3lyk-ampel.thess.sch.gr'		 		=> array('1951264','ΛΥΚΕΙΟ','3ο ΓΕΛ ΑΜΠΕΛΟΚΗΠΩΝ'                        ,'2310731524'),
'mail@1lyk-evosm.thess.sch.gr'		 		=> array('1951266','ΛΥΚΕΙΟ','1ο ΓΕΛ ΕΥΟΣΜΟΥ'                            ,'2310768147'),
'mail@3lyk-stavroup.thess.sch.gr'	 		=> array('1951267','ΛΥΚΕΙΟ','3ο ΓΕΛ ΣΤΑΥΡΟΥΠΟΛΗΣ'                       ,'2310602637'),
'mail@2lyk-evosm.thess.sch.gr'		 		=> array('1951268','ΛΥΚΕΙΟ','2ο ΓΕΛ ΕΥΟΣΜΟΥ'                            ,'2310642595'),
'mail@1lyk-polichn.thess.sch.gr'	 		=> array('1951270','ΛΥΚΕΙΟ','1ο ΓΕΛ ΠΟΛΙΧΝΗΣ'                           ,'2310651442'),
'mail@4lyk-stavroup.thess.sch.gr'	 		=> array('1951272','ΛΥΚΕΙΟ','4ο ΓΕΛ ΣΤΑΥΡΟΥΠΟΛΗΣ'                       ,'2310659540'),
'mail@3lyk-polichn.thess.sch.gr'	 		=> array('1951273','ΛΥΚΕΙΟ','3ο ΓΕΛ ΠΟΛΙΧΝΗΣ'                           ,'2310621264'),
'mail@lyk-zagkl.thess.sch.gr'		 		=> array('1953010','ΛΥΚΕΙΟ','ΓΕΛ ΚΑΛΙΝΔΟΙΩΝ (ΖΑΓΚΛΙΒΕΡΙ)'               ,'2393031074'),
'mail@1lyk-lagkad.thess.sch.gr'		 		=> array('1954010','ΛΥΚΕΙΟ','ΓΕΛ ΛΑΓΚΑΔΑ'                               ,'2394022841'),
'mail@lyk-lagkad.thess.sch.gr'		 		=> array('1954020','ΛΥΚΕΙΟ','ΓΕΛ ΚΟΡΩΝΕΙΑΣ (ΛΑΓΚΑΔΙΚΙΑ)'                ,'2393022215'),
'mail@lyk-paral-stavr.thess.sch.gr' 		=> array('1954090','ΛΥΚΕΙΟ','ΓΕΛ ΡΕΝΤΙΝΑΣ (ΠΑΡ.ΣΤΑΥΡΟΥ)'                ,'2397061111'),
'mail@lyk-koufal.thess.sch.gr'		 		=> array('1956010','ΛΥΚΕΙΟ','1ο ΓΕΛ ΚΟΥΦΑΛΙΩΝ'                          ,'2391051797'),
'mail@lyk-n-chalk.thess.sch.gr'		 		=> array('1956020','ΛΥΚΕΙΟ','1ο ΓΕΛ ΧΑΛΚΗΔΟΝΑΣ (ΧΑΛΚΗΔΟΝΑ)'             ,'2391022127'),
'mail@lyk-sochou.thess.sch.gr'		 		=> array('1957010','ΛΥΚΕΙΟ','ΓΕΛ ΣΟΧΟΥ'                                 ,'2311236536'),
'mail@lyk-drymou.thess.sch.gr'		 		=> array('1958010','ΛΥΚΕΙΟ','ΓΕΛ ΜΥΓΔΟΝΙΑΣ (ΔΡΥΜΟΣ)'                    ,'2394031075'),
'mail@lyk-n-madyt.thess.sch.gr'		 		=> array('1959010','ΛΥΚΕΙΟ','ΗΜΕΡΗΣΙΟ ΓΕΝΙΚΟ ΛΥΚΕΙΟ ΝΕΑΣ ΜΑΔΥΤΟΥ ΘΕΣΣΑΛΟΝΙΚΗΣ','2397041418'),
'mail@lyk-pefkon.thess.sch.gr'		 		=> array('1959018','ΛΥΚΕΙΟ','ΓΕΛ ΠΕΥΚΩΝ'                                ,'2310672569'),
'mail@lyk-n-mesimvr.thess.sch.gr'	 		=> array('1960010','ΛΥΚΕΙΟ','2ο ΓΕΛ ΑΓΙΟΥ ΑΘΑΝΑΣΙΟΥ (ΜΕΣΗΜΒΡΙΑ)'        ,'2310713257'),
'mail@lyk-proch.thess.sch.gr'		 		=> array('1961010','ΛΥΚΕΙΟ','2ο ΓΕΛ ΚΟΥΦΑΛΙΩΝ (ΠΡΟΧΩΜΑ)'                ,'2310711412'),
'mail@lyk-kallith.thess.sch.gr'		 		=> array('1961015','ΛΥΚΕΙΟ','ΓΕΛ ΚΑΛΛΙΘΕΑΣ (ΝΕΟΧΩΡΟΥΔΑ)'                ,'2310787450'),
'mail@lyk-chalastr.thess.sch.gr'	 		=> array('1963010','ΛΥΚΕΙΟ','ΓΕΛ ΧΑΛΑΣΤΡΑΣ'                             ,'2310792657'),
'mail@lyk-sindou.thess.sch.gr'		 		=> array('1963020','ΛΥΚΕΙΟ','1ο ΓΕΛ ΕΧΕΔΩΡΟΥ (ΣΙΝΔΟΣ)'                  ,'2310799912'),
'mail@lyk-kymin.thess.sch.gr'		 		=> array('1963025','ΛΥΚΕΙΟ','ΓΕΛ ΑΞΙΟΥ (ΚΥΜΙΝΑ)'                        ,'2391042690'),
'mail@lyk-oraiok.thess.sch.gr'		 		=> array('1964010','ΛΥΚΕΙΟ','1ο ΓΕΛ ΩΡΑΙΟΚΑΣΤΡΟΥ'                       ,'2310696781'),
'mail@2lyk-oraiok.thess.sch.gr'		 		=> array('1964015','ΛΥΚΕΙΟ','2ο ΓΕΛ ΩΡΑΙΟΚΑΣΤΡΟΥ'                       ,'2310689637'),
'mail@lyk-peir-uom.thess.sch.gr'	 		=> array('1965018','ΛΥΚΕΙΟ','ΠΕΙΡΑΜΑΤΙΚΟ ΓΕΛ ΠΑΝ. ΜΑΚΕΔΟΝΙΑΣ'           ,'2311236443'),
'mail@lyk-assir.thess.sch.gr'		 		=> array('1970010','ΛΥΚΕΙΟ','ΓΕΛ ΑΣΣΗΡΟΥ'                               ,'2394061956'),
'mail@3lyk-evosm.thess.sch.gr'		 		=> array('1990400','ΛΥΚΕΙΟ','3ο ΓΕΛ ΕΥΟΣΜΟΥ'                            ,'2310587691'),
'mail@lyk-adendr.thess.sch.gr'		 		=> array('1956030','ΛΥΚΕΙΟ','ΓΕΛ ΑΔΕΝΔΡΟΥ'          					,'2391032025'),
'mail@1sek-neapol.thess.sch.gr'		 		=> array('SEK090','ΕΚ' ,'1ο ΕΚ ΝΕΑΠΟΛΗΣ'								,'2310655099'),
'mail@ek-evosm.thess.sch.gr'		 		=> array('SEK089','ΕΚ' ,'ΕΚ ΕΥΟΣΜΟΥ'									,'2310770354'),
'mail@sek-lagkad.thess.sch.gr'		 		=> array('SEK045','ΕΚ' ,'ΕΚ ΛΑΓΚΑΔΑ'									,'2394020135'),
'mail@sek-sindou.thess.sch.gr'		 		=> array('SEK228','ΕΚ' ,'ΕΚ ΣΙΝΔΟΥ'										,'2310569271'),
'mail@1sek-stavroup.thess.sch.gr'	 		=> array('SEK091','ΕΚ' ,'ΕΚ ΣΤΑΥΡΟΥΠΟΛΗΣ'								,'2310656146'),
'mail@1sek-koufal.thess.sch.gr'		 		=> array('SEK023','ΕΚ' ,'ΕΚ ΚΟΥΦΑΛΙΩΝ'									,'2391054535'),
'mail@gym-delas.thess.sch.gr'  				=> array('1991913','ΓΥΜΝΑΣΙΟ','ΓΥΜΝΑΣΙΟ ΔΕΛΑΣΑΛ','2310673252','gymnasio@delasalle.gr'),
'mail@lyk-delas.thess.sch.gr'  				=> array('1990913','ΛΥΚΕΙΟ','ΛΥΚΕΙΟ ΔΕΛΑΣΑΛ','2310673252','lykeio@deslasale.gr'),
'mail@gym-frygan.thess.sch.gr'  			=> array('1991915','ΓΥΜΝΑΣΙΟ','ΓΥΜΝΑΣΙΟ ΦΡΥΓΑΝΙΩΤΗ','2310692940','info@fryganiotis.gr'),
'mail@lyk-frygan.thess.sch.gr'  			=> array('1990915','ΛΥΚΕΙΟ','ΛΥΚΕΙΟ ΦΡΥΓΑΝΙΩΤΗ','2310692941','info@fryganiotis.gr')

);


session_start();
$_SESSION["loggedIn"] = false;

// Load the settings from the central config file
require_once 'casconfig.php';
// Load the CAS lib
require_once $phpcas_path . '/CAS.php';

// Enable debugging
phpCAS::setDebug();

// Initialize phpCAS
phpCAS::client(SAML_VERSION_1_1, $cas_host, $cas_port, $cas_context);

// For production use set the CA certificate that is the issuer of the cert
// on the CAS server and uncomment the line below
// phpCAS::setCasServerCACert($cas_server_ca_cert_path);

// For quick testing you can disable SSL validation of the CAS server.
// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
// phpCAS::setNoCasServerValidation();
phpCAS::setCasServerCACert($cas_server_ca_cert_path);

// force CAS authentication
phpCAS::forceAuthentication();

// at this step, the user has been authenticated by the CAS server
// and the user's login name can be read with phpCAS::getUser().

// logout if desired
if (isset($_REQUEST['logout'])) {
	phpCAS::logoutWithRedirectService('https://srv-dide-v.thess.sch.gr/ekdromes'); //	//phpCAS::logout();
	session_destroy();die();//-just for safety
}

//-ini_set('log_errors',TRUE);
//-ini_set('error_log','./errors.log'); //keep local errors file

// if we are here, we are logged in.
//$userid= phpCAS::getUser();
//$userattr= phpCAS::getAttributes();
//Array ( [cn;lang-en] => ...onoma... 
//[uid] => ...username...
//[employeenumber] => ...afm... 
//[mail] => ...@sch.gr 
//[businesscategory] => ΠΡΟΣΩΠΙΚΟ 
//[cn] => ...name-ellinika...

/*
if (phpCAS::hasAttribute('mail'))
{
	$userattr= phpCAS::getAttribute('mail');
	if (!is_array($userattr)) $usermail= $userattr;
}
*/
//slower version:
//$userattr= phpCAS::getAttributes();
//if (isset($userattr['mail']) && !is_array($userattr['mail'])) $usermail= $userattr['mail'];
//-


if (!phpCAS::hasAttribute('mail'))
{
	echo '<html><head><title>Σφάλμα</title></head><body>Σφάλμα. Δεν βρέθηκαν απαραίτητα δεδομένα (mail)<br>
	<a href="login.php?logout=1">Έξοδος</a>
	</body></html>';
	die();
}
if (!phpCAS::hasAttribute('uid'))
{
	echo '<html><head><title>Σφάλμα</title></head><body>Σφάλμα. Δεν βρέθηκαν απαραίτητα δεδομένα (UID)<br>
	<a href="login.php?logout=1">Έξοδος</a>
	</body></html>';
	die();
}
$userid= phpCAS::getAttribute('uid');
$usermail= phpCAS::getAttribute('mail');

if (isset($schoollist["$usermail"]))
{
    $_SESSION["loggedIn"] = true;
	$_SESSION["currentuser"] = $userid;
	$_SESSION["adminuser"] = false;
	$_SESSION['kodikos_sxoleiou']= $schoollist["$usermail"][0];
	$_SESSION["typos_sxoleiou"] = $schoollist["$usermail"][1];
	$_SESSION["displayname"] = $schoollist["$usermail"][2];
	if (isset($schoollist["$usermail"][3]) ) $_SESSION["phonenumbers"] = $schoollist["$usermail"][3];
	else  $_SESSION["phonenumbers"] =' ';
		
	if (isset($schoollist["$usermail"][4]) ) $_SESSION["usermail"] = $schoollist["$usermail"][4];
	else $_SESSION["usermail"] = $usermail;

	require('db.php');//will set current sx etos

	header("Location:mainindex.php");
}
else if (in_array($usermail, $adminlist, true))
{
    $_SESSION["loggedIn"] = true;
	$_SESSION["currentuser"] = $userid;
	$_SESSION["adminuser"] = true;
	//$_SESSION["displayname"] = 'Προσωπικό ΔΔΕ - Δοκιμαστικό Σχολείο';
	//$_SESSION['kodikos_sxoleiou']= '9999999';
	$_SESSION['displayname']= 'Ειδική επιλογή:Προβολή όλων';
	$_SESSION['kodikos_sxoleiou']= '-0-';

	$_SESSION["typos_sxoleiou"] = '';
	$_SESSION["phonenumbers"] = '';
	$_SESSION["usermail"] = '';//this may change based on selected school
	
	require('db.php');//will set current sx etos
	
	header("Location:mainindex.php");
}
else
{
	echo "<html><head><title>Σφάλμα</title></head><body>Σφάλμα. Δεν αναγνωρίστηκε το όνομα χρήστη <b>$userid</b> με mail: <b>$usermail</b>. Επικοινωνήστε με το Τμήμα Πληροφορικής της ΔΔΕ.<br>
	<a href='login.php?logout=1'>Έξοδος</a>
	</body></html>";
}
?>
