

const editArticleButtons = document.querySelectorAll('.editarticle');

editArticleButtons.forEach(button => {
    button.addEventListener('click', function (e) {
        //get id of current article
        const article_id = button.getAttribute('article_id');

        const id_input = document.getElementById('id');
        id_input.value = article_id;

        const designation_content = button.parentElement.parentElement.parentElement.children[1].innerHTML;

        const designation = document.getElementById('designation');
        designation.value = designation_content;

        const description_content = button.parentElement.parentElement.parentElement.children[2].innerHTML;

        const description = document.getElementById('description');
        description.value = description_content;

        const quantity_content = button.parentElement.parentElement.parentElement.children[3].innerHTML;

        const quantity = document.getElementById('quantity');
        quantity.value = quantity_content;

    });
});

const deleteArticleButtons = document.querySelectorAll('.deletearticle');

deleteArticleButtons.forEach(button => {
    button.addEventListener('click', function (e) {
        //get id of current article
        var result = confirm('êtes-vous sûr de vouloir supprimer cet article ?');
        if (result) {
            const token = document.querySelector('meta[name="csrf-token"]').content;
            const article_id = button.getAttribute('article_id');
            const data = {
                X_CSRF_TOKEN: token,
                id: article_id
            };
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/deletearticle');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', token);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    location.reload();
                } else {
                    console.log('Request failed.  Returned status of ' + xhr.status);
                }
            };
            // Send the request
            xhr.send(JSON.stringify(data));
        }
    });
});