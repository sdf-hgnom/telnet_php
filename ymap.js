ymaps.ready(init);
function init(){
    // Создание карты.
    var myMap = new ymaps.Map("map", {
        // Координаты центра карты.
        // Порядок по умолчанию: «широта, долгота».
        // Чтобы не определять координаты центра карты вручную,
        // воспользуйтесь инструментом Определение координат.
        center: [57.949293, 102.737533],
        // Уровень масштабирования. Допустимые значения:
        // от 0 (весь мир) до 19.
        zoom: 15,
        controls: ['zoomControl', 'typeSelector',  'fullscreenControl', ]
    });
    var myPlacemark = new ymaps.Placemark([57.95297251920029, 102.7352961983922], {
        balloonContent: `<a href="camera.php">
    <img src="images/1627277293VCG202~400.jpg" alt="foto" />
</a>`,
        iconContent: 'Мира - 21!!'
    }, {
        // Красная иконка, растягивающаяся под содержимое.
        preset: "islands#yellowStretchyIcon"
    });
    myMap.geoObjects.add(myPlacemark);
}

