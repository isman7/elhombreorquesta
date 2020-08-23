<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php if ( is_single() ) {
		single_post_title('', true);
	} else {
		bloginfo('name'); echo " - "; bloginfo('description');
	}
	?>" />

	<meta name="keywords" content="<?php if ( is_single() ) {
		global $post;
		foreach(get_the_tags($post->ID) as $tag) {
			echo $tag->name . ', ';
		}
	}
	?>" />

	<title><?php bloginfo( 'name' ); ?></title>

	<?php
	wp_head();
	?>

	<!--Bootstrap JS-->
	<script src="<?php echo get_template_directory_uri() . '/vendor/twbs/bootstrap/dist/js/bootstrap.js'; ?>"></script>



</head>

<body onload="prettyPrint()">