//TINYMCE
tinymce.init({
    selector: ".tinymce",
    forced_root_block: false,
    language: "ru"

});

//DATEPICKER
function datepicker(){
    $('.datepicker').pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy-mm-dd'
    });
}
$(document).ready(function(){
    datepicker();
});

//CONFIRM
$('.btn-danger, .confirm-msg').on('click', function(e){
    if(confirm('Вы точно хотите удалить?')){
        return true;
    }else{
        return false;
    }
});

//MASK
$(document).ready(function(){
    $("#clients-phone").mask("+7 (999) 999-99-99");
});
$(document).ready(function(){
    $('.search-option-checkbox').on('change',function(){
        if(this.checked){
            $("#clients-fullname").mask("+7 (999) 999-99-99");
        }else{
            $("#clients-fullname").mask("");
        }
    });
});

//submit btn disable
$('#clients-form').on('submit', function(e) {
    $('button').prop('disabled', true);
});

//scanner
$('#reception-code').keyup(function() {
    return function() {
        var $this = $(this);
        clearTimeout($this.data('timeout'));
        $this.data('timeout', setTimeout(function(){
            $.get( "index.php?r=orders/update&id=" + $this.val(), function( data ) {
                $('.scanner-header').remove();
                $( ".result" ).html( data );
                datepicker();
            });
        }, 200));
    };
}());

$(document).on("beforeSubmit", "#order-form[ajax=true]", function () {
    var form = $(this);
    if(form.find('.has-error').length) {
        return false;
    }

    $.ajax({
        url: form.attr('action'),
        type: 'post',
        data: form.serialize(),
        success: function(data) {
            document.location.href="index.php?r=reception/index";
        },
        error: function(){
            alert('ошибка');
        }
    });
    return false;
});

$(document).on('click', function(){
    $('#reception-code').focus();
});

//Dynamic form
//DATEPICKER REFRESH
$(".dynamicform_wrapper_ticket").on("afterInsert", function(e, item) {
    $(item).find("textarea").val('');
});

//Accordion
$('body').on('click', '.accordion p', function(){
    $(this).parent().toggleClass('open');
});
