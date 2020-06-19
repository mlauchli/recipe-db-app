let i = 0;
let e = 0;
let a = 0;
let ingredientButton = $(".ingredient-button");
let spiceButton = $(".spice-button");
let instructionsButton = $(".instructions-button");
let editButton = $("#edit-button");
let deleteButton = $("#delete-button");
let deleteButtonCode = "";
let addRowCode = "";
let resultContainer = $("#result-message");
let successMsg = "<p style='background-color: #5cb85c; color: white; text-align: center; padding-top: 20px; vertical-align: middle;'>Recipe successfully edited!</p>";
let failureMsg = "<p style='background-color: #d9534f; color: white; text-align: center; padding-top: 20px; vertical-align: middle;'>Oh no! Something went wrong.</p>"
//html and svg involved in generating the delete button
const makeButtonCode = (ingredienttype) => {
    deleteButtonCode = `<button class="btn btn-danger remove-${ingredienttype}-button" type="button">
    <svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" style="color: white;" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
    </svg>
  </button>`;
  return deleteButtonCode;
};

//specifying the code for ingredients, spices, or instructions
let ingredientsButtonCode = makeButtonCode("ingredients");
let spicesButtonCode = makeButtonCode("spices");
let instructionsButtonCode = makeButtonCode("instructions");

//function to generate the new form row html
const makeRowCode = (name, counter, placeholder, deleteButton) => {
  counter++;
  addRowCode = `<div class="form-row" id="${name}row${counter}">
  <div class="col-lg-5 col-md-9 col-sm-9 offset-1 pt-2">
      <input type="text" class="form-control" id="${name}s${counter}" name="${name}s[]" placeholder="${placeholder}">
  </div>
  <div class="col-1 mt-2">
  ${deleteButton}
  </div>
  </div> `;
  return addRowCode;
}

//specifying the code for ingredients, spices, or instructions
let ingredientRow = makeRowCode("ingredient", i, "e.g. 3 cups sugar", ingredientsButtonCode);
let spiceRow = makeRowCode("spice", e, "e.g. 3 tsp salt", spicesButtonCode);
let instructionRow = makeRowCode("instruction", a, "e.g. Add enough garlic to kill a horse.", instructionsButtonCode);

//controls the addition and subtraction of additional form rows
const addRow = (counter, rowType, rowHtml) => {
    counter++;
    $(rowHtml).appendTo($(`#${rowType}s-list`));
}

//specifying the code for ingredients, spices, or instructions
ingredientButton.click(function() {
  addRow(i, "ingredient", ingredientRow); 
  i++;
  let removeIngredientsButton = $(".remove-ingredients-button");
  removeIngredientsButton.click(function() {$(this).closest('.form-row').remove();});
});
  

spiceButton.click(function() {
  addRow(e, "spice", spiceRow);
  e++;
  let removeSpicesButton = $(".remove-spices-button");
  removeSpicesButton.click(function() {$(this).closest('.form-row').remove();});
});


instructionsButton.click(function(){
  addRow(a, "instruction", instructionRow);
  a++;
  let removeInstructionsButton = $(".remove-instructions-button");
  removeInstructionsButton.click(function() {$(this).closest('.form-row').remove();});
});

let removeIngredientsButton = $(".remove-ingredients-button");
removeIngredientsButton.click(function() {
  $(this).closest('.form-row').remove();
});

let removeSpicesButton = $(".remove-spices-button");
removeSpicesButton.click(function() {
    $(this).closest('.form-row').remove();
});

let removeInstructionsButton = $(".remove-instructions-button");
removeInstructionsButton.click(function() {
    $(this).closest('.form-row').remove();
});

// disable form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
 })();

 //send edited recipe to database
 editButton.click(function(){
    let data = $("#editform :input").serializeArray();
    $.post( $("#editform").attr("action"), data, function(info) { $("#result-message").html(info); });
    $(".modal-footer").remove();
    setTimeout(function () {$('#editmodal').modal('toggle')}, 1500);
    setTimeout(function () {window.location.reload()}, 1800);
  });


$("#editform").submit( function() {
  return false;
});

 //delete recipe from database
 deleteButton.click(function(){
  let data = $("#deleteform :input").serializeArray();
  $.post( $("#deleteform").attr("action"), data, function(info) { $("#delete-result-message").html(info); });
  $(".modal-footer").remove();
  setTimeout(function () {$('#deletemodal').modal('toggle')}, 1500);
  setTimeout(function () {window.location.href = 'recipes.php'}, 1800);
});

$("#deleteform").submit( function() {
return false;
});