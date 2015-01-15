
AddToCart = window.AddToCart || function(selector, id, title){
   mw.cart.add(selector, id, function(){
     if(document.getElementById('AddToCartModal') === null){
       AddToCartModal = mw.modal({
          content:AddToCartModalContent(title),
          template:'mw_modal_basic',
          name:"AddToCartModal",
          width:400,
          height:200
       });
     }
     else{
       AddToCartModal.container.innerHTML = AddToCartModalContent(title);
     }
   });
}


EqualHeight = function(selector){
  var max = 0, all = mw.$(selector), l = all.length, i = 0, j = 0;
  for( ; i < l ; i++){ var max = all[i].offsetHeight > max ? all[i].offsetHeight : max; }
  for( ; j < l ; j++){ all[j].style.minHeight =  max + 'px'; }
}

window.mw.iconSelector = window.mw.iconSelector || {
    _string:'',
    _activeElement:null,
    popup:function(){
        if(mw.iconSelector._string == ''){
               var uicss = mwd.querySelector('link[href*="/ui.css"]').sheet.cssRules, l = uicss.length, i = 0, html='';
               for( ; i<l ;i++){
                  var sel = uicss[i].selectorText;
                  if(!!sel && sel.indexOf('.mw-icon-') === 0){
                      var cls = sel.replace(".", '').split(':')[0];
                      html +='<li onclick="mw.iconSelector.select(\''+cls+'\')"><span class="'+cls+'"></span></li>';
                  }
               }
               mw.iconSelector._string = '<ul class="mw-icon-selector">'+html+'</ul>';
               mw.iconSelectorToolTip = mw.tooltip({
                  content:mw.iconSelector._string,
                  element:mw.iconSelector._activeElement,
                  position:'top-center'
              });
        }
        else{
          $(mw.iconSelectorToolTip).show();
          mw.tools.tooltip.setPosition(mw.iconSelectorToolTip, mw.iconSelector._activeElement, 'top-center');
        }
    },
    select:function(icon){
        if(mw.iconSelector._activeElement !== null && typeof mw.iconSelector._activeElement !== 'undefined'){
            mw.tools.classNamespaceDelete(mw.iconSelector._activeElement, 'mw-icon-');
            mw.$(mw.iconSelector._activeElement).addClass('mw-icon-changeble ' + icon);
        }
        $(mw.firstParentWithClass(mw.iconSelector._activeElement, 'edit')).addClass('changed');
        mw.iconSelector._activeElement = null;
        $(mw.iconSelectorToolTip).hide();
    },
    hide:function(){
        if(mw.iconSelector._string != ''){
            $(mw.iconSelectorToolTip).hide();
        }
    }
}





$(document).ready(function(){


    $(window).bind('load', function(){
       var slider = $('#homeslider .magic-slider')[0];
       if(typeof slider !== 'undefined'){
         $(window).bind('scroll', function(){
            if($(window).scrollTop() > 0){
                slider.magicSlider.stopAutorotate()
            }
            else{
              slider.magicSlider.autoRotate();
            }
         });
       }
       mw.onLive(function(){
          $(document.body).click(function(e){
            if(mw.tools.hasClass(e.target, "mw-icon-changeble")){
                mw.iconSelector._activeElement = e.target;
                mw.iconSelector.popup();
            }
            else if(mw.tools.hasParentsWithClass(e.target, "mw-icon-changeble")){
                mw.iconSelector._activeElement = e.target;
                mw.iconSelector.popup();
            }
            else{
               mw.iconSelector.hide()
            }

          });
        });
    });

    $(".menu-button").bind('click', function(){
        $(this).toggleClass('active');
    });

    $(document.body).bind('mousedown', function(e){
        if(!mw.tools.hasParentsWithClass(e.target, 'header-menu')){
            $('.menu-button.active').removeClass('active');
        }
    })

});