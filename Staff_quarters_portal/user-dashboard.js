document.addEventListener("DOMContentLoaded", () => {
    const welcomeSection = document.getElementById("welcomeSection");
    const profileSection = document.getElementById("profileSection");
    const complaintsSection = document.getElementById("complaintsSection");
    const complaintStatusSection = document.getElementById("complaintStatusSection");
    const pageTitle = document.getElementById("pageTitle");
    const logoutBtn = document.getElementById("logoutBtn");

    // Function to show a section and hide others
    function showSection(sectionToShow) {
        welcomeSection.classList.add("hidden");
        profileSection.classList.add("hidden");
        complaintsSection.classList.add("hidden");
        complaintStatusSection.classList.add("hidden");

        sectionToShow.classList.remove("hidden");
    }

    // Event listeners for navigation links
    document.getElementById("dashboardLink").addEventListener("click", () => {
        showSection(welcomeSection);
        pageTitle.textContent = "Dashboard";
    });

    document.getElementById("profileLink").addEventListener("click", () => {
        showSection(profileSection);
        pageTitle.textContent = "User Profile";
    });

    document.getElementById("registerComplaintsLink").addEventListener("click", () => {
        showSection(complaintsSection);
        pageTitle.textContent = "Register Complaints";
    });

    document.getElementById("complaintStatusLink").addEventListener("click", () => {
        showSection(complaintStatusSection);
        pageTitle.textContent = "Complaint Status";
    });

    // Logout functionality
    logoutBtn.addEventListener("click", () => {
        window.location.href = 'index.html'; // Redirect to the login page
    });
});
