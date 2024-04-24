
    $(document).ready(function () {
        $('.search_form').on('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
            let formData = $(this).serialize();
            console.log(formData);

            // Add your AJAX request here to send formData to the server
            // Example:
            // $.ajax({
            //     url: '/items/search',
            //     type: 'post',
            //     data: formData,
            //     success: function(response) {
            //         // Handle response from the server
            //     },
            //     error: function(xhr, status, error) {
            //         // Handle errors
            //     }
            // });
        });

        // Rest of your JavaScript code...
    });

