$(document).ready(function () {

  $('#show-map-maker').on('click', function (e) {

    e.preventDefault();

    var utmX = $("[name=land_utm_x]").val();
    var utmY = $("[name=land_utm_y]").val();
    var utmZone = $("[name=land_utm_zone]").val();

    var mapUrl = "/map/marker?utm_y=" + utmY + "&utm_x=" + utmX + "&utm_zone=" + utmZone;

    $('#map-modal').modal('show').find('.modal-content').load(mapUrl);
  });

  if ($('input[name="land_utm_zone"]:checked').val() == "wgs84") {
    $('[name=land_utm_x]').prev().html('พิกัด Longitude*');
    $('[name=land_utm_y]').prev().html('พิกัด Latitude*');
  } else {
    $('[name=land_utm_x]').prev().html('แกน X*');
    $('[name=land_utm_y]').prev().html('แกน Y*');
  }

  $("[name=land_utm_zone]").on("change", function () {
    console.log($(this).val())
    if ($(this).val() == 'wgs84') {
      $('[name=land_utm_x]').prev().html('พิกัด Longitude*');
      $('[name=land_utm_y]').prev().html('พิกัด Latitude*');
    } else {
      $('[name=land_utm_x]').prev().html('แกน X*');
      $('[name=land_utm_y]').prev().html('แกน Y*');
    }
  });

});
