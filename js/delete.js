function showConfirmationModal(event) {
    event.preventDefault();

    var modal = document.getElementById('confirmationModal');
    modal.style.display = 'block';

    var recordId = document.getElementById('record_id').value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'scripts/get_record_info.php?id=' + recordId, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var recordInfo = JSON.parse(xhr.responseText);

            document.getElementById('recordName').textContent = recordInfo.name;
            document.getElementById('recordEmail').textContent = recordInfo.email;
            document.getElementById('recordAge').textContent = recordInfo.age;
        } else {
            console.error('Erro ao buscar informações do registro: ' + xhr.status);
        }
    };

    xhr.send();
}

document.querySelector('.close').addEventListener('click', function() {
    var modal = document.getElementById('confirmationModal');
    modal.style.display = 'none';
});

document.getElementById('confirmDelete').addEventListener('click', function() {
    document.querySelector('form').submit();
});