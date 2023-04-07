const buttonModel = document.querySelector("#button-modal");
const buttonModels = document.querySelectorAll(".button-modal-list");

if(buttonModel){
    let modalCenterTitle = document.querySelector("#modalCenterTitle");
    let title = buttonModel.getAttribute('data-title-modal');
    let url = buttonModel.getAttribute('data-url-modal');
    let url_modal = document.querySelector(".url-button-modal");

    buttonModel.addEventListener('click', ()=>{
        modalCenterTitle.innerHTML = title;
        url_modal.href = url;
    });
    
}

if (buttonModels.length > 0) {
    let modalCenterTitle = document.querySelector("#modalCenterTitle");
    let url_modal = document.querySelector(".url-button-modal");
  
    buttonModels.forEach(function(buttonModel) {
      buttonModel.addEventListener('click', function(event) {
        event.preventDefault();
        let title = buttonModel.getAttribute('data-title-modal');
        let url = buttonModel.getAttribute('data-url-modal');
        modalCenterTitle.innerHTML = title;
        url_modal.href = url;
      });
    });
  }