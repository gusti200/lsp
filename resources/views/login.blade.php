<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/js/script.js')}}"></script>
</head>
<body>
<div class="container">
<div class="logo"><img src="{{asset('assets/img/smkn1cibinong.png')}}" alt=""></div>
<div class="form-container">
    <div class="tab">
        <button class="tablinks active" onclick="openTab(event,'Student')">LOGIN SISWA</button>
        <button class="tablinks" onclick="openTab(event,'Teacher')">LOGIN WALAS</button>
    </div>
    <div class="tabcontent" id="Student" style="display: block;">
        <h2>LOGIN</h2>
        <h3>{{session('error')}}</h3>
        <form action="login-siswa" method="POST">
            @csrf
           <label for="">NISN</label>
           <input type="text" name="txt_nis" required>
           <label for="">Password</label>
           <input type="password" name="txt_pass" required>
           <button type="submit">LOGIN</button>
        </form>
    </div>
    <div class="tabcontent" id="Teacher" style="display: none;">
        <h2>LOGIN</h2>
        <h3>{{session('error')}}</h3>
        <form action="login-walas" method="POST">
            @csrf
           <label for="">NIG</label>
           <input type="text" name="txt_nig" required>
           <label for="">Password</label>
           <input type="password" name="txt_pass" required>
           <button type="submit">LOGIN</button>
        </form>
    </div>
</div>
</div>
</div>
</body>
</html>
