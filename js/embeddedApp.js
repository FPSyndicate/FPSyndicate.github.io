function LoadIFrame () {
    var iframe = document.getElementById("embedded-app");
    iframe.setAttribute("src", iframe.getAttribute("data-src")); 
    iframe.style.display = "block";
    var parent = document.getElementById("embedded-app-container");
    parent.removeChild(document.getElementById("embedded-app-button"));
    parent.style.background = "#ffffff";
}