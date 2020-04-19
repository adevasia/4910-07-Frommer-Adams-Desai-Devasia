// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}

 function myFunc() { 
           window.location.href="search_catalog.php"; 
 } 

 function myFunc2() { 
           window.location.href="sponsor_searchCatalog.php"; 
 } 

 function myFunc3() { 
           window.location.href="admin_searchCatalog.php"; 
 } 