<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <form action="{{ route('password.reset') }}" method="POST">
        @csrf
        <div>
            <label>New Password</label>
            <input type="password" name="password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>
            @error('password_confirmation')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
