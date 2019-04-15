/**
 * Class to easy manage drop-down elements
 * @Author Pavel Osipov
 *
 * Each drop object initially should have following styles:

  position:absolute;
  top:-310px;
  z-index:3

 *
 */

function MooDroper(){

    this.init = function(){
        selfInstance = this;

/**
 * For each drop object, in this array, should be setted target width to drop him
 */
        this.drop_objects = [];

/**
 * Objects from this array will drops
 */
        this.drop_widths = [];
        this.drop_heights = [];

/**
 * Default delay between drop down blocks if whem more than one
 */
        this.delay_between_drops = 1000;
        this.current_delay = this.delay_between_drops;

    }

    this.add_drop_object = function( div_id, target_w, target_h ){
        this.drop_objects.include( $(div_id) );
        this.drop_widths.include(target_w);
        this.drop_heights.include(target_h);
    }

    this.start_dropping = function(){
        Array.each(this.drop_objects, function(day, index){
            selfInstance.drop_one.delay(selfInstance.current_delay, selfInstance, index);
            selfInstance.current_delay = selfInstance.current_delay + selfInstance.delay_between_drops;
        });
    }

    this.drop_one = function( index ){

      var target_w = selfInstance.drop_widths[ index ];
      var target_y = selfInstance.drop_heights[ index ];


      new Fx.Tween(selfInstance.drop_objects[ index ], {
        property: 'top',
        link:'chain'
      }).start(target_y+200).start(target_y-200).start(target_y+20).start(target_y-20).start(target_y);

    }

}