var m_index = 0;
function inputchange(data, status, xhr){
    m_index = data[0]['no_of_bottle'];
    const value = document.getElementById('batch_qty').value;
    calculate(value);
}
function calculate(value){
    $("#batch_carton").val(Math.round(value/m_index));
}
function valuedetect(value){
    prod_url = url +"/"+value;
    $.ajax({
        url:prod_url,
        type:'GET',
        success:inputchange
    });
}

$(document).ready(()=>{
    valuedetect(document.getElementById('productID').value);
});
