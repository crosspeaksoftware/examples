<?php
/*
 * Use the filter if you need to override the Entry Date to use the WordPress timezone instead of UTC when submitting to Klaviyo.
 * You can edit the date format to match your needs.
 * See https://www.php.net/manual/en/datetime.format.php for information on date format.
 */


/**
 * Override the Entry Date to use the WordPress timezone instead of UTC when submitting to Klaviyo.
 *
 * @param string $field_value The field value.
 * @param array  $form        The form object currently being processed.
 * @param array  $entry       The entry object currently being processed.
 * @param string $field_id    The ID of the field being processed.
 *
 * @return string
 */
function custom_gform_crosspeak_klaviyo_field_value( $value, $form, $entry, $field_id ) {
	if ( 'date_created' === $field_id ) {
		return wp_date( 'Y-m-d H:i:s T', strtotime( $value ) );
	}
	return $value;
}
add_filter( 'gform_crosspeak_klaviyo_field_value', 'custom_gform_crosspeak_klaviyo_field_value', 10, 4 );
