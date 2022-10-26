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
<link rel="stylesheet"
    href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
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
{{-- @dd($bank) --}}

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="pd-20 card-box mb-30">

            <form action="/my-bank" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="isedit" value="true">
                <input type="hidden" name="id" id="id" value="{{ (!empty(session('dataUser')->bank_id)) ? session('dataUser')->bank_id :'' }}">
                <div class="row">
                    {{-- id --}}
                    <div class="col-2">
                        <div class="form-group">
                            <label>ID</label>
                            <input autofocus name="id_bank" type="text"
                                class="form-control  @error('id_bank') is-invalid @enderror"
                                value="{{ old('id_bank', $bank->id_bank) }}" id="id_bank">
                            @error('id_bank')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-5">
                        <div class="form-group">
                            <label>Bank Name</label>
                            <div class="form-group" data-select3-id="7">
                                <select class="custom-select2 form-control select2-hidden-accessible"
                                    name="bank_name_id" style="width: 100%; height: 38px" data-select2-id="1"
                                    tabindex="-1" aria-hidden="true">
                                    @foreach($bank_names as $bank_name)
                                    @if(old('bank_name_id',$bank->bank_name_id ) == $bank_name->id)
                                    <option value="{{ $bank_name->id }}" selected>{{ $bank_name->bank_name }}</option>
                                    @else
                                    <option value="{{ $bank_name->id }}">{{ $bank_name->bank_name }}</option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('bank_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-5">
                        <div class="form-group">
                            <label>Nama Status Kantor</label>
                            <div class="form-group" data-select2-id="7">
                                <select
                                    class=" custom-select form-select @error('office_status_id') is-invalid @enderror"
                                    name="office_status_id">
                                    @foreach($office_statuss as $office_status)
                                    @if(old('office_status_id',$bank->office_status_id ) == $office_status->id)
                                    <option value="{{ $office_status->id }}" selected>{{ $office_status->office_status
                                        }}</option>
                                    @else
                                    <option value="{{ $office_status->id }}">{{ $office_status->office_status }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('office_status_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    {{-- id --}}
                    <div class="col-4">
                        <div class="form-group">
                            <label>Kegiatan Operasional</label>
                            <div class="form-group" data-select2-id="7">
                                <select
                                    class=" custom-select form-select @error('bank_operationa_id') is-invalid @enderror"
                                    name="bank_operational_id">
                                    @foreach($bank_operationals as $bank_operational)
                                    @if(old('bank_operational_id',$bank->bank_operational_id ) ==
                                    $bank_operational->id)
                                    <option value="{{ $bank_operational->id }}" selected>{{
                                        $bank_operational->bank_operational
                                        }}</option>
                                    @else
                                    <option value="{{ $bank_operational->id }}">{{ $bank_operational->bank_operational
                                        }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('bank_operational_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-4">
                        <div class="form-group">
                            <label>Berdasarkan Kepemilikan</label>
                            <div class="form-group" data-select3-id="7">
                                <select class=" custom-select form-select @error('bank_owner_id') is-invalid @enderror"
                                    name="bank_owner_id">
                                    @foreach($bank_owners as $bank_owner)
                                    @if(old('bank_owner_id',$bank->bank_owner_id ) ==
                                    $bank_owner->id)
                                    <option value="{{ $bank_owner->id }}" selected>{{
                                        $bank_owner->bank_owner
                                        }}</option>
                                    @else
                                    <option value="{{ $bank_owner->id }}">{{ $bank_owner->bank_owner
                                        }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('bank_owner_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    {{-- id --}}
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>Dat I</label>
                            <div class="form-group" data-select2-id="7">
                                <select class=" custom-select form-select @error('dat_i_id') is-invalid @enderror"
                                    name="dat_i_id">
                                    @foreach($dat_i_s as $dat_i)
                                    @if(old('dat_i_id',$bank->dat_i_id ) == $dat_i->id)
                                    <option value="{{ $dat_i->id }}" selected>{{ $dat_i->dat_i_code
                                        }}</option>
                                    @else
                                    <option value="{{ $dat_i->id }}">{{ $dat_i->dat_i_code.' - '.$dat_i->dat_i_name }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('dat_i_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>Dat II</label>
                            <div class="form-group" data-select2-id="7">
                                <select class=" custom-select form-select @error('dat_i_i_id') is-invalid @enderror"
                                    name="dat_i_i_id">
                                    @foreach($dat_i_i_s as $dat_i_i)
                                    @if(old('dat_i_i_id',$bank->dat_i_i_id ) == $dat_i_i->id)
                                    <option value="{{ $dat_i_i->id }}" selected>{{ $dat_i_i->dat_i_i_code
                                        }}</option>
                                    @else
                                    <option value="{{ $dat_i_i->id }}">{{ $dat_i_i->dat_i_i_code.' -
                                        '.$dat_i_i->dat_i_i_name }}
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
                    <div class="col-3">
                        <div class="form-group">
                            <label>KR</label>
                            <div class="form-group" data-select2-id="7">
                                <select class=" custom-select form-select @error('kr_id') is-invalid @enderror"
                                    name="kr_id">
                                    @foreach($krs as $kr)
                                    @if(old('kr_id',$bank->kr_id ) ==
                                    $kr->id)
                                    <option value="{{ $kr->id }}" selected>{{
                                        $kr->kr
                                        }}</option>
                                    @else
                                    <option value="{{ $kr->id }}">{{ $kr->kr
                                        }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('kr_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>Jenis Usaha</label>
                            <div class="form-group" data-select2-id="7">
                                <select class=" custom-select form-select @error('job_desk_id') is-invalid @enderror"
                                    name="job_desk_id">
                                    @foreach($job_desks as $job_desk)
                                    @if(old('job_desk_id',$bank->job_desk_id ) ==
                                    $job_desk->id)
                                    <option value="{{ $job_desk->id }}" selected>{{
                                        $job_desk->job_desk
                                        }}</option>
                                    @else
                                    <option value="{{ $job_desk->id }}">{{ $job_desk->job_desk
                                        }}
                                    </option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('job_desk_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>


                </div>

                {{-- @dd($bank) --}}
                <div class="form-group">
                    <label>Nama Kantor</label>
                    <input autofocus name="bank_name" type="text"
                        class="form-control  @error('bank_name') is-invalid @enderror" value="{{ old('bank_name',$bank->bank_name) }}"
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

                <div class="row">
                    {{-- id --}}
                    {{-- Bank name --}}
                    <div class="col-2">
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
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>No Handphone</label>
                            <div class="form-group" data-select2-id="7">
                                <input autofocus name="bank_no_phone" type="text"
                                    class="form-control  @error('bank_no_phone') is-invalid @enderror"
                                    value="{{ old('bank_no_phone', $bank->bank_no_phone) }}" id="bank_no_phone">
                                @error('bank_no_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- id --}}
                    {{-- Bank name --}}
                    <div class="col-2">
                        <div class="form-group">
                            <label>Nomor Izin</label>
                            <div class="form-group" data-select2-id="7">
                                <input autofocus name="bank_no_permission" type="text"
                                    class="form-control  @error('bank_no_permission') is-invalid @enderror"
                                    value="{{ old('bank_no_permission', $bank->bank_no_permission) }}" id="bank_no_permission">
                                @error('bank_no_permission')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    {{-- Bank name --}}
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tanggal Izin</label>
                            <div class="form-group" data-select2-id="7">
                                <input name="bank_date_permission" class="form-control date-picker"
                                    placeholder="Select Date" value="{{ old('bank_date_permission', $bank->bank_date_permission) }}" type="text">

                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tanggal Mulai Operasi</label>
                            <div class="form-group" data-select2-id="7">
                                <input name="bank_date_operation" class="form-control date-picker"
                                    placeholder="Select Date" type="text" value="{{ old('bank_date_operation', $bank->bank_date_operation) }}">

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
                                <div id="map" style="
                                width: 100%;
                                height: 500px;
                                border-radius: 10px;
                                border: 1px solid orange;
                              "></div>
                            </div>
                        </div>
                        <div class="col-4">

                            <div class="container" style="height: 300px">
                                <div class="form-group">
                                    <label for="latitute">Latitute</label>
                                    <input type="text" name="latitute" value="{{ old('latitute', $bank->latitude) }}" class="form-control" id="latitute" />
                                </div>
                                <div class="form-group">
                                    <label for="longituted">longituted</label>
                                    <input type="text" class="form-control" name="longituted" value="{{ old('longitude', $bank->longitude) }}" id="longituted" />
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
    $(document).ready(function () {
    $(".js-example-basic-single").select2();
  });
</script>
<script>
    mapboxgl.accessToken =
        "pk.eyJ1IjoibWFwcy1hcGxpY2F0aW9uIiwiYSI6ImNsN3NncHkxajBoMWozcG92d2F5ZGNoZTkifQ.ZS3CFdr2lHEE3W5uvQzjuA";
    var centerCoordinate = [113.91036333125942, -2.2099168524873676];
    const map = new mapboxgl.Map({
        container: "map", // container ID
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: "mapbox://styles/mapbox/streets-v11", // style URL
        center: centerCoordinate, // starting center in [lng, lat]
        zoom: 13, // starting zoom
        projection: "globe", // display map as a 3D globe
    });
  
  
    // console.log(map.getCenter().wrap());
    map.on("style.load", function () {
        map.on("click", function (e) {
        var coordinates = e.lngLat;
        new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML("Coordinate Here: <br/>" + coordinates)
            .addTo(map);
            console.log('coordinates')
            console.log(coordinates.lat)
            $('#latitute').val(coordinates.lat) 
            $('#longituted').val(coordinates.lng) 
        // document.getElementById("longituted").value = coordinates.lng
        });
    });
    map.on("move", function (e) {
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
            new mapboxgl.Popup({ offset: 25 }) // add popups
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
        }];
    
    var obj = @json($test);
    // console.log(obj);
    // var obj = jQuery.parseJSON ('{!! $test !!}');
    var obj = jQuery.parseJSON(obj);

    let featuress = obj;
  var i = 0;
  for (const feature of featuress) {
    // create a HTML element for each feature
    var cod = feature.geometry.coordinates;
    console.log('feature.properties.title:');
    console.log(feature.properties.title);
    const el = document.createElement("li");
    el.className = "marker";

    // make a marker for each feature and add it to the map
    new mapboxgl.Marker(el)
      .setLngLat(feature.geometry.coordinates)
      .setPopup(
        new mapboxgl.Popup({ offset: 25 }) // add popups
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
        new mapboxgl.Popup({ offset: 25 }) // add popups
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
        new mapboxgl.Popup({ offset: 25 }) // add popups
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
        new mapboxgl.Popup({ offset: 25 }) // add popups
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
    function previewImage(element){

        const image = document.querySelector('#file');
        const imgPreview = document.querySelector('#showImage');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }

        document.getElementById('III').innerHTML
                = element;
    }
</script>
@endsection