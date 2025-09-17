// transport.js

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('transportForm');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        // Get all form values
        const fullName = form.full_name.value.trim();
        const email = form.email.value.trim();
        const vehicle = form.vehicle.value;
        const passengers = form.passengers.value.trim();
        const pickup = form.pickup.value.trim();
        const drop = form.drop.value.trim();
        const date = form.date.value;
        const time = form.time.value;
        const budget = form.budget.value;

        // Basic validation
        if (!fullName || !email || !vehicle || !passengers || !pickup || !drop || !date || !time || !budget) {
            alert("Please fill in all required fields.");
            return;
        }

        // Email validation
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        // Passengers validation
        if (isNaN(passengers) || passengers <= 0) {
            alert("Please enter a valid number of passengers.");
            return;
        }

        // Date validation (cannot book past dates)
        const today = new Date();
        const selectedDate = new Date(date);
        today.setHours(0, 0, 0, 0);
        if (selectedDate < today) {
            alert("Please select a valid date.");
            return;
        }

        // If all validations pass, submit the form
        form.submit();
    });
});