window.onload=()=>{

    const formatNumber = document.querySelectorAll('.number-format');

    const formatter = Intl.NumberFormat('id');

    formatNumber.forEach((e)=> {
        const formattedNumber = formatter.format(Number(e.innerHTML))
        if(formattedNumber == 0){
            e.innerHTML = "-"
        }
        else{
            e.innerHTML = formattedNumber;
        }
    });

}