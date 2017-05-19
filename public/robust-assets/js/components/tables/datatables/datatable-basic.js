$(document).ready(function() {
    $(".zero-configuration").DataTable({
    	"language": {
            url: "http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        order: [
            [0, "desc"]
        ]
    });
    $(".default-ordering").DataTable({
        order: [
            [3, "desc"]
        ]
    }), $(".multi-ordering").DataTable({
        columnDefs: [{
            targets: [0],
            orderData: [0, 1]
        }, {
            targets: [1],
            orderData: [1, 0]
        }, {
            targets: [4],
            orderData: [4, 0]
        }]
    }), $(".complex-headers").DataTable(), $(".dom-positioning").DataTable({
        dom: '<"top"i>rt<"bottom"flp><"clear">'
    }), $(".alt-pagination").DataTable({
        pagingType: "full_numbers"
    }), $(".scroll-vertical").DataTable({
        scrollY: "200px",
        scrollCollapse: !0,
        paging: !1
    }), $(".dynamic-height").DataTable({
        scrollY: "50vh",
        scrollCollapse: !0,
        paging: !1
    }), $(".scroll-horizontal").DataTable({
        scrollX: !0
    }), $(".scroll-horizontal-vertical").DataTable({
        scrollY: 200,
        scrollX: !0
    }), $(".comma-decimal-place").DataTable({
        language: {
            decimal: ",",
            thousands: "."
        }
    })
});