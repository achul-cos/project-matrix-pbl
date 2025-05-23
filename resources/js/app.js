// resources/js/app.js

function togglePasswordVisibility(inputId, iconId) {
  const passwordInput = document.getElementById(inputId);
  const eyeIcon = document.getElementById(iconId);
  if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeIcon.innerHTML = `
      <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.965
      9.965 0 012.66-4.306m2.06-1.992A9.97 9.97 0 0112 5c4.477 0 8.268 2.943 9.542 7a10.028 10.028 0 01-4.661
      5.313M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>  
      <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18"></path>`;
  } else {
      passwordInput.type = 'password';
      eyeIcon.innerHTML = `
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
      <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268
      2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>`;
  }
}

// Agar fungsi bisa dipakai global dari HTML, tulis seperti ini
window.togglePasswordVisibility = togglePasswordVisibility;
