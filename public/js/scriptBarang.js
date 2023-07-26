
const addButton = document.querySelectorAll('.add-button');
const barangList = document.querySelectorAll('.barang-list');
const barangChoice = document.querySelector('.barang-choice');
const barangDisplay = document.querySelector('.barang-display');
const quantity = document.querySelectorAll('.quantity-input');
const diskonPercent = document.querySelectorAll('.diskon-persen-input');
const quantityField = document.querySelectorAll('#quantity');
const subTotalField = document.querySelector('#subtotal');
const totalBayarField = document.querySelector('#total_bayar');
const calculateButton = document.querySelector('.calculate');

window.onload = function(){
    subTotalField.value = 0;
    totalBayarField.value= 0;
}

// Global Variable

let barangId = [];

// LOOPING

for(let i = 0; i < addButton.length ; i++){

    addButton[i].addEventListener('click', (e)=> render(i,e));

}

//Functions

function calculate(e){

    e.preventDefault();

    let subTotal = 0;
    const totalhrg = document.querySelectorAll(`.total_harga_barang`);
    const ongkirField = document.querySelector('#ongkir');
    const diskonCouponField = document.querySelector('#diskon_coupon');
    
    for(let i = 0; i < totalhrg.length ; i++){

        subTotal += Number(totalhrg[i].value);
    
    }

    subTotalField.value=subTotal;
    
    if(subTotal <= 0 ){
        totalBayarField.value = 0
    }
    else{
        totalBayarField.value = subTotal - ongkirField.value - diskonCouponField.value;
    }

}

function qtyHandler(e,index){

    e.preventDefault();

    const totalhrg  = document.querySelector(`#total_harga_barang_${index}`);
    const qty       = document.querySelector(`#quantity_${index}`);
    const hrgbrg    = document.querySelector(`#harga_setelah_diskon_${index}`);
    const qtywrapper = document.querySelector(`.qty-wrapper-${index}`);

    if(e.target.dataset.method === 'plus'){
        qty.value = Number(qty.value)+1;
        totalhrg.value = Number(totalhrg.value) + Number(hrgbrg.value);
    }
    else{
        if(qty.value < 1 || totalhrg.value < 0 ) return;
        qty.value = Number(qty.value)-1;
        totalhrg.value = Number(totalhrg.value) - Number(hrgbrg.value);
    }

    qtywrapper.innerHTML = `<input type="text" name="quantity[${index}]" id="quantity_${index}" class="noborder small-input" value=${qty.value} readonly>`

    calculate(e);


}

function diskonHandler(e, index){

    const diskonNilai   = document.querySelector(`#diskon_nilai_${index}`);
    const qty           = document.querySelector(`#quantity_${index}`);
    const hrgbrg        = document.querySelector(`#barang_id_${index}`);
    const hrgSetDisc    = document.querySelector(`#harga_setelah_diskon_${index}`);
    const totalhrg      = document.querySelector(`#total_harga_barang_${index}`);

    if(Number(e.target.value) > 0){
        diskonNilai.value = Number(hrgbrg.dataset.harga) * Number(e.target.value / 100);
        hrgSetDisc.value = Number(hrgbrg.dataset.harga) - Number(diskonNilai.value);
        totalhrg.value = Number(hrgSetDisc.value) * Number(qty.value);
    }
    else{
        diskonNilai.value = Number(hrgbrg.dataset.harga) * Number(e.target.value / 100);
        hrgSetDisc.value = Number(hrgbrg.dataset.harga);
        totalhrg.value = Number(hrgbrg.dataset.harga) * Number(qty.value);
    }

    calculate(e);

}

function render(i,e){

    const id                    = Number(barangList[i].dataset.id);
    const namaBarang            = barangList[i].dataset.nama;
    const kodeBarang            = barangList[i].dataset.kode;
    const hargaBarang           = Number(barangList[i].dataset.harga);
    const quantityValue         = Number(quantity[i].value) || 1;
    const diskonPercentValue    = Number(diskonPercent[i].value);
    const diskonNilai           = hargaBarang * diskonPercentValue / 100;
    const hargaSetelahDiskon    = hargaBarang - diskonNilai;
    let totalHargaBarang        = Number(hargaBarang);

    if(quantityValue > 0){
        totalHargaBarang = hargaSetelahDiskon * quantityValue;
    }

    if(barangId.includes(id) === false){
        barangChoice.innerHTML +=`  <input type="text" name="barang_id[${i}]" id="barang_id_${i}" value=${id} readonly data-harga=${hargaBarang} hidden>
                                    <li class="table-row input-render-${i}">
                                        <div class="col col-3 p-5">${namaBarang}</div>
                                        <div class="col col-1 p-5">${kodeBarang}</div>
                                        <div class="col col-3 p-5">${hargaBarang}</div>
                                        <div class="col col-3 quantity">
                                            <button data-method="minus" onclick="qtyHandler(event,${i})" class="button-quantity">-</button>
                                            <span class="qty-wrapper-${i}">
                                                <input type="text" name="quantity[${i}]" id="quantity_${i}" value=${quantityValue} class="noborder small-input" readonly>
                                            </span>
                                            <button data-method="plus" onclick="qtyHandler(event,${i})" class="button-quantity">+</button>
                                        </div>
                                        <div class="col col-3">
                                            <select name="diskon_persen[${i}]" id="diskon-persen-${i}" class="diskon-persen-input" onchange="diskonHandler(event,${i})">
                                                <option value="0" ${diskonPercentValue === 0 ? 'selected' :  ''}>0%</option>
                                                <option value="5" ${diskonPercentValue === 5 ? 'selected' :  ''}>5%</option>
                                                <option value="10" ${diskonPercentValue === 10 ? 'selected' :  ''}>10%</option>
                                                <option value="15" ${diskonPercentValue === 15 ? 'selected' :  ''}>15%</option>
                                                <option value="20" ${diskonPercentValue === 20 ? 'selected' :  ''}>20%</option>
                                            </select>
                                        </div>
                                        <div class="col col-3">
                                            <input type="text" name="diskon_nilai[${i}]" id="diskon_nilai_${i}" value=${diskonNilai} class="noborder medium-input" readonly>
                                        </div>
                                        <div class="col col-3">
                                            <input type="text" name="harga_setelah_diskon[${i}]" id="harga_setelah_diskon_${i}" value=${hargaSetelahDiskon} class="noborder medium-input" data-harga=${hargaSetelahDiskon} readonly>
                                        </div>
                                        <div class="col col-3">
                                            <input type="text" name="total_harga_barang[${i}]" id="total_harga_barang_${i}" value=${totalHargaBarang} class="total_harga_barang noborder medium-input"  readonly>
                                        </div>
                                        <div class="col col-1">
                                            <button class="button-quantity" onclick="hapusHandler(event, ${i})">Hapus</button>
                                        </div>
                                    </li> `;
        barangId.push(id);
    }
    
    calculate(e);

}

function hapusHandler(e, index){

    e.preventDefault();

    const elementToRemove = document.querySelector(`.input-render-${index}`);
    const id              = Number(barangList[index].dataset.id);

    elementToRemove.remove();
    
    barangId = barangId.filter(el => el !== id);

    calculate(e);

}