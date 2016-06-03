//CHAT
$(document).ready(function() {
    var interval = setInterval(function () {
        $.ajax({
            url: $('.chat-container').data('url'),
            type: 'post',
            success: function(data) {
                var chat = $('.chat-container');
                chat.append(data);
                if(chat.scrollTop() > chat[0].scrollHeight - 800){
                    chat.scrollTop(chat[0].scrollHeight);
                }

                setTimeout(function () {
                    $('.msg-text').removeClass('new');
                }, 5000);
            },
            error: function(){

            }
        });
    }, 2000);


    $(document).on("beforeSubmit", "#msg-form", function () {
        var form = $(this);

        if(form.find('.has-error').length) {
            return false;
        }

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function(data) {

            },
            error: function(){

            }
        });
        $('#msg-text').val('');
        return false;
    });
});
