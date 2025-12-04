
document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.book-btn');
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Redirecting you to the Appointment page!');
        });
    });
});
