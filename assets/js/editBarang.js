// document.getElementById("tombolEdit").
// addEventListener("click", getID);

function getID(){
    var id = document.getElementById('kode').innerHTML;
    document.getElementById("hasil").innerHTML= id;
}

function editBarang(id) {
    var tabelBarang = document.getElementById('tabelBarang');
    var divKosong = document.getElementById('divKosong');
    tabelBarang.style.display = "none";
    divKosong.style.display = "block";

    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        divKosong.innerHTML = xhr.responseText;
      }
    }
    
    xhr.open('GET', '../views/master/edit-barang.php?kode=' + id, true);
    xhr.send();
}