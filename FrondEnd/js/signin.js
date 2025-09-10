function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordField.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }

        function showForgotPassword() {
            document.getElementById('forgotPasswordModal').style.display = 'flex';
        }

        function closeForgotPassword() {
            document.getElementById('forgotPasswordModal').style.display = 'none';
            document.getElementById('resetEmail').value = '';
        }

        function sendResetLink() {
            const email = document.getElementById('resetEmail').value;
            if (email && email.includes('@')) {
                alert('Password reset link sent to ' + email + '! Check your inbox. 📧');
                closeForgotPassword();
            } else {
                alert('Please enter a valid email address.');
            }
        }

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const loginBtn = document.getElementById('loginBtn');
            const inputs = this.querySelectorAll('input[required]');
            let isValid = true;
            
            // Validate inputs
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.style.borderColor = '#ef4444';
                    isValid = false;
                } else {
                    input.style.borderColor = 'rgba(208, 196, 185, 0.5)';
                }
            });
            
            if (isValid) {
                // Show loading state
                loginBtn.disabled = true;
                loginBtn.innerHTML = '<span class="loading"></span> Logging in...';
                
                // Simulate login process
                setTimeout(() => {
                    const rememberMe = document.getElementById('rememberMe').checked;
                    const username = inputs[0].value;
                    
                    alert(`Welcome back${rememberMe ? ' (remembered)' : ''}! 🏝️\nLogging in as: ${username}`);
                    
                    // Reset button
                    loginBtn.disabled = false;
                    loginBtn.innerHTML = 'Log In';
                }, 2000);
            } else {
                alert('Please fill in all required fields.');
            }
        });

        // Add floating animation to form
        const form = document.querySelector('.login-form');
        let start = null;
        
        function animate(timestamp) {
            if (!start) start = timestamp;
            const progress = timestamp - start;
            
            form.style.transform = `translateY(${Math.sin(progress * 0.001) * 3}px)`;
            
            requestAnimationFrame(animate);
        }
        
        requestAnimationFrame(animate);

        // Close modal when clicking outside
        document.getElementById('forgotPasswordModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeForgotPassword();
            }
        });