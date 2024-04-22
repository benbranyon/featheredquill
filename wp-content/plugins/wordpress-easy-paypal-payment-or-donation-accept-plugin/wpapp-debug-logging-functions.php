<?php 

function wpapp_log_payment_debug( $message, $success, $end = false ) {
	$logfile = wpapp_get_log_file_path();
	$debug = defined( 'WPAPP_ENABLE_DEBUG' ) ? WPAPP_ENABLE_DEBUG : false;
	if ( ! $debug ) {
		//Debug is not enabled.
		return;
	}

	// Timestamp
	$text = '[' . date( 'm/d/Y g:i A' ) . '] - ' . ( ( $success ) ? 'SUCCESS :' : 'FAILURE :' ) . $message . "\n";
	if ( $end ) {
		$text .= "\n------------------------------------------------------------------\n\n";
	}
	// Write to log
	$fp = fopen( $logfile, 'a' );
	fwrite( $fp, $text );
	fclose( $fp );
}

function wpapp_log_debug_array( $array_to_write, $success, $end = false ) {
	$logfile = wpapp_get_log_file_path();
	$debug = defined( 'WPAPP_ENABLE_DEBUG' ) ? WPAPP_ENABLE_DEBUG : false;
	if ( ! $debug ) {
		//Debug is not enabled.
		return;
	}
	$text = '[' . date( 'm/d/Y g:i A' ) . '] - ' . ( ( $success ) ? 'SUCCESS :' : 'FAILURE :' ) . "\n";
	ob_start();
	print_r( $array_to_write );
	$var = ob_get_contents();
	ob_end_clean();
	$text .= $var;

	if ($end) {
		$text .= "\n------------------------------------------------------------------\n\n";
	}
	// Write to log
	$fp = fopen( $logfile, 'a' );
	fwrite( $fp, $text );
	fclose( $fp ); // close filee
}

function wpapp_get_log_file_path(){
	$log_file_path = WPAPP_PLUGIN_PATH . 'wpapp-log-'. wpapp_get_log_file_suffix() .'.txt';
	return $log_file_path;
}
/**
 * Generates a unique suffix for filename.
 * @return string File name suffix.
 */
function wpapp_get_log_file_suffix() {
	$suffix = get_option( 'wpapp_logfile_suffix' );
	if ( $suffix ) {
		return $suffix;
	}

	$suffix = uniqid();
	update_option( 'wpapp_logfile_suffix', $suffix );

	return $suffix;
}

