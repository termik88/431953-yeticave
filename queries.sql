INSERT INTO category SET name = 'Доски и лыжи';
INSERT INTO category SET name = 'Крепления';
INSERT INTO category SET name = 'Ботинки';
INSERT INTO category SET name = 'Одежда';
INSERT INTO category SET name = 'Инструменты';
INSERT INTO category SET name = 'Разное';

INSERT INTO user (created_date, email, name, password, avatar, contact)
VALUES ('2016-01-01 00:00:00', 'ignat.v@gmail.com', 'Игнат', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', 'avatar1.jpg', '');
INSERT INTO user (created_date, email, name, password, avatar, contact)
VALUES ('2017-03-01 00:00:00', 'kitty_93@li.ru', 'Леночка', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', 'avatar2.jpg', '');
INSERT INTO user (created_date, email, name, password, avatar, contact)
VALUES ('2018-03-12 00:00:00', 'warrior07@mail.ru', 'Руслан', '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', 'avatar3.jpg', '');

INSERT INTO lot (created_date ,name, description, picture, start_price, date_of_completion, step, id_author, id_category)
VALUES ('2018-01-20  00:00:00', '2014 Rossignol District Snowboard', 'Существует множество различных конструкций и технологий от раздвоенных хвостов,
        направленных форм, до ассиметричных дизайнов и самых нелепых прогибов. Но пройдет еще время, а ставший уже
        классическим прогиб BTX и волнообразная форма канта Magne-Traction останутся не просто популярным, а одним из
        самых производительных и универсальных сочетаний для того, чтобы райдеры продолжали взрывать парки новыми
        трюками, чувствовать уверенность на обледенелых приземлениях и легко крутить во флэте и в воздухе самые
        замысловатые трюки, что как раз и позволит Вам сделать одна из самых популярных досок линейки
        Lib Tech SK8 Banana.', 'img/lot-1.jpg', 10999, '2018-04-21  00:00:00', 2, 1, 1);

INSERT INTO lot (created_date ,name, description, picture, start_price, date_of_completion, step, id_author, id_category)
VALUES ('2018-01-21 00:00:00', 'DC Ply Mens 2016/2017 Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег
          мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
          снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом
          кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
          просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла
          равнодушным.', 'img/lot-2.jpg', 159999, '2018-03-21 00:00:00', 2, 1, 1);

INSERT INTO lot (created_date ,name, description, picture, start_price, date_of_completion, step, id_author, id_winner, id_category)
VALUES ('2018-02-21 00:00:00', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Комфортные и надежные крепления Freestyle созданы как для паркового катания,
        так и для трассового с элементами флэтовых трюков. Отличную амортизацию обеспечит подушка
        Fullbed из вспененного материала EVA, а надежная легкая база из поликарбоната в сочетании с
        надежными стрепами позволит забыть о проблеме внезапной замены креплений.', 'img/lot-3.jpg', 8000, '2018-02-28 00:00:00', 2, 3, 1, 2);

INSERT INTO lot (created_date ,name, description, picture, start_price, date_of_completion, step, id_author, id_category)
VALUES ('2018-02-11 00:00:00', 'Ботинки для сноуборда DC Mutiny Charocal', 'Burton Mint - одни из самых популярных ботинок в женской линейке Burton. Не зависимо от
        того, как часто Вы находитесь на склоне - пару раз в сезон или каждые выходные, ботинки, которые отлично
        сохраняют тепло и обеспечивают комфорт решают много вопросов. Удобная быстрая шнуровка SpeedZone позволит
        в считанные секунды отрегулировать натяжение шнурков в зависимости от Ваших индивидуальных потребностей, а
        комфортный внутренник Imprint 1 обеспечит амортизацию, поддержку и сохранение тепла. И, наконец, внешний
        вид - лаконичный, универсальный и позволяющий сочетаться с любыми креплениями и штанами, что несомненно
        немаловажно для сноубордисток, следящих за своим стилем.', 'img/lot-4.jpg', 10999, '2018-03-28 00:00:00', 1, 2, 3);

INSERT INTO lot (created_date ,name, description, picture, start_price, date_of_completion, step, id_author, id_winner, id_category)
VALUES ('2018-01-01 00:00:00', 'Куртка для сноуборда DC Mutiny Charocal', 'В этой классически скроенной куртке Вы забудете что такое озноб, ведь она наполнена лёгким
        и тёплым пухом и снабжена тёплой подкладкой из тафты. Плюс обязательная в таких случаях
        водоупорная дышащая мембрана.', 'img/lot-5.jpg', 7500, '2018-03-01 00:00:00', 1, 3, 2, 4);

INSERT INTO lot (created_date ,name, description, picture, start_price, date_of_completion, step, id_author, id_category)
VALUES ('2018-02-01 00:00:00', 'Маска Oakley Canopy', 'Маска EG2 – это буквально качественный широкоформатный экран для Ваших глаз при поездке
        в горы. Высокотехнологичное производство линз позволит наслаждаться четкой и контрастной картинкой без
        бликов и искажений в любые погодные условия. Благодаря двойной линзе и продуманной системе вентиляции
        маска не будет запотевать, а большой размер линзы и уменьшенная оправа обеспечат максимальный угол обзора .
        Трехслойный вспененный материал с антибактериальным флисовым покрытием обеспечит комфортную посадку,
        а силиконовые вставки помогут избежать соскальзывание. ', 'img/lot-6.jpg', 500, '2018-03-03 00:00:00', 1, 3, 6);

INSERT INTO bet (date, sum, id_user, id_lot)
VALUES ('2018-02-22 00:00:00', 500, 1, 3);
INSERT INTO bet (date, sum, id_user, id_lot)
VALUES ('2018-02-23 00:00:00', 400, 2, 3);
INSERT INTO bet (date, sum, id_user, id_lot)
VALUES ('2018-02-24  00:00:00',600, 1, 3);

/*Получение списка всех категорий*/
SELECT * FROM category

/*Показать свежие не закрытые лоты*/
SELECT lot.created_date, lot.name as name_lot, lot.start_price, lot.picture, category.name
FROM lot JOIN category ON category.id = lot.id_category
WHERE lot.id_winner IS NULL
ORDER BY lot.created_date ASC;

/*Показать лот и его категорию по заданному id*/
SELECT lot.name, lot.start_price, lot.picture, category.name
FROM lot JOIN category ON category.id = lot.id_category
WHERE lot.id = 3;

/*Обновление поля по заданному id*/
UPDATE lot SET name = 'Супер шмотка'
WHERE lot.id = 3;

/*Две свежие ставки для лота по заданному id*/
SELECT category.name, lot.name, bet.sum, bet.date
FROM lot JOIN bet ON bet.id_lot = lot.id
			JOIN category ON category.id = lot.id_category
WHERE lot.id = 3
ORDER BY bet.sum ASC LIMIT 2;
