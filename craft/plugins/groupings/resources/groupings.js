/**
 * @author    Jared Meyering Ltd <jared.meyering@gmail.com>
 * @see       http://jaredmeyering.com
 */
(function($){
    var groupStartClass = "groupings--group-start";
    var groupEndClass = "groupings--group-end";
    var groupChildClass = "groupings--group-child";

    var identifyGroupings = function() {
        $(".matrixblock").removeClass(groupChildClass);
        $("input[value=groupEnd]").each(function() {
            var parent = $(this).parents(".matrixblock");
            parent.addClass(groupEndClass);
        });

        $("input[value=groupStart]").each(function() {
            var parent = $(this).parents(".matrixblock");
            parent.addClass(groupStartClass);
            var siblings = $(parent).nextAll(".matrixblock");

            for (var i = 0; i < siblings.length; i++) {
                var $s = $(siblings[i]);
                if ($s.hasClass(groupEndClass)) {
                    break;
                }
                $s.addClass(groupChildClass);
            }
        });
    };

    identifyGroupings();
    $(".matrix").bind("DOMSubtreeModified", function() {
        identifyGroupings();
    });

    // This is under thought
    $("body").on("click", "a[data-type=groupStart]", function(e) {
        $("a[data-type=groupEnd]").first().trigger("click");
    });

})(jQuery);
