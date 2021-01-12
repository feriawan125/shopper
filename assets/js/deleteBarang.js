// FUNGSI MENGHAPUS DATA
function deleteData(id) {

  var formBarang = document.getElementById('formBarang');

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (xhr.responseText == 'Delete Data Berhasil!') {
        swal('Sukses', 'Data barang sukses dihapus', 'success'); 
        formBarang.reset();
      }else{
        swal('Gagal', 'Data barang gagal dihapus', 'error'); 
      }
    }
  }

  xhr.open("POST", "../assets/ajax/deleteBarang.php?kode=" + id, true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.send(formData);

}

// FUNGSI UNTUK MEMBUKA DETAIL
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