function validateForm() {
    var x = document.forms["formulario"]["nome"].value;

    if (x == null || x == "") {
        alert("Campos com o (*) são obrigatórios!");
        return false;
    } else {
        confirm("Deseja enviar os dados?");
        alert("Cadastro Efetuado!")
    }

}




