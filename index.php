<?php 
$path_dom = TEMPLATEPATH.'/src/php/simple_html_dom.php';

include($path_dom); 
?>

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
    
    <meta name="keywords" content="<?php if ( is_single() ) {
        global $post;
		foreach(get_the_tags($post->ID) as $tag) {
		echo $tag->name . ', ';
		}
    } else {
		echo "Ismael Benito, Isman Siete, divulgación científica, magia, programación, política, reflexión";	
    }
    ?>" />
    
    <title><?php bloginfo( 'name' ); ?></title>

	<!-- <link rel="icon" href="../../favicon.ico"> -->

	<!--Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<!--Prettify CSS-->
    <link href="<?php echo get_template_directory_uri(); ?>/src/css/prettify.css" type="text/css" rel="stylesheet" />
    <script src="<?php echo get_template_directory_uri(); ?>/src/js/prettify.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/src/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/src/css/bootstrap-theme.css" rel="stylesheet">
    <!-- Font-Awesome CSS -->
    <!-- <link href="<?php echo get_template_directory_uri(); ?>/src/css/font-awesome.css" rel="stylesheet"> -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Styles core CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
    <!--Bootstrap JS-->
    <script src="<?php echo get_template_directory_uri(); ?>/src/js/bootstrap.min.js"></script>
    
    
  </head>

  <body onload="prettyPrint()">
	<div class="row">
		<div class="col-lg-4">
			
			<div class="row">
				<div class="col-lg-3 col-sm-1"></div>
				<div class="col-lg-7 col-sm-9 thumbnail voffset7" id="vcard">
					<div class="row">
						<div class="col-lg-6 col-md-7 col-md-offset-3" style="margin-top: -40px;">
						<a class="" href="" title="Isman Siete">
							<img class="img-thumbnail img-responsive" src="https://avatars3.githubusercontent.com/u/9478220?v=3&s=460" width="" alt="">
						</a>
						</div>
					</div>
					<div class="row voffset3">
					<div class="col-md-10 col-md-offset-1">
						<!--<i class="fa fa-twitter"></i>-->
						 <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab"><span class="fa fa-lg fa-user"></span></a></li>
							<li role="presentation"><a href="#twitter" aria-controls="twitter" role="tab" data-toggle="tab"><span class="fa fa-lg fa-twitter"></span></a></li>
							<li role="presentation"><a href="#github" aria-controls="github" role="tab" data-toggle="tab"><span class="fa fa-lg fa-github"></span></a></li>
<!--
							<li role="presentation"><a href="#linkedin" aria-controls="linkedin" role="tab" data-toggle="tab"><span class="fa fa-lg fa-linkedin"></span></a></li>
-->
						  </ul>

						<!-- Tab panes -->
						  <div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="user">
								<h4><strong>Ismael Benito</strong></h4>
								<?php 
									$html_twitter = file_get_html('https://twitter.com/ismansiete'); 
									foreach($html_twitter->find('p.ProfileHeaderCard-bio') as $e){
										echo '<p>'. strip_tags($e->innertext) .'</p>';
									}
								?>
								
							</div>
							<div role="tabpanel" class="tab-pane fade" id="twitter">
								<h4><strong><a href="https://twitter.com/ismansiete">@ismansiete</a></strong></h4>
								<?php
								$i = 0;
								echo '<div class="row text-center">';
								foreach($html_twitter->find('span.ProfileNav-value') as $e){
								echo '<div class="col-lg-4">';
								echo '<h4><strong>'. $e->innertext . '</strong></h4>';
								$i++;
									switch ($i) {
									case 1:
										echo '<span class="text-muted">Tweets</span></div>';
										break 1;
									case 2:
										echo '<span class="text-muted">Siguiendo</span></div>';
										break 1;
									case 3:
										echo '<span class="text-muted">Seguidores</span></div>';
										break 2;
									default:
										break;
									}
								}
								echo '</div>'; /* row */
								?>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="github">
								<h4><strong><a href="https://github.com/isman7">@isman7</a></strong></h4>
								<?php
								$html_github = file_get_html('https://github.com/isman7');
								$i = 0;
								echo '<div class="row text-center">';
								foreach($html_github->find('strong.vcard-stat-count') as $e)
								$e->outertext = '<h4><strong>'.$e->innertext.'</strong></h4>';
								foreach($html_github->find('a.vcard-stat') as $e){
								echo '<div class="col-lg-4">' . $e->innertext . '</div>';
								}
								echo '</div>'; /* row */
								?>
							</div>
<!--
							<div role="tabpanel" class="tab-pane fade" id="linkedin">
								<h4><strong><a href="https://www.linkedin.com/in/ismael-benito-altamirano-8a41b963">Ismael Benito Altamirano</strong></h4>
								<?php /*
								$html_linkedin = file_get_html('https://www.linkedin.com/in/ismael-benito-altamirano-8a41b963');
								$i = 0;
								echo '<div class="row text-center">';
								//$eles = $html_linkedin->find('*');
								
								foreach($html_linkedin->find('div.member-connections') as $e){
								
								echo '<h4>'. $e->innertext . '</h4>';

								}
								echo '</div>'; /* row */ 
								?>
							</div>
-->
						  </div>

					
						
					</div>
					<div class="col-md-1"></div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
			
		</div>
  
  
		
		<div class="col-lg-8" id="principal">
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
								  if ( function_exists('wp_bootstrap_pagination') ) {
									  wp_bootstrap_pagination();
								  }
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
	
	</div>
	</div>

   
  </body>
</html>


