



var element = document.getElementById("navbar-list");

var links =  ["Home", "About Us", "Services", "Products", "Contact Us"]
var href =  ["index.html", "aboutus.html", "services.html", "productpage.html", "contactus.html" ]

var links2 =  [[],    [],  [], ["Cootie Genetics!", "Tap.Dot", "Tap.Dot 2"],      [],    ]
var href2 =   [[],    [], [], ["cootiegenetics.html", "tapdot.html", "tapdot2.html"],      [],   ]

var str = "";

for (i = 0; i < links.length; i++) { 

	/*<li><a href="#" data-nav-section="services"><span>Services</span></a></li>
	<li><a href="#" data-nav-section="products"><span>Products</span></a></li>
	<li><a href="#" data-nav-section="tour"><span>Tour</span></a></li>
	<li><a href="#" data-nav-section="features"><span>Features</span></a></li>
	<li><a href="#" data-nav-section="testimonials"><span>Testimonials</span></a></li>
	<li><a href="#" data-nav-section="pricing"><span>Pricing</span></a></li>*/
	var li = document.createElement("li");
	var link = document.createElement("a");
	var span = document.createElement("span");
	link.setAttribute("href", href[i]);
	link.setAttribute("data-nav-section", links[i].toLowerCase());
	link.setAttribute("class", "dropdown");
	span.innerHTML = links[i];
	link.appendChild(span);
	li.appendChild(link);
	element.appendChild(li);


	/*
	<div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  	</div>
  	*/

  	var drpdown = document.createElement("div");
  	drpdown.setAttribute("class", "dropdown-content");
  	span.appendChild(drpdown);


  	for (j=0; j < links2[i].length; j++){

  		var link2 = document.createElement("a");
  		link2.setAttribute("href", href2[i][j]);
  		link2.innerHTML = links2[i][j];
  		drpdown.appendChild(link2);

  	}
    
}