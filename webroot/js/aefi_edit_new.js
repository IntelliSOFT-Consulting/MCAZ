$(function () {

    var cache1 = {}, lastXhr1;
    $("#description-of-reaction").autocomplete({
        source: function (request, response) {
            var term = request.term;
            if (term in cache1) {
                response(cache1[term]);
                return;
            }

            lastXhr1 = $.getJSON("/meddras/terminology.json", request, function (data, status, xhr) {
                cache1[term] = data;
                if (xhr === lastXhr1) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $("#description-of-reaction").val(ui.item.label);
            return false;
        }
    });

    $('input[name="serious"]').click(function () {
        if ($(this).val() == 'No') {
            $('input[name="serious_yes"]').attr('disabled', this.checked).attr('checked', !this.checked);
        } else {
            $('input[name="serious_yes"]').attr('disabled', false);
        }
    });
    if ($('input[name="serious"][value="No"]').is(':checked')) { $('input[name="serious_yes"]').attr('disabled', true).attr('checked', false); }

    // Gender Selection
    $('input[name="gender"]').click(function () {
        if ($(this).val() == 'Female') {
            $('input[name="female_status"]').attr('disabled', false);

        } else {
            $('input[name="female_status"]').attr('disabled', this.checked).attr('checked', !this.checked);
        }
    });
    if ($('input[name="gender"][value="Male"]').is(':checked')) { $('input[name="female_status"]').attr('disabled', true).attr('checked', false); }
    if ($('input[name="gender"][value="Unknown"]').is(':checked')) { $('input[name="female_status"]').attr('disabled', true).attr('checked', false); }


    // End of Selection
    $('#aefi-date').datetimepicker({
        format: 'd-m-Y H:i'
    });

    $('#notification-date, #died-date, #district-receive-date, #national-receive-date').datepicker({
        minDate: "-100Y", maxDate: "-0D",
        dateFormat: 'dd-mm-yy',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        yearRange: "-100Y:+0",
        showAnim: 'show'
    });

    $('#investigation-date').datepicker({
        minDate: "-100Y", maxDate: "+1Y",
        dateFormat: 'dd-mm-yy',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        yearRange: "-100Y:+0",
        showAnim: 'show'
    });

    var cache2 = {}, lastXhr;
    $("#reporter-institution").autocomplete({
        source: function (request, response) {
            var term = request.term;
            if (term in cache2) {
                response(cache2[term]);
                return;
            }

            lastXhr = $.getJSON("/facilities/facility-name.json", request, function (data, status, xhr) {
                cache2[term] = data;
                if (xhr === lastXhr) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $("#reporter-district").val(ui.item.dist);
            $("#reporter-institution").val(ui.item.label);
            return false;
        }
    });

    if ($('#outcome').find('option:selected').text() != 'Died') {
        $('#died-date').prop('disabled', true);
        $("input[name='autopsy']").prop('disabled', true);
    }
    $('#outcome').change(function () {
        if ($(this).find('option:selected').text() != 'Died') {
            $('#died-date').prop('disabled', true);
            $("input[name='autopsy']").prop('disabled', true);
        } else {
            $('#died-date').prop('disabled', false);
            $("input[name='autopsy']").prop('disabled', false);
        }
    });

    $("#ae-afebrile, #ae-febrile").click(function () {
        $("#ae-afebrile, #ae-febrile").not(this).attr("checked", false);
    });

    if ($('#gender').find('option:selected').text() != 'Female') {
        $('#female_status').prop('disabled', true);
    }
    $('#gender').change(function () {
        console.log('changed status....');
        if ($(this).find('option:selected').text() != 'Female') {
            $('#female_status').prop('disabled', true);
        } else {
            $('#female_status').prop('disabled', false);
        }
    });

    //active for admins
    //https://stackoverflow.com/questions/18999501/bootstrap-3-keep-selected-tab-on-page-refresh
    $('a[data-toggle="tab"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
        var id = $(e.target).attr("href");
        localStorage.setItem('selectedTab', id)
    });

    var selectedTab = localStorage.getItem('selectedTab');
    if (selectedTab != null) {
        $('a[data-toggle="tab"][href="' + selectedTab + '"]').tab('show');
    }
});
