// Haal de knopelementen op
const popupTrigger = document.getElementById("popupTrigger");
const closePopupButton = document.getElementById("closePopup");
const popup = document.getElementById("popup");

// Voeg een klikgebeurtenisluisteraar toe aan het knopelement om het popupvenster te tonen
popupTrigger.addEventListener("click", function () {
    popup.classList.remove("hidden");
});

// Voeg een klikgebeurtenisluisteraar toe aan de sluitknop om het popupvenster te verbergen
closePopupButton.addEventListener("click", function () {
    popup.classList.add("hidden");
});

