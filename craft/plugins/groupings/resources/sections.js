/**
 * @author    Jared Meyering Ltd <jared.meyering@gmail.com>
 * @see       http://jaredmeyering.com
 */
(function($){
    var sectionStartClass = "sections--section-start";
    var sectionEndClass = "sections--section-end";
    var sectionChildClass = "sections--section-child";

    var identifysections = function() {
        $(".matrixblock").removeClass(sectionChildClass);
        $("input[value=sectionEnd]").each(function() {
            var parent = $(this).parents(".matrixblock");
            parent.addClass(sectionEndClass);
        });

        $("input[value=sectionStart]").each(function() {
            var parent = $(this).parents(".matrixblock");
            parent.addClass(sectionStartClass);
            var siblings = $(parent).nextAll(".matrixblock");

            for (var i = 0; i < siblings.length; i++) {
                var $s = $(siblings[i]);
                if ($s.hasClass(sectionEndClass)) {
                    break;
                }
                $s.addClass(sectionChildClass);
            }
        });
    };

    identifysections();
    $(".matrix").bind("DOMSubtreeModified", function() {
        identifysections();
    });

    // This is under thought
    $("body").on("click", "a[data-type=sectionStart]", function(e) {
        $("a[data-type=sectionEnd]").first().trigger("click");
    });

})(jQuery);
