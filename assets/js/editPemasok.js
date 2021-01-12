function editPemasok(id) {
    var tabelBarang = document.getElementById('tabelPemasok');
    var divKosong = document.getElementById('divKosong');
    tabelBarang.style.display = "none";
    divKosong.style.display = "block";

    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        divKosong.innerHTML = xhr.responseText;
      }
    }
    
    xhr.open('GET', '../views/master/edit-pemasok.php?kode=' + id, true);
    xhr.send();
}