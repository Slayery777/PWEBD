var myLanguage = {
    "Java": 25,
    "C++": 40,
    "HTML5": 50,
    "CSS3": 55,
    "C#": 42,
    "JavaScript": 20
};
var myLegend = document.getElementById("myLegend");
 
var myDougnutChart = new Piechart(
    {
        canvas:myCanvas,
        data:myLanguage,
        colors:["#fde23e","#f16e23", "#57d9ff","#937e88","#000000","#0400FC"],
        legend:myLegend
    }
);
myDougnutChart.draw();