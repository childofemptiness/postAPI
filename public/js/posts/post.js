
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

document.addEventListener('DOMContentLoaded', function() {

    const form = document.getElementById("myForm");

    if (form) {

        // Обработчик обновления поста
        form.addEventListener('submit', async function(e) {

            e.preventDefault();

            await updatePost();

            window.history.back();
        });
    }
  
    var deleteButton = document.getElementById('deletePostButton');

    if (deleteButton) {

        deleteButton.addEventListener('click', async function() {
        
            await deletePost();
    
            window.location.replace('/');
        });
    }
});

function getFormData() {

    const form = document.getElementById('myForm'); // Убедитесь, что это id вашей формы

    const formData = new FormData(form);

    return formData;
}

async function deletePost() {

    try {

        const response = await fetch(`/posts/${postId}`, {

            method: 'DELETE',
    
            headers: {
    
                'Content-Type': 'application/json',
    
                'Accept': 'application/json',
    
                'X-CSRF-TOKEN' : token,
            }
        });

        if (!response.ok) {

            throw new Error('Network response was not ok.'); 
        }

    } catch (error) {

        console.error('Произошла ошибка:', error);
    }
}

async function updatePost() {

    const formData = getFormData(); // Убедитесь, что эта функция правильно извлекает данные формы

    const csrfToken = formData.get('_token'); // Извлекаем CSRF токен из FormData

    let body = {

        'title' : formData.get('title'),

        'content': formData.get('content'),
    };

    try {

        const response = await fetch(`/posts/${postId}`, {

            method: 'PUT',

            headers: {

                'Content-Type': 'application/json',

                'Accept': 'application/json',

                'X-CSRF-TOKEN': csrfToken, // Добавляем CSRF токен в заголовок
            },

            body: JSON.stringify(body),
        });

        if (!response.ok) {

            throw new Error('Network response was not ok');
        }

        const responseData = await response.json();

        console.log(responseData);

    } catch (error) {  
        
        console.error('Произошла ошибка:', error);
    }
}