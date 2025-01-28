<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body>
   

    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <p>Phone OTP: {{ Session::get('phone_otp') }}</p>
    <p>Email OTP: {{ Session::get('email_otp') }}</p>

    <form action="{{ route('otp.verify') }}" method="POST">
        @csrf
        <div>
            <label for="phoneotp">Phone OTP:</label>
            <input type="text" id="phoneotp" name="phoneotp" required>
        </div>

        <div>
            <label for="emailotp">Email OTP:</label>
            <input type="text" id="emailotp" name="emailotp" required>
        </div>

        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
