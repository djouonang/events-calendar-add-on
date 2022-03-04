jQuery(document).ready( function() {
jQuery("#ContactForm").submit(function(event) {
	
    event.preventDefault();
	
	 var formdata = {};
  jQuery('.form-group').each(function(){
    var key = jQuery(this).find('label').text();
    var value = jQuery(this).find('input').val();
    formdata[key] = value;
  });
   
  console.log(formdata); 
//  alert(data);
    jQuery("#receiving_response").value = 'Please wait...';
    var data = {
        action: 'shortcode_form', // here php function 
        info: formdata,
    };
    jQuery.post(form_ajax_call.ajaxurl, data, function(response) {
         jQuery("#receiving_response").html(response);
    });
});
})

