document.getElementById("tombolEdit").
addEventListener("click", getID);

function getID(){
    var id = document.getElementById('kode').innerHTML;
    document.getElementById("hasil").innerHTML= id;
}

// tabelBarang.addEventListener('submit', e => {

//     e.preventDefault();

//     var xhr = new XMLHttpRequest();
  
//     xhr.onreadystatechange = function () {
//       if (xhr.readyState == 4 && xhr.status == 200) {
//         dataContainer.innerHTML = xhr.responseText;
//       }
//     }
    
//     xhr.open('GET', '../ajax/umatEditor.php?id=' + keyword.value, true);
//     xhr.send();
//   });