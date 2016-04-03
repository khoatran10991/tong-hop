<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var gmap = new google.maps.LatLng(10.765974,106.689422);
var marker;
function initialize()
{
    var mapProp = {
         center:new google.maps.LatLng(10.765974,106.689422),
         zoom:16,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
 
    var map=new google.maps.Map(document.getElementById("googleMap")
    ,mapProp);
 
  var styles = [
    {
      featureType: 'road.arterial',
      elementType: 'all',
      stylers: [
        { hue: '#fff' },
        { saturation: 100 },
        { lightness: -48 },
        { visibility: 'on' }
      ]
    },{
      featureType: 'road',
      elementType: 'all',
      stylers: [
 
      ]
    },
    {
        featureType: 'water',
        elementType: 'geometry.fill',
        stylers: [
            { color: '#adc9b8' }
        ]
    },{
        featureType: 'landscape.natural',
        elementType: 'all',
        stylers: [
            { hue: '#809f80' },
            { lightness: -35 }
        ]
    }
  ];
 
  var styledMapType = new google.maps.StyledMapType(styles);
  map.mapTypes.set('Styled', styledMapType);
 
  marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: gmap
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
}
 
function toggleBounce() {
 
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
 
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="content-page" class="content-page" 
			<?php
			    if(isset($layout['page-bg-color']) && $layout['page-bg-color'] != ''){
					echo "style='background-color:".$layout['page-bg-color']."'";
			    }
			?>>

					
	<div class="site-content container">	
		<div class="">
			<h2  class="post-title" id="post-title" 
			<?php
			    if(isset($layout['page-title-color']) && $layout['page-title-color'] != ''){
					echo "style='color:".$layout['page-title-color']."'";
			    }
			?>>
				{page_name}
			</h2>
			<p  style="margin-bottom: 30px;" class="date-post">Ngày đăng: {time_created}</p>
		</div>
		<div id="primary-mono" class="content-area">
			<main id="main" class="site-main" role="main"
			<?php
			    if(isset($layout['page-text-color']) && $layout['page-text-color'] != ''){
					echo "style='color:".$layout['page-text-color']."'";
			    }
			?>>
				<article id="post-{id_page}" class="post-{id_page}">
				{page_content}
				</article><!-- #post-## -->
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->
</div>