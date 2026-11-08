appearOnScroll();
function appearOnScroll() {
    var appear = document.getElementsByClassName("appear");
    var array = [];
    for (var i = 0; i < appear.length; i++) {
        var appearon = appear[i].getAttribute("data-appearon") || "0.5";
        var entry = appear[i].getAttribute("data-entry") || "once";
        var duration = appear[i].getAttribute("data-duration") || "500";
        var delay = appear[i].getAttribute("data-delay") || "0";

        // data entry == once || fromtop || frombottom || always
        appear[i].style.transitionDuration = duration + "ms";
        appear[i].style.transitionDelay = delay + "ms";

        array.push(appear[i].getBoundingClientRect().top);
        sessionStorage.setItem("array",array);
    }
    sessionStorage.setItem("array",array);
    for (var j = 0; j < appear.length; j++) {
        var elTop = array[j];
        if (window.pageYOffset + (window.innerHeight * 0.7) >= elTop) {
            appear[j].classList.add("show");
        }
    }
}
window.onscroll = function() {
    var appear = document.getElementsByClassName("appear");
    var array = (sessionStorage.getItem("array")).split(",");
    var scrollPos = window.pageYOffset + (window.innerHeight * 0.7);
    for (var i = 0; i < appear.length; i++) {
        var elTop = array[i];
        if (!appear[i].classList.contains("show") && scrollPos >= elTop) {
            appear[i].classList.add("show");
        }
    }
}
window.addEventListener("resize", appearOnScroll);