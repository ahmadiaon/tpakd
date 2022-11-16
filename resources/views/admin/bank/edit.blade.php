@extends('layout_admin.main')
@section('head')
    @include('layout_admin.head_input')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--These jQuery libraries for
         chosen need to be included-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />

    <!--These jQuery libraries for select2
          need to be included-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
        type="text/css">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <style>
        .marker {
            background-image: url("{{ env('APP_URL') }}assets/img/marker.png");
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="pd-20 card-box mb-30">

                <form action="/my-bank" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="isedit" value="true">
                    <input type="hidden" name="id" id="id" value="{{$bank->id}}">
                    
                    <div class="row justify-content-md-center">
                        <div class="col-12 text-center mb-20">
                            <h3>IDENTITAS BANK</h3>
                        </div>
                        {{-- id --}}
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>ID</label>
                                <input autofocus name="id_bank" type="text"
                                    class="form-control  @error('id_bank') is-invalid @enderror"
                                    value="{{ old('id_bank',$bank->id_bank) }}" id="id_bank">
                                @error('id_bank')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- Bank name --}}
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Bank Name</label>
                                <select class="custom-select2 form-control" name="bank_name_id" id="bank_name_id">
                                    @foreach ($bank_names as $bank_name)
                                        @if (old('bank_name_id', $bank->bank_name_id) == $bank_name->id)
                                            <option value="{{ $bank_name->id }}" selected>{{ $bank_name->bank_name }}
                                            </option>
                                        @else
                                            <option value="{{ $bank_name->id }}">{{ $bank_name->bank_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-md-center">
                        {{-- Bank name --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kabupaten</label>
                                <div class="form-group">
                                    <select onchange="getKecamatan()" class="custom-select2 form-control" name="dat_i_i_id"
                                        id="dat_i_i_id">
                                        @foreach ($dat_i_i_s as $dat_i_i)
                                            @if (old('dat_i_i_id', $dat_i_i->dat_i_i_id) == $dat_i_i->id)
                                                <option value="{{ $dat_i_i->id }}" selected>{{ $dat_i_i->dat_i_i_code }}
                                                </option>
                                            @else
                                                <option value="{{ $dat_i_i->id }}">
                                                    {{ $dat_i_i->dat_i_i_code .
                                                        ' -
                                                                                            ' .
                                                        $dat_i_i->dat_i_i_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('dat_i_i_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <div class="form-group">
                                    <select class="custom-select2 form-control" name="kecamatan_id" id="kecamatan_id">
                                        @foreach ($dat_i_i_s as $dat_i_i)
                                            @if (old('kecamatan_id', $dat_i_i->kecamatan_id) == $dat_i_i->id)
                                                <option value="{{ $dat_i_i->id }}" selected>{{ $dat_i_i->dat_i_i_code }}
                                                </option>
                                            @else
                                                <option value="{{ $dat_i_i->id }}">
                                                    {{ $dat_i_i->dat_i_i_code .
                                                        ' -' .
                                                        $dat_i_i->dat_i_i_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('kecamatan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="form-group">
                        <label>Nama Kantor</label>
                        <input autofocus name="bank_name" type="text"
                            class="form-control  @error('bank_name') is-invalid @enderror" 
                            value="{{ old('bank_name',$bank->bank_name) }}"
                            id="bank_name">
                        @error('bank_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat Kantor</label>
                        <input autofocus name="bank_address" type="text"
                            class="form-control  @error('bank_address') is-invalid @enderror"
                            value="{{ old('bank_address',$bank->bank_address) }}" id="bank_address">
                        @error('bank_address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Alamat Kantor</label>
                        <div class="row">
                            <div class="col-2">
                                <div class="custom-control custom-checkbox mb-5">
                                    <input {{ (!empty($bank->kur))?"checked" : ""}} type="checkbox" class="custom-control-input" id="kur"  value="kur" name="kur"/>
                                    <label class="custom-control-label" for="kur">KUR</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-checkbox mb-5">
                                    <input {{ (!empty($bank->kpmr))?"checked" : ""}} type="checkbox" class="custom-control-input" id="kpmr" value="kpmr" name="kpmr" />
                                    <label class="custom-control-label" for="kpmr">KPMR</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-checkbox mb-5">
                                    <input {{ (!empty($bank->baru))?"checked" : ""}} type="checkbox" class="custom-control-input" id="baru"  value="baru" name="baru"/>
                                    <label class="custom-control-label" for="baru">Rek. Baru</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-checkbox mb-5">
                                    <input {{ (!empty($bank->pinjaman))?"checked" : ""}} type="checkbox" class="custom-control-input" id="pinjaman" value="pinjaman" name="pinjaman" />
                                    <label class="custom-control-label" for="pinjaman">Pinjaman</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-checkbox mb-5">
                                    <input {{ (!empty($bank->simpel))?"checked" : ""}} type="checkbox" class="custom-control-input" id="simpel"  value="simpel" name="simpel"/>
                                    <label class="custom-control-label" for="simpel">SimPel</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-checkbox mb-5">
                                    <input {{ (!empty($bank->qris))?"checked" : ""}} type="checkbox" class="custom-control-input" id="qris"  value="qris" name="qris"/>
                                    <label class="custom-control-label" for="qris">QRIS</label>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="">Place Bank</label>
                        <div class="row md-20">
                            <div class="col-8">
                                <div class="container" data-aos="fade-up">
                                    <div id="center">center</div>
                                    <div id="map"
                                        style="
                                width: 100%;
                                height: 500px;
                                border-radius: 10px;
                                border: 1px solid orange;
                              ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">

                                <div class="container" style="height: 300px">
                                    <div class="form-group">
                                        <label for="latitute">Latitute</label>
                                        <input type="text" name="latitute" class="form-control" id="latitute" value="{{$bank->latitude}}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="longituted">longituted</label>
                                        <input type="text" class="form-control" name="longituted" id="longituted" value="{{$bank->longitude}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <div class="form-group" data-select2-id="7">
                                            <input autofocus name="bank_no_phone" type="text"
                                                class="form-control  @error('bank_no_phone') is-invalid @enderror"
                                                value="{{ old('bank_no_phone',$bank->bank_no_phone) }}" id="bank_no_phone">
                                            @error('bank_no_phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <div class="form-group" data-select2-id="7">
                                            <input autofocus name="bank_pos_code" type="text"
                                                class="form-control  @error('bank_pos_code') is-invalid @enderror"
                                                value="{{ old('bank_pos_code', $bank->bank_pos_code) }}" id="bank_pos_code">
                                            @error('bank_pos_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                TPAKD web By
                <a href="https://github.com/dropways" target="_blank">TPAKD</a>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('layout_admin.js_input')

    <script src="https://npmcdn.com/@turf/turf/turf.min.js"></script>
    <script>
        $('#kecamatan_id').empty();
        function chooseKabupaten() {
            let kabupaten = @json($dat_i_i_s);
            let dat_i_i_id = $('#dat_i_i_id').val();
            let kecamatans = @json($dat_i_i_s)
        }

        let kabupatens = @json($dat_i_i_s);
        let id_kabupaten = @json($kabupatens);

        if (kabupatens) {
            $('#dat_i_i_id').empty();
            kabupatens.forEach(element => {
                var elements = `<option  value="${element.id}">${element.dat_i_i_name} </option>`;
                console.log(element);
                $('#dat_i_i_id').append(elements);
            });
            $('#dat_i_i_id').val({{$bank->dat_i_i_id}}).trigger('change');

        }

        function getKecamatan() {
            let id_data = $('#dat_i_i_id').val();
            $('#kecamatan_id').empty();
            let kecamatan = id_kabupaten[id_data];
            kecamatan.forEach(element => {
                var elements = `<option  value="${element.id}">${element.kecamatan} </option>`;
                console.log(element);
                $('#kecamatan_id').append(elements);
            });
            $('#kecamatan_id').val({{$bank->kecamatan_id}}).trigger('change');
        } 

        
    </script>
    <script>
        $(document).ready(function() {
            $(".js-example-basic-single").select2();
        });
    </script>
    <script>
        mapboxgl.accessToken =
            "pk.eyJ1IjoibWFwcy1hcGxpY2F0aW9uIiwiYSI6ImNsN3NncHkxajBoMWozcG92d2F5ZGNoZTkifQ.ZS3CFdr2lHEE3W5uvQzjuA";
        var centerCoordinate = [{{$bank->longitude}}, {{$bank->latitude}}];
        const map = new mapboxgl.Map({
            container: "map", // container ID
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: "mapbox://styles/mapbox/streets-v11", // style URL
            center: centerCoordinate, // starting center in [lng, lat]
            zoom: 13, // starting zoom
            projection: "globe", // display map as a 3D globe
        });


        // console.log(map.getCenter().wrap());
        map.on("style.load", function() {
            map.on("click", function(e) {
                var coordinates = e.lngLat;
                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML("Coordinate Here: <br/>" + coordinates)
                    .addTo(map);
                document.getElementById("latitute").value = coordinates.lat;
                document.getElementById("longituted").value = coordinates.lng;
            });
        });
        map.on("move", function(e) {
            document.getElementById("center").innerHTML = map
                .getCenter()
                .toString(); //zoom
            var i = 0;
            var center = map.getCenter();
            var lat = center["lat"];
            var lang = center["lng"];
            for (const feature of featuress) {
                // create a HTML element for each feature
                var cod = feature.geometry.coordinates;
                const el = document.createElement("li");
                el.className = "marker";

                // make a marker for each feature and add it to the map
                new mapboxgl.Marker(el)
                    .setLngLat(feature.geometry.coordinates)
                    .setPopup(
                        new mapboxgl.Popup({
                            offset: 25
                        }) // add popups
                        .setHTML(
                            `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
                        )
                    )
                    .addTo(map);
            }
        });

        let dataJson = [{
                type: "Feature",
                properties: {
                    // "marker-color": "#f76565",
                    title: "Kupu-kupu Udin",
                    description: 'kantor ',
                    // "marker-symbol": "restaurant",
                },
                geometry: {
                    // type: "Point",
                    coordinates: [113.89518001044064, -2.2192465933650283],
                },
            },
            {
                type: "Feature",
                properties: {
                    // "marker-color": "#f76565",
                    title: "Kucing Udin",
                    description: 'kantor',
                    // "marker-symbol": "restaurant",
                },
                geometry: {
                    // type: "Point",
                    coordinates: [113.92553897303208, -2.201525949482445],
                },
            }
        ];

        var obj = @json($test);
        // console.log(obj);
        // var obj = jQuery.parseJSON ('{!! $test !!}');
        var obj = jQuery.parseJSON(obj);

        let featuress = obj;
        var i = 0;
        for (const feature of featuress) {
            // create a HTML element for each feature
            var cod = feature.geometry.coordinates;
            //console.log('feature.properties.title:');
            //console.log(feature.properties.title);
            const el = document.createElement("li");
            el.className = "marker";

            // make a marker for each feature and add it to the map
            new mapboxgl.Marker(el)
                .setLngLat(feature.geometry.coordinates)
                .setPopup(
                    new mapboxgl.Popup({
                        offset: 25
                    }) // add popups
                    .setHTML(
                        `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
                    )
                )
                .addTo(map);

        }



        function toMarker() {
            let fet = featuress[1];
            console.log(fet.type);
            let features = [fet];
            console.log(features);

            let co = features[0].geometry.coordinates;
            var langs = 113.88668595723811;
            var lats = 2.197786888526963;
            // we want to determine the bounds for the features data
            let bounds = features.reduce((bounds, feature) => {
                return bounds.extend(feature.geometry.coordinates);
            }, new mapboxgl.LngLatBounds(langs.lng, lats.lat));

            map.fitBounds(bounds, {
                padding: 50,
                maxZoom: 14.15,
                duration: 1000,
            });
            new mapboxgl.Marker(fet)
                .setLngLat(fet.geometry.coordinates)
                .setPopup(
                    new mapboxgl.Popup({
                        offset: 25
                    }) // add popups
                    .setHTML(
                        `<h3>${fet.properties.title}</h3><p>${fet.properties.title}</p>`
                    )
                )
                .addTo(map);
        }

        function toMarkers(vars) {
            var ind = parseInt(vars.value);
            let fet = featuress[ind];
            let features = [fet];

            let co = featuress[ind].geometry.coordinates;

            let bounds = features.reduce((bounds, feature) => {
                return bounds.extend(feature.geometry.coordinates);
            }, new mapboxgl.LngLatBounds(co.lng, co.lat));

            map.fitBounds(bounds, {
                padding: 50,
                maxZoom: 14.15,
                duration: 1000,
            });
            new mapboxgl.Marker(fet)
                .setLngLat(fet.geometry.coordinates)
                .setPopup(
                    new mapboxgl.Popup({
                        offset: 25
                    }) // add popups
                    .setHTML(
                        `<h3>${fet.properties.title}</h3><p>${fet.properties.title}</p>`
                    )
                )
                .addTo(map);
        }

        function toMark(vars) {
            // console.log(vars.value);
            var ind = parseInt(vars);
            let fet = featuress[ind];
            // console.log(fet);
            let features = [fet];

            let co = featuress[ind].geometry.coordinates;

            let bounds = features.reduce((bounds, feature) => {
                return bounds.extend(feature.geometry.coordinates);
            }, new mapboxgl.LngLatBounds(co.lng, co.lat));

            map.fitBounds(bounds, {
                padding: 50,
                maxZoom: 14.15,
                duration: 1000,
            });
            new mapboxgl.Marker(fet)
                .setLngLat(fet.geometry.coordinates)
                .setPopup(
                    new mapboxgl.Popup({
                        offset: 25
                    }) // add popups
                    .setHTML(
                        `<h3>${fet.properties.title}</h3><p>${fet.properties.title}</p>`
                    )
                )
                .addTo(map);
        }


        //add search
        map.addControl(
            new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl
            })
        );
        // Add geolocate control to the map.
        map.addControl(
            new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true,
                },
                // When active the map will receive updates to the device's location as it changes.
                trackUserLocation: true,
                // Draw an arrow next to the location dot to indicate which direction the device is heading.
                showUserHeading: true,
            })
        );
    </script>
    <script>
        function previewImage(element) {

            const image = document.querySelector('#file');
            const imgPreview = document.querySelector('#showImage');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

            document.getElementById('III').innerHTML = element;
        }
    </script>
@endsection
