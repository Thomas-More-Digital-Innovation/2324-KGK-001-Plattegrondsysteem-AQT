const modal = document.getElementById('modal');
const closeModal = document.getElementById('closeModal');
const openModal = document.getElementById('openModal');
const nameinput = document.getElementById('name');
const iconinput = document.getElementById('icon');
const colorinput = document.getElementById('color');
const idhidden = document.getElementById('id');
const submitModal = document.getElementById('submitModal');
const modalTitle = document.getElementById('modalTitle');
const typesubmit = document.getElementById('typesubmit');
const edit = document.querySelectorAll('[id^="edit"]');
let menu = false;
const items = [nameinput, iconinput];

items.forEach(i => {i.addEventListener("change", function () {check()})});
closeModal.addEventListener("click", function () {close();});
openModal.addEventListener("click", function () {open();});

edit.forEach(eo => {
    eo.addEventListener("click", function() {
        const idfull = eo.getAttribute('id');
        const [_, id, name, icon, color] = idfull.split('/');
        open(id, name, icon, color);
    });
});

function check() {
    let empty = false;
    items.forEach(i => {if (i.value == "") { empty = true; }; });
    if (!empty) { return enable(); };
    return disable();
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


document.onkeydown = function(e) {
    if (!menu) { return };
    if (e.key == "Escape") { close() };
};

function open(id, name, icon, color) {
    modal.classList.add('flex');
    modal.classList.remove('hidden');
    menu = true;
    if (!name || !icon || !color) { return; };
    enable();
    nameinput.value = name;
    iconinput.value = icon;
    colorinput.value = "#"+color;
    colorinput.value = "#"+color;
    idhidden.value = id;
    modalTitle.innerText  = 'Voedingsrichtlijn aanpassen';
    submitModal.innerText = 'Aanpassen';
    typesubmit.value = 'edit';
};

function close() {
    disable();
    modalTitle.innerText  = 'Voedingsrichtlijn toevoegen';
    submitModal.innerText = 'Toevoegen';
    typesubmit.value = 'add';
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    items.forEach(i => { i.value = ""; });
    colorinput.value = '#000000';
    menu = false;
};