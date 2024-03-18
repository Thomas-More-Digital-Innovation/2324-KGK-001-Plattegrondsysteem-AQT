const modal = document.getElementById('modal');
const closeModal = document.getElementById('closeModal');
const openModal = document.getElementById('openModal');
const diersoortselect = document.getElementById('diersoortselect');
const protocolselect = document.getElementById('protocolselect');
const submitModal = document.getElementById('submitModal');
const modalTitle = document.getElementById('modalTitle');
const typesubmit = document.getElementById('typesubmit');
const editopvolgingen = document.querySelectorAll('[id^="editopvolging"]');
const oldps = document.getElementById('oldps');
const oldds = document.getElementById('oldds');
let menu = false;

diersoortselect.addEventListener("change", function () {check()})
protocolselect.addEventListener("change", function () {check()})
closeModal.addEventListener("click", function () {close();});
openModal.addEventListener("click", function () {open();});

editopvolgingen.forEach(eo => {
    eo.addEventListener("click", function() {
        const idfull = eo.getAttribute('id');
        const [id, pid, did] = idfull.split('/');
        open(pid, did);
    });
});

function check() {
    if (diersoortselect.value != 'default' && protocolselect.value != 'default') {enable();} 
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