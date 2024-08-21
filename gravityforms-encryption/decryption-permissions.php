<?php

/**
 * Only allow certain roles to decrypt the encrypted data.
 * This sample code only allows users with the custom role 'gravityforms_admin' to decrypt the data.
 * All other users will not be able to decrypt the data.
 *
 * @param bool     $can_decrypt If the field can be decrypted.
 * @param GF_Field $field    The current field object.
 * @return bool
 */
function custom_encryption_can_decrypt_field_value( $can_decrypt, $field ) {
	if ( ! $can_decrypt ) {
		return $can_decrypt;
	}
	$user = wp_get_current_user();
	foreach ( $user->roles as $role ) {
		if ( 'gravityforms_admin' === $role ) {
			return true;
		}
	}
	return false;
}
add_action( 'gf_encryption_can_decrypt_field_value', 'custom_encryption_can_decrypt_field_value', 10, 2 );
