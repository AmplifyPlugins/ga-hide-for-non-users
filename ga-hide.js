jQuery(document).ready(function(){
	jQuery('label[title="If you don\'t have Google Authenticator enabled for your WordPress account, leave this field empty."]').hide();

	jQuery('#user_login').change(function(){
		var value = jQuery('#user_login').val();
		data = {
			action: 'ga_hide_user_name',
			user_name: jQuery('#user_login').val()
		};
		jQuery.post(ajax_object.ajax_url, data, function(response){
			if( response == 'enabled' ){
				jQuery('label[title="If you don\'t have Google Authenticator enabled for your WordPress account, leave this field empty."]').show();
			} else {
				jQuery('label[title="If you don\'t have Google Authenticator enabled for your WordPress account, leave this field empty."]').hide();
			}
		});
	});
});