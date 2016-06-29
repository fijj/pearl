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

$(document).on('click', function(){
    $('#reception-code').focus();
});

//Dynamic form
//DATEPICKER REFRESH
$(".dynamicform_wrapper_ticket").on("afterInsert", function(e, item) {
    $(item).find("textarea").val('');
    counter();
    chekBoxStyle();
});

//Notificaton
setInterval(function () {
    if(document.location.search != '?r=site%2Flogin') {
        $.post("index.php?r=dialog/dialog/notification", function (data) {

            if (data.count > 0 && $('.notification-counter').length == 0) {
                $('<span class="label label-danger notification-counter">' + data.count + '</span>').appendTo('.dialog-notification a');
            } else {
                $('.notification-counter').html(data.count);
            }
        }, 'json');
    }
}, 5000);

//Ticket ajax load
$('#orders-typeid').on('change', function(){
    var type = $(this).val();
    $.ajax({
        url: "index.php?r=ticket/create/&type=" + type,
        type: 'get',
        success: function(data) {
            $('.ticket-ajax-load').html(data);

        },
        error: function(){
            alert('ошибка');
        }
    });
});

$(document).on("beforeSubmit", "#order-form", function () {
    var form1 = $(this);
    var form2 = $('#ticket-form');
    if(form1.find('.has-error').length || form2.find('.has-error').length) {
        return false;
    }

    $.ajax({
        url: form1.attr('action'),
        type: 'post',
        data: form1.serialize() +'&'+ form2.serialize(),

        success: function(data) {
            if(xxxAction == 'update'){
                window.location.reload();
            }

            if(xxxAction == 'reception'){
                document.location.href="index.php?r=reception/index";
            }

            if(xxxAction == 'create'){
                document.location.href="index.php?r=orders/update&id=" + data;
            }

        },

        error: function(){
            alert('ошибка');
        }
    });
    return false;
});

//Счетчик квитанций
function counter(){
    var self = $('.numeric');
    var len = self.length;
    for (var i = 0; i < len ; i++){
        $(self[i]).html(i+1);
    }
}

//Аккардион
$('body').on('click', '.collapse-btn', function(){
    $(this).toggleClass('open');
    $(this).parent().parent().toggleClass('open');
});

//Добавления label для чекбокса
function chekBoxStyle(){
    $("input[type='checkbox']").after(function(){
        console.log();
        if($(this).next('label').length == 0){
            return '<label for='+ $(this).attr('id') +' class="css-label">';
        }
    });
}

$(document).ready(function(){
    counter();
    chekBoxStyle();
});