// mainPopups.js

document.addEventListener("DOMContentLoaded", () => {
    const popupOpen = document.querySelectorAll('[data-popup-target]');
    const popupClose = document.querySelectorAll('[data-popup-close]');
    const overlay = document.getElementById('overlay');

    function open(popup) {
        if (popup == null) return;
        popup.classList.add('active');
        overlay.classList.add('active');
    }

    function close(popup) {
        if (popup == null) return;
        popup.classList.remove('active');
        overlay.classList.remove('active');
    }

    popupOpen.forEach(button => {
        button.addEventListener("click", () => {
            const popup = document.querySelector(button.dataset.popupTarget);
            open(popup);
        });
    });

    popupClose.forEach(button => {
        button.addEventListener("click", () => {
            const popup = button.closest('.popup');
            close(popup);
        });
    });

    overlay.addEventListener("click", () => {
        document.querySelectorAll('.popup.active').forEach(popup => {
            close(popup);
        });
    });
});
