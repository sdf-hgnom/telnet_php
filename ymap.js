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
    var image_source =`<a href="camera.php"> <img src="images/${cameras[0].number}~400.jpg" alt="foto" /></a>>`
        'images/' +cameras[0].number + '~400.jpg';
    alert(image_source);
    var myPlacemark = new ymaps.Placemark([cameras[0].longitude,cameras[0].latitude], {
        balloonContent: image_source,
        iconContent: cameras[0].address
    }, {
        // Красная иконка, растягивающаяся под содержимое.
        preset: "islands#yellowStretchyIcon"
    });
    myMap.geoObjects.add(myPlacemark);
}

// `<a href="camera.php">
//     <img src="image_source" alt="foto" />
// </a>`,