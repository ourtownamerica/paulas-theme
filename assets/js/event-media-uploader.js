jQuery(document).ready(function($) {
    // Reference to the main wrapper for the image upload fields
    var metaBox = $('.event-image-upload-wrapper');
    var imageFrame; // Variable for the wp.media frame

    // Event for the "Upload/Select Image" button
    metaBox.on('click', '.upload-image-button', function(e) {
        e.preventDefault();

        // If the media frame already exists, reopen it.
        if ( imageFrame ) {
            imageFrame.open();
            return;
        }

        // Create a new media frame
        imageFrame = wp.media({
            title: 'Select Event Image',
            button: {
                text: 'Use this image'
            },
            multiple: false,
			library: {
                type: 'image'
            }
        });

        // When an image is selected in the media frame...
        imageFrame.on('select', function() {
            var attachment = imageFrame.state().get('selection').first().toJSON();

			// Perform an additional check in JavaScript (good practice, though server-side is primary)
            if (attachment.type !== 'image') {
                alert('Please select an image file. Videos, audio, or other file types are not allowed.');
                return; // Stop processing if it's not an image
            }
			
            // Update the hidden input field with the attachment ID
            $('#event_image_id').val(attachment.id);

            // Update the image preview
            $('.event-image-preview').html('<img src="' + attachment.url + '" alt="Image Preview" />');

            // Show the "Remove Image" button
            $('.remove-image-button').show();
        });

        // Open the media frame
        imageFrame.open();
    });

    // Event for the "Remove Image" button
    metaBox.on('click', '.remove-image-button', function() {
        // Clear the hidden input field
        $('#event_image_id').val('');

        // Clear the image preview
        $('.event-image-preview').html('');

        // Hide the "Remove Image" button
        $(this).hide();
    });
});