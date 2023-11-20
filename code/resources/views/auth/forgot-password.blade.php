<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
</head>
<body>

    

    <div class="flex flex-col justify-center items-center h-screen w-screen">
        <div >
            <p class="text-center mb-3"><a href="/"><iconify-icon icon="mingcute:arrow-left-fill" width="25" heigth="25"></iconify-icon></a>Wachtwoord vergeten? Geen probleem. <br>
            Geef uw email adres in en wij sturen u een link om een nieuw wachtwoord te kiezen.</p>
        </div>

        @if (Session::has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-1/3 mb-3 text-center" role="alert">
                    {{ Session::get('success') }}
            </div>
        @endif

        @if ($errors->has('message'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-1/3 mb-3 text-center" role="alert">
                {{ $errors->first('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class=" md:flex flex-col md:justify-center w-1/3 bg-gray-300 pl-6 pr-6 rounded-lg">
            @csrf
            <!-- Email Address -->
                <label for="email" class="text-center mt-6">Email:</label>
                <input id="email" type="email" name="email" class="text-center rounded-full border border-black"/>

                <input type="submit" class="cursor-pointer bg-nav hover:bg-nav-hover btn py-3 rounded-full border border-black text-white my-6" value="Stuur reset link">
        </form>
    </div>
</body>
</html>