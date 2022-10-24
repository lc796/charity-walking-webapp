var sections = document.getElementsByClassName("section");
var hrs = document.getElementsByTagName("hr");

var i = 0;
for (node of sections) {
    if (i % 2 == 0) {
        node.style.backgroundColor = "#e6e6e6";
    } else {
        node.style.backgroundColor = "#d6d6d6";
    }
    i++;
}

var j = 0;
for (hr of hrs) {
    if (j % 2 == 0) {
        hr.style.borderColor = "#b6b6b6";
    } else {
        hr.style.borderColor = "#b6b6b6";
    }
    j++;
}