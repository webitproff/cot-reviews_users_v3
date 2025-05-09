<?php
/**
 * [BEGIN_COT_EXT]
 * Hooks=users.details.tags
 * Tags=users.details.tpl:{USERS_DETAILS_REVIEWS_COUNT},{USERS_DETAILS_REVIEWS_URL}
 * [END_COT_EXT]
 */
/**
 * Reviews plugin
 * Filename: reviews.users.details.php
 * @package reviews
 * @version 3.0.0
 * @author CMSWorks Team
 * @copyright Copyright (c) 2025
 * @license BSD
 */
defined('COT_CODE') or die('Wrong URL.');

$tab = cot_import('tab', 'G', 'ALP');

$t->assign('REVIEWS', cot_reviews_list($urr['user_id'], 'users', '', 'users', "m=details&id=" . $urr['user_id'] . "&u=" . $urr['user_name'] . "&tab=reviews", '', $cfg['plugin']['reviews']['userall']));

$user_reviews_count = cot::$db->query("SELECT COUNT(*) FROM $db_reviews WHERE item_touserid=" . (int)$urr['user_id'] . ($cfg['plugin']['reviews']['userall'] ? '' : " AND item_area='users'"))->fetchColumn();

$t->assign([
    'USERS_DETAILS_REVIEWS_COUNT' => $user_reviews_count,
    'USERS_DETAILS_REVIEWS_URL' => cot_url('users', 'm=details&id=' . $urr['user_id'] . '&u=' . $urr['user_name'] . '&tab=reviews'),
]);
?>