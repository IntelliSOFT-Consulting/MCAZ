$(function () {
    function pieChart(data, loc, dname) {
        // console.log(JSON.stringify(data));
        var myChart = Highcharts.chart(loc, {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: "pie",
            },
            title: {
                text: data.title,
            },
            series: [
                {
                    data: data.data, //$.map(data.data, function(el) { return el }),//data.data,
                    name: dname,
                },
            ],
            xAxis: {
                type: "category",
            },
        });
    }

    function sadrChart(data, loc, dname) {
        // console.log(JSON.stringify(data));
        var myChart = Highcharts.chart(loc, {
            chart: {
                type: "column",
            },
            title: {
                text: data.title,
            },
            series: [
                {
                    data: data.data, //$.map(data.data, function(el) { return el }),//data.data,
                    name: dname,
                },
            ],
            xAxis: {
                type: "category",
            },
        });
    }

    $.ajax({
        url: "/reports/sadrs-per-designation.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "sadrs-index", "Designations");
        },
    });
    $.ajax({
        url: "/reports/aefis-per-designation.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "aefis-index", "Designations");
        },
    });
    $.ajax({
        url: "/reports/adrs-per-designation.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "adrs-index", "Designations");
        },
    });
    $.ajax({
        url: "/reports/saefis-per-designation.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "saefis-index", "Designations");
        },
    });

    // Added

    $.ajax({
        url: "/reports/per-year.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "year-index", "Reports By Year");
        },
    });

    $.ajax({
        url: "/reports/per-month.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "month-index", "Reports By Month");
        },
    });

    $.ajax({
        url: "/reports/per-province.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "province-index", "Reports By Province");
        },
    });

    $.ajax({
        url: "/reports/per-institution.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "institution-index", "Reports By Institution");
        },
    });

    $.ajax({
        url: "/reports/per-medicine.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "medicine-index", "Reports By Medicine");
        },
    });
});
