/*! Chained 1.0.0 - MIT license - Copyright 2010-2014 Mika Tuupola */
!function (a, b) {
    "use strict";
    a.fn.chained = function (c) {
        return this.each(function () {
            function d() {
                var d = !0;
                a(e).html(f.html());
                var h = a("option:selected", this).parent().val();
                var arr = h.toString().split(",");
                a("option", e).each(function () {
                				var current_class = a(this).attr("data-subtext");
                  			if(h != current_class && $.inArray(current_class, arr) < 0){
                            a(this).remove()
                        }
                });

                if (1 === a("option", e).size() && "" === a(e).val()) {
                    a(e).prop("disabled", !0)
                } else {
                    a(e).prop("disabled", !1)
                }
                d && a(e).trigger("change")

            }
            var e = this, f = a(e).clone();
            a(c).each(function () {
                a(this).bind("change", function () {
                    d()
                }), a("option:selected", this).length || a("option", this).first().attr("selected", "selected"), d()
            })
        })
    }, a.fn.chainedTo = a.fn.chained, a.fn.chained.defaults = {}
}(window.jQuery || window.Zepto, window, document);

$('selectpicker').selectpicker();
$('select').on('change', function() {
  $(this).selectpicker('refresh');
});
$("#select_employee").chained("#select_dept");
