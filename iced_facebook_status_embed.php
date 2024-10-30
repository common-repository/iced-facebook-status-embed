<?php
/*
Plugin Name: Iced Facebook Status Embed
Plugin URI: http://icedapp.com
Description: Emded Facebook status inside any post.
Version: 1.0
Author: Harsha
Author URI: http://icedapp.com
License: GPL2
*/

wp_embed_register_handler( 'facebook', '#(^https?://(www\.)?facebook.com/.+)#i', 'iced_facebook_embed' );

function iced_facebook_embed( $matches, $attr, $url, $rawattr ) {

			$embed = '<div id="fb-root"></div><script>
			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, "script", "facebook-jssdk"));
			</script>
			<fb:post href="' . $url . '"></fb:post>';

	return apply_filters( 'facebook', $embed, $matches, $attr, $url, $rawattr );
}