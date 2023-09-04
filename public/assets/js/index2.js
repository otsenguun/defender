$(function(){
    "use strict";

    $('.sparkbar').sparkline('html', { type: 'bar' });

    $('.sparkline-pie').sparkline('html', {
        type: 'pie',
        offset: 90,
        width: '100px',
        height: '100px',
        sliceColors: ['#29bd73', '#182973', '#ffcd55']
    })    

    // notification popup
    toastr.options.closeButton = true;
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.showDuration = 1000;
    toastr['info']('Hello, welcome to Oculux, a unique admin Template.');


    $('.knob').knob({
		draw: function () {
		}
    }); 
    $(".rtl .knob").knob({
		draw: function () {
		   //style rtl
			this.i.css({
				'margin-right': '-' + ((this.w * 3 / 4 + 2) >> 0) + 'px',
				'margin-left': 'auto'
			});
		},
	});   
    
});

$(function() {
	"use strict";
    initSparkline();
	
	var values2 = getRandomValues();
	var paramsBar = {
        type: 'bar',
        barWidth: 10,
        height: 80,
        barSpacing: 8,
        barColor: '#ffffff'
    };
    $('#minibar-chart1').sparkline(values2[0], paramsBar);
    $('#minibar-chart2').sparkline(values2[1], paramsBar);
    $('#minibar-chart3').sparkline(values2[2], paramsBar);
    $('#minibar-chart4').sparkline(values2[3], paramsBar);

	function getRandomValues() {
        // data setup
        var values = new Array(20);

        for (var i = 0; i < values.length; i++) {
            values[i] = [5 + randomVal(), 10 + randomVal(), 15 + randomVal(), 20 + randomVal(), 30 + randomVal(),
                35 + randomVal(), 40 + randomVal(), 45 + randomVal(), 50 + randomVal()
            ];
        }

        return values;
    }

    function randomVal() {
        return Math.floor(Math.random() * 80);
	}
});

