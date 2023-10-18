<section>

    <div class="grid place-items-center">
        <header class="mb-10">
            <h2 class="text-center">
                Wachtwoord veranderen
            </h2>

            <p class="text-center">
                Gebruik minimaal 8 karakters
            </p>
        </header>

        
        <form method="post" action="{{ route('password.update') }}" class=" md:flex flex-col md:justify-center w-80">
            @csrf
            @method('put')

            <label for="current_password" class="text-center">Huidig wachtwoord:</label>
            <input id="current_password" name="current_password" type="password" autocomplete="current-password" class="text-center"/>

            <label for="password" class="text-center">Nieuw wachtwoord:</label>
            <input id="password" minlength="8" name="password" type="password"  autocomplete="new-password" class="text-center"/>

            <label for="password_confirmation" minlength="8" class="text-center">Bevestig nieuw wachtwoord:</label>
            <input id="password_confirmation" name="password_confirmation" type="password"  autocomplete="new-password" class="text-center"/>

            <button type="submit" class="btn my-3">Bevestigen</button>
        </form>
    </div>

</section>
