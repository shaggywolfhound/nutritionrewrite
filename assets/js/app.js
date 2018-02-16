$(document).ready(function() {

    $url = $('.pages select').val();

    $('.pages select').on('change', function () {
        $url = $('.pages select').val();
        window.location.href = $url;
    });



});
