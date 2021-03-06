/*ниже шесть запросов для добавления в БД категорий*/
INSERT INTO categories 
(title) VALUES 
('Доски и лыжи'),
('Крепления'),
('Ботинки'),
('Одежда'),
('Инструмент'),
('Разное');

/*ниже два запроса для добавления в БД пользователей*/
INSERT INTO users 
(email, name, password, avatar, contact_info)
 VALUES 
 ( 
   'rick@mail.ru',
   'Рик Санчез',
   'UnityOneLove',
   'http://rickandmorty.cn-fan.ru/seasons/203_big.jpg',
   'sendToNull@mail.ru' 
 ),
 (
   '2017-05-05',
   'morty@mail.ru',
   'Морти Смит',
   'theBestOfAllMorty',
   'http://2x2tv.ru/upload/iblock/6be/6bea027c0d3496e3d75afb9102d4e9d8.jpg',
   'rickIsFool@mail.ru'
 )

/*ниже 6 запросов для добавления в БД объявлений*/
 INSERT INTO lots
   (id_user,id_category,title,discription,picture,start_price,final_price,finish_date)
 VALUES (
  '1',
  '1',
  '2014 Rossignol District Snowboard',
  'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  'img/lot-1.jpg',
  '10999',
  '10999',
  '2018-12-31'
  ),
  (
  '2',
  '1',
  'DC Ply Mens 2016/2017 Snowboard',
  'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  'img/lot-2.jpg',
  '159999',
  '159999',
  '2018-12-31'
  ),
  (
  '1',
  '2',
  'Крепления Union Contact Pro 2015 года размер L/XL',
  'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  'img/lot-3.jpg',
  '8000',
  '8000',
  '2018-12-31'
  ),
  (
  '2',
  '3',
  'Ботинки для сноуборда DC Mutiny Charocal',
  'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  'img/lot-4.jpg',
  '10999',
  '10999',
  '2018-12-31'
  ),
  (
  '1',
  '4',
  'Куртка для сноуборда DC Mutiny Charocal',
  'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  'img/lot-5.jpg',
  '7500',
  '7500',
  '2018-12-31'
  ),
  (
  '2',
  '6',
  'Маска Oakley Canopy',
  'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  'img/lot-6.jpg',
  '5400',
  '5400',
  '2018-12-31'
  );

/*ниже два запроса для добавления в БД ставок*/
INSERT INTO bets
  (id_user,id_lot, sum)
 VALUES (
  '1',
  '1',
  '13000'
  );
INSERT INTO bets
  (id_user,id_lot,sum)
 VALUES (
  '2',
  '3',
  '9000'
  );

/*запрос на получения всех категорий*/
SELECT * FROM categories;

/*запрос на получение открытых лотов*/
SELECT lots.title, start_price, picture, final_price, categories.title
FROM lots
INNER JOIN categories ON lots.id_category = categories.id;

/*запрос на показ лота по id и отдельного показа его категории*/
SELECT * FROM lots WHERE id = 5;
SELECT categories.title FROM lots
INNER JOIN categories ON lots.id_category = categories.id WHERE lots.id = 5;

/*запрос на измение названия лота по id*/
UPDATE lots SET title = 'Самая чёткая доска' WHERE id = 1;

/*запрос на получение самых свежих ставок для лота по его идентификатору*/
SELECT sum FROM bets
INNER JOIN lots ON bets.id_lot = lots.id WHERE lots.id = 3;

