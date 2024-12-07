document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("lunch-box-form");

    // Form submission handler
    form.addEventListener("submit", (event) => {
        // Prevent form submission to allow validation
        event.preventDefault();
        document.getElementById("success-message").textContent = "";
        document.getElementById("error-message").textContent = "";
        if (validateForm()) {
            const formData = new FormData(form);

            // Send the data to the server using fetch (POST request)
            fetch("/order", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById("success-message").textContent = data.message;
                    form.reset(); // Reset the form after submission
                } else {
                    document.getElementById("error-message").textContent = "Error submitting your order.";
                }
            })
            .catch(error => {
                document.getElementById("error-message").textContent = "An error occurred.";
                console.log(error);
            });
        }
    });

    function validateForm() {
        // Reset error messages
        document.getElementById('name-error').textContent = '';
        document.getElementById('email-error').textContent = '';
        document.getElementById('phone-error').textContent = '';
        document.getElementById('lunch-box-error').textContent = '';
        document.getElementById('success-message').textContent = ''; // Clear any previous success message

        let isValid = true;

        // Validate Name
        const name = document.getElementById('name').value;
        if (!name.trim()) {
            document.getElementById('name-error').textContent = 'Name is required.';
            isValid = false;
        }

        // Validate Email
        const email = document.getElementById('email').value;
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!email.match(emailPattern)) {
            document.getElementById('email-error').textContent = 'Please enter a valid email address.';
            isValid = false;
        }

        // Validate Phone Number
        const phone = document.getElementById('phone').value;
        const phonePattern = /^[0-9]{11}$/;
        if (!phone.match(phonePattern)) {
            document.getElementById('phone-error').textContent = 'Phone number must contain 11 digits.';
            isValid = false;
        }

        // Validate Lunch Box Selection
        const lunchBox = document.getElementById('lunch-box').value;
        if (!lunchBox) {
            document.getElementById('lunch-box-error').textContent = 'Please select a lunch box.';
            isValid = false;
        }

        return isValid;
    }
});
