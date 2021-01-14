function editBarangForm(id) {
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

function editBarang(id) {

  let kodeBarang = document.getElementById('kodeBarang').value;
  let namaBarang = document.getElementById('namaBarang').value;
  let hargaBeli = document.getElementById('hargaBeli').value;
  let hargaJual = document.getElementById('hargaJual').value;
  let slug = document.getElementById('slug').value;

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (xhr.responseText == 'Update Data Berhasil!') {
        swal('Sukses', 'Data barang sukses diupdate', 'success'); 
        goToPage('master/barang');
      }else{
        swal('Gagal', 'Data barang gagal diupdate', 'error'); 
      }
    }
  }
  dataBarang = [{kodeBarang: kodeBarang, namaBarang: namaBarang, hargaBeli: hargaBeli, hargaJual: hargaJual, slug: slug}];
  console.log(dataBarang);

  xhr.open("POST", "../assets/ajax/editBarang.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "update", data: dataBarang}));

}