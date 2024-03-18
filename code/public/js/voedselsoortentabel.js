const modal = document.getElementById('modal');
const closeModal = document.getElementById('closeModal');
const openModal = document.getElementById('openModal');
const voedselsoortinput = document.getElementById('voedselsoort');
const voedingsrichtlijninput = document.getElementById('voedingsrichtlijn');
const idhidden = document.getElementById('id');
const submitModal = document.getElementById('submitModal');
const modalTitle = document.getElementById('modalTitle');
const typesubmit = document.getElementById('typesubmit');
const edit = document.querySelectorAll('[id^="edit"]');
const uploadInput = document.getElementById('upload');
const filenameLabel = document.getElementById('filename');
const imagePreview = document.getElementById('image-preview');
let menu = false;
let isEventListenerAdded = false;
const items = [voedselsoort];

items.forEach(i => {i.addEventListener("change", function () {check()})});
closeModal.addEventListener("click", function () {close();});
openModal.addEventListener("click", function () {open();});

edit.forEach(eo => {
    eo.addEventListener("click", function() {
        const idfull = eo.getAttribute('id');
        const [_, id, vn, rn, d, icon, icon2] = idfull.split('/');
        open(id, vn, rn, icon, icon2);
    });
});

function check() {
    let empty = false;
    items.forEach(i => {if (i.value == "") { empty = true; }; });
    if (voedingsrichtlijninput.value == "default") { empty = true; };
    if (uploadInput.value == "") { empty = true; };
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

function open(id, vn, rn, icon, icon2) {
    modal.classList.add('flex');
    modal.classList.remove('hidden');
    menu = true;
    if (!vn || !rn || !icon) { return; };
    enable();
    voedingsrichtlijninput.value = rn;
    voedselsoortinput.value = vn;
    imagePreview.innerHTML = `<img src="${icon+'/'+icon2}" class="max-h-full" alt="Image preview" />`;
    imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400', 'p-6');
    filenameLabel.innerHTML = `(${icon2})`;
    if (!isEventListenerAdded) {
        imagePreview.addEventListener('click', () => {
            uploadInput.click();
        });

        isEventListenerAdded = true;
    }
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
    voedingsrichtlijninput.value = "default";
    filenameLabel.textContent = '*';
    imagePreview.innerHTML = `<label for="upload" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload foto</h5>
                                <p class="font-normal text-sm text-gray-400 md:px-6"><b class="text-gray-600">JPG, PNG, or GIF</b> formaat.</p>
                            </label>`;
    imagePreview.classList.remove('p-6');
    imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400', 'p-2');

    imagePreview.removeEventListener('click', () => {uploadInput.click();});

    menu = false;
};



uploadInput.addEventListener('change', (event) => {
    check();
    const file = event.target.files[0];

    if (file) {
        filenameLabel.innerHTML = `(${file.name})`;

        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.innerHTML = `<img src="${e.target.result}" class="max-h-full" alt="Image preview" />`;
            imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400', 'p-6');
            if (!isEventListenerAdded) {
                imagePreview.addEventListener('click', () => {
                uploadInput.click();
                });

                isEventListenerAdded = true;
            }
        };
        reader.readAsDataURL(file);
    } else {
        filenameLabel.textContent = '*';
        imagePreview.innerHTML = `<div class="bg-gray-200 h-full w-full rounded-lg flex items-center justify-center text-gray-500">Geen foto geupload</div>`;
        imagePreview.classList.remove('p-6');
        imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400', 'p-2');

        imagePreview.removeEventListener('click', () => {uploadInput.click();});

        isEventListenerAdded = false;
    }
});

uploadInput.addEventListener('click', (event) => { event.stopPropagation(); });