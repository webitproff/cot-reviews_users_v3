/**
 * Reviews plugin DB installation
 */

CREATE TABLE IF NOT EXISTS `cot_reviews` (
  `item_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_userid` INT(11) NOT NULL,
  `item_touserid` INT(11) NOT NULL,
  `item_area` VARCHAR(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `item_code` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `item_text` TEXT COLLATE utf8mb4_unicode_ci,
  `item_title` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `item_score` INT(11) DEFAULT NULL,
  `item_date` INT(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  INDEX `idx_userid` (`item_userid`),
  INDEX `idx_touserid` (`item_touserid`),
  INDEX `idx_area` (`item_area`),
  INDEX `idx_code` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;