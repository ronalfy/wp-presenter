/**
 * Customizer Previewer
 */
( function ( wp, $ ) {
    "use strict";

    // Bail if the customizer isn't initialized
    if ( ! wp || ! wp.customize ) {
        return;
    }

    var api = wp.customize, OldPreview;

    // Custom Customizer Preview class (attached to the Customize API)
    api.myCustomizerPreview = {
        // Init
        init: function () {
            var self = this; // Store a reference to "this"

            // When the previewer is active, the "active" event has been triggered (on load)
            this.preview.bind( 'active', function() {
                var $body = $( 'body'), $document = $( document ); // Store references to the body and document elements

                // Append "Open Customizer Sidebar" button to the <body> element
                $body.append( ' <button class="my-previewer-event-button my-previewer-open-customizer-sidebar" data-customizer-event="my-open-customizer-sidebar" style="position:absolute;top:10px;left:10px;">Open Customizer Sidebar</button>' );

// Append "Open Widgets Panel" button to the <body> element
                $body.append( ' <button class="my-previewer-event-button my-previewer-open-widgets-panel" data-customizer-event="my-open-widgets-panel">Open Widgets Panel</button>' );

// Append "Open Primary Sidebar Section" button to the <body> element
                $body.append( ' <button class="my-previewer-event-button my-previewer-open-primary-sidebar-section" data-customizer-event="my-open--primary-sidebar-section">Open Primary Sidebar Section</button>' );

// Append "Open Add a Widget Panel" button to the <body> element
                $body.append( ' <button class="my-previewer-event-button my-previewer-open-add-widget-panel" data-customizer-event="my-open-add-widget-panel">Open Add a Widget Panel</button>' );

// Append "Open Everything" button to the <body> element; performs all of the previous button actions simultaneously
                $body.append( ' <button class="my-previewer-event-button my-previewer-open-everything" data-customizer-event="my-open-everything">Open Everything</button>' );

                // Listen for events on the new previewer buttons
                $document.on( 'touch click', '.my-previewer-event-button', function( e ) {
                    var $this = $( this );

                    // Send the event that we've specified on the HTML5 data attribute ('data-customizer-event') to the Customizer
                    self.preview.send( $this.attr( 'data-customizer-event' ) );
                } );

            } );

        }

    };

    /**
     * Capture the instance of the Preview since it is private (this has changed in WordPress 4.0)
     *
     * @see https://github.com/WordPress/WordPress/blob/5cab03ab29e6172a8473eb601203c9d3d8802f17/wp-admin/js/customize-controls.js#L1013
     */
    OldPreview = api.Preview;
    api.Preview = OldPreview.extend( {
        initialize: function( params, options ) {
            // Store a reference to the Preview
            api.myCustomizerPreview.preview = this;

            // Call the old Preview's initialize function
            OldPreview.prototype.initialize.call( this, params, options );
        }
    } );

    // Document ready
    $( function () {
        // Initialize our Preview
        api.myCustomizerPreview.init();
    } );
} )( window.wp, jQuery );