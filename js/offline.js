$(function(){

    var 
        $online = $('.online'),
        $offline = $('.offline');

    Offline.on('confirmed-down', function () {
        $online.fadeOut(function () {
            $offline.fadeIn();
        });
    });

    Offline.on('confirmed-up', function () {
        $offline.fadeOut(function () {
            $online.fadeIn();
        });
    });

});
