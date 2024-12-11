<x-blocks.wrapper>
    <div>
        <style>
            #map {
                height: 500px;
                width: 100%;
            }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('filament-locationpickr-field.key', '') }}"></script>
        <script>
            function initMap() {
                var location = {lat: {{ $this->latitude }}, lng: {{ $this->longitude }}};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: location
                });
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }
        </script>
        <div id="map"></div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                initMap();
            });
        </script>
    </div>
</x-blocks.wrapper>
