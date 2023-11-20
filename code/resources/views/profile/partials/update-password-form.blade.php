<div class="pt-16 flex justify-center">      
    <form method="post" action="{{ route('password.update') }}" class="justify-center flex-col items-center bg-slate-200 p-4 rounded-2xl">
        @csrf
        @method('put')
        <p class="text-lg text-center mb-6">
            Gebruik minimaal 8 karakters
        </p>
        <div class="flex flex-col">
            <label for="current_password" class="text-lg">Huidig wachtwoord <span class="text-red-500">*</span></label>
            <input id="current_password" class="rounded-md" name="current_password" type="password" required autocomplete="current-password"/>
        </div>
        <div class="flex">
            <div class="flex flex-col">
                <label for="password" class="text-lg">Nieuw wachtwoord <span class="text-red-500">*</span></label>
                <input id="password" minlength="8" class="rounded-md" name="password" type="password" required autocomplete="new-password"/>
            </div>
            <div class="flex flex-col pl-4">
                <label for="password_confirmation" minlength="8" class="text-lg">Bevestig nieuw wachtwoord <span class="text-red-500">*</span></label>
                <input id="password_confirmation" class="rounded-md" name="password_confirmation" type="password" required autocomplete="new-password" />
            </div>

        </div>
        <div class="flex justify-center"><button type="submit" class="mt-4 w-3/6 rounded-md bg-nav px-3 py-2 text-sm font-semibold text-white shadow-sm">Bevestigen</button></div>
    </form>
</div>
