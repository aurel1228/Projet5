document.getElementById("form").addEventListener("submit", (event) => {
   const pseudo = document.getElementById("pseudo").value
   const password = document.getElementById("password").value
   const confpassword = document.getElementById("passwordcheck").value
     if(password !== confpassword) {
       displayError("mots de passe non identique");
       event.preventDefault();
    }
    if(pseudo === "") {
       displayError("veuillez entrez un pseudo");
       event.preventDefault();
    }
    if(password === "") {
       displayError("veuillez entrez un mot de passe");
       event.preventDefault();
    }
});

const iderror= document.getElementById("error");
function displayError(error) {
  iderror.textContent = error;
}
 