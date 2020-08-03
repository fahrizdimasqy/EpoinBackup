$(document).ready(
    function () {
        $("#show-password").hover(
            function () {
                $('$password').attr('type', 'text');
            },
            function () {
                $('$password').attr('type', 'password');
            }
        )
    }
)