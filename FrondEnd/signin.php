<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceylon Panorama - Log In</title>
    <link rel="stylesheet" href="css/signin.css">
    <script src="js/signin.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <span class="logo-icon"></span>
                    <span>Ceylon Panorama</span>
                </div>
                <div class="nav-right">
                    <ul class="nav-links">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="signup.php" class="active">Sign up</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="content-wrapper">
                <div class="left-content">
                    <h3>Welcome Back</h3>
                    <h1>Ready for your next <span class="highlight">adventure</span>? Let's get you logged in!</h1>
                    <div class="action-buttons">
                        <a href="home.php" class="btn btn-outline">Explore Destinations</a>
                        <a href="products.php" class="btn btn-primary">View Deals</a>
                    </div>
                </div>

                <div class="login-form">
                    <h2 class="form-title">Welcome back.</h2>
                    <p class="form-subtitle">Sign in to your account</p>
                    
                    <form id="loginForm">
                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="text" class="form-control" placeholder="Enter your username or email" required>
                            <span class="form-icon"></span>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Enter your password" id="password" required>
                            <span class="form-icon password-toggle" onclick="togglePassword()"></span>
                        </div>

                        <div class="form-options">
                            <label class="remember-me">
                                <input type="checkbox" id="rememberMe">
                                <span>Remember me</span>
                            </label>
                            <a href="#" class="forgot-password" onclick="showForgotPassword()">Forgot Password?</a>
                        </div>

                        <button type="submit" class="login-btn" id="loginBtn">
                            Log In
                        </button>

                        <div class="social-divider">
                            <span>or continue with</span>
                        </div>

                        <div class="social-buttons">
                            <a href="#" class="social-btn">
                                <span></span> Google
                            </a>
                            <a href="#" class="social-btn">
                                <span></span> Facebook
                            </a>
                        </div>

                        <div class="signup-link">
                            Don't have an account? <a href="signup.php">Sign up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Forgot Password Modal -->
    <div id="forgotPasswordModal" class="modal">
        <div class="modal-content">
            <h3>Reset Password</h3>
            <p>Enter your email address and we'll send you a link to reset your password.</p>
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" id="resetEmail" class="form-control" placeholder="Enter your email">
            </div>
            
            <div class="modal-buttons">
                <button onclick="closeForgotPassword()" class="modal-btn cancel">Cancel</button>
                <button onclick="sendResetLink()" class="modal-btn primary">Send Reset Link</button>
            </div>
        </div>
    </div>
</body>
</html>