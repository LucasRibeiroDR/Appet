function exibir_ocultar() {
    var valor = document.getElementById("student").value;
    var ra = document.getElementById("ra_value");

    if (valor == '0') {
        ra.classList.add("ra")
    } else {
        ra.classList.remove("ra")
    }
}

function hidden_show() {
    var valor = document.getElementById("especie").value;
    var porte = document.getElementById("porte_value");

    if (valor == '0') {
        porte.classList.add("porte");
    } else {
        porte.classList.remove("porte");
    }
}