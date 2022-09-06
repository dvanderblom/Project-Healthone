const togglePassword = document.querySelector('#toggle-password')
const password = document.querySelector('#password');
const password2 = document.querySelector('#password2');

togglePassword.addEventListener("click", function () {
  const passType = password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", passType);
  
  if(password2) {
    const passType2 = password2.getAttribute("type") === "password" ? "text" : "password";
  password2.setAttribute("type", passType2);
  }
  togglePassword.classList.toggle("bi-eye");
});