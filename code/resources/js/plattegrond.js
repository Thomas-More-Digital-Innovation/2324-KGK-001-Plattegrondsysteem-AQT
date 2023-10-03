const wps = document.querySelectorAll('[id^="wp"], [id^="biotoopstelling"]')

wps.forEach(wp => {
   const id = wp.getAttribute('id')
   const defaultColor = wp.getAttribute('fill')
   wp.addEventListener("mouseenter", function () { wp.setAttribute('fill', '#ddd') });
   wp.addEventListener("mouseleave", function () { wp.setAttribute('fill', defaultColor) });
   wp.addEventListener("click", function () { window.location.href = "home#"+id; });
});