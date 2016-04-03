<style>
<!--
.modal-backdrop.in {
    opacity: 0.9 !important;
	
}
-->
</style>
<script type="text/javascript">
<!--
$('#markermap').modal({
    show:true,
    backdrop:false,
    keyboard:false
})
//-->
</script>
<!-- Modal -->
  <div class="modal fade" id="markermap" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center;"><span><button id="markmapsubmit" class="btn btn-default"><i class="fa fa-map-marker"></i> Tạo bản đồ với vị trí này</button></span><span style="float: right"><button id="closeMarker" data-dismiss="modal" class="btn btn-default">Đóng</button></span></h4>
        </div>
        <div class="modal-body">
          <!-- content widget -->
          	<form>
          	 <div class="row" style="text-align:center;display:none;padding-bottom:20px" id="titlecode">
			      		<b>Copy đoạn mã dưới và dán vào bài viết của bạn để tạo bản đồ theo địa chỉ này.</b><br>
			      		<code id="code"></code> <br>
			   </div>	
			  <input type="text" class="form-control" name="maps_address" id="maps_address" value="" placeholder="Gõ địa chỉ cần tạo map, sau đó bấm Enter">
			  <div id="maps_maparea">
			      <div id="maps_mapcanvas" style="margin-top:10px;" class="form-group"></div>
			      
			      <div class="row">
			          <div class="col-xs-6">
			            <div class="form-group">
			              <div class="input-group">
			                  <span class="input-group-addon">L</span>
			                  <input type="text" class="form-control" name="maps[maps_maplat]" id="maps_maplat" value="{maps_maplat}" readonly="readonly">
			              </div>
			             </div>
			          </div>
			          <div class="col-xs-6">
			            <div class="form-group">
			              <div class="input-group">
			                  <span class="input-group-addon">N</span>
			                  <input type="text" class="form-control" name="maps[maps_maplng]" id="maps_maplng" value="{maps_maplng}" readonly="readonly">
			              </div>
			              </div>
			          </div>
			      </div>
			      <div class="row">
			          <div class="col-xs-12">
			            <div class="form-group">
			              <div class="input-group">
			                  <span class="input-group-addon">Z</span>
			                  <input type="text" class="form-control" name="maps[maps_mapzoom]" id="maps_mapzoom" value="{maps_mapzoom}" readonly="readonly">
			              </div>
			             </div>
			          </div>
			      </div>
			  </div>
			</form>
          
          <!-- #content widget -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<link href="http://developers.mynukeviet.net/themes/simple/css/bootstrap.min.css?t=14" rel="stylesheet">
<script src="http://developers.mynukeviet.net//themes/simple/js/bootstrap.min.js?t=14"></script>
<script src="http://developers.mynukeviet.net/assets/js/jquery/jquery.min.js?t=14"></script>
<script>
var map, ele, mapH, mapW, addEle, mapL, mapN, mapZ;

ele = 'maps_mapcanvas';
addEle = 'maps_address';
mapLat = 'maps_maplat';
mapLng = 'maps_maplng';
mapZ = 'maps_mapzoom';
mapArea = 'maps_maparea';
mapCenLat = 'maps_mapcenterlat';
mapCenLng = 'maps_mapcenterlng';

// Call Google MAP API
if( ! document.getElementById('googleMapAPI') ){
	var s = document.createElement('script');
	s.type = 'text/javascript';
	s.id = 'googleMapAPI';
	s.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&callback=controlMap';
	document.body.appendChild(s);
}else{
	controlMap();
}

