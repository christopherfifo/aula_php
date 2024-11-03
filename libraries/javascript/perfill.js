function enableEditing() {
    // Habilitar os campos para edição
    document.getElementById('nome').removeAttribute('readonly');
    document.getElementById('numero_celular').removeAttribute('readonly');
    document.getElementById('rg').removeAttribute('readonly');
    document.getElementById('cpf').removeAttribute('readonly');
    document.getElementById('data_nascimento').removeAttribute('readonly');
    document.getElementById('sexo').removeAttribute('disabled');

    // Mostrar botão de salvar e esconder botão de editar
    document.getElementById('edit-btn').style.display = 'none';
    document.getElementById('save-btn').style.display = 'inline-block';
}