function editPemasokForm(id) {
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
    
    xhr.open('GET', '../views/master/edit-pemasok.php?kode=' + id, true);
    xhr.send();
}

function editPemasok(id) {

  let kodePemasok = document.getElementById('kodePemasok').value;
  let namaPemasok = document.getElementById('namaPemasok').value;
  let alamatPemasok = document.getElementById('alamatPemasok').value;
  let teleponPemasok = document.getElementById('teleponPemasok').value;
  let slugPemasok = document.getElementById('slugPemasok').value;

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (xhr.responseText == 'Update Data Berhasil!') {
        swal('Sukses', 'Data pemasok sukses diupdate', 'success'); 
        goToPage('master/pemasok');
      }else{
        swal('Gagal', 'Data pemasok gagal diupdate', 'error'); 
      }
    }
  }
  dataPemasok = [{kodePemasok: kodePemasok, namaPemasok: namaPemasok, alamatPemasok: alamatPemasok, teleponPemasok: teleponPemasok, slugPemasok: slugPemasok}];
  console.log(dataPemasok);

  xhr.open("POST", "../assets/ajax/editPemasok.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "update", data: dataPemasok}));

}