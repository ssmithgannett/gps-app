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
      jQuery('#form-here').append(`<iframe width="100%" height="2050" style="border:none;" src="${url}"></iframe>`);
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

