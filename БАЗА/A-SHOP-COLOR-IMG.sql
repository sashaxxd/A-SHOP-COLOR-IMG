-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 01 2019 г., 20:19
-- Версия сервера: 5.6.38
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `A-SHOP-COLOR-IMG`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `calls`
--

CREATE TABLE `calls` (
  `id` int(10) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `calls`
--

INSERT INTO `calls` (`id`, `count`) VALUES
(1, 32);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `drop_id` int(11) NOT NULL,
  `drops_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `content`, `keywords`, `description`, `alias`, `drop_id`, `drops_id`) VALUES
(1, 0, 'iPhone', '', '', '', 'iphone', 0, 0),
(2, 1, 'iPhone 7', '', '', '', 'iphone-7', 0, 0),
(3, 1, 'iPhone 8', '', '', '', 'iphone-8', 0, 0),
(4, 1, 'iPhone Xr', '', '', '', 'iphone-xr', 0, 0),
(5, 0, 'iPad', '', '', '', 'ipad', 0, 0),
(6, 5, 'iPad Air', '', '', '', 'ipad-air', 0, 0),
(7, 5, 'iPad Pro 11', '', '', '', 'ipad-pro-11', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `filters`
--

CREATE TABLE `filters` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sortOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sortOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent_id`, `sortOrder`) VALUES
(5, 'КОНТАКТЫ', 40, 3),
(6, 'СПОСОБЫ ЗАКАЗА', 41, 0),
(7, 'ДОСТАВКА И ОПЛАТА', 42, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` float NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment` enum('0','1','2') NOT NULL DEFAULT '0',
  `delivery` enum('0','1') NOT NULL DEFAULT '0',
  `time_with` varchar(255) NOT NULL,
  `time_to` varchar(255) NOT NULL,
  `sleep` enum('0','1') DEFAULT '0',
  `need_check` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `alias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`, `alias`) VALUES
