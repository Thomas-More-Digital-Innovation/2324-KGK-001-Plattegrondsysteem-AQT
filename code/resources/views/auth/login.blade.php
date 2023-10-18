<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="flex justify-center items-center h-screen w-screen">
        <auth-session-status :status="session('status')" />
        <x-application-logo class="w-40 h-40 mx-auto mb-6"/>

        <iconify-icon icon="emojione-monotone:turtle" width="200" height="200" class="absolute bottom-0 right-0 opacity-30"></iconify-icon>
        <iconify-icon icon="game-icons:sand-snake" width="200" height="200" class="absolute top-0 left-0 opacity-30"></iconify-icon>
        <iconify-icon icon="ion:fish-outline" width="200" height="200" class="absolute bottom-0 left-0 opacity-30"></iconify-icon>
        <iconify-icon icon="fluent-emoji-high-contrast:lizard" flip="vertical" width="200" height="200" class="absolute top-0 right-0 opacity-30"></iconify-icon>


        @if ($errors->has('message'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3 text-center" role="alert">
                {{ $errors->first('message') }}
            </div>
        @endif


        <form method="POST" action="{{ route('login') }}" class=" md:flex flex-col md:justify-center w-screen/3 bg-gray-300 pl-6 pr-6 rounded-lg">
            @csrf

            <!-- username Address -->
            <label for="username" class="text-center mt-6">Gebruikersnaam:</label>
            <input id="username" type="text" name="username" :value="old('username')" 
            required autofocus autocomplete="username"
            class="text-center rounded-full border border-black" />
            <!-- <input-error :messages="$errors->get('username')"/> -->

            <!-- Password -->
            <label for="password" class="text-center mt-6">Wachtwoord:</label>

            <input id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            class="text-center rounded-full border border-black"/>

            <!-- <input-error :messages="$errors->get('password')" /> -->

            <button type="submit" class="btn py-3 rounded-full border border-black text-black bg-white my-6">Aanmelden</button>
        </form>
        <p class="mt-5">Made by Digital Innovation Thomas More Geel</p>
    </div>
    <!-- Session Status -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
</html>