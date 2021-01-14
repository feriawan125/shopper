// FUNGSI MENGHAPUS DATA
function deleteData(id) {

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (xhr.responseText == 'Delete Data Berhasil!') {
        swal('Sukses', 'Data pemasok sukses dihapus', 'success'); 
        goToPage('master/pemasok');
      }else{
        swal('Gagal', 'Data pemasok gagal dihapus', 'error'); 
      }
    }
  }

  xhr.open("POST", "../assets/ajax/deletePemasok.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "delete", data: id}));
}

// FUNGSI UNTUK MEMBUKA DETAIL DATA
function deletePemasok(id) {
  var tabelPemasok = document.getElementById('tabelPemasok');
  var divKosong = document.getElementById('divKosong');
  tabelPemasok.style.display = "none";
  divKosong.style.display = "block";

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      divKosong.innerHTML = xhr.responseText;
    }
  }
  
  xhr.open('GET', '../views/master/delete-pemasok.php?kode=' + id, true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.send();
}