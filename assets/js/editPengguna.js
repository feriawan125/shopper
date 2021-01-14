function editPenggunaForm(id) {
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
    
    xhr.open('GET', '../views/master/edit-pengguna.php?kode=' + id, true);
    xhr.send();
}


function editPengguna(id) {

  let kodePengguna = document.getElementById('kodePengguna').value;
  let usernamePengguna = document.getElementById('usernamePengguna').value;
  let passwordPengguna = document.getElementById('passwordPengguna').value;
  let emailPengguna = document.getElementById('emailPengguna').value;
  let fullnamePengguna = document.getElementById('fullnamePengguna').value;
  let teleponPengguna = document.getElementById('teleponPengguna').value;
  let aksesPengguna = document.getElementById('aksesPengguna').value;

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (xhr.responseText == 'Update Data Berhasil!') {
        swal('Sukses', 'Data pengguna sukses diupdate', 'success'); 
        goToPage('master/pengguna');
      }else{
        swal('Gagal', 'Data pengguna gagal diupdate', 'error'); 
      }
    }
  }
  dataPengguna = [{kodePengguna: kodePengguna, usernamePengguna: usernamePengguna, passwordPengguna: passwordPengguna, emailPengguna: emailPengguna, fullnamePengguna: fullnamePengguna, teleponPengguna: teleponPengguna, aksesPengguna: aksesPengguna}];
  console.log(dataPengguna);

  xhr.open("POST", "../assets/ajax/editPengguna.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "update", data: dataPengguna}));

}