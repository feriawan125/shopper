// FUNGSI MENGHAPUS DATA
function deleteData(id) {

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (xhr.responseText == 'Delete Data Pengguna Berhasil!') {
        swal('Sukses', 'Data pengguna sukses dihapus', 'success'); 
        goToPage('master/pengguna');
      }else{
        swal('Gagal', 'Data pengguna gagal dihapus', 'error'); 
      }
    }
  }

  xhr.open("POST", "../assets/ajax/deletePengguna.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "delete", data: id}));

}

// FUNGSI UNTUK MEMBUKA DETAIL DATA
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
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.send();
}