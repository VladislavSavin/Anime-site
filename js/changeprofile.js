function showMenu() {
    var change = document.getElementById("change");
    change.style.display = "block";
}
        function editUserName(username) {
            var newUsername = prompt("Введите новое имя:", username);
            if (newUsername && newUsername !== username) {
                document.querySelector('.containerhead').innerText = newUsername;
                saveChanges(newUsername, document.getElementById('preview').src);
            }
        }

        function previewImage() {
            var preview = document.getElementById('preview');
            var fileInput = document.getElementById('fileInput');

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    saveChanges(document.querySelector('.containerhead').innerText, e.target.result);
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        function changeAvatar() {
            var fileInput = document.getElementById('fileInput');
            fileInput.click();
        }

        function saveChanges(username, photo) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'profile.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('username=' + username + '&photo=' + photo);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                } else {
                    console.error('Произошла ошибка: ' + xhr.status);
                }
            }
        }
