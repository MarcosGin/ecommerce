
function Notify(text, callback, close_callback, style) {

    var time = '10000';
    var $container = $('#notifications');
    var icon = '<i class="fa fa-info-circle "></i>';

    if( style === 'primary'){
        icon = '<i class="fa fa-bookmark "></i>';
    }

    if( style === 'info'){
        icon = '<i class="fa fa-info-circle "></i>';
    }

    if( style === 'success'){
        icon = '<i class="fa fa-check-circle "></i>';
    }

    if( style === 'warning'){
        icon = '<i class="fa fa-exclamation-circle "></i>';
    }

    if( style === 'danger'){
        icon = '<i class="fa fa-exclamation-triangle "></i>';
    }

    if (typeof style === 'undefined' ) {style = 'warning';}

    var html = $('<div class="alert alert-' + style + '  hide">' + icon +  " " + text + '</div>');

    $('<a>',{
        text: 'x',
        class: 'buttom close',
        style: '',
        href: 'javascript:void(0)',
        click: function(e){
            e.preventDefault()
            close_callback && close_callback()
            remove_notice()
        }
    }).appendTo(html);

    $container.prepend(html);
    html.removeClass('hide').hide().fadeIn('slow')

    function remove_notice() {
        html.stop().fadeOut('slow').remove()
    }

    var timer =  setInterval(remove_notice, time);

    $(html).hover(function(){
        clearInterval(timer);
    }, function(){
        timer = setInterval(remove_notice, time);
    });

    html.on('click', function () {
        clearInterval(timer)
        callback && callback()
        remove_notice()
    });


};