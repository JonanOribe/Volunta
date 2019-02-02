$(function() {
    launchGauge();
    setTimeout(function() {
        var gaugeText = document.getElementById("preview-textfield").innerHTML;
        document.getElementById("preview-textfield").innerHTML = gaugeText + "% eventos completos";
    }, 1300);


});

function launchGauge() {

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