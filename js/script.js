function scrollToElem(elemId, speed) {
    $('html, body').animate({
        scrollTop: $("#"+elemId).offset().top}, speed );

}

function mapInitialize() {
    var myLatlng = new google.maps.LatLng(56.986453, 24.220752);
    var mapOptions = {
        zoom: 12,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title:"Hello World!"
    });
}
    function changeSliderPicture(sliderId) {
      var active = $("#"+sliderId+" a.active");
      var next = active.next();
      if (next.length == 0)
        next = $("#"+sliderId+" a:first");
      active.removeClass("active").fadeOut(0);
      next.addClass("active").fadeIn(800);
    }
    function prepareSlider(sliderId) {
        $("#"+sliderId+" a:first").fadeIn(0).addClass("active");
    }
    function startHeaderSlider(sliderId) {
         prepareSlider(sliderId);
         setInterval("changeSliderPicture('"+sliderId+"')", 3000);
    }

    window.onload = function() {
        startHeaderSlider('headerSlider');
    };




