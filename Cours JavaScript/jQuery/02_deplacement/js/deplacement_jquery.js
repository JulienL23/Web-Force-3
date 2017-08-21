$ (function() {
    var leftField = $("#left");
    var topField = $("#top");
    var block = $("#block");

    $("#my-form").on("submit", function(e){
        e.preventDefault();

        var leftValue = parseInt(leftField.val());
        var topValue = parseInt(topField.val());

        // équivalent de(! veut dire inverse) !Number.isNaN(leftVlue)
        if ($.isNumeric(leftValue) && $.isNumeric(topValue)) {
            block.stop().animate({"left": leftValue, "top" : topValue}, 3000);
            // block.css({"left" : leftValue, "top" : topValue});

        }
    });
});
