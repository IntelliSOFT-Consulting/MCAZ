$(function () {
    // Multi Reactions Handling
    $("#addReactionDetail").on("click", addReactionDetail);
    $(document).on("click", ".removereactions", removeReactionDetail);
    $(document).on("click", "#addReactionDetail", reloadStuff);
    // Multi reactions Handling
    reloadStuff();
    function reloadStuff() {
        var cache001 = {},
            lastXhr001;
        $(".other_reactions").autocomplete({
            source: function (request, response) {
                var term = request.term;
                if (term in cache001) {
                    response(cache001[term]);
                    return;
                }

                lastXhr001 = $.getJSON(
                    "/meddras/terminology.json",
                    request,
                    function (data, status, xhr) {
                        cache001[term] = data;
                        if (xhr === lastXhr001) {
                            response(data);
                        }
                    }
                );
            },
        });
    }

    function addReactionDetail() {
        console.log("clicked");
        var se = $("#aefi_reactions .reaction-group")
            .last()
            .find("button")
            .attr("id");
        if (typeof se !== "undefined" && se !== false && se !== "") {
            intId = parseFloat(se.replace("reactionsButton", "")) + 1;
        } else {
            intId = 1;
        }
        if ($("#aefi_reactions .reaction-group").length < 9) {
            var new_reactiondetail = $(
                '<div class="reaction-group"> \
                        <input class="form-control" name="aefi_reactions[{i}][id]" id="aefi_reactions-{i}-id" type="hidden"> \
                        <div class="input text"> \
                            <div class="form-group"> \
                                <div class="col-xs-4 control-label"> \
                                </div> \
                                <div class="col-xs-6"> \
                                    <input class="form-control other_reactions" name="aefi_reactions[{i}][reaction_name]" maxlength="255" id="aefi_reactions-{i}-reaction-name" value="" type="text"> \
                                </div> \
                      			<div class="controls"><button type="button" id="reactionsButton{i}" class="btn btn-xs btn-danger removereactions"><i class="fa fa-trash-o"></i> </button></div> \
                            </div> \
                        </div>   </div>'.replace(
                    /{i}/g,
                    intId
                )
            );
            $("#aefi_reactions").append(new_reactiondetail);
        } else {
            alert(
                "Sorry, cant add more than " +
                    $("#aefi_reactions .reaction-group").length +
                    " Reactions!"
            );
        }
    }
    function removeReactionDetail() {
        intId = parseFloat($(this).attr("id").replace("reactionsButton", ""));
        var inputVal = $("#aefi_reactions-" + intId + "-id").val();
        console.log(inputVal);
        if (inputVal) {
            $.ajax({
                type: "POST",
                url: "/aefi_reactions/delete/" + inputVal + ".json",
                data: { id: inputVal },
                success: function (data) {
                    console.log(data);
                }, error: function (xhr, textStatus, errorThrown) {
					console.log("Failed to delete reaction with id: " + inputVal);
					console.log("Error: " + errorThrown);
				}
            });
        }
        $(this).parent().parent().remove();
    }
});
