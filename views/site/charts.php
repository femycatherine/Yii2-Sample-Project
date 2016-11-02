<p>var canvas = document.querySelector("#femy");<br/> </p>

  <circle cx="40" cy="60" r="10"></circle>


<p>var canvas3 = document.querySelector("#cathy");<br/></p>
<p>var context3 = canvas3.getContext("2d");<br/></p>
<p>var context2 = canvas.getContext("2d");<br/></p>
<canvas id="femy" width="900" height="400"></canvas>
<canvas id="cathy" width="900" height="400"></canvas>
<canvas width="900" height="400"></canvas>

<script src="https://d3js.org/d3.v4.min.js"></script>
<script>
var w = 960,
h = 500,
z = 20,
x = w / z,
y = h / z;

var svg = d3.select("body").append("svg")
.attr("width", w)
.attr("height", h);

svg.selectAll("rect")
.data(d3.range(x * y))
.enter().append("rect")
.attr("transform", translate)
.attr("width", z)
.attr("height", z)
.style("fill", function(d) { return d3.hsl(d % x / x * 360, 1, Math.floor(d / x) / y); })
.on("mouseover", mouseover);

function translate(d) {
return "translate(" + (d % x) * z + "," + Math.floor(d / x) * z + ")";
}

function mouseover(d) {
this.parentNode.appendChild(this);

d3.select(this)
  .style("pointer-events", "none")
.transition()
  .duration(750)
  .attr("transform", "translate(480,480)scale(23)rotate(180)")
.transition()
  .delay(1500)
  .attr("transform", "translate(240,240)scale(0)")
  .style("fill-opacity", 0)
  .remove();
}
d3.select("body").transition()
.delay(1750)
.styleTween("background-color", function() { return d3.interpolate("green", "red"); });

var canvas = document.querySelector("#femy");
var canvas3 = document.querySelector("#cathy");
var context3 = canvas3.getContext("2d");
var context2 = canvas.getContext("2d");

var width = '500';
var height = '500';


var colors = [
  "red", "pink", "green", "orange",
  "blue", "pink", "green", "silver"
];

var arc = d3.arc().outerRadius(200).innerRadius(100).context(context2);
var arc3 = d3.arc().outerRadius(500).innerRadius(300).context(context3);

var data = [1, 1, 2, 3, 5, 8, 13, 6];
var pie = d3.pie();
var arcs = pie(data);


arcs.forEach(function(d, i) {
  context2.beginPath();
  arc(d);
  context2.fillStyle = colors[i];
  context2.fill();
});

arcs.forEach(function(d, i) {
	  context3.beginPath();
	  arc3(d);
	  context3.fillStyle = colors[i];
	  context3.fill();
	});

</script>





