// codigo para diferenciar la animacion al darle click
const sign_in_btn = document.querySelector("#sign-in-btn"); //boton ir a inciar sesion
const sign_up_btn = document.querySelector("#sign-up-btn"); //boton ir a registro
const container = document.querySelector(".container");     //div container, luego del titulo

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});