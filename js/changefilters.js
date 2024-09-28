function changeFilters() {
  var types = document.getElementsByName('types[]');
  var dubbingCheckboxes = document.getElementsByClassName('dubbing');

  var checkedCount = 0;
  for (var i = 0; i < types.length; i++) {
    if (types[i].checked) {
      checkedCount++;
      if (types[i].value == 'Аниме') {
        disableDubbing(dubbingCheckboxes, ['Азбука', 'AnimeLibri']);
      } else if (types[i].value == 'Манга') {
        disableDubbing(dubbingCheckboxes, ['Dream Cast', 'Anilibria', 'JAM CLUB', 'AniDUB']);
      }
    }
  }

  if (checkedCount === 0 || checkedCount === 2) {
    for (var i = 0; i < dubbingCheckboxes.length; i++) {
      dubbingCheckboxes[i].disabled = false;
    }
  }
}

function disableDubbing(checkboxes, dubbingNames) {
  for (var i = 0; i < checkboxes.length; i++) {
    var label = checkboxes[i].value;
    if (dubbingNames.includes(label)) {
      checkboxes[i].checked = false;
      checkboxes[i].disabled = true;
    } else {
      checkboxes[i].disabled = false;
    }
  }
}