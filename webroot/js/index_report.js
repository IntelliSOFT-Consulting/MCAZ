$(function () { 
    // Get the CSV and create the chart
    /*var myChart = Highcharts.chart('sadrs-index', {
        chart: {
                type: 'column'
            },
            title: {
                text: "ADR by provinces"
            },
            series: [{
                data: [{
                    name: "Harare",
                    y: 1
                }, {
                    name: "May",
                    y: 2
                }, {
                    name: "Jun",
                    y: 3
                }]//,
                //"name": "Provinces"
            }],
            xAxis: {
                type: 'category',
                // Explicit values could also define order?
                //categories : ["Jun", "Apr", "May"]
            }
    });*/
    //console.info('ready.. steady...');
    
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

    function totalAMR(data, loc){

        var myChart =Highcharts.chart(loc, {
            chart: {
                type: 'column'
            },
            title: {
                text: data.title
            },
            xAxis: {
                categories: data.columns,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cases'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    data: data.data, //$.map(data.data, function(el) { return el }),//data.data,
                    name: data.title
                }],
        });
    }

    $.ajax({
        url: '/reports/sadrs-per-province.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'sadrs-index', "Provinces");
        }
    });
    $.ajax({
        url: '/reports/sadrs-per-causality.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            pieChart(data, 'sadrs-causality', "By Causality Assessment");
        }
    });
    $.ajax({
        url: '/reports/aefis-per-province.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'aefis-index', "Provinces");
        }
    });
    $.ajax({
        url: '/reports/saefis-per-month.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'saefis-index', 'Months');
        }
    });
    $.ajax({
        url: '/reports/adrs-per-month.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'adrs-index', 'Months');
        }
    });
    $.ajax({
        url: '/reports/total.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            totalAMR(data, 'total-index');
        }
    });

    $.ajax({
        url: '/reports/hospitalizations-per-year.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            totalAMR(data,'hopitalization-index');
        }
    });


     $.ajax({
        url: '/reports/deaths-per-year.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            totalAMR(data,'death-index');
        }
    });

   
     $.ajax({
        url: '/reports/adr-per-facility.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            totalAMR(data,'adr-facilities');
        }
    });
});