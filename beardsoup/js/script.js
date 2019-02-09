// Kod för dropdownmeny
// Hämtar element och lägger till en eventlistener på knappen
var mobileMenu = document.getElementById("dropdown-menu");

// Kontrollerar bredd på fönster och lägger till event listener om bredden är mindre än 800 pixlar
if (window.outerWidth < 800) {
  mobileMenu.addEventListener("click", showMenu, false);
}

// När man klickar på knappen växlar den till en annan klass som visar menyn
function showMenu() {
  document.getElementById("header").classList.toggle("dropdown");
  document.getElementById("nav-id").classList.toggle("dropdown");
}

// Om man klickar någon annanstans än på menyn stängs den
window.onclick = function(event) {
  if (!event.target.matches('#dropdown-menu')) {

    var dropdowns = document.getElementsByClassName("header-class");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('dropdown')) {
        openDropdown.classList.remove('dropdown');
      }
    }

    // Döljer innehållet i menyn när menyn försvinner från skärmen
    var showNav = document.getElementById("nav-id");
    if (showNav.classList.contains('dropdown')) {
      showNav.classList.remove('dropdown');
    }
  }
} 






//Mjuk scroll för ankarlänkar
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});