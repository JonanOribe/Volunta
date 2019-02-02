$(function() {
    launchGauge();
    setTimeout(function() {
        var gaugeText = document.getElementById("preview-textfield").innerHTML;
        document.getElementById("preview-textfield").innerHTML = gaugeText + "% eventos completos";
    }, 1300);


});

function launchGauge() {


    var gaugeOptions = {

        chart: {
            type: 'solidgauge'
        },

        title: null,

        pane: {
            center: ['10%', '40%'],
            size: '120px',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },

        tooltip: {
            enabled: false
        },

        // the value axis
        yAxis: {
            stops: [
                [0.1, '#55BF3B'], // green
                [0.5, '#DDDF0D'], // yellow
                [0.9, '#DF5353'] // red
            ],
            lineWidth: 0,
            minorTickInterval: null,
            tickAmount: 2,
            title: {
                y: -70
            },
            labels: {
                y: 16
            }
        },

        plotOptions: {
            solidgauge: {
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        }
    };

    // The speed gauge
    var chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 200,
            title: {
                text: 'Voluntarios conectados'
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Voluntarios conectados',
            data: [80],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:12px;color:' + '">{y}</span><br/>' +
                    '<span style="font-size:12px;color:silver">Últimos 5 minutos</span></div>'
            },
            tooltip: {
                valueSuffix: 'Últimos 5 minutos'
            }
        }]

    }));

    // The RPM gauge
    var chartRpm = Highcharts.chart('container-rpm', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 5,
            title: {
                text: 'Eventos completos'
            }
        },

        series: [{
            name: 'Eventos completos',
            data: [1],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:12px;color:' + '">{y:.1f}</span><br/>' +
                    '<span style="font-size:12px;color:silver">% completados</span></div>'
            },
            tooltip: {
                valueSuffix: '% completados'
            }
        }]

    }));

    // Bring life to the dials
    setInterval(function() {
        // Speed
        var point,
            newVal,
            inc;

        if (chartSpeed) {
            point = chartSpeed.series[0].points[0];
            inc = Math.round((Math.random() - 0.5) * 100);
            newVal = point.y + inc;

            if (newVal < 0 || newVal > 200) {
                newVal = point.y - inc;
            }

            point.update(newVal);
        }

        // RPM
        if (chartRpm) {
            point = chartRpm.series[0].points[0];
            inc = Math.random() - 0.5;
            newVal = point.y + inc;

            if (newVal < 0 || newVal > 5) {
                newVal = point.y - inc;
            }

            point.update(newVal);
        }
    }, 2000);

    var opts = {
        lines: 12, // The number of lines to draw
        angle: 0, // The length of each line
        lineWidth: 0.4, // The line thickness
        pointer: {
            length: 0.37, // The radius of the inner circle
            strokeWidth: 0.035, // The rotation offset
            color: '#000000' // Fill color
        },
        limitMax: 'false', // If true, the pointer will not go past the end of the gauge
        colorStart: '#6FADCF', // Colors
        colorStop: '#8FC0DA', // just experiment with them
        strokeColor: '#E0E0E0', // to see which ones work best for you
        generateGradient: false,
        staticLabels: {
            font: "30px Arial", // Specifies font
            labels: [0, 25, 50, 75, 100], // Print labels at these values
            color: "#000000", // Optional: Label text color
            fractionDigits: 0 // Optional: Numerical precision. 0=round off.
        },
        staticZones: [
            { strokeStyle: "#004478", min: 0, max: 25 }, // Yellow
            { strokeStyle: "#2E78BC", min: 26, max: 50 }, // Green
            { strokeStyle: "#88C5F7", min: 51, max: 100 }, // Yellow
        ],
    };
    var target = document.getElementById('foo'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 100; // set max gauge value
    gauge.animationSpeed = 8; // set animation speed (32 is default value)
    gauge.set(68); // set actual value
    gauge.setTextField(document.getElementById("preview-textfield"));
}