var formPemasok = document.getElementById('formPemasok');

formPemasok.addEventListener("submit", (e) =>{
  e.preventDefault();
  
  let formData = new FormData(formPemasok);
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      if (xhr.responseText == 'Input Data Berhasil!') {
        swal('Sukses', 'Data pemasok sukses dibuat', 'success'); 
        goToPage('master/pemasok');
      }else{
        swal('Gagal', 'Data pemasok gagal dibuat', 'error'); 
      }
    }
  }

  xhr.open("POST", "../assets/ajax/createPemasok.php");
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.send(formData);

});