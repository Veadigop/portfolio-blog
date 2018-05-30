<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@if(Request::is('contact'))
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_fsL2o70fwYWr2ILBTRRYxGv51faCZpE&callback=initMap"></script>
    <script>
        function initMap() {
            var uluru = {lat: -34.397, lng: 150.644};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
@endif