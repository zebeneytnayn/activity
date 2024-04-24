$(document).ready(function () {
    $('#form').on('submit', function (event) {
        event.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '{{ route("items.store") }}',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

                $('.alert-messages').html('<div class="alert alert-primary text-center fw-bolder">' + response.success + '</div>');


                setTimeout(function () {
                    window.location.href = '{{ route("items.index") }}';
                }, 1000);
            },
            error: function (xhr, status, error) {
                let errors = xhr.responseJSON.errors;
                let errorHtml = '';

                $.each(errors, function (key, value) {
                    errorHtml += '<li>' + value + '</li>';
                });

                $('.error-messages').html('<ul>' + errorHtml + '</ul>');
            }
        });
    });
});