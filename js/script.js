function searchItems() {
    var input, filter, container, item, title, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    container = document.querySelector('.container1');
    item = container.getElementsByClassName('item');
    for (i = 0; i < item.length; i++) {
        title = item[i].getElementsByClassName('title')[0];
        txtValue = title.textContent || title.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1 ) {
            item[i].style.display = "";
        } else {
            item[i].style.display = "none";
        }
    }

}