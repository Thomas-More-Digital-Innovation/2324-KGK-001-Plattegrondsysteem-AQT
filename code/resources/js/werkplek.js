const cards = document.querySelectorAll('[id^="ds"]');

cards.forEach(ds => {
    ds.addEventListener("click", function() {
        const id = this.id;
        window.location.href = "/dierefiche?id=" + id;
    });
});