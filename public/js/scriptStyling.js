

function toggleButton(event, name){

    const customerScroll = document.querySelector('.customer-scroll');
    const barangScroll = document.querySelector('.barang-scroll');

    if(name === 'customer'){
        customerScroll.classList.toggle('display');
    }
    else{
        barangScroll.classList.toggle('display');
    }

}