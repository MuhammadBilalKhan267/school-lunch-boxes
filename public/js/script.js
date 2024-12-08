document.addEventListener("DOMContentLoaded", () => {
    const addServiceForm = document.getElementById("add-service-form");
    const servicesGrid = document.getElementById("services-grid");
    const popup = document.getElementById("popup");
    const popupTitle = document.getElementById("popup-title");
    const popupDesc = document.getElementById("popup-desc");
    const hideDetailsBtn = document.getElementById("hide-details-btn");
    const maxWords = 10; // Maximum words before truncation

    // Truncate descriptions and set initial text
    document.querySelectorAll('.short-desc').forEach(desc => {
        const fullText = desc.getAttribute('data-full-desc');
        const truncatedText = truncateText(fullText, maxWords);
        desc.textContent = truncatedText + '...'; // Display truncated text
    });

    // Show popup function
    function showPopup(title, desc) {
        popupTitle.textContent = title;
        popupDesc.textContent = desc;
        popup.classList.remove("hidden");
        document.body.classList.add("dimmed");
    }

    // Hide popup function
    hideDetailsBtn.addEventListener("click", () => {
        popup.classList.add("hidden");
        document.body.classList.remove("dimmed");
    });

    // Event delegation to handle "Show Details" buttons in services grid
    servicesGrid.addEventListener("click", (event) => {
        if (event.target.classList.contains("show-details-btn")) {
            // Only process if the clicked button belongs to a service card
            const serviceCard = event.target.closest(".service-card");
            if (serviceCard) {
                const title = serviceCard.querySelector("h3").textContent;
                const desc = serviceCard.querySelector("p").getAttribute('data-full-desc');
                showPopup(title, desc);
            }
        }
    });
    
    // Handle form submission
    addServiceForm.addEventListener("submit", (event) => {
        event.preventDefault();
    
        const title = document.getElementById("service-title").value;
        const desc = document.getElementById("service-desc").value;
        const imgUrl = document.getElementById("service-img").value;

        // Prepare data for sending to the backend
        const serviceData = {
            title: title,
            description: desc,
            imgUrl: imgUrl
        };

        async function sendData() {
            let responseData = null;
        
            try {
                const response = await fetch('/', {
                    method: 'POST',
                    redirect: 'follow', // Automatically follow redirects
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify(serviceData),
                });
        
                if (response.redirected) {
                    alert("You are not logged in!");
                    window.location.href = response.url;
                    return;
                }
        
                if (response.ok) {
                    responseData = await response.json();
        
                    if (responseData.success) {
                        alert('Service added successfully!');
                    } else {
                        alert('Error adding service!');
                    }
                } else {
                    alert(`Server Error: ${response.status}`);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while adding the service.');
            }
        
            return responseData; // Return the final response data
        }
        
        
        // Call the async function
        sendData().then(responseData => {
            console.log(responseData);
            // Create a new service card for UI (optional, this is for visual display only)
            const newCard = document.createElement("div");
            newCard.classList.add("service-card");
            newCard.innerHTML = `
                <img src="${imgUrl}" alt="${title}" class="service-img">
                <div class="service-content">
                    <h3>${title}</h3>
                    <p class="short-desc" data-full-desc="${desc}">${truncateText(desc, maxWords)}...</p>
                    <button class="show-details-btn">Show Details</button>
                </div>
                <form action="/services/${responseData.service.id}" method="POST">
                    <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            `;
            // Add the new card to the services grid (optional, visual display)
            servicesGrid.appendChild(newCard);
        
            // Clear the form inputs
            addServiceForm.reset();
        });
        
    
    });

    // Function to truncate text
    function truncateText(text, wordLimit) {
        const words = text.split(' ');
        if (words.length > wordLimit) {
            return words.slice(0, wordLimit).join(' ');
        }
        return text;
    }
   
});


