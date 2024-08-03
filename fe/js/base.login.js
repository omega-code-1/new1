const btnToggleLogin = document.querySelector('.btn-toggle-login');
const btnToggleRegis = document.querySelector('.btn-toggle-regis');
const formL = document.querySelector('.formL');
const formR = document.querySelector('.formR');

btnToggleLogin.addEventListener('click', function () {
    if (!btnToggleLogin.classList.contains('actv')) {
        btnToggleRegis.classList.remove('actv');
        btnToggleLogin.classList.add('actv');
    }
    if (!formL.classList.contains('visible')) {
        formL.style.display = 'block';
        formR.style.display = 'none'
    }
});

btnToggleRegis.addEventListener('click', function () {
    if (!btnToggleRegis.classList.contains('actv')) {
        btnToggleLogin.classList.remove('actv');
        btnToggleRegis.classList.add('actv');
    }
    if (!formR.classList.contains('visible')) {
        formR.style.display = 'block';
        formL.style.display = 'none'
    }
});
