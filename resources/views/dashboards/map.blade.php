@extends('layouts.dashmaster')

@section('content')
<div id="googleMap" style="width:100%;height:1000px;"></div>
<script>
    function myMap() {
    var mapProp= {
      center:new google.maps.LatLng(51.508742,-0.120850),
      zoom:5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
    var marker = new google.maps.Marker({
  position:myCenter,
  icon:'pinkball.png'
});

marker.setMap(map);
    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKAVNRipymFUliy5T2pwECtQujn40JxpI&callback=myMap&language=ar&region=EG"></script>
@endsection
