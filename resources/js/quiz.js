require('./bootstrap');

var time_display = $("#time_display");
var preview = $("#preview");
var question = $("#question");
var play = $("#play");
var time = $("#time");
var form = $("#submit");
var answers = $(".answer");

if (time_display.length > 0) {

    var bar = new ProgressBar.Circle(time_display[0], {
        color: '#3498db',
        strokeWidth: 4,
        trailWidth: 1,
        duration: 1000,
        step: function(state, circle) {
            var value = Math.round(circle.value() * 20);
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText(value);
            }

        }
    });
    bar.text.style.fontSize = '2rem';
    bar.set(1);

    var interval;

    play.on('click', function() {
        preview.addClass("d-none");
        question.removeClass("d-none");

        interval = setInterval(function() {
            time.val(time.val() - 1);
            bar.animate((time.val()) / 20);
            if (parseInt(time.val()) === 0) {
                clearInterval(i);
                form.submit();
            }
        }, 1000);
    });

    answers.on('click', function() {
        if (interval) {
            clearInterval(interval);
        }
        form.submit();
    });

}