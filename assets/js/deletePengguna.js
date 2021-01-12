function deletePengguna(id) {
    var tabelPengguna = document.getElementById('tabelPengguna');
    var divKosong = document.getElementById('divKosong');
    tabelPengguna.style.display = "none";
    divKosong.style.display = "block";
  
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        divKosong.innerHTML = xhr.responseText;
      }
    }
    
    xhr.open('GET', '../views/master/delete-pengguna.php?kode=' + id, true);
    xhr.send();
  }