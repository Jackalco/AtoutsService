function showNavBar() {
    var x = document.getElementById("navBar");
    if (x.className === "navButtonContainer") {
      x.className = "responsive";
    } else {
      x.className = "navButtonContainer";
    }
  }

window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
      document.getElementById("navBar").className = "navButtonContainer";
    }
});