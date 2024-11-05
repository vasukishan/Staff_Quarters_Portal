document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('forgotPasswordForm');
    const successMessage = document.getElementById('success-message');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const mobile = document.getElementById('mobile').value;
        const newPassword = document.getElementById('new-password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        if (newPassword && confirmPassword && newPassword === confirmPassword) {

            successMessage.style.display = 'block'; 
            setTimeout(function() {
                window.location.href = 'index.html';
            }, 2000); 
        } else {
            alert('Please ensure that the passwords match.');
        }
    });
});
