let Page = parseInt(document.getElementById("currentPage").textContent);
const total = parseInt(document.getElementById("totalPage").textContent);

const buttonNext = document.getElementById("next");
buttonNext.addEventListener("click", (event) => {
   Page++;
   if(Page > total){
    Page= total;
   }
   changePage();
});
const buttonPrevious = document.getElementById("previous");
buttonPrevious.addEventListener("click", (event) => {
  Page--;
  if(Page<1){
    Page=1;
  }
  changePage();
});

function changePage(){
    iderror.textContent = "";
    const List = `/Admin/ListUser?page=${Page}`;
    buttonPrevious.toggleAttribute("disabled", Page===1);
    buttonNext.toggleAttribute("disabled", Page===total);
    document.getElementById("currentPage").textContent=Page;

    fetch(List)
        .then(response => {
            if (!response.ok) {
                throw new Error("list inconnu");
            }
            console.log(response);
            return response.text();
        })
            .then(data => displayList(data))
            .catch(error => displayError(error.message));
}


 function displayList(data) {
    document.getElementById('list').innerHTML = data;

}





const iderror = document.getElementById("error");
function displayError(error) {
    iderror.textContent = error;
}
    