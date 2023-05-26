<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Bootstrap Multi Step Form</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

  <link href="assets_acceuil\css\header_style.css" rel="stylesheet">
</head>
<body>

    <!-- ======= Header ======= -->
    @include('layouts.navbar')
    <!-- End #header -->
<div class="content" style="margin-top: 150px">
 
  <form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div class="block">
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
    </div>

    <div class="mt-4">
        <x-label for="password" value="{{ __('Password') }}" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
    </div>

    <div class="mt-4">
        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-button>
            {{ __('Reset Password') }}
        </x-button>
    </div>
</form>
</div>
<script  src="function.js"></script>

</body>
</html>
