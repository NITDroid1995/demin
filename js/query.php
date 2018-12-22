<?php
/**
 * @author Evgeni Lezhenkin evgeni@lezhenkin.ru http://lezhenkin.ru
 * 
 * Скрипт, обрабатывающий POST-запросы от JavaScript-сценариев
 * Скрипт получает строку запроса, а в ответ отправляет массив с данными
 */
// Непосредственно для этого скрипта мы создадим здесь массивы, в которых будут храниться
// значения, запрашиваемые JavaScript-сценарием. В ваших сценариях этих массивов, скорее всего,
// не будет. Информация, подобная этой, будет в вашей базе данных, и вам её придется оттуда 
// извлечь. Как вы это сделаете, это уже ваши предпочтения
$types = array(
    1 => array(
        // Наземный транспорт
        1 => 'Granta',
        2 => 'X-Ray',
        3 => 'Priora'
    ),
    2 => array(
        // Водный транспорт
        1 => 'G63',
        2 => 'C-Class',
        3 => 'E-Class'
    ),
    3 => array(
        // Воздушный транспорт
        1 => 'X3',
        2 => 'X5M',
        3 => 'X6M'
    )
);
$kinds = array(
    // Наземный транспорт
    1 => array(
        // Железнодорожный транспорт
        1 => array(
            1 => 'Электропоезд',
            2 => 'Дизельный поезд',
            3 => 'Дрезина'
        ),
        // Автомобильный транспорт
        2 => array(
            1 => 'Легковой автомобиль',
            2 => 'Грузовой автомобиль',
            3 => 'Автобус'
        ),
        // Ручной транспорт
        3 => array(
            1 => 'Тачка',
            2 => 'Тележка',
            3 => 'Велосипед'
        )
    ),
    // Водный транспорт
    2 => array(
        // Речной транспорт
        1 => array(
            1 => 'Трамвай',
            2 => 'Теплоход',
            3 => 'Ракета'
        ),
        // Морской транспорт
        2 => array(
            1 => 'Крейсер',
            2 => 'Круизный лайнер',
            3 => 'Баржа'
        ),
        // Подводный транспорт
        3 => array(
            1 => 'Подводная лодка',
            2 => 'Батискаф',
            3 => 'Капсула смерти'
        )
    ),
    // Воздушный транспорт
    3 => array(
        // Самолет
        1 => array(
            1 => 'Боинг',
            2 => 'Аэробус',
            3 => 'Руслан'
        ),
        // Вертолеты
        2 => array(
            1 => 'МИ',
            2 => 'Апач',
            3 => 'Черная акула'
        ),
        // Ракета (шаттл)
        3 => array(
            1 => 'Союз',
            2 => 'Апполон',
            3 => 'Дискавери',
            4 => 'Буран'
        )
    )
);

// Проверяем наличие переменной, которая укажет данному сценарию какие именно данные нужны
if (!isset($_POST['query']) || !$_POST['query']) {
    exit("Нет данных определяющих тип запроса");
}
else {
    // Сохраняем строку запроса данных в отдельной переменной
    $query = trim($_POST['query']); // Очищаем от лишних пробелов
    
    // Определяем тип запроса
    switch($query) {
    case 'getKinds':    // Запрос на получение видов транспорта
        // Сохраним в переменную значение выбранного типа транспорта
        $type_id = trim($_POST['type_id']); // Очистим его от лишних пробелов
        // Формируем массив с ответом
        $result = NULL;
        $i = 0;
        foreach ($types[$type_id] as $kind_id => $kind) {
            $result[$i]['kind_id'] = $kind_id;
            $result[$i]['kind'] = $kind;
            $i++;
        }
    break;
    
    default:
        // Если данные не определены
        $result = NULL;
    break;
    }
}

// Преобразуем данные в формат json, чтобы их смог обработать JavaScript-сценарий, приславший запрос
echo json_encode($result);

/**
 * Данный код не идеален. Сама идея представления исходных данных о транспорте в виде массива очень
 * далека от идеала. И вы должны понимать почему. Данные должны храниться в реляционной базе данных, 
 * а представленный вариант написания сценария является лишь простейшим примером, который не стоит 
 * в таком виде применять на практике. Вы здесь должны лишь понять принципы работы языка и взаимодействия
 * между языками программирования
 */
?>
