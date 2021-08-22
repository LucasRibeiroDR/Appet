
function exibir_ocultar(){
    var valor = document.getElementById("student").value;
    var ra = document.getElementById("ra_value");

    if(valor == '0'){
        ra.classList.add("ra")
    }else{
        ra.classList.remove("ra")
    }
}
