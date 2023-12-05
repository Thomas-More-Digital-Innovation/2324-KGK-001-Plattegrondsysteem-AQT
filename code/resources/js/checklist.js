let DateTime = luxon.DateTime;
const checklistItemsvm = document.querySelectorAll('input[type="checkbox"][name^="checkboxvoormiddag"]');
const checklistItemsnm = document.querySelectorAll('input[type="checkbox"][name^="checkboxnamiddag"]');
const datepicker = document.getElementById('datepicker');
const datetitle = document.getElementById('datetitle');

datetitle.addEventListener('click', function() {
    datepicker.showPicker();
});

datepicker.addEventListener('change', function() {
    const date = datepicker.value;
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id')
    window.location.href = `./dierefiche?id=${id}&date=${date}`;
});

//doorsturen van de status van een bepaald protocol van de voormiddag
checklistItemsvm.forEach(itemvm => {
    itemvm.addEventListener('click', function() {
        const checked = itemvm.checked ? 1 : 0;
        const local = DateTime.now().setZone('Europe/Brussels');
        const formattedDate = local.toFormat('yyyy-MM-dd HH:mm:ss');
        const inputType = itemvm.checked ? "checked" : "unchecked"; // Bepaal inputType op basis van checkbox-status
        const dierid = itemvm.getAttribute("data-dierid");
        const protocol = itemvm.getAttribute('id');
        const protocolid = protocol.replace(/checkboxvoormiddag/, '');
        window.location.href = "./checkboxitem/" + checked + "/" + inputType + "/" + dierid + "/" + formattedDate + "/" + protocolid;
    });
});

//doorsturen van de status van een bepaald protocol van de namiddag
checklistItemsnm.forEach(itemnm => {
    itemnm.addEventListener('click', function() {
        const checked = itemnm.checked ? 1 : 0;
        const local = DateTime.now().setZone('Europe/Brussels');
        const formattedDate = local.toFormat('yyyy-MM-dd HH:mm:ss');
        const inputType = itemnm.checked ? "checked" : "unchecked"; // Bepaal inputType op basis van checkbox-status
        const dierid = itemnm.getAttribute("data-dierid");
        const protocol = itemnm.getAttribute('id');
        const protocolid = protocol.replace(/checkboxnamiddag/, '');
        window.location.href = "./checkboxitem/" + checked + "/" + inputType + "/" + dierid + "/" + formattedDate + "/" + protocolid; 
    });
});
