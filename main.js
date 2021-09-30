//register and login

var registerBtn = document.querySelector('.register');
const registerForm = document.querySelector('.register-form');
var loginBtn = document.querySelector('.login');
const loginForm = document.querySelector('.login-form');

registerBtn.addEventListener('click', () => {
  registerForm.style.display = 'block';
  registerForm.style.pointerEvents = 'auto';
  loginForm.style.display = 'none';
  loginform.style.pointerEvents = 'none';
})

loginBtn.addEventListener('click', () => {
  registerForm.style.display = 'none';
  registerForm.style.pointerEvents = 'none';
  loginForm.style.display = 'block';
  loginform.style.pointerEvents = 'block';
})
