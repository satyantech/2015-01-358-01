/**
 * Created by Satyanarayan on 27-04-2015.
 */

/**
 * Requirements:
 * 1. Jquery Library    > 1.9.0
 * 2. Bootstrap Library > 2
 */

/**
 *
 * @param element                   :- The File Input element id
 * @param url                       :- Url to while file has to be submitted for uploading
 * @param type                      :-(MIME Types) if nothing is given any file can be uploaded, if given then strictly file matching with the type parameter only considered, to check multiple types provide comma seperated values
 * @param progressbar_element       :- if progressbar has to be populate
 * @param progress_percent_element  :- if the % in the progressbar has to be changed
 */
var pgb_ele = null;
var retBase64 = false;
var imgele = false;
var ajax = null;
function init(){
    pgb_ele = null;
    retBase64 = false;
    imgele = false;
    ajax = null;
}
function uploadProfilePic(element, url, type, progressbar_element, returnBase64, imgelement){
    init();
    type = type || null;
    pgb_ele = progressbar_element = progressbar_element || null;
    retBase64 = returnBase64 = returnBase64 || false;
    imgele = imgelement = imgelement || null;

    var file = document.getElementById(element).files[0];
    var formdata = new FormData();
    if(type != null){
        formdata.append('strictly',type);
    }
    if(imgelement!=null){
        formdata.append('returnBase64',true);
    }
    formdata.append("file2upload", file);
    ajax = new XMLHttpRequest();

    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", url);
    ajax.send(formdata);

}

function progressHandler(event){
    var percent = (event.loaded / event.total) * 100;
    if(pgb_ele != null){

        document.getElementById(pgb_ele).style.width = percent;
        //document.getElementById(pgb_ele).innerHTML = percent;

    }

}
function completeHandler(event){
    document.getElementById(pgb_ele).style.width = '100%';
    //document.getElementById(pgb_ele).innerHTML = '100%';
    setTimeout(function(){
        $('#'+pgb_ele).parent().css('visibility','hidden');
    },2000);
    //alert(ajax.response);
    //alert($('#'+imgele).attr('src'));
    if(imgele != null) {
        var json_obj = $.parseJSON(ajax.response);
        //alert(json_obj.response.b64img);
        if (json_obj.response.out == 'Success') {
            //alert(json_obj.response.b64img);
            $('#' + imgele).attr({
                'src': json_obj.response.b64img
            });
        }
    }
}
function errorHandler(event){
    //alert("Upload Failed");
    setTimeout(function(){
        $('#'+pgb_ele).parent().css('visibility','hidden');
    },2000);
}
function abortHandler(event){
    //alert("Upload Aborted");
    setTimeout(function(){
        $('#'+pgb_ele).parent().css('visibility','hidden');
    },2000);
}