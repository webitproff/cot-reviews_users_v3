<?php
/**
 * Reviews plugin for Cotonti 0.9.26 PHP 8.4+
 * Filename: reviews.en.lang.php
 * @package reviews
 * @version 3.0.1
 * @author CMSWorks Team, webitproff https://github.com/webitproff
 * @copyright Copyright (c) 2025
 * @license BSD
 */
defined('COT_CODE') or die('Wrong URL.');

/**
 * Plugin Info
 */
$L['info_name'] = 'User Reviews';
$L['info_desc'] = 'Manage user reviews about other users. Published on the user’s page, can be displayed on the homepage.';
$L['info_notes'] = 'The plugin has been significantly reworked and may not be compatible with older Cotonti site builds.';

/**
 * Module Config
 */
$L['cfg_checkprojects'] = 'Allow adding reviews only for users with shared projects';
$L['cfg_userall'] = 'Display all reviews on the user’s page';

/**
 * Interface Labels
 */
$L['reviews_chooseprj'] = 'Choose a project';
$L['reviews_reviewforproject'] = 'Review for the project';
$L['reviews_projectsonly'] = 'Reviews can only be left for projects you collaborated on.';
$L['reviews_text'] = 'Review text';
$L['reviews_score'] = 'Rating';
$L['reviews_review'] = 'Review';
$L['reviews_reviews'] = 'Reviews';
$L['reviews_users_details'] = 'Reviews about me';
$L['reviews_users_details_desc'] = 'Reviews from other users and community members about this user';
$L['reviews_add_review'] = 'Add a review';
$L['reviews_edit_review'] = 'Edit review';
$L['reviews_user'] = 'User';
$L['reviews_maintitle'] = 'Title';
$L['reviews_date'] = 'Date';
$L['reviews_author'] = 'Author';
$L['reviews_recipient'] = 'Recipient';
$L['reviews_new_review'] = 'New review';
$L['reviews_new_review_body'] = 'A new review has been added';
$L['reviews_updated_review'] = 'Review updated';
$L['reviews_updated_review_body'] = 'The review has been updated';

/**
 * Score Values and Titles
 */
$L['reviews_score_values'] = [1, 2, 3, 4, 5];
$L['reviews_score_titles'] = ['1 star (Extremely negative)', '2 stars (Poor)', '3 stars (Neutral)', '4 stars (Good)', '5 stars (Very satisfied)'];

/**
 * Error Messages
 */
$L['reviews_error_toyourself'] = 'You cannot leave a review for yourself';
$L['reviews_error_projectsonly'] = 'Reviews can only be left for projects you collaborated on';
$L['reviews_error_exists'] = 'Review already exists';
$L['reviews_error_emptytext'] = 'Review text cannot be empty';
$L['reviews_error_emptyscore'] = 'Please specify a rating';
$L['reviews_error_invaliduser'] = 'The selected user is invalid';
$L['reviews_error_nouserselected'] = 'No user selected';
$L['reviews_err_title'] = 'Title is required';

/**
 * Action Buttons
 */
$L['Add'] = 'Add';
$L['Edit'] = 'Edit';
$L['Delete'] = 'Delete';
$L['Close'] = 'Close';

$L['reviews_last_index'] = 'Latest reviews about users and sellers on the site';

$L['reviews_users_avr_reviews'] = 'Average rating';