// Creat map and map tools
function initializeMap(){
	var zoom = parseInt($("#" + mapZ).val()), lat = parseFloat($("#" + mapLat).val()), lng = parseFloat($("#" + mapLng).val()), Clat = parseFloat($("#" + mapCenLat).val()), Clng = parseFloat($("#" + mapCenLng).val());
	Clat || (Clat = 20.984516000000013, $("#" + mapCenLat).val(Clat));
	Clng || (Clng = 105.79547500000001, $("#" + mapCenLng).val(Clng));
	lat || (lat = Clat, $("#" + mapLat).val(lat));
	lng || (lng = Clng, $("#" + mapLng).val(lng));
	zoom || (zoom = 17, $("#" + mapZ).val(zoom));

	mapW = $('#' + ele).innerWidth();
	mapH = mapW * 3 / 4;

	// Init MAP
	$('#' + ele).width(mapW).height(mapH > 500 ? 500 : mapH);
	map = new google.maps.Map(document.getElementById(ele),{
		zoom: zoom,
		center: {
			lat: Clat,
			lng: Clng
		}
	});

	// Init default marker
	var markers = [];
	markers[0] = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(lat,lng),
        draggable: true,
        animation: google.maps.Animation.DROP
    });
    markerdragEvent(markers);

	// Init search box
	var searchBox = new google.maps.places.SearchBox(document.getElementById(addEle));

	google.maps.event.addListener(searchBox, 'places_changed', function(){
	    var places = searchBox.getPlaces();

	    if (places.length == 0) {
	        return;
	    }

	    for (var i = 0, marker; marker = markers[i]; i++) {
	        marker.setMap(null);
	    }

	    markers = [];
	    var bounds = new google.maps.LatLngBounds();
	    for (var i = 0, place; place = places[i]; i++) {
	        var marker = new google.maps.Marker({
		        map: map,
		        position: place.geometry.location,
		        draggable: true,
		        animation: google.maps.Animation.DROP
	        });

	        markers.push(marker);
	        bounds.extend(place.geometry.location);
	    }

        markerdragEvent(markers);
	    map.fitBounds(bounds);
		console.log( places );
	});

	// Add marker when click on map
	google.maps.event.addListener(map, 'click', function(e) {
	    for (var i = 0, marker; marker = markers[i]; i++) {
	        marker.setMap(null);
	    }

	    markers = [];
		markers[0] = new google.maps.Marker({
	        map: map,
	        position: new google.maps.LatLng(e.latLng.lat(), e.latLng.lng()),
	        draggable: true,
	        animation: google.maps.Animation.DROP
	    });

	    markerdragEvent(markers);
	});

	// Event on zoom map
	google.maps.event.addListener(map, 'zoom_changed', function() {
	    $("#" + mapZ).val(map.getZoom());
	});

	// Event on change center map
	google.maps.event.addListener(map, 'center_changed', function() {
	    $("#" + mapCenLat).val(map.getCenter().lat());
	    $("#" + mapCenLng).val(map.getCenter().lng());
	    console.log( map.getCenter() );
	});
}

// Show, hide map on select change
function controlMap(manual){
	$('#' + mapArea).slideDown(100, function(){
		initializeMap();
	});

	return !1;
}

// Map Marker drag event
function markerdragEvent(markers){
    for (var i = 0, marker; marker = markers[i]; i++) {
	    $("#" + mapLat).val(marker.position.lat());
	    $("#" + mapLng).val(marker.position.lng());

		google.maps.event.addListener(marker, 'drag', function(e) {
		    $("#" + mapLat).val(e.latLng.lat());
		    $("#" + mapLng).val(e.latLng.lng());
		});
    }
}
$("#closeMarker").click(function() {
	$(".widgetAddArea").html("");
});
$("#markmapsubmit").click(function() {
	var l = $("#maps_maplat").val();
	var n = $("#maps_maplng").val();
	var z = $("#maps_mapzoom").val();
	$.post("<?php echo $url_site ?>/dashboard/pages/markermapsubmit", {
		accessKey : <?php echo $id_store ?>,
		L : l,
		N : n,
		Z : z
	}, function(data) {
			if(data != 0) {
				var code = "[jnetmap=" + data + "]";
				$("#titlecode").show();
				$("#code").text(code);
			} else {
				alert("Bạn chỉ được phép tạo 5 bản đồ, vui lòng liên hệ supporter để được hộ trợ.");
			}	
		
	  
	});
	
});
</script>
