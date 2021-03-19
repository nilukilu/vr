<?php
	$myname = "Siim Seppi";
	$currenttime = date("d.m.Y H:i:s");
	$timehtml = "\n <p>Lehe avamise hetkel oli: " .$currenttime .".</p> \n";
	$semesterbegin = new DateTime("2021-1-25");
	$semesterend = new DateTime("2021-6-30");
	$semesterduration = $semesterbegin->diff($semesterend);
	$semesterdurationdays = $semesterduration->format("%r%a");
	$semesterdurhtml = "\n <p>2021 kevadsemestri kestus on " .$semesterdurationdays ." päeva.</p> \n";
	$today = new DateTime("now");
	$fromsemesterbegin = $semesterbegin->diff($today);
	$fromsemesterbegindays = $fromsemesterbegin->format("%r%a");
	
    if($fromsemesterbegindays <= $semesterdurationdays && $fromsemesterbegindays >=0) {
        $semesterprogress = "\n"  .'<p>Semester edeneb: <meter min="0" max="' .$semesterdurationdays 
        .'" value="' .$fromsemesterbegindays .'"></meter></p>' ."\n";           
        }    
        else { 
            if ($fromsemesterbegindays <0) 
            {$semesterprogress = "\n <p> Semester ei ole alanud. </p>"; }   
            else {
            $semesterprogress = "\n <p> Semester on lõppenud. </p>";}           
        }
	$weekday_nr=date('w');                                                     
    $day_names=['pühapäev','esmaspäev','teisipäev','kolmapäev','neljapäev'
    ,'reede','laupäev'];                                                      
                                                                                
    $todaysweekdayhtml="<p> Täna on ". $day_names[$weekday_nr].".</p>";
	//loeme piltide kataloogi sisu
	$picsdir = "./pics/";
	$allfiles = array_slice(scandir($picsdir), 2);
	//echo $allfiles[5];
	//var_dump($allfiles);
	$allowedphototypes = ["image/jpeg", "image/png"];
	$picfiles = [];
	
	//for($x = 0; $x <10;$++){
		//tegevus
	//}
	foreach($allfiles as $file){
		$fileinfo = getimagesize($picsdir .$file);
		//var_dump($fileinfo);
		if(isset($fileinfo["mime"])){
			if(in_array($fileinfo["mime"], $allowedphototypes)){
				array_push($picfiles, $file);
			}
		}
	}
	
	//$photocount = count($picfiles);
	//$photonum = mt_rand(0, $photocount-1);
	$randomphoto = array_rand($picfiles,3);
?>
<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title>Veebirakendused ja nende loomine 2021</title>
</head>
<body>
	<h1>
	<?php
		echo $myname;
	?>
	</h1>
	<p>See leht on valminud õppetöö raames!</p>
	<?php
		echo $timehtml;
		echo $semesterdurhtml;
		echo $semesterprogress;
		echo $todaysweekdayhtml;
	?>
	<img src="<?php echo $picsdir .$picfiles[$randomphoto[0]]; ?>" alt="vaade Haapsalus">
	<img src="<?php echo $picsdir .$picfiles[$randomphoto[1]]; ?>" alt="vaade Haapsalus">
	<img src="<?php echo $picsdir .$picfiles[$randomphoto[2]]; ?>" alt="vaade Haapsalus">
</body>
</html>
