-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 24 2021 г., 12:02
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `product_id` int(11) NOT NULL,
  `img` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`product_id`, `img`) VALUES
(1, 'bike1.jpg'),
(2, 'bike2.jpg'),
(3, 'bike3.jpg'),
(4, 'bike4.jpg'),
(5, 'bike5.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `desc_short` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_long` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specification_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `quantity`, `img_id`, `desc_short`, `desc_long`, `specification_id`, `created_at`, `updated_at`) VALUES
(1, 'Electra Café Moto Go! (2020)', '340.47', 5, 1, 'Новинка 2020 года — Cafe Moto Go! Велосипед олицетворяет будущее с историей. Вдохновленный скоростными каферейсерами, он сохранил в себе любовь к гонкам и дерзкий дизайн 60-х годов. Современные компоненты от мировых производителей, скорость и бесшумность. Лимитированная коллекция, всего 10 штук в России.', '<b>Электровелосипед</b> <i>Café Moto Go!</i> (2020) — стильная модель для ценителей\r\n            отличной\r\n            электровелотехники.\r\n            Колеса с покрышками 26″ — достаточно прочные и динамичные, идеальны для\r\n            увлекательного\r\n            катания в городе и за\r\n            городом. Комфорт передвижения обеспечивает рама Алюминиевый сплав 6061-T6, выполненная из алюминиевого\r\n            сплава.\r\n            Дисковые гидравлические тормоза h.disc Вас не подведут, это проверенная и надёжная технология.\r\n            Мощная\r\n            жёсткая\r\n            вилка rigid создаёт надёжную устойчивость.\r\n            <br>\r\n            <br>\r\n            <b>Технологии</b> <br>\r\n            <p>\r\n                Премиальные шины Vee Rubber Speedster с диагональю 26 дюймов на 2,8 дюйма от ведущего\r\n                производителя,\r\n                передние и дисковые гидравлические тормоза Hayes Prime Sport с двухпальцевыми тормозными\r\n                рычагами\r\n                для\r\n                достаточной тормозной мощности, педали Crank Brothers. Все кабели электрического велосипеда проложены\r\n                внутри\r\n                конструкции, для защиты и улучшения внешнего вида.\r\n                <br>\r\n                Дисплей компьютера Bosch Purion отображает скорость, режим езды, дальность, расстояние поездки, общее\r\n                расстояние и состояние зарядки. Отдельного внимания заслуживает новая престижная трансмиссия —\r\n                Gates\r\n                Carbon\r\n                Drive.\r\n                <br>\r\n                Ременной привод, вместо классической цепи, почти не требует обслуживания. Он не растягивается,\r\n                не требует\r\n                смазки, работает бесшумно. Система позволяет не возиться с переключателем или грязной\r\n                засаленной\r\n                цепью, а\r\n                посвятить всё время полному наслаждению ездой.\r\n                <br>\r\n                Комбинация мощной батареи, мотора, бесшумного ремня, заменившего цепь, и ступицы переменной\r\n                передачи\r\n                дает\r\n                Café Moto Go возможность достигать скорости до 25 км в час. Технически\r\n                рассчитанный на 350 Вт\r\n                непрерывной\r\n                мощности, ведущий в своём классе двигатель можно будет расчиповать и увеличить скорость с максимума\r\n                25 км/ч\r\n                до 70 км/ч. После расчиповки в РФ гарантия сохраняется.\r\n            </p>', 1, '2021-08-24 08:17:00', '2021-08-24 08:17:00'),
(2, 'Xiaomi Himo C20', '135.67', 8, 2, 'Основой корпуса модели является алюминий, который может быть окрашен в двух вариантах — в белом и\r\n            темно-сером цветах. Для оформления колес, руля и сиденья используется только черный цвет. Преимущество\r\n            изделия заключается в складной конструкции, благодаря которой можно буквально за несколько секунд сложить\r\n            велосипед Xiaomi.', 'Современные технологии приводят к тому, что в быту человека появляются устройства, которые еще не так\r\n            давно\r\n            казались фантастикой. Электровелосипед Xiaomi Himo C20 Electric Bicycle — простое транспортное\r\n            средство,\r\n            имеющее\r\n            складную конструкцию, продуманный и стильный дизайн, а так же огромный ресурс эксплуатации.\r\n            Эта\r\n            модель очень\r\n            удачно совместила в себе все самое лучшее от городского велосипеда и электровелосипеда с самыми\r\n            последними\r\n            разработками в этой отрасли. Himo C20 оснащен надежной 6-ступенчататой коробкой передач Shimano, Мощным\r\n            японским\r\n            электро двигателем 250W и крайне надежной аккумуляторной батареей емкостью 10000 Mah на Корейских\r\n            ячейках\r\n            18650.\r\n            Вы получите огромное удовольствие управляя этим Электровелосипедом. Система следит за тем, как\r\n            велосипедист\r\n            крутит педали и обеспечивает содействие за счет электрического двигателя.\r\n            <br>\r\n            <br>\r\n            <b>Функциональное оснащение HIMO C20</b> <br>\r\n            <p class=\"two_paragraph\">\r\n                Электровелосипед Himo имеет оптимизированную конструкцию: все детали средства выполнены с особой\r\n                точностью,\r\n                поэтому даже при длительной поездке не должно возникать никакого дискомфорта. Для безопасности\r\n                водителя\r\n                велосипеда, заднее крыло имеет тормозную дисковую систему. На сухом дорожном покрытии тормозной\r\n                путь будет\r\n                всего 4 метра, на мокрой поверхности — до 6 метров.\r\n                <br>\r\n                Ощущение удобства в процессе езды познается благодаря сиденью удобной формы, покрытому натуральной\r\n                кожи и\r\n                оснащенному новейшими моделями амортизаторов. К преимуществам электровелосипеда можно отнести\r\n                наличие сумки\r\n                для инструментов и электроконтроль состояние транспортного средства.\r\n                <br>\r\n                Насос спрятан в основание сиденья, для подкачки колес необходимо снять сиденье и выдвинуть\r\n                спрятанный\r\n                в\r\n                основание насос , им очень удобно подкачивать спущенные колеса. Не надо брать с собой\r\n                ручной\r\n                насос в поездки\r\n                , Himo C20 откроет для вас много интересных разработок , которые помогут сделать эксплуатацию\r\n                Электровелосипеда очень приятной.\r\n            </p>', 2, '2021-08-24 08:18:15', '2021-08-24 08:18:33'),
(3, 'DIGMA P12-4', '130.74', 12, 3, 'Электровелосипед DIGMA P12-4 представлен в эргономичном черном корпусе, выдерживающем нагрузку в 100 кг. Устройство оснащено мотором на 250 Вт, способным развивать скорость до 25 км/ч. Предусматривается наличие запаса хода 15 км и возможность подъема под углом 5 градусов. Комфортному хранению велосипеда способствует складная конструкция.', 'Модель DIGMA P12-4 поставляется вместе с зарядным устройством. В основе используется аккумулятор на 4000 мА∙ч. Гарантируется безотказная работа при температуре от -10 до +40 градусов. Особенностью конструкции является наличие дисковых тормозов, ограничителя скорости и яркой индикации уровня заряда. Прибор весит 18.5 кг и обладает размерами 30x102x109 см.', 3, '2021-08-24 08:22:06', '2021-08-24 08:22:15'),
(4, 'HIPER B51 Graphite', '593.57', 10, 4, 'Электровелосипед HIPER B51 получил прочный стальной каркас и колеса диаметром 26 дюймов с алюминиевым ободом. Электрический двигатель обеспечивает скорость до 25 км/ч и рассчитан на длительную эксплуатацию.', 'Данная модель оснащена дисковыми тормозами спереди и сзади, амортизационной вилкой, 21 скоростью на выбор. Фара, формирующая яркий направленный световой поток, гарантирует безопасность движения в условиях недостаточной освещенности. Емкость аккумулятора HIPER B51 обеспечивает до 40 км езды на одном полноценном цикле зарядки.', 4, '2021-08-24 08:51:30', '2021-08-24 08:51:30'),
(5, 'Forward DUNDEE 20', '352.00', 9, 5, 'Электровелосипед Forward DUNDEE 20 оснащен электромотором мощностью 250 Вт. Низкая рама обеспечит удобство посадки, а складная конструкция – отсутствие проблем при хранении и транспортировке.', 'Электровелосипед Forward DUNDEE 20 оснащен электромотором мощностью 250 Вт. Низкая рама обеспечит удобство посадки, а складная конструкция – отсутствие проблем при хранении и транспортировке.', 5, '2021-08-24 08:58:51', '2021-08-24 08:58:51');

-- --------------------------------------------------------

--
-- Структура таблицы `specifications`
--

CREATE TABLE `specifications` (
  `product_id` int(11) NOT NULL,
  `type_bike` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_weight` decimal(6,2) NOT NULL,
  `type_drive` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bike_weight` decimal(6,2) NOT NULL,
  `max_speed` int(11) NOT NULL,
  `mileage_at_time` decimal(6,2) NOT NULL,
  `charging_time` int(11) NOT NULL,
  `frames_material` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specifications`
--

INSERT INTO `specifications` (`product_id`, `type_bike`, `age`, `max_weight`, `type_drive`, `bike_weight`, `max_speed`, `mileage_at_time`, `charging_time`, `frames_material`) VALUES
(1, 'Электровелосипед', 'для взрослых', '150.50', 'цепной', '40.00', 30, '90.00', 8, 'Алюминиевый сплав 6061-T6'),
(2, 'Электровелосипед', 'для взрослых', '100.00', 'цепной', '21.00', 25, '80.00', 6, 'Алюминиевый сплав'),
(3, 'Электровелосипед', 'для детей', '100.00', 'цепной', '20.00', 25, '15.00', 2, 'Алюминиевый сплав'),
(4, 'Электровелосипед', 'для взрослых', '130.00', 'цепной', '40.00', 32, '40.00', 3, 'Дюраль'),
(5, 'Электровелосипед', 'для всех', '120.00', 'цепной', '20.00', 30, '30.00', 4, 'Алюминиевый сплав');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_id` (`img_id`),
  ADD KEY `specification_id` (`specification_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;