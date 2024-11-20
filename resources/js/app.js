import './bootstrap';

import fitty from 'fitty';

document.addEventListener('DOMContentLoaded', () => {
    const fittyOptions = window.fittyOptions || { minSize: 8, maxSize: 24 };
    fitty('.fit-text', fittyOptions);
});