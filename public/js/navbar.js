function showNavBar() {
    var x = document.getElementById("navBar");
    if (x.className === "itemNav") {
      x.className = "responsive";
    } else {
      x.className = "itemNav";
    }
  }

window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
      document.getElementById("navBar").className = "itemNav";
    }
});