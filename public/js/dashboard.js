/* globals Chart:false */

(() => {
    'use strict'

    // Graphs
    /* const ctx = document.getElementById('myChart') */
    // eslint-disable-next-line no-unused-vars
    /* const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                'Sunday',
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday'
            ],
            datasets: [{
                data: [
                    15339,
                    21345,
                    18483,
                    24003,
                    23489,
                    24092,
                    12034
                ],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    boxPadding: 3
                }
            }
        }
    }) */
})()

// (function () {
//     "use strict";

//     // ============================================================== 
//     // sales ratio
//     // ============================================================== 
//     var chart = new Chartist.Line('.sales5', {
//         labels: [1, 2, 3, 4, 5, 6, 7, 8],
//         series: [
//             [24.5, 30.3, 39.7, 30, 24.5, 33.6, 45, 40],
//             [8.9, 6.6, 22.9, 6.8, 15.5, 10.1, 8.8, 18.4]
//         ]
//     }, {
//         low: 0,
//         high: 48,
//         showArea: true,
//         fullWidth: true,
//         plugins: [
//             Chartist.plugins.tooltip()
//         ],
//         axisY: {
//             onlyInteger: true,
//             scaleMinSpace: 40,
//             offset: 20,
//             labelInterpolationFnc: function (value) {
//                 return (value / 10) + 'k';
//             }
//         },

//     });

//     // Offset x1 a tiny amount so that the straight stroke gets a bounding box
//     // Straight lines don't get a bounding box 
//     // Last remark on -> http://www.w3.org/TR/SVG11/coords.html#ObjectBoundingBox
//     chart.on('draw', function (ctx) {
//         if (ctx.type === 'area') {
//             ctx.element.attr({
//                 x1: ctx.x1 + 0.001
//             });
//         }
//     });

//     // Create the gradient definition on created event (always after chart re-render)
//     chart.on('created', function (ctx) {
//         var defs = ctx.svg.elem('defs');
//         defs.elem('linearGradient', {
//             id: 'gradient',
//             x1: 0,
//             y1: 1,
//             x2: 0,
//             y2: 0
//         }).elem('stop', {
//             offset: 0,
//             'stop-color': 'rgba(255, 255, 255, 1)'
//         }).parent().elem('stop', {
//             offset: 1,
//             'stop-color': 'rgba(64, 196, 255, 1)'
//         });
//     });


//     var chart = [chart];

//     // ============================================================== 
//     // weather
//     // ============================================================== 
//     var chart = c3.generate({
//         bindto: '.weather-report',
//         data: {
//             columns: [
//                 ['Day 1', 21, 15, 30, 45, 15]
//             ],
//             type: 'spline'
//         },
//         axis: {
//             y: {
//                 show: false,
//                 tick: {
//                     count: 0,
//                     outer: false
//                 }
//             },
//             x: {
//                 show: false,
//             }
//         },
//         padding: {
//             top: 0,
//             right: -8,
//             bottom: -15,
//             left: -8,
//         },
//         point: {
//             r: 2,
//         },
//         legend: {
//             hide: true
//         },
//         color: {
//             pattern: ['#fff']
//         }

//     });

//     // ============================================================== 
//     // campaign status
//     // ============================================================== 

//     var chart = c3.generate({
//         bindto: '.status',
//         data: {
//             columns: [
//                 ['Pending', 55],
//                 ['Failed', 10],
//                 ['Success', 18],
//             ],

//             type: 'donut'
//         },
//         donut: {
//             label: {
//                 show: false
//             },
//             title: "Status",
//             width: 35,

//         },

//         legend: {
//             hide: true
//             //or hide: 'data1'
//             //or hide: ['data1', 'data2']
//         },
//         color: {
//             pattern: ['#137eff', '#5ac146', '#8b5edd']
//         }
//     });

