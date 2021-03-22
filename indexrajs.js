//activity
function animateValue(obj, start = 0, end = null, duration = 1000) {
if (obj) {

    // save starting text for later (and as a fallback text if JS not running and/or google)
    var textStarting = obj.innerHTML;

    // remove non-numeric from starting text if not specified
    end = end || parseInt(textStarting.replace(/\D/g, ""));

    var range = end - start;

    // no timer shorter than 50ms (not really visible any way)
    var minTimer = 50;

    // calc step time to show all interediate values
    var stepTime = Math.abs(Math.floor(duration / range));

    // never go below minTimer
    stepTime = Math.max(stepTime, minTimer);

    // get current time and calculate desired end time
    var startTime = new Date().getTime();
    var endTime = startTime + duration;
    var timer;

    function run() {
        var now = new Date().getTime();
        var remaining = Math.max((endTime - now) / duration, 0);
        var value = Math.round(end - (remaining * range));
        // replace numeric digits only in the original string
        obj.innerHTML = textStarting.replace(/([0-9]+)/g, value);
        if (value == end) {
            clearInterval(timer);
        }
    }

    timer = setInterval(run, stepTime);
    run();
}
}

animateValue(document.getElementById('actnum'));

//contact us

    function animateValue(obj, start = 0, end = null, duration = 1000) {
    if (obj) {

        // save starting text for later (and as a fallback text if JS not running and/or google)
        var textStarting = obj.innerHTML;

        // remove non-numeric from starting text if not specified
        end = end || parseInt(textStarting.replace(/\D/g, ""));

        var range = end - start;

        // no timer shorter than 50ms (not really visible any way)
        var minTimer = 50;

        // calc step time to show all interediate values
        var stepTime = Math.abs(Math.floor(duration / range));

        // never go below minTimer
        stepTime = Math.max(stepTime, minTimer);

        // get current time and calculate desired end time
        var startTime = new Date().getTime();
        var endTime = startTime + duration;
        var timer;

        function run() {
            var now = new Date().getTime();
            var remaining = Math.max((endTime - now) / duration, 0);
            var value = Math.round(end - (remaining * range));
            // replace numeric digits only in the original string
            obj.innerHTML = textStarting.replace(/([0-9]+)/g, value);
            if (value == end) {
                clearInterval(timer);
            }
        }

        timer = setInterval(run, stepTime);
        run();
    }
}

animateValue(document.getElementById('contnum'));
//participant
function animateValue(obj, start = 0, end = null, duration = 1000) {
if (obj) {

    // save starting text for later (and as a fallback text if JS not running and/or google)
    var textStarting = obj.innerHTML;

    // remove non-numeric from starting text if not specified
    end = end || parseInt(textStarting.replace(/\D/g, ""));

    var range = end - start;

    // no timer shorter than 50ms (not really visible any way)
    var minTimer = 50;

    // calc step time to show all interediate values
    var stepTime = Math.abs(Math.floor(duration / range));

    // never go below minTimer
    stepTime = Math.max(stepTime, minTimer);

    // get current time and calculate desired end time
    var startTime = new Date().getTime();
    var endTime = startTime + duration;
    var timer;

    function run() {
        var now = new Date().getTime();
        var remaining = Math.max((endTime - now) / duration, 0);
        var value = Math.round(end - (remaining * range));
        // replace numeric digits only in the original string
        obj.innerHTML = textStarting.replace(/([0-9]+)/g, value);
        if (value == end) {
            clearInterval(timer);
        }
    }

    timer = setInterval(run, stepTime);
    run();
}
}

animateValue(document.getElementById('parnum'));

//feedback
function animateValue(obj, start = 0, end = null, duration = 1000) {
if (obj) {

    // save starting text for later (and as a fallback text if JS not running and/or google)
    var textStarting = obj.innerHTML;

    // remove non-numeric from starting text if not specified
    end = end || parseInt(textStarting.replace(/\D/g, ""));

    var range = end - start;

    // no timer shorter than 50ms (not really visible any way)
    var minTimer = 50;

    // calc step time to show all interediate values
    var stepTime = Math.abs(Math.floor(duration / range));

    // never go below minTimer
    stepTime = Math.max(stepTime, minTimer);

    // get current time and calculate desired end time
    var startTime = new Date().getTime();
    var endTime = startTime + duration;
    var timer;

    function run() {
        var now = new Date().getTime();
        var remaining = Math.max((endTime - now) / duration, 0);
        var value = Math.round(end - (remaining * range));
        // replace numeric digits only in the original string
        obj.innerHTML = textStarting.replace(/([0-9]+)/g, value);
        if (value == end) {
            clearInterval(timer);
        }
    }

    timer = setInterval(run, stepTime);
    run();
}
}

animateValue(document.getElementById('fbnum'));