const modal = document.getElementById('modal');
const closeModal = document.getElementById('closeModal');
const openModal = document.getElementById('openModal');
const date = document.getElementById('date');
const file = document.getElementById('file');
const submitModal = document.getElementById('submitModal');
const modalTitle = document.getElementById('modalTitle');
const typesubmit = document.getElementById('typesubmit');
let menu = false;

closeModal.addEventListener("click", function () {close();});
openModal.addEventListener("click", function () {open();});
date.addEventListener("change", function () {check()})
file.addEventListener("change", function () {check()})

function check() {
    if (date.value != '' && file.files.length > 0) {enable();} 
    else {disable();};
};

document.onkeydown = function(e) {
    if (!menu) { return };
    if (e.key == "Escape") { close() };
};

function disable() {
    submitModal.disabled = true;
    submitModal.classList.add('bg-red-500');
    submitModal.classList.add('hover:bg-red-400');
    submitModal.classList.remove('bg-nav');
    submitModal.classList.remove('hover:bg-nav-hover');
};

function enable() {
    submitModal.disabled = false;
    submitModal.classList.remove('bg-red-500');
    submitModal.classList.remove('hover:bg-red-400');
    submitModal.classList.add('bg-nav');
    submitModal.classList.add('hover:bg-nav-hover');
};

function open(pid, did) {
    modal.classList.add('flex');
    modal.classList.remove('hidden');
    menu = true;
    if (!pid || !did) { return; };
    enable();
    oldps.value = pid;
    oldds.value = did;
    protocolselect.value = pid;
    diersoortselect.value = did;
    modalTitle.innerText  = 'Link aanpassen';
    submitModal.innerText = 'Aanpassen';
    typesubmit.value = 'edit';
};

function close() {
    disable();
    modalTitle.innerText  = 'Protocol linken';
    submitModal.innerText = 'Toevoegen';
    typesubmit.value = 'add';
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    diersoortselect.value = 'default';
    protocolselect.value = 'default';
    menu = false;
};