(40, 'Контакты', '<p>Спасибо, что потратили время и зашли на эту страницу!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Вас, наверное, интересует самое главное &ndash; можно ли нам доверять и почему именно в нашем интернет-магазине вам стоит приобрести товар? Это действительно важные вопросы!Сейчас на нашем складе готово к отгрузке 363 вида подгузников. Основное направление компании - это подгузники детские и&nbsp; взрослые с сопутствующими к ним товарами.Мы занимаемся розничной продажей с БЕСПЛАТНОЙ экспресс&nbsp; доставкой (каждые 4 часа) по городу!!! Больше нет необходимости стоять в очередях, тратить время на ожидание в автомобильных пробках, тратить Ваши средства на проезд в общественном транспорте а так же на заправку Вашего авто,&nbsp; зависеть от погодных условий или придя в розничный магазин и не найдя нужного Вам товара из-за отсутствия его на полке заниматься дальнейшими его поисками. Вы&nbsp; можете совершить покупки при помощи интернета или телефонного звонка оператору. И больше времени проводить с друзьями и близкими людьми, а если Вы деловой человек &ndash; заниматься своими делами.&nbsp; Оставьте Ваши заботы Нам. Мы знаем о сервисе все.&nbsp;&nbsp;</p>\r\n\r\n<p>У нас большой выбор подгузников, удобный поиск, а также фантастически быстрая доставка) Мы делаем все, чтобы сотрудничество с нами было приятным, удобным и выгодным.</p>\r\n\r\n<p>Добро пожаловать в наш интернет-магазин.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>С уважением,&nbsp;<br />\r\nКоманда podguznik-grodno.by</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Коротко о нас:<br />\r\nВладелец магазина:&nbsp; ИП Горбарчук Андрей Васильевич<br />\r\nСвидетельство о регистрации:&nbsp; No 0567664, УНП 591904505<br />\r\nДата регистрации в Торговом реестре Республики Беларусь:&nbsp; 05 октября 2017</p>\r\n\r\n<p>Контактные телефоны:&nbsp; +375 44 5320008<br />\r\nАдрес для почтовых отправлений: 230019 Гродно, ул. Кремко В.И., д.13, кв. 21</p>\r\n', 'kontakty'),
(41, 'Способы заказа', '<p><span style=\"font-size:18px\">Уважаемые клиенты, Мы работаем для Вас. Мы ценим Ваше время и делаем заказы доступными.</span></p>\r\n\r\n<p><span style=\"color:#9D1C20\"><span style=\"font-size:20px\">У Нас существует 2 способа заказа товара:</span></span></p>\r\n\r\n<p><strong>&nbsp; 1. Заказ через сайт:&nbsp; &nbsp;</strong> &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>На сайте Вы выбираете товар, отправляете его в корзину и оформляете заказ в 1 клик.&nbsp; Указываете в форме Ф.И.О, контактный номер телефона и адрес&nbsp; доставки, а также указываете желаемое время доставки. Ожидаете обратную связь отоператора о подтверждении заказа.</p>\r\n\r\n<p><strong>&nbsp; 2.&nbsp; Заказ по телефону:</strong></p>\r\n\r\n<p>&nbsp;- выбираете нужный Вам товар и количество</p>\r\n\r\n<p>&nbsp;- набираете любой номер телефона оператора (МТС, Велком , городской)</p>\r\n\r\n<p>- называете оператору наименование и количество.&nbsp; &nbsp;Адрес доставки, номер телефона. А так же желаемое время доставки.</p>\r\n\r\n<p><strong>Заказать обратный звонок.</strong></p>\r\n\r\n<p>Оператор Вам перезвонит и уточнит по телефону всю необходимую информацию по товару, количестве и адресе доставки.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>С уважением,&nbsp;<br />\r\nКоманда podguznik-grodno.by</p>\r\n', 'sposoby-zakaza'),
(42, 'Доставка и оплата', '<p>График приема заказов и доставки товара:</p>\r\n\r\n<p>Прием заказов:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>Пн-Пт с 09:00 - 20:00</p>\r\n\r\n<p>Сб-Вс с 09:00 - 17:00</p>\r\n\r\n<p>ВНИМАНИЕ !!! Заказы принятые в будние дни до 18.00 доставляются в этот же день, после 18:00 на следующий день.</p>\r\n\r\n<p>ВНИМАНИЕ !!! Заказы принятые в выходные дни до 16.00 доставляются в этот же день, после 16:00 на следующий день.</p>\r\n\r\n<p>Доставка товара:</p>\r\n\r\n<p>Пн-Пт с 11:00 - 21:00</p>\r\n\r\n<p>Сб-Вс с 11:00 - 19:00</p>\r\n\r\n<p>Мы осуществляем доставку каждые 4 часа!!!</p>\r\n\r\n<p>Условия доставки:</p>\r\n\r\n<p>По городу Гродно Мы осуществляем доставку бесплатно при заказе на сумму от 15 рублей (подгузники, трусики)!</p>\r\n\r\n<p>&nbsp;Прокладки/вкладыши, пеленки, средства по уходу - от 25 руб!</p>\r\n\r\n<p>Доставка возможна за город. В этом случае сумма заказа (для бесплатной доставки) оговаривается индивидуально по каждому заказу.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Способы оплаты товара:</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;1.&nbsp; Наличными: Мы доставляем товар Вам на дом до двери &ndash; Вы оплачиваете по факту получения.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;2. Банковскими пластиковыми карточками:&nbsp; с помощью платежного терминала (все карты типа Visa, MasterCard, Белкарт с магнитной полосой, чипом &ndash; контактные и бесконтактные, с карточками систем лояльности Халва, Халва +).&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; 3. Онлайн платежи по банковским картам:</p>\r\n\r\n<p>Онлайн платежи по банковским картам осуществляются через систему электронных платежей bePaid. Платежная страница системы bePaid отвечает всем требованиям безопасности передачи данных (PCI DSS Level 1). Все конфиденциальные данные хранятся в зашифрованном виде и максимально устойчивы к взлому.</p>\r\n\r\n<p><br />\r\nОбразец подтверждения оплаты&nbsp;<br />\r\nУсловия возврата описаны здесь</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Оплата картами &laquo;Халва&raquo; и &laquo;Халва+&raquo; от МТБанка<br />\r\n&laquo;Халва&raquo;: рассрочка по карте на 1 месяц.</p>\r\n\r\n<p>&laquo;Халва+&raquo;: можно рассчитаться бонусами, которые накоплены на карте лояльности Халва+</p>\r\n\r\n<p>С уважением,&nbsp;<br />\r\nКоманда podguznik-grodno.by</p>\r\n', 'dostavka-i-oplata');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text,
  `price` decimal(10,2) DEFAULT NULL,
  `price_sale` decimal(10,2) DEFAULT NULL,
  `price_one` decimal(10,2) DEFAULT NULL,
  `article` varchar(255) NOT NULL DEFAULT '0',
  `size` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sale` enum('0','1') NOT NULL DEFAULT '0',
  `sale2` enum('0','1') NOT NULL,
  `sklad` enum('0','1') NOT NULL DEFAULT '1',
  `brands_id` int(11) NOT NULL DEFAULT '0',
  `popular` enum('0','1') NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL,
  `published` enum('0','1') NOT NULL DEFAULT '1',
  `sortOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `link`, `title`, `title2`) VALUES
(34, 'http://a-podguznik-oktober2/podguzniki-product/view?id=35', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `isAdmin`) VALUES
(1, 'admin', 'test@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `calls`
--
ALTER TABLE `calls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `filters`
--
ALTER TABLE `filters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
