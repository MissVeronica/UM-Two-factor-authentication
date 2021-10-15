<?php
// Add  “WP 2FA – Two-factor Authentication for WordPress” plugin tab to the Ultimate Member profile account page
// Add this code to your child-theme functions.php file or use the "Code Snippets" plugin

add_filter( 'um_account_page_default_tabs_hook', 'custom_tab_in_um', 100, 1 );

	function  custom_tab_in_um( $tabs ) {

		if( defined( 'WP_2FA_VERSION' )) {
			$tabs[800]['my_tab_2fa']['icon'] = 'far um-icon-document-text';
			$tabs[800]['my_tab_2fa']['title'] = __( 'WP 2FA Settings', 'wp-2fa' );
			$tabs[800]['my_tab_2fa']['show_button'] = false;
			$tabs[800]['my_tab_2fa']['custom'] = true;
		}

		return $tabs;
	}

add_filter( 'um_account_content_hook_my_tab_2fa', 'um_account_content_hook_my_tab_2fa', 10, 2 );
	
	function um_account_content_hook_my_tab_2fa( $output, $shortcode_args ) {
		
		if( defined( 'WP_2FA_VERSION' )) {
			return do_shortcode( '[wp-2fa-setup-form]' );
		}
	}
