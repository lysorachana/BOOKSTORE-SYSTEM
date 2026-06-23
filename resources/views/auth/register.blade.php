<style>
    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .register-card {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        width: 100%;
        max-width: 350px;
    }

    .form-title {
        text-align: center;
        color: #212529;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #6c757d;
        font-size: 0.875rem;
    }

    .form-group input {
        width: 100%;
        padding: 0.5rem 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 1rem;
    }

    .form-group input:focus {
        outline: none;
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .btn-register {
        background-color: #0d6efd;
        color: white;
        padding: 0.6rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        width: 100%;
        font-size: 1rem;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .btn-register:hover {
        background-color: #0b5ed7;
    }

    .link-login {
        display: block;
        text-align: center;
        color: #0d6efd;
        text-decoration: none;
        font-size: 0.875rem;
    }

    .link-login:hover {
        text-decoration: underline;
    }

    .error-text {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }
</style>

<div class="register-container">
    <div class="register-card">
        <h3 class="form-title">ចុះឈ្មោះ</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">ឈ្មោះ</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')<span class="error-text">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="email">អ៊ីមែល</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')<span class="error-text">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="password">ពាក្យសម្ងាត់</label>
                <input id="password" type="password" name="password" required>
                @error('password')<span class="error-text">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">បញ្ជាក់ពាក្យសម្ងាត់</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn-register">ចុះឈ្មោះ</button>
            <a href="{{ route('login') }}" class="link-login"> បានចុះឈ្មោះរួចរាល់! ចូលប្រើប្រាស់</a>
        </form>
    </div>
</div>