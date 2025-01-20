document.addEventListener("DOMContentLoaded", () => {
  const togglePassword = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("password");

  togglePassword.addEventListener("click", () => {
    // Toggle the type attribute
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);

    // Toggle the eye icon
    togglePassword.classList.toggle("fa-eye-slash");
  });
});
