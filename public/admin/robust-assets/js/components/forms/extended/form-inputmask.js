! function(a, b, c) {
    "use strict";
    c(".date-inputmask").inputmask("hh:mm"),c(".vimeo-id").inputmask("999999999"), c(".phone-inputmask").inputmask("(999) 999-9999"), c(".international-inputmask").inputmask("+9(999)999-9999"), c(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"), c(".purchase-inputmask").inputmask("aaaa 9999-****"), c(".cc-inputmask").inputmask("9999 9999 9999 9999"), c(".ssn-inputmask").inputmask("999-99-9999"), c(".isbn-inputmask").inputmask("999-99-999-9999-9"), c(".currency-inputmask").inputmask("$9999"), c(".percentage-inputmask").inputmask("99%"), c(".decimal-inputmask").inputmask({
        alias: "decimal",
        radixPoint: "."
    }), c(".email-inputmask").inputmask({
        mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
        greedy: !1,
        onBeforePaste: function(a, b) {
            return a = a.toLowerCase(), a.replace("mailto:", "")
        },
        definitions: {
            "*": {
                validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                cardinality: 1,
                casing: "lower"
            }
        }
    }), c(".optional-inputmask").inputmask("(99) 9999[9]-9999"), c(".jit-inputmask").inputmask("mm-dd-yyyy", {
        jitMasking: !0
    }), c(".oncomplete-inputmask").inputmask("d/m/y", {
        oncomplete: function() {
            alert("inputmask complete")
        }
    }), c(".onincomplete-inputmask").inputmask("d/m/y", {
        onincomplete: function() {
            alert("inputmask incomplete")
        }
    }), c(".oncleared-inputmask").inputmask("d/m/y", {
        oncleared: function() {
            alert("inputmask cleared")
        }
    })
}(window, document, jQuery);