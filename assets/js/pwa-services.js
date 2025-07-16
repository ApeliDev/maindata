// Register Service Worker
if ('serviceWorker' in navigator) {
    window.addEventListener('load', async () => {
        try {
            const registration = await navigator.serviceWorker.register('/serviceWorker.js', {
                scope: './'
            });
            console.log('Service Worker registered:', registration);
        } catch (error) {
            console.error('Service Worker registration failed:', error);
        }
    });
}

// Handle app installation event
window.addEventListener('appinstalled', () => {
    document.getElementById('toastinstall')?.style?.display = 'none';
});

// Handle install banner visibility based on display mode
const updateInstallToast = () => {
    const isFullscreen = window.matchMedia('(display-mode: fullscreen)').matches;
    const toast = document.getElementById('toastinstall');
    if (toast) {
        isFullscreen ? $(toast).fadeOut() : $(toast).fadeIn();
    }
};

window.addEventListener('DOMContentLoaded', updateInstallToast);
window.matchMedia('(display-mode: fullscreen)').addEventListener('change', updateInstallToast);
