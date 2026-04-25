document.addEventListener('DOMContentLoaded', function () {
    initSidebar();
    initNavItems();
    initProfileDropdown();
    initModals();
    initForms();
    initPasswordStrength();
    initParallaxEffect();
    initLogoutButton();
});

function initSidebar() {
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('toggleSidebar');

    if (!sidebar || !toggle) return;

    toggle.addEventListener('click', function () {
        sidebar.classList.toggle('active');
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 880) {
            sidebar.classList.remove('active');
        }
    });
}

function initNavItems() {
    const navItems = document.querySelectorAll('.nav-item');
    if (!navItems.length) return;

    navItems.forEach(function (item) {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            navItems.forEach(function (nav) {
                nav.classList.remove('active');
            });
            item.classList.add('active');

            const sidebar = document.getElementById('sidebar');
            if (sidebar && window.innerWidth <= 880) {
                sidebar.classList.remove('active');
            }
        });
    });
}

function initProfileDropdown() {
    const profile = document.getElementById('profileDropdown');
    if (!profile) return;

    profile.addEventListener('click', function (event) {
        event.stopPropagation();
        profile.classList.toggle('open');
    });

    document.addEventListener('click', function (event) {
        if (!profile.contains(event.target)) {
            profile.classList.remove('open');
        }
    });
}

function initModals() {
    document.querySelectorAll('[data-modal-open]').forEach(function (button) {
        button.addEventListener('click', function () {
            const target = button.dataset.modalOpen;
            openModal(target);
        });
    });

    document.querySelectorAll('[data-modal-close]').forEach(function (button) {
        button.addEventListener('click', function () {
            const target = button.dataset.modalClose;
            closeModal(target);
        });
    });

    document.querySelectorAll('.modal-backdrop').forEach(function (backdrop) {
        backdrop.addEventListener('click', function (event) {
            if (event.target === backdrop) {
                closeModal(backdrop.id);
            }
        });
    });
}

function openModal(id) {
    const backdrop = document.getElementById(id);
    if (!backdrop) return;
    backdrop.classList.add('open');
    document.body.classList.add('modal-open');
}

function closeModal(id) {
    const backdrop = document.getElementById(id);
    if (!backdrop) return;
    backdrop.classList.remove('open');
    document.body.classList.remove('modal-open');
}

function initForms() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const modalForms = document.querySelectorAll('.modal-form');

    if (loginForm) {
        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();
            showToast('Signed in successfully', 'success');
            setTimeout(function () {
                window.location.href = 'dashboard.html';
            }, 500);
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const password = document.getElementById('passwordInput').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                showToast('Passwords do not match', 'error');
                return;
            }

            if (password.length < 8) {
                showToast('Password must be at least 8 characters', 'error');
                return;
            }

            showToast('Account created successfully', 'success');
            setTimeout(function () {
                window.location.href = 'login.html';
            }, 1200);
        });
    }

    modalForms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const modal = form.closest('.modal-backdrop');
            if (modal) {
                closeModal(modal.id);
            }
            showToast('Saved successfully', 'success');
        });
    });
}

function initPasswordStrength() {
    const passwordInput = document.getElementById('passwordInput');
    const strengthBar = document.getElementById('strengthBar');

    if (!passwordInput || !strengthBar) return;

    passwordInput.addEventListener('input', function (event) {
        const password = event.target.value;
        const strength = calculatePasswordStrength(password);

        strengthBar.style.width = strength + '%';

        if (strength < 25) {
            strengthBar.style.background = 'linear-gradient(90deg, #ef4444, #dc2626)';
        } else if (strength < 50) {
            strengthBar.style.background = 'linear-gradient(90deg, #f59e0b, #d97706)';
        } else if (strength < 75) {
            strengthBar.style.background = 'linear-gradient(90deg, #eab308, #ca8a04)';
        } else {
            strengthBar.style.background = 'linear-gradient(90deg, #22c55e, #16a34a)';
        }
    });
}

function calculatePasswordStrength(password) {
    let score = 0;
    if (password.length >= 8) score += 25;
    if (/[a-z]/.test(password)) score += 25;
    if (/[A-Z]/.test(password)) score += 25;
    if (/[0-9]/.test(password)) score += 25;
    return score;
}

function initParallaxEffect() {
    document.addEventListener('mousemove', function (event) {
        const circles = document.querySelectorAll('.floating-circle');
        circles.forEach(function (circle, index) {
            const speed = (index + 1) * 0.4;
            const x = (window.innerWidth - event.clientX * speed) / 120;
            const y = (window.innerHeight - event.clientY * speed) / 120;
            circle.style.transform = `translate(${x}px, ${y}px)`;
        });
    });
}

function initLogoutButton() {
    const logoutButton = document.getElementById('logoutButton');
    if (!logoutButton) return;

    logoutButton.addEventListener('click', function () {
        openModal('confirmLogoutModal');
    });
}

function showToast(message, type) {
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(function () {
        toast.remove();
    }, 3200);
}

window.openModal = openModal;
window.closeModal = closeModal;