// C3 Chart js
$(function(){
    "use strict";
    // Small chart widgets
    var chart = c3.generate({
        bindto: '#chart-bg-users-1',
        padding: {
            bottom: -10,
            left: -1,
            right: -1
        },
        data: {
            names: {
                data1: 'Users online'
            },
            columns: [
                ['data1', 30, 40, 10, 40, 12, 22, 40]
            ],
            type: 'area'
        },
        legend: {
            show: false
        },
        transition: {
            duration: 0
        },
        point: {
            show: false
        },
        tooltip: {
            format: {
                title: function (x) {
                    return '';
                }
            }
        },
        axis: {
            y: {
                padding: {
                    bottom: 0,
                },
                show: false,
                tick: {
                    outer: false
                }
            },
            x: {
                padding: {
                    left: 0,
                    right: 0
                },
                show: false
            }
        },
        color: {
            pattern: ['#467fcf']
        }
    });
    var chart = c3.generate({
        bindto: '#chart-bg-users-2',
        padding: {
            bottom: -10,
            left: -1,
            right: -1
        },
        data: {
            names: {
                data1: 'Users online'
            },
            columns: [
                ['data1', 30, 40, 10, 40, 12, 22, 40]
            ],
            type: 'area'
        },
        legend: {
            show: false
        },
        transition: {
            duration: 0
        },
        point: {
            show: false
        },
        tooltip: {
            format: {
                title: function (x) {
                    return '';
                }
            }
        },
        axis: {
            y: {
                padding: {
                    bottom: 0,
                },
                show: false,
                tick: {
                    outer: false
                }
            },
            x: {
                padding: {
                    left: 0,
                    right: 0
                },
                show: false
            }
        },
        color: {
            pattern: ['#e74c3c']
        }
    });
    var chart = c3.generate({
        bindto: '#chart-bg-users-3',
        padding: {
            bottom: -10,
            left: -1,
            right: -1
        },
        data: {
            names: {
                data1: 'Users online'
            },
            columns: [
                ['data1', 30, 40, 10, 40, 12, 22, 40]
            ],
            type: 'area'
        },
        legend: {
            show: false
        },
        transition: {
            duration: 0
        },
        point: {
            show: false
        },
        tooltip: {
            format: {
                title: function (x) {
                    return '';
                }
            }
        },
        axis: {
            y: {
                padding: {
                    bottom: 0,
                },
                show: false,
                tick: {
                    outer: false
                }
            },
            x: {
                padding: {
                    left: 0,
                    right: 0
                },
                show: false
            }
        },
        color: {
            pattern: ['#5eba00']
        }
    });
    var chart = c3.generate({
        bindto: '#chart-bg-users-4',
        padding: {
            bottom: -10,
            left: -1,
            right: -1
        },
        data: {
            names: {
                data1: 'Users online'
            },
            columns: [
                ['data1', 30, 40, 10, 40, 12, 22, 40]
            ],
            type: 'area'
        },
        legend: {
            show: false
        },
        transition: {
            duration: 0
        },
        point: {
            show: false
        },
        tooltip: {
            format: {
                title: function (x) {
                    return '';
                }
            }
        },
        axis: {
            y: {
                padding: {
                    bottom: 0,
                },
                show: false,
                tick: {
                    outer: false
                }
            },
            x: {
                padding: {
                    left: 0,
                    right: 0
                },
                show: false
            }
        },
        color: {
            pattern: ['#f1c40f']
        }
    });

    // chart-employment
  

    // Members
    var chart = c3.generate({
        bindto: '#chart-bar-stacked', // id of chart wrapper
        data: {
            columns: [
                // each columns data
                ['data1', 11, 8, 15, 18, 19, 17],
                ['data2', 7, 7, 5, 7, 9, 12]
            ],
            type: 'bar', // default type of chart
            groups: [
                [ 'data1', 'data2']
            ],
            colors: {
                'data1': '#db5087',
                'data2': '#f9cdac',
            },
            names: {
                // name of each serie
                'data1': 'User',
                'data2': 'VIP'
            }
        },
        axis: {
            x: {
                type: 'category',
                // name of each category
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
            },
        },
        bar: {
            width: 10
        },
        legend: {
            show: false, //hide legend
        },
        padding: {
            bottom: -20,
            top: 0,
            left: -6,
        },
    });
    // Marketing
    var chart = c3.generate({
        bindto: '#chart-area-Marketing', // id of chart wrapper
        data: {
            columns: [
                // each columns data
                ['data1', 11, 8, 15, 18, 19, 17],
                ['data2', 7, 7, 5, 7, 9, 12]
            ],
            type: 'area-spline', // default type of chart
            groups: [
                [ 'data1', 'data2']
            ],
            colors: {
                'data1': '#e8608a',
                'data2': '#f3a8a1',
            },
            names: {
                // name of each serie
                'data1': 'Last Month',
                'data2': 'This Month'
            }
        },
        axis: {
            x: {
                type: 'category',
                // name of each category
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
            },
        },
        legend: {
            show: false, //hide legend
        },
        padding: {
            bottom: -20,
            top: 0,
            left: -7,
        },
    });
    
    
});

$(function(){
    "use strict";
    var dataStackedBar = {
        labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6'],
        series: [
            [8000, 12000, 3600, 1300, 12000, 12000],
            [2000, 4000, 5000, 3000, 7000, 4000],
            [1000, 2000, 4000, 6000, 3000, 2000]
        ]
    };
    new Chartist.Bar('#stackedbar-chart', dataStackedBar, {
        height: "228px",
        stackBars: true,
        axisX: {
            showGrid: false
        },
        axisY: {
            labelInterpolationFnc: function(value) {
                return (value / 1000) + 'k';
            }
        },
        plugins: [
            Chartist.plugins.tooltip({
                appendToBody: true
            }),
            Chartist.plugins.legend({
                legendNames: ['Income', 'Revenue', 'Expense']
            })
        ]
    }).on('draw', function(data) {
        if (data.type === 'bar') {
            data.element.attr({
                style: 'stroke-width: 25px'
            });
        }
    });
});