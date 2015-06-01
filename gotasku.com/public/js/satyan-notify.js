/**
 * Created by Satyanarayan on 25-05-2015.
 */

$.fn.jobNotify = function(url,container,link){
    var ele = $(this);
    $.post(url,{},function(resp){
        try{
           var jsonData = $.parseJSON(resp);
           //alert(jsonData.response.records.length);
           if(jsonData.response.records.length > 0){
               var list = $('<div></div>');
               $.each(jsonData.response.records,function(){
                   //var row = $('<div class="row notification"><div class="col-lg-1 noti-image"><i class="fa fa-envelope"></i></div><div class="col-lg-10 col-lg-offset-1 noti-text"><a href="javascript:void(0);" lnk="'+link+'?j='+this.JOB_ID+'" class="job-noti-lnk" id='+this.JOB_ID+'><span class="label label-info" data-toggle="tooltip" title="Posted On">'+this.POSTED_ON+'</span> | <span class="label label-danger" data-toggle="tooltip" title="Last Date of Application">'+this.LAST_DATE+'</span><br/><span class="job-noti-title">'+this.JOB_TITLE+'</span></a></div></div>');
                   var row = $('<li class="list-group-item"><a href="javascript:void(0);" lnk="'+link+'?j='+this.JOB_ID+'" class="job-noti-lnk" id='+this.JOB_ID+'>'+
                   '<span class="date label label-default" title="Posted On">'+this.POSTED_ON+'</span> <span class="date label label-default" title="Last date to apply">'+this.LAST_DATE+'</span><br/>'+
                   '<span class="noti-title-text">'+this.JOB_TITLE+'</span>'+
                   '</a></li>');
                   list.append(row);
               });
               $(container).html(list.html());
               $(container).find('.job-noti-lnk').on('click',function(){
                   var u = $(this).attr('lnk');
                   var job_id = $(this).attr('id');

                   var title = $(this).find('.noti-title-text').text();
                   $.get(u,{},function(resp){
                       var msgBody = $('<div class="container-fluid job-desc-msg-body">'+resp+'</div>')
                       bootbox.dialog({
                           title:title,
                           message:msgBody,
                           buttons:{
                               success:{
                                   label:'<i class="fa fa-check"></i> Apply',
                                   className:'btn-info btn-apply',
                                   callback:function(){
                                       $.post('http://localhost/gotasku/gotasku.com/profile/applyforjob/',{'rid':job_id},function(res){
                                           try {
                                               var json_data = $.parseJSON(res);
                                               if(json_data.response.code=='0x0000'){
                                                   msgBody.html('<div class="alert alert-success">You have successfully applied for the job!</div>');
                                                   $('.btn-apply,.btn-cancel,.btn-refresh').hide();

                                                   var spin = $('<i class="fa fa-spinner fa-spin"></i>');
                                                   $('.modal-footer').html(spin);
                                                   setTimeout(function(){window.location=window.location;},2000);
                                               }else{
                                                   bootbox.alert('Error while submitting Application for the job.'+json_data.response.resp_msg);
                                               }
                                           }catch(err){bootbox.alert('&raquo; Error while submitting Application for the job.'+err.message);}
                                       });
                                       return false;
                                   }
                               },
                               'cancel':{
                                   label:'<i class="fa fa-times"></i> Cancel',
                                   className:'btn-default btn-cancel',
                                   callback:function(){}
                               },
                               'refresh':{
                                   label:'<i class="fa fa-refresh"></i> Refresh',
                                   className:'btn-success btn-refresh',
                                   callback:function(){
                                       $('.fa-refresh').addClass('fa-spin');
                                       $.get(u,{},function(r) {
                                           msgBody.html(r);
                                           $('.fa-refresh').removeClass('fa-spin');
                                       });
                                       return false;
                                   }
                               }
                           }
                       });
                   });
               });
               ele.css('color','red');
           }
       } catch(err){
           console.log(err.message);
       }
    });
};

$.fn.applicationNotify = function(url,container,target_url){
    var ele = $(this);
    $.post(url,{},function(resp){
        try{
            var json_data = $.parseJSON(resp);
            if(json_data.response.code == '0x0000'){
                if(json_data.response.records.length > 0) {
                    var list = $('<div><ul class="list-group"></ul></div>');
                    $.each(json_data.response.records, function () {
                        var row = $('<li class="list-group-item"><span class="badge">'+this.CNT+'</span><a href="'+target_url+'?j='+this.JOB_ID+'">'+this.JOB_TITLE+'</a></li>');
                        list.find('ul.list-group').append(row);
                    });
                    $(container).html(list.html());
                    ele.css('color','red');
                }
                else{
                    $(container).hide();
                }
            }else{
                $(container).hide();
            }
        }catch(err){bootbox.alert('exception: '+err.message);}
    });
};