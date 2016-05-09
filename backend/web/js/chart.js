//FLOT
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

$('select').on('change', function(){
    $('#stats-form').submit();
});