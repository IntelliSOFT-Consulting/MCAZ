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

    // PER YEAR
    $.ajax({
        url: "/reports/sadrs-per-year.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "year-index", "Reports By Year");
        },
    });

    $.ajax({
        url: "/reports/sadrs-per-month.json",
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

    // PER YEAR

    $.ajax({
        url: "/reports/public-aefis-per-year.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "aefis-year", "AEFI Per Year");
        },
    });

    $.ajax({
        url: "/reports/public-sadrs-per-year.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "sadrs-year", "ADR Per Year");
        },
    });
    $.ajax({
        url: "/reports/public-sae-per-year.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "sae-year", "SAE Per Year");
        },
    });

    $.ajax({
        url: "/reports/public-saefis-per-year.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "saefis-year", "SAEFIS Per Year");
        },
    });

    // PER MONTH
    $.ajax({
        url: "/reports/public-aefis-per-month.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "aefis-month", "AEFI Per Month");
        },
    });
    $.ajax({
        url: "/reports/public-saefis-per-month.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "saefis-month", "SAEFI Per Month");
        },
    });

    $.ajax({
        url: "/reports/public-sadrs-per-month.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "sadrs-month", "ADR Per Month");
        },
    });

    $.ajax({
        url: "/reports/public-sae-per-month.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "sae-month", "SAE Per Month");
        },
    });

    // Per Institution
    $.ajax({
        url: "/reports/public-aefis-per-institution.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "aefis-institution", "AEFI Per Institution");
        },
    });

    $.ajax({
        url: "/reports/public-sadrs-per-institution.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "sadrs-institution", "ADR Per Institution");
        },
    });

    // Per Medicine

    $.ajax({
        url: "/reports/sadrs-per-medicine.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "sadrs-medicine", "ADR Per Medicine");
        },
    });
    $.ajax({
        url: "/reports/aefis-per-medicine.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "aefis-medicine", "AEFI Per Medicine");
        },
    });

    $.ajax({
        url: "/reports/saefis-per-medicine.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "saefis-medicine", "SAE Per Medicine");
        },
    });
    // Per Province

    $.ajax({
        url: "/reports/public-sadrs-per-province.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "sadrs-province", "ADR Per Province");
        },
    });

    
    $.ajax({
        url: "/reports/public-aefis-per-province.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "aefis-province", "AEFI Per Province");
        },
    });

    $.ajax({
        url: "/reports/public-saefis-per-province.json",
        type: "GET",
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, "saefis-province", "SAE Per Province");
        },
    });
});
