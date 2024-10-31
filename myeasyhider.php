<?php
/*
Plugin Name: myEASYhider
Plugin URI: http://myeasywp.com/plugins/myeasyhider/
Description: Easily hide parts of your administration page.
Version: 1.2
Author: Ugo Grandolini aka "camaleo"
Author URI: http://grandolini.com
*/
/*
	Copyright (C) 2010,2012 Ugo Grandolini  (email : info@myeasywp.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
	*/

define('MEH_PATH', dirname(__FILE__) . '/');

define('myEASYcomCaller', 'myeasyhider');    # @since 1.0.7: the plugin install folder

/* 1.0.8: BEG */

/**
 * set the plugin folder name
 * @since 1.1.1
 */
//$myeasycom_pluginname = '/myeasyhider/'; # 1.0.8.1
$tmp = explode('/', MEH_PATH);
$i = count($tmp) - 2;
$myeasycom_pluginname = '/' . $tmp[$i] . '/';


//define('MYEASY_CDN', 'http://srht.me/f9'); # 0.1.4
define('MYEASY_CDN', plugins_url() . $myeasycom_pluginname);
define('MYEASY_CDN_IMG', MYEASY_CDN . 'img/');
define('MYEASY_CDN_CSS', MYEASY_CDN . 'css/');
define('MYEASY_CDN_JS', MYEASY_CDN . 'js/');
/* 1.0.8: END */

#
# debug
//define('MEH_PRO', false);
//define('MEHDEV', '');
# debug
#

/**
 * link to the plugin folder (eg. http://example.com/wordpress-2.9.1/wp-content/plugins/MyPlugin/)
 */
$myEASYhider_dir = basename(dirname(__FILE__));
define('MYEASYHIDER_LINK', get_option('siteurl') . '/wp-content/plugins/' . $myEASYhider_dir . '/');

if(is_dir(ABSPATH . PLUGINDIR . '/myeasyhider-pro')) {

	define('MYEASYHIDER_PRO', ABSPATH . PLUGINDIR . '/myeasyhider-pro/');
	define('MYEASYHIDER_PRO_LINK', get_option('siteurl') . '/wp-content/plugins/myeasyhider-pro/');

	define('MEHDEV', '.dev'); // use uncompressed sources
//	define('MEH_PRO', true);
//	define('MEH_PRO_LABEL', ' PRO');

	define('MEH_PROPHP', MYEASYHIDER_PRO . 'myEASYhider-PRO.php');
	define('MEH_PROJS',  MYEASYHIDER_PRO_LINK . 'myEASYhider-PRO.js');

	require(MEH_PROPHP);
}
else if(is_dir(ABSPATH . PLUGINDIR . '/myeasyhider-pro-SRC')) {

	define('MYEASYHIDER_PRO', ABSPATH . PLUGINDIR . '/myeasyhider-pro-SRC/');
	define('MYEASYHIDER_PRO_LINK', get_option('siteurl') . '/wp-content/plugins/myeasyhider-pro-SRC/');

	define('MEHDEV', ''); // use minified versions
//	define('MEH_PRO', true);
//	define('MEH_PRO_LABEL', ' PRO');

	define('MEH_PROPHP', MYEASYHIDER_PRO . 'myEASYhider-PRO.php');
	define('MEH_PROJS',  MYEASYHIDER_PRO_LINK . 'myEASYhider-PRO.js');

	require(MEH_PROPHP);
}
else {

	define('MEHDEV', ''); // use minified versions
	define('MEH_PRO', false);
	define('MEH_PRO_LABEL', '');
}

//echo 'MEH_PRO[' . MEH_PRO . ']<br>';
//die();
//echo 'ABSPATH[' . ABSPATH . ']<br>';
//echo 'PLUGINDIR[' . PLUGINDIR . ']<br>';
//echo 'MEH_PROPHP[' . MEH_PROPHP . ']<br>';
//echo 'MEH_PROJS[' . MEH_PROJS . ']<br>';

//if(defined('MEH_PRO') && MEH_PRO == true
//	&& defined('MEH_PROPHP') && file_exists(MEH_PROPHP)
//	&& str_replace('/', '', $_SERVER['SCRIPT_NAME']) == 'wp-login.php') {
//
//	/***********
//	 * LOGIN
//	 * @since 1.0.7
//	 */
//	if(get_option('meh_isACTIVE')==true) {
//
//		include_once(MEH_PROPHP);
//		add_action( 'login_head', '__meh_pro_login_hack' );
//	}
//}
if(str_replace('/', '', $_SERVER['SCRIPT_NAME']) == 'wp-login.php') {

	/***********
	 * LOGIN
	 * @since 1.0.7
	 */
	if(get_option('meh_isACTIVE') == true) {

//		include_once(MEH_PROPHP);
		if(function_exists('__meh_pro_login_hack')) {

			add_action( 'login_head', '__meh_pro_login_hack' );
		}
	}
}


