$(document).ready(function () {
  // for page loader
  $(".loader-page").delay(1000).fadeOut(400);
  // right sidebar
  $('.rightsidebar-toggle-btn').click(function () {
    $('body').toggleClass('removeSidebarBody');
  });
  $(".btn-left-sidebar").click(function (e2) {
    e2.preventDefault();
    $(".left-sider-wrapper").toggleClass("toggled");
  });

  $('.leftsidebar-toggle-btn-xs').click(function (e3) {
    e3.preventDefault();
    $(".top-nav-xs-wrap").toggleClass("toggled");
  });

  //tooltip
  // $('[data-toggle="tooltip"]').tooltip();
  $('[data-toggle="tooltip"]').tooltip({
    trigger: 'hover'
  });
  // niceScroll
  $('.sidebar-wrap-ul, .comman-nicescroll').niceScroll({cursorcolor: "#424242",cursoropacitymin: 0,cursoropacitymax: 1,cursorwidth: "10px",cursorborder: "0",autohidemode: false});

});
