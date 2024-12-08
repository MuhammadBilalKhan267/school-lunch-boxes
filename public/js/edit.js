document.addEventListener("DOMContentLoaded", () => {
    const editFormModal = document.getElementById("edit-form-modal");
    const editForm = document.getElementById("edit-service-form");
    const cancelEditBtn = document.getElementById("cancel-edit-btn");

    const nameInput = document.getElementById("edit-service-name");
    const descriptionInput = document.getElementById("edit-service-description");
    const imgInput = document.getElementById("edit-service-img");
    const serviceIdInput = document.getElementById("edit-service-id");

    // Show edit form when "Edit" button is clicked
    document.querySelectorAll(".edit-btn").forEach(button => {
        button.addEventListener("click", () => {
            const serviceId = button.dataset.id;
            const serviceName = button.dataset.name;
            const serviceDescription = button.dataset.description;
            const serviceImg = button.dataset.img;

            // Populate form fields
            serviceIdInput.value = serviceId;
            nameInput.value = serviceName;
            descriptionInput.value = serviceDescription;
            imgInput.value = serviceImg;

            // Show the form
            editFormModal.classList.remove("hidden");
        });
    });

    // Hide edit form when "Cancel" button is clicked
    cancelEditBtn.addEventListener("click", () => {
        editFormModal.classList.add("hidden");
    });

    // Form submission handler
editForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    // Client-side validation
    let isValid = true;
    document.querySelectorAll(".error").forEach((e) => (e.textContent = ""));

    if (!nameInput.value.trim()) {
        document.getElementById("edit-name-error").textContent = "Name is required.";
        isValid = false;
    }
    if (!descriptionInput.value.trim()) {
        document.getElementById("edit-description-error").textContent = "Description is required.";
        isValid = false;
    }
    if (!imgInput.value.trim() || !isValidUrl(imgInput.value)) {
        document.getElementById("edit-img-error").textContent = "Valid image URL is required.";
        isValid = false;
    }

    if (!isValid) return;

    // Send data to the backend using fetch
    const serviceData = {
        id: serviceIdInput.value,
        name: nameInput.value,
        description: descriptionInput.value,
        imgUrl: imgInput.value,
    };

    try {
        const response = await fetch(`/${serviceIdInput.value}`, {
            method: "PUT",
            redirect: "follow", // Automatically follow redirects
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(serviceData),
        });

        if (response.redirected) {
            alert("You are not logged in!");
            window.location.href = response.url;
            return;
        }

        if (response.ok) {
            const data = await response.json();
            if (data.success) {
                alert("Service updated successfully!");
                location.reload(); // Refresh the page to reflect the updated UI
            } else {
                alert("Error updating service.");
            }
        } else {
            alert(`Server Error: ${response.status}`);
        }
    } catch (error) {
        console.error("Error:", error);
        alert("An error occurred while updating the service.");
    }
});


    // Utility function to validate URLs
    function isValidUrl(url) {
        try {
            new URL(url);
            return true;
        } catch (_) {
            return false;
        }
    }
});
