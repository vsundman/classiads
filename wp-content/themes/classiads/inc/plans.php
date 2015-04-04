<?php

	function post_type_portfolios() {
		$labels = array(
	    	'name' => _x('Pricing Plans', 'post type general name', 'heman'),
	    	'singular_name' => _x('Price Plans', 'post type singular name', 'heman'),
	    	'add_new' => _x('Add New Price Plan', 'book', 'heman'),
	    	'add_new_item' => __('Add New Price Plan', 'heman'),
	    	'edit_item' => __('Edit Price Plan', 'heman'),
	    	'new_item' => __('New Price Plan', 'heman'),
	    	'view_item' => __('View Price Plan', 'heman'),
	    	'search_items' => __('Search Price Plans', 'heman'),
	    	'not_found' =>  __('No Price Plan found', 'heman'),
	    	'not_found_in_trash' => __('No Price Plans found in Trash', 'heman'), 
	    	'parent_item_colon' => ''
		);		
		$args = array(
	    	'labels' => $labels,
	    	'public' => true,
	    	'publicly_queryable' => true,
	    	'show_ui' => true, 
	    	'query_var' => true,
	    	'rewrite' => true,
	    	'capability_type' => 'post',
	    	'hierarchical' => false,
	    	'menu_position' => null,
	    	'supports' => array('title','editor', 'thumbnail'),
	    	'menu_icon' => get_stylesheet_directory_uri().'/images/plans.png'
		); 		

		register_post_type( 'price_plan', $args ); 				  
	} 
									  
	add_action('init', 'post_type_portfolios');


	add_action( 'add_meta_boxes', 'plan_ads_box' );
	function plan_ads_box() {
	    add_meta_box( 
	        'plan_ads_box',
	        __( 'Featured Ads', 'myplugin_textdomain' ),
	        'plan_ads_content',
	        'price_plan',
	        'side',
	        'high'
	    );
	}

	function plan_ads_content( $post ) {

		$featured_ads = get_post_meta( $post->ID, 'featured_ads', true );

		echo '<label for="featured_ads"></label>';
		echo '<input type="text" id="featured_ads" name="featured_ads" placeholder="Leave empty for unlimited" value="';
		echo $featured_ads; 
		echo '">';
		
	}

	add_action( 'save_post', 'project_link_box_save' );
	function project_link_box_save( $post_id ) {		

		global $featured_ads;

		if(isset($_POST["featured_ads"]))
		$featured_ads = $_POST['featured_ads'];
		update_post_meta( $post_id, 'featured_ads', $featured_ads );

	}


	add_action( 'add_meta_boxes', 'plan_price_box' );
	function plan_price_box() {
	    add_meta_box( 
	        'plan_price_box',
	        __( 'Price', 'myplugin_textdomain' ),
	        'plan_price_content',
	        'price_plan',
	        'side',
	        'high'
	    );
	}

	function plan_price_content( $post ) {

		$plan_price = get_post_meta( $post->ID, 'plan_price', true );

		echo '<label for="plan_price"></label>';
		echo '<input type="text" id="plan_price" name="plan_price" placeholder="" value="';
		echo $plan_price; 
		echo '">';
		
	}


	add_action( 'save_post', 'plan_price_save' );
	function plan_price_save( $post_id ) {		

		global $plan_price;

		if(isset($_POST["plan_price"]))
		$plan_price = $_POST['plan_price'];
		update_post_meta( $post_id, 'plan_price', $plan_price );

	}



	add_action( 'add_meta_boxes', 'plan_time_box' );
	function plan_time_box() {
	    add_meta_box( 
	        'plan_time_box',
	        __( 'Days', 'myplugin_textdomain' ),
	        'plan_time_content',
	        'price_plan',
	        'side',
	        'high'
	    );
	}

	function plan_time_content( $post ) {

		$plan_time = get_post_meta( $post->ID, 'plan_time', true );

		echo '<label for="plan_time"></label>';
		echo '<input type="text" id="plan_time" name="plan_time" placeholder="Leave empty for unlimited" value="';
		echo $plan_time; 
		echo '">';
		
	}


	add_action( 'save_post', 'plan_time_save' );
	function plan_time_save( $post_id ) {		

		global $plan_time;

		if(isset($_POST["plan_time"]))
		$plan_time = $_POST['plan_time'];
		update_post_meta( $post_id, 'plan_time', $plan_time );

	}
	
	
	
	add_action( 'add_meta_boxes', 'plan_user_box_cancel' );
	function plan_user_box_cancel() {
	    add_meta_box( 
	        'plan_user_box_cancel',
	        __( 'Put here USERNAME to cancel this plan for particular user (Leave empty for nothing)', 'myplugin_textdomain' ),
	        'plan_user_content_cancel',
			'price_plan'

	    );
	}

	function plan_user_content_cancel( $post ) {
		
		echo '<label for="plan_cancel"></label>';
		echo '<input type="text" id="plan_cancel" name="plan_cancel" placeholder="USERNAME" value="';

		echo '">';
	}
	
	add_action( 'save_post', 'plan_user_del_save' );
	function plan_user_del_save( $post_id ) {
		global $wpdb;
		if (isset($_POST['plan_cancel'])) {
		$plan_cancel = $_POST['plan_cancel'];
		$user = get_user_by( 'login', $plan_cancel );
		$user_cancel = $user->ID;
		$posttitle  = get_the_title($post->ID);
			$result = $wpdb->get_results( "SELECT * FROM wpcads_paypal WHERE user_id = $user_cancel AND name = '$posttitle'  ORDER BY main_id DESC" );

				if (!empty($result )) {
					
				  foreach ( $result as $key => $row ) {
					  
							if($row->ads == '0'){
								$wpdb->update('wpcads_paypal', array('ads'=> '2', 'used'=>'2'), array( 'main_id'=>$row->main_id) );

							}else{
							$wpdb->update('wpcads_paypal', array('used'=>$row->ads), array( 'main_id'=>$row->main_id) );
							}

	
					}
				  
				}
				
		}
	}
	
	
	
	add_action( 'add_meta_boxes', 'plan_user_box' );
	function plan_user_box() {
	    add_meta_box( 
	        'plan_user_box',
	        __( 'Put here USERNAME to assign this plan for particular user (Leave empty for nothing)', 'myplugin_textdomain' ),
	        'plan_user_content',
			'price_plan'

	    );
	}

	function plan_user_content( $post ) {
		
		echo '<label for="plan_add"></label>';
		echo '<input type="text" id="plan_add" name="plan_add" placeholder="USERNAME" value="';

		echo '">';
	}
	
	add_action( 'save_post', 'plan_user_add_save' );
	function plan_user_add_save( $post_id ) {
				global $plan_time;
				global $featured_ads;
				global $plan_price;
				global $post_title;
				global $wpdb;
		if (!empty($_POST['plan_add'])) {
		$plan_add = $_POST['plan_add'];
		$user = get_user_by( 'login', $plan_add );
		$user_add = $user->ID;
		$posttitle  = get_the_title($post->ID);


			$price_plan_information = array(
				'id' => '',
				'user_id' => $user_add,
				'name' => $posttitle,
				'token' => "",
				'price' => $plan_price,
				'currency' => "",
				'ads' => $featured_ads,
				'days' => $plan_time,
				'date' => date("m/d/Y H:i:s"),
				'status' => "success",
				'used' => "0",
				'transaction_id' => "",
				'firstname' => "",
				'lastname' => "",
				'email' => "",
				'description' => "",
				'summary' => "",
				'created' => time()
			  ); 

			  $insert_format = array('%s', '%s', '%s','%s', '%f', '%s', '%d', '%d', '%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s');
				$result = $wpdb->get_results( "SELECT * FROM wpcads_paypal WHERE user_id = $plan_add AND name = '$posttitle'  ORDER BY main_id DESC" );

				if (empty($result )) {
				$wpdb->insert('wpcads_paypal', $price_plan_information, $insert_format);
				}
		}
	}


?>