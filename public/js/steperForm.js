// Get the parent div
var $parentDiv = $(".sidebar");

// Get the div to be moved
var $divToMove = $(".left-side");

// Move the div to the new parent
$divToMove.appendTo($parentDiv);




var next_click=document.querySelectorAll(".next_button");
var main_form=document.querySelectorAll(".main");
var step_list = document.querySelectorAll(".progress-bar li");
let formnumber=0;

next_click.forEach(function(next_click_form){
    next_click_form.addEventListener('click',function(){
        if(!validateform()){
            return false
        }
       formnumber++;
       updateform();
       progress_forward();
    });
});

var back_click=document.querySelectorAll(".back_button");
back_click.forEach(function(back_click_form){
    back_click_form.addEventListener('click',function(){
       formnumber--;
       updateform();
       progress_backward();
    });
});

var username=document.querySelector("#user_name");
var shownname=document.querySelector(".shown_name");


var submit_click=document.querySelectorAll(".submit_button");
submit_click.forEach(function(submit_click_form){
    submit_click_form.addEventListener('click',function(){
    //    shownname.innerHTML= username.value;
       formnumber++;
       updateform();
    });
});


function updateform(){
    main_form.forEach(function(mainform_number){
        mainform_number.classList.remove('active');
    })
    main_form[formnumber].classList.add('active');
}

function progress_forward(){
    step_list[formnumber].classList.add('active');
}

function progress_backward(){
    var form_num = formnumber+1;
    step_list[form_num].classList.remove('active');
    num.innerHTML = form_num;
}




function validateform(){
    validate=true;
    const validate_inputs=document.querySelectorAll(".main.active input");
    validate_inputs.forEach(function(vaildate_input){
        vaildate_input.classList.remove('warning');
        if(vaildate_input.hasAttribute('require')){
            if(vaildate_input.value.length==0){
                validate=false;
                vaildate_input.classList.add('warning');
            }
        }
    });

    return validate;

}


const sampleData = [
    {
        'label':'Overseas Filipino Workers (OFW) Dependents',
        'id' : '1'
    }
];

$.ajax({
    url: "{{ route('disability_view') }}",
    dataType: "json",
    type: "post",
    success: function (data) {
      console.log(data);
   
    },
});

const sampleData2 = [
    {
        'label':'Overseas Filipino Workers (OFW) Dependenats',
        'id' : '1'
    }
];

var checboxContainerClassification = document.getElementById("checboxContainerClassification");

$.each(sampleData, function(index, value) {

    const split = Math.floor(sampleData.length / 4) + 1;

    var checkboxColumn;
    if (index % split === 0) {
        checkboxColumn = document.createElement("div");
        checkboxColumn.className = "col-3";
        checboxContainerClassification.appendChild(checkboxColumn);
    } else {
        checkboxColumn = checboxContainerClassification.lastChild;
    }

    const checkbox = document.createElement("div");
    checkbox.className = "form-check";
    checkbox.innerHTML = '<input class="form-check-input" type="checkbox" value="'+value.id+'" id="checkbox' + value.id + '"><label class="form-check-label p-0" for="checkbox' + value.id + '">' + value.label + '</label> <input type="text" class="form-control d-none mt-2" id="checkInput'+ value.id +'"placeholder="'+value.label+'">';
    checkboxColumn.appendChild(checkbox);
});



var checboxContainerDisability = document.getElementById("checboxContainerDisability");

$.each(sampleData2, function(index, value) {

    const split = Math.floor(sampleData2.length / 4) + 1;

    var checkboxColumn;
    if (index % split === 0) {
        checkboxColumn = document.createElement("div");
        checkboxColumn.className = "col-3";
        checboxContainerDisability.appendChild(checkboxColumn);
    } else {
        checkboxColumn = checboxContainerDisability.lastChild;
    }

    const checkbox = document.createElement("div");
    checkbox.className = "form-check";
    checkbox.innerHTML = '<input class="form-check-input" type="checkbox" value="'+value.id+'" id="checkboxDisability' + value.id + '"><label class="form-check-label p-0" for="checkbox' + value.id + '">' + value.label + '</label>';
    checkboxColumn.appendChild(checkbox);
});

$(document).ready(function() {
    $('input[type="checkbox"]').click(function() {
        if ($(this).prop("checked") == true) {
            $('#checkInput' + this.value).removeClass('d-none');
            $('#disabilityTeaxtarea').removeClass('d-none');
            console.log(this.value)
        } else if ($(this).prop("checked") == false) {
            $('#checkInput'+this.value).addClass('d-none');
            $('#disabilityTeaxtarea').addClass('d-none');

        }
    });
});

window.addEventListener("load", function() {
    document.querySelector(".loader").style.display = "none";
  });
