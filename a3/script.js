/* Insert your javascript here */
function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("navbar").style.backgroundColor = "rgba(0, 0, 0, 1)";
    } else {
        document.getElementById("navbar").style.backgroundColor = "rgba(0, 0, 0, 0)";
    }
}