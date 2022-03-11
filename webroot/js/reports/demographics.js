$(function () { 

    
    function pieChart(data, loc, dname) {
        // console.log(JSON.stringify(data));        
        var myChart = Highcharts.chart(loc, {
                chart: {                    
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                        type: 'pie'
                },
                title: {
                    text: data.title
                },
                series: [{
                    data: data.data, //$.map(data.data, function(el) { return el }),//data.data,
                    name: dname
                }], 
                xAxis: {
                    type: 'category'
                }
        });
    }

    $.ajax({
        url: '/reports/gender-reports.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            pieChart(data, 'gender-index', "Gender Demographics");
        }
    });


    $.ajax({
        url: '/reports/age-reports.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            pieChart(data, 'age-index', "Age Demographics");
        }
    });

});