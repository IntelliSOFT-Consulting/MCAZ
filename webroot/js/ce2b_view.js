$(function() {
    // console.log($('#mydiv').text());
    xml = $.parseXML($('#mydiv').text());
    console.log($(xml).find("duplicatenumb"));
});
