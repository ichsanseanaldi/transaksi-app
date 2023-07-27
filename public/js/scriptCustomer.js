
const customerList = document.querySelectorAll('.customer-list');
const customerChoice = document.querySelector('.customer-choice');
const userDisplay = document.querySelector('.user-display');
const customerScroll = document.querySelector('.customer-scroll');
const svg1 = document.querySelector('.icon-svg-1');

for(let i = 0; i< customerList.length ; i++){

    customerList[i].addEventListener('click', ()=>{

        const id = customerList[i].dataset.id;
        const namaCust = customerList[i].dataset.nama;
        const kodeCust = customerList[i].dataset.kode;
        const telpCust = customerList[i].dataset.telp;

        customerChoice.innerHTML = `<input type="text" name="cust_id" id="cust_id" value=${id} hidden >`

        userDisplay.innerHTML = `<div style="margin-left:10px;border-left:2px solid #00c76a;padding:10px;">
                                    <strong>Customer :</strong>
                                    <div style="margin-left:10px;">
                                        <div class="crumb-info">
                                            <span>Nama</span>  
                                            <span>${namaCust}</span>  
                                        </div>
                                        <div class="crumb-info">
                                            <span>Kode</span>    
                                            <span>${kodeCust}</span>    
                                        </div>
                                        <div class="crumb-info">
                                            <span>Telp</span>  
                                            <span>${telpCust}</span>  
                                        </div>
                                    </div>
                                 </div>`

        customerScroll.classList.remove('display');
        svg1.classList.remove('display');
        

    });

}