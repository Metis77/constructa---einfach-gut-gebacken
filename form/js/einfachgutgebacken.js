

/*
 * change bread crumb
 */
function changebreadcrumb(argument) {
	/*
	 * vars
	 */
	var bc  	  	= {};
	bc.sel_ul 		= $('[role="breadCrumb"] ul');
	bc.sel_active 	= $('[role="breadCrumb"] a.active');

	bc.text 		= $('[role="breadCrumb"] a.active').text();
	bc.section     	= bc.sel_active.is(':contains("Gut gebacken")') ? 'Gut gebacken' : 'Einfach backen';
	bc.sectionUrl 	= bc.sel_active.is(':contains("Gut gebacken")') ? 'gut-gebacken' : 'einfach-backen';;


	bc.category 	= function () {
		var category = {};

		// Einfach & unkompliziert backen
		// Gesund & lecker backen
		// Weihnachtsbacken
		// Backen für den Kindergeburtstag

		if ( 
			bc.sel_active.is(':contains("Lachs Tarte")') ||
			bc.sel_active.is(':contains("Klassischer Käsekuchen")') ||
			bc.sel_active.is(':contains("Apfeltarte")')
			) {
			category.cat = 'Einfach & unkompliziert backen';
			category.url = bc.sectionUrl +'-einfach-und-unkompliziert-backen.html'


		} else if (
			bc.sel_active.is(':contains("Rüblikuchen mit Schneehaube (glutenfrei)")') ||
			bc.sel_active.is(':contains("Gemüse-Pfannkuchen mit Frischkäse")') ) {
			category.cat = 'Gesund & lecker backen';
			category.url = bc.sectionUrl +'-Gesund-lecker-backen.html'


		} else if (
			bc.sel_active.is(':contains("Himbeerspitzbuben mit Schnee")') ||
			bc.sel_active.is(':contains("Weihnachtsmuffins")') ||
			bc.sel_active.is(':contains("Walnussecken")') 
		) {
			category.cat = 'Weihnachtsbacken';
			category.url = bc.sectionUrl +'-Weihnachtsbacken.html'


		} else if (
			bc.sel_active.is(':contains("Happy Pizza")') ||
			bc.sel_active.is(':contains("Pepe’s bunter Guglhupf")') ||
			bc.sel_active.is(':contains("Blaue Monster Muffins")') 
		) {
			category.cat = 'Backen für den Kindergeburtstag';
			category.url = bc.sectionUrl +'-Backen-für-den-Kindergeburtstag.html'


		} else {
			category = false;
		}
		return category;
	}()





	/*
	 * helper
	 */
	function removeText(argument) {
		return bc.sel_active.text( bc.sel_active.text().replace(argument,'') );
	}
	function addLink(url, text) {
		return bc.sel_ul.find('li:last').before('<li><a href="'+url+'">'+text+'</a></li>');
	}






	/*
	 * tests
	 */
	console.log( 'bc.text: ' 			+ bc.text 	)
	console.log( 'bc.section: '   		+ bc.section  );
	console.log( 'bc.sectionUrl: '   	+ bc.sectionUrl );

	console.log( 'bc.category.cat: ' 	+ bc.category.cat  );
	console.log( 'bc.category.url: ' 	+ bc.category.url  );
		




	/* level 1 */
	if ( bc.text != bc.section ) {
		removeText(bc.section + ' - ')
		addLink(bc.sectionUrl + '.html' , bc.section)
	}


	/* level 2 */
	if ( bc.category ) {
		removeText('Rezept - ');
		addLink( bc.category.url , bc.category.cat);
	}
}



















$( document ).ready(function() {
	/*
	 * add htm to footer
	 */
	$('footer').append('<div class="footer-logo"><img src="/Files/Constructa/De/de/Images/einfach-gut-gebacken/logo_einfach-gut-gebacken.svg" height="126" width="115" alt="logo einfach gut gebacken"></div>');



	/*
	 * iframe
	 */
	$('body iframe').load(function(){
         $(window).scrollTop(0);
    });



    /*
     * change bread crumb
     */
    changebreadcrumb();


})