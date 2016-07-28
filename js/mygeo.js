ymaps.ready(init);

function init() {
    var geolocation = ymaps.geolocation,
        myMap = new ymaps.Map('map', {
            center: [55, 34],
            zoom: 10
        }, {
            searchControlProvider: 'yandex#search'
        });

    // Сравним положение, вычисленное по ip пользователя и
    // положение, вычисленное средствами браузера.
    geolocation.get({
        provider: 'yandex',
        mapStateAutoApply: true
    }).then(function (result) {
        // Красным цветом пометим положение, вычисленное через ip.
        result.geoObjects.options.set('preset', 'islands#redCircleIcon');
        result.geoObjects.get(0).properties.set({
            balloonContentBody: 'Мое местоположение'
        });
        myMap.geoObjects.add(result.geoObjects);
    });

    geolocation.get({
        provider: 'browser',
        mapStateAutoApply: true
    }).then(function (result) {
        // Синим цветом пометим положение, полученное через браузер.
        // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
        result.geoObjects.options.set('preset', 'islands#blueCircleIcon');
        myMap.geoObjects.add(result.geoObjects);
    });

// Создадим и добавим на карту поведение, при котором
// при щелчке на карте происходит ее центрирование по месту клика.
// Для этого создадим класс MyBehavior и определим его свойства и методы
function MyBehavior() {
    // Определим свойства класса
    this.options = new ymaps.option.Manager(); // Менеджер опций
    this.events = new ymaps.event.Manager(); // Менеджер событий
}

// Определим методы
MyBehavior.prototype = {
    constructor: MyBehavior,
    // Когда поведение будет включено, добавится событие щелчка на карту
    enable: function () {
        /* this._parent - родителем для поведения является менеджер поведений;
           this._parent.getMap() - получаем ссылку на карту;
           this._parent.getMap().events.add - добавляем слушатель события на карту. */
        this._parent.getMap().geoObjects.events.add('click', this._onClick, this);
    },
    disable: function () {
        this._parent.getMap().events.remove('click', this._onClick, this);
    },
    // Устанавливает родителя для исходного поведения
    setParent: function (parent) { this._parent = parent; },
    // Получает родителя
    getParent: function () { return this._parent; },
    _onClick: function (e) {

        var coords = e.get('coords');
        document.getElementById('geoid').value = coords;

    }
};

// Помещаем созданный класс в хранилище поведений. Далее данное поведение будет доступно по ключу 'mybehavior'.
ymaps.behavior.storage.add('mybehavior', MyBehavior);
// Включаем поведение
myMap.behaviors.enable('mybehavior');


}