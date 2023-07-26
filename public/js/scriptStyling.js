

function toggleButton(event, name){

    const customerScroll = document.querySelector('.customer-scroll');
    const barangScroll = document.querySelector('.barang-scroll');
    const svg1 = document.querySelector('.icon-svg-1');
    const svg2 = document.querySelector('.icon-svg-2');

    if(name === 'customer'){
        customerScroll.classList.toggle('display');
        svg1.classList.toggle('display');
    }
    else{
        barangScroll.classList.toggle('display');
        svg2.classList.toggle('display');
    }

}