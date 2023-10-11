const checklistItemsvm = document.querySelectorAll('input[type="checkbox"][name^="checkboxvoormiddag"]');
const checklistItemsnm = document.querySelectorAll('input[type="checkbox"][name^="checkboxnamiddag"]');

checklistItemsvm.forEach(itemvm => {
    itemvm.addEventListener('click', function() {
        if (itemvm.checked) {
            console.log('Checkbox is checked');
            const protocolid = itemvm.getAttribute('id')
            console.log(protocolid);
        };
    });
});

checklistItemsnm.forEach(itemnm => {
    itemnm.addEventListener('click', function() {
        if (itemnm.checked) {
            console.log('Checkbox is checked');
            const protocolid = itemnm.getAttribute('id')
            console.log(protocolid);
        };
    });
});
