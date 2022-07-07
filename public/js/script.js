$(document).ready(function () {
    $('.my-menu').click(function (e) {
        e.preventDefault();
        if($(this).hasClass('active')){
            $(this).parent().find('.other-um').hide();
            $(this).removeClass('active');
        }else{
            $(this).parent().find('.other-um').show();
            $(this).addClass('active');
        }
    });
});
