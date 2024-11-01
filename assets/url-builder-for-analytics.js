jQuery(document).ready( function($) {
    // Implements tabs.
    $('#url-builder-meta-box-tabs .hidden').removeClass('hidden');
    $('#url-builder-meta-box-tabs').tabs({
        activate: function( event, ui ) {
            ui.newTab.addClass('tabs');
            ui.oldTab.removeClass('tabs');
        }
    });

    $( '.url_builder_url' ).click( function(e) {
        this.select();
    });

    // Function for creating a shareable URL.
    var urlBuilderCreateUrl = function( source, medium, campaign, term, content ) {
        var parameters = {};

        var base_url = jQuery( "#full-url" ).val();

        parameters.utm_source = source;
        parameters.utm_medium = medium;
        parameters.utm_campaign = campaign;

        if ( term && term.length ) {
            parameters.utm_term = term;
        }
        if ( content && content.length ) {
            parameters.utm_content = content;
        }

        return base_url + '?' + jQuery.param(parameters)
    }

    // Generate social share URLs.
    $( '#url_builder_generate_social_links' ).click( function(e) {
        e.preventDefault();

        var campaignName = $( '#url_builder_campaign_name' ).val();

        $( '.url_builder_social_row' ).each( function(id, row) {
            var source = $( row ).find( '.url_builder_source' ).html();
            var medium = $( row ).find( '.url_builder_medium' ).html();
            var url = urlBuilderCreateUrl( source, medium, campaignName );

            $( row ).find( 'input.sociallink' ).val( url );
        });
    });

    // Generate custom share URL
    jQuery( '#generate_analytics_url_submit' ).click( function(e) {
        var source = '';
        var medium = '';
        var term = '';
        var content = '';
        var campaignName = '';

        if ( jQuery("input[name='campaign_source']").val() !== '' ) {
            source = jQuery( "input[name='campaign_source']" ).val();
        }
        if ( jQuery("input[name='campaign_medium']").val() !== '' ) {
            medium = jQuery( "input[name='campaign_medium']" ).val();
        }
        if ( jQuery("input[name='campaign_term']").val() !== '' ) {
            term = jQuery( "input[name='campaign_term']" ).val();
        }
        if ( jQuery("input[name='campaign_content']").val() !== '' ) {
            content = jQuery( "input[name='campaign_content']" ).val();
        }
        if ( jQuery("input[name='campaign_name']").val() !== '' ) {
            campaignName = jQuery( "input[name='campaign_name']" ).val();
        }
        jQuery( '#final_url' ).val( urlBuilderCreateUrl( source, medium, campaignName, term, content ));
    });
});
