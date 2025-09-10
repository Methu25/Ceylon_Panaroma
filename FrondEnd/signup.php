<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceylon Panorama - Create Account</title>
    <link rel="stylesheet" href="css/signup.css">
    <script src="js/signup.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="logo-section">
            <div class="logo">CP</div>
            <span class="brand-name">Ceylon Panorama</span>
        </div>
        <div class="nav-links">
            <a href="home.php" class="nav-link ">Home</a>
            <button class="sign-in-btn">Sign In</button>
        </div>
    </nav>

    <div class="main-container">
        <div class="create-account-section">
            <h2 class="form-title">Create new account</h2>
            <p class="form-subtitle">Join us to explore the beauty of Sri Lanka</p>
            
            <form id="registrationForm">
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-input" id="username" placeholder="Enter your username" required>
                    <div class="error-message" id="username-error"></div>
                </div>

                <div class="form-group">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-input" id="firstName" placeholder="Enter your first name" required>
                    <div class="error-message" id="firstName-error"></div>
                </div>

                <div class="form-group">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-input" id="lastName" placeholder="Enter your last name" required>
                    <div class="error-message" id="lastName-error"></div>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-input" id="email" placeholder="Enter your email address" required>
                    <div class="error-message" id="email-error"></div>
                    <div class="success-message" id="email-success">Valid email format</div>
                </div>

                <div class="form-group">
                    <label class="form-label">Country</label>
                    <select class="form-select" id="country" required>
                        <option value="">Select your country</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="US">United States</option>
                        <option value="UK">United Kingdom</option>
                        <option value="CA">Canada</option>
                        <option value="AU">Australia</option>
                        <option value="IN">India</option>
                        <option value="DE">Germany</option>
                        <option value="FR">France</option>
                        <option value="JP">Japan</option>
                        <option value="CN">China</option>
                        <option value="SG">Singapore</option>
                        <option value="MY">Malaysia</option>
                        <option value="TH">Thailand</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="NL">Netherlands</option>
                        <option value="IT">Italy</option>
                        <option value="ES">Spain</option>
                        <option value="BR">Brazil</option>
                        <option value="MX">Mexico</option>
                        <option value="ZA">South Africa</option>
                    </select>
                    <div class="error-message" id="country-error"></div>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div style="position: relative;">
                        <input type="password" class="form-input" id="password" placeholder="Enter your password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword('password')">👁️</button>
                    </div>
                    <div class="password-requirements">
                        <div class="requirement" id="length-req">
                            <span class="requirement-icon">✗</span>
                            <span>At least 8 characters</span>
                        </div>
                        <div class="requirement" id="uppercase-req">
                            <span class="requirement-icon">✗</span>
                            <span>At least one uppercase letter</span>
                        </div>
                        <div class="requirement" id="lowercase-req">
                            <span class="requirement-icon">✗</span>
                            <span>At least one lowercase letter</span>
                        </div>
                        <div class="requirement" id="number-req">
                            <span class="requirement-icon">✗</span>
                            <span>At least one number</span>
                        </div>
                        <div class="requirement" id="special-req">
                            <span class="requirement-icon">✗</span>
                            <span>At least one special character</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <div style="position: relative;">
                        <input type="password" class="form-input" id="confirmPassword" placeholder="Re-enter your password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">👁️</button>
                    </div>
                    <div class="error-message" id="confirmPassword-error"></div>
                    <div class="success-message" id="confirmPassword-success">Passwords match!</div>
                </div>

                <button type="submit" class="create-account-btn" id="submitBtn" disabled>Create Account</button>
            </form>

            <div class="login-link">
                Already have an account? <a href="signin.php">Log In</a>
            </div>
        </div>
    </div>
</body>
</html>