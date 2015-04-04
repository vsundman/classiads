<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage classiads
 * @since classiads 1.2.2
 */

global $redux_demo; 

$contact_email = $redux_demo['contact-email'];
$wpcrown_contact_email_error = $redux_demo['contact-email-error'];
$wpcrown_contact_name_error = $redux_demo['contact-name-error'];
$wpcrown_contact_message_error = $redux_demo['contact-message-error'];
$wpcrown_contact_thankyou = $redux_demo['contact-thankyou-message'];

$wpcrown_contact_latitude = $redux_demo['contact-latitude'];
$wpcrown_contact_longitude = $redux_demo['contact-longitude'];
$wpcrown_contact_zoomLevel = $redux_demo['contact-zoom'];


global $nameError;
global $emailError;
global $commentError;
global $subjectError;
global $humanTestError;

//If the form is submitted
if(isset($_POST['submitted'])) {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = $wpcrown_contact_name_error;
			$hasError = true;
		} elseif(trim($_POST['contactName']) === 'Name*') {
			$nameError = $wpcrown_contact_name_error;
			$hasError = true;
		}	else {
			$name = trim($_POST['contactName']);
		}

		//Check to make sure that the subject field is not empty
		if(trim($_POST['subject']) === '') {
			$subjectError = $wpcrown_contact_subject_error;
			$hasError = true;
		} elseif(trim($_POST['subject']) === 'Subject*') {
			$subjectError = $wpcrown_contact_subject_error;
			$hasError = true;
		}	else {
			$subject = trim($_POST['subject']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = $wpcrown_contact_email_error;
			$hasError = true;
		} else if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$/i", trim($_POST['email']))) {
			$emailError = $wpcrown_contact_email_error;
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = $wpcrown_contact_message_error;
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}

		//Check to make sure that the human test field is not empty
		if(trim($_POST['humanTest']) != '8') {
			$humanTestError = "Not Human :(";
			$hasError = true;
		} else {

		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = $contact_email;
			$subject = $subject;	
			$body = "Nume: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From website <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			wp_mail($emailTo, $subject, $body, $headers);

			$emailSent = true;

	}
}

