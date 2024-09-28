function checkCookie(id_title) {
    const titleId = id_title; 
    const userLogin = getLoginFromCookie(); 

    fetch('addToTitleUserTable.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ title_id: titleId, user_login: userLogin }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        alert(data); 
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });
}

function getLoginFromCookie() {
    const cookieName = 'login';
    const name = cookieName + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(';');
    
    for(let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i];
        while (cookie.charAt(0) == ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(name) == 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }

    return cookieName;
}
