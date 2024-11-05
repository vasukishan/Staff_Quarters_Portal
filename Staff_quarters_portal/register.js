document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    const successMessage = document.getElementById('success-message');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); 

        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        
        if (username && email && password && password === confirmPassword) {
            
            successMessage.style.display = 'block'; 
            setTimeout(function() {
                window.location.href = 'index.html';
            }, 2000);
        } else {
            alert('Please fill in all fields and ensure passwords match.');
        }
    });
});
