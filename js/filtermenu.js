function showMenu() {
    var filter = document.getElementById("filter");
    filter.style.display = "block";
}



function applyFilters() {
    var filter = document.getElementById("filter");
    filter.style.display = "none";
    var checkboxesTypes = document.querySelectorAll('[name="types[]"]');
    var checkboxesGenre = document.querySelectorAll('[name="genre[]"]');
    var checkboxesDubbing = document.querySelectorAll('[name="dubbing[]"]');
    var selectedTypes = [];
    var selectedGenre = [];
    var selectedDubbing = [];
    for (var i = 0; i < checkboxesTypes.length; i++) {
      if (checkboxesTypes[i].checked) {
        selectedTypes.push(checkboxesTypes[i].value);
      }
    }
    for (var i = 0; i < checkboxesGenre.length; i++) {
        if (checkboxesGenre[i].checked) {
            selectedGenre.push(checkboxesGenre[i].value);
        }
    }
    for (var i = 0; i < checkboxesDubbing.length; i++) {
        if (checkboxesDubbing[i].checked) {
            selectedDubbing.push(checkboxesDubbing[i].value);
        }
    }
    var container = document.querySelector('.container1');
    var items = container.getElementsByClassName('item');
    if(selectedTypes.length == 0 && selectedGenre.length == 0 && selectedDubbing.length == 0){
        for (var i = 0; i < items.length; i++) {
            items[i].style.display = "block";
        }
    }
    else if(selectedTypes.length != 0 && selectedGenre.length == 0 && selectedDubbing.length == 0){
        for (var i = 0; i < items.length; i++) {
            var itemType = items[i].querySelector('.title:nth-child(3)').innerText;
            console.log(itemType);
            if (selectedTypes.includes(itemType)) {
                items[i].style.display = "block";
            }
            else {
                items[i].style.display = "none";
            }
        }
    }
    else if(selectedTypes.length == 0 && selectedGenre.length != 0 && selectedDubbing.length == 0){
        for (var i = 0; i < items.length; i++) {
            var itemGenre = items[i].querySelector('.title:nth-child(4)').innerText;
            if (selectedGenre.includes(itemGenre)) {
                items[i].style.display = "block";
            }
            else {
                items[i].style.display = "none";
            }
        }
    }
    else if(selectedTypes.length == 0 && selectedGenre.length == 0 && selectedDubbing.length != 0){
        for (var i = 0; i < items.length; i++) {
            var itemDubbing = items[i].querySelector('.title:nth-child(5)').innerText;
            if (selectedDubbing.includes(itemDubbing)) {
                items[i].style.display = "block";
            }
            else {
                items[i].style.display = "none";
            }
        }
    }
    else if(selectedTypes.length != 0 && selectedGenre.length != 0 && selectedDubbing.length == 0){
        for (var i = 0; i < items.length; i++) {
            var itemType = items[i].querySelector('.title:nth-child(3)').innerText;
            var itemGenre = items[i].querySelector('.title:nth-child(4)').innerText;
            if (selectedGenre.includes(itemGenre) && selectedTypes.includes(itemType)) {
                items[i].style.display = "block";
            }
            else {
                items[i].style.display = "none";
            }
        }
    }
    else if(selectedTypes.length != 0 && selectedGenre.length == 0 && selectedDubbing.length != 0){
        for (var i = 0; i < items.length; i++) {
            var itemType = items[i].querySelector('.title:nth-child(3)').innerText;
            var itemDubbing = items[i].querySelector('.title:nth-child(5)').innerText;
            if (selectedDubbing.includes(itemDubbing) && selectedTypes.includes(itemType)) {
                items[i].style.display = "block";
            }
            else {
                items[i].style.display = "none";
            }
        }
    }
    else if(selectedTypes.length == 0 && selectedGenre.length != 0 && selectedDubbing.length != 0){
        for (var i = 0; i < items.length; i++) {
            var itemGenre = items[i].querySelector('.title:nth-child(4)').innerText;
            var itemDubbing = items[i].querySelector('.title:nth-child(5)').innerText;
            if (selectedDubbing.includes(itemDubbing) && selectedGenre.includes(itemGenre)) {
                items[i].style.display = "block";
            }
            else {
                items[i].style.display = "none";
            }
        }
    }
    else if(selectedTypes.length != 0 && selectedGenre.length != 0 && selectedDubbing.length != 0){
        for (var i = 0; i < items.length; i++) {
            var itemType = items[i].querySelector('.title:nth-child(3)').innerText;
            var itemGenre = items[i].querySelector('.title:nth-child(4)').innerText;
            var itemDubbing = items[i].querySelector('.title:nth-child(5)').innerText;
            if (selectedDubbing.includes(itemDubbing) && selectedGenre.includes(itemGenre) && selectedTypes.includes(itemType)) {
                items[i].style.display = "block";
            }
            else {
                items[i].style.display = "none";
            }
        }
    }
}
