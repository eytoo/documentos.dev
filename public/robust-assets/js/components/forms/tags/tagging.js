$(document).ready(function() {
    $(".case-sensitive").tagging({
        "case-sensitive": !0
    }), $(".close-char").tagging({
        "close-char": ""
    }), $(".edit-on-delete").tagging({
        "edit-on-delete": !1
    }), $(".no-duplicate").tagging({
        "no-duplicate": !1
    }), $(".no-enter").tagging({
        "no-enter": !0
    }), $(".no-comma").tagging({
        "no-comma": !0
    }), $(".forbidden-chars").tagging({
        "forbidden-chars": [",", ".", "_", "?"]
    }), $(".forbidden-words").tagging({
        "forbidden-words": ["bastard", "bitch", "biatch", "bloody"]
    }), $(".pre-tags-separator").tagging({
        "pre-tags-separator": "/"
    }), $(".tag-on-blur").tagging({
        "tag-on-blur": !1
    }), $(".tag-char").tagging({
        "tag-char": "*"
    }), $(".type-zone-class").tagging({
        "type-zone-class": "tagging-area"
    }), $(".add-box").tagging(), $(".remove-box").tagging();
    var a = $(".remove-all-box").tagging();
    a = a[0];
    var b = $(".refresh-box").tagging();
    b = b[0];
    var c = $(".reset-box").tagging();
    c = c[0], $(".destroy-box").tagging(), $(".add-tagging").on("click", function() {
        $(".add-box").tagging("add", "Sydney")
    }), $(".remove-tagging").on("click", function() {
        $(".remove-box").tagging("remove", "cairo")
    }), $(".remove-all-tagging").on("click", function() {
        a.tagging("removeAll")
    }), $(".refresh-tagging").on("click", function() {
        b.tagging("refresh")
    }), $(".reset-tagging").on("click", function() {
        c.tagging("reset")
    }), $(".destroy-tagging").on("click", function() {
        $(".destroy-box").tagging("destroy")
    }), $(".special-keys-box").tagging(), $(".focus-input-box").tagging(), $(".get-data-box").tagging(), $(".get-special-keys-box").tagging(), $(".val-input-box").tagging(), $(".add-special-keys").on("click", function() {
        $(".special-keys-box").tagging("addSpecialKeys", ["add", {
            right_arrow: 39
        }]), $(".special-keys-box").tagging("addSpecialKeys", ["remove", {
            left_arrow: 37
        }])
    }), $(".focus-input").on("click", function() {
        $(".focus-input-box").tagging("focusInput")
    }), $(".get-special-keys").on("click", function() {
        console.log($(".get-special-keys-box").tagging("getSpecialKeys"))
    }), $(".val-input").on("click", function() {
        $(".val-input-box").tagging("valInput", "Cairo"), console.log($(".val-input-box").tagging("valInput"))
    })
});