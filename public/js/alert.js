// Function to hide message after 3 seconds
setTimeout(function() {
    // Check if success message exists
    let successMessage = document.getElementById('success-message');
    if (successMessage) {
        successMessage.classList.add('fade-out');  // Add fade-out class
        setTimeout(function() {
            successMessage.style.display = 'none';  // Hide the element after fading out
        }, 500); // Wait for the fade-out transition to complete
    }

    // Check if error message exists
    let errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        errorMessage.classList.add('fade-out');  // Add fade-out class
        setTimeout(function() {
            errorMessage.style.display = 'none';  // Hide the element after fading out
        }, 500); // Wait for the fade-out transition to complete
    }
}, 3000);  // 3000 milliseconds = 3 seconds