if(!is_admin()) {

	/***********
	 * FRONTEND
	 */

	/**
	 * @since 1.0.4 on demand, show the credits on the footer
	 */
//	if(!defined('MEH_PRO') || MEH_PRO != true) {
//
//		if(get_option('myeasy_showcredits')==1
//		   && !function_exists('myeasy_credits')
//		   && !defined('MYEASY_SHOWCREDITS')) {    /* 1.0.5 changed all references from 'meh_showcredits' */
//
//			/**
//			 * on demand, show the credits on the footer
//			 */
//			define('MEBAK_FOOTER_CREDITS', '<div style="font-size:9px;text-align:center;">'
//					.'<a href="http://myeasywp.com" target="_blank">Improve Your Life, Go The myEASY Way&trade;</a>'
//					.'</div>');
//
//			add_action('wp_footer', 'myeasy_credits');
//			function myeasy_credits() {
//
//				echo MEBAK_FOOTER_CREDITS;
//				define('MYEASY_SHOWCREDITS', true);
//			}
//		}
//	}

	if(defined('MEH_PRO') && MEH_PRO == true && get_option('meh_isACTIVE') == true) {

		/**
		 * @since 1.1
		 */
		include_once(MEH_PROPHP);

		$tmp = get_option('meh_private');
		if(strlen($tmp)==0) { $tmp = 0;}
		if($tmp==1) {

			add_filter('login_headertitle','__meh_pro_login_message');
			add_action('do_feed', '__meh_pro_private',1);
			add_action('do_feed_rdf', '__meh_pro_private',1);
			add_action('do_feed_rss', '__meh_pro_private',1);
			add_action('do_feed_rss2', '__meh_pro_private',1);
			add_action('do_feed_atom', '__meh_pro_private',1);
			add_action('get_header', '__meh_pro_private');
		}
	}
	else {

		if(get_option('myeasy_showcredits') == 1
			&& !function_exists('myeasy_credits')
			&& !defined('MYEASY_SHOWCREDITS')) {    /* 1.0.5 changed all references from 'meh_showcredits' */

			/**
			 * on demand, show the credits on the footer
			 */
			define('MEBAK_FOOTER_CREDITS', '<div style="font-size:9px;text-align:center;">'
				  . '<a href="http://myeasywp.com" target="_blank">Improve Your Life, Go The myEASY Way&trade;</a>'
				  . '</div>');

			add_action('wp_footer', 'myeasy_credits');
			function myeasy_credits() {

				echo MEBAK_FOOTER_CREDITS;
				define('MYEASY_SHOWCREDITS', true);
			}
		}
	}
}
else {

	/***********
	 * BACKEND
	 */

	/**
	 * @since 1.0.3 the code is executed only when in the admin pages
	 */
	define('MEH_LOCALE', 'myEASYhider');
	define('SAVE_BTN', __('Update Options', MEH_LOCALE ));
	define('LOAD_USR_BTN', __('Load User Settings', MEH_LOCALE ));  #   1.0.4
	define('SAVE_USR_BTN', __('Save User Settings', MEH_LOCALE ));  #   1.0.4

//	#
//	#	link to the plugin folder (eg. http://example.com/wordpress-2.9.1/wp-content/plugins/MyPlugin/)
//	#
//	$myEASYhider_dir = basename(dirname(__FILE__));
//	define(MYEASYHIDER_LINK, get_option('siteurl').'/wp-content/plugins/' . $myEASYhider_dir . '/');

//	if(defined('MEH_PRO') && MEH_PRO == true ) {
//
//		include_once(MEH_PROPHP);
//	}

	require(MEH_PATH . '/inc/myEASYcom.php'); #	1.0.2

	#
	#	hook for adding admin menus
	#
	add_action('admin_menu', 'myEASYhider_add_pages');

	load_plugin_textdomain( MEH_LOCALE, 'wp-content/plugins/' . $myEASYhider_dir, $myEASYhider_dir . '/langs/' );

	$time = time(); # 1.0.8.1

	wp_enqueue_style( 'meh_style', MYEASYHIDER_LINK.'css/meh' . MEHDEV . '.css', '', $time, 'screen' );	#	1.0.3
	wp_enqueue_style( 'myeasywp_common', MYEASY_CDN_CSS.'myeasywp' . MEHDEV . '.css', '', $time, 'screen' );	#	1.0.3

	wp_enqueue_script( 'meh_js', MYEASYHIDER_LINK.'js/meh' . MEHDEV . '.js', '', $time, false );

	if(defined('MEH_PRO') && MEH_PRO == true ) {

		wp_enqueue_script( 'meh_pro_js', MEH_PROJS, '', $time, false );
	}
	wp_enqueue_script( 'myeasywp_common', MYEASY_CDN_JS.'myeasywp' . MEHDEV . '.js', '', $time, false );    #	1.0.7

	#
	#	action function for the above hook
	#
	function myEASYhider_add_pages() {

		#	Settings
		#
		add_options_page(__( 'myEASYhider', MEH_LOCALE ), __( 'myEASYhider ' . MEH_PRO_LABEL, MEH_LOCALE ), 'administrator', 'myEASYhider_options', 'myEASYhider_options_page');
	}

	function myEASYhider_options_page() {

		#	Settings
		#
		global $wpdb;

		echo '<div class="wrap">'
				.'<div id="icon-options-general" class="icon32" style="background:url('.MYEASY_CDN_IMG.'icon.png);"><br /></div>'
				.'<h2>myEASYhider'. MEH_PRO_LABEL .': ' . __( 'Settings', MEH_LOCALE ) . '</h2>'
		;

		if(!defined('MEH_PRO') || MEH_PRO != true) {

			#	free
			#
			measycom_advertisement('meh');
		}

		if(strlen($_POST['_action'])>0) { $_POST['btn'] = $_POST['_action']; }    #   1.0.4

//echo '['.$_POST['btn'].']<br>';
//var_dump($_POST);
//echo '<hr>';


		switch($_POST['btn']) {

			#----------------
			case LOAD_USR_BTN:
			#----------------
				#
				#   load the selected user settings @since 1.0.4
				#
				unset($_POST['total_def_items'], $_POST['meh_ids']);

//				if(isset($_POST['load_user_settings'])) {
					$_POST['users_menu'] = $_POST['load_user_settings'];
//				}

//echo 'load_user_settings['.$_POST['load_user_settings'].']<br>';    #   debug

				unset($_POST['roles_menu']); #  1.0.7
				break;
				#
			#----------------
			case SAVE_USR_BTN:
			#----------------
				#
				#   save the selected user settings @since 1.0.4
				#
				if((int)$_POST['total_def_items']>0) {

					$def_items = ''
							. $_POST['header-logo'] . ','
							. $_POST['favorite-actions'] . ','
							. $_POST['menu-posts'] . ','
							. $_POST['menu-media'] . ','
							. $_POST['menu-links'] . ','
							. $_POST['menu-pages'] . ','
							. $_POST['menu-comments'] . ','
							. $_POST['menu-appearance'] . ','
							. $_POST['menu-plugins'] . ','
							. $_POST['menu-users'] . ','
							. $_POST['menu-tools'] . ','
							. $_POST['menu-settings'] . ','
							. $_POST['update-nag'] . ','
							. $_POST['screen-options-link-wrap'] . ','
							. $_POST['contextual-help-link'] . ','
							. $_POST['dashboard_right_now'] . ','
							. $_POST['dashboard_quick_press'] . ','
							. $_POST['dashboard_recent_comments'] . ','
							. $_POST['dashboard_recent_drafts'] . ','
							. $_POST['dashboard_primary'] . ','
							. $_POST['dashboard_incoming_links'] . ','
							. $_POST['dashboard_plugins'] . ','
							. $_POST['dashboard_secondary'] . ','
							. $_POST['wp-version-message'] . ','
							. $_POST['wp-admin-bar-updates'] . ','  // 1.1.2
							. $_POST['wp-admin-bar-comments'] . ',' // 1.1.2
							. $_POST['footer-left'] . ','
							. $_POST['footer-upgrade']
					;
					update_option( 'meh_def_items'.$_POST['users_menu'], $def_items );
				}

				if(isset($_POST['meh_ids'])) {

					$_POST['meh_ids'] = measycom_sanitize_input($_POST['meh_ids'], false, '*nospace'); # 1.0.7
					if(substr($_POST['meh_ids'],-1)==',') {

						$_POST['meh_ids'] = substr($_POST['meh_ids'],0,-1);
					}
					update_option( 'meh_ids'.$_POST['users_menu'], $_POST['meh_ids'] );
				}

				if(defined('MEH_PRO') && MEH_PRO == true ) {

					__meh_pro_update_options();
				}

				unset($_POST['total_def_items'], $_POST['meh_ids']);
				break;
				#
			#----------------
			case LOAD_ROLE_BTN:
			#----------------
				#
				#   load the selected role settings @since 1.0.7
				#
				unset($_POST['total_def_role_items'], $_POST['meh_role_ids']);
				$_POST['roles_menu'] = $_POST['load_role_settings'];

//echo 'load_role_settings['.$_POST['load_role_settings'].']<br>';    #   debug

				unset($_POST['users_menu']);
				break;
				#
			#----------------
			case SAVE_ROLE_BTN:
			#----------------
				#
				#   save the selected role settings @since 1.0.7
				#
//echo 'total_def_role_items['.$_POST['total_def_role_items'].']<br>';    #   debug
//die();
				if((int)$_POST['total_def_role_items']>0) {

					$def_items = ''
							. $_POST['header-logo'] . ','
							. $_POST['favorite-actions'] . ','
							. $_POST['menu-dashboard'] . ','
							. $_POST['menu-posts'] . ','
							. $_POST['menu-media'] . ','
							. $_POST['menu-links'] . ','
							. $_POST['menu-pages'] . ','
							. $_POST['menu-comments'] . ','
							. $_POST['menu-appearance'] . ','
							. $_POST['menu-plugins'] . ','
							. $_POST['menu-users'] . ','
							. $_POST['menu-tools'] . ','
							. $_POST['menu-settings'] . ','
							. $_POST['update-nag'] . ','
							. $_POST['screen-options-link-wrap'] . ','
							. $_POST['contextual-help-link'] . ','
							. $_POST['dashboard_right_now'] . ','
							. $_POST['dashboard_quick_press'] . ','
							. $_POST['dashboard_recent_comments'] . ','
							. $_POST['dashboard_recent_drafts'] . ','
							. $_POST['dashboard_primary'] . ','
							. $_POST['dashboard_incoming_links'] . ','
							. $_POST['dashboard_plugins'] . ','
							. $_POST['dashboard_secondary'] . ','
							. $_POST['wp-version-message'] . ','
							. $_POST['wp-admin-bar-updates'] . ','  // 1.1.2
							. $_POST['wp-admin-bar-comments'] . ',' // 1.1.2
							. $_POST['footer-left'] . ','
							. $_POST['footer-upgrade']
					;
//echo 'update_option( meh_def_items_roles'.$_POST['roles_menu'].', '.$def_items.' );';
//die();
					update_option( 'meh_def_items_role'.$_POST['roles_menu'], $def_items );
				}

				if(isset($_POST['meh_ids'])) {

					$_POST['meh_ids'] = measycom_sanitize_input($_POST['meh_ids'], false, '*nospace'); # 1.0.7
					if(substr($_POST['meh_ids'],-1)==',') {

						$_POST['meh_ids'] = substr($_POST['meh_ids'],0,-1);
					}
					update_option( 'meh_role_ids'.$_POST['roles_menu'], $_POST['meh_ids'] );
				}

				if(defined('MEH_PRO') && MEH_PRO == true ) {

					__meh_pro_update_options();
				}

				unset($_POST['total_def_role_items'], $_POST['meh_ids']);
				break;
				#
			#----------------
			case SAVE_BTN:
			#----------------
				#
				#	save the posted value in the database
				#
				if(isset($_POST['total_allowed_users'])) {

					$allowed_users = '';
					for($i=0;$i<$_POST['total_users'];$i++) {

						if(isset($_POST['user'.$i])) {

							$allowed_users .= $_POST['user'.$i] . ',';
						}
					}
					$allowed_users = trim(substr($allowed_users,0,-1));
					update_option( 'meh_allowed_users', $allowed_users );
				}

/*
 * TODO PRO: save also roles settings?
 */

				if((int)$_POST['total_def_items']>0) {

					$def_items = ''
							. $_POST['header-logo'] . ','
							. $_POST['favorite-actions'] . ','
							. $_POST['menu-dashboard'] . ','
							. $_POST['menu-posts'] . ','
							. $_POST['menu-media'] . ','
							. $_POST['menu-links'] . ','
							. $_POST['menu-pages'] . ','
							. $_POST['menu-comments'] . ','
							. $_POST['menu-appearance'] . ','
							. $_POST['menu-plugins'] . ','
							. $_POST['menu-users'] . ','
							. $_POST['menu-tools'] . ','
							. $_POST['menu-settings'] . ','
							. $_POST['update-nag'] . ','
							. $_POST['screen-options-link-wrap'] . ','
							. $_POST['contextual-help-link'] . ','
							. $_POST['dashboard_right_now'] . ','
							. $_POST['dashboard_quick_press'] . ','
							. $_POST['dashboard_recent_comments'] . ','
							. $_POST['dashboard_recent_drafts'] . ','
							. $_POST['dashboard_primary'] . ','
							. $_POST['dashboard_incoming_links'] . ','
							. $_POST['dashboard_plugins'] . ','
							. $_POST['dashboard_secondary'] . ','
							. $_POST['wp-version-message'] . ','
							. $_POST['wp-admin-bar-updates'] . ','  // 1.1.2
							. $_POST['wp-admin-bar-comments'] . ',' // 1.1.2
							. $_POST['footer-left'] . ','
							. $_POST['footer-upgrade']
					;
//					update_option( 'meh_def_items', $def_items );                       #   1.0.4
					update_option( 'meh_def_items'.$_POST['users_menu'], $def_items );  #   1.0.4
				}

				if(isset($_POST['meh_ids'])) {

					$_POST['meh_ids'] = measycom_sanitize_input($_POST['meh_ids'], false, '*nospace'); # 1.0.7
					if(substr($_POST['meh_ids'],-1)==',') {

						$_POST['meh_ids'] = substr($_POST['meh_ids'],0,-1);
					}

//					update_option( 'meh_ids', $_POST['meh_ids'] );                      #   1.0.4
					update_option( 'meh_ids'.$_POST['users_menu'], $_POST['meh_ids'] ); #   1.0.4
				}

				if(isset($_POST['meh_isACTIVE'])) {

					update_option( 'meh_isACTIVE', 1 );
				}
				else {

					update_option( 'meh_isACTIVE', 0 );
				}

				if(defined('MEH_PRO') && MEH_PRO == true ) {

					__meh_pro_update_options();
				}

				if(isset($_POST['myeasy_showcredits'])) {

					update_option( 'myeasy_showcredits', 1 );
				}
				else {

					update_option( 'myeasy_showcredits', 0 );
				}

				/**
				 * @since 1.0.7
				 */
				if(isset($_POST['meh_searchid'])) {

					update_option( 'meh_searchid', $_POST['meh_searchid'] );
				}
				else {

					update_option( 'meh_searchid', 0 );
				}

				unset($_POST['total_def_items']);
				break;
				#
			default:
		}

		#
		#	populate the input fields when the page is loaded
		#
		if(!isset($_POST['total_users'])) {

			#	get the users list
			#
			$sql = 'SELECT count(*) as tu FROM `'.$wpdb->users.'` ';
			$rows = $wpdb->get_results( $sql );

			$allowed_users = explode(',', get_option('meh_allowed_users'));

			$_POST['total_allowed_users'] = count($allowed_users);
			$_POST['total_users'] = $rows[0]->tu;

			$i = 0;
			for($i=0;$i<$_POST['total_allowed_users'];$i++) {

				$_POST['user'.$i] = trim($allowed_users[$i]);
			}
		}

		$i = 0;
		if(!isset($_POST['total_def_items'])) {

			/* 1.0.4: BEG */
//			$items_values = explode(',', get_option('meh_def_items'));
			$items_values = explode(',', get_option('meh_def_items'.$_POST['users_menu']));

			if(count($items_values)==1) {

				#   there are no specific settings for this user, get the default ones
				#
				$items_values = explode(',', get_option('meh_def_items'));
			}
			/* 1.0.4: END */

			$items_classes = array();
			unset(  $_POST['header-logo'],
					$_POST['favorite-actions'],
					$_POST['menu-dashboard'],
					$_POST['menu-posts'],
					$_POST['menu-media'],
					$_POST['menu-links'],
					$_POST['menu-pages'],
					$_POST['menu-comments'],
					$_POST['menu-appearance'],
					$_POST['menu-plugins'],
					$_POST['menu-users'],
					$_POST['menu-tools'],
					$_POST['menu-settings'],
					$_POST['update-nag'],
					$_POST['screen-options-link-wrap'],
					$_POST['contextual-help-link'],
					$_POST['dashboard_right_now'],
					$_POST['dashboard_quick_press'],
					$_POST['dashboard_recent_comments'],
					$_POST['dashboard_recent_drafts'],
					$_POST['dashboard_primary'],
					$_POST['dashboard_incoming_links'],
					$_POST['dashboard_plugins'],
					$_POST['dashboard_secondary'],
					$_POST['wp-version-message'],
					$_POST['wp-admin-bar-updates'],  // 1.1.2
					$_POST['wp-admin-bar-comments'], // 1.1.2
					$_POST['footer-left'],
					$_POST['footer-upgrade']);

			foreach($items_values as $key=>$val) {

//				if(!isset($_POST[$val])) { # 1.0.7

					$_POST[$val] = $val;
//				}

				if($val!='') {

					$items_classes[$val] = 'meh-selector-selected';
				}

				$i++;
			}
		}
		$_POST['total_def_items'] = $i;

//echo 'TOTAL def_items count['.count($items_values).']<br>'; #   debug
//foreach($_POST as $key=>$val){
//	echo $key.'=>'.$val.'<BR>';
//}
//echo'<br>';


		if(!isset($_POST['meh_ids'])) {

//			$_POST['meh_ids'] = get_option('meh_ids');                       #   1.0.4
			$_POST['meh_ids'] = get_option('meh_ids'.$_POST['users_menu']);  #   1.0.4
		}

		if(!isset($_POST['meh_isACTIVE'])) { $_POST['meh_isACTIVE'] = get_option('meh_isACTIVE'); }

//		$_POST['meh_ids'] = measycom_sanitize_input(get_option('meh_ids'), false, '*nospace');		#	1.0.2
		$_POST['meh_ids'] = measycom_sanitize_input($_POST['meh_ids'], false, '*nospace');			#	1.0.4

		if(!isset($_POST['myeasy_showcredits'])) {

			$tmp = get_option('myeasy_showcredits');
			if(strlen($tmp)==0) { $tmp = 1;}

			$_POST['myeasy_showcredits']= $tmp;
		}

		if(!isset($_POST['meh_searchid'])) {

			/**
			 * @since 1.0.7
			 */
			$tmp = get_option('meh_searchid');
			if(strlen($tmp)==0) { $tmp = 0;}

			$_POST['meh_searchid'] = $tmp;
		}

		?><script type="text/javascript">var myeasyplugin = 'myeasyhider';</script>
		<form name="meb_settings" id="meb_settings" method="post" action="">
		<input type="hidden" name="total_allowed_users" value="<?php echo $_POST['total_allowed_users']; ?>" />
		<input type="hidden" name="total_users" value="<?php echo $_POST['total_users']; ?>" />
		<input type="hidden" name="total_def_items" value="<?php echo $_POST['total_def_items']; ?>" />
		<input type="hidden" name="_action" id="_action" value="" />
		<input type="hidden" name="load_user_settings" id="load_user_settings" value="" /><?php

		if(defined('MEH_PRO') && MEH_PRO == true ) {

			__meh_pro_init_post_options();

			if(isset($_POST['btn']) && ($_POST['btn']==LOAD_ROLE_BTN || $_POST['btn']==SAVE_ROLE_BTN)) {

				if(isset($_POST['items_values'])) {

					/**
					 * force the role values
					 */
					foreach($_POST['items_values'] as $key=>$val) {

						$_POST[$val] = $val;
					}
				}

				if(isset($_POST['items_classes'])) {

					unset($items_classes);
					$items_classes = $_POST['items_classes'];
				}

				if(isset($_POST['meh_role_ids'])) {

					$_POST['meh_ids'] = $_POST['meh_role_ids'];
				}
			}

			?><input type="hidden" name="total_def_role_items" value="<?php echo $_POST['total_def_role_items']; ?>" />
			<input type="hidden" name="load_role_settings" id="load_role_settings" value="" /><?php
		}


/*  1.0.4
		?><div class="light">
			<div class="left"><?php
				#
				#	Allowed users
				#
				echo '<b>' . __('Who can see everything?', MEH_LOCALE ) . '</b>'

					.'<br /><i>' . __('Check the users that will be able to see everything.', MEH_LOCALE ) . '</i>';

			?></div>
			<div class="right"><?php
*/
				$sql = 'SELECT u.user_login, u.user_email, u.display_name '
						.'FROM `'.$wpdb->users.'` AS u '
						.'ORDER BY u.user_login ASC '
				;
				$rows = $wpdb->get_results( $sql );

				/* 1.0.4: BEG */
				$selected = '';
				if(strlen($_POST['users_menu'])==0) {

					$selected = ' selected="selected"';
				}

				$users_menu .= '<div class="medium" style="float:left;width:auto;">'  # 1.0.7
						.'<b>' . __('Need to customize the settings for each user?', MEH_LOCALE ) . '</b>'
						.'<p>'
							. __('Leave "Default settings" to set what', MEH_LOCALE )
							. ' <u>' . __('every user', MEH_LOCALE ) . '</u> '
							. __('will be able to see.', MEH_LOCALE )
						.'</p>'
						.'<p>'
							. __('Choose an user to load her/his own settings then set the values as you like.', MEH_LOCALE )
						.'</p>'

						.'<select name=\'users_menu\' onchange="javascript:document.getElementById(\'load_user_settings\').value=this.value;document.getElementById(\'_action\').value=\''.LOAD_USR_BTN.'\';document.meb_settings.submit();">'//LOAD_USR_BTN
							.'<option value=""'.$selected.'>'
								. __('Default settings', MEH_LOCALE )
							.'</option>'
				;
				/* 1.0.4: END */

				$i = 0;
				$roleDescription = ''; # 1.0.7

				foreach($rows as $row) {

					$isCHECKED = _isCHECKED($row->user_login);

					/**
					 * @since 1.0.7.2
					 */
					$email = $row->user_email;
					//$email = 'user'.$i.'@example.com';	#	screen shots only

					/* 1.0.4: BEG */
//					echo '<p>'
//							.'<input type="checkbox" name="user'.$i.'" id="user'.$i.'" value="'.$row->user_login.'"'.$isCHECKED.' /> <label for="user'.$i.'">'
//								.$row->user_login.', '.$email
//							.'</label>'
//						.'</p>';

					$selected = '';
					if($row->user_login==$_POST['users_menu']) {

						$selected = ' selected="selected"';

						$user = new WP_User( $row->user_login );
						$user_role = strtoupper(substr($user->roles[0],0,1)).substr($user->roles[0],1);
						$user_role = translate_user_role( $user_role );
						$roleDescription = '<code style="-moz-border-radius:3px;border-radius:3px;">'.$user_role.'</code>';
					}

					$def_items = explode(',', get_option('meh_def_items'.$row->user_login));
					$xtra_items = explode(',', get_option('meh_ids'.$row->user_login));
					$status = '';
					if(count($def_items)>1 || count($xtra_items)>1) {

						$status = '(*)'; # 1.0.7
					}

					$users_menu .= '<option value="'.$row->user_login.'"'.$selected.'>'
							.$row->display_name.', '
							.$email.' '
							.$status
						.'</option>'
					;
					/* 1.0.4: END */

					$i++;
				}

				$users_menu .= '</select><br />'
						.$roleDescription
						.'<p>' . __('(*) this user has its own settings.', MEH_LOCALE ) . '</p>'
//						.'<input class="button-secondary" style="margin-right:8px;" type="submit" name="btn" value="'.LOAD_USR_BTN.'" />'
						.'<div style="text-align:right;"><input class="button-primary" style="margin-top:8px;" type="submit" name="btn" value="'.SAVE_USR_BTN.'" /></div>'
						.'<p><i>'
						. __('Do not forget to save the settings for each user you want to customize!', MEH_LOCALE )
						.'</i></p>'

					.'</div>' # 1.0.7
				; #   1.0.4

/*  1.0.4
			?></div>
			<div style="clear:both;"></div>
		</div>
 */

			if(defined('MEH_PRO') && MEH_PRO == true ) {

				$users_menu .= __meh_pro_options_roles();
			}

?>
		<div class="light">
			<div class="left" style="min-width:300px;"><?php
				#
				#	IDs to hide
				#
				echo '<b>' . __('What will be hidden?', MEH_LOCALE ) . '</b>'

					.'<p><i>' . __('Click on each area to set its status.', MEH_LOCALE )
						.'<br /><br />'
						. __('Areas highlighted in GREEN will be shown to everybody; areas highligted in RED will be only shown to the users selected here above.', MEH_LOCALE )
					. '</i></p>'

					.'<br />'       # 1.0.4
					.$users_menu    # 1.0.4
				;

//				$tmp = 'text';	#	debug
				$tmp = 'hidden';

			?></div>

			<input type="<?php echo $tmp; ?>" id="val-header-logo" name="header-logo" value="<?php echo $_POST['header-logo']; ?>" />
			<input type="<?php echo $tmp; /* 1.1.2 */ ?>" id="val-wp-admin-bar-updates" name="wp-admin-bar-updates" value="<?php echo $_POST['wp-admin-bar-updates']; ?>" />
			<input type="<?php echo $tmp; /* 1.1.2 */ ?>" id="val-wp-admin-bar-comments" name="wp-admin-bar-comments" value="<?php echo $_POST['wp-admin-bar-comments']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-favorite-actions" name="favorite-actions" value="<?php echo $_POST['favorite-actions']; ?>" />

			<input type="<?php echo $tmp; ?>" id="val-menu-dashboard" name="menu-dashboard" value="<?php echo $_POST['menu-dashboard']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-menu-posts" name="menu-posts" value="<?php echo $_POST['menu-posts']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-menu-media" name="menu-media" value="<?php echo $_POST['menu-media']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-menu-links" name="menu-links" value="<?php echo $_POST['menu-links']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-menu-pages" name="menu-pages" value="<?php echo $_POST['menu-pages']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-menu-comments" name="menu-comments" value="<?php echo $_POST['menu-comments']; ?>" />

			<input type="<?php echo $tmp; ?>" id="val-menu-appearance" name="menu-appearance" value="<?php echo $_POST['menu-appearance']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-menu-plugins" name="menu-plugins" value="<?php echo $_POST['menu-plugins']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-menu-users" name="menu-users" value="<?php echo $_POST['menu-users']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-menu-tools" name="menu-tools" value="<?php echo $_POST['menu-tools']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-menu-settings" name="menu-settings" value="<?php echo $_POST['menu-settings']; ?>" />

			<input type="<?php echo $tmp; ?>" id="val-update-nag" name="update-nag" value="<?php echo $_POST['update-nag']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-screen-options-link-wrap" name="screen-options-link-wrap" value="<?php echo $_POST['screen-options-link-wrap']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-contextual-help-link" name="contextual-help-link" value="<?php echo $_POST['contextual-help-link']; ?>" />

			<input type="<?php echo $tmp; ?>" id="val-dashboard_right_now" name="dashboard_right_now" value="<?php echo $_POST['dashboard_right_now']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-dashboard_quick_press" name="dashboard_quick_press" value="<?php echo $_POST['dashboard_quick_press']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-dashboard_recent_comments" name="dashboard_recent_comments" value="<?php echo $_POST['dashboard_recent_comments']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-dashboard_recent_drafts" name="dashboard_recent_drafts" value="<?php echo $_POST['dashboard_recent_drafts']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-dashboard_primary" name="dashboard_primary" value="<?php echo $_POST['dashboard_primary']; ?>" />

			<input type="<?php echo $tmp; ?>" id="val-dashboard_incoming_links" name="dashboard_incoming_links" value="<?php echo $_POST['dashboard_incoming_links']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-dashboard_plugins" name="dashboard_plugins" value="<?php echo $_POST['dashboard_plugins']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-dashboard_secondary" name="dashboard_secondary" value="<?php echo $_POST['dashboard_secondary']; ?>" />

			<input type="<?php echo $tmp; ?>" id="val-wp-version-message" name="wp-version-message" value="<?php echo $_POST['wp-version-message']; ?>" />

			<input type="<?php echo $tmp; ?>" id="val-footer-left" name="footer-left" value="<?php echo $_POST['footer-left']; ?>" />
			<input type="<?php echo $tmp; ?>" id="val-footer-upgrade" name="footer-upgrade" value="<?php echo $_POST['footer-upgrade']; ?>" />

			<div class="right"><?php

$set29 = false;
//$set29 = true;

				if(version_compare(get_bloginfo( 'version' ), '3.2.9', '<=') || $set29 == true) {

					?><div class="meh-selector-img-29">
						<div title="<?php _e('WordPress Logo'); ?>" class="<?php echo $items_classes['header-logo'] ? $items_classes['header-logo'] : 'meh-selector'; ?>" id="high-header-logo" style="top:0;left:3px;width:17px;height:18px;" onclick="javascript:__meh_selector_toggler('header-logo');"></div>
						<div title="<?php _e('Favorite actions'); ?>" class="<?php echo $items_classes['favorite-actions'] ? $items_classes['favorite-actions'] : 'meh-selector'; ?>" id="high-favorite-actions" style="top:2px;left:331px;width:55px;height:13px;" onclick="javascript:__meh_selector_toggler('favorite-actions');"></div>

						<div title="<?php _e('Posts'); ?>" class="<?php echo $items_classes['menu-posts'] ? $items_classes['menu-posts'] : 'meh-selector'; ?>" id="high-menu-posts" style="clear:left;top:24px;left:5px;width:56px;height:11px;" onclick="javascript:__meh_selector_toggler('menu-posts');"></div>
						<div title="<?php _e('Media'); ?>" class="<?php echo $items_classes['menu-media'] ? $items_classes['menu-media'] : 'meh-selector'; ?>" id="high-menu-media" style="clear:left;top:24px;left:5px;width:56px;height:11px;" onclick="javascript:__meh_selector_toggler('menu-media');"></div>
						<div title="<?php _e('Links'); ?>" class="<?php echo $items_classes['menu-links'] ? $items_classes['menu-links'] : 'meh-selector'; ?>" id="high-menu-links" style="clear:left;top:24px;left:5px;width:56px;height:11px;" onclick="javascript:__meh_selector_toggler('menu-links');"></div>
						<div title="<?php _e('Pages'); ?>" class="<?php echo $items_classes['menu-pages'] ? $items_classes['menu-pages'] : 'meh-selector'; ?>" id="high-menu-pages" style="clear:left;top:24px;left:5px;width:56px;height:11px;" onclick="javascript:__meh_selector_toggler('menu-pages');"></div>
						<div title="<?php _e('Comments'); ?>" class="<?php echo $items_classes['menu-comments'] ? $items_classes['menu-comments'] : 'meh-selector'; ?>" id="high-menu-comments" style="clear:left;top:24px;left:5px;width:56px;height:11px;" onclick="javascript:__meh_selector_toggler('menu-comments');"></div>

						<div title="<?php _e('Appearance'); ?>" class="<?php echo $items_classes['menu-appearance'] ? $items_classes['menu-appearance'] : 'meh-selector'; ?>" id="high-menu-appearance" style="clear:left;top:33px;left:5px;width:56px;height:11px;" onclick="javascript:__meh_selector_toggler('menu-appearance');"></div>
						<div title="<?php _e('Plugins'); ?>" class="<?php echo $items_classes['menu-plugins'] ? $items_classes['menu-plugins'] : 'meh-selector'; ?>" id="high-menu-plugins" style="clear:left;top:33px;left:5px;width:56px;height:11px;" onclick="javascript:__meh_selector_toggler('menu-plugins');"></div>
						<div title="<?php _e('Users'); ?>" class="<?php echo $items_classes['menu-users'] ? $items_classes['menu-users'] : 'meh-selector'; ?>" id="high-menu-users" style="clear:left;top:33px;left:5px;width:56px;height:11px;" onclick="javascript:__meh_selector_toggler('menu-users');"></div>
						<div title="<?php _e('Tools'); ?>" class="<?php echo $items_classes['menu-tools'] ? $items_classes['menu-tools'] : 'meh-selector'; ?>" id="high-menu-tools" style="clear:left;top:33px;left:5px;width:56px;height:11px;" onclick="javascript:__meh_selector_toggler('menu-tools');"></div>
						<div title="<?php _e('Settings'); ?>" class="<?php echo $items_classes['menu-settings'] ? $items_classes['menu-settings'] : 'meh-selector'; ?>" id="high-menu-settings" style="clear:left;top:33px;left:5px;width:56px;height:11px;" onclick="javascript:__meh_selector_toggler('menu-settings');"></div>

						<div style="float:right;position:relative;top:-100px;left:0;width:425px;height:300px;border:0px dotted red;">
							<div title="<?php _e('Update Info'); ?>" class="<?php echo $items_classes['update-nag'] ? $items_classes['update-nag'] : 'meh-selector'; ?>" id="high-update-nag" style="clear:left;top:2px;left:121px;width:120px;height:10px;" onclick="javascript:__meh_selector_toggler('update-nag');"></div>
							<div title="<?php _e('Screen options selector'); ?>" class="<?php echo $items_classes['screen-options-link-wrap'] ? $items_classes['screen-options-link-wrap'] : 'meh-selector'; ?>" id="high-screen-options-link-wrap" style="top:1px;left:240px;width:40px;height:10px;" onclick="javascript:__meh_selector_toggler('screen-options-link-wrap');"></div>
							<div title="<?php _e('Help'); ?>" class="<?php echo $items_classes['contextual-help-link'] ? $items_classes['contextual-help-link'] : 'meh-selector'; ?>" id="high-contextual-help-link" style="top:1px;left:242px;width:20px;height:10px;" onclick="javascript:__meh_selector_toggler('contextual-help-link');"></div>

							<div title="<?php _e('Right Now'); ?>" class="<?php echo $items_classes['dashboard_right_now'] ? $items_classes['dashboard_right_now'] : 'meh-selector'; ?>" id="high-dashboard_right_now" style="clear:left;top:26px;left:6px;width:199px;height:71px;" onclick="javascript:__meh_selector_toggler('dashboard_right_now');"></div>
							<div title="<?php _e('QuickPress'); ?>" class="<?php echo $items_classes['dashboard_quick_press'] ? $items_classes['dashboard_quick_press'] : 'meh-selector'; ?>" id="high-dashboard_quick_press" style="top:26px;left:12px;width:199px;height:84px;" onclick="javascript:__meh_selector_toggler('dashboard_quick_press');"></div>

							<div title="<?php _e('Recent Comments'); ?>" class="<?php echo $items_classes['dashboard_recent_comments'] ? $items_classes['dashboard_recent_comments'] : 'meh-selector'; ?>" id="high-dashboard_recent_comments" style="clear:left;top:31px;left:6px;width:199px;height:58px;" onclick="javascript:__meh_selector_toggler('dashboard_recent_comments');"></div>
							<div title="<?php _e('Recent Drafts'); ?>" class="<?php echo $items_classes['dashboard_recent_drafts'] ? $items_classes['dashboard_recent_drafts'] : 'meh-selector'; ?>" id="high-dashboard_recent_drafts" style="top:31px;left:12px;width:199px;height:25px;" onclick="javascript:__meh_selector_toggler('dashboard_recent_drafts');"></div>
							<div title="<?php _e('WordPress Development Blog'); ?>" class="<?php echo $items_classes['dashboard_primary'] ? $items_classes['dashboard_primary'] : 'meh-selector'; ?>" id="high-dashboard_primary" style="top:38px;left:12px;width:199px;height:57px;" onclick="javascript:__meh_selector_toggler('dashboard_primary');"></div>

							<div title="<?php _e('Incoming Links'); ?>" class="<?php echo $items_classes['dashboard_incoming_links'] ? $items_classes['dashboard_incoming_links'] : 'meh-selector'; ?>" id="high-dashboard_incoming_links" style="clear:left;top:13px;left:6px;width:199px;height:37px;" onclick="javascript:__meh_selector_toggler('dashboard_incoming_links');"></div>
							<div title="<?php _e('Other WordPress News'); ?>" class="<?php echo $items_classes['dashboard_secondary'] ? $items_classes['dashboard_secondary'] : 'meh-selector'; ?>" id="high-dashboard_secondary" style="top:45px;left:12px;width:199px;height:78px;" onclick="javascript:__meh_selector_toggler('dashboard_secondary');"></div>

							<div title="<?php _e('Plugins'); ?>" class="<?php echo $items_classes['dashboard_plugins'] ? $items_classes['dashboard_plugins'] : 'meh-selector'; ?>" id="high-dashboard_plugins" style="clear:left;top:-21px;left:6px;width:199px;height:44px;" onclick="javascript:__meh_selector_toggler('dashboard_plugins');"></div>

							<div title="<?php _e('Version Info'); ?>" class="<?php echo $items_classes['wp-version-message'] ? $items_classes['wp-version-message'] : 'meh-selector'; ?>" id="high-wp-version-message" style="/*background:red;*/clear:left;top:-190px;left:6px;width:199px;height:10px;" onclick="javascript:__meh_selector_toggler('wp-version-message');"></div>
						</div>
						<div style="clear:both;float:left;position:relative;top:-98px;left:0;width:490px;height:18px;border:0px dotted green;">
							<div title="<?php _e('Credits'); ?>" class="<?php echo $items_classes['footer-left'] ? $items_classes['footer-left'] : 'meh-selector'; ?>" id="high-footer-left" style="clear:left;top:0;left:0;width:159px;height:16px;" onclick="javascript:__meh_selector_toggler('footer-left');"></div>
							<div title="<?php _e('Update Info'); ?>" class="<?php echo $items_classes['footer-upgrade'] ? $items_classes['footer-upgrade'] : 'meh-selector'; ?>" id="high-footer-upgrade" style="top:0;left:281px;width:49px;height:16px;" onclick="javascript:__meh_selector_toggler('footer-upgrade');"></div>
						</div>
					</div><?php
				}
				else {

					?><div class="meh-selector-img-33">
						<div title="<?php _e('WordPress Logo'); ?>" class="<?php echo $items_classes['header-logo'] ? $items_classes['header-logo'] : 'meh-selector'; ?>" id="high-header-logo" style="top:0;left:3px;width:17px;height:13px;" onclick="javascript:__meh_selector_toggler('header-logo');"></div>

						<div title="<?php _e('Plugin updates'); /* 1.1.2 */ ?>" class="<?php echo $items_classes['wp-admin-bar-updates'] ? $items_classes['wp-admin-bar-updates'] : 'meh-selector'; ?>" id="high-wp-admin-bar-updates" style="top:1px;left:64px;width:20px;height:10px;" onclick="javascript:__meh_selector_toggler('wp-admin-bar-updates');"></div>
						<div title="<?php _e('Comments awaiting moderation'); /* 1.1.2 */ ?>" class="<?php echo $items_classes['wp-admin-bar-comments'] ? $items_classes['wp-admin-bar-comments'] : 'meh-selector'; ?>" id="high-wp-admin-bar-comments" style="top:1px;left:68px;width:20px;height:10px;" onclick="javascript:__meh_selector_toggler('wp-admin-bar-comments');"></div>

<!--					<div title="<?php _e('Favorite actions'); ?>" class="<?php echo $items_classes['favorite-actions'] ? $items_classes['favorite-actions'] : 'meh-selector'; ?>" id="high-favorite-actions" style="top:2px;left:331px;width:55px;height:13px;" onclick="javascript:__meh_selector_toggler('favorite-actions');"></div> -->

						<div title="<?php _e('Dashboard'); ?>" class="<?php echo $items_classes['menu-dashboard'] ? $items_classes['menu-dashboard'] : 'meh-selector'; ?>" id="high-menu-dashboard" style="clear:left;top:0;left:0;width:65px;height:39px;" onclick="javascript:__meh_selector_toggler('menu-dashboard');"></div>
						<div title="<?php _e('Posts'); ?>" class="<?php echo $items_classes['menu-posts'] ? $items_classes['menu-posts'] : 'meh-selector'; ?>" id="high-menu-posts" style="clear:left;top:2px;left:0;width:65px;height:14px;" onclick="javascript:__meh_selector_toggler('menu-posts');"></div>
						<div title="<?php _e('Media'); ?>" class="<?php echo $items_classes['menu-media'] ? $items_classes['menu-media'] : 'meh-selector'; ?>" id="high-menu-media" style="clear:left;top:2px;left:0;width:65px;height:14px;" onclick="javascript:__meh_selector_toggler('menu-media');"></div>
						<div title="<?php _e('Links'); ?>" class="<?php echo $items_classes['menu-links'] ? $items_classes['menu-links'] : 'meh-selector'; ?>" id="high-menu-links" style="clear:left;top:2px;left:0;width:65px;height:14px;" onclick="javascript:__meh_selector_toggler('menu-links');"></div>
						<div title="<?php _e('Pages'); ?>" class="<?php echo $items_classes['menu-pages'] ? $items_classes['menu-pages'] : 'meh-selector'; ?>" id="high-menu-pages" style="clear:left;top:2px;left:0;width:65px;height:14px;" onclick="javascript:__meh_selector_toggler('menu-pages');"></div>
						<div title="<?php _e('Comments'); ?>" class="<?php echo $items_classes['menu-comments'] ? $items_classes['menu-comments'] : 'meh-selector'; ?>" id="high-menu-comments" style="clear:left;top:2px;left:0;width:65px;height:14px;" onclick="javascript:__meh_selector_toggler('menu-comments');"></div>

						<div title="<?php _e('Appearance'); ?>" class="<?php echo $items_classes['menu-appearance'] ? $items_classes['menu-appearance'] : 'meh-selector'; ?>" id="high-menu-appearance" style="clear:left;top:4px;left:0;width:65px;height:14px;" onclick="javascript:__meh_selector_toggler('menu-appearance');"></div>
						<div title="<?php _e('Plugins'); ?>" class="<?php echo $items_classes['menu-plugins'] ? $items_classes['menu-plugins'] : 'meh-selector'; ?>" id="high-menu-plugins" style="clear:left;top:4px;left:0;width:65px;height:14px;" onclick="javascript:__meh_selector_toggler('menu-plugins');"></div>
						<div title="<?php _e('Users'); ?>" class="<?php echo $items_classes['menu-users'] ? $items_classes['menu-users'] : 'meh-selector'; ?>" id="high-menu-users" style="clear:left;top:4px;left:0;width:65px;height:14px;" onclick="javascript:__meh_selector_toggler('menu-users');"></div>
						<div title="<?php _e('Tools'); ?>" class="<?php echo $items_classes['menu-tools'] ? $items_classes['menu-tools'] : 'meh-selector'; ?>" id="high-menu-tools" style="clear:left;top:4px;left:0;width:65px;height:14px;" onclick="javascript:__meh_selector_toggler('menu-tools');"></div>
						<div title="<?php _e('Settings'); ?>" class="<?php echo $items_classes['menu-settings'] ? $items_classes['menu-settings'] : 'meh-selector'; ?>" id="high-menu-settings" style="clear:left;top:4px;left:0;width:65px;height:14px;" onclick="javascript:__meh_selector_toggler('menu-settings');"></div>

						<div style="float:right;position:relative;top:-139px;left:0;width:425px;height:300px;border:0px dotted red;">
<!--						<div title="<?php _e('Update Info'); ?>" class="<?php echo $items_classes['update-nag'] ? $items_classes['update-nag'] : 'meh-selector'; ?>" id="high-update-nag" style="clear:left;top:2px;left:121px;width:120px;height:10px;" onclick="javascript:__meh_selector_toggler('update-nag');"></div> -->
<!--						<div title="<?php _e('Screen options selector'); ?>" class="<?php echo $items_classes['screen-options-link-wrap'] ? $items_classes['screen-options-link-wrap'] : 'meh-selector'; ?>" id="high-screen-options-link-wrap" style="top:1px;left:240px;width:40px;height:10px;" onclick="javascript:__meh_selector_toggler('screen-options-link-wrap');"></div> -->

<!-- 1.1.2					<div title="<?php _e('Help'); ?>" class="<?php echo $items_classes['contextual-help-link'] ? $items_classes['contextual-help-link'] : 'meh-selector'; ?>" id="high-contextual-help-link" style="top:-39px;left:109px;width:26px;height:13px;" onclick="javascript:__meh_selector_toggler('contextual-help-link');"></div> -->

							<div title="<?php _e('Right Now'); ?>" class="<?php echo $items_classes['dashboard_right_now'] ? $items_classes['dashboard_right_now'] : 'meh-selector'; ?>" id="high-dashboard_right_now" style="clear:left;top:0;left:16px;width:195px;height:111px;" onclick="javascript:__meh_selector_toggler('dashboard_right_now');"></div>
							<div title="<?php _e('QuickPress'); ?>" class="<?php echo $items_classes['dashboard_quick_press'] ? $items_classes['dashboard_quick_press'] : 'meh-selector'; ?>" id="high-dashboard_quick_press" style="top:0;left:22px;width:199px;height:119px;" onclick="javascript:__meh_selector_toggler('dashboard_quick_press');"></div>

							<div title="<?php _e('Recent Comments'); ?>" class="<?php echo $items_classes['dashboard_recent_comments'] ? $items_classes['dashboard_recent_comments'] : 'meh-selector'; ?>" id="high-dashboard_recent_comments" style="clear:left;top:11px;left:16px;width:195px;height:55px;" onclick="javascript:__meh_selector_toggler('dashboard_recent_comments');"></div>
							<div title="<?php _e('Recent Drafts'); ?>" class="<?php echo $items_classes['dashboard_recent_drafts'] ? $items_classes['dashboard_recent_drafts'] : 'meh-selector'; ?>" id="high-dashboard_recent_drafts" style="top:3px;left:22px;width:199px;height:30px;" onclick="javascript:__meh_selector_toggler('dashboard_recent_drafts');"></div>
							<div title="<?php _e('WordPress Development Blog'); ?>" class="<?php echo $items_classes['dashboard_primary'] ? $items_classes['dashboard_primary'] : 'meh-selector'; ?>" id="high-dashboard_primary" style="top:7px;left:22px;width:199px;height:75px;" onclick="javascript:__meh_selector_toggler('dashboard_primary');"></div>

							<div title="<?php _e('Incoming Links'); ?>" class="<?php echo $items_classes['dashboard_incoming_links'] ? $items_classes['dashboard_incoming_links'] : 'meh-selector'; ?>" id="high-dashboard_incoming_links" style="clear:left;top:-35px;left:16px;width:195px;height:41px;" onclick="javascript:__meh_selector_toggler('dashboard_incoming_links');"></div>
							<div title="<?php _e('Other WordPress News'); ?>" class="<?php echo $items_classes['dashboard_secondary'] ? $items_classes['dashboard_secondary'] : 'meh-selector'; ?>" id="high-dashboard_secondary" style="top:11px;left:22px;width:199px;height:35px;" onclick="javascript:__meh_selector_toggler('dashboard_secondary');"></div>

							<div title="<?php _e('Plugins'); ?>" class="<?php echo $items_classes['dashboard_plugins'] ? $items_classes['dashboard_plugins'] : 'meh-selector'; ?>" id="high-dashboard_plugins" style="clear:left;top:-32px;left:16px;width:195px;height:40px;" onclick="javascript:__meh_selector_toggler('dashboard_plugins');"></div>

							<div title="<?php _e('Version Info'); ?>" class="<?php echo $items_classes['wp-version-message'] ? $items_classes['wp-version-message'] : 'meh-selector'; ?>" id="high-wp-version-message" style="/*background:red;*/clear:left;top:-193px;left:16px;width:195px;height:13px;" onclick="javascript:__meh_selector_toggler('wp-version-message');"></div>
						</div>
						<div style="clear:both;float:left;position:relative;top:-137px;left:0;width:490px;height:18px;border:0px dotted green;">
							<div title="<?php _e('Credits'); ?>" class="<?php echo $items_classes['footer-left'] ? $items_classes['footer-left'] : 'meh-selector'; ?>" id="high-footer-left" style="clear:left;top:-23px;left:72px;width:159px;height:16px;" onclick="javascript:__meh_selector_toggler('footer-left');"></div>
							<div title="<?php _e('Update Info'); ?>" class="<?php echo $items_classes['footer-upgrade'] ? $items_classes['footer-upgrade'] : 'meh-selector'; ?>" id="high-footer-upgrade" style="top:-23px;left:125px;width:199px;height:16px;" onclick="javascript:__meh_selector_toggler('footer-upgrade');"></div>
						</div>
					</div><?php
				}

				?><div style="clear:both;margin:0 0 20px 0;width:490px;text-align:center;"><?php

					echo ''
						.'<input class="button-secondary" type="button" onclick="javascript:__meh_select(\'all\');" value="'
								.__('Hide all', MEH_LOCALE ).'" />'
						.'<input class="button-secondary" style="margin-left:20px;" type="button" onclick="javascript:__meh_select(\'none\');" value="'
								.__('Hide none', MEH_LOCALE ).'" />'
						.'<input class="button-secondary" style="margin-left:20px;" type="button" onclick="javascript:__meh_select(\'common\');" value="'
								.__('Hide most common', MEH_LOCALE ).'" />'
					;

				?></div><?php

				if(version_compare(get_bloginfo( 'version' ), '3.2.9', '<=') || $set29 == true) {

				}
				else {

					if(defined('MEH_PRO') && MEH_PRO == true ) {

						__meh_pro_html_submenu_setup();
					}
				}

				?><div class="medium"><?php

					/**
					 * @since 1.0.7
					 */
					$checked_0 ='';
					$checked_1 ='';

					switch($_POST['meh_searchid']) {

						case 1: $checked_1 = ' checked="checked"'; break;

						default:
							$checked_0 = ' checked="checked"';
					}

					echo ''
						.'<p style="font-weight:bold;margin-top:0;">' . __('Custom items', MEH_LOCALE ) . '</p>'

						.'<p>' . __('If you like to hide other items, please enter their names in the field here below.', MEH_LOCALE ) . '</p>'

						.'<p>' . __('Each name must correspond to the "id" attribute of the item you like to hide so, for example, to hide the following element:', MEH_LOCALE ) . '</p>'

							. '<div class="light" style="padding:6px;width:auto;">'
								.'<code>'
									. '&lt;div id="<b>' . __('my-custom-element', MEH_LOCALE ) . '</b>"&gt;<br />'
										. '<span style="margin-left:20px;">' . __('Hallo there!', MEH_LOCALE ) . '</span><br />'
									. '&lt;/div&gt;'
								. '</code>'
							. '</div>'

						. '<p>' . __('You will enter "my-custom-element" here below.', MEH_LOCALE )

//							. '<input id="meh-switchIDtogglerBTN" type="submit" class="button-secondary" style="margin-left:8px;" value="'. __('ID searcher toggler', MEH_LOCALE ) .'" />'

							. '<br />' . __('Show the myEASYhider ID searcher?', MEH_LOCALE )
							. '<input type="radio" style="margin:0 4px 0 8px;" name="meh_searchid" value="1" id="meh_searchid1"'.$checked_1.' /><label for="meh_searchid1">'.__('Yes').'</label>'
							. '<input type="radio" style="margin:0 4px 0 8px;" name="meh_searchid" value="0" id="meh_searchid0"'.$checked_0.' /><label for="meh_searchid0">'.__('No').'</label>'
						. '</p>'
					;

					?><textarea id="meh_ids" name="meh_ids" style="width:100%;" rows="5"><?php

						echo $_POST['meh_ids'];

					?></textarea><?php

					echo '<p><i>' . __('Note: separate names with commas without adding any extra space (eg. my-custom-element1,my-custom-element2,my-custom-element3).', MEH_LOCALE ) . '</i></p>';

				?></div>

			</div>
			<div style="clear:both;"></div>
		</div>

		<div class="light">
			<div class="left" style="min-width:300px;"><?php
				#
				#	customize user profile
				#	@since 1.1
				#
				echo '<b>' . __('Customize the users profile page', MEH_LOCALE ) . '</b>'
						. '<br />' . __('Useful if you want to force users to have the Admin Menu Bar in the dashboard.', MEH_LOCALE ) . '<br />';

			?></div>
			<div class="right">

				<div class="medium"><span><?php

					$checked_0 ='';
					$checked_1 ='';

					switch($_POST['meh_personaloptions']) {

						case 1: $checked_1 = ' checked="checked"'; break;

						default:
							$checked_0 = ' checked="checked"';
					}

					_e('Do you want to hide the <b>Personal Options</b> section in your users profile?', MEH_LOCALE );

					?></span><p>
						<input type="radio" style="margin:0 4px 0 8px;" name="meh_personaloptions" value="1" id="meh_personaloptions1"<?php echo $checked_1; ?> /><label for="meh_personaloptions1"><?php _e('Yes'); ?></label>
						<input type="radio" style="margin:0 4px 0 8px;" name="meh_personaloptions" value="0" id="meh_personaloptions0"<?php echo $checked_0; ?> /><label for="meh_personaloptions0"><?php _e('No'); ?></label>
					</p>
				</div>
			</div>
			<div style="clear:both;"></div>
		</div>


			<?php

		if(defined('MEH_PRO') && MEH_PRO == true ) {

			__meh_pro_html_options();
		}

		?><div class="light">
			<div class="left"><?php
				#
				#	activate
				#
				echo '<b>' . __('Enable myEASYhider?', MEH_LOCALE ) . '</b>';

			?></div>

			<div class="right"><div class="medium" style="background:#FFFFE0;border:1px solid #E6DB55;"><?php

					$checked ='';
					if($_POST['meh_isACTIVE']==1) { $checked = ' checked="checked"'; }

				?><input type="checkbox" id="meh_isACTIVE" name="meh_isACTIVE" value="1"<?php echo $checked; ?> /><?php

				echo ' <label for="meh_isACTIVE">' . __('Check this to start hiding pending on your choices.', MEH_LOCALE ) . '</label>';

			?></div></div>
			<div style="clear:both;"></div>
		</div><?php

		if(!defined('MEH_PRO') || MEH_PRO != true) {

			#	free
			#
			?><div style="margin:8px 0;text-align:center;"><?php
				#
				#	show credits
				#
				$checked ='';

				if($_POST['myeasy_showcredits']==1) { $checked = ' checked="checked"'; }

				echo '' . __('We invested a lot of time to create this and all the plugins in the myEASY series, please allow us to place a small credit in your blog footer, here is how it will look:',
								MEH_LOCALE );

				?><p><input type="checkbox" name="myeasy_showcredits" value="1"<?php echo $checked; ?> />&nbsp;<?php

					echo __('Yes, I like to help you!', MEH_LOCALE )
							. ' &mdash; ' . __('If you decide not to show the credits, please consider to make a donation!', MEH_LOCALE )
						. '</p>'
					;

			?></div><?php

			measycom_donate('meh');
		}

		?><div class="button-separator">
			<input class="button-primary" style="margin:14px 12px;" type="submit" name="btn" value="<?php echo SAVE_BTN; ?>" />
		</div>
		</div>
		</form><?php

		measycom_camaleo_links();
	}

	function _isCHECKED($user) {

		for($i=0;$i<$_POST['total_users'];$i++) {

			if($user==$_POST['user'.$i]) { return ' checked="checked"'; }
		}
		return '';
	}

	function meh_check() {

		if(get_option('meh_isACTIVE')!=true) {

			return;
		}

		#
		#	http://codex.wordpress.org/Function_Reference/wp_get_current_user
		#
		$current_user = wp_get_current_user();
//var_dump($current_user);echo '<hr>';
//var_dump($current_user->roles);echo '<br>';

		$allowed_users = explode(',', get_option('meh_allowed_users'));


		foreach($allowed_users as $key=>$val) {

			if($val!='') {

				if($current_user->user_login==$val) {

					return;
				}
			}
		}

		/* 1.0.4: BEG */
//		$def_items = explode(',', get_option('meh_def_items'));
//		$xtra_items = explode(',', get_option('meh_ids'));

		$def_items = explode(',', get_option('meh_def_items'.$current_user->user_login));

//echo '$def_items['.get_option('meh_def_items'.$current_user->user_login).']<br>';
//echo '$def_items['.count($def_items).']<br>';var_dump($def_items);echo '<hr>';


		if(count($def_items) == 1 && defined('MEH_PRO') && MEH_PRO == true) {

			$def_items = __meh_pro_get_role_items($current_user->roles);
//echo '$def_items['.count($def_items).']PRO<br>';var_dump($def_items);echo '<hr>';
		}

		if(count($def_items)==1) {

			#   there are no specific settings for this user, get the default ones
			#
			$def_items = explode(',', get_option('meh_def_items'));
		}

		$xtra_items = explode(',', get_option('meh_ids'.$current_user->user_login));

//echo '$xtra_items['.get_option('meh_ids'.$current_user->user_login).']<br>';
//echo '$xtra_items['.count($xtra_items).']<br>';var_dump($xtra_items);echo '<hr>';

		if(count($xtra_items) == 1 && defined('MEH_PRO') && MEH_PRO == true) {

			$xtra_items = __meh_pro_get_role_xitems($current_user->roles);
//echo '$xtra_items['.count($xtra_items).']PRO<br>';var_dump($xtra_items);echo '<hr>';
		}

		if(count($xtra_items)==1) {

			#   there are no specific settings for this user, get the default ones
			#
			$xtra_items = explode(',', get_option('meh_ids'));
		}
		/* 1.0.4: END */

		$ids = array_merge($def_items, $xtra_items);

//echo 'current_user['.$current_user->user_login.']<br>';
//echo '$allowed_users<br>';var_dump($allowed_users);echo '<hr>';
//echo '$def_items<br>';var_dump($def_items);echo '<hr>';
//echo '$xtra_items<br>';var_dump($xtra_items);echo '<hr>';
//echo '$ids<br>';var_dump($ids);echo '<hr>';

		$IDS = '';
		foreach($ids as $key=>$val) {

			if($val!='') {

				$IDS .= $val . ',';
			}
		}
		$IDS = trim(substr($IDS,0,-1));

//echo '$IDS['.$IDS.']';

		echo '<script type="text/javascript">'
				.'__meh_check(\''.$IDS.'\');'
			.'</script>'
		;
	}
	add_action('admin_footer', 'meh_check');

	function meh_searchid() {

		/**
		 * @since 1.0.7
		 */
		$tmp = get_option('meh_searchid');

		if((int)$tmp==1) {

/*
			var myEASYtreeNUM = 0;
			var switchIDtogglerTimer = 0;
			var switchIDtoggler = 0;
			if(getCookie('myeasyhiderSwitch')) {

				switchIDtoggler = getCookie('myeasyhiderSwitch');
			}
*/

			echo '<script type="text/javascript">'
					.'setTimeout(\'myeasyhider_tree()\', 500);'
				.'</script>'
			;

		}
	}

	if(defined('MEH_PRO') && MEH_PRO == true) {

		if(get_option('meh_isACTIVE')==true) {

			add_action( 'admin_head', '__meh_pro_tweak_options' );  # 1.0.7
			add_action( 'admin_footer', '__meh_pro_submenu' );      # 1.1
		}
	}
	add_action('admin_footer', 'meh_searchid');
}

?>