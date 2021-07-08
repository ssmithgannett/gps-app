jQuery(document).ready(function() {
    jQuery('.site-footer').remove()
    jQuery('#masthead').remove()
    jQuery('.site-content').css('margin-top', 0)
    jQuery('.entry-content').css('margin-top', 0)
  
    jQuery.ajax({
        url : 'https://newmredesign.wpengine.com/wp-content/plugins/admin/carriers/routes-query.php',
        type : 'GET',
        success : function(data) {
            routes(data);
        },
        error : function(request,error)
        {
            console.log("Request: "+JSON.stringify(request));
        }
    });// end ajax"

    function routes(data) {
        
        for (let i = 0; i < data.length; i++) {
            console.log(data[i].contact);
            const contact = data[i].contact;
            const routeName = data[i].route_name;
            const pub = data[i].publication;

            jQuery('#returned-routes').append(`
                <div id="route">
                    <h3>${routeName}</h3>
                    <p>${pub}</p>
                    <p>Contact: <a href="mailto:${contact}">${contact}</a></p>
                </div>
            `);
            
        }
    }
})