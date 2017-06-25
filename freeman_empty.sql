-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 01 2015 г., 11:47
-- Версия сервера: 5.6.25-0ubuntu0.15.04.1
-- Версия PHP: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `freeman_empty`
--
use `freeman_empty`;
-- --------------------------------------------------------

--
-- Структура таблицы `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Роль',
  `userid` int(11) NOT NULL COMMENT 'Пользователь',
  `bizrule` text COLLATE utf8_unicode_ci COMMENT 'Бизнес-правило',
  `data` text COLLATE utf8_unicode_ci COMMENT 'Дополнительные данные'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Предоставленные роли';

--
-- Дамп данных таблицы `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Administrator', 1, NULL, NULL),
('DBManager', 1, NULL, NULL),
('ModuleFile', 1, NULL, NULL),
('ModuleLog', 1, NULL, NULL),
('ModuleMenu', 1, NULL, NULL),
('ModuleMiniGallery', 1, NULL, NULL),
('ModuleNews', 1, NULL, NULL),
('ModulePage', 1, NULL, NULL),
('ModuleSetting', 1, NULL, NULL),
('ModuleUser', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Наименование',
  `type` int(11) NOT NULL COMMENT 'Вид объекта',
  `description` text COLLATE utf8_unicode_ci COMMENT 'Описание',
  `bizrule` text COLLATE utf8_unicode_ci COMMENT 'Бизнес-правило',
  `data` text COLLATE utf8_unicode_ci COMMENT 'Дополнительные данные'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Объекты авторизации';

--
-- Дамп данных таблицы `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Administrator', 2, '', NULL, NULL),
('Authority', 2, '', NULL, NULL),
('DBManager', 2, '', NULL, NULL),
('Editor', 2, '', NULL, NULL),
('ModuleFile', 1, 'Файлы', NULL, NULL),
('ModuleLog', 1, 'Протокол', NULL, NULL),
('ModuleMenu', 1, 'Меню', NULL, NULL),
('ModuleMiniGallery', 1, 'Мини галереи', NULL, NULL),
('ModuleNews', 1, 'Новости', NULL, NULL),
('ModulePage', 1, 'Управление страницами', NULL, NULL),
('Modules', 1, 'Все модули', NULL, NULL),
('ModuleSetting', 1, 'Настройки', NULL, NULL),
('ModuleUser', 1, 'Пользователи', NULL, NULL),
('PageDeleter', 1, 'Удаление страниц', NULL, NULL),
('SettingAccess1', 1, 'Доступ к настройкам 1-го уровня', NULL, NULL),
('SettingAccessEMAIL', 1, 'Доступ к настройкам EMail', NULL, NULL),
('User', 2, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Родительский объект',
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Дочерний объект'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Иерархия объектов авторизации';

--
-- Дамп данных таблицы `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('Administrator', 'Editor'),
('Modules', 'ModuleFile'),
('Administrator', 'ModuleLog'),
('Modules', 'ModuleLog'),
('Modules', 'ModuleMenu'),
('Modules', 'ModuleMiniGallery'),
('Modules', 'ModuleNews'),
('Modules', 'ModulePage'),
('Modules', 'ModuleSetting'),
('Administrator', 'ModuleUser'),
('Modules', 'ModuleUser');

-- --------------------------------------------------------

--
-- Структура таблицы `folder`
--

CREATE TABLE IF NOT EXISTS `folder` (
`fid` int(11) NOT NULL,
  `f_pid` int(11) DEFAULT NULL COMMENT 'Родительский каталог',
  `f_sort` int(11) NOT NULL DEFAULT '0' COMMENT 'Сортировка',
  `f_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Каталог',
  `can_delete` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Кто может удалять',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Удалённая запись'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Структура страниц';

--
-- Дамп данных таблицы `folder`
--

INSERT INTO `folder` (`fid`, `f_pid`, `f_sort`, `f_name`, `can_delete`, `is_delete`) VALUES
(1, NULL, 1, 'system', 'PageDeleter', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `linkOI`
--

CREATE TABLE IF NOT EXISTS `linkOI` (
  `media_id` int(11) NOT NULL COMMENT 'Ссылка на медиа-ресурс',
  `type` int(11) NOT NULL COMMENT '1- Главная',
  `sort` int(11) NOT NULL COMMENT 'Порядок',
  `object_type` int(11) NOT NULL COMMENT 'Тип объекта',
  `object_id` int(11) NOT NULL COMMENT 'ID-объекта'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Связь объекта с медиа-информацией';

-- --------------------------------------------------------

--
-- Структура таблицы `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `ltype` enum('ED','MT','AI','ST','SC','LE') COLLATE utf8_unicode_ci NOT NULL COMMENT 'ID списка',
  `lid` int(11) NOT NULL COMMENT 'ID элемента списка',
  `l_sort` int(11) NOT NULL COMMENT 'Порядок отображения',
  `l_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Название типа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Список';

--
-- Дамп данных таблицы `list`
--

INSERT INTO `list` (`ltype`, `lid`, `l_sort`, `l_name`) VALUES
('ED', 1, 1, 'TinyMCE'),
('ED', 2, 2, 'Markdown'),
('MT', 1, 1, 'Фото'),
('MT', 2, 2, 'Видео'),
('MT', 3, 3, 'Ссылка'),
('MT', 4, 4, 'YouTube'),
('MT', 5, 5, 'Файл'),
('AI', 0, 1, 'Операция'),
('AI', 1, 2, 'Задача'),
('AI', 2, 3, 'Роль'),
('ST', 1, 1, 'Строка'),
('ST', 2, 2, 'Текст'),
('ST', 3, 3, 'Список'),
('ST', 4, 4, 'Картинка'),
('ST', 5, 5, 'Пароль'),
('SC', 1, 1, 'Контакты'),
('SC', 2, 2, 'Коды и счётчики'),
('SC', 3, 3, 'Другие'),
('LE', 1, 1, 'Добавлено'),
('LE', 2, 2, 'Отредактировано'),
('LE', 3, 3, 'Удалено'),
('LE', 4, 4, 'Показано'),
('LE', 5, 5, 'Скрыто');

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`zid` int(11) NOT NULL,
  `z_type` int(11) NOT NULL COMMENT 'Тип события list.LE',
  `dt_event` datetime NOT NULL COMMENT 'Время события',
  `z_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Заголовок',
  `z_user` int(11) DEFAULT NULL COMMENT 'Редактор',
  `z_object_type` int(11) NOT NULL COMMENT 'Тип объекта',
  `z_object_id` int(11) NOT NULL COMMENT 'ID-объекта'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Протокол';

-- --------------------------------------------------------

--
-- Структура таблицы `media`
--

CREATE TABLE IF NOT EXISTS `media` (
`iid` int(11) NOT NULL,
  `i_type` int(11) NOT NULL DEFAULT '1' COMMENT 'Тип media информации',
  `i_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'TAG - title',
  `i_alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'TAG - alt',
  `i_original` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Имя файла',
  `i_source` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Источник картинки',
  `i_info` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Дополнительная информация',
  `i_crop` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Параметры',
  `i_watermark` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Watermark',
  `i_path` int(11) NOT NULL COMMENT 'Тип объекта',
  `i_oid` int(11) NOT NULL COMMENT 'ID-объекта'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Картинки';

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`mid` int(11) NOT NULL,
  `m_pid` int(11) DEFAULT NULL COMMENT 'Родительский пункт',
  `m_sort` int(11) NOT NULL DEFAULT '0' COMMENT 'Сортировка',
  `m_level` int(11) NOT NULL DEFAULT '0' COMMENT 'Глубина вложенности',
  `m_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Наименование',
  `m_sef` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'URL',
  `dt_start` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Дата публикации',
  `m_page_id` int(11) DEFAULT NULL COMMENT 'Страница'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Меню';

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`mid`, `m_pid`, `m_sort`, `m_level`, `m_name`, `m_sef`, `dt_start`, `m_page_id`) VALUES
(1, NULL, 0, 1, 'Главное меню', '', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
`eid` int(11) NOT NULL,
  `e_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Заголовок',
  `e_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Ключевые слова',
  `e_description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Описание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='META & OG';

-- --------------------------------------------------------

--
-- Структура таблицы `miniGallery`
--

CREATE TABLE IF NOT EXISTS `miniGallery` (
`mgid` int(11) NOT NULL,
  `mg_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Наименование',
  `is_published` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Публиковать'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Мини галереи';

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`nid` int(11) NOT NULL,
  `n_meta` int(11) DEFAULT NULL COMMENT 'meta-тэги',
  `n_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Заголовок',
  `n_sef` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'URL',
  `n_media_id` int(11) DEFAULT NULL COMMENT 'Картинка',
  `dt_start` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Дата публикации',
  `content_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Тип редактора',
  `content_orig` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Оригинал текста',
  `content_long` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'HTML-текст'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Новости';

-- --------------------------------------------------------

--
-- Структура таблицы `object`
--

CREATE TABLE IF NOT EXISTS `object` (
`oid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Типы объектов';

--
-- Дамп данных таблицы `object`
--

INSERT INTO `object` (`oid`) VALUES
(1),
(3),
(4),
(5),
(7),
(26),
(37),
(38),
(50);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`pid` int(11) NOT NULL,
  `p_dir` int(11) DEFAULT NULL COMMENT 'Положение в структуре страниц',
  `p_sort` int(11) NOT NULL DEFAULT '0' COMMENT 'Сортировка',
  `p_meta` int(11) DEFAULT NULL COMMENT 'Мета-теги',
  `p_lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'RU' COMMENT 'Язык страницы',
  `p_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Наименование',
  `p_sef` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'URL',
  `dt_start` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Начало публикации',
  `is_published` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Опубликована ли запись',
  `can_delete` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Кто может удалять',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Удалённая запись',
  `noindex` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Не индексировать',
  `nofollow` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Не учитывать ссылки',
  `content_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Тип редактора',
  `content_orig` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Оригинал текста',
  `content_long` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'HTML-текст'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Страницы';

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`pid`, `p_dir`, `p_sort`, `p_meta`, `p_lang`, `p_name`, `p_sef`, `dt_start`, `is_published`, `can_delete`, `is_delete`, `noindex`, `nofollow`, `content_type`, `content_orig`, `content_long`) VALUES
(1, 1, 1, NULL, 'RU', 'Главная', 'index', '0000-00-00 00:00:00', 1, 'PageDeleter', 0, 0, 0, 1, '', ''),
(2, 1, 1, NULL, 'RU', 'Новости', 'news', '0000-00-00 00:00:00', 1, 'PageDeleter', 0, 0, 0, 1, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
`sid` int(11) NOT NULL,
  `s_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Тип поля',
  `s_category` tinyint(1) NOT NULL DEFAULT '3' COMMENT 'Категория',
  `s_sort` int(11) NOT NULL COMMENT 'Порядок',
  `s_access` int(11) NOT NULL DEFAULT '0' COMMENT 'Уровень доступа',
  `s_cache` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Кешировать',
  `s_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Название',
  `s_value` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Значение',
  `s_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Описание'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Настройки';

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`sid`, `s_type`, `s_category`, `s_sort`, `s_access`, `s_cache`, `s_name`, `s_value`, `s_description`) VALUES
(1, 1, 1, 1, 0, 1, 'admin-email', '', 'Email администратора (для системных сообщений)'),
(2, 1, 1, 2, 0, 1, 'sender-email', '', 'Email отправителя'),
(3, 1, 1, 3, 0, 1, 'sender-name', '', 'Имя отправителя'),
(4, 1, 1, 4, 0, 1, 'subject-default', '<subject>', 'Шаблон темы по-умолчанию'),
(5, 1, 1, 5, 1000, 1, 'mail-smtp', '', 'SMTP-Server'),
(6, 1, 1, 8, 1000, 1, 'mail-port', '465', 'SMTP-Port'),
(7, 1, 1, 6, 1000, 1, 'mail-username', '', 'SMTP-Username'),
(8, 1, 1, 7, 1000, 1, 'mail-password', '', 'SMTP-Password'),
(9, 2, 2, 1, 0, 0, 'robots_txt', 'User-agent: * Disallow: /', 'Поле для управления файлом robots.txt'),
(10, 2, 2, 2, 0, 0, 'google_analytics', '', 'Поле для вставки кода Google Analitics'),
(11, 2, 2, 3, 0, 0, 'Yandex_Metrics', '', 'Поле для вставки кода Яндекс.Метрики'),
(12, 2, 2, 4, 0, 0, 'Метатег', '', ' Для подтверждения прав на сайт в Яндексе и Гугле');

-- --------------------------------------------------------

--
-- Структура таблицы `shortcutBar`
--

CREATE TABLE IF NOT EXISTS `shortcutBar` (
`sbid` int(11) NOT NULL,
  `sb_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Наименование',
  `sb_sef` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'URL',
  `sb_icon` text COLLATE utf8_unicode_ci COMMENT 'Иконка',
  `sb_sort` int(11) NOT NULL COMMENT 'Порядок елемента',
  `sb_user` int(11) NOT NULL COMMENT 'Владелец'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Панель быстрого старта';

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1443604447),
('m140904_000000_object_init', 1443604455),
('m140904_000001_kpd_base', 1443604456),
('m140904_000002_meta_base', 1443604457),
('m140904_000003_media_base', 1443604462),
('m140904_000004_user_base', 1443604462),
('m140904_000005_shortcutBar_base', 1443604463),
('m140904_000006_rbac_base', 1443604469),
('m140904_000007_setting_module', 1443604471),
('m140904_000008_log_module', 1443604475),
('m140904_000009_access_base', 1443604476),
('m140904_000010_page_module', 1443604479),
('m140904_000011_menu_module', 1443604481),
('m140904_000012_miniGallery_module', 1443604482),
('m140904_000013_page_inflater', 1443604482),
('m140904_000014_menu_inflater', 1443604482),
('m140904_000015_setting_inflater', 1443604482),
('m140904_000016_news_module', 1443604485);

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE IF NOT EXISTS `User` (
`uid` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'E-mail',
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Логин',
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Пароль',
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'ФИО',
  `u_sef` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'URL(ФИО)',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Статус',
  `activationKey` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Пользователи';

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`uid`, `email`, `username`, `password`, `fullname`, `u_sef`, `updatetime`, `status`, `activationKey`) VALUES
(1, 'noreply@gmail.com', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '', '', '2015-09-30 09:14:22', 1, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
 ADD PRIMARY KEY (`itemname`,`userid`), ADD KEY `FK_AUTH_USER` (`userid`);

--
-- Индексы таблицы `AuthItem`
--
ALTER TABLE `AuthItem`
 ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `FK_AUTH_CHILD` (`child`);

--
-- Индексы таблицы `folder`
--
ALTER TABLE `folder`
 ADD PRIMARY KEY (`fid`), ADD KEY `FK_PARENT_FOLDER` (`f_pid`);

--
-- Индексы таблицы `linkOI`
--
ALTER TABLE `linkOI`
 ADD KEY `IX_LINKOI` (`object_type`,`object_id`,`type`,`media_id`), ADD KEY `FK_LINKOI_MEDIA` (`media_id`);

--
-- Индексы таблицы `list`
--
ALTER TABLE `list`
 ADD PRIMARY KEY (`ltype`,`lid`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`zid`), ADD KEY `IX_LOG_EVENT` (`dt_event`), ADD KEY `FK_LOG_OBJ` (`z_object_type`), ADD KEY `FK_LOG_USER` (`z_user`);

--
-- Индексы таблицы `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`iid`), ADD KEY `FK_MEDIA_OBJ` (`i_path`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`mid`), ADD KEY `IX_MENU_SORT` (`m_pid`,`m_sort`), ADD KEY `IX_MENU_SEF` (`m_pid`,`m_sef`), ADD KEY `FK_MENU_PAGE` (`m_page_id`);

--
-- Индексы таблицы `meta`
--
ALTER TABLE `meta`
 ADD PRIMARY KEY (`eid`);

--
-- Индексы таблицы `miniGallery`
--
ALTER TABLE `miniGallery`
 ADD PRIMARY KEY (`mgid`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`nid`), ADD UNIQUE KEY `IX_NEWS_SEF` (`n_sef`), ADD KEY `IX_NEWS_PUB` (`dt_start`), ADD KEY `FK_NEWS_META` (`n_meta`), ADD KEY `FK_NEWS_MEDIA` (`n_media_id`);

--
-- Индексы таблицы `object`
--
ALTER TABLE `object`
 ADD PRIMARY KEY (`oid`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`pid`), ADD KEY `IX_PAGE_SORT` (`p_dir`,`p_sort`);

--
-- Индексы таблицы `setting`
--
ALTER TABLE `setting`
 ADD PRIMARY KEY (`sid`), ADD UNIQUE KEY `UQ_SETTING` (`s_name`);

--
-- Индексы таблицы `shortcutBar`
--
ALTER TABLE `shortcutBar`
 ADD PRIMARY KEY (`sbid`), ADD KEY `FK_SHORTCUT_USER` (`sb_user`);

--
-- Индексы таблицы `tbl_migration`
--
ALTER TABLE `tbl_migration`
 ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
 ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `folder`
--
ALTER TABLE `folder`
MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
MODIFY `zid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `media`
--
ALTER TABLE `media`
MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `meta`
--
ALTER TABLE `meta`
MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `miniGallery`
--
ALTER TABLE `miniGallery`
MODIFY `mgid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `object`
--
ALTER TABLE `object`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `setting`
--
ALTER TABLE `setting`
MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `shortcutBar`
--
ALTER TABLE `shortcutBar`
MODIFY `sbid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
ADD CONSTRAINT `FK_AUTH_ROLE` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_AUTH_USER` FOREIGN KEY (`userid`) REFERENCES `User` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
ADD CONSTRAINT `FK_AUTH_CHILD` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_AUTH_PARENT` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `folder`
--
ALTER TABLE `folder`
ADD CONSTRAINT `FK_PARENT_FOLDER` FOREIGN KEY (`f_pid`) REFERENCES `folder` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `linkOI`
--
ALTER TABLE `linkOI`
ADD CONSTRAINT `FK_LINKOI_MEDIA` FOREIGN KEY (`media_id`) REFERENCES `media` (`iid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_LINKOI_OBJ` FOREIGN KEY (`object_type`) REFERENCES `object` (`oid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `log`
--
ALTER TABLE `log`
ADD CONSTRAINT `FK_LOG_OBJ` FOREIGN KEY (`z_object_type`) REFERENCES `object` (`oid`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `FK_LOG_USER` FOREIGN KEY (`z_user`) REFERENCES `User` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `media`
--
ALTER TABLE `media`
ADD CONSTRAINT `FK_MEDIA_OBJ` FOREIGN KEY (`i_path`) REFERENCES `object` (`oid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
ADD CONSTRAINT `FK_MENU_PAGE` FOREIGN KEY (`m_page_id`) REFERENCES `page` (`pid`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `FK_PARENT_MENU` FOREIGN KEY (`m_pid`) REFERENCES `menu` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `FK_NEWS_MEDIA` FOREIGN KEY (`n_media_id`) REFERENCES `media` (`iid`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `FK_NEWS_META` FOREIGN KEY (`n_meta`) REFERENCES `meta` (`eid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `page`
--
ALTER TABLE `page`
ADD CONSTRAINT `FK_PAGE_FOLDER` FOREIGN KEY (`p_dir`) REFERENCES `folder` (`fid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `shortcutBar`
--
ALTER TABLE `shortcutBar`
ADD CONSTRAINT `FK_SHORTCUT_USER` FOREIGN KEY (`sb_user`) REFERENCES `User` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
