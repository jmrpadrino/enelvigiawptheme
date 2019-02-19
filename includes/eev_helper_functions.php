<?php

/** 
 * PREFERENCES MANAGEMENT
 */
if( isset( $_POST ) && isset( $_POST['submited_preferences'] ) ){
	$user_id = $_POST['user_id'];
	unset($_POST['submited_preferences']);
	unset($_POST['user_id']);
	$cats = array();
	foreach ($_POST as $index => $value){
		$cats[] = $index;
	}
	if ( get_user_meta( $user_id, 'eev_user_preferences') ){
		update_user_meta($user_id, 'eev_user_preferences', $cats);
	}else{
		add_user_meta($user_id, 'eev_user_preferences', $cats);
	}
}

function get_user_prefs($user_id){
	return get_user_meta( $user_id, 'eev_user_preferences', true);
}