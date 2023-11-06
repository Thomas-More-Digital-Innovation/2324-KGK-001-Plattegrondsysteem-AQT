<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="flex flex-col justify-center items-center h-screen w-screen">
        <div >
            <p class="text-center">Wachtwoord vergeten? Geen probleem. <br>
            Geef uw email adres in en wij sturen u een link om een nieuw wachtwoord te kiezen.</p>
        </div>
        <form method="POST" action="{{ route('password.email') }}" class=" md:flex flex-col mt-6 md:justify-center w-1/3 bg-gray-300 pl-6 pr-6 rounded-lg">
            @csrf
            <!-- Email Address -->
                <label for="email" class="text-center mt-6">Email:</label>
                <input id="email" type="email" name="email" class="text-center rounded-full border border-black"/>

                <input type="submit" class="btn py-3 rounded-full border border-black text-black bg-white my-6" value="Stuur reset link">
        </form>
    </div>
</body>
</html>