const checklistItemsvm = document.querySelectorAll('input[type="checkbox"][name^="checkboxvoormiddag"]');
const checklistItemsnm = document.querySelectorAll('input[type="checkbox"][name^="checkboxnamiddag"]');

checklistItemsvm.forEach(itemvm => {
    itemvm.addEventListener('click', function() {
        if (itemvm.checked) {
            const checked = 1;
            const currentDate = new Date();
            const formattedDate = currentDate.toISOString().slice(0, 19).replace("T", " ");
            const inputType = "checked";
            const dierid = itemvm.getAttribute("data-dierid");
            const protocol = itemvm.getAttribute('id');
            const protocolid = protocol.replace(/checkboxvoormiddag/, '')
            console.log("Checked :" + checked);
            console.log("date " +formattedDate);
            console.log("dierid " + dierid);
            console.log("protocolid " + protocolid);
            window.location.href = "checkboxitem/" + checked + "/" + inputType + "/" + dierid + "/" + formattedDate + "/" + protocolid; 
        };
    });
});

checklistItemsnm.forEach(itemnm => {
    itemnm.addEventListener('click', function() {
        if (itemnm.checked) {
            const checked = 1;
            const currentDate = new Date();
            const formattedDate = currentDate.toISOString().slice(0, 19).replace("T", " ");
            const inputType = "checked"
            const dierid = itemnm.getAttribute("data-dierid");
            const protocol = itemnm.getAttribute('id');
            const protocolid = protocol.replace(/checkboxnamiddag/, '');
            console.log(checked);
            console.log(formattedDate);
            console.log(dierid);
            console.log(protocolid);
            window.location.href = "checkboxitem/" + checked + "/" + inputType + "/" + dierid + "/" + formattedDate + "/" + protocolid; 
        };
    });
});
