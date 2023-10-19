const checklistItemsvm = document.querySelectorAll('input[type="checkbox"][name^="checkboxvoormiddag"]');
const checklistItemsnm = document.querySelectorAll('input[type="checkbox"][name^="checkboxnamiddag"]');

//doorsturen van de status van een bepaald protocol van de voormiddag
checklistItemsvm.forEach(itemvm => {
    itemvm.addEventListener('click', function() {
        const checked = itemvm.checked ? 1 : 0;
        const currentDate = new Date(); // Create a Date object for the current date and time
        const beirutTimezoneOffset = 2 * 60; // Beirut is UTC+2, so the offset is 2 hours in minutes
        currentDate.setMinutes(currentDate.getMinutes() + beirutTimezoneOffset); // Adjust the time to Beirut timezone
        const formattedDate = currentDate.toISOString().slice(0, 19).replace("T", " ");
        const inputType = itemvm.checked ? "checked" : "unchecked"; // Bepaal inputType op basis van checkbox-status
        const dierid = itemvm.getAttribute("data-dierid");
        const protocol = itemvm.getAttribute('id');
        const protocolid = protocol.replace(/checkboxvoormiddag/, '');
        window.location.href = "checkboxitem/" + checked + "/" + inputType + "/" + dierid + "/" + formattedDate + "/" + protocolid;
    });
});

//doorsturen van de status van een bepaald protocol van de namiddag
checklistItemsnm.forEach(itemnm => {
    itemnm.addEventListener('click', function() {
        const checked = itemnm.checked ? 1 : 0;
        const currentDate = new Date(); // Create a Date object for the current date and time
        const beirutTimezoneOffset = 2 * 60; // Beirut is UTC+2, so the offset is 2 hours in minutes
        currentDate.setMinutes(currentDate.getMinutes() + beirutTimezoneOffset); // Adjust the time to Beirut timezone
        const formattedDate = currentDate.toISOString().slice(0, 19).replace("T", " ");
        const inputType = itemnm.checked ? "checked" : "unchecked"; // Bepaal inputType op basis van checkbox-status
        const dierid = itemnm.getAttribute("data-dierid");
        const protocol = itemnm.getAttribute('id');
        const protocolid = protocol.replace(/checkboxnamiddag/, '');
        window.location.href = "checkboxitem/" + checked + "/" + inputType + "/" + dierid + "/" + formattedDate + "/" + protocolid; 
    });
});
