
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <footer class="page-footer" role="contentinfo">
                        <div class="d-flex align-items-center flex-1 text-muted">
                            <span class="hidden-md-down fw-700">2019 © SmartAdmin by&nbsp;<a href='https://www.gotbootstrap.com' class='text-primary fw-500' title='gotbootstrap.com' target='_blank'>gotbootstrap.com</a></span>
                        </div>
                        <!-- <div>
                            <ul class="list-table m-0">
                                <li><a href="intel_introduction.html" class="text-secondary fw-700">About</a></li>
                                <li class="pl-3"><a href="info_app_licensing.html" class="text-secondary fw-700">License</a></li>
                                <li class="pl-3"><a href="info_app_docs.html" class="text-secondary fw-700">Documentation</a></li>
                                <li class="pl-3 fs-xl"><a href="https://wrapbootstrap.com/user/MyOrange" class="text-secondary" target="_blank"><i class="fal fa-question-circle" aria-hidden="true"></i></a></li>
                            </ul>
                        </div> -->
                    </footer>
                    <!-- END Page Footer -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- BEGIN Page Settings -->
        <div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-right modal-md">
                <div class="modal-content">
                    <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
                        <h4 class="m-0 text-center color-white">
                            Layout Settings
                            <small class="mb-0 opacity-80">User Interface Settings</small>
                        </h4>
                        <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="settings-panel">
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        App Layout
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="fh">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="header-function-fixed"></a>
                                <span class="onoffswitch-title">Fixed Header</span>
                                <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
                            </div>
                            <div class="list" id="nff">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-fixed"></a>
                                <span class="onoffswitch-title">Fixed Navigation</span>
                                <span class="onoffswitch-title-desc">left panel is fixed</span>
                            </div>
                            <div class="list" id="nfm">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-minify"></a>
                                <span class="onoffswitch-title">Minify Navigation</span>
                                <span class="onoffswitch-title-desc">Skew nav to maximize space</span>
                            </div>
                            <div class="list" id="nfh">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-hidden"></a>
                                <span class="onoffswitch-title">Hide Navigation</span>
                                <span class="onoffswitch-title-desc">roll mouse on edge to reveal</span>
                            </div>
                            <div class="list" id="nft">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-top"></a>
                                <span class="onoffswitch-title">Top Navigation</span>
                                <span class="onoffswitch-title-desc">Relocate left pane to top</span>
                            </div>
                            <div class="list" id="mmb">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-main-boxed"></a>
                                <span class="onoffswitch-title">Boxed Layout</span>
                                <span class="onoffswitch-title-desc">Encapsulates to a container</span>
                            </div>
                            <div class="expanded">
                                <ul class="">
                                    <li>
                                        <div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
                                    </li>
                                    <li>
                                        <div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
                                    </li>
                                    <li>
                                        <div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
                                    </li>
                                    <li>
                                        <div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
                                    </li>
                                </ul>
                                <div class="list" id="mbgf">
                                    <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-fixed-bg"></a>
                                    <span class="onoffswitch-title">Fixed Background</span>
                                </div>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Mobile Menu
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="nmp">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-push"></a>
                                <span class="onoffswitch-title">Push Content</span>
                                <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
                            </div>
                            <div class="list" id="nmno">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-no-overlay"></a>
                                <span class="onoffswitch-title">No Overlay</span>
                                <span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
                            </div>
                            <div class="list" id="sldo">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-slide-out"></a>
                                <span class="onoffswitch-title">Off-Canvas <sup>(beta)</sup></span>
                                <span class="onoffswitch-title-desc">Content overlaps menu</span>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Accessibility
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="mbf">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-bigger-font"></a>
                                <span class="onoffswitch-title">Bigger Content Font</span>
                                <span class="onoffswitch-title-desc">content fonts are bigger for readability</span>
                            </div>
                            <div class="list" id="mhc">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-high-contrast"></a>
                                <span class="onoffswitch-title">High Contrast Text (WCAG 2 AA)</span>
                                <span class="onoffswitch-title-desc">4.5:1 text contrast ratio</span>
                            </div>
                            <div class="list" id="mcb">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-color-blind"></a>
                                <span class="onoffswitch-title">Daltonism <sup>(beta)</sup> </span>
                                <span class="onoffswitch-title-desc">color vision deficiency</span>
                            </div>
                            <div class="list" id="mpc">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-pace-custom"></a>
                                <span class="onoffswitch-title">Preloader Inside</span>
                                <span class="onoffswitch-title-desc">preloader will be inside content</span>
                            </div>
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Global Modifications
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="mcbg">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-clean-page-bg"></a>
                                <span class="onoffswitch-title">Clean Page Background</span>
                                <span class="onoffswitch-title-desc">adds more whitespace</span>
                            </div>
                            <div class="list" id="mhni">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-nav-icons"></a>
                                <span class="onoffswitch-title">Hide Navigation Icons</span>
                                <span class="onoffswitch-title-desc">invisible navigation icons</span>
                            </div>
                            <div class="list" id="dan">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-disable-animation"></a>
                                <span class="onoffswitch-title">Disable CSS Animation</span>
                                <span class="onoffswitch-title-desc">Disables CSS based animations</span>
                            </div>
                            <div class="list" id="mhic">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-info-card"></a>
                                <span class="onoffswitch-title">Hide Info Card</span>
                                <span class="onoffswitch-title-desc">Hides info card from left panel</span>
                            </div>
                            <div class="list" id="mlph">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-lean-subheader"></a>
                                <span class="onoffswitch-title">Lean Subheader</span>
                                <span class="onoffswitch-title-desc">distinguished page header</span>
                            </div>
                            <div class="list" id="mnl">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-nav-link"></a>
                                <span class="onoffswitch-title">Hierarchical Navigation</span>
                                <span class="onoffswitch-title-desc">Clear breakdown of nav links</span>
                            </div>
                            <div class="list mt-1">
                                <span class="onoffswitch-title">Global Font Size <small>(RESETS ON REFRESH)</small> </span>
                                <div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-sm" data-target="html">
                                        <input type="radio" name="changeFrontSize"> SM
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text" data-target="html">
                                        <input type="radio" name="changeFrontSize" checked=""> MD
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-lg" data-target="html">
                                        <input type="radio" name="changeFrontSize"> LG
                                    </label>
                                    <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-xl" data-target="html">
                                        <input type="radio" name="changeFrontSize"> XL
                                    </label>
                                </div>
                                <span class="onoffswitch-title-desc d-block mb-g">Change <strong>root</strong> font size to effect rem values</span>
                            </div>
                            <div class="mt-2 d-table w-100 pl-5 pr-3">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Theme colors <small>(overlays base css)</small>
                                    </h5>
                                    <div class="fs-xs text-muted p-2 alert alert-warning mt-3 mb-0">
                                        <i class="fal fa-exclamation-triangle text-warning mr-2"></i>Due to network latency and CPU utilization, you may experience a brief flickering effect on page load which may show the intial applied theme for a split second. Setting the prefered style/theme in the header will prevent this from happening.
                                    </div>
                                </div>
                            </div>
                            <div class="expanded theme-colors pl-5 pr-3">
                                <ul class="m-0">
                                    <li><a href="#" id="myapp-0" data-action="theme-update" data-themesave data-theme="" data-toggle="tooltip" data-placement="top" title="Wisteria (base css)" data-original-title="Wisteria (base css)"></a></li>
                                    <li><a href="#" id="myapp-1" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-1.css" data-toggle="tooltip" data-placement="top" title="Tapestry" data-original-title="Tapestry"></a></li>
                                    <li><a href="#" id="myapp-2" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-2.css" data-toggle="tooltip" data-placement="top" title="Atlantis" data-original-title="Atlantis"></a></li>
                                    <li><a href="#" id="myapp-3" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-3.css" data-toggle="tooltip" data-placement="top" title="Indigo" data-original-title="Indigo"></a></li>
                                    <li><a href="#" id="myapp-4" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-4.css" data-toggle="tooltip" data-placement="top" title="Dodger Blue" data-original-title="Dodger Blue"></a></li>
                                    <li><a href="#" id="myapp-5" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-5.css" data-toggle="tooltip" data-placement="top" title="Tradewind" data-original-title="Tradewind"></a></li>
                                    <li><a href="#" id="myapp-6" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-6.css" data-toggle="tooltip" data-placement="top" title="Cranberry" data-original-title="Cranberry"></a></li>
                                    <li><a href="#" id="myapp-7" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-7.css" data-toggle="tooltip" data-placement="top" title="Oslo Gray" data-original-title="Oslo Gray"></a></li>
                                    <li><a href="#" id="myapp-8" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-8.css" data-toggle="tooltip" data-placement="top" title="Chetwode Blue" data-original-title="Chetwode Blue"></a></li>
                                    <li><a href="#" id="myapp-9" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-9.css" data-toggle="tooltip" data-placement="top" title="Apricot" data-original-title="Apricot"></a></li>
                                    <li><a href="#" id="myapp-10" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-10.css" data-toggle="tooltip" data-placement="top" title="Blue Smoke" data-original-title="Blue Smoke"></a></li>
                                    <li><a href="#" id="myapp-11" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-11.css" data-toggle="tooltip" data-placement="top" title="Green Smoke" data-original-title="Green Smoke"></a></li>
                                    <li><a href="#" id="myapp-12" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-12.css" data-toggle="tooltip" data-placement="top" title="Wild Blue Yonder" data-original-title="Wild Blue Yonder"></a></li>
                                    <li><a href="#" id="myapp-13" data-action="theme-update" data-themesave data-theme="<?=base_url('assets/backend/')?>css/themes/cust-theme-13.css" data-toggle="tooltip" data-placement="top" title="Emerald" data-original-title="Emerald"></a></li>
                                </ul>
                            </div>
                            <hr class="mb-0 mt-4">
                            <div class="pl-5 pr-3 py-3 bg-faded">
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <a href="#" class="btn btn-outline-danger fw-500 btn-block" data-action="app-reset">Reset Settings</a>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <a href="#" class="btn btn-danger fw-500 btn-block" data-action="factory-reset">Factory Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span id="saving"></span>
                    </div>
                </div>
            </div>
        </div> <!-- END Page Settings -->
        <!-- base vendor bundle: 
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
        <script src="<?=base_url('assets/backend/')?>js/vendors.bundle.js"></script>
        <script src="<?=base_url('assets/backend/')?>js/app.bundle.js"></script>
        <script src="<?=base_url('assets/backend/')?>js/datagrid/datatables/datatables.bundle.js"></script>
        <script src="<?= base_url('assets/backend/libs/sweetalert/sweetalert.min.js');?>"></script>
        <script src="<?=base_url('assets/backend/')?>js/formplugins/summernote/summernote.js"></script>
        <script src="<?=base_url('assets/backend/')?>js/formplugins/select2/select2.bundle.js"></script>
        <script src="<?=base_url('assets/backend/js/gmaps.js')?>"></script>

        <script type="text/javascript">
            var xMap, checkmaptambah, checkmapedit, map_peta;
            $('#modal-tambah').on('shown.bs.modal', function (e) {
                if (checkmaptambah=='1') {

                }else{
                    checkmaptambah='1';
                    initAutocomplete('1');
                }
            })

            $('#modal-edit').on('shown.bs.modal', function (e) {
                if (checkmapedit=='1') {

                }else{
                    checkmapedit='1';
                    initAutocomplete('2');
                }
            })

            $('#modal-tambah-jalan').on('shown.bs.modal', function (e) {
                if (checkmaptambah=='1') {

                }else{
                    checkmaptambah='1';
                    initAwal();
                    initAkhir();
                }
            })

            $(document).ready(function() {
              $(window).keydown(function(event){
                if(event.keyCode == 13) {
                  event.preventDefault();
                  return false;
                }
              });
            });

            $("#kecamatan").on("change", function () {
                $.post("<?=base_url('carousel/desa/')?>",
                {
                  id:this.value
                },
                function(data){
                    $('#desa').empty();
                    for (var i = 0; i < data.length; i++) {
                        $("#desa").append('<option value='+data[i].id_desa+'>'+data[i].nama_desa+'</option>')
                    }
                });
            });

            $("#ekecamatan").on("change", function () {
                $.post("<?=base_url('carousel/desa/')?>",
                {
                  id:this.value
                },
                function(data){
                    $('#edesa').empty();
                    for (var i = 0; i < data.length; i++) {
                        $("#edesa").append('<option value='+data[i].id_desa+'>'+data[i].nama_desa+'</option>')
                    }
                });
            });

            $('#cb_manual').change(function(){
                if (this.checked) {
                    $('#latitude').attr("readonly", false);
                    $('#longitude').attr("readonly", false);
                }else{
                    $('#latitude').attr("readonly", true);
                    $('#longitude').attr("readonly", true);
                }
            });

            $('#ecb_manual').change(function(){
                if (this.checked) {
                    $('#elatitude').attr("readonly", false);
                    $('#elongitude').attr("readonly", false);
                }else{
                    $('#elatitude').attr("readonly", true);
                    $('#elongitude').attr("readonly", true);
                }
            });

            function initAutocomplete(id) {
                if (id=='1') {
                    xMap = '1';
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: -6.907791694271967,
                            lng: 109.73020482883612
                        },
                            zoom: 15
                    });

                    var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
                    map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));
                }else if (id=='2'){
                    xMap = '2'; 
                    var map = new google.maps.Map(document.getElementById('emap'), {
                        center: {
                            lat: -7.027052978974304,
                            lng: 109.5810909693115
                        },
                            zoom: 15
                    });

                    var searchBox = new google.maps.places.SearchBox(document.getElementById('epac-input'));
                    map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('epac-input'));
                }

                google.maps.event.addListener(searchBox, 'places_changed', function() {
                searchBox.set('map', null);


                var places = searchBox.getPlaces();

                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                (function(place) {
                    var marker = new google.maps.Marker({
                        draggable:true,
                        position: place.geometry.location
                    });
                    marker.bindTo('map', searchBox, 'map');
                    markerCoords(marker);
                    google.maps.event.addListener(marker, 'map_changed', function() {
                        if (!this.getMap()) {
                            this.unbindAll();
                        }
                    });
                    bounds.extend(place.geometry.location);

                }(place));

                }
                map.fitBounds(bounds);
                searchBox.set('map', map);
                map.setZoom(Math.min(map.getZoom(),15));


                });
            }

            function markerCoords(markerobject){
                google.maps.event.addListener(markerobject, 'dragend', function(evt){
                    if (xMap == '1') {
                        $('#latitude').val(evt.latLng.lat());
                        $('#longitude').val(evt.latLng.lng());
                    }else{
                        $('#elatitude').val(evt.latLng.lat());
                        $('#elongitude').val(evt.latLng.lng());
                    }
                    
                });

                google.maps.event.addListener(markerobject, 'drag', function(evt){
                    if (xMap == '1') {
                        $('#latitude').val(evt.latLng.lat());
                        $('#longitude').val(evt.latLng.lng());
                    }else{
                        $('#elatitude').val(evt.latLng.lat());
                        $('#elongitude').val(evt.latLng.lng());
                    }
                });     
            }

        // INIT MAP UNTUK DATA JALAN
            function initAwal() {
                var map = new google.maps.Map(document.getElementById('map_awal'), {
                    center: {
                        lat: -6.907791694271967,
                        lng: 109.73020482883612
                    },
                        zoom: 15
                });

                var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input-awal'));
                map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input-awal'));

                google.maps.event.addListener(searchBox, 'places_changed', function() {
                searchBox.set('map', null);


                var places = searchBox.getPlaces();

                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                (function(place) {
                    var marker = new google.maps.Marker({
                        draggable:true,
                        position: place.geometry.location
                    });
                    marker.bindTo('map', searchBox, 'map');
                    markerCoordsAwal(marker);
                    google.maps.event.addListener(marker, 'map_changed', function() {
                        if (!this.getMap()) {
                            this.unbindAll();
                        }
                    });
                    bounds.extend(place.geometry.location);

                }(place));

                }
                map.fitBounds(bounds);
                searchBox.set('map', map);
                map.setZoom(Math.min(map.getZoom(),15));


                });
            }

            function markerCoordsAwal(markerobject){
                google.maps.event.addListener(markerobject, 'dragend', function(evt){
                    $('#lat_awal').val(evt.latLng.lat());
                    $('#lng_awal').val(evt.latLng.lng());
                });

                google.maps.event.addListener(markerobject, 'drag', function(evt){
                    $('#lat_awal').val(evt.latLng.lat());
                    $('#lng_awal').val(evt.latLng.lng());
                });     
            }

            function initAkhir() {
                var map = new google.maps.Map(document.getElementById('map_akhir'), {
                    center: {
                        lat: -6.907791694271967,
                        lng: 109.73020482883612
                    },
                        zoom: 15
                });

                var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input-akhir'));
                map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input-akhir'));

                google.maps.event.addListener(searchBox, 'places_changed', function() {
                searchBox.set('map', null);

                var places = searchBox.getPlaces();

                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                (function(place) {
                    var marker = new google.maps.Marker({
                        draggable:true,
                        position: place.geometry.location
                    });
                    marker.bindTo('map', searchBox, 'map');
                    markerCoordsAkhir(marker);
                    google.maps.event.addListener(marker, 'map_changed', function() {
                        if (!this.getMap()) {
                            this.unbindAll();
                        }
                    });
                    bounds.extend(place.geometry.location);

                }(place));

                }
                map.fitBounds(bounds);
                searchBox.set('map', map);
                map.setZoom(Math.min(map.getZoom(),15));


                });
            }

            function markerCoordsAkhir(markerobject){
                google.maps.event.addListener(markerobject, 'dragend', function(evt){
                    $('#lat_akhir').val(evt.latLng.lat());
                    $('#lng_akhir').val(evt.latLng.lng());
                });

                google.maps.event.addListener(markerobject, 'drag', function(evt){
                    $('#lat_akhir').val(evt.latLng.lat());
                    $('#lng_akhir').val(evt.latLng.lng());
                });     
            }
        // END INIT MAP UNTUK DATA JALAN

            $(function(){
                $('#dt-basic-example').dataTable(
                {
                    responsive: true
                });

                $('.select2').select2({
                });

                $('.js-summernote').summernote({
                    height: 200,
                    tabsize: 2,
                    placeholder: "Ketik Disini...",
                    dialogsFade: true,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                        ['table', ['table']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    callbacks:
                    {
                        //restore from localStorage
                        // onInit: function(e)
                        // {
                        //     $('.js-summernote').summernote("code", localStorage.getItem("summernoteData"));
                        // },
                        // onChange: function(contents, $editable)
                        // {
                        //     clearInterval(interval);
                        //     timer();
                        // }
                    }
                });

                $('.js-readmore').summernote({
                    height: 150,
                    tabsize: 2,
                    placeholder: "Untuk Isi Readmore...",
                    dialogsFade: true,
                    toolbar: [
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                        ['table', ['table']],
                    ],
                    callbacks:
                    {}
                });

                $('.js-sambutan').summernote({
                    height: 450,
                    tabsize: 2,
                    placeholder: "Ketik Disini...",
                    dialogsFade: true,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    callbacks:
                    {
                    }
                });

                if ($('#map_peta').length > 0) {
                    map_peta = new GMaps({
                        div: '#map_peta',
                        lat: -6.907770392360721,
                        lng: 109.7302370153443,
                        gestureHandling: 'greedy'
                    });

                    $.get( "<?=base_url('peta/latlng')?>", function( data ) {
                        for (var i = 0; i < data.ipal.length; i++) {
                            var z = data.ipal[i];
                            var x = z.latlng.split(";");
                            map_peta.addMarker({
                                lat: x[0],
                                lng: x[1],
                                title: 'Marker with InfoWindow',
                                infoWindow: {
                                  content: '<center><a target="_blank" href="<?=base_url('uploads/')?>'+z.foto+'"><img width="100px" src="<?=base_url('uploads/')?>'+z.foto+'"></a></center><br/><p><table> <tr> <td>Alamat</td><td>:</td><td>'+z.lokasi+'</td></tr><tr> <td>Kapasitas</td><td>:</td><td>'+z.kapasitas+'m<sup>3</sup></td></tr><tr> <td>Luas</td><td>:</td><td>'+z.luas+'m<sup>2</sup></td></tr></table></p>'
                                },
                                icon:'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=I|D4B57C|000000'
                            });
                        }

                        for (var i = 0; i < data.jalan.length; i++) {
                            var z = data.jalan[i];
                            var x = z.latlng.split(";");
                            map_peta.addMarker({
                                lat: x[0],
                                lng: x[1],
                                title: 'Marker with InfoWindow',
                                infoWindow: {
                                  content: '<center><a target="_blank" href="<?=base_url('uploads/')?>'+z.foto+'"><img width="100px" src="<?=base_url('uploads/')?>'+z.foto+'"></a></center><br/><p><table> <tr> <td>Alamat</td><td>:</td><td>'+z.lokasi+'</td></tr><tr> <td>Status</td><td>:</td><td>'+z.status+'</td></tr><tr> <td>Luas</td><td>:</td><td>'+z.luas+'m<sup>2</sup></td></tr><tr> <td>Kondisi Baik</td><td>:</td><td>'+z.kondisi_baik+'m</td></tr><tr> <td>Kondisi Rusak</td><td>:</td><td>'+z.kondisi_rusak+'m</td></tr></table></p>'
                                },
                                icon:'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=J|D4B57C|000000'
                            });
                        }

                        for (var i = 0; i < data.pamsimas.length; i++) {
                            var z = data.pamsimas[i];
                            var x = z.latlng.split(";");
                            map_peta.addMarker({
                                lat: x[0],
                                lng: x[1],
                                title: 'Marker with InfoWindow',
                                infoWindow: {
                                  content: '<center><a target="_blank" href="<?=base_url('uploads/')?>'+z.foto+'"><img width="100px" src="<?=base_url('uploads/')?>'+z.foto+'"></a></center><br/><p><table> <tr> <td>Alamat</td><td>:</td><td>'+z.lokasi+'</td></tr><tr> <td>Kapasitas</td><td>:</td><td>'+z.kapasitas+'</td></tr></table></p>'
                                },
                                icon:'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=PM|D4B57C|000000'
                            });
                        }

                        for (var i = 0; i < data.pemakaman.length; i++) {
                            var z = data.pemakaman[i];
                            var x = z.latlng.split(";");
                            map_peta.addMarker({
                                lat: x[0],
                                lng: x[1],
                                title: 'Marker with InfoWindow',
                                infoWindow: {
                                  content: '<center><a target="_blank" href="<?=base_url('uploads/')?>'+z.foto+'"><img width="100px" src="<?=base_url('uploads/')?>'+z.foto+'"></a></center><br/><p><table> <tr> <td>Alamat</td><td>:</td><td>'+z.lokasi+'</td></tr><tr> <td>Luas</td><td>:</td><td>'+z.luas+'m<sup>2</sup></td></tr><tr> <td>Tarif Retribusi : </td><td>:</td><td>Rp. '+z.tarif+'</td></tr></table></p>'
                                },
                                icon:'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=PK|D4B57C|000000'
                            });
                        }

                        for (var i = 0; i < data.pertamanan.length; i++) {
                            var z = data.pertamanan[i];
                            var x = z.latlng.split(";");
                            map_peta.addMarker({
                                lat: x[0],
                                lng: x[1],
                                title: 'Marker with InfoWindow',
                                infoWindow: {
                                  content: '<center><a target="_blank" href="<?=base_url('uploads/')?>'+z.foto+'"><img width="100px" src="<?=base_url('uploads/')?>'+z.foto+'"></a></center><br/><p><table> <tr> <td>Nama Taman</td><td>:</td><td>'+z.nama_taman+'</td></tr><tr> <td>Alamat</td><td>:</td><td>'+z.lokasi+'</td></tr><tr> <td>Luas</td><td>:</td><td>'+z.luas+'m<sup>2</sup></td></tr></table></p>'
                                },
                                icon:'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=PT|D4B57C|000000'
                            });
                        }

                        for (var i = 0; i < data.perumahan.length; i++) {
                            var z = data.perumahan[i];
                            var x = z.latlng.split(";");
                            
                            map_peta.addMarker({
                                lat: x[0],
                                lng: x[1],
                                title: 'Marker with InfoWindow',
                                infoWindow: {
                                  content: '<center><a target="_blank" href="<?=base_url('uploads/')?>'+z.foto+'"><img width="100px" src="<?=base_url('uploads/')?>'+z.foto+'"></a></center><br/><p><table> <tr> <td>Nama Perumahan</td><td>:</td><td>'+z.nama_perumahan+'</td></tr><tr> <td>Alamat</td><td>:</td><td>'+z.lokasi+'</td></tr><tr> <td>Luas</td><td>:</td><td>'+z.luas+'m<sup>2</sup></td></tr><tr> <td>Nama Pengembang</td><td>:</td><td>'+z.nama_pengembang+'</td></tr><tr> <td>Kisaran Harga</td><td>:</td><td>'+z.kisaran_harga+'</td></tr><tr> <td>Tipe Jual</td><td>:</td><td>'+replaceAll(z.id_type,";",",")+'</td></tr></table></p>'
                                },
                                icon:'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=PH|D4B57C|000000'
                            });
                        }


                    });

                    
                }

                

            });

            function replaceAll(str, find, replace) {
                return str.replace(new RegExp(find, 'g'), replace);
            }


            function edit_user(username){
                $.post("<?=base_url('admin/user/edit/')?>",
                {
                  username:username
                },
                function(data){
                  $('#modal-edit').modal('toggle');
                  $('#id_bidang').val(data.id_bidang).change();
                  $('#xusername').val(data.username);
                  $('#username').val(data.username);
                  $('#password').val(data.password);
                });
            }

            function edit_carousel(id){
                $.post("<?=base_url('carousel/edit/')?>",
                {
                  id:id
                },
                function(data){
                  $('#modal-edit').modal('toggle');
                  $('#keterangan').val(data.keterangan);
                  $('#xid').val(data.id);
                  $('#status').val(data.status).change();
                });
            }

            function edit_publik(id){
                $.post("<?=base_url('publik/edit/')?>",
                {
                  id:id
                },
                function(data){
                  $('#modal-edit').modal('toggle');
                  $('#nama').val(data.nama);
                  $('#no_telp').val(data.no_telp);
                  $('#id').val(data.id);
                });
            }

            function edit_rtlh(id){
                $.post("<?=base_url('rtlh/edit/')?>",
                {
                  id:id
                },
                function(data){
                  $('#modal-edit').modal('toggle');
                  $('#pemilik').val(data.pemilik);
                  $('#lokasi').text(data.lokasi);
                  $('#luas').val(data.luas);
                  $('#elatitude').val(data.latitude);
                  $('#elongitude').val(data.longitude);
                  $('#xid').val(data.id);
                  $('#status').val(data.status).change();
                  $('#ekecamatan').val(data.kecamatan).change();
                  var x = data.id_desa;
                  $.post("<?=base_url('carousel/desa/')?>",
                    {
                      id:data.kecamatan
                    },
                    function(data){
                        $('#edesa').empty();
                        for (var i = 0; i < data.length; i++) {
                            $("#edesa").append('<option value='+data[i].id_desa+'>'+data[i].nama_desa+'</option>')
                        }
                        $('#edesa').val(x).change();
                    });
                  

                });
            }

            function edit_perumahan(id){
                $.post("<?=base_url('perumahan/edit/')?>",
                {
                  id:id
                },
                function(data){
                  $('#modal-edit').modal('toggle');
                  $('#nama_perumahan').val(data.nama_perumahan);
                  $('#nama_pengembang').val(data.nama_pengembang);
                  $('#lokasi').text(data.lokasi);
                  $('#luas').val(data.luas);
                  $('#elatitude').val(data.latitude);
                  $('#elongitude').val(data.longitude);
                  $('#xid').val(data.id);
                  $('#ekecamatan').val(data.kecamatan).change();
                  var x = data.id_desa;
                  $.post("<?=base_url('carousel/desa/')?>",
                    {
                      id:data.kecamatan
                    },
                    function(data){
                        $('#edesa').empty();
                        for (var i = 0; i < data.length; i++) {
                            $("#edesa").append('<option value='+data[i].id_desa+'>'+data[i].nama_desa+'</option>')
                        }
                        $('#edesa').val(x).change();
                    });

                  $('#mulai_dari').val(data.mulai_dari);
                  $('#sampai_dengan').val(data.sampai_dengan);
                $.each(data.id_type.split(";"), function(i,e){
                    $("#tipe option[value='" + e + "']").prop("selected", true);
                });
                  

                });
            }

            function edit_pemakaman(id){
                $.post("<?=base_url('pemakaman/edit/')?>",
                {
                  id:id
                },
                function(data){
                  $('#modal-edit').modal('toggle');
                  $('#nama_pemakaman').val(data.nama_pemakaman);
                  $('#lokasi').text(data.lokasi);
                  $('#luas').val(data.luas);
                  $('#elatitude').val(data.latitude);
                  $('#elongitude').val(data.longitude);
                  $('#xid').val(data.id);
                  $('#tarif_retribusi').val(data.tarif_retribusi).change();
                  $('#ekecamatan').val(data.kecamatan).change();
                  var x = data.id_desa;
                  $.post("<?=base_url('carousel/desa/')?>",
                    {
                      id:data.kecamatan
                    },
                    function(data){
                        $('#edesa').empty();
                        for (var i = 0; i < data.length; i++) {
                            $("#edesa").append('<option value='+data[i].id_desa+'>'+data[i].nama_desa+'</option>')
                        }
                        $('#edesa').val(x).change();
                    });
                  

                });
            }

            function edit_ipal(id){
                $.post("<?=base_url('ipal/edit/')?>",
                {
                  id:id
                },
                function(data){
                  $('#modal-edit').modal('toggle');
                  $('#lokasi').text(data.lokasi);
                  $('#luas').val(data.luas);
                  $('#kapasitas').val(data.kapasitas);
                  $('#elatitude').val(data.latitude);
                  $('#elongitude').val(data.longitude);
                  $('#xid').val(data.id);
                  $('#ekecamatan').val(data.kecamatan).change();
                  var x = data.id_desa;
                  $.post("<?=base_url('carousel/desa/')?>",
                    {
                      id:data.kecamatan
                    },
                    function(data){
                        $('#edesa').empty();
                        for (var i = 0; i < data.length; i++) {
                            $("#edesa").append('<option value='+data[i].id_desa+'>'+data[i].nama_desa+'</option>')
                        }
                        $('#edesa').val(x).change();
                    });
                  

                });
            }

            function edit_pamsimas(id){
                $.post("<?=base_url('pamsimas/edit/')?>",
                {
                  id:id
                },
                function(data){
                  $('#modal-edit').modal('toggle');
                  $('#lokasi').text(data.lokasi);
                  $('#kapasitas').val(data.kapasitas);
                  $('#elatitude').val(data.latitude);
                  $('#elongitude').val(data.longitude);
                  $('#xid').val(data.id);
                  $('#ekecamatan').val(data.kecamatan).change();
                  var x = data.id_desa;
                  $.post("<?=base_url('carousel/desa/')?>",
                    {
                      id:data.kecamatan
                    },
                    function(data){
                        $('#edesa').empty();
                        for (var i = 0; i < data.length; i++) {
                            $("#edesa").append('<option value='+data[i].id_desa+'>'+data[i].nama_desa+'</option>')
                        }
                        $('#edesa').val(x).change();
                    });

                });
            }

            function edit_taman(id){
                $.post("<?=base_url('taman/edit/')?>",
                {
                  id:id
                },
                function(data){
                  $('#modal-edit').modal('toggle');
                  $('#nama_taman').val(data.nama_taman);
                  $('#lokasi').text(data.lokasi);
                  $('#luas').val(data.luas);
                  $('#elatitude').val(data.latitude);
                  $('#elongitude').val(data.longitude);
                  $('#xid').val(data.id);
                  $('#ekecamatan').val(data.kecamatan).change();
                  var x = data.id_desa;
                  $.post("<?=base_url('carousel/desa/')?>",
                    {
                      id:data.kecamatan
                    },
                    function(data){
                        $('#edesa').empty();
                        for (var i = 0; i < data.length; i++) {
                            $("#edesa").append('<option value='+data[i].id_desa+'>'+data[i].nama_desa+'</option>')
                        }
                        $('#edesa').val(x).change();
                    });

                });
            }

            

            $('.del').click(function(){
                var href = $(this).attr('rel');
                swal({
                    title: "Anda Yakin?",
                    text: "Data yang telah di hapus tidak dapat dikembalikan!",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText:"Batal",
                    cancelButtonClass: "btn-info",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya, Saya Yakin!!",
                    closeOnConfirm:false
                    
                },
                function(){
                    swal({
                        title:"Terhapus!",
                        text: "Data yang anda maksud telah berhasil di hapus",
                        type: "success"
                    },
                    function(){
                        window.location=href;
                    });
                });
                return false ;
            })

            $('.stat').click(function(){
                var href = $(this).attr('rel');
                swal({
                    title: "Anda Yakin?",
                    text: "Berita ini akan diubah statusnya!",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText:"Batal",
                    cancelButtonClass: "btn-info",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya, Saya Yakin!!",
                    closeOnConfirm:false
                    
                },
                function(){
                    swal({
                        title:"Berhasil!",
                        text: "Ubah Status Berhasil",
                        type: "success"
                    },
                    function(){
                        window.location=href;
                    });
                });
                return false ;
            })

            // $(document).on('click','.del', function(){

                
            // });

        </script>
    </body>
</html>
