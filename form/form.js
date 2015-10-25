
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // console.log(e.target.result);
            $('.form_file_preview')
                .css('background-image', 'url(' + e.target.result + ')')
                .addClass('-js-gotimage');
                
                // .attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

       



$(document).ready(function(){

	$('#form_file').change(function(){
        readURL(this);
    });



	// teilnahmebedingungen

	$('.close').click(function(){
		$('#bedingungen').hide();
		return false;
	});
	$('.tb').click(function(){
		$('#bedingungen').show();
		return false;
	});

});