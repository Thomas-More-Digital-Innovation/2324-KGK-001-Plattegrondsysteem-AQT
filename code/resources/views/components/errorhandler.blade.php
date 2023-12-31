<div class="fixed top-16 left-44 z-50" id="error-container">
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
            <button class="ml-auto px-2 py-1 rounded-md bg-red-500 text-white hover:bg-red-600 focus:outline-none" onclick="hideErrorMessage()"><b>Sluiten</b></button>
        </div>
    @endif
</div>

<div class="fixed top-16 left-44 z-50" id="succes-container">
    @if(session('succes'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Succes!</strong>
            <span class="block sm:inline">{{ session('succes') }}</span>
            <button class="ml-auto px-2 py-1 rounded-md bg-green-500 text-white hover:bg-green-600 focus:outline-none" onclick="hideSuccesMessage()"><b>Sluiten</b></button>
        </div>
    @endif
</div>

<script>
    function hideErrorMessage() {
        var errorContainer = document.getElementById('error-container');
        if (errorContainer) {
            errorContainer.style.display = 'none';
        }
    }
    function hideSuccesMessage() {
        var succesContainer = document.getElementById('succes-container');
        if (succesContainer) {
            succesContainer.style.display = 'none';
        }
    }
    
</script>