// // Submit form run time with js : Pratik Bhalodiya
 var loaderHTML = '<div id="myloader" class="outerLoader"><div class="innerLoader"><svg class="loader"><filter id="blur"><fegaussianblur in="SourceGraphic" stddeviation="2"></fegaussianblur></filter><circle cx="75" cy="75" r="60" fill="transparent" stroke="#E97E42" stroke-width="6" stroke-linecap="round" stroke-dasharray="385" stroke-dashoffset="385" filter="url(#blur)"></circle></svg><svg class="loader loader-6"><circle cx="75" cy="75" r="60" fill="transparent" stroke="#00DCA3" stroke-width="6" stroke-linecap="round" stroke-dasharray="385" stroke-dashoffset="385" filter="url(#blur)"></circle></svg><svg class="loader loader-7"><circle cx="75" cy="75" r="60" fill="transparent" stroke="purple" stroke-width="6" stroke-linecap="round" stroke-dasharray="385" stroke-dashoffset="385" filter="url(#blur)"></circle></svg></div></div><style>';
 onMyLoader();

function onMyLoader() {
    $("body").append(loaderHTML);
}
function offMyLoader() {
    $("#myloader").remove();
}
$(document).ready(function () {
    offMyLoader();
});