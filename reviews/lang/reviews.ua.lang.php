<?php
/**
 * Reviews plugin for Cotonti 0.9.26 PHP 8.4+
 * Filename: reviews.ua.lang.php
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
$L['info_name'] = 'Відгуки про користувача';
$L['info_desc'] = 'Керування відгуками користувачів про інших користувачів. Публікуються на сторінці користувача, можуть відображатися на головній сторінці.';
$L['info_notes'] = 'Плагін значно перероблено і може бути несумісним зі старими збірками сайтів на Cotonti.';

/**
 * Module Config
 */
$L['cfg_checkprojects'] = 'Дозволяти додавати відгуки лише за наявності спільних проєктів';
$L['cfg_userall'] = 'Відображати всі відгуки на сторінці користувача';

/**
 * Interface Labels
 */
$L['reviews_chooseprj'] = 'Оберіть проєкт';
$L['reviews_reviewforproject'] = 'Відгук про проєкт';
$L['reviews_projectsonly'] = 'Відгуки можна залишати лише за проєктами, над якими ви співпрацювали.';
$L['reviews_text'] = 'Текст відгуку';
$L['reviews_score'] = 'Оцінка';
$L['reviews_review'] = 'Відгук';
$L['reviews_reviews'] = 'Відгуки';
$L['reviews_users_details'] = 'Відгуки про мене';
$L['reviews_users_details_desc'] = 'Відгуки інших користувачів та учасників спільноти про цього користувача';
$L['reviews_add_review'] = 'Додати відгук';
$L['reviews_edit_review'] = 'Редагувати відгук';
$L['reviews_user'] = 'Користувач';
$L['reviews_maintitle'] = 'Заголовок';
$L['reviews_date'] = 'Дата';
$L['reviews_author'] = 'Автор';
$L['reviews_recipient'] = 'Отримувач';
$L['reviews_new_review'] = 'Новий відгук';
$L['reviews_new_review_body'] = 'Додано новий відгук';
$L['reviews_updated_review'] = 'Відгук оновлено';
$L['reviews_updated_review_body'] = 'Відгук було оновлено';

/**
 * Score Values and Titles
 */
$L['reviews_score_values'] = [1, 2, 3, 4, 5];
$L['reviews_score_titles'] = ['1 зірка (Надзвичайно негативно)', '2 зірки (Погано)', '3 зірки (Нейтрально)', '4 зірки (Добре)', '5 зірок (Дуже задоволений)'];

/**
 * Error Messages
 */
$L['reviews_error_toyourself'] = 'Не можна залишити відгук самому собі';
$L['reviews_error_projectsonly'] = 'Відгуки можна залишати лише за проєктами, над якими ви співпрацювали';
$L['reviews_error_exists'] = 'Відгук уже створено';
$L['reviews_error_emptytext'] = 'Текст відгуку не може бути порожнім';
$L['reviews_error_emptyscore'] = 'Будь ласка, вкажіть оцінку';
$L['reviews_error_invaliduser'] = 'Обраний користувач недійсний';
$L['reviews_error_nouserselected'] = 'Користувача не обрано';
$L['reviews_err_title'] = 'Заголовок є обов’язковим';

/**
 * Action Buttons
 */
$L['Add'] = 'Додати';
$L['Edit'] = 'Редагувати';
$L['Delete'] = 'Видалити';
$L['Close'] = 'Закрити';

$L['reviews_last_index'] = 'Останні відгуки про користувачів та продавців на сайті';

$L['reviews_users_avr_reviews'] = 'Середня оцінка';