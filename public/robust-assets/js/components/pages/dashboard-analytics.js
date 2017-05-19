! function(a, b, c) {
    "use strict";

    function d(a, b, c) {
        a.push(Math.floor(Math.random() * (c - b + 1)) + b), a.shift(), l.update()
    }
    c("#audience-list-scroll").perfectScrollbar({
        wheelPropagation: !0
    }), c("#sp-bar-total-cost").sparkline([5, 6, 7, 8, 9, 10, 12, 13, 15, 14, 13, 12, 10, 9, 8, 10, 12, 14, 15, 16, 17, 14, 12, 11, 10, 8], {
        type: "bar",
        width: "100%",
        height: "30px",
        barWidth: 2,
        barSpacing: 4,
        barColor: "#FF5722"
    }), c("#sp-tristate-bar-total-revenue").sparkline([1, 1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1, 0, -1, 1, -1], {
        type: "tristate",
        height: "30",
        posBarColor: "#00BCD4",
        negBarColor: "#E91E63",
        barWidth: 4,
        barSpacing: 5,
        zeroAxis: !1
    });
    var e = b.getElementById("visitors-graph").getContext("2d"),
        f = e.createLinearGradient(0, 0, 0, 400);
    f.addColorStop(0, "rgba(248, 187, 66, 0.2)"), f.addColorStop(1, "rgba(248, 187, 66, 0.0)");
    var g = e.createLinearGradient(0, 0, 0, 400);
    g.addColorStop(0, "rgba(55, 188, 155, 0.2)"), g.addColorStop(1, "rgba(55, 188, 155, 0.0)");
    var h = e.createLinearGradient(0, 0, 0, 400);
    h.addColorStop(0, "rgba(150, 122, 220, 0.2)"), h.addColorStop(1, "rgba(150, 122, 220, 0.0)");
    var i = {
            responsive: !0,
            maintainAspectRatio: !1,
            pointDotStrokeWidth: 4,
            legend: {
                display: !1,
                labels: {
                    fontColor: "#FFF",
                    boxWidth: 10
                },
                position: "top"
            },
            hover: {
                mode: "label"
            },
            scales: {
                xAxes: [{
                    display: !0,
                    gridLines: {
                        color: "rgba(255,255,255, 0.3)",
                        drawTicks: !0,
                        drawBorder: !0
                    }
                }],
                yAxes: [{
                    display: !0,
                    ticks: {
                        display: !0,
                        min: 0,
                        max: 35e3,
                        maxTicksLimit: 6
                    }
                }]
            },
            title: {
                display: !1,
                text: "Chart.js Line Chart - Legend"
            }
        },
        j = {
            labels: ["-25 Sec", "-20 Sec", "-15 Sec", "-10 Sec", "-5 Sec", "0 Sec"],
            datasets: [{
                label: "Page Views",
                data: [20630, 28e3, 31e3, 22e3, 33500, 24e3],
                backgroundColor: h,
                borderColor: "#967ADC",
                pointColor: "#fff",
                pointBorderColor: "#967ADC",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 3,
                pointRadius: 4
            }, {
                label: "Total Visit",
                data: [15630, 1e4, 16e3, 12e3, 13500, 14e3],
                backgroundColor: g,
                borderColor: "#37BC9B",
                pointColor: "#fff",
                pointBorderColor: "#37BC9B",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 3,
                pointRadius: 4
            }, {
                label: "Unique Visitor",
                data: [5630, 7e3, 1500, 8e3, 3500, 4600],
                backgroundColor: f,
                borderColor: "#F6BB42",
                pointColor: "#fff",
                pointBorderColor: "#F6BB42",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 3,
                pointRadius: 4
            }]
        },
        k = {
            type: "line",
            options: i,
            data: j
        },
        l = new Chart(e, k);
    setInterval(function() {
        d(l.data.datasets[0].data, 2e4, 35e3), d(l.data.datasets[1].data, 1e4, 16e3), d(l.data.datasets[2].data, 1e3, 8e3)
    }, 3500), c("#world-map-markers").vectorMap({
        map: "world_mill",
        backgroundColor: "#fff",
        zoomOnScroll: !1,
        series: {
            regions: [{
                values: visitorData,
                scale: ["#97E1CE", "#37BC9B"],
                normalizeFunction: "polynomial"
            }]
        },
        onRegionTipShow: function(a, b, c) {
            b.html(b.html() + " (Visitor - " + visitorData[c] + ")")
        }
    }), Morris.Donut({
        element: "sessions-browser-donut-chart",
        data: [{
            label: "Chrome",
            value: 3500
        }, {
            label: "Firefox",
            value: 2500
        }, {
            label: "Safari",
            value: 2e3
        }, {
            label: "Opera",
            value: 1e3
        }, {
            label: "Internet Explorer",
            value: 500
        }],
        resize: !0,
        colors: ["#F6BB42", "#37BC9B", "#3BAFDA", "#DA4453", "#967ADC"]
    });
    var m = b.getElementById("line-stacked-area").getContext("2d"),
        n = {
            responsive: !0,
            maintainAspectRatio: !1,
            pointDotStrokeWidth: 4,
            legend: {
                display: !1,
                labels: {
                    fontColor: "#FFF",
                    boxWidth: 10
                },
                position: "top"
            },
            hover: {
                mode: "label"
            },
            scales: {
                xAxes: [{
                    display: !1
                }],
                yAxes: [{
                    display: !0,
                    gridLines: {
                        color: "rgba(255,255,255, 0.3)",
                        drawTicks: !1,
                        drawBorder: !1
                    },
                    ticks: {
                        display: !1,
                        min: 0,
                        max: 70,
                        maxTicksLimit: 4
                    }
                }]
            },
            title: {
                display: !1,
                text: "Chart.js Line Chart - Legend"
            }
        },
        o = {
            labels: ["2010", "2011", "2012", "2013", "2014", "2015"],
            datasets: [{
                label: "iOS",
                data: [0, 10, 5, 26, 12, 20],
                backgroundColor: "#eeda54",
                borderColor: "#eeda54",
                pointBorderColor: "#eeda54",
                pointBackgroundColor: "#eeda54",
                pointRadius: 2,
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2
            }, {
                label: "Windows",
                data: [0, 20, 20, 30, 26, 32],
                backgroundColor: "rgba(166,100,255,0.8)",
                borderColor: "transparent",
                pointBorderColor: "transparent",
                pointBackgroundColor: "transparent",
                pointRadius: 2,
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2
            }, {
                label: "Android",
                data: [0, 30, 15, 40, 38, 45],
                backgroundColor: "#40cae4",
                borderColor: "#40cae4",
                pointBorderColor: "#40cae4",
                pointBackgroundColor: "#40cae4",
                pointRadius: 2,
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2
            }]
        },
        p = {
            type: "line",
            options: n,
            data: o
        };
    new Chart(m, p);
    Morris.Area({
        element: "bounce-rate",
        data: [{
            y: "2010",
            a: 28
        }, {
            y: "2011",
            a: 40
        }, {
            y: "2012",
            a: 36
        }, {
            y: "2013",
            a: 48
        }, {
            y: "2014",
            a: 32
        }, {
            y: "2015",
            a: 42
        }, {
            y: "2016",
            a: 30
        }],
        xkey: "y",
        ykeys: ["a"],
        labels: ["Sales"],
        behaveLikeLine: !0,
        ymax: 60,
        resize: !0,
        pointSize: 0,
        smooth: !0,
        gridTextColor: "#bfbfbf",
        gridLineColor: "#c3c3c3",
        numLines: 6,
        gridtextSize: 14,
        lineWidth: 2,
        fillOpacity: .6,
        lineColors: ["#F6BB42"],
        hideHover: "auto"
    }), Morris.Area({
        element: "area-chart",
        data: [{
            year: "2016-12-01",
            AvgSessionDuration: 0,
            PagesSession: 0
        }, {
            year: "2016-12-02",
            AvgSessionDuration: 150,
            PagesSession: 90
        }, {
            year: "2016-12-03",
            AvgSessionDuration: 140,
            PagesSession: 120
        }, {
            year: "2016-12-04",
            AvgSessionDuration: 105,
            PagesSession: 240
        }, {
            year: "2016-12-05",
            AvgSessionDuration: 190,
            PagesSession: 140
        }, {
            year: "2016-12-06",
            AvgSessionDuration: 230,
            PagesSession: 250
        }, {
            year: "2016-12-07",
            AvgSessionDuration: 270,
            PagesSession: 190
        }],
        xkey: "year",
        ykeys: ["AvgSessionDuration", "PagesSession"],
        labels: ["Avg. Session Duration", "Pages/Session"],
        behaveLikeLine: !0,
        ymax: 300,
        resize: !0,
        pointSize: 0,
        pointStrokeColors: ["#C9BBAE", "#F44336"],
        smooth: !1,
        gridLineColor: "#e3e3e3",
        numLines: 6,
        gridtextSize: 14,
        lineWidth: 0,
        fillOpacity: .6,
        hideHover: "auto",
        lineColors: ["#C9BBAE", "#F44336"]
    }), c("#sp-line-total-sales").sparkline([14, 12, 4, 9, 3, 6, 11, 10, 13, 9, 14, 11, 16, 20, 15], {
        type: "line",
        width: "100%",
        height: "100px",
        lineColor: "#00BCD4",
        fillColor: "#00BCD4",
        spotColor: "",
        minSpotColor: "",
        maxSpotColor: "",
        highlightSpotColor: "",
        highlightLineColor: "",
        chartRangeMin: 0,
        chartRangeMax: 20
    }), c("#sp-bar-total-sales").sparkline([5, 6, 7, 8, 9, 10, 12, 13, 15, 14, 13, 12, 10, 9, 8, 10, 12, 14, 15, 16, 17, 14, 12, 11, 10, 8], {
        type: "bar",
        width: "100%",
        height: "30px",
        barWidth: 2,
        barSpacing: 4,
        barColor: "#00BCD4"
    }), c("#sp-stacked-bar-total-sales").sparkline([
        [8, 10],
        [12, 8],
        [9, 14],
        [8, 11],
        [10, 13],
        [7, 11],
        [8, 14],
        [9, 12],
        [10, 11],
        [12, 14],
        [8, 12],
        [9, 12],
        [9, 14]
    ], {
        type: "bar",
        width: "100%",
        height: "30px",
        barWidth: 4,
        barSpacing: 6,
        stackedBarColor: ["#FF5722", "#009688"]
    }), c("#sp-tristate-bar-total-sales").sparkline([1, 1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1, 0, -1, 1, -1], {
        type: "tristate",
        height: "30",
        posBarColor: "#009688",
        negBarColor: "#FF5722",
        barWidth: 4,
        barSpacing: 5,
        zeroAxis: !1
    }), Morris.Bar({
        element: "monthly-sales",
        data: [{
            month: "Jan",
            sales: 1835
        }, {
            month: "Feb",
            sales: 2356
        }, {
            month: "Mar",
            sales: 1459
        }, {
            month: "Apr",
            sales: 1289
        }, {
            month: "May",
            sales: 1647
        }, {
            month: "Jun",
            sales: 2156
        }, {
            month: "Jul",
            sales: 1835
        }, {
            month: "Aug",
            sales: 2356
        }, {
            month: "Sep",
            sales: 1459
        }, {
            month: "Oct",
            sales: 1289
        }, {
            month: "Nov",
            sales: 1647
        }, {
            month: "Dec",
            sales: 2156
        }],
        xkey: "month",
        ykeys: ["sales"],
        labels: ["Sales"],
        barGap: 4,
        barSizeRatio: .3,
        gridTextColor: "#bfbfbf",
        gridLineColor: "#e3e3e3",
        numLines: 5,
        gridtextSize: 14,
        resize: !0,
        barColors: ["#967ADC"],
        hideHover: "auto"
    });
    var q = !1;
    "RTL" == c("html").data("textdirection") && (q = !0), c(".knob").knob({
        rtl: q,
        draw: function() {
            var a = this.$,
                b = a.attr("style");
            b = b.replace("bold", "normal");
            var d = parseInt(a.css("font-size"), 10),
                e = Math.ceil(1.65 * d);
            b = b + "font-size: " + e + "px;";
            var f = a.attr("data-knob-icon");
            if (a.hide(), c('<i class="knob-center-icon ' + f + '"></i>').insertAfter(a).attr("style", b), "tron" == this.$.data("skin")) {
                this.cursorExt = .3;
                var g, h = this.arc(this.cv),
                    i = 1;
                return this.g.lineWidth = this.lineWidth, this.o.displayPrevious && (g = this.arc(this.v), this.g.beginPath(), this.g.strokeStyle = this.pColor, this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, g.s, g.e, g.d), this.g.stroke()), this.g.beginPath(), this.g.strokeStyle = i ? this.o.fgColor : this.fgColor, this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, h.s, h.e, h.d), this.g.stroke(), this.g.lineWidth = 2, this.g.beginPath(), this.g.strokeStyle = this.o.fgColor, this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + 2 * this.lineWidth / 3, 0, 2 * Math.PI, !1), this.g.stroke(), !1
            }
        }
    });
    var q = !1;
    "RTL" == c("html").data("textdirection") && (q = !0), q === !0 && c(".tweet-slider").attr("dir", "rtl"), q === !0 && c(".fb-post-slider").attr("dir", "rtl"), c(".tweet-slider").unslider({
        autoplay: !0,
        arrows: !1,
        nav: !1,
        infinite: !0
    }), c(".fb-post-slider").unslider({
        autoplay: !0,
        delay: 3500,
        arrows: !1,
        nav: !1,
        infinite: !0
    })
}(window, document, jQuery);