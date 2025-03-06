@extends('layouts.admin')
@section('title')
    Crear Empresa
@endsection

@section('content')
<br>
    <h4 class="m-0">Registro de Empresa</h4>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h6 class="card-title">Ingrese los datos</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="logo">Logo</label> <b>*</b>
                                <input type="file" id="file" class="form-control" name="logo" required value="{{old('logo')}}">
                                <center> <output id="list"></output></center>
                                
                                {{-- AJAX PARA MOSTRAR LA IMAGEN  --}}
                                <script>
                                    function archivo(evt) {
                                      var files = evt.target.files; // FileList object
                                      // Obtenemos la imagen del campo "file".
                                        for (var i = 0, f; f = files[i]; i++) {
                                            // Solo admitimos imágenes.
                                            if (!f.type.match('image.*')) {
                                                continue;
                                            }
                                            var reader = new FileReader();
                                            reader.onload = (function(theFile) {
                                                return function(e) {
                                                // Insertamos la imagen
                                                document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="70%" title="', escape(theFile.name), '"/>'].join('');
                                                };
                                            })(f);
                                            reader.readAsDataURL(f);
                                        }
                                    }
                                        document.getElementById('file').addEventListener('change', archivo, false);
                                </script>

                                @error('logo')
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="pais">Paìs</label> <b>*</b>
                                        <select name="" id="select_pais" class="form-control">
                                            <option value="" disabled selected>Seleccionar Pais..</option>
                                                @foreach ($paises as $paise)
                                                <option value="{{$paise->name}}">{{$paise->name}}</option>
                                                @endforeach
                                        </select>
                                        <script>
                                            $('#select_pais').on('change',function(){
                                                var pais = $('#select_pais').val();
                                                //alert(pais);
                                                if (pais) {
                                                    $.ajax({
                                                        url:"",
                                                        type: "GET",
                                                        success: function (data) {
                                                            $('#respuesta pais').html();
                                                        }
                                                    });
                                                }else{
                                                    

                                                    
                                                    

                                                    
                            
                                                    alert('Debe selecionar un pais');
                                                }

                                            });
                                        </script>
                                    </div>
                                </div>
                                

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="pais">Estado</label> <b>*</b>
                                        <select name="" id="" class="form-control">
                                            <option value="" disabled selected>Seleccionar Estado..</option>
                                                @foreach ($estados as $estado)
                                                <option value="{{$estado->name}}">{{$estado->name}}</option>
                                                @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="ciudad">Ciudad</label> <b>*</b>
                                        <input type="text" class="form-control" name="ciudad" required value="{{old('ciudad')}}">
                                        @error('ciudad')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="nombre_empresa">Nombre de la Empresa</label> <b>*</b>
                                        <input type="text" class="form-control" name="nombre_empresa" required value="{{old('nombre_empresa')}}">
                                        @error('nombre_empresa')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="tipo_empresa">Tipo de empresa</label> <b>*</b>
                                        <input type="text" class="form-control" name="tipo_empresa" required value="{{old('tipo_empresa')}}">
                                        @error('tipo_empresa')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="rfc">RFC</label> <b>*</b>
                                        <input type="text" class="form-control" name="rfc" required value="{{old('rfc')}}">
                                        @error('rfc')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                

                                

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="telefono">Telefono de la empresa</label> <b>*</b>
                                        <input type="text" class="form-control" name="telefono" required value="{{old('telefono')}}">
                                        @error('telefono')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="correo">Correo de la empresa</label> <b>*</b>
                                        <input type="text" class="form-control" name="correo" required value="{{old('correo')}}">
                                        @error('correo')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="cantidad_impuesto">Cantidad de Impuesto</label> <b>*</b>
                                        <input type="number" class="form-control" name="cantidad_impuesto" required value="{{old('cantidad_impuesto')}}">
                                        @error('cantidad_impuesto')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                

                                

                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="nombre_impuesto">Nombre del Impuesto</label> <b>*</b>
                                        <input type="text" class="form-control" name="nombre_impuesto" required value="{{old('nombre_impuesto')}}">
                                        @error('nombre_impuesto')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="moneda">Moneda</label> <b>*</b>
                                        <select name="" id="" class="form-control">
                                            <option value="Mexicanos">MX</option>
                                        </select>
                                        @error('moneda')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="codigo_postal">Codigo Postal</label> <b>*</b>
                                        <select name="" id="" class="form-control">
                                            <option value="" disabled selected>Seleccionar Codigo postal..</option>
                                                @foreach ($paises as $paise)
                                                <option value="{{$paise->phone_code}}">{{$paise->phone_code}}</option>
                                                @endforeach

                                        </select>
                                        @error('codigo_postal')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                
                            </div>


                            <div class="row">{{-- INICIO ROW  --}}
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="direccion">Direccion</label> <b>*</b>

                                        <input id="pac-input" class="form-control" name="direccion" type="text" placeholder="Buscar..." required value="{{old('direccion')}}">
                                        <br>
                                        <div id="map" style="width: 100%;height: 400px"></div>

                                        {{-- <input type="text" class="form-control" name="direccion" required value="{{old('direccion')}}"> --}}
                                        @error('direccion')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                        </div>{{-- FIN ROW  --}}
                        <script src="https://maps.googleapis.com/maps/api/js?key={{env('MAP_KEY')}}&libraries=places&callback=initAutocomplete"
        async defer>
    </script>

        <script>
            // This example adds a search box to a map, using the Google Place Autocomplete
            // feature. People can enter geographical searches. The search box will return a
            // pick list containing a mix of places and predicted search terms.
        
            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        
            function initAutocomplete() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    // Coordenadas de Monterrey, N.L., México
                    center: {lat: 19.2826, lng: -99.6557}, //{lat: -33.8688, lng: 151.2195},
                    zoom: 13,
                    mapTypeId: 'roadmap'
                });
        
                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.SearchBox(input);
                // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input); // determina la posicion
        
                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function() {
                    searchBox.setBounds(map.getBounds());
                });
        
                var markers = [];
                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function() {
                    var places = searchBox.getPlaces();
        
                    if (places.length == 0) {
                        return;
                    }
        
                    // Clear out the old markers.
                    markers.forEach(function(marker) {
                        marker.setMap(null);
                    });
                    markers = [];
        
                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    /*
                     * Para fines de minimizar las adecuaciones debido a que es este una demostración de adaptación mínima de código, se reemplaza forEach por some.
                     */
                    // places.forEach(function(place) {
                    places.some(function(place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }
                        var icon = {
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
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
        
                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                        // some interrumpe su ejecución en cuanto devuelve un valor verdadero (true)
                        return true;
                    });
                    map.fitBounds(bounds);
                });
            }
        </script>
                    </div> {{-- FIN ROW PRINCIPAL --}}
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <a href="{{'/admin/clientes'}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection