var account_num = document.querySelector("#account_num");
var password = document.querySelector("#password");
var login = document.querySelector("#login");
var form = document.querySelector("#form");
const loader = document.querySelector(".loader");
msg = document.querySelector(".msg");
loader.style.visibility = "hidden";

xhr = new XMLHttpRequest();

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const data = new FormData();

  data.append("login", "");
  data.append("account_num", form.account_num.value);
  data.append("password", form.password.value);

  xhr.open(
    "POST",
    "../../CitadelCorporation/Configuration/connection.php",
    true
  );
  xhr.onreadystatechange = (e) => {
    if (e.target.status == 200 && e.target.readyState == 4) {
      res = e.target.response;

      if (res == "success") {
        setTimeout(() => {
          loader.style.display = "visible";
          window.location = "index.php";
        }, 2000);
      } else {
        ti = setTimeout(() => {
          loader.style.visibility = "visible";
          //   loader.FA;
        });
        setTimeout(() => {
          loader.style.visibility = "hidden";
          msg.innerHTML = `<div class='alert alert-danger'>${res}</div>`;
        }, 2000);

        // clearInterval(ti);
      }
    }
  };
  xhr.send(data);
});

window.onload = () => {
  xhr.open(
    "POST",
    "../../CitadelCorporation/Configuration/connection.php",
    true
  );
  xhr.onreadystatechange = (e) => {
    if (e.target.status == 200 && e.target.readyState == 4) {
      res = e.target.response;

      if (res == "success") {
        setTimeout(() => {
          loader.style.display = "block";
          window.location = "index.php";
        }, 10000);
        xhr.send();
      }
    }
  };
};
