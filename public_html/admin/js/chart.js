//FLOT
/**
$(function() {

    for (var i = 0; i < data.length; ++i) {
        data[i][0] += 60 * 60 * 1000;
    }

    function weekendAreas(axes) {

        var markings = [],
            d = new Date(axes.xaxis.min);

        // go to the first Saturday

        d.setUTCDate(d.getUTCDate() - ((d.getUTCDay() + 1) % 7))
        d.setUTCSeconds(0);
        d.setUTCMinutes(0);
        d.setUTCHours(0);

        var i = d.getTime();

        // when we don't set yaxis, the rectangle automatically
        // extends to infinity upwards and downwards

        do {
            markings.push({ xaxis: { from: i, to: i + 1 * 24 * 60 * 60 * 1000 } });
            i += 7 * 24 * 60 * 60 * 1000;
        } while (i < axes.xaxis.max);

        return markings;
    }

    function dateParse(data){
        var months = ['Января','Февраля','Марта','Апреля','Мая','Июня','Июля','Августа','Сентября','Октября','Ноября','Декабря'];
        var date = new Date(data);
        var day = date.getDate();
        var month = months[date.getMonth()];
        var year = date.getFullYear();
        var formattedTime = day + ' ' + month + ' ' + year;
        return formattedTime;
    }

    $.plot("#placeholder", [ data ]);
    var plot = $.plot("#placeholder", [
        {
            data: data,
            label: label
        }
    ], {
        series: {
            lines: {
                show: true,
                fill: true
            },
            points: {
                show: true
            },
            bars: {
                show: true,
                lineWidth: 5
            }
        },
        grid: {
            hoverable: true,
            clickable: true,
            markings: weekendAreas
        },
        xaxis: {
            mode: "time",
            timeformat: "%d.%m.%Y",
            minTickSize: [1, "day"],
            tickDecimals: 0,
            zoomRange: true,
            panRange: true
        },
        yaxis: {
            min: 0,
            tickDecimals: 0,
            zoomRange: false,
            panRange: [0, 10000000]
        },
        zoom: {
            interactive: true
        },
        pan: {
            interactive: true
        }
    });

    $("<div id='tooltip'></div>").css({
        position: "absolute",
        display: "none",
        border: "1px solid #fdd",
        padding: "2px",
        "background-color": "#fee",
        opacity: 0.80
    }).appendTo("body");

    $("#placeholder").bind("plothover", function (event, pos, item) {
        if (item) {
            var x = dateParse(item.datapoint[0]),
                y = item.datapoint[1].toFixed();

            $("#tooltip").html(item.series.label + " на " + x + " = " + y)
                .css({top: item.pageY+5, left: item.pageX+5})
                .fadeIn(200);
        } else {
            $("#tooltip").hide();
        }
    });
});
**/
$('select').on('change', function(){
    $('#stats-form').submit();
});

//NEW CHART
$(function () {

    Highcharts.setOptions({
        lang: {
            loading: 'Загрузка...',
            months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            weekdays: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
            shortMonths: ['Янв', 'Фев', 'Март', 'Апр', 'Май', 'Июнь', 'Июль', 'Авг', 'Сент', 'Окт', 'Нояб', 'Дек'],
            exportButtonTitle: "Экспорт",
            printButtonTitle: "Печать",
            rangeSelectorFrom: "С",
            rangeSelectorTo: "По",
            rangeSelectorZoom: "Период",
            downloadPNG: 'Скачать PNG',
            downloadJPEG: 'Скачать JPEG',
            downloadPDF: 'Скачать PDF',
            downloadSVG: 'Скачать SVG',
            printChart: 'Напечатать график'
        }
    });

    var chart = new Highcharts.StockChart({
        numberFormat : 'decimalPoint',
        chart: {
            renderTo: 'highchart-container',
            alignTicks: false,
        },

        rangeSelector: {
            selected: 5
        },

        title: {
            //text: 'AAPL Stock Volume'
        },
        
        series: [{
            type: 'column',
            name: 'Значение',
            data: data,
            dataGrouping: {
                units: [
                    [
                        'day',
                        [1]
                    ]
                ]
            }
        },{
            type: 'column',
            name: 'Расходы',
            data: data,
            dataGrouping: {
                units: [
                    [
                        'day',
                        [1]
                    ]
                ]
            }
        }]
    });

    var chart = $('#highchart-container').highcharts();

    $('input[name="chart-type"]').on('change', function () {
        var val = $(this).data('value');
        chart.series[0].update({
            type : val
        });
        chart.series[1].update({
            type : val
        });
    });

    $('input[name="chart-aprox"]').on('change', function () {
        var val = $(this).data('value');
        chart.series[0].update({
            dataGrouping:{
                units: [
                    [val, [1]]
                ]
            }
        });
        chart.series[1].update({
            dataGrouping:{
                units: [
                    [val, [1]]
                ]
            }
        });
    });
});
