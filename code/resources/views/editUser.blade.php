<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Gebruiker aanpassen</h1>
    <form action="{{ url('updateuser/'.$user->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="firstname">First name:</label><br>
        <input type="text" id="firstname" name="firstname" value="{{$user->firstname}}" placeholder="John" class="text-black" required><br>
        <label for="lastname">Last name:</label><br>
        <input type="text" id="lastname" name="lastname" placeholder="Doe" value="{{$user->lastname}}" class="text-black" required><br>
        <label for="username">User name:</label><br>
        <input type="text" id="username" name="username" placeholder="JohnDoe" value="{{$user->username}}" class="text-black" required><br>

        <input type="radio" id="student" name="role" value="2" @if($user->roleid === 2) checked @endif required>
        <label for="student">student</label><br>
        <input type="radio" id="dierenarts" name="role" value="3" @if($user->roleid === 3) checked @endif>
        <label for="dierenarts">dierenarts</label><br>
        <input type="radio" id="leerkracht" name="role" value="4" @if($user->roleid === 4) checked @endif>
        <label for="leerkracht">leerkracht</label><br>

        <input type="submit" value="Submit">
    </form> 
</body>
</html>