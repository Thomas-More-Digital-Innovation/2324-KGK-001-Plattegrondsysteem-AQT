const opmerkingen = document.querySelectorAll('[id^="opmerking"]')

opmerkingen.forEach(opmerking => {
    opmerking.addEventListener("change", function () {
        const changedElement = event.target;
        const newValue = changedElement.value;
        // Voeg een voorwaarde toe om te controleren of newValue niet leeg is
        if (newValue.trim() !== '') {
            const opmerkingtype = opmerking.getAttribute('id');
            const dierid = opmerking.getAttribute("data-dierid");
            console.log(dierid);
            console.log(opmerkingtype)
            const type = opmerkingtype.split("_")[1];
            console.log(type);
            window.location.href = "comment/" + newValue + "/" + type + "/" + dierid; 
            console.log(newValue);
        }
    })
});