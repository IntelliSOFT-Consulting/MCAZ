$(function () { 
    // Get the CSV and create the chart
    
    //console.info('ready.. steady...');
    function sadrChart(data, loc, dname) {
        // console.log(JSON.stringify(data));        
        var myChart = Highcharts.chart(loc, {
                chart: {
                        type: 'column'
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
        url: '/reports/sadrs-per-province.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'sadrs-province', "Provinces");
        }
    });

    $.ajax({
        url: '/reports/sadrs-per-year.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'sadrs-year', "Years");
        }
    });
    
    $.ajax({
        url: '/reports/sadrs-per-causality.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'sadrs-causality', "Causality Assessment");
        }
    });
});