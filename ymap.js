ymaps.ready(init);

function init() {
    // var camerasCollection = new yamap.GeoObjectCollection(null,{preset: 'islands#yellowStretchyIcon'});
    // Создание карты.

    var myMap = new ymaps.Map("map", {
        // Координаты центра карты.
        // Порядок по умолчанию: «широта, долгота».
        // Чтобы не определять координаты центра карты вручную,
        // воспользуйтесь инструментом Определение координат.
        center: [57.95297251920029, 102.7352961983922],
        // Уровень масштабирования. Допустимые значения:
        // от 0 (весь мир) до 19.
        zoom: 15,
        controls: []
    });

    // var camerasCollection = new ymaps.GeoObjectCollection(null, {preset: 'islands#yellowStretchyIcon'});
    for (let i = 0;i<cameras.length;i++){
        addPlacemark(cameras[i]);

        // var image_source = `<!--<a href="camera.php?number=${cameras[i].number}"> <img src="images/${cameras[i].number}~400.jpg" alt="foto" /></a>-->`

        function addPlacemark(data) {
            var myPlacemark = new ymaps.Placemark([data.longitude,data.latitude], {
                hintContent: data.address,
                balloonContent: `<a href="camera.php?camera=${data.number}"> <img src="images/${data.number}~400.jpg" alt="foto" /></a>`
            },{
                // Красная иконка, растягивающаяся под содержимое.
                preset: "islands#redVideoIcon"
            });
            myMap.geoObjects.add(myPlacemark);
        }

    }}



