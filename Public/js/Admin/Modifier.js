document.getElementById("form").addEventListener("submit", (event) => {
   const password = document.getElementById("password").value
   const confpassword = document.getElementById("passwordcheck").value
     if(password !== confpassword) {
       displayError("mots de passe non identique");
       event.preventDefault();
    }
});

const iderror= document.getElementById("error");
function displayError(error) {
  iderror.textContent = error;
}
 