@extends('layout_pub.main')
@section('css')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
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
            /* background-image: url("{{ env('APP_URL') }}assets/img/marker.png");
            background-size: 40px; */
            /* background-position: center center; */
            background-repeat: no-repeat;
            margin-right: 20px;
            width: 200px;
            height: 100px;
            font-size: 1.4rem;
            color: red;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center">

                <h2>MAPS</h2>
                <ol>
                    <li><a href="/">TPKAD</a></li>
                    <li>Maps</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <section id="contact" class="contact">
            <div class="container position-relative" data-aos="fade-up">

                <div class="row gy-4 d-flex justify-content-end">
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="250">
                        <div class="container" data-aos="fade-up">
                            <div id="center">Koordinat</div>
                            <div id="locate_maps">
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

                    </div><!-- End Contact Form -->

                    <div class="col-lg-4 blog" data-aos="fade-up" data-aos-delay="400">
                        <div class="sidebar ps-lg-4">

                            <!--<select id="cars" onchange="toMarkers(this)" class="country" style="width: 80%" name="state"></select>-->
                            <!--<div class="container" style="height: 300px">-->

                        </div>
                        <div class="card">
                            <div class="form-group">
                                <h4>Kabupaten</h4>
                                <select onchange="getKecamatan()" id="kabupaten_id" class="form-select mb-10"
                                    aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    
                                </select>
                            </div>
                            <div class="form-group mt-20">
                                <h4>Kecamatan</h4>
                                <select id="kecamatan_id" onchange="reloadMaps()" class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Kabupaten dahulu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kabupaten</label>
                            </div>
                        </div>
                        <div class="card">
                            <div class="footer-links">
                                <h4>Rekomendasi Bank Disekitar</h4>
                                <ul id="nearby"></ul>
                            </div>
                        </div>
                    </div><!-- End Blog Sidebar -->
                </div>

            </div>

            </div>
        </section>
        <!-- End Blog Section -->

    </main><!-- End #main -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://npmcdn.com/@turf/turf/turf.min.js"></script>
    <script src="https://npmcdn.com/@turf/turf/turf.min.js"></script>
    <script>
        
        let kabupatens = @json($kabupatens);
        let id_kabupaten = @json($kecamatans);
        console.log(kabupatens);
        if (kabupatens) {
            console.log('element');
            $('#kabupaten_id').empty();
            $('#kabupaten_id').append(` <option selected>Pilih Kabupaten</option>`);
            kabupatens.forEach(element => {
                var elements = `<option  value="${element.id}">${element.dat_i_i_name} </option>`;
                console.log(element);
                $('#kabupaten_id').append(elements);
            });
        }

        function getKecamatan() {
            let id_data = $('#kabupaten_id').val();
            console.log(id_data);
            $('#kecamatan_id').empty();
            let kecamatan = id_kabupaten[id_data];
            kecamatan.forEach(element => {
                var elements = `<option  value="${element.id}">${element.kecamatan} </option>`;
                console.log(element);
                $('#kecamatan_id').append(elements);
            });
        }

        function modalShow(id) {
            console.log(id);
            window.location.href = '/pilih/' + id;
        }


    </script>

    <script>
        $(document).ready(function() {
            $(".js-example-basic-single").select2();
        });
    </script>

    <script>
        let feat = '';
        let featuress;
        let isKecamatan = false;
        function reloadMaps(){
            let kecamatan_id = $('#kecamatan_id').val();
            $.ajax({
                url: '/maps/data',
                type: "POST",
                data:  {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        
                        kecamatan_id: kecamatan_id
                    },
                success: function(response) {
					
                    feat = response.data;
                    
                    if(feat.length > 2){
                        isKecamatan = true;
                        console.log('berhasil ssss');
                        console.log(feat);
                        obj = jQuery.parseJSON(feat);
                        featuress = obj
                        console.log(arr_feature);
                        arr_feature.forEach(element => {
                            element.remove();
                        });
                        addMarkers();
                        // mapss();
                    }else{
                        isKecamatan = false;
                        console.log('gagal ssss');
                        // mapss();
                    }
                    // return false;
					// $('#table-'+idForm).DataTable().ajax.reload();
                },
                error: function(response) {
                    console.log('gagal ')
				}
            });
        }
    //   function mapss(){
       
        
        $('#nearby').empty();
        $('#locate_maps').empty();
        let element_maps = ` <div id="map"
                                                style="
                                                    width: 100%;
                                                    height: 500px;
                                                    border-radius: 10px;
                                                    border: 1px solid orange;">
                                            </div>`;
        $('#locate_maps').append(element_maps);
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
        console.log('feat : ');
        console.log(feat);
        console.log('feat : ');
        map.on("move", function(e) {
            var i = 0;
            var center = map.getCenter();
            var lat = center["lat"];
            var lang = center["lng"];
            $('#nearby').empty();
            document.getElementById("nearby").innerHTML = "";

            
            for (const feature of featuress) {
                // create a HTML element for each feature
                var cod = feature.geometry.coordinates;
                // const el = document.createElement("li");
                // el.className = "marker";
                // el.textContent = feature.properties.title;
                

                // new mapboxgl.Marker(el)
                //     .setLngLat(feature.geometry.coordinates)
                //     .setPopup(
                //         new mapboxgl.Popup({
                //             offset: 25
                //         }) // add popups
                //         .setHTML(
                //             `<a href="#" onclick="modalShow(${feature.properties.bank_id})"><h3>${feature.properties.title}</h3><p>${feature.properties.description}</p></a>`
                //         )
                //     )
                //     .addTo(map);


                var from = turf.point([lang, lat]);
                var to = turf.point([cod[0], cod[1]]);
                var options = {
                    units: "kilometers"
                };

                var distance = turf.distance(from, to, options);
                console.log(i);
                console.log(distance);
                if (distance < 4) {
                    var ul = document.getElementById("nearby");
                    var li = document.createElement("li");

                    var ii = document.createElement("i");
                    ii.classList.add("bi", "bi-dash");

                    var texta = document.createTextNode(feature.properties.title);
                    var aa = document.createElement("a");
                    aa.appendChild(texta);
                    aa.href = "#";
                    aa.setAttribute("onclick", "toMark(" + i + ");");

                    // li.appendChild(ii);
                    li.appendChild(aa);
                    ul.appendChild(li);
                    //
                }
                i++;
            }
        });

        
  
        var obj = @json($test);

        
        // var obj = jQuery.parseJSON ('{!! $test !!}');
       
        var obj = jQuery.parseJSON(obj);
        if(isKecamatan == true){
            console.log('true ');
            obj = jQuery.parseJSON(feat);
            console.log('feat json :');
            console.log(obj);
            //  obj = feat;
        }else{
            console.log('aaaa');
        }
        console.log('obj');  
        console.log(obj);
        featuress = obj;
        var i = 0;
        var arr_feature = [];
        var feature_single;
        console.log("featuress : ");console.log(featuress);
        for (const feature of featuress) {
            // create a HTML element for each feature
            var cod = feature.geometry.coordinates;
            const el = document.createElement("li");
            el.className = "marker";
            el.textContent = feature.properties.title;

            // make a marker for each feature and add it to the map
            feature_single = new mapboxgl.Marker(el)
                .setLngLat(feature.geometry.coordinates)
                .setPopup(
                    new mapboxgl.Popup({
                        offset: 25
                    }) // add popups
                    .setHTML(
                            `<a href="#" onclick="modalShow(${feature.properties.bank_id})"><h3>${feature.properties.title}</h3><p>${feature.properties.description}</p></a>`
                        )
                )
                .addTo(map);
            
            arr_feature.push(feature_single)

            var x = document.getElementById("select-maps");
            var option = document.createElement("option");
            var coordinates = i;
            option.value = coordinates;
            option.setAttribute("onclick", "toMark(" + coordinates + ");");
            option.text = feature.properties.title;
            // x.add(option);

            var ul = document.getElementById("nearby");
            var li = document.createElement("li");

            var text = document.createTextNode(feature.properties.title);
            var ii = document.createElement("i");
            ii.classList.add("bi", "bi-dash");

            var texta = document.createTextNode(feature.properties.title);
            var aa = document.createElement("a");
            aa.appendChild(texta);
            aa.href = "#";
            aa.setAttribute("onclick", "toMark(" + coordinates + ");");

            li.appendChild(ii);
            li.appendChild(aa);
            ul.appendChild(li);

            var from = turf.point([centerCoordinate[0], centerCoordinate[1]]);
            var to = turf.point([cod[0], cod[1]]);
            var options = {
                units: "kilometers"
            };

            var distance = turf.distance(from, to, options);
            console.log(distance);
            i++;
        }

        function addMarkers(){
              for (const feature of featuress) {
            // create a HTML element for each feature
                var cod = feature.geometry.coordinates;
                const el = document.createElement("li");
                el.className = "marker";
                el.textContent = feature.properties.title;

                // make a marker for each feature and add it to the map
                feature_single = new mapboxgl.Marker(el)
                    .setLngLat(feature.geometry.coordinates)
                    .setPopup(
                        new mapboxgl.Popup({
                            offset: 25
                        }) // add popups
                        .setHTML(
                            `<a href="#" onclick="modalShow(${feature.properties.bank_id})"><h3>${feature.properties.title}</h3><p>${feature.properties.description}</p></a>`
                        )
                    )
                    .addTo(map);
                
                arr_feature.push(feature_single)

                var x = document.getElementById("select-maps");
                var option = document.createElement("option");
                var coordinates = i;
                option.value = coordinates;
                option.setAttribute("onclick", "toMark(" + coordinates + ");");
                option.text = feature.properties.title;
                // x.add(option);

                var ul = document.getElementById("nearby");
                var li = document.createElement("li");

                var text = document.createTextNode(feature.properties.title);
                var ii = document.createElement("i");
                ii.classList.add("bi", "bi-dash");

                var texta = document.createTextNode(feature.properties.title);
                var aa = document.createElement("a");
                aa.appendChild(texta);
                aa.href = "#";
                aa.setAttribute("onclick", "toMark(" + coordinates + ");");

                li.appendChild(ii);
                li.appendChild(aa);
                ul.appendChild(li);

                var from = turf.point([centerCoordinate[0], centerCoordinate[1]]);
                var to = turf.point([cod[0], cod[1]]);
                var options = {
                    units: "kilometers"
                };

                var distance = turf.distance(from, to, options);
                console.log(distance);
                i++;
            }
        }

        







        //add search

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

    //   }
      



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
            console.log(vars);
            var ind = parseInt(vars);
            let fet = featuress[ind];
            
            let features = [fet];

            let co = featuress[ind].geometry.coordinates;
            console.log(co);
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
    </script>
@endsection
