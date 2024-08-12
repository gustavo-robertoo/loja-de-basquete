document.addEventListener("DOMContentLoaded", function () {
    const emailInput = document.getElementById("email");
    const lembrarCheckbox = document.getElementById("lembrar");
    if (localStorage.getItem("email")) {
      emailInput.value = localStorage.getItem("email");
      lembrarCheckbox.checked = true;
    }
    document.getElementById("loginForm").addEventListener("submit", function () {
      if (lembrarCheckbox.checked) {
        localStorage.setItem("email", emailInput.value);
      } else {
        localStorage.removeItem("email");
      }
    });
  });
  