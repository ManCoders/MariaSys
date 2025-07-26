$(document).ready(function () {
    let isShifted = false;

    $('#burgerButton').click(function () {
        // alert('burger clicked!');
        const sidebar = document.getElementById("sidebar");

        if (!sidebar) {
            console.warn("Element with ID 'sidebar' not found.");
            return;
        }

        // Apply styles only once if needed
        sidebar.style.display = 'flex';
        sidebar.style.flexDirection = 'column';
        sidebar.style.transition = 'transform 0.45s cubic-bezier(.4,0,.2,1)';
        sidebar.style.willChange = 'transform';
        sidebar.style.marginTop = '1rem';

        // Toggle visibility
        if (!isShifted) {
            // Bring into view
            sidebar.style.transform = 'translate(0px, .8rem)';
        } else {
            // Move off screen to the left
            sidebar.style.transform = 'translateX(-50rem)';
        }

        isShifted = !isShifted;
    });
});