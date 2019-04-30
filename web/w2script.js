function warn() {
	alert("Clicked");
}

function changeColor() {
	var color = document.getElementById('color').value;
	document.getElementById('div1').style.backgroundColor = color;
}