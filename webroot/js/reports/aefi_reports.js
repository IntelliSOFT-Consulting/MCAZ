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
        url: '/reports/aefis-per-province.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'aefis-province', "Provinces");
        }
    });

    $.ajax({
        url: '/reports/aefis-per-year.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'aefis-year', "Years");
        }
    });
});