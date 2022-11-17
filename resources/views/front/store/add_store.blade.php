@extends('front/layouts/app')
@section('content')

    <section class="breadCrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa-regular fa-angle-right"></i>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </section>
    <section class="addStor">
        <div class="container">
            <!-- min-width 991px -->
            <div class="min_width991">
                <div class="container">
                    <div class="row">
                        <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- dropify -->
                            <div class="col-12">
                                <div class="Uplod">
                                    <input type="file" required name="coverImagePath" class="dropify1">
                                    <div class="Uplod2">
                                        <input type="file" required name="logoImagePath" class="dropify">
                                    </div>
                                </div>
                            </div>
                            <!-- name -->
                            <div class="col-12">
                                <div class="name">
                                    <input type="text" required name="name" placeholder="اسم المتجر">
                                </div>
                            </div>
                            <!-- checked -->
                            <div class="col-12">
                                <div class="checkedAll">

                                    <div class="checked">
                                        <div class="form-check form-switch">

                                            <input name="delivery_only" class="form-check-input" type="checkbox"
                                                   id="flexSwitchCheckDefault">
                                            <!-- <label class="form-check-label" for="flexSwitchCheckDefault"></label> -->
                                        </div>
                                        <p>
                                            ليس لدي متجر للبيع المباشر (توصيل فقط).
                                        </p>
                                    </div>
                                    <!-- checkedSelect -->

                                    <div class="checkedAll2 active">
                                        <div class="checkedSelect">
                                            <!-- select1 -->

                                            <div class="select1">

                                                <select name="governorate" class="select" onchange="get_cities(this)"
                                                        id="">
                                                    @forelse($governorates as $governorate)
                                                        <option
                                                            cities-data="{{json_encode($governorate->data()['cities'])}}"
                                                            value="{{$governorate->data()['name']["name_".app()->getLocale()]}}"
                                                            selected>{{$governorate->data()['name']["name_".app()->getLocale()]}}</option>
                                                    @empty
                                                        <option onchange="" value="" selected>اختار المحافظه</option>
                                                    @endforelse
                                                </select>
                                            </div>

                                            <!-- select2 -->

                                            <div class="select2">
                                                <select name="district" class="select districts" id="">
                                                    <option value="" selected>اختر المنطقة</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- map -->
                                        <div class="mb-5">
                                            <input type="hidden" name="lat" id="latitude">
                                            <input type="hidden" name="longitude" id="longitude">
                                            <input type="text" name="closestLandmark" id="pac-input"
                                                   style="height: 40px;width: 250px" placeholder="اقرب نقطة دالة">
                                            <div id="map_location_class" style="height: 500px;width: 100%;"></div>
                                        </div>
                                        <div class="map">
                                            <input type="text" id="place_name" placeholder="اقرب نقطة دالة">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <!-- mapButton -->
                                        <div class="mapButton">
                                            <button>
                                                <i class="fa-solid fa-location-dot"></i> اضف موقعك علي الخريطة
                                            </button>
                                        </div>
                                    </div>
                                    <!-- checked -->
                                    <div class="checked">
                                        <div class="form-check form-switch">
                                            <input name="sport_clothes_only" class="form-check-input" type="checkbox"
                                                   id="flexSwitchCheckChecked">
                                            <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label> -->
                                        </div>
                                        <p>
                                            متجري مخصص للملابس الرياضية فقط
                                        </p>
                                    </div>
                                    <!--  -->
                                    <!-- choose coin -->
                                    <div class="chooseCoin d-flex align-items-center">
                                        <p>
                                            اختر عملة المتجر:
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <input type="radio" value="IQD" checked name="storeCurrency" id="">
                                            <P>IQD</P>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <input type="radio" value="USD" name="storeCurrency" id="">
                                            <P>USD</P>
                                        </div>
                                    </div>
                                    <!-- driver -->
                                    <div class="driver">
                                        <!-- checked -->
                                        <div class="checked">
                                            <div class="form-check form-switch">
                                                <input name="not_have_delivery" class="form-check-input" type="checkbox"
                                                       id="driver">
                                                <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label> -->
                                            </div>
                                            <p>
                                                ليس لدي توصيل
                                            </p>
                                        </div>
                                        <!--  -->
                                        <div class="mainCityAll">
                                            <div class="mainCity">
                                                <p>
                                                    بغداد:
                                                    <input type="hidden" name="deliveryCost[0][placeName]"
                                                           value="بغداد">
                                                </p>
                                                <input type="number" required class="frist" name="deliveryCost[0][cost]" id=""
                                                       placeholder="كلفة التوصيل">
                                            </div>
                                            <div class="mainCity">
                                                <p>
                                                    <input type="hidden" name="deliveryCost[1][placeName]"
                                                           value="محافظات">

                                                    باقي المحافظات:
                                                </p>
                                                <input type="number" required name="deliveryCost[1][cost]" id=""
                                                       placeholder="كلفة التوصيل">
                                            </div>
                                        </div>
                                        <!-- BigInput -->
                                        <div class="BigInput">
                                            <div>
                                                <input required type="number" name="phoneNumber" placeholder="رقم هاتف متجرك">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div>
                                                <input type="number" name="socialMedia[whatsappNumber]"
                                                       placeholder="واتساب">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </div>
                                            <div>
                                                <input type="text" name="socialMedia[facebookLink]"
                                                       placeholder="رابط الفبس بوك">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </div>
                                            <div>
                                                <input type="text" name="socialMedia[instagramLink]"
                                                       placeholder="رابط الانستجرام">
                                                <i class="fa-brands fa-instagram"></i>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <!-- mapButton -->
                                        <div class="mapButton">
                                            <button>
                                                التالي
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
            <!--  -->
            <!-- max_width 991px -->

            <div class="full_page">
                <div class="max_width991">
                    <div class="container">
                        <div class="angle">
                            <div class="angle2">

                                <a class="" href="{{url('/')}}">
                                    <i class="fa-regular fa-angle-right"></i>
                                </a>
                                <h3>
                                    اضف متجرك
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- dropify -->
                                <div class="col-12">
                                    <div class="Uplod">
                                        <input type="file" required name="coverImagePath" class="dropify1">
                                        <div class="Uplod2">
                                            <input type="file" required name="logoImagePath" class="dropify">
                                        </div>
                                    </div>
                                </div>
                                <!-- name -->
                                <div class="col-12">
                                    <div class="name">
                                        <input type="text" required name="name" placeholder="اسم المتجر">
                                    </div>
                                </div>
                                <!-- checked -->
                                <div class="col-12">
                                    <div class="checkedAll">

                                        <div class="checked">
                                            <div class="form-check form-switch">

                                                <input name="delivery_only" class="form-check-input" type="checkbox"
                                                       id="flexSwitchCheckDefault">
                                                <!-- <label class="form-check-label" for="flexSwitchCheckDefault"></label> -->
                                            </div>
                                            <p>
                                                ليس لدي متجر للبيع المباشر (توصيل فقط).
                                            </p>
                                        </div>
                                        <!-- checkedSelect -->

                                        <div class="checkedAll2 active">
                                            <div class="checkedSelect">
                                                <!-- select1 -->

                                                <div class="select1">

                                                    <select name="governorate" class="select" onchange="get_cities(this)"
                                                            id="">
                                                        @forelse($governorates as $governorate)
                                                            <option
                                                                cities-data="{{json_encode($governorate->data()['cities'])}}"
                                                                value="{{$governorate->data()['name']["name_".app()->getLocale()]}}"
                                                                selected>{{$governorate->data()['name']["name_".app()->getLocale()]}}</option>
                                                        @empty
                                                            <option onchange="" value="" selected>اختار المحافظه</option>
                                                        @endforelse
                                                    </select>
                                                </div>

                                                <!-- select2 -->

                                                <div class="select2">
                                                    <select name="district" class="select districts" id="">
                                                        <option value="" selected>اختر المنطقة</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- map -->
                                            <div class="mb-5">
                                                <input type="hidden" name="lat" id="latitude">
                                                <input type="hidden" name="longitude" id="longitude">
                                                <input type="text" name="closestLandmark" id="pac-input"
                                                       style="height: 40px;width: 250px" placeholder="اقرب نقطة دالة">
                                                <div id="map_location_class" style="height: 500px;width: 100%;"></div>
                                            </div>
                                            <div class="map">
                                                <input type="text" id="place_name" placeholder="اقرب نقطة دالة">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <!-- mapButton -->
                                            <div class="mapButton">
                                                <button>
                                                    <i class="fa-solid fa-location-dot"></i> اضف موقعك علي الخريطة
                                                </button>
                                            </div>
                                        </div>
                                        <!-- checked -->
                                        <div class="checked">
                                            <div class="form-check form-switch">
                                                <input name="sport_clothes_only" class="form-check-input" type="checkbox"
                                                       id="flexSwitchCheckChecked">
                                                <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label> -->
                                            </div>
                                            <p>
                                                متجري مخصص للملابس الرياضية فقط
                                            </p>
                                        </div>
                                        <!--  -->
                                        <!-- choose coin -->
                                        <div class="chooseCoin d-flex align-items-center">
                                            <p>
                                                اختر عملة المتجر:
                                            </p>
                                            <div class="d-flex align-items-center">
                                                <input type="radio" value="IQD" checked name="storeCurrency" id="">
                                                <P>IQD</P>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <input type="radio" value="USD" name="storeCurrency" id="">
                                                <P>USD</P>
                                            </div>
                                        </div>
                                        <!-- driver -->
                                        <div class="driver">
                                            <!-- checked -->
                                            <div class="checked">
                                                <div class="form-check form-switch">
                                                    <input name="not_have_delivery" class="form-check-input" type="checkbox"
                                                           id="driver">
                                                    <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label> -->
                                                </div>
                                                <p>
                                                    ليس لدي توصيل
                                                </p>
                                            </div>
                                            <!--  -->
                                            <div class="mainCityAll">
                                                <div class="mainCity">
                                                    <p>
                                                        بغداد:
                                                        <input type="hidden" name="deliveryCost[0][placeName]"
                                                               value="بغداد">
                                                    </p>
                                                    <input type="number" required class="frist" name="deliveryCost[0][cost]" id=""
                                                           placeholder="كلفة التوصيل">
                                                </div>
                                                <div class="mainCity">
                                                    <p>
                                                        <input type="hidden" name="deliveryCost[1][placeName]"
                                                               value="محافظات">

                                                        باقي المحافظات:
                                                    </p>
                                                    <input type="number" required name="deliveryCost[1][cost]" id=""
                                                           placeholder="كلفة التوصيل">
                                                </div>
                                            </div>
                                            <!-- BigInput -->
                                            <div class="BigInput">
                                                <div>
                                                    <input required type="number" name="phoneNumber" placeholder="رقم هاتف متجرك">
                                                    <i class="fa-solid fa-phone"></i>
                                                </div>
                                                <div>
                                                    <input type="number" name="socialMedia[whatsappNumber]"
                                                           placeholder="واتساب">
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                </div>
                                                <div>
                                                    <input type="text" name="socialMedia[facebookLink]"
                                                           placeholder="رابط الفبس بوك">
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                </div>
                                                <div>
                                                    <input type="text" name="socialMedia[instagramLink]"
                                                           placeholder="رابط الانستجرام">
                                                    <i class="fa-brands fa-instagram"></i>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <!-- mapButton -->
                                            <div class="mapButton">
                                                <button>
                                                    التالي
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <script src="{{asset('/assets/front/')}}/js/dropify.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/intlTelInput.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/utils.js"></script>
@endsection
@section('js')
    @if (!empty($errors->all()))
        @foreach ($errors->all() as $error)
            toastr.error("{{$error}}")
        @endforeach
    @endif
    <script>

        function get_cities(att) {
            let json = $(att).find(':selected').attr('cities-data')
            let cities = JSON.parse(json);
            // console.log(cities)
            // return false;
            let data = "";
            for (let i = 0; i < cities.length; i++) {
                data += "<option value='" + cities[i].name + "'>" + cities[i].name + "</option> ";
            }
            $('.districts').html(data);
        }
    </script>
    <script>
        $("#pac-input").focusin(function () {
            $(this).val('');
        });
        $('#latitude').val('');
        $('#longitude').val('');

        function initAutocomplete() {
            console.log('ff')

            var map = new google.maps.Map(document.getElementById('map_location_class'), {
                center: {lat: {{($user->latitude) ?? '30.915051'}}, lng: {{($user->longitude) ?? '29.805969'}}},
                zoom: 13,
                mapTypeId: 'roadmap'
            });
            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                console.log('ff')
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    console.log(pos);
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: 'موقعك الحالي'
                    });
                    markers.push(marker);
                    marker.addListener('click', function () {
                        geocodeLatLng(geocoder, map, infoWindow, marker);
                    });
                    // to get current position address on load
                    google.maps.event.trigger(marker, 'click');
                }, function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                console.log('Browser does not support Geolocation');
                handleLocationError(false, infoWindow, map.getCenter());
            }
            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function (event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log(results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#pac-input").val(results[0].formatted_address);
                            $("#place_name").val(results[0].formatted_address);
                        }
                    }
                });
            });

            function geocodeLatLng(geocoder, map, infowindow, markerCurrent) {
                var latlng = {
                    lat: markerCurrent.position.lat(),
                    lng: markerCurrent.position.lng()
                };
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                $('#latitude').val(markerCurrent.position.lat());
                $('#longitude').val(markerCurrent.position.lng());
                geocoder.geocode({'location': latlng}, function (results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);
                            $("#place_name").val(results[0].formatted_address);
                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng = (markerCurrent.position.lat(), markerCurrent.position.lng());
            }

            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }

            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            function clearMarkers() {
                setMapOnAll(null);
            }

            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            $("#pac-input").val("أبحث هنا ");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });
            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));
                    $('#latitude').val(place.name);
                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }

        function splitLatLng(latLng) {
            var newString = latLng.substring(0, latLng.length - 1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng = trainindIdArray[1];
            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK34ZyoH4758BkVP05-GxKP0dSmBi4yTo&libraries=places&callback=initAutocomplete&language=ar&region=EG
async defer"></script>

@endsection
