<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f3f4f6;
        font-family: Arial, sans-serif;
    }

    .login-card {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 300px;
    }

    .login-title {
        text-align: center;
        margin-top: 0;
        margin-bottom: 1.5rem;
        color: #1f2937;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #374151;
        font-size: 0.875rem;
    }

    .form-group input[type="email"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 0.5rem 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 1rem;
    }

    .form-group input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
    }

    .form-actions {
        align-items: center;
        margin-top: 1.5rem;
        text-align: center;
        wi
    }

    .btn-submit {
        background-color: #2563eb;
        color: white;
        padding: 0.5rem 1.25rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-submit:hover {
        background-color: #1d4ed8;
    }

    .link-register {
        color: #2563eb;
        text-decoration: none;
        font-size: 0.875rem;
    }

    .link-register:hover {
        text-decoration: underline;
    }

    .error-msg {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
        display: block;
    }
    button {
        width: 100%;
    }
</style>

<div class="login-container">
    <div class="login-card">
        <h2 class="login-title">ចូលប្រើប្រាស់ប្រព័ន្ធ</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">អ៊ីមែល</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">ពាក្យសម្ងាត់</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="display: flex; align-items: center;">
                <input id="remember_me" type="checkbox" name="remember" style="margin-right: 0.5rem;">
                <label for="remember_me" style="margin-bottom: 0; cursor: pointer;">ចងចាំខ្ញុំ</label>
            </div>


            <button type="submit" class="btn-submit">
                ចូលប្រើប្រាស់
            </button>

            <div class="form-actions">
                <a href="{{ route('register') }}" class="link-register">គ្មានគណនី? ចុះឈ្មោះ</a>
            </div>
        </form>
    </div>
</div>