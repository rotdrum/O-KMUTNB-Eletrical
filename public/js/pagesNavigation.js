const firstLinks = document.querySelectorAll(".first a");

// JS code needed for first pagination effect
firstLinks.forEach(link => {
    link.addEventListener("mouseover", mouseOverEvent);
    link.addEventListener("mouseleave", mouseLeaveEvent);
  });
  
  function mouseOverEvent(e) {
    firstLinks.forEach(link => {
      link.style.opacity = 0.7;
    });
  
    e.target.style.opacity = 1;
    e.target.style.transform = "scale(1.2)";
  }
  
  function mouseLeaveEvent(e) {
    firstLinks.forEach(link => {
      link.style.opacity = 1;
      e.target.style.transform = "scale(1)";
    });
  }