document.addEventListener("DOMContentLoaded", function () {
  const dataTable = document.getElementById("dataTable");

  dataTable.addEventListener("click", function (event) {
    if (event.target.classList.contains("update-button")) {
      const button = event.target;
      const row = button.closest("tr");
      const cells = row.getElementsByTagName("td");

      const updatedData = {
        id: cells[0].textContent,
        name: cells[1].textContent,
        email: cells[2].textContent,
        age: cells[3].textContent,
      };

      checkEmailExists(updatedData, button);
    }
  });

  function checkEmailExists(data, button) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "scripts/check_email.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        if (response.exists) {
          throw new Error("Erro ao atualizar o registro: Email já registrado.");
        } else {
          updateRecord(data, button);
        }
      } else if (xhr.readyState === 4) {
        throw new Error(`Erro na verificação de email: ${xhr.status}`);
      }
    };

    const dataString = "email=" + data.email;

    xhr.send(dataString);
  }

  function updateRecord(data, _button) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "scripts/update_logic.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          if (xhr.responseText.includes("sucesso")) {
            window.location.reload();
          } else {
            throw new Error(
              `Erro ao atualizar o registro: ${xhr.responseText}`
            );
          }
        } else {
          throw new Error(`Erro na comunicação com o servidor: ${xhr.status}`);
        }
      }
    };

    const dataString =
      "id=" +
      data.id +
      "&name=" +
      data.name +
      "&email=" +
      data.email +
      "&age=" +
      data.age;

    xhr.send(dataString);
  }
});
