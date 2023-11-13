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
        @if ($errors->has('message'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-1/3 mb-3 text-center" role="alert">
                {{ $errors->first('message') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.store') }}" class=" md:flex flex-col md:justify-center w-1/3 bg-gray-300 pl-6 pr-6 rounded-lg">
        @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <label for="email" class="text-center mt-6">Email</label>
            <input id="email" class="text-center rounded-full border border-black" type="email" name="email" required />

            <!-- Password -->
            <label for="password" class="text-center mt-6">Nieuw wachtwoord</label>
            <input id="password" minlength="8" class="text-center rounded-full border border-black" type="password" name="password" required/>


            <!-- Confirm Password -->
            <label for="password_confirmation" class="text-center mt-6">Herhaal wachtwoord</label>
            <input id="password_confirmation" minlength="8" class="text-center rounded-full border border-black" type="password"name="password_confirmation" required/>


            <input type="submit" value="Reset wachtwoord" class="btn py-3 rounded-full border border-black text-black bg-white my-6">
        </form>
    </div>

</body>
</html>
