function dropdown() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function (event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function add_acc() {
  let login = document.getElementById('login').value;
  let password = document.getElementById('password').value;

  if (login === '' && password === '') {
    alert("Вы ввели неверные данные");
    window.location.href = "admin.php"
  } else {
    alert("Пользователь успешно добавлен");
  }
}
/*
function add_team() {
  let login = document.getElementById('login').value;
  let password = document.getElementById('password').value;
  let team = document.getElementById('team').value;

  if (login.trim() !== '' && password.trim() !== '' && team.trim() !== '') {
    if (team == 'Ястребы' || team == 'Медведи' || team == 'Рыси' || team == 'Барсы') {
      alert("Пользователь успешно добавлен");
    } else {
      alert("Выберите команду!");
    }
  } else {
    alert("Вы ввели неверные данные");
  }
}*/


function showDropdown() {
  var dropdown = document.getElementById("dropdown");
  dropdown.style.display = "block";
}


function change_komu() {
  var inp = document.getElementById('test');
  if (inp.value == "Чистота") {
    inp.max = 3;
  } 
  console.log(inp.name);
}
