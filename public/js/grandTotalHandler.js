

const fieldCollect = document.querySelectorAll('.field-collect');
const grandTotalField = document.querySelector('.grand-total');

let grandTotal = 0;

for (let i = 0; i < fieldCollect.length; i++) {
    grandTotal += Number(fieldCollect[i].innerHTML);
}

grandTotalField.innerHTML = grandTotal;

