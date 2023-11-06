<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex justify-center items-center h-screen w-screen">
        <form method="POST" action="{{ route('password.store') }}" class=" md:flex flex-col md:justify-center w-1/3 bg-gray-300 pl-6 pr-6 rounded-lg">
        @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <label for="email" class="text-center mt-6">Email</label>
            <input id="email" class="text-center rounded-full border border-black" type="email" name="email" required />

            <!-- Password -->
            <label for="password" class="text-center mt-6">Nieuw wachtwoord</label>
            <input id="password" class="text-center rounded-full border border-black" type="password" name="password"/>


            <!-- Confirm Password -->
            <label for="password_confirmation" class="text-center mt-6">Herhaal wachtwoord</label>
            <input id="password_confirmation" class="text-center rounded-full border border-black" type="password"name="password_confirmation" required/>


            <input type="submit" value="Reset wachtwoord" class="btn py-3 rounded-full border border-black text-black bg-white my-6">
        </form>
    </div>

</body>
</html>
