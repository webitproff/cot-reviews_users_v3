# Reviews Plugin v3.0.1 for Cotonti 0.9.26

## Overview
The Reviews plugin enables users to leave reviews for other users on a website powered by [Cotonti CMF](https://github.com/Cotonti/Cotonti). It supports star-based ratings, review editing and deletion, and integration with user profiles. Reviews can be tied to specific areas (e.g., `users`) and displayed on the homepage or user profile pages.

**Important**: Integration with the Projects module (for linking reviews to projects) is implemented but not tested.

## Key Features
- Adding, editing, and deleting reviews.
- Star-based rating system (1 to 5, from very poor to excellent).
- Display of recent reviews on the homepage (`index.tpl`) using the following condition:
  ```html
  <!-- IF {PHP|cot_plugin_active('reviews')} -->
  {PHP|cot_reviews_last(4)}
  <!-- ENDIF -->
  ```
- Calculation of the number of reviews and average rating for a user.
- Integration with user profiles via a reviews tab (`users.details.tpl`).
- Access control: only authenticated users can leave reviews; administrators can edit all reviews.
- Review fields: title (subject), review text, and rating.
- Administrators have additional fields for editing, including the review date.
- Email notifications sent to site administrators and the reviewed user upon review submission.

## Requirements
- Cotonti Siena 0.9.26 (latest version at the time of development).
- PHP 8.4+
- Bootstrap 5.3.3 (included in Cotonti, loaded via `Resources::addFile` in the theme's resource file).
- Font Awesome Free 6.7.2 (https://fontawesome.com/) for star icon display.

## Installation
1. Copy the `reviews` folder to the `/plugins/` directory of your site.
2. Navigate to the Cotonti admin panel: `Administration → Extensions → Plugins`.
3. Locate the Reviews plugin and click `Install`.
4. Configure the plugin settings in `Administration → Extensions → Plugins → Reviews → Settings`:
   - `checkprojects`: Enable checking for shared projects for reviews (not tested).
   - `userall`: Display all user reviews regardless of area.
5. Add the `{PHP|cot_reviews_last(5)}` tag to the `index.tpl` template to display the latest 5 reviews on the homepage.
6. Ensure the `users.details.tpl` template includes the `{USERS_DETAILS_REVIEWS_COUNT}` and `{USERS_DETAILS_REVIEWS_URL}` tags for profile review display.
7. Include Font Awesome 6.7.2 in `header.tpl` if not already embedded in your theme:
   ```html
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   ```
   Preferably, download and include it locally for better performance.
8. Verify that Bootstrap 5.3.3 is loaded in the theme's resource file (typically `themes/yourtheme/yourtheme.php`):
   ```php
   Resources::addFile('lib/bootstrap/css/bootstrap.min.css');
   if (Cot::$cfg['headrc_consolidate']) {
       Resources::addFile('lib/bootstrap/js/bootstrap.bundle.min.js');
   } else {
       Resources::linkFileFooter('lib/bootstrap/js/bootstrap.bundle.min.js');
   }
   ```
   For a full example, see: [cleancot.rc.php](https://github.com/webitproff/cot-CleanCot/blob/main/cleancot/cleancot.rc.php)

## File Structure
```
/plugins/reviews/
├── inc/
│   └── reviews.functions.php        # Core functions for review processing and star generation
├── lang/
│   ├── reviews.ru.lang.php          # Russian translations
│   └── reviews.en.lang.php          # English translations
├── setup/
│   ├── reviews.install.sql          # Database setup for the cot_reviews table
│   └── reviews.uninstall.sql        # Database cleanup
├── tpl/
│   ├── reviews.tpl                  # Template for user profile reviews
│   └── reviews.last.tpl             # Template for displaying recent reviews on the homepage
├── reviews.global.php               # Global hook for localization
├── reviews.input.php                # Input hook for initialization
├── reviews.php                      # Main plugin logic for adding, updating, and deleting reviews
├── reviews.setup.php                # Plugin configuration
├── reviews.users.details.php        # Integration with user profile page (users.details.tags hook)
└── reviews.usertags.main.php        # User tag integration (star ratings and review counts)
```

## Usage
- **Adding a Review**: Users can leave reviews on another user's profile page (reviews tab).
- **Editing/Deleting**: Review authors or administrators can edit or delete reviews.
- **Homepage Display**: Use the `{PHP|cot_reviews_last(N)}` tag in `index.tpl`, where `N` is the number of reviews to show.
- **User Profile**: The reviews tab is accessible via `{USERS_DETAILS_REVIEWS_URL}` and displays the review count with `{USERS_DETAILS_REVIEWS_COUNT}`.

## Template Configuration
- In `reviews.tpl`, configure the display of review lists (e.g., `{REVIEW_ROW_STARS}`, `{REVIEW_ROW_TEXT}`, `{REVIEW_ROW_OWNER_FULL_NAME}`).
- In `reviews.last.tpl`, customize the display of recent reviews (e.g., `{REVIEW_ROW_STARS}`, `{REVIEW_ROW_TITLE}`).
- In `users.details.tpl`, add:
  ```html
  <a href="{USERS_DETAILS_REVIEWS_URL}">{PHP.L.reviews_reviews} ({USERS_DETAILS_REVIEWS_COUNT})</a>
  ```
  to display a localized link to the reviews tab.

## Notes
- If a user who left a review is deleted from the database, templates will display "Unknown" instead of their name.
- Integration with the Projects module is untested; use at your own risk.
- Ensure Font Awesome Free 6.7.2 is included if not embedded in your theme.
- Bootstrap 5.3.3 is included in Cotonti 0.9.26 and loaded via `Resources::addFile`. Do not include it manually in `header.tpl`.

## Development
- The plugin supports customization hooks: `reviews.list.tags`, `reviews.edit.tags`, `reviews.add.tags`, `reviews.list.loop`.
- To add custom fields to reviews, use `$cot_extrafields` for the `cot_reviews` table.

## License
Free distribution and modification under the BSD License.  
Copyright (c) 2025 CMSWorks Team. Customized by webitproff (https://github.com/webitproff).

## See Also
1. **[CleanCot Theme for Cotonti](https://github.com/webitproff/cot-CleanCot)**  
   The CleanCot theme for CMF Cotonti. Modern Bootstrap theme on v.5.3.3 for Cotonti Siena v.0.9.26 without outdated (legacy) mode. Only relevant tags!

2. **[Userarticles](https://github.com/webitproff/cot-userarticles)**  
   The plugin for CMF Cotonti displays a list of users with the number of their articles and a detailed list of articles for each user.

3. **[Export to Excel via PhpSpreadsheet](https://github.com/webitproff/cot-excel_export)**  
   Exporting Articles to Excel from the Database in Cotonti via PhpSpreadsheet. Composer is not required for installation.

4. **[Import from Excel via PhpSpreadsheet](https://github.com/webitproff/cot-excelimport-PhpSpreadsheet_No-Composer)**  
   The plugin for importing articles from Excel for all Cotonti-based websites. Composer is not required for installation.

5. **[SeoArticle Plugin for Cotonti](https://github.com/webitproff/seoarticle)**  
   The SeoArticle plugin enhances the SEO capabilities of the Cotonti CMF's Pages module by adding meta tags, Open Graph, Twitter Card, Schema.org structured data, keyword extraction, reading time estimation, and related articles functionality.

6. **[PHPMailer Plugin](https://github.com/webitproff/cot-phpmailer)**  
   The PHPMailer plugin enhances email sending capabilities in Cotonti Siena 0.9.26 by integrating the PHPMailer library (version 6.10.0). It replaces the default cot_mail function with a robust SMTP-based solution, adding advanced features like plugin isolation, duplicate prevention.
   



# Плагин Reviews v3.0.1 for Cotonti 0.9.26

## Описание
Плагин Reviews позволяет пользователям оставлять отзывы о других пользователях на сайте, работающем на Cotonti CMF (https://github.com/Cotonti/Cotonti). 
Поддерживает оценки в виде звёзд, редактирование и удаление отзывов, а также интеграцию с профилем пользователя. 
Отзывы можно привязывать к конкретным областям (например, `users`), а также отображать на главной странице или в профиле.

**Важно**: Интеграция с модулем Projects (для привязки отзывов к проектам) реализована, но не тестировалась.

## Основные возможности
- Добавление, редактирование и удаление отзывов.
- Оценка в виде звёзд (от 1 до 5). от крайне плохо до превосходительно
- Отображение последних отзывов на главной странице index.tpl через условие функции:
```
		<!-- IF {PHP|cot_plugin_active('reviews')} -->
		{PHP|cot_reviews_last(4)}
		<!-- ENDIF -->
```

- Подсчёт количества отзывов и средней оценки для пользователя.
- Интеграция с профилем пользователя через вкладку отзывов (`users.details.tpl`).
- Проверка прав доступа: только авторизованные пользователи могут оставлять отзывы, администраторы могут редактировать все отзывы.
- Поля при создании отзыва: заголовок (тема), текст отзыва и оценка
- Администратор имеет больше полей для правки, в том числе редактировать дату отзыва
- Уведомление администраторов сайта и пользователя, которому оставили отзывы сообщением по электронной почте

## Требования
- Cotonti Siena 0.9.26 (актуальная версия на момент разработки).
- PHP 8.4.
- Bootstrap 5.3.3 (встроен в Cotonti, подключается через `Resources::addFile` в файле загрузки темы).
- Font Awesome Free 6.7.2 (https://fontawesome.com/) для отображения иконок звёзд.

## Установка
1. Скопируйте папку `reviews` в директорию `/plugins/` вашего сайта.

2. Перейдите в админ-панель Cotonti: `Администрирование → Расширения → Плагины`.

3. Найдите плагин Reviews и нажмите `Установить`.

4. Настройте параметры плагина в разделе `Администрирование → Расширения → Плагины → Reviews → Настройки`:
   - `checkprojects`: Включить проверку совместных проектов для отзывов (не тестировалось).
   - `userall`: Показывать все отзывы пользователя.
   
5. Добавьте тег `{PHP|cot_reviews_last(5)}` в шаблон `index.tpl` для отображения последних 5 отзывов на главной странице.

6. Убедитесь, что в шаблоне `users.details.tpl` есть теги `{USERS_DETAILS_REVIEWS_COUNT}` и `{USERS_DETAILS_REVIEWS_URL}` для отображения отзывов в профиле.

7. Подключите Font Awesome 6.7.2 в `header.tpl`, если он не встроен в вашу тему:
   ```html
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   ```
   а лучше скачайте и подключите локально.
   
8. Убедитесь, что Bootstrap 5.3.3 подключен в файле загрузки темы (обычно в `themes/yourtheme/yourtheme.php`):
   ```php
   Resources::addFile('lib/bootstrap/css/bootstrap.min.css');
   if (Cot::$cfg['headrc_consolidate']) {
       Resources::addFile('lib/bootstrap/js/bootstrap.bundle.min.js');
   } else {
       Resources::linkFileFooter('lib/bootstrap/js/bootstrap.bundle.min.js');
   }
   ```
   полный пример смотреть тут: https://github.com/webitproff/cot-CleanCot/blob/main/cleancot/cleancot.rc.php

## Структура файлов
```
/plugins/reviews/
├── inc/
│   └── reviews.functions.php        # Основные функции для обработки отзывов и генерации звёзд
├── lang/
│   ├── reviews.ru.lang.php          # Переводы на русский
│   └── reviews.en.lang.php          # Переводы на английский
├── настройка/
│   ├── reviews.install.sql          # Настройка базы данных для таблицы cot_reviews
│   └── reviews.uninstall.sql        # Очистка базы данных
├── tpl/
│   ├── reviews.tpl                  # Шаблон для отзывов о профиле пользователя
│   └── reviews.last.tpl             # Шаблон для размещения последних отзывов на главной странице
├── reviews.global.php               # Глобальный хук для локализации
├── reviews.input.php                # Входной хук для инициализации
├── reviews.php                      # Основная логика плагина для добавления, обновления и удаления отзывов
├── reviews.setup.php                # Конфигурация плагина
├── reviews.users.details.php        # Интеграция со страницей профиля пользователя (хуки users.details.tags)
└── reviews.usertags.main.php        # Ссылка для тегов пользователей (оценки звёздами и количество отзывов)
```

## Использование
- **Добавление отзыва**: Пользователи могут оставить отзыв на странице профиля другого пользователя (вкладка `reviews`).
- **Редактирование/удаление**: Автор отзыва или администратор может отредактировать или удалить отзыв.
- **Отображение на главной**: Используйте тег `{PHP|cot_reviews_last(N)}` в `index.tpl`, где `N` — количество отзывов.
- **В профиле пользователя**: Вкладка отзывов доступна по ссылке `{USERS_DETAILS_REVIEWS_URL}` и показывает количество отзывов `{USERS_DETAILS_REVIEWS_COUNT}`.

## Настройка шаблонов
- В `reviews.tpl` настройте отображение списка отзывов (поля `{REVIEW_ROW_STARS}`, `{REVIEW_ROW_TEXT}`, `{REVIEW_ROW_OWNER_FULL_NAME}` и т.д.).
- В `reviews.last.tpl` настройте отображение последних отзывов (например, `{REVIEW_ROW_STARS}`, `{REVIEW_ROW_TITLE}`).
- В `users.details.tpl` добавьте:
  ```html
  <a href="{USERS_DETAILS_REVIEWS_URL}">{PHP.L.reviews_reviews} ({USERS_DETAILS_REVIEWS_COUNT})</a>
  ```
  для отображения ссылки на вкладку отзывов с локализованным текстом.

## Примечания
- Если пользователь, оставивший отзыв, удалён из базы, в шаблонах будет отображаться "Неизвестный" вместо имени.
- Интеграция с модулем Projects не тестировалась, используйте на свой риск.


## Разработка
- Плагин поддерживает хуки для кастомизации: `reviews.list.tags`, `reviews.edit.tags`, `reviews.add.tags`, `reviews.list.loop`.


## Лицензия
Свободное распространение и модификация
BSD License. Copyright (c) 2025 CMSWorks Team. Допилил "под себя" webitproff https://github.com/webitproff

## Смотрите также:

1. **[Тема CleanCot для Cotonti](https://github.com/webitproff/cot-CleanCot)**  
   Тема CleanCot для CMF Cotonti. Современная тема на Bootstrap 5.3.3 для Cotonti Siena 0.9.26 без устаревшего (legacy) режима. Только актуальные теги!

2. **[Userarticles](https://github.com/webitproff/cot-userarticles) для CMF Cotonti**  
   Плагин для CMF Cotonti отображает список пользователей с количеством их статей и подробный список статей для каждого пользователя.

3. **[Экспорт в Excel через PhpSpreadsheet](https://github.com/webitproff/cot-excel_export) для CMF Cotonti**  
   Экспорт статей в Excel из базы данных Cotonti с использованием PhpSpreadsheet. Для установки не требуется Composer.

4. **[Импорт из Excel через PhpSpreadsheet](https://github.com/webitproff/cot-excelimport-PhpSpreadsheet_No-Composer) для CMF Cotonti**  
   Плагин для импорта статей из Excel для всех сайтов на базе Cotonti. Для установки не требуется Composer.

5. **[Плагин SeoArticle для Cotonti](https://github.com/webitproff/seoarticle)**  
   Плагин SeoArticle расширяет SEO-возможности модуля Pages в Cotonti CMF, добавляя мета-теги, Open Graph, Twitter Card, структурированные данные Schema.org, извлечение ключевых слов, оценку времени чтения и функционал связанных статей.

6. **[Плагин PHPMailer](https://github.com/webitproff/cot-phpmailer) для CMF Cotonti**  
   Плагин PHPMailer улучшает возможности отправки email в Cotonti Siena 0.9.26 за счёт интеграции библиотеки PHPMailer (версия 6.10.0). Заменяет стандартную функцию `cot_mail` на надёжное SMTP-решение, добавляя продвинутые функции, такие как изоляция плагина и предотвращение дублирования.

