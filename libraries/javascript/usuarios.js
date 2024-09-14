// Função para deletar um usuário
function deleteUser(userId) {
    var userElement = document.getElementById(userId);
    if (userElement) {
        userElement.remove();
    }
}

// Função para abrir o modal de edição
function openEdit(userId) {
    var modal = document.getElementById("edit-modal");
    var form = document.getElementById("edit-form");
    
    // Preencher o formulário com as informações atuais
    var userName = document.querySelector(`#${userId} .user-details h2`).innerText;
    var userPhoto = document.querySelector(`#${userId} .user-photo`).style.backgroundImage;
    
    form.elements["edit-name"].value = userName;
    form.elements["edit-photo"].value = userPhoto.replace('url("', '').replace('")', '');
    
    // Configurar o evento de submissão do formulário
    form.onsubmit = function(event) {
        event.preventDefault();
        updateUser(userId);
        closeEdit();
    };
    
    modal.style.display = "block";
}

// Função para fechar o modal de edição
function closeEdit() {
    var modal = document.getElementById("edit-modal");
    modal.style.display = "none";
}

// Função para atualizar as informações do usuário
function updateUser(userId) {
    var userName = document.getElementById("edit-name").value;
    var userPhoto = document.getElementById("edit-photo").value;
    
    var userElement = document.getElementById(userId);
    if (userElement) {
        userElement.querySelector('.user-details h2').innerText = userName;
        userElement.querySelector('.user-photo').style.backgroundImage = userPhoto ? `url(${userPhoto})` : 'none';
    }
}

// Fechar o modal quando o usuário clicar fora do modal
window.onclick = function(event) {
    var modal = document.getElementById("edit-modal");
    if (event.target === modal) {
        closeEdit();
    }
}
