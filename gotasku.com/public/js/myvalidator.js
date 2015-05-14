/**
 * Created by Satyanarayan on 22-04-2015.
 */

$('.cellphone').keypress(function(e){
    var a = [];
    var k = e.which;

    var maxlength = $(this).attr('maxlength');

    for (i = 48; i < 58; i++) {
        if(maxlength!='' || maxlength != typeof undefined){
            if(maxlength != typeof NaN){
                if($(this).val().length <= maxlength-1){
                    a.push(i);
                }
            }
        }else{
            a.push(i);
        }
    }
    if (!(a.indexOf(k)>=0))
        e.preventDefault();

});
function validateForm(id) {
    var isValid = false;
    $('#'+id+' input[required="required"]:visible').each(function () {
        if ($.trim($(this).val()).length == 0) {
            msg($(this).attr('name') + ' is required to be filled');
            isValid = false;
            return false;
        }else{
            if($(this).prop('type')=="email"){
                    if(IsEmail($(this).val())){
                        isValid = true;
                    }else{
                        msg('Invalid Email ID');
                        isValid = false;
                        return false;
                    }
            }else {
                isValid = true;
            }
        }

    });
    return isValid;
}
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function isFormValid() {
    isValid = true;
    $('.validate').each(function(){
        //if the control is a select box
        if ($(this).prop('tagName').toLowerCase() == 'select' && $(this).hasClass('req')) {
            if ($(this).val() <= 0) {
                alert('Must select a value for ' + $(this).attr('caption'));
                $(this).focus();
                return isValid=false;
            }
        }
        //if the control is a check box
        if ($(this).prop('type').toLowerCase() == 'checkbox' && $(this).hasClass('req')) {
            if (!$(this).is(':checked')) {
                alert('Please select ' + $(this).attr('caption'));
                $(this).focus();
                return isValid=false;
            }
        }
        //if it is input with required class
        if ($.trim($(this).val()) == '' && $(this).hasClass('req')) {
            alert('Must enter some value for ' + $(this).attr('caption'));
            $(this).focus();
            return isValid=false;
        }
        //if email field
        if($(this).hasClass('email')){
            if(!IsEmail($(this).val())){
                alert('Invalid '+$(this).attr('caption'));
                $(this).focus().val('');
                return isValid=false;
            }
        }
    });
    return isValid;
}


//Where ever counter needs to be applied
$('.validate.count').on('input',function(){
    //alert($('.counter[countfor="'+$(this).attr('id')+'"]').text());
    $('.counter[countfor="'+$(this).attr('id')+'"]').text($(this).val().length +'/'+$(this).attr('maxlength'));
});

$('.validate.count').each(function(){
    //alert($('.counter[countfor="'+$(this).attr('id')+'"]').text());
    $('.counter[countfor="'+$(this).attr('id')+'"]').text($(this).val().length +'/'+$(this).attr('maxlength'));
});

