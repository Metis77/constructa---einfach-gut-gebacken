    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Constructa - Rezepte - Gewinnspiel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css"  media="all" href="http://www.constructa.com/templates/constructa-resources/styles/layout.css" />
        <link rel="stylesheet" type="text/css"  media="all" href="http://www.constructa.com/templates/constructa-resources/styles/normalize.css" />
        <link rel="stylesheet" type="text/css"  media="all" href="http://www.constructa.com/templates/constructa-resources/styles/fonts/font.css" />
        <link rel="stylesheet" type="text/css"  media="all" href="http://www.constructa.com/templates/constructa-resources/styles/layout.css" />
        <link rel="stylesheet" type="text/css"  media="all" href="http://www.constructa.com/templates/constructa-resources/styles/main.css" />
        <link rel="stylesheet" type="text/css"  media="all" href="iframe.css" />
        

        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/localization/messages_de.js"></script>
        <script src="js/form.js"></script>
    </head>
    
    <body>


        <section role="formContainer" class="contactForm" >
            <h1>BACKREZEPT &amp; TEILNEHMERDATEN HOCHLADEN</h1>
            <br>
<? if (isset($fehler)) {
echo $fehler;
}
?>          


            <form class="gewinnspiel" method="post" action="insert.php" novalidate enctype="multipart/form-data">
            <input type="hidden" name="from" value="<?=$from?>">
                <label for="form_file">
                    <h2>Foto</h2>
                    Laden Sie ein Foto mit maximal 2 MB im Format .jpg oder .png hoch. <br> 
                    Wenn Sie Ihr kreiertes Rezept nicht selbst fotografiert haben, vergewissern Sie sich, dass Sie das Recht haben das Bild für dieses Gewinnspiel zu nutzen.
                </label>
                <div class="row mb30">
                    <div class="col-5">
                        <label class="form_file_preview_outer" for="form_file">
                            <div class="form_file_preview"></div>
                        </label>
                    </div>
                    <div class="col-5">
                        <div class="fileUpload">
                            <span class="btn">DATEI AUSWÄHLEN</span>
                            <input type="file" class="upload" id="form_file" name="myfile" required>
                        </div>
                        <!-- <input type="file" class="custom-file-input" id="form_file"> -->
                    </div>
                </div>
                
                

                <label for="form_title">
                    <h2>Backrezept Titel</h2>
                    Wählen Sie einen aussagekräftigen Titel für Ihr Backrezept, der Ihr Rezept kurz und knackig beschreibt. Sie haben maximal 100 Zeichen.
                </label>
                <input type="text" name="title" id="form_title" required>


                <label for="form_zutatenliste">
                    <h2>Zutatenliste</h2>
                    Listen Sie hier alle Zutaten auf. Bsp.: 200 g Zucker
                </label>
                <textarea name="form_zutatenliste" id="form_zutatenliste" cols="30" rows="10" required></textarea>


                <div class="row">
                    <div class="col-4">
                        <label for="form_zutaten_anzahl">Anzahl der Portionen</label>
                        <input type="text" name="form_zutaten_anzahl" id="form_zutaten_anzahl" required>
                    </div>
                    <div class="col-4">
                        <label for="form_zutaten_zubereitungszeit">Zubereitungszeit</label>
                        <input type="text" name="form_zutaten_zubereitungszeit" id="form_zutaten_zubereitungszeit" required>
                    </div>
                    <div class="col-4">
                        <label for="form_zutaten_backzeit">Backzeit</label>
                        <input type="text" name="form_zutaten_backzeit" id="form_zutaten_backzeit" required>
                    </div>
                </div>
                

                <label for="form_zubereitungsschritte">
                    <h2>Zubereitungsschritte</h2>
                    Bitte schreiben Sie hier alle Zubereitungsschritte für Ihr Rezept auf.
                </label>
                <textarea name="form_zubereitungsschritte" id="form_zubereitungsschritte" cols="30" rows="10" required></textarea>

                

                <h2>Teilnehmer/in</h2>
                <div class="row">
                    <div class="col-6">
                        <label for="form_firstname">Vorname</label>
                        <input class="mb10" type="text" name="firstname" id="form_firstname" required>
                    </div>
                    <div class="col-6">
                        <label for="form_lastname">Nachname</label>
                        <input class="mb10" type="text" name="lastname" id="form_lastname" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="form_email">E-Mail</label>
                        <input type="email" name="email" id="form_email" required>
                    </div>
                    <div class="col-6">
                        <label for="form_phone">Telefon</label>
                        <input type="text" name="phone" id="form_phone" required>
                    </div>
                </div>

                <label class="checkbox">
                    <input type="checkbox" name="form_agb" id="form_agb" required value="1">
                    Ich akzeptiere die <a class="" href="teilnahmebedingungen.html" target="_blank">Teilnahmebedingungen</a> am Gewinnspiel. 
                </label>

                <div class="mb10 ml">
                    <a class="" href="http://www.constructa.com/Files/Constructa/De/de/Downloads/Constructa_Gewinnspiel_Einfach-tierisch_Teilnahmebedingungen_2015.pdf" target="_blank">Teilnahmebedingungen herunterladen</a>
                </div>

                <p class="mb10 ml"><b>Die wichtigsten Bedingungen in Kürze:</b> <br>
                Mit der Teilnahme wird das inhaltlich, zeitlich und räumlich uneingeschränkte Recht eingeräumt, das eingesandte Rezept sowie ggf. zusätzlich erstellte Fotoaufnahmen umfassend durch die Constructa-Neff Vertriebs GmbH in allen Medienkanälen zu nutzen. <br>
                Der Teilnehmer erklärt, dass gegebenenfalls beteiligte Dritte, insbesondere im Zusammenhang mit erstellten Fotoaufnahmen, der vorstehend beschriebenen Nutzung zugestimmt haben.</p>
                
                <label class="checkbox">
                    <input type="checkbox" name="form_newsletter" id="form_newsletter" value="1">
                    <b>Ich möchte den Newsletter „Backen und vieles mehr“ von Constructa erhalten </b>
                </label>
                <br>
                <div class="row">
                    <div class="col-5">
                        <button class="btn" type="submit">ABSENDEN</button>
                    </div>
                </div>
                

            </form>
        </section>
        
        <br>

    </body>
</html>
