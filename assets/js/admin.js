jQuery(document).ready(function($) {

    $('#slide_layout-cmb-field-0').bind('change', function(event) {

        var i = $('#slide_layout-cmb-field-0').val();

        if(i=="single-column-content")
        {
            $('#single-column-content').show();
        }
        if(i=="two-column-content")
        {
            $('#single-column-content').hide(); // hide the first one
            $('#two-column-content').show(); // show the other one

        }
    });

    $('#vertical_slide-cmb-field-0').click(function(){
        if(this.checked) {
            $('#vertical-slide-content.cmb_metabox').show();
        } else {
            $('#vertical-slide-content.cmb_metabox').hide();
        }
    });

    $('#data_attributes_toggle-cmb-field-0').click(function(){
        if(this.checked) {
            $('#data-attributes').show();
        } else {
            $('#data-attributes').hide();
        }
    });

    $('#speaker_notes_toggle-cmb-field-0').click(function(){
        if(this.checked) {
            $('#speaker-notes').show();
        } else {
            $('#speaker-notes').hide();
        }
    });

});