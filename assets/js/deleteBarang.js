function deleteBarang(id) {
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
  
  xhr.open('GET', '../views/master/delete-barang.php?kode=' + id, true);
  xhr.send();
}