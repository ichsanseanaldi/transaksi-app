
const customerList = document.querySelectorAll('.customer-list');
const customerChoice = document.querySelector('.customer-choice');
const userDisplay = document.querySelector('.user-display');

for(let i = 0; i< customerList.length ; i++){

    customerList[i].addEventListener('click', ()=>{

        const id = customerList[i].dataset.id;
        const namaCust = customerList[i].dataset.nama;
        const kodeCust = customerList[i].dataset.kode;
        const telpCust = customerList[i].dataset.telp;

        customerChoice.innerHTML = `<input type="text" name="cust_id" id="cust_id" value=${id} hidden >`

        userDisplay.innerHTML = `<div>
                                    <strong>Customer:</strong>
                                    <p>Nama : ${namaCust}</p>   
                                    <p>Kode : ${kodeCust}</p>    
                                    <p>Telp : ${telpCust}</p> 
                                 </div>`

    });

}