get_header(); ?>

	<div class="ad-title">
	
        		<h2><?php the_title(); ?></h2> 	
	</div>
	<div class="container">
	
		<div class="span8 first">


		<section id="big-map">

			<div id="classiads-main-map"></div>

			<script type="text/javascript">
			var mapDiv,
				map,
				infobox;
			jQuery(document).ready(function($) {

				mapDiv = $("#classiads-main-map");
				mapDiv.height(650).gmap3({
					map: {
						options: {
							"center":[<?php echo $wpcrown_contact_latitude; ?>,<?php echo $wpcrown_contact_longitude; ?>]
							,"zoom": <?php echo $wpcrown_contact_zoomLevel; ?>
							,"draggable": true
							,"mapTypeControl": true
							,"mapTypeId": google.maps.MapTypeId.ROADMAP
							,"scrollwheel": false
							,"panControl": true
							,"rotateControl": false
							,"scaleControl": true
							,"streetViewControl": true
							,"zoomControl": true
							<?php global $redux_demo; $map_style = $redux_demo['map-style']; if(!empty($map_style)) { ?>,"styles": <?php echo $map_style; ?> <?php } ?>
						}
					}
					,marker: {
						latLng: [<?php echo $wpcrown_contact_latitude; ?>,<?php echo $wpcrown_contact_longitude; ?>]
					}
				});

				map = mapDiv.gmap3("get");

				if (Modernizr.touch){
					map.setOptions({ draggable : false });
					var draggableClass = 'inactive';
					var draggableTitle = "Activate map";
					var draggableButton = $('<div class="draggable-toggle-button '+draggableClass+'">'+draggableTitle+'</div>').appendTo(mapDiv);
					draggableButton.click(function () {
						if($(this).hasClass('active')){
							$(this).removeClass('active').addClass('inactive').text("Activate map");
							map.setOptions({ draggable : false });
						} else {
							$(this).removeClass('inactive').addClass('active').text("Deactivate map");
							map.setOptions({ draggable : true });
						}
					});
				}

			});
			</script>

		</section>


			<section class="ads-main-page">

				

					<div class="full" style="padding: 30px 0;">

						<div class="ad-detail-content">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									
							<?php the_content(); ?>
																	
							<?php endwhile; endif; ?>


							<div class="contact_form">
										
								<?php if(isset($emailSent) && $emailSent == true) { ?>
															
									<h5><?php echo $wpcrown_contact_thankyou ?></h5></div>

								<?php } else { ?>

								<?php if($nameError != '') { ?>
									<div class="full">
										<h5><?php echo $nameError;?></h5> 
									</div>										
								<?php } ?>
															
								<?php if($emailError != '') { ?>
									<div class="full">
										<h5><?php echo $emailError;?></h5>
									</div>
								<?php } ?>

								<?php if($subjectError != '') { ?>
									<div class="full">
										<h5><?php echo $subjectError;?></h5>  
									</div>
								<?php } ?>
															
								<?php if($commentError != '') { ?>
									<div class="full">
										<h5><?php echo $commentError;?></h5>
									</div>
								<?php } ?>

								<?php if($humanTestError != '') { ?>
									<div class="full">
										<h5><?php echo $humanTestError;?></h5>
									</div>
								<?php } ?>
														
								<form name="contactForm" action="<?php the_permalink(); ?>" id="contact-form" method="post" class="contactform" >
														
									<div>
																
									<input type="text" onfocus="if(this.value=='Name*')this.value='';" onblur="if(this.value=='')this.value='Name*';" name="contactName" id="contactName" value="Name*" class="input-textarea" />
															 
									<input type="text" onfocus="if(this.value=='Email*')this.value='';" onblur="if(this.value=='')this.value='Email*';" name="email" id="email" value="Email*" class="input-textarea" />

									<input type="text" onfocus="if(this.value=='Subject*')this.value='';" onblur="if(this.value=='')this.value='Subject*';" name="subject" id="subject" value="Subject*" class="input-textarea" />
															 
									<textarea name="comments" id="commentsText" cols="8" rows="5" ></textarea>
																
									<br />

									<p style="margin-top: 20px;"><?php _e("Human test. Please input the result of 5+3=?", "agrg"); ?></p>

									<input type="text" onfocus="if(this.value=='')this.value='';" onblur="if(this.value=='')this.value='';" name="humanTest" id="humanTest" value="" class="input-textarea" />

									<br />
																
									<br />
																
									<input style="margin-bottom: 0;" name="submitted" type="submit" value="Send Message" class="input-submit"/>			
										
									</div>
															
								</form>
									
							</div>

							<?php } ?>

						</div>

						

					</div>


			</section>
			
		</div>
		
		<div class="span4" >

		    	<?php get_sidebar('pages'); ?>

	    </div>
			
			
	</div>
	
	<?php 

		global $redux_demo; 

		$featured_ads_option = $redux_demo['featured-options-on'];

	?>

	<?php if($featured_ads_option == 1) { ?>

    <section id="featured-abs">
        
        <div class="container" style="width:100%">
            
            <div id="tabs" class="full">
			    	
                <?php $cat_id = get_cat_ID(single_cat_title('', false)); ?>
			    

                <div class="pane">
                 
                  	<div id="projects-carousel">

			    		<?php

							global $paged, $wp_query, $wp;

							$args = wp_parse_args($wp->matched_query);

							$temp = $wp_query;

							$wp_query= null;

							$wp_query = new WP_Query();

							$wp_query->query('post_type=post&posts_per_page=-1');

							$current = -1;

						?>

						<?php while ($wp_query->have_posts()) : $wp_query->the_post();

							$featured_post = "0";

							$post_price_plan_activation_date = get_post_meta($post->ID, 'post_price_plan_activation_date', true);
							$post_price_plan_expiration_date = get_post_meta($post->ID, 'post_price_plan_expiration_date', true);
							$post_price_plan_expiration_date_noarmal = get_post_meta($current_post, 'post_price_plan_expiration_date_normal', true);
							$todayDate = strtotime(date('m/d/Y h:i:s'));
							$expireDate = $post_price_plan_expiration_date;

							if(!empty($post_price_plan_activation_date)) {

								if(($todayDate < $expireDate) or $post_price_plan_expiration_date == 0) {
									$featured_post = "1";
								}

						} ?>

						<?php if($featured_post == "1") { 

							$current++;

						?>

						<div class="ad-box span3">
							<?php
								if ( has_post_thumbnail()) {
								   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
								   echo '<a class="ad-image" href="' .get_permalink($post->ID). '" title="' . the_title_attribute('echo=0') . '" >';
								   echo get_the_post_thumbnail($post->ID, 'premium-post-image'); 
								   echo '</a>';
								 }
							?>
			    			

			    			<div class="ad-hover-content">
			    				<div class="ad-category">
			    					
			    					<?php
 
						        		$category = get_the_category();

						        		if ($category[0]->category_parent == 0) {

											$tag = $category[0]->cat_ID;

											$tag_extra_fields = get_option(MY_CATEGORY_FIELDS);
											if (isset($tag_extra_fields[$tag])) {
											    $category_icon_code = $tag_extra_fields[$tag]['category_icon_code'];
											    $category_icon_color = $tag_extra_fields[$tag]['category_icon_color'];
											}

										} else {

											$tag = $category[0]->category_parent;

											$tag_extra_fields = get_option(MY_CATEGORY_FIELDS);
											if (isset($tag_extra_fields[$tag])) {
											    $category_icon_code = $tag_extra_fields[$tag]['category_icon_code'];
											    $category_icon_color = $tag_extra_fields[$tag]['category_icon_color'];
											}

										}

										if(!empty($category_icon_code)) {

									?>

					        		<div class="category-icon-box" ><?php $category_icon = stripslashes($category_icon_code); echo $category_icon; ?></div>

					        		<?php } 

					        		$category_icon_code = "";

					        		?>

			    				</div>
								
								
								<div class="post-title">
									<a href="<?php the_permalink(); ?>"><?php $theTitle = get_the_title(); $theTitle = (strlen($theTitle) > 40) ? substr($theTitle,0,37).'...' : $theTitle; echo $theTitle; ?></a>
								</div>
								
							</div>	
								<?php
								$post_price = get_post_meta($post->ID, 'post_price', true);
								if(!empty($post_price)){								
								?>
								<div class="add-price"><span><?php echo $post_price; ?></span></div> 
								<?php } ?>
								
			    				

			    			

						</div>

			    		<?php } ?>

			    		<?php endwhile; ?>	
												
						<?php wp_reset_query(); ?>

			    	</div>

			    	<?php wp_enqueue_script( 'jquery-carousel', get_template_directory_uri().'/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'),'',true); ?>
										
					<script>

						jQuery(document).ready(function () {

							jQuery('#projects-carousel').carouFredSel({
								auto: true,
								prev: '#carousel-prev',
								next: '#carousel-next',
								pagination: "#carousel-pagination",
								mousewheel: true,
								scroll: 2,
								swipe: {
									onMouse: true,
									onTouch: true
								}
							});

						});
											
					</script>
					<!-- end scripts -->

			    </div>

			    

			</div>
        
        </div>

    </section>

    <?php } ?>

<?php get_footer(); ?>