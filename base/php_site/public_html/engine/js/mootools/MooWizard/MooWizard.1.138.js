/*******
 * @Class MooWizard
 * @Author Pavel Osipov
 * @Created 2010.03.19
 * @Purpose Class for storing/managibg and presenting Wizard based on form
 * @requires MooTools v 1.2
 *
 *
 */

function MooWizard(){

  var settingsObj;  //SETTINGS HOLDER

  var formObj;  //HTMLFormObjest
  var formCopy;  //Cloned FORM copy
  var wizard_container;  //holder container for whole Wizard
  var steps_holder;  //SPAN with all steps
  var curPagesArr;  //array with all DIV's with pages  
  var curStepsArr;  //array with all steps SPAN elements

  var btnToNext,btnToPrew;//button objects

  var nextBtnSimpleOnClickHolder;
  //will store simple onclick function for "Next" button
  //it will be updated, when "Finish" button appear, but can be possible
  //switch it back
  var initOnClickPrev, initOnClickNext;

  //*******If NEXT/PREW/FINISH buttons is not text, but images
  //when info about it will be stored in this variables
  var use_arrows_images = true;  //boolean
  var previews_arrow_img_src = '';
  var next_arrow_img_src = '';
  var finish_arrow_img_src = '';

  //***********MAP VARIABLES
  //          var latlng = false;
  //          var mapHolder = null;
  //          var myOptions = null;
  //          var map = null;
  //          var marker = null;
  //          var coord_lat_holder = 0;
  //          var coord_lng_holder = 0;
  //***********MAP VARIABLES

  var pageIndex = -1;//currently showing page number


  this.init_me = function(optionsHolder){

    //    pageIndex = -1;

    if(!this.settingsObj){
      //only one time

      this.settingsObj = optionsHolder;//saving initial settings
      this.formObj = $(optionsHolder.target_form_id);
      this.wizard_container = $(optionsHolder.wizard_container);
      //      this.steps_holder = $(optionsHolder.wizard_steps_holder);
      this.formCopy = this.formObj.clone(true,true);      
      //this.formCopy.id = this.settingsObj.target_form_id + "_cloned_copy";

      //********Arrows initializing
      use_arrows_images = optionsHolder.use_arrows_images;//use arrows as buttons with ext or images
    
      //getting correct buttons pointers, to not from initial form, but to copied items
      //      alert( this.formCopy.innerHTML );
      var tmp = this.formCopy.getChildren('span');
      var arrowsArr;
      if( use_arrows_images ){
        arrowsArr = tmp[ 0 ].getChildren('img');
      }else{
        arrowsArr = tmp[ 0 ].getChildren('input');
      }


      var pid = this.settingsObj.p_btn_id;
      var nid = this.settingsObj.n_btn_id;

      var l = arrowsArr.length;
      for(var j = 0; j < l; j++){
        //taking arrows holders elements from copied form
          
        var item = arrowsArr[ j ];
        if(item.get('id') == pid){
          this.btnToPrew = item;
        }
        if(item.get('id') == nid){
          this.btnToNext = item;
        }

      }


      this.initOnClickPrev = this.btnToPrew.onclick;  //saving click event listeners
      this.initOnClickNext = this.btnToNext.onclick;
      
      if( use_arrows_images ){
        //init images arrows        
        previews_arrow_img_src = optionsHolder.previews_arrow_img_src;
        next_arrow_img_src = optionsHolder.next_arrow_img_src;
        finish_arrow_img_src = optionsHolder.finish_arrow_img_src;

        this.btnToPrew.setProperty( 'src', previews_arrow_img_src );
        this.btnToNext.setProperty( 'src', next_arrow_img_src );
      }else{
        this.btnToPrew.setProperty( 'value', this.settingsObj.p_btn_text );
        this.btnToNext.setProperty( 'value', this.settingsObj.n_btn_text );
      }
      this.nextBtnSimpleOnClickHolder = this.btnToNext.onclick;
    //********Arrows initializing

    }    
  }

  this.injectForm = function(){
    //injecting form into target object and showing first page
    if(this.formObj != null && this.wizard_container != null){

      //clear all possible previewsly added forms
      this.wizard_container.empty();
      pageIndex = -1;

      //injecting form copy into wizard holder
      //      var formCopy = this.formObj.clone();
      this.formCopy.inject(this.wizard_container);

      //making it visible
      this.formCopy.setStyle('display','inline');
      

      //coping all pages holders into inside array
      this.curPagesArr = this.formCopy.getChildren('div');


      //getting steps holder element, only he is in ---***FIRST SPAN TAG***---
      var stepsHoldersArr = this.formCopy.getChildren('span');
      this.steps_holder = stepsHoldersArr[ 1 ];
      this.initStepsHolder();  //make stepsHolder visible

      //      alert('Set back initial onclicks: '+curIndex);
      //making NEXT/PREW buttons to default actions
      this.btnToPrew.onclick = this.initOnClickPrev;
      this.btnToNext.onclick = this.initOnClickNext;



      //showing first page
      this.hideAll();
      this.showNext();
      this.injectMap();      

    }else{
      alert('Wrong form ID received. MooWizard.class not initialized')
    }
  
  }



  this.rebuildButtons = function(){
    //rebuilds buttons statuses after every page switches

    this.btnToPrew.disabled = ( pageIndex == 0 );
    if(this.btnToPrew.disabled){
      //also make button image half visible
      this.btnToPrew.fade(0.5);
    }else{
      this.btnToPrew.fade(1);
    }

    //    alert(pageIndex);
    //    alert(this.curPagesArr.length);
    if(pageIndex == this.curPagesArr.length - 1){
      //              alert('Set NEXT button to FINISH');
      if( !use_arrows_images ){
        //if use text buttons, switch text
        this.btnToNext.setProperty( 'value', this.settingsObj.finish_btn_text );
      }else{
        //if use image buttons, switch src
        //        alert('New src to'+this.btnToNext+' will be '+finish_arrow_img_src);
        this.btnToNext.setProperty( 'src', finish_arrow_img_src );
      }

      if(this.settingsObj.ajax_submit){
        
        var callContent = "err=mooWizard.checkPageFields("+pageIndex+").trim();if(err){alert(err);return;} mooWizard.ajax_submit_form( '" + this.settingsObj.target_form_id + "',' tab6.parseLoginResponse(responseText) '  );";


        //For making possible call different functions with submit target form answer

        //            alert( this.settingsObj.oncompleteIndex );

        switch(this.settingsObj.oncompleteIndex){
          case 1:
            // ADD NEW SHN/SHC public Wizard
            // and load answer into current Wizard div. In answer presented form with two buttons
            // Enter to shopping panel. and Promote you shops now.
            // If press to 1, login
            // If press to 2, load 'Geo advertisment statuss Wizard'
            //              callContent = "err=mooWizard.checkPageFields("+pageIndex+").trim();if(err){alert(err);return;} mooWizard.ajax_submit_form( '" + this.settingsObj.target_form_id + "',' alert(responseText) '  );";
            //                callContent = "err=mooWizard.checkPageFields("+pageIndex+").trim();if(err){alert(err);return;} mooWizard.ajax_submit_form( '" + this.settingsObj.target_form_id + "',' adv_manager.loadExtensions(true);'  );";
         //callContent = "err=mooWizard.checkPageFields("+pageIndex+").trim();if(err){alert(err);return;} mooWizard.ajax_submit_form( '" + this.settingsObj.target_form_id + "',' adv_manager.loadExtensions(true);engine.uploadDtatAndInnerAnswer($( \"right_content_holder\" ),\""+CUR_BASE+"include/elements/tab7/wizard_pages/public_add_shop_wizard/pubAddShopWizFinishPage.php\",\"\",\"get\",\"\",true);'  );";
            //                alert( CUR_BASE+"include/elements/tab7/wizard_pages/pubAddShopWizFinishPage.php" );

                
                

            break;

          case 2:
            //main SHN admin add offer Wizard
            callContent = "err=mooWizard.checkPageFields("+pageIndex+").trim();if(err){alert(err);return;} mooWizard.ajax_submit_form( '" + this.settingsObj.target_form_id + "',' shcManager.reloadSHNtable(1); '  );";
            break;
          case 3:
            //Public Wizard, show payements
            callContent = "err=mooWizard.checkPageFields("+pageIndex+").trim();if(err){alert(err);return;} mooWizard.ajax_submit_form( '" + this.settingsObj.target_form_id + "',' engine.uploadDtatAndInnerAnswer($( \"right_content_holder\" ),\""+CUR_BASE+"include/elements/tab7/wizard_pages/public_add_shop_wizard/pubAddOffersWizFinishPage.php\",\"\",\"get\",\"\",true);'  );";
            break;
          case 4:
            //main SHN admin add offer Wizard
            callContent = "err=mooWizard.checkPageFields("+pageIndex+").trim();if(err){alert(err);return;} mooWizard.ajax_submit_form( '" + this.settingsObj.target_form_id + "',' shcManager.reloadSHNtable(1); '  );";
            break;
          case 5:
            //Public Wizard, add offer part
            callContent = "err=mooWizard.checkPageFields("+pageIndex+").trim();if(err){alert(err);return;} mooWizard.ajax_submit_form( '" + this.settingsObj.target_form_id + "',' engine.uploadDtatAndInnerAnswer($( \"right_content_holder\" ),\""+CUR_BASE+"include/elements/tab7/wizard_pages/public_add_shop_wizard/pubAddOffersWizFinishPage.php\",\"\",\"get\",\"\",true); '  );";
            break;
          case 6:
            //Public Wizard, add time limited offer part
            callContent = "err=mooWizard.checkPageFields("+pageIndex+").trim();if(err){alert(err);return;} mooWizard.ajax_submit_form( '" + this.settingsObj.target_form_id + "',' engine.uploadDtatAndInnerAnswer($( \"right_content_holder\" ),\""+CUR_BASE+"include/elements/tab7/wizard_pages/public_add_shop_wizard/pubAddOffersWizFinishPage.php\",\"\",\"get\",\"\",true); '  );";
            break;
            
        //            default:
        }

        this.btnToNext.onclick = new Function(callContent);

      }else{
          
//        this.btnToNext.onclick = new Function( "$('" + this.settingsObj.target_form_id + "').submit();");
        this.btnToNext.onclick = new Function( "mooWizard.check_submit_form('" + this.settingsObj.target_form_id + "')" );
            
      }
        
    }else{
      if( !use_arrows_images ){
        this.btnToNext.setProperty( 'value', this.settingsObj.n_btn_text );
      }else{
        this.btnToNext.setProperty( 'src', next_arrow_img_src );
      }
      this.btnToNext.onclick = this.nextBtnSimpleOnClickHolder;
    }

  //    alert(curIndex);
  }

  
  this.initStepsHolder = function(){
    //correct output steps at bottom

    //first get count of steps
    curStepsArr = this.steps_holder.getChildren('span');
    var stepsCnt = curStepsArr.length;
    //    var stepWidth = ( 100 / stepsCnt ) - 2  ;//2 is count of percents for summ of current margin-left and border-width
    //200 --- 3, 400 --- 2, 600 --- and more --> 1
    var percFix;
    var tmpWidth = parseInt( this.wizard_container.getStyle('width') );
    if( tmpWidth >= 200){
      percFix = 2;
    }else{
      percFix = 3;
    }

    var stepWidth = ( 100 / stepsCnt ) - percFix  ;
    
    curStepsArr.each(function(item, index){
      item.setStyle('width',stepWidth+'%');      
    });


    this.steps_holder.setStyle('display','inline');
  }

  this.showNext = function(){
    //making visible next page and invisible previews
    if(!this.curPagesArr){
      return;
    }

    //first check all required fields at this page
    var err = this.checkPageFields( pageIndex ).trim();
    if(err){
      alert(err);
      return;
    }

    
    pageIndex++;


    if(pageIndex == this.curPagesArr.length - 1){
    //      alert('Set NEXT button to FINISH');
    }
    if(pageIndex == this.curPagesArr.length){
      pageIndex--;
      return;
    }
    if(pageIndex == 0){
    //      alert('Set PREVIEWS button to DISABLED');
    }


    this.hideAll();

    //highlite required step
    curStepsArr[ pageIndex ].fade(1);
    //set visible next page
    var tmpDiv = this.curPagesArr[ pageIndex ];//temporal DIV`s holder
    tmpDiv.setStyle('display','inline');

    new Fx.Scroll( $(document.body) ).set(0, 0);



  }

  this.showPreviews = function(){
    //making visible next page and invisible previews

    if(!this.curPagesArr){
      return;
    }

    pageIndex--;

    if(pageIndex == -1){
      pageIndex++;
      return;
    }
    if(pageIndex == 0){
    //      alert('Set PREVIEWS button to DISABLED');
    }


    this.hideAll();

    //highlite required step
    curStepsArr[ pageIndex ].fade(1);
    
    //set visible previews page
    var newDiv = this.curPagesArr[ pageIndex ];//wizard_page_1
    newDiv.setStyle('display','inline');
  }


  this.hideAll = function(){
    //dehighlite all steps
    curStepsArr.each(function(item, index){
      item.fade(0.3);
    });
    //hide all pages
    this.curPagesArr.each(function(item, index){      
      item.setStyle('display','none');      
    });
    //update buttons texts and onclick event action listeners
    this.rebuildButtons();
  }







  this.ajax_submit_form = function(form_id,scriptToEval){
    //submits form without page reloading
    var frmObj	=	$(form_id);

    //alert(form_id+' frmObj: '+frmObj);

    if(frmObj != null){
      //      var errMess = this.checkForm(form_id);

      //      if(errMess == 1){

      //        showLoading(true,frmObj);
      var queryString = frmObj.toQueryString();//mootools function
      //        disableAll(form_id,true);

      if(queryString == ""){
        queryString += 'rnd='+Math.random();
      }else{
        queryString += '&rnd='+Math.random();
      }
      var frmProp = frmObj.getProperties('method','action');
      this.sendDataToScript(frmProp.action,queryString,frmProp.method,scriptToEval);

    }
  }
  this.ajax_check_submit_form = function(
    form_id,
    scriptToEval
    ){

    var chk = this.checkForm(form_id);
    if( chk == 1 ){
      //this.ajax_submit_form( form_id, "$('"+form_id+"').submit();"+scriptToEval );
      eval( "$('"+form_id+"').submit();"+scriptToEval );
    }else{
      alert( chk );
    }    
  }

  this.check_submit_form = function(
    form_id
    ){
    var chk = this.checkForm(form_id);
    if( chk == 1 ){
      $(form_id).submit();
    }else{
      alert( chk );
    }
  }

  this.sendDataToScript = function(path,dataStr,methodName,scriptToEval){
    //into tmpEl will loads data received from
    //path as ansver for dataStr

    if(path){

      new Request.JSON(
      {
        url: path,
        method: methodName,
        data: dataStr,
        //onComplete
        onSuccess: function(responseJSON, responseText){
          if(typeof(scriptToEval) == 'function'){
            scriptToEval.call(null,responseText);
          }else{
            eval(scriptToEval);
          }
        /**/
        //          showLoading(false);
        },
        onFailure: function(){
          alert("Error communicating with server");
        //          showLoading(false);
        }
      }).send();

    }
  }


  this.checkPageFields = function(pageIndex){
    //checking required fields only in one page

    var retErrMess = '';
    if(pageIndex != -1){
      //only if not first page init
      var tmpDiv = this.curPagesArr[ pageIndex ];
      var fieldsToCheck = tmpDiv.getElements('input,select');      

      var l = fieldsToCheck.length;

      for(var z = 0;z < l; z++){        
        retErrMess += this.getFieldInfo( fieldsToCheck[ z ] );        
      }
      
    }
    
    return retErrMess;
  }

  this.checkForm = function(formID){
    /*should be used this custom parametres:
		**
		**req_fld='1'
		**req_type='text/email/digit' defailt text
		**req_mes='E-mail is incorrect'
		/**/

    var frm = $(formID);
    if(frm != null){

      var errMes = 0;
      for(i=0;i< frm.elements.length;i++){
        if(frm.elements[i].type == 'text'){          
          errMes += this.getFieldInfo( frm.elements[i] );
        }
      }

      if(errMes == 0){
        return 1;
      }else{
        return errMes.substring(1);
      }

    }else{
      //can`t find form
      return 'Error';
    }
  }

  this.getFieldInfo = function(fieldObj){
    //private method, checking one field for custom required fields
    /*should be used this custom parametres:
		**
		**req_fld='1'
		**req_type='text/email/digit' defailt text
		**req_mes='E-mail is incorrect'
		/**/    
    try{
      var errMes = '';
      var tmp = fieldObj.getProperties('req_fld','req_type','req_mes');
      if(tmp.req_fld == 1){        
        //if custom param found, need to check this field        
        errMes += this.checkValue(fieldObj,tmp.req_mes,tmp.req_type) + "\n";        
      }
    }catch(er){
      //error in IE, using native DOM methods
      if(fieldObj.attributes[ 'req_fld' ] && fieldObj.attributes[ 'req_fld' ].value == 1){

        var tmpType = 'text';
        if(fieldObj.attributes[ 'req_type' ]){
          tmpType = fieldObj.attributes[ 'req_type' ].value;
        }

        errMes += this.checkValue(
          fieldObj,
          fieldObj.attributes[ 'req_mes' ].value,
          tmpType
          );        
      }/**/
    }
    
    return errMes;
  }


  this.checkValue = function(fld2chk,errMes,fldType){
    //checks value of fld2chk, if type=='email' performs additional
    //checking for email correct sintax
    var retMes	=	"";
    fld2chk = $(fld2chk);//IE needs this wrapper :(


    // For checkboxes
    if(fld2chk.type	== "checkbox"){

      if(!fld2chk.checked){
        retMes = errMes;
      }
      return retMes;
    }

    if(fld2chk.get('tag')	== "select"){
      if(fld2chk.selectedIndex == 0 || fld2chk.value.trim() == ""){
        retMes = errMes;
      }
      return retMes;
    }



    if(fld2chk.value.trim()	==""){
      retMes += errMes;
      fld2chk.removeClass('mainInput');
      fld2chk.addClass('error_style');
    }else{
      if(fldType=="email"){

        //if( !fld2chk.value.trim().test(/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,6}/i)){
        if( !fld2chk.value.trim().test(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/i)){

          retMes += "Entered e-mail address is incorrect\n";
          fld2chk.removeClass('mainInput');
          fld2chk.addClass('error_style');

        }else{
          fld2chk.removeClass('error_style');
          fld2chk.addClass('mainInput');
        }
      }else if(fldType=="date"){

        if( !fld2chk.value.trim().test(/^[0-9]{4,4}\.[0-9]{2,2}\.[0-9]{2,2}$/)){
          //yyyy.mm.dd
          retMes += errMes+"\n";
          fld2chk.removeClass('mainInput');
          fld2chk.addClass('error_style');
        }else{
          fld2chk.removeClass('error_style');
          fld2chk.addClass('mainInput');
        }

      }else if(fldType=="digit"){
        if( !fld2chk.value.trim().test(/^[0-9]{0,50000}$/)){
          retMes += errMes+"\n";
          fld2chk.removeClass('mainInput');
          fld2chk.addClass('error_style');

        }else{
          fld2chk.removeClass('error_style');
          fld2chk.addClass('mainInput');
        }
      }else{
        fld2chk.removeClass('error_style');
        fld2chk.addClass('mainInput');
      }
    }
    return retMes;
  }

  //  this.generatePassword = function(length) {
  //    if(!length || length == undefined){
  //      length = 15;
  //    }
  //    var result = "";
  //    var symbols = "abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ0123456789_.-!@#$%*";
  //    for (var i=0; i<length; i++) {
  //      result += symbols.charAt(Math.floor(Math.random()*symbols.length));
  //    }
  //    return result;
  //  }

  //engine.injectAnswer($('right_content_holder'),'include/elements/tab7/add_you_shop.php','','get','adv_manager.initAddSHNWizard();');


  this.injectMap = function(){
    //injecting map if needed
    //gMap v.3 should be inserted in document 
    /*<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>*/

    if( !this.settingsObj.have_map ){
      return;
    }

    //короче надо карту переинициализировать каждый раз как на этот экран юзер попадает
      
    var mapHolder = $( this.settingsObj.map_holder_div );
    //          mapHolder.setStyle('display','inline');
    //          mapHolder.innerHTML = 'Injecting map here.';

    //    var gMapPageHolder = this.curPagesArr[2];
    //    gMapPageHolder.setStyle('display','inline');

    //    var curSt = gMapPageHolder.getStyles('height','width','overflow','visibility','display','position');
    //    var styles = {
    //      overflow:'visible',
    //      height:'auto',
    //      visibility: 'hidden',
    //      display: 'block',
    //      position:'absolute'
    //    };
    //    gMapPageHolder.setStyles(styles);
    //    this.curPagesArr[2].setStyle('display','inline');
    //    var dimensions = el.getCoordinates();
    //    gMapPageHolder.setStyles(curSt);

    if(!this.settingsObj.init_lat){
      this.settingsObj.init_lat = 56.952230;
      this.settingsObj.init_lng = 24.129238;
    }


    var latlng = new google.maps.LatLng(this.settingsObj.init_lat,this.settingsObj.init_lng);
    var myOptions = {
      zoom: 10,
      center: latlng,
      scrollwheel: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
          
    var map = new google.maps.Map(mapHolder, myOptions);
          
    var marker = new google.maps.Marker({
      draggable:true,
      position: latlng,
      map: map,
      title:'location'
    });

    var coord_lat_holder = $( this.settingsObj.init_lat_holder );
    var coord_lng_holder = $( this.settingsObj.init_lng_holder );



    google.maps.event.addListener(marker, 'dragend',function(event) {
      var newCoord = event.latLng;
      map.setCenter( newCoord );
      marker.setPosition( newCoord );
      coord_lat_holder.value = newCoord.lat().toFixed(7);
      coord_lng_holder.value = newCoord.lng().toFixed(7);
          
    });
    google.maps.event.addListener(map, 'dragend',function() {

      var newCoord = map.center;
      marker.setPosition( newCoord );
      coord_lat_holder.value = newCoord.lat().toFixed(7);
      coord_lng_holder.value = newCoord.lng().toFixed(7);

    });
  /**/
  //      gMapPageHolder.setStyles(curSt);
  //        gMapPageHolder.setStyle('display','none');
  }

 

}
mooWizard = null;
mooWizard = new MooWizard();

