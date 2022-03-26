<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    OSSN Core Team <info@openteknik.com>
 * @copyright (C) OpenTeknik LLC
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
define('RestrictUsernames', ossn_route()->com . 'RestrictUsernames/');
function restrict_usernames_init() {
		if(ossn_isAdminLoggedin()) {
				ossn_register_com_panel('RestrictUsernames', 'settings');
				ossn_register_action('restrict_usernames/save', RestrictUsernames . 'actions/save.php');
		}
		if(!ossn_isLoggedin()) {
				ossn_register_callback('action', 'load', 'restrict_usernames');
		}
}
function restrict_usernames($name, $type, $params) {
		if($params['action'] == 'user/register') {
				$username = strtolower(input('username'));

				$component = new OssnComponents();
				$list      = $component->getSettings('RestrictUsernames');
				if($list && isset($list->list) && !empty($list->list)) {
						$usernames = explode(PHP_EOL, $list->list);
						$usernames = array_map('strtolower', $usernames);
						$usernames = array_map('trim', $usernames);
						if(in_array($username, $usernames)) {
								header('Content-Type: application/json');
								echo json_encode(array(
										'dataerr' => ossn_print('restrictusername:error'),
								));
								exit();
						}
				}
		}
}
ossn_register_callback('ossn', 'init', 'restrict_usernames_init');