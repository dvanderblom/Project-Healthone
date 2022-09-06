const fullName = document.querySelector("#fullname");
const email = document.querySelector("#email");
const editProfile = document.querySelector("#edit-profile");
const saveProfile = document.querySelector("#save-profile");

editProfile.addEventListener("click", function () {
  password.removeAttribute("disabled");
  fullName.removeAttribute("disabled");
  email.removeAttribute("disabled");
  editProfile.hidden = true;
  saveProfile.hidden = false;
});