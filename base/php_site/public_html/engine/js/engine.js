function os_engine() {

    curWindowSize = getCurWindowXY();

    this.startupScroll = function () {
        if (!Browser.Engine.trident4) {
            var target_y = $("mainTextSubpost").getCoordinates().height + $("mainTextSubpost").getCoordinates().top - 20;
            // var target_w = 240;

            new Fx.Tween($("blogLnk1"), {
                property: 'top',
                link: 'chain'
            }).start(target_y + 200).start(target_y - 200).start(target_y + 20).start(target_y - 20).start(target_y);

            /**/
            function delayed() {
                new Fx.Tween($("blogLnk2"), {
                    property: 'top',
                    link: 'chain'
                }).start(target_y + 150).start(target_y - 150).start(target_y + 30).start(target_y - 20).start(target_y + 10).start(target_y - 1);
            }

            delayed.delay(1000);
            /**/

            /**
             function delayed2(){
        new Fx.Tween($("blogLnk3"), {
          property: 'top',
          link:'chain'
        }).start(target_y+300).start(target_y-250).start(target_y+140).start(target_y-100).start(target_y+60).start(target_y-30).start(target_y+20);
      }
             delayed2.delay(800);
             /**/

            /**
             function delayed3(){
        new Fx.Tween($("blogLnk4"), {
          property: 'left',
          link:'chain'
        }).start(target_w+150).start(target_w-120).start(target_w+70).start(target_w-30).start(target_w+5).start(target_w-1);
      }
             delayed3.delay(2400);
             /**/

        }
    };

    // this.toggleSliderBlock = function (blockId) {
    //
    //     var togleTarget = $(blockId);
    //     var maxHeight = 200;
    //
    //     if (togleTarget.getStyle('height') == '0px') {
    //         //scroll out
    //         new Fx.Tween(togleTarget, {
    //             property: 'height',
    //             duration: 'short',
    //             link: 'chain'
    //         }).start(0).start(maxHeight);
    //     } else {
    //         //hide block
    //         new Fx.Tween(togleTarget, {
    //             property: 'height',
    //             link: 'chain'
    //         }).start(maxHeight).start(0);
    //     }
    // };
    //
    // this.toggleLeftBlock = function (blockId) {
    //     this.toggleSliderBlock($('news_block'));
    //     this.toggleSliderBlock($('fadback_block'));
    // };
}

main_engine = new os_engine();

function getCurWindowXY() {
    //not needed put this function to engine class

    var retObj = new Object();

    if (window.getHeight() != 0) {
        retObj.h = window.getHeight();
        retObj.w = window.getWidth();
    } else if (document.documentElement.clientHeight != 0) {
        retObj.h = document.documentElement.clientHeight;
        retObj.w = document.documentElement.clientHeight;
    } else if (document.body.clientHeight != 0) {
        retObj.h = document.body.clientHeight;
        retObj.w = document.body.clientWidth;
    }
    return retObj;
}/**/