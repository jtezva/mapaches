$(document).ready(() => {
    fetch('/mapaches/back/endpoint/findAll.php?table=category')
    .then(response => response.json())
    .then(jsonData => {
        const $tbody = $('tbody');
        jsonData.data.list.forEach(element => {
            $tbody.append(`<tr><td>${element.id}</td><td>${element.description}</td>
                    <td>
                        <button class="btn btn-danger" onclick="deleteFn(${element.id})"><i class="fas fa-trash"></i></button>
                        <a href="candidates.html?categoryid=${element.id}" class="btn btn-secondary"><i class="fas fa-list"></i></a>
                        <a href="candidateform.html?id=${element.id}" class="btn btn-warning"><i class="fas fa-pencil"></i></a>
                    </td>
                </tr>`);
        });
    })
});

const deleteFn = id => {
    fetch('/mapaches/back/endpoint/delete.php?table=category&id=' + id)
    .then(response => response.json())
    .then(jsonData => {
        if (jsonData.success === true) {
            location.reload();
        } else {
            alert(jsonData.message);
        }
    })
};