jQuery(document).ready(function(){
	
	// External Link
	jQuery('a[rel="external"]').click(function(){
        window.open( jQuery(this).attr('href') );
        return false;
    });

	// Print
	jQuery('a[rel="print"]').click(function() {
		window.print();
		return false;
	});
	
	// Generate a random password for users
	jQuery("#generate_password").change(function() {
		var generate = jQuery(this).prop('checked');
		if(generate == true){
			jQuery.get(
				'/admin/admin-users/generate-random-password/',
				function(data) {
					jQuery("#generated_password").html(data);
					var new_pw = jQuery("#new_pw").val();
					jQuery("#password").val(new_pw).trigger('keyup');
					jQuery("#confirm_password").val(new_pw);
				}
			);
		}else{
			var new_pw = '';
			jQuery("#generated_password").html('');
			jQuery("#new_pw").val(new_pw);
			jQuery("#password").val(new_pw).trigger('keyup');
			jQuery("#confirm_password").val(new_pw);
		}
	});

    //ckeditor
    $( '.ckeditor' ).ckeditor();
});