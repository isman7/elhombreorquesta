
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
    <meta name="author" content="Isman Siete (Ismael Benito)">
    <!-- <link rel="icon" href="../../favicon.ico"> -->
    
    

    <title><?php bloginfo( 'name' ); ?></title>

	<!--Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<!--Prettify-->
    <link href="<?php echo get_template_directory_uri(); ?>/src/css/prettify.css" type="text/css" rel="stylesheet" />
    <script src="<?php echo get_template_directory_uri(); ?>/src/js/prettify.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/src/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/src/css/bootstrap-theme.css" rel="stylesheet">
    <!-- Styles core CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
    <!--Bootstrap JS-->
    <script src="<?php echo get_template_directory_uri(); ?>/src/js/bootstrap.min.js"></script>
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
    
    
  </head>

  <body onload="prettyPrint()">

    <div class="container">

		<div class="jumbotron">
	    
	        
			<?php 	$Site_url = get_site_url(); 
					
					echo "<h1><a href=" . "$Site_url" . ">";
					bloginfo('name');
					echo "</a></h1>"; 
			?>
			
	        <h2><?php bloginfo( 'description' ); ?></h2>
	  
			<div class="container voffset8">
				<?php if ( have_posts() ) : ?>
	
					<?php /* Start the Loop */ ?>
					<?php  while ( have_posts() ) : the_post();
						$Path = get_permalink();
						$Title = get_the_title();
						echo "<a href = '$Path'><h3> $Title </h3></a>";
						$Categories = get_the_category();
						$Separator = ' ';
						$Output = '';
						echo "<h4>";
						if ( ! empty( $Categories ) ) {
						    foreach( $Categories as $Category ) {
						        $Output .= '<a href="' . esc_url( get_category_link( $Category->term_id ) ) . '">' . '<span class="label label-'. esc_html( $Category->slug ) . '">' . esc_html( $Category->name ) .'</span></a>' . $Separator;
						    }
						    echo trim( $Output, $Separator );
						}
						echo "</h4>";
						$Date = get_the_date();
						echo "<h5> $Date </h5>";
						echo "<div class='row text-justify'>";
						the_content();
						echo "</div>&nbsp;";
						
						if (is_single()): 
							echo "<div class='row text-justify'>";
							the_tags();
							echo "</div>&nbsp;";
							echo "<div class='row'><div class='col-lg-5'>";
							previous_post_link();
							echo "</div>";
							echo "<div class='col-lg-2'></div>";
							echo "<div class='col-lg-5'></div>";
							next_post_link();
							echo "</div>";
						
						endif;
						
						endwhile;
						?>
			
				<?php else : ?>
					<header class="entry-header">
						<h1 class="entry-title"> 404 </h1>
					</header>
	
					<div class="entry-content">
						<p>No te emociones, ¡qué aun estoy construyendo el Blog!</p> 
						<p>Tomo nota, crear: 
						
						<?php $Path = "http://" .  $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]  . "/";
						
							echo "<a href='$Path'> $Path </a>";
						
						?></p>
						
					</div><!-- .entry-content -->
			
				
			<?php endif; // end have_posts() check ?>
			</div> 
  
      </div>


	<footer class="footer">
	<p>
		<div class="col-lg-2">
		<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
			<img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" />
		</a>
		</div>
		<div class="col-lg-6">
		<p>
		<?php 	$user_info = get_userdata(1);
				
				$first_name = $user_info->first_name;
				$last_name = $user_info->last_name;
				echo "$first_name $last_name. ";
		?>
		<br>
		Basado en Wordpress y Bootstrap.</p>
		</div>
	</p>
	</footer> 



    </div> <!-- /container -->
	
	

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