//     // ============================================================== 
//     // Earnings
//     // ============================================================== 
//     new Chartist.Bar('.chart1', {
//         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
//         series: [
//             [5, 4, 5, 3, 12, 4, 15, 8, 10, 8, 7, 5],
//             [4, 10, 5, 4, 8, 3, 3, 4, 9, 7, 10, 4]
//         ]
//     }, {
//         stackBars: true,
//         axisY: {
//             labelInterpolationFnc: function (value) {
//                 return (value / 1) + 'k';
//             },
//             scaleMinSpace: 55
//         },
//         axisX: {
//             showGrid: false
//         },
//         plugins: [
//             Chartist.plugins.tooltip()
//         ],
//         seriesBarDistance: 1,
//         chartPadding: {
//             top: 15,
//             right: 15,
//             bottom: 5,
//             left: 0
//         }
//     }).on('draw', function (data) {
//         if (data.type === 'bar') {
//             data.element.attr({
//                 style: 'stroke-width: 25px'
//             });
//         }
//     });
// });


$(function () {


    // =====================================
    // Profit
    // =====================================
    var profit = {
        series: [{
                name: "Pixel ",
                data: [9, 5, 3, 7, 5, 10, 3],
            },
            {
                name: "Ample ",
                data: [6, 3, 9, 5, 4, 6, 4],
            },
        ],
        chart: {
            fontFamily: "Poppins,sans-serif",
            type: "bar",
            height: 360,
            offsetY: 10,
            toolbar: {
                show: false,
            },
        },
        grid: {
            show: true,
            strokeDashArray: 3,
            borderColor: "rgba(0,0,0,.1)",
        },
        colors: ["#1e88e5", "#21c1d6"],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "30%",
                endingShape: "flat",
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 5,
            colors: ["transparent"],
        },
        xaxis: {
            type: "category",
            categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            labels: {
                style: {
                    colors: "#a1aab2",
                },
            },
        },
        yaxis: {
            labels: {
                style: {
                    colors: "#a1aab2",
                },
            },
        },
        fill: {
            opacity: 1,
            colors: ["var(--bs-primary)", "var(--bs-danger)"],
        },
        tooltip: {
            theme: "dark",
        },
        legend: {
            show: false,
        },
        responsive: [{
            breakpoint: 767,
            options: {
                stroke: {
                    show: false,
                    width: 5,
                    colors: ["transparent"],
                },
            },
        }, ],
    };
    /*
            var chart_column_basic = new ApexCharts(
                document.querySelector("#profit"),
                profit
            );
            chart_column_basic.render();


            // =====================================
            // Breakup
            // =====================================
            var grade = {
                series: [5368, 3500, 4106],
                labels: ["5368", "Refferal Traffic", "Oragnic Traffic"],
                chart: {
                    height: 170,
                    type: "donut",
                    fontFamily: "Plus Jakarta Sans', sans-serif",
                    foreColor: "#c6d1e9",
                },

                tooltip: {
                    theme: "dark",
                    fillSeriesColor: false,
                },

                colors: ["#e7ecf0", "#fb977d", "var(--bs-primary)"],
                dataLabels: {
                    enabled: false,
                },

                legend: {
                    show: false,
                },

                stroke: {
                    show: false,
                },
                responsive: [{
                    breakpoint: 991,
                    options: {
                        chart: {
                            width: 150,
                        },
                    },
                }, ],
                plotOptions: {
                    pie: {
                        donut: {
                            size: '80%',
                            background: "none",
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontSize: "12px",
                                    color: undefined,
                                    offsetY: 5,
                                },
                                value: {
                                    show: false,
                                    color: "#98aab4",
                                },
                            },
                        },
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#grade"), grade);
            chart.render();




            // =====================================
            // Earning
            // =====================================
            var earning = {
                chart: {
                    id: "sparkline3",
                    type: "area",
                    height: 60,
                    sparkline: {
                        enabled: true,
                    },
                    group: "sparklines",
                    fontFamily: "Plus Jakarta Sans', sans-serif",
                    foreColor: "#adb0bb",
                },
                series: [{
                    name: "Earnings",
                    color: "#8763da",
                    data: [25, 66, 20, 40, 12, 58, 20],
                }, ],
                stroke: {
                    curve: "smooth",
                    width: 2,
                },
                fill: {
                    colors: ["#f3feff"],
                    type: "solid",
                    opacity: 0.05,
                },

                markers: {
                    size: 0,
                },
                tooltip: {
                    theme: "dark",
                    fixed: {
                        enabled: true,
                        position: "right",
                    },
                    x: {
                        show: false,
                    },
                },
            };
            new ApexCharts(document.querySelector("#earning"), earning).render();
        */
})
