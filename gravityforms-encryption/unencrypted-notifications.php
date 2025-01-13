<?php

/**
 * When used with Gravity Forms Encryption, this will allow you to send encrypted data to notifications.
 *
 * https://www.crosspeaksoftware.com/downloads/gravity-forms-encryption/
 */

/**
 * Remove the filter which replaces the data in notifications with placeholders.
 */
remove_filter( 'gform_merge_tag_filter', 'gf_encryption_gform_merge_tag_filter', 10, 4 );
