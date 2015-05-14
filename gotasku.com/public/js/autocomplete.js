/**
 * Created by Satyanarayan on 16-04-2015.
 */
(function($){
    $.fn.autoComplete = function(options){
        var ele = this;
        var r = null;
        var settings = $.extend({
            purl:'',
            showPopup:true
        },options);

        ele.on('input',function(){
//                $.ajax({async:false});
            if(ele.val().length > 0){
                var dd = null;
                if(!$(document).find('.auto-suggestions').is(':visible')) {
                    dd = $('<div class="auto-suggestions"/>');
                    ele.parent().append(dd);
                }else
                    dd = $('.auto-suggestions');

                var d = '';

                $.post(settings.purl,{s:ele.val()},function(resp){
                    if(resp!=''){
                        var d = resp;

                        if(d!=''){
                            dd.html($(JSON2HTML(d)));
                        }else{
                            dd.remove();
                        }
                    }
                });
                $('.auto-suggestions').css({
                    'left' : ele.position().left,
                    'top'  : ele.position().top + ele.height()
                });
            } else {
                $('.auto-suggestions').remove();
            }
        });
        //ele.on('blur',function(){$('.auto-suggestions').fadeOut();});

        $('.auto-suggestions ul li').on('click',function(){
            alert($(this).attr('id')+'-'+$(this).text());
        });
    };

    function JSON2HTML(JSONData){
        var JSONobj = $.parseJSON(JSONData);
        var l = '';
        if(JSONobj.length>0){
            l = '<ul>';
            for(i=0;i<JSONobj.length;i++){
                var rec = JSONobj[i];
                l = l + '<li id="'+rec.id+'">'+rec.value+'</li>';
            }
            l = l+'</ul>';
        }
        return l;
    }
}(jQuery));