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
    var map_array = [] ;
    var image_source = '';
    for ( let i = 0;i < cameras.length;i++){
        image_source = `<a href="camera.php"> <img src="images/${cameras[i].number}~400.jpg" alt="foto" /></a>>`
        'images/' +cameras[i].number + '~400.jpg';
        var myPlacemark = new ymaps.Placemark([cameras[i].longitude,cameras[i].latitude], {
            balloonContent: image_source,
            iconContent: cameras[i].address
        }, {
            // Красная иконка, растягивающаяся под содержимое.
            preset: "islands#yellowStretchyIcon"
        });
        myMap.geoObjects.add(myPlacemark);

    }

    myMap.geoObjects.add(map_array);
}

// `<a href="camera.php">
//     <img src="image_source" alt="foto" />
// </a>`,