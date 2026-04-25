<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login — Kalpak Billing</title>
  <link href="{{ asset('/assets/css/style.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('/assets/css/login.css') }}" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  
</head>
<body>

  {{-- Animated Background Elements --}}
  <div class="bg-decoration decoration-1"></div>
  <div class="bg-decoration decoration-2"></div>

  <div class="login-container">
    <div class="login-card">

      {{-- Logo Section --}}
      <div class="login-logo">
        <div class="logo-icon">
          <i class="mdi mdi-receipt"></i>
        </div>
        <h2>Kalpak Billing</h2>
        <p>Secure Access to Your Billing Portal</p>
      </div>

      {{-- Alerts --}}
      @if(session('error') || session('success'))
        <div class="alert-container">
          @if(session('error'))
            <div class="alert alert-danger">
              <i class="fas fa-exclamation-circle"></i>
              {{ session('error') }}
            </div>
          @endif
          @if(session('success'))
            <div class="alert alert-success">
              <i class="fas fa-check-circle"></i>
              {{ session('success') }}
            </div>
          @endif
        </div>
      @endif

      {{-- Login Form --}}
      <form action="{{ route('login.post') }}" method="POST" id="loginForm">
        @csrf

        {{-- Username Field --}}
        <div class="form-group">
          <label class="form-label" for="username">Username</label>
          <div class="form-input-wrapper">
            <i class="fas fa-user form-input-icon"></i>
            <input 
              type="text" 
              id="username"
              name="username"
              class="form-control @error('username') is-invalid @enderror"
              placeholder="Enter your username"
              value="{{ old('username') }}"
              autofocus 
              required>
          </div>
          @error('username')
            <div class="error-message">
              <i class="fas fa-info-circle"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- Password Field --}}
        <div class="form-group">
          <label class="form-label" for="password">Password</label>
          <div class="form-input-wrapper">
            <i class="fas fa-lock form-input-icon"></i>
            <input 
              type="password" 
              id="password"
              name="password"
              class="form-control @error('password') is-invalid @enderror"
              placeholder="Enter your password"
              required>
            <i class="fas fa-eye password-toggle" id="eye-icon" onclick="togglePassword()"></i>
          </div>
          @error('password')
            <div class="error-message">
              <i class="fas fa-info-circle"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn-login" id="submitBtn">
          <i class="fas fa-sign-in-alt"></i>
          <span id="btnText">Sign In</span>
        </button>

      </form>

    </div>
  </div>

  <script>
    // Toggle Password Visibility
    function togglePassword() {
      const input = document.getElementById('password');
      const icon = document.getElementById('eye-icon');
      const isPassword = input.type === 'password';
      
      input.type = isPassword ? 'text' : 'password';
      icon.className = isPassword ? 'fas fa-eye-slash password-toggle' : 'fas fa-eye password-toggle';
    }

    // Form Submission Handler
    const loginForm = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');

    loginForm.addEventListener('submit', function(e) {
      submitBtn.classList.add('loading');
      btnText.innerHTML = '<span class="spinner"></span> Signing in...';
    });

    // Prevent multiple submissions
    loginForm.addEventListener('submit', function(e) {
      if (submitBtn.disabled) {
        e.preventDefault();
      }
      submitBtn.disabled = true;
      setTimeout(() => {
        submitBtn.disabled = false;
      }, 3000);
    });
  </script>

</body>
</html>