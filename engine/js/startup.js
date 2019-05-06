window.addEvent('domready', function () {
    goStartup();
});

window.onload = function () {
//Deprecated
}

function goStartup() {
    if ($('pavel_scroll').complete) {
        main_engine.startupScroll();
    } else {
        goStartup.delay(300);
    }
}

//function startHeaderBgScroll(){
////Also should uncomment #animate-area  in main css file
////Script base taken from http://davidwalsh.name/mootools-animate-background
//  var duration = 150000;
//  var length = 1500;
//  var count = 0;
//  var tweener = $('animate-area').set('tween',{ duration: duration, transition: 'linear' });
//  //showtime!
//  var run = function() {
//    tweener.tween('background-position','-' + (++count * length) + 'px 0px');
//  };
//  run();
//  run.periodical(duration);
//
//}