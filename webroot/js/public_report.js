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
        url: '/reports/sadrs-per-designation.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'sadrs-index', "Designations");
        }
    });
    $.ajax({
        url: '/reports/aefis-per-designation.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'aefis-index', "Designations");
        }
    });
    $.ajax({
        url: '/reports/adrs-per-designation.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'adrs-index', "Designations");
        }
    });
    $.ajax({
        url: '/reports/saefis-per-designation.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'saefis-index', "Designations");
        }
    });
    
});