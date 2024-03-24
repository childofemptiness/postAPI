
document.addEventListener('DOMContentLoaded', function() {

    const form = document.getElementById("myForm");

    var cleanButton = document.getElementById('cleanButton');

    // Обработчик клика для кнопки отмены
    cleanButton.addEventListener('click', function() {
        
        form.reset();
    });

    // Обработчик сабмита формы
    form.addEventListener('submit', async function(e) {

        e.preventDefault();

        await sendPost();
        
        form.reset();
    });
});

function getFormData() {

    const form = document.getElementById('myForm'); // Убедитесь, что это id вашей формы

    const formData = new FormData(form);

    return formData;
}


async function sendPost() {

    const formData = getFormData(); // Убедитесь, что эта функция правильно извлекает данные формы

    const csrfToken = formData.get('_token'); // Извлекаем CSRF токен из FormData

    let body = {

        'title' : formData.get('title'),

        'content': formData.get('content'),
    };

    try {

        const response = await fetch(`/posts`, {

            method: 'POST',

            headers: {

                'Content-Type' : 'application/json',

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