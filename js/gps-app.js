jQuery(document).ready(function() {
  jQuery('.site-footer').remove()
  jQuery('#masthead').remove()
  jQuery('.site-content').css('margin-top', 0)
  jQuery('.entry-content').css('margin-top', 0)
})

jQuery('#start-app').on('click', function(e) {
  const zip = jQuery('#enter-zip').val();

  jQuery.ajax({
url : 'https://newmredesign.wpengine.com/wp-content/plugins/admin/carriers/zrp.php',
data: {
'zip': zip
},
success : function(data) {
      for (let i = 0; i < data.length; i++) {
          var region = data[i].region
          var property = data[i].property
      }
  
      const url = `https://gannett-nxuao.formstack.com/forms/prepop_test?zipcode=${zip}&region=${region}&property=${property}`;
      jQuery('#app-container').append(`<iframe width="100%" height="2050" style="border:none;" src="${url}"></iframe>`);
      jQuery('#zip-module').fadeOut();

},
error : function(request,error) {
console.log("Request: "+JSON.stringify(request));
}
              
});// end ajax       
})