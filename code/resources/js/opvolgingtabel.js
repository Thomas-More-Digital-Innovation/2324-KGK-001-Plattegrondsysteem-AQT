const modal = document.getElementById('modal');
const closeModal = document.getElementById('closeModal');
const openModal = document.getElementById('openModal');
const diersoortselect = document.getElementById('diersoortselect');
const protocolselect = document.getElementById('protocolselect');
const submitModal = document.getElementById('submitModal');

diersoortselect.addEventListener("change", function () {check()})
protocolselect.addEventListener("change", function () {check()})

function check() {
   if (diersoortselect.value != 'default' && protocolselect.value != 'default') {enable();} 
   else {disable();}
}

function disable() {
   submitModal.disabled = true;
   submitModal.classList.add('bg-red-500');
   submitModal.classList.add('hover:bg-red-400');
   submitModal.classList.remove('bg-nav');
   submitModal.classList.remove('hover:bg-nav-hover');
}

function enable() {
   submitModal.disabled = false;
   submitModal.classList.remove('bg-red-500');
   submitModal.classList.remove('hover:bg-red-400');
   submitModal.classList.add('bg-nav');
   submitModal.classList.add('hover:bg-nav-hover');
}

closeModal.addEventListener("click", function () {
   disable();
   modal.classList.add('hidden');
   diersoortselect.value = 'default';
   protocolselect.value = 'default';
   modal.classList.remove('flex');
});

openModal.addEventListener("click", function () {
   modal.classList.add('flex');
   modal.classList.remove('hidden');
});
