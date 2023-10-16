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
            console.log(opmerkingtype);
            const type = opmerkingtype.split("_")[1];
            console.log(type);

            // "/" doormiddel "&2F" vervangen in DB --> wordt in het protocol.blade.php terug vervangen naar een "/" doormiddel van str_replace
            const escapedValue = encodeURIComponent(newValue.replace(/[/]/g, '%2F'));

            window.location.href = "comment/" + escapedValue + "/" + type + "/" + dierid;
            console.log(escapedValue);
        }
    });
});