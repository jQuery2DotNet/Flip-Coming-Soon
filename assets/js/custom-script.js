Date.prototype.addDays = function (days) {
    var dat = new Date(this.valueOf());
    dat.setDate(dat.getDate() + days);
    return dat;
}
$(document).ready(function () {
    /* Flip Clock  */
    var clock;
    var date = new Date();
    date = date.addDays(5);
    var now = new Date();
    var diff = (date.getTime() / 1000) - (now.getTime() / 1000);
    clock = $('.clock').FlipClock(diff, {
        clockFace: 'DailyCounter',
        autoStart: true,
        countdown: true,
        showSeconds: true,
        callbacks: {
            stop: function () {
                $('.message').html('The clock has stopped!')
            }
        }
    });

    /* Add CSS animation class */
    $('h1').addClass('wow animated fadeInDown');
    $('h2').addClass('wow animated fadeInUp');
    $('p').addClass('wow animated fadeInUp');
    $('.social-link').addClass('wow animated fadeInLeft');

    /* WOW Animation When You Scroll */
    wow = new WOW({
        mobile: false
    });
    wow.init();

    /* Subscribe to our newsletter from submit*/
    $('#SendMail').submit(function (e) {
        e.preventDefault();
        var $btn
        $.ajax({
            type: 'post',
            url: 'SendMail.php',
            dataType: "json",
            data: $('#SendMail').serialize(),
            beforeSend: function () {
                $('#formMessage').hide();
                $('#formError').hide();
                $btn = $('#btnSubmit').button('loading');
            },
            success: function (data) {
                if (data.status == 1) {
                    $('#formMessage').fadeIn();
                    $('#SendMail')[0].reset();
                    $btn.button('reset');
                }
                else {
                    $btn.button('reset');
                    $('#formError').html('<h5 class="text-danger">An error occurred during the subscription process</h5>').show();
                }
            },
            error: function () {
            }
        });
        return false;
    });
});