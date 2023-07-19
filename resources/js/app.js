import "bootstrap";
import "boxicons";

let successDiv = document.getElementById("success-message");

function hideDiv() {
    successDiv.classList.add('d-none');
}
setTimeout(hideDiv, 3000);


let btn = document.getElementById('edit-btn');
let confirm = document.getElementById('confirm');


function check() {
btn.addEventListener('click', function (event) {
    event.preventDefault();
    confirm.classList.remove('d-none');
})
}
check();
