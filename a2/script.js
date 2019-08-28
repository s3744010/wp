function fadeIn() {
    var element = document.getElementById('content_container');
    var op = 1;
    var timer = setInterval(function () {
        if (op < 0.1){
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op + ")";
        op -= 0.1;
    }, 200);

    setTimeout(function() {
        fadeOut(element);
    }, 34000);
}

function fadeOut(element) {
    var op = 0.1;
    element.style = "display: absolute";
    var timer = setInterval(function () {
        if (op > 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op + ")";
        op += 0.1;
    }, 50);
}

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("navbar").style.backgroundColor = "rgba(0, 0, 0, 1)";
    } else {
        document.getElementById("navbar").style.backgroundColor = "rgba(0, 0, 0, 0)";
    }
}