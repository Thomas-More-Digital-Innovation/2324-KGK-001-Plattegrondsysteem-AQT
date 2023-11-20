const cards = document.querySelectorAll('[id^="ds"]');

function addZ(n){return n<10? '0'+n:''+n;}

cards.forEach(ds => {
    ds.addEventListener("click", function() {
        const id = this.id;
        const date = new Date();
        let day = addZ(date.getDate());
        let month = addZ(date.getMonth() + 1);
        let year = date.getFullYear();
        window.location.href = `/dierefiche?id=${id}&date=${year}-${month}-${day}`;
    });
});