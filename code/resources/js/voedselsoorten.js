const cards = document.querySelectorAll('[id^="vt"]');
console.log(cards);

cards.forEach(vt => {
    vt.addEventListener("click", function() {
        const id = this.id;
        window.location.href = "/voedsel?id=" + id;
    });
});