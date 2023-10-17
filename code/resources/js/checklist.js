const checklistItemsvm = document.querySelectorAll('input[type="checkbox"][name^="checkboxvoormiddag"]');
const checklistItemsnm = document.querySelectorAll('input[type="checkbox"][name^="checkboxnamiddag"]');

checklistItemsvm.forEach(itemvm => {
    itemvm.addEventListener('click', function() {
        const checked = itemvm.checked ? 1 : 0;
        const currentDate = new Date();
        const formattedDate = currentDate.toISOString().slice(0, 19).replace("T", " ");
        const inputType = itemvm.checked ? "checked" : "unchecked"; // Bepaal inputType op basis van checkbox-status
        const dierid = itemvm.getAttribute("data-dierid");
        const protocol = itemvm.getAttribute('id');
        const protocolid = protocol.replace(/checkboxvoormiddag/, '');

        console.log("Checked: " + checked);
        console.log("Date: " + formattedDate);
        console.log("DierID: " + dierid);
        console.log("ProtocolID: " + protocolid);

        window.location.href = "checkboxitem/" + checked + "/" + inputType + "/" + dierid + "/" + formattedDate + "/" + protocolid;
    });
});


checklistItemsnm.forEach(itemnm => {
    itemnm.addEventListener('click', function() {
        const checked = itemnm.checked ? 1 : 0;
        const currentDate = new Date();
        const formattedDate = currentDate.toISOString().slice(0, 19).replace("T", " ");
        const inputType = itemnm.checked ? "checked" : "unchecked"; // Bepaal inputType op basis van checkbox-status
        const dierid = itemnm.getAttribute("data-dierid");
        const protocol = itemnm.getAttribute('id');
        const protocolid = protocol.replace(/checkboxnamiddag/, '');
        
        console.log(checked);
        console.log(formattedDate);
        console.log(dierid);
        console.log(protocolid);
        
        window.location.href = "checkboxitem/" + checked + "/" + inputType + "/" + dierid + "/" + formattedDate + "/" + protocolid; 
    });
});
