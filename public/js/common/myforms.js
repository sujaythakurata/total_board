// Submit form run time with js : Pratik Bhalodiya
var loaderHTML = '<div id="myloader" class="outerLoader"><div class="innerLoader"><svg class="loader"><filter id="blur"><fegaussianblur in="SourceGraphic" stddeviation="2"></fegaussianblur></filter><circle cx="75" cy="75" r="60" fill="transparent" stroke="#E97E42" stroke-width="6" stroke-linecap="round" stroke-dasharray="385" stroke-dashoffset="385" filter="url(#blur)"></circle></svg><svg class="loader loader-6"><circle cx="75" cy="75" r="60" fill="transparent" stroke="#00DCA3" stroke-width="6" stroke-linecap="round" stroke-dasharray="385" stroke-dashoffset="385" filter="url(#blur)"></circle></svg><svg class="loader loader-7"><circle cx="75" cy="75" r="60" fill="transparent" stroke="purple" stroke-width="6" stroke-linecap="round" stroke-dasharray="385" stroke-dashoffset="385" filter="url(#blur)"></circle></svg></div></div><style>';
onMyLoader();

function onMyLoader() {
    $("body").append(loaderHTML);
}
function offMyLoader() {
    $("#myloader").remove();
}
function getMessageSuccess(message) {
    return '<div class="callout callout-info" id="form_message">' + message + '</div>';
}
function getMessageFail(message) {
    return '<div class="callout callout-danger" id="form_message">' + message + '</div>';
}
function sendDataInPost(durl, dform,formData, e, successF, failF) {
    onMyLoader();
    $("#form_message").remove();
    e.preventDefault();
    $.ajax({
        url: durl,
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        dataType: "JSON",
        processData: false,
        success: function (data) {
            if (data.success == 1) {
                dform.prepend(getMessageSuccess(data.message));
                successF(data);
            } else {
                dform.prepend(getMessageFail(data.message));
                failF(data);
            }
            offMyLoader();
            $("html, body").animate({scrollTop: 0}, "slow");
        },
        error: function () {
            dform.prepend(getMessageFail("Network Error , Please Check you internet Connection"));
            offMyLoader();
        }
    });
}
function getDataFromURL(durl,successF, failF) {
    $.ajax({
        url: durl,
        contentType: false,
        cache: false,
        dataType: "JSON",
        processData: false,
        success: function (data) {
            if (data.success == 1) {
                successF(data);
            } else {
                failF(data);
            }
        },
        error: function () {
            alert("Network Error , Please Check you internet Connection");
        }
    });
}
function getDatafromPost(durl, formData,successF, failF) {
    onMyLoader();
    $.ajax({
        url: durl,
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        dataType: "JSON",
        processData: false,
        success: function (data) {
            if (data.success == 1) {
                successF(data);
            } else {
                failF(data);
            }
            offMyLoader();
        },
        error: function () {
            alert("Network Error , Please Check you internet Connection");
            offMyLoader();
        }
    });
}
$(document).ready(function () {
    offMyLoader();
});