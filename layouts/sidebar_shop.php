<div class="edit" field="shopsidebar" rel="global" id="shopsidebar">

  <module type="categories" id="shop-categories" template="default" content_id="<?php print PAGE_ID; ?>">

  <script>
    var html = '<option value="javascript:;">Categories</option>',
        item = document.getElementById('shop-categories'),
        items = item.getElementsByTagName('a'),
        l = items.length,
        i = 0;
        select = document.createElement('select');
    for( ; i<l; i++){
        html+='<option value="'+items[i].href+'">'+items[i].innerHTML+'</option>';
    }
    select.className = 'mw-ui-field mw-ui-field-big w100';
    select.id = 'shop-categories-select';
    select.onchange = function(){
      window.location.href = this.value;
    }
    select.innerHTML = html;
    item.appendChild(select);

    <?php if(!in_live_edit()){ ?>

    $(document).ready(function(){

        $(window).bind('load scroll resize', function(){
            var wh = $(window).height(),
                header_height = mw.$("#header-holder").height(),
                sd = mw.$('#blog-sidebar'),
                sidebarheight = sd.height(),
                scrolltopt = $(window).scrollTop(), offset_top = sd.offset().top;
                var item = document.getElementById('blog-sidebar-box');
            if(scrolltopt > offset_top - header_height && $(item).height() < 650){

                mw.tools.addClass(item, 'fixed');
                item.style.top = scrolltopt - offset_top +header_height +'px';
                item.style.width = sd.width() +'px';
            }
            else{

               mw.tools.removeClass(item, 'fixed');
               item.style.top = '0';
                item.style.width = 'auto';
            }

        });
    });

    <?php } ?>
  </script>



</div>
