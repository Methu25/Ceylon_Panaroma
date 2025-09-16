document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('medicareForm');

    form.addEventListener('submit', function (e) {
        let valid = true;

        // Validate full name
        if (!form.full_name.value.trim()) valid = false;

        // Validate email
        const email = form.email.value.trim();
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!email.match(emailPattern)) valid = false;

        // Validate phone
        if (!form.phone.value.trim()) valid = false;

        // Validate age
        const age = parseInt(form.age.value);
        if (isNaN(age) || age <= 0) valid = false;

        // Validate service type
        if (!form.service_type.value) valid = false;

        if (!valid) {
            e.preventDefault();
            alert("Please fill all required fields correctly!");
        }
    });
});