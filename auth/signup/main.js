document.getElementById('toggle-password').addEventListener('click', function() {
  const passwordInput = document.getElementById('password');
  const icon = this.querySelector('i');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash'); 
  } else {
    passwordInput.type = 'password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye'); 
  }
});

document.getElementById('toggle-password-confirmation').addEventListener('click', function() {
  const passwordConfirmationInput = document.getElementById('passwordconfirmation');
  const icon = this.querySelector('i');

  if (passwordConfirmationInput.type === 'password') {
    passwordConfirmationInput.type = 'text';
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash'); 
  } else {
    passwordConfirmationInput.type = 'password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye'); 
  }
});

// document.getElementById('toggle-terms').addEventListener('click', function() {
//     const termsCheckbox = document.getElementById('terms');
//     const icon = this.querySelector('i');

//     if (termsCheckbox.checked) {
//       termsCheckbox.checked = false;
//       icon.classList.remove('fa-check-square');
//       icon.classList.add('fa-square'); 
//     } else {
//       termsCheckbox.checked = true;
//       icon.classList.remove('fa-square');
//       icon.classList.add('fa-check-square');  
//     }
// });