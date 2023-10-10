const cards = document.querySelectorAll('[id^="ds"]');
console.log(cards);

cards.forEach(ds => {
    ds.addEventListener("click", function() {
        const id = this.id;
        window.location.href = "/dierefiche?id=" + id;
    });
});