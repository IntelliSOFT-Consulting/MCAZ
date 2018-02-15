$(function () { 


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
        url: '/reports/death-adr.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            totalAMR(data,'death-adr');
        }
    });

       $.ajax({
        url: '/reports/death-sae.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            totalAMR(data,'death-sae');
        }
    });


     $.ajax({
        url: '/reports/death-aefi.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            totalAMR(data,'death-aefi');
        }
    });

});