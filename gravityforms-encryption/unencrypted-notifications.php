<?php

/**
 * When used with Gravity Forms Encryption, this will allow you to send encrypted data to notifications.
 *
 * https://www.crosspeaksoftware.com/downloads/gravity-forms-encryption/
 */

/**
 * Remove the default function from the plugin that triggers the notifications to use placeholders.
 */
remove_filter( 'gform_notification', 'gf_encryption_notification_start', 10, 1 );

/**
 * Only send decrypted notifications if the "to" field of the notification is exactly "secure@example.com".
 *
 * @param array $notification  Notification data.
 * @return array
 */
function only_certain_email_address( $notification ) {
	if ( 'secure@example.com' === $notification['to'] ) {
		return $notification;
	}
	global $gf_encryption_sending_notification;

	$gf_encryption_sending_notification = true;

	return $notification;
}
add_filter( 'gform_notification', 'only_certain_email_address', 10, 1 );

/**
 * Only send decrypted notifications if the "id" field of the notification is exactly "51794abf1f0d2".
 *
 * @param array $notification  Notification data.
 * @return array
 */
function only_certain_notification_id( $notification ) {
	if ( '51794abf1f0d2' === $notification['id'] ) {
		return $notification;
	}
	global $gf_encryption_sending_notification;

	$gf_encryption_sending_notification = true;

	return $notification;
}
add_filter( 'gform_notification', 'only_certain_notification_id', 10, 1 );

