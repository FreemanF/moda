var siteURL;
$(document).ready(function() {
    // clock
    $('#clock').clock({
        offset: '+3'
    });
    
    // QR code
    $('#qrcode').qrcode({
        text  : siteURL,
        render: "table",
        width : 128,
        height: 128
    });
    
    // log
    $('.widget-latest-users li').each(function () {
        var thisLogName  = $('span', this).attr('data-name');
        var thisLogType  = $('span', this).attr('data-type');
        var thisLogEvent = $('span', this).attr('data-event');
        var thisLogDate  = $('span', this).attr('data-date');
        var tooltipTemp  = $('.widget-tip-template').clone(true, true);

        $('.user-name', tooltipTemp).text(thisLogName);
        $('.user-location', tooltipTemp).text(thisLogEvent);
        $('.user-info', tooltipTemp).html('Объект&nbsp;&nbsp;-&nbsp;&nbsp;'+thisLogType+'<br/>\
                                           Дата&nbsp;&nbsp;-&nbsp;&nbsp;'+thisLogDate);

        $('span', this).tooltip({
            placement: 'top',
            html: true,
            trigger: 'manual',
            title: tooltipTemp.html()
        });
    });

    var hoverUsersTimeout;
    $('.widget-latest-users li').hover(function () {
        if (!$(this).find('.tooltip').length){
            $activeQL = $(this);
            clearTimeout(hoverUsersTimeout);
            hoverUsersTimeout = setTimeout(function() {
                $activeQL.find('span').tooltip('show');
            }, 500);
        }
    }, function () {
        $('.widget-latest-users li').find('span').tooltip('hide');
        clearTimeout(hoverUsersTimeout);
    });
});