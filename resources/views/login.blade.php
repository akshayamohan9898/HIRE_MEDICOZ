<body>
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif
    @if(session('message'))
        <div style="color: green;">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="user_email" value="{{ old('user_email') }}" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="user_password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>

    <div>
        <a href="{{ route('password.forgot') }}">Forgot Password?</a>
    </div>
</body>
