function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleButton = passwordInput.nextElementSibling;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = '👁️';
            }
        }

        function validatePassword(password) {
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)
            };

            // Update requirement indicators
            Object.keys(requirements).forEach(req => {
                const element = document.getElementById(`${req}-req`);
                const icon = element.querySelector('.requirement-icon');
                
                if (requirements[req]) {
                    element.classList.add('valid');
                    element.classList.remove('invalid');
                    icon.textContent = '✓';
                } else {
                    element.classList.add('invalid');
                    element.classList.remove('valid');
                    icon.textContent = '✗';
                }
            });

            return Object.values(requirements).every(req => req);
        }

        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function showError(fieldId, message) {
            const field = document.getElementById(fieldId);
            const errorElement = document.getElementById(`${fieldId}-error`);
            const successElement = document.getElementById(`${fieldId}-success`);
            
            field.classList.add('error');
            field.classList.remove('success');
            errorElement.textContent = message;
            errorElement.style.display = 'block';
            
            if (successElement) {
                successElement.style.display = 'none';
            }
        }

        function showSuccess(fieldId, message = '') {
            const field = document.getElementById(fieldId);
            const errorElement = document.getElementById(`${fieldId}-error`);
            const successElement = document.getElementById(`${fieldId}-success`);
            
            field.classList.add('success');
            field.classList.remove('error');
            errorElement.style.display = 'none';
            
            if (successElement && message) {
                successElement.textContent = message;
                successElement.style.display = 'block';
            }
        }

        function clearValidation(fieldId) {
            const field = document.getElementById(fieldId);
            const errorElement = document.getElementById(`${fieldId}-error`);
            const successElement = document.getElementById(`${fieldId}-success`);
            
            field.classList.remove('error', 'success');
            errorElement.style.display = 'none';
            
            if (successElement) {
                successElement.style.display = 'none';
            }
        }

        function checkFormValidity() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const email = document.getElementById('email').value;
            const username = document.getElementById('username').value;
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const country = document.getElementById('country').value;
            
            const isPasswordValid = validatePassword(password);
            const isEmailValid = validateEmail(email);
            const doPasswordsMatch = password === confirmPassword && password.length > 0;
            const areFieldsFilled = username && firstName && lastName && country && email && password && confirmPassword;
            
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = !(isPasswordValid && isEmailValid && doPasswordsMatch && areFieldsFilled);
        }

        // Event listeners
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            validatePassword(password);
            
            const confirmPassword = document.getElementById('confirmPassword').value;
            if (confirmPassword) {
                if (password === confirmPassword) {
                    showSuccess('confirmPassword');
                } else {
                    showError('confirmPassword', 'Passwords do not match');
                }
            }
            
            checkFormValidity();
        });

        document.getElementById('confirmPassword').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (confirmPassword === '') {
                clearValidation('confirmPassword');
            } else if (password === confirmPassword) {
                showSuccess('confirmPassword');
            } else {
                showError('confirmPassword', 'Passwords do not match');
            }
            
            checkFormValidity();
        });

        document.getElementById('email').addEventListener('input', function() {
            const email = this.value;
            
            if (email === '') {
                clearValidation('email');
            } else if (validateEmail(email)) {
                showSuccess('email');
            } else {
                showError('email', 'Please enter a valid email address');
            }
            
            checkFormValidity();
        });

        // Add input listeners for other fields
        ['username', 'firstName', 'lastName', 'country'].forEach(fieldId => {
            document.getElementById(fieldId).addEventListener('input', checkFormValidity);
            document.getElementById(fieldId).addEventListener('change', checkFormValidity);
        });

        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (!validatePassword(password)) {
                alert('Please ensure your password meets all requirements.');
                return;
            }
            
            if (password !== confirmPassword) {
                alert('Passwords do not match.');
                return;
            }
            
            alert('Account created successfully! Welcome to Ceylon Panorama!');
        });

        // Add smooth animations on load
        window.addEventListener('load', function() {
            document.querySelector('.create-account-section').style.animation = 'fadeInUp 0.8s ease-out';
        });

        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        `;
        document.head.appendChild(style);