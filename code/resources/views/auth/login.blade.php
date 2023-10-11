<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="grid place-items-center h-screen">
        <auth-session-status :status="session('status')" />
        <x-application-logo class="w-20 h-20 mx-auto"/>
        <form method="POST" action="{{ route('login') }}" class=" md:flex flex-col md:justify-center w-80">
            @csrf

            <!-- username Address -->
            <label for="username" class="text-center">Gebruikersnaam:</label>
            <input id="username" type="text" name="username" :value="old('username')" 
            required autofocus autocomplete="username"
            class="text-center"/>
            <!-- <input-error :messages="$errors->get('username')"/> -->

            <!-- Password -->
            <label for="password" class="text-center">Wachtwoord:</label>

            <input id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            class="text-center"/>

            <!-- <input-error :messages="$errors->get('password')" /> -->

            <input type="submit" value="Aanmelden">
        </form>
    </div>
    <!-- Session Status -->


</body>
</html>