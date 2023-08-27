const upload = document.querySelector("#imgFile");
const btn = document.querySelector(".upl");
const msg = document.querySelector(".msg");
msg.addEventListener("click", () => {
  msg.style.display = "none";
});
btn.style.display = "none";

upload.addEventListener("click", () => {
  btn.style.display = "block";
});
