lname = document.getElementById("lname");
fname = document.getElementById("fname");
email = document.getElementById("email");
pwd = document.getElementById("pwd");
repwd = document.getElementById("repwd");
area_code = document.getElementById("area_code");
date = document.getElementById("date");
gender = document.getElementById("gender");
addr_1 = document.getElementById("addr_1");
addr_2 = document.getElementById("addr_2");
office_addr = document.getElementById("office_addr");
state = document.getElementById("state");
country = document.getElementById("country");
postal_code = document.getElementById("postal_code");
marital_status = document.getElementById("marital_status");
acct_type = document.getElementById("acct_type");
occupation = document.getElementById("occupation");
currency = document.getElementById("currency");
// img = document.getElementById("img");
// imgSign = document.getElementById("imgSign");
// fone = document.getElementById("fone");
loader = document.querySelector(".loader");
msg = document.querySelector(".msg");
btn = document.querySelector(".btn");
loader.style.display = "none";
const form = document.getElementById("form");

// var xhr = new XMLHttpRequest();
// form.addEventListener("submit", (e) => {
//   e.preventDefault();
//   data = new FormData();
//   data.append("reg", "");
//   data.append("lname", form.lname.value);
//   data.append("fname", form.fname.value);
//   data.append("email", form.email.value);
//   data.append("pwd", form.pwd.value);
//   data.append("repwd", form.repwd.value);
//   data.append("date", form.date.value);
//   data.append("area_code", form.area_code.value);
//   data.append("gender", form.gender.value);
//   data.append("addr_1", form.addr_1.value);
//   data.append("addr_2", form.addr_2.value);
//   data.append("office_addr", form.office_addr.value);
//   data.append("state", form.state.value);
//   data.append("country", form.country.value);
//   data.append("postal_code", form.postal_code.value);
//   data.append("marital_status", form.marital_status.value);
//   data.append("acct_type", form.acct_type.value);
//   data.append("occupation", form.occupation.value);
//   data.append("currency", form.currency.value);
//   // data.append("img", form.img.value);
//   // data.append("imgSign", form.imgSign.value);
//   data.append("fone", form.fone.value);

//   xhr.open(
//     "POST",
//     "../../CitadelCorporation/Configuration/connection.php",
//     true
//   );
//   xhr.onreadystatechange = (e) => {
//     if (e.target.status == 200 && e.target.readyState == 4) {
//       res = e.target.response;
//       if (res == "success") {
//         loader.style.display = "block";
//         window.location = "login.php";
//       } else {
//         msg.innerHTML = `<div class='alert alert-danger'>${res}</div>`;
//       }
//     }
//   };
//   xhr.send(data);
// });

// window.onload = () => {
//   xhr.open(
//     "POST",
//     "../../CitadelCorporation/Configuration/connection.php",
//     true
//   );
//   xhr.onreadystatechange = (e) => {
//     if (e.target.status == 200 && e.target.readyState == 4) {
//       res = e.target.response;
//       if (res == "success") {
//         loader.style.display = "block";
//         window.location = "login.php";
//       }
//       xhr.send();
//     }
//   };
// };
