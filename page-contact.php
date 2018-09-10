<?php
/* Template name: Kontakt */
?>
<?php get_header(); ?>
	<div class="wrapper-contact">
		<div class="container">
			<div class="row">
				<div class="top clearfix">
					<div class="col-md-6 left-side">
						<?php
						$title_contact = get_field( 'title_contact' );
						$name_company = get_field( 'name_company' );
						$text_company = get_field( 'text_company' );
						$register_company = get_field( 'register_company' );
						$facebook_link = get_field( 'facebook_link', 'option' );
						$vk_link_header = get_field( 'vk_link_header', 'option' );
						$twitter_link_header = get_field( 'twitter_link_header', 'option' );
						?>
						<h1><?php echo $title_contact ?></h1>
						<h2><?php echo $name_company ?></h2>
						<p class="text-company"><?php echo $text_company ?></p>
						<p class="register-company"><?php echo $register_company ?></p>
					</div>
					<div class="col-md-6 right-side">
						<?php
						$tel_contact_top = get_field( 'tel_contact_top' );
						$email_top = get_field( 'email_top' );
						?>
						<div class="contact-detail">
							<img src="<?php bloginfo('template_url'); ?>/images/phone-biger.png" alt="mail">
							<a href="tel:<?php echo esc_html(phone_to_link( $tel_contact_top ) ); ?>"><?php echo $tel_contact_top ?></a>
						</div>
						<div class="contact-detail">
							<img src="<?php bloginfo('template_url'); ?>/images/mail-biger.png" alt="mail">
							<a href="mailto:<?php echo $email_top ?>"><?php echo $email_top ?></a>
						</div>
						<div class="social-container">
								<a target="_blank" href="<?php echo $facebook_link ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-facebook-black.png" alt="fb"><p>Facebook</p></a>
								<a target="_blank" href="<?php echo $vk_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-vk-black.png" alt="fb"><p>Vkontakte</p></a>
								<a target="_blank" href="<?php echo $twitter_link_header ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-twitter-black.png" alt="twitter"><p>Twitter</p></a>
						</div>
					</div>
				</div>
				<?php get_template_part( 'template-parts/contact-first-city' ); ?>
				<?php get_template_part( 'template-parts/contact-three-city' ); ?>
				<?php get_template_part( 'template-parts/contact-fourth-city' ); ?>
<!-- 				<?php get_template_part( 'template-parts/contact-two-city' ); ?> -->
			</div>
		</div>
	</div>
<script type="text/javascript">
function initMap() {

		// Create a new StyledMapType object, passing it an array of styles,
		// and the name to be displayed on the map type control.
		var styledMapType = new google.maps.StyledMapType(
			[
				{
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#f5f5f5"
						}
					]
				},
				{
					"elementType": "labels.icon",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#616161"
						}
					]
				},
				{
					"elementType": "labels.text.stroke",
					"stylers": [
						{
							"color": "#f5f5f5"
						}
					]
				},
				{
					"featureType": "administrative.land_parcel",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#bdbdbd"
						}
					]
				},
				{
					"featureType": "poi",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#eeeeee"
						}
					]
				},
				{
					"featureType": "poi",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#757575"
						}
					]
				},
				{
					"featureType": "poi.park",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#e5e5e5"
						}
					]
				},
				{
					"featureType": "poi.park",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#9e9e9e"
						}
					]
				},
				{
					"featureType": "road",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#ffffff"
						}
					]
				},
				{
					"featureType": "road.arterial",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#757575"
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#dadada"
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#616161"
						}
					]
				},
				{
					"featureType": "road.local",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#9e9e9e"
						}
					]
				},
				{
					"featureType": "transit.line",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#e5e5e5"
						}
					]
				},
				{
					"featureType": "transit.station",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#eeeeee"
						}
					]
				},
				{
					"featureType": "water",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#c9c9c9"
						}
					]
				},
				{
					"featureType": "water",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#9e9e9e"
						}
					]
				}
			],
				{name: 'Styled Map'});
			var kepnoloc = {lat: 51.2814689, lng: 17.9905669};
			var warszawaloc = {lat: 52.2086598, lng: 21.0210874};
			var wroclawloc = {lat: 51.099726, lng: 17.0416888};
			var ukloc = {lat: 50.4433186, lng: 30.5467461};
		// Create a map object, and include the MapTypeId to add
		// to the map type control.
		var mapfirst = new google.maps.Map(document.getElementById('map1'), {
			center: kepnoloc,
			zoom: 16,
			zoomControl: true,
			scaleControl: false,
			scrollwheel: false,
			disableDoubleClickZoom: true,
			disableDefaultUI: true,
			position: kepnoloc,
			mapTypeControlOptions: {
			mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
								'styled_map']
			}
		});
		// var maptwo = new google.maps.Map(document.getElementById('map2'), {
		// 	center: warszawaloc,
		// 	zoom: 16,
		// 	zoomControl: true,
		// 	scaleControl: false,
		// 	scrollwheel: false,
		// 	disableDoubleClickZoom: true,
		// 	disableDefaultUI: true,
		// 	position: warszawaloc,
		// 	mapTypeControlOptions: {
		// 	mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
		// 						'styled_map']
		// 	}
		// });
		var mapthree = new google.maps.Map(document.getElementById('map3'), {
			center: wroclawloc,
			zoom: 16,
			zoomControl: true,
			scaleControl: false,
			scrollwheel: false,
			disableDoubleClickZoom: true,
			disableDefaultUI: true,
			position: wroclawloc,
			mapTypeControlOptions: {
			mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
								'styled_map']
			}
		});
		var mapfourth = new google.maps.Map(document.getElementById('map4'), {
			center: ukloc,
			zoom: 16,
			zoomControl: true,
			scaleControl: false,
			scrollwheel: false,
			disableDoubleClickZoom: true,
			disableDefaultUI: true,
			position: wroclawloc,
			mapTypeControlOptions: {
			mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
								'styled_map']
			}
		});

		//var image = url+'/images/lokalizacja.png';
		var marker1 = new google.maps.Marker({
			position: kepnoloc,
			map: mapfirst,
			//icon: image
		});
		// var marker2 = new google.maps.Marker({
		// 	position: warszawaloc,
		// 	map: maptwo,
		// 	//icon: image
		// });
		var marker3 = new google.maps.Marker({
			position: wroclawloc,
			map: mapthree,
			//icon: image
		});
		var marker4 = new google.maps.Marker({
			position: ukloc,
			map: mapfourth,
			//icon: image
		});


		//Associate the styled map with the MapTypeId and set it to display.
		mapfirst.mapTypes.set('styled_map', styledMapType);
		mapfirst.setMapTypeId('styled_map');
		// maptwo.mapTypes.set('styled_map', styledMapType);
		// maptwo.setMapTypeId('styled_map');
		mapthree.mapTypes.set('styled_map', styledMapType);
		mapthree.setMapTypeId('styled_map');
		mapfourth.mapTypes.set('styled_map', styledMapType);
		mapfourth.setMapTypeId('styled_map');
	}

</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6rsqparnbQRGdqgJ1h69nM5EfS6vf7rk&callback=initMap">
</script>
<?php get_footer(); ?>
