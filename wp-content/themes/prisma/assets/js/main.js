$(document).ready(function() {

    $(function() {
      $(".prisma--statistics .bigger-number span").countimator();
      $(".prisma-negocio--estadisticas .bigger-number span").countimator();
    });

    $('#nav-icon').click(function(){
      $(this).toggleClass('open');
      $('#menuToggler').fadeToggle();
    });

    $("#masthead").sticky({
      topSpacing:0,
      zIndex:999
    });
  });