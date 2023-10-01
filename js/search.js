function searchTable() {
    const input = document.getElementById("searchInput");
    const filter = input.value.toUpperCase();
    const table = document.getElementById("dataTable");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        const nameColumn = rows[i].getElementsByTagName("td")[1];
        if (nameColumn) {
            const txtValue = nameColumn.textContent || nameColumn.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}