function showInput(inputId) {
    document.getElementById('labelSchoolYear').style.display = 'none';
    document.getElementById('labelSubject').style.display = 'none';

    document.getElementById(inputId).style.display = 'block';
}

function showInputSelect(value) {
    // Verifica o valor selecionado e exibe o campo correspondente
    if (value === "1") {
        showInput('labelSubject');
    } else if (value === "2") {
        showInput('labelSchoolYear');
    } else {
        // Oculta todos os campos se nenhum valor válido for selecionado
        document.getElementById('labelSchoolYear').style.display = 'none';
        document.getElementById('labelSubject').style.display = 'none';
    }
}