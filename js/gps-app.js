jQuery(document).ready(function() {
  jQuery('.site-footer').remove()
  jQuery('#masthead').remove()
  jQuery('.post-thumbnail').remove()
  jQuery('.site-content').css('margin-top', 0)
  jQuery('.entry-content').css('margin-top', 0)
  const headlineText = jQuery('.entry-content h1:nth-child(1)').text();
  const subheadText = jQuery('.entry-content h3:nth-child(2)').text();
  jQuery('.entry-content h3:nth-child(2)').remove()
  jQuery('.entry-content h1:first-child').remove()

  jQuery('.hero-text').append(`
  <h1>${headlineText}</h1>
  <p>${subheadText}<p>
  `)


jQuery('#zipform').submit(function(e) {
  //preventDefault();
  const zip = jQuery('#enter-zip').val();
  console.log(zip)

  jQuery.ajax({
url : 'https://newmredesign.wpengine.com/wp-content/plugins/admin/carriers/gps_app_zip.php',
data: {
'zip': zip
},
success : function(data) {
      for (let i = 0; i < data.length; i++) {
          var market = data[i].market
          var property = data[i].publication_name
      }
  
      const url = `https://gannett-nxuao.formstack.com/forms/prepop_test?zipcode=${zip}&region=${market}&property=${property}`;
      jQuery('#form-here').append(`<iframe scrolling="yes" width="100%" height="500" style="border:none;" src="${url}"></iframe>`);
      jQuery('#zip-module').fadeOut();

},
error : function(request,error) {
console.log("Request: "+JSON.stringify(request));
}
              
});// end ajax       
});// start app

jQuery('#burger').on('click', function() {
  jQuery('#gps-menu').addClass('show')
});

jQuery('#gps-menu .close').on('click', function() {
  jQuery('#gps-menu').removeClass('show')
});


});//page load

