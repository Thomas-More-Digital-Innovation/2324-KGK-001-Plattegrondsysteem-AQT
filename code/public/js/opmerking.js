const opmerkingen = document.querySelectorAll('[id^="opmerking"]')

opmerkingen.forEach(opmerking => {
    opmerking.addEventListener("change", function () {
        const changedElement = event.target;
        let newValue = changedElement.value;

        // Controleer of newValue leeg is of alleen uit spaties bestaat
        if (newValue.trim() === '') {
            // Voeg een spatie toe als het veld leeg is
            newValue = ' ';
        }

        const opmerkingtype = opmerking.getAttribute('id');
        const dierid = opmerking.getAttribute("data-dierid");
        const type = opmerkingtype.split("_")[1];

        // "/" doormiddel "&2F" vervangen in DB --> wordt in het protocol.blade.php terug vervangen naar een "/" doormiddel van str_replace
        const escapedValue = encodeURIComponent(newValue.replace(/[/]/g, '%2F'));

        window.location.href = "./comment/" + escapedValue + "/" + type + "/" + dierid;
    });
});
