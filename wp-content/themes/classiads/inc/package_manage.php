<?php
/*-----------------------------------------------------------------------------------*/
// Realesta PayPal Payments List - Register Sub Menu
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'realesta_register_properties_payments_page' ) ){
    function realesta_register_properties_payments_page(){
        add_submenu_page(
            'edit.php?post_type=price_plan'
            , __('Transaction','agrg')
            , __('Transaction','agrg')
            , 'manage_options'
            , 'ads-payments'
            , 'realesta_display_properties_payments'
        );
    }
}
add_action('admin_menu', 'realesta_register_properties_payments_page');
if( !function_exists( 'realesta_display_properties_payments' ) ){
    function realesta_display_properties_payments(){
        ?>
		<h2>User_id 1 is admin's id and 0 ads means unlimited ads.</h2>
        <table id="payments-table" cellpadding="10px">
            <tr>
                <th><?php _e('Transaction ID','agrg');?></th>
                <th><?php _e('Purchase Date','agrg');?></th>
				<th><?php _e('User ID','agrg');?></th>
                <th><?php _e('Name','agrg');?></th>
                <th><?php _e('Email','agrg');?></th>
                <th><?php _e('Plan Name','agrg');?></th>
                <th><?php _e('Amount','agrg');?></th>
                <th><?php _e('Ads','agrg');?></th>
                <th><?php _e('Ads used','agrg');?></th>
                <th><?php _e('Status','agrg');?></th>
                <th><?php _e('Activated By','agrg');?></th>
            </tr>
            <?php
			global $wpdb;
			$result = $wpdb->get_results( "SELECT * FROM wpcads_paypal ORDER BY main_id DESC" );
			if (!empty($result )){
					
					foreach ( $result as $key => $row ) {	
					$user_info = get_userdata($row->user_id);
			
			?>
                    <tr>
                        <td><?php echo $row->transaction_id; ?></td>
                        <td><?php echo $row->date; ?></td>
                        <td><?php echo $row->user_id; ?></td>
                        <td><?php echo $user_info->first_name .' ' .$user_info->last_name; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->price; ?></td>
                        <td><?php echo $row->ads; ?></td>
                        <td><?php echo $row->used; ?></td>
                        <td><?php echo $row->status; ?></td>
                        <td><?php if(!empty($row->transaction_id)){ echo 'Paypal';}else{ echo 'Admin';}; ?></td>
                    </tr>
                    <?php
					
					}
				}else{
                ?>
                <tr>
                    <td colspan="11"><?php _e('No Completed Payment Found!','agrg'); ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
}


