<?
error_reporting(E_ALL);
 ini_set("display_errors", 1);

include_once('lib/phpInclude.php');
if ($email != '' && $firstname!='' && $lastname != '') {

$allowedFiles = array();
$allowedFiles[0] = "image/pjpeg";
$allowedFiles[1] = "image/jpeg";
$allowedFiles[2] = "image/jpg";
$allowedFiles[3] = "image/png";

if ($_FILES['myfile'] && $_FILES['myfile']['size'] != 0) {

	if (in_array($_FILES['myfile']['type'],$allowedFiles)) {
				$eventFolder = phpConfig::instance()->getBasePath()."/upload";
#				$filename = replaceChars(utf8_decode($_FILES['datei']['name']));

				$filename = time().uniqid().".jpg";
				if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
					if(!copy($_FILES['myfile']['tmp_name'], $eventFolder."/large/".$filename)) {
						$fehler = "Datei zu groß.";
					} else {
					
          
						$datei = $filename;
					}
				}

		} else {
			$fehler = "Dateiformat nicht gültig!";
			include_once("formular.php");
			exit;
		}
	} else {

	$fehler = "Bitte laden Sie ein Bild hoch!";
	include_once("formular.php");
	exit;
  }
  $created = date('Y-m-d H:i:s');


/* MAIL START */
    $body = '
<html>
<head>
    <title>##BETREFF##</title>
</head>
<style>
body {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 14px;
}
</style>
<body>
<img src="http://www.constructa.com/templates/constructa-resources/images/logo/logo_constructa.jpg" width="227" heigth="63">
<br><br>Sehr geehrte(r) '.$firstname.' '.$lastname.', <br><br>


vielen Dank für die Teilnahme an unserem Gewinnspiel. <br>
Sie werden von uns benachrichtigt, falls Sie zu den glücklichen Gewinnern gehören.
<br>
<br>

Herzliche Grüße <br>
Ihr Constructa-Team

<br><br><br>



<strong>Constructa-Neff Vertriebs-GmbH</strong> <br>
Carl-Wery-Str. 34 <br>
D – 81739 München<br><br>

Telefon: +49 89 4590-05<br>
Email: info@constructa-einbaugeraete.de<br><br>

Geschäftsführung:<br>
Stefan Kinkel, Volker Klodwig<br><br>

Sitz der Gesellschaft:<br>
München<br>
Amtsgericht München<br>
HRB 89689<br><br>

UST-IdNr.:<br>
DE 129274243<br>


</body>
</html>
';



	$header = "MIME-Version: 1.0\r\n";
	$header.= "Content-type: text/html; charset=UTF-8\r\n";
	$header .= "From: info@constructa-einbaugeraete.de\r\n";
  $betreff = 'Constructa - Einfach tierisch Gewinnspiel';
  
	if(mail($email, $betreff, $body,$header)){
#         return true;
    }else{
         echo "Es ist ein Fehler beim senden der Email aufgetreten. Bitte probieren Sie es noch einmal.";
         exit;
    }

/* MAIL END */
$sqlquery = "INSERT INTO user_rezepte (
						vorname,
						nachname,
						email,
						telefon,
						bild,
						title,
						liste,
						portionen,
						zubereitungszeit,
						backzeit,
						schritte,
            teilnahme,
            newsletter,
            von,
            created
					) VALUES (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?)";
	$created = date('Y:m:d H:i:s');
	$con = $phpDBObject->connect();
	$stmt2 = $con->prepare($sqlquery);
		$stmt2->bind_param('sssssssssssiiss',$phpDBObject->escapeChar($firstname),
								$phpDBObject->escapeChar($lastname),
								$phpDBObject->escapeChar($email),
								$phpDBObject->escapeChar($phone),
								$phpDBObject->escapeChar($datei),
								$phpDBObject->escapeChar($title),
								$phpDBObject->escapeChar($form_zutatenliste),
								$phpDBObject->escapeChar($form_zutaten_anzahl),
								$phpDBObject->escapeChar($form_zutaten_zubereitungszeit),
								$phpDBObject->escapeChar($form_zutaten_backzeit),
								$phpDBObject->escapeChar($form_zubereitungsschritte),
								$phpDBObject->escapeChar($form_agb),
								$phpDBObject->escapeChar($form_newsletter),
								$phpDBObject->escapeChar($from),
								$phpDBObject->escapeChar($created));
		$stmt2->execute();
		$id = $con->insert_id;
		$stmt2->free_result();
		$phpDBObject->disconnect();










	header("Location: danke.html");
	exit;
} else {
	$fehler = "Bitte füllen Sie alle Pflichtfelder aus!";
	include_once("formular.php");
	exit;
}
?>