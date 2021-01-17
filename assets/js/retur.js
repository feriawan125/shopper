var cartItems = [];
var pemasok = 0;
$(function () {
  buildCartList();
})
function json2Table(headerRow, rows, tableId) {

  //build the table
  const table = `
	<table class="table table-striped" id=\"${tableId}\">
		<thead>
			<tr>${headerRow}</tr>
		<thead>
		<tbody>
			${rows}
		<tbody>
	<table>`;


  return table;
}


function getBarang() {
  
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      let myList =JSON.parse(xhr.responseText);
      let selector = document.getElementById("tabelBarang");
      let cols = Object.keys(myList[0]);
      let headerRow = cols
      .map(col => `<th>${col}</th>`)
      .join("");
      let rows = myList
      .map(row => {
        let tds = cols.map(col => '<td onclick=\"fillBarang(' +`${row['KodeBarang']}, '${row['NamaBarang']}', '${row['HargaBeli']}'`+`)\">${row[col]}</td>`).join("");
        return `<tr class="cursor-pointer">${tds}</tr>`;
      })
      .join("");
  
      selector.innerHTML = json2Table(headerRow, rows, "Barang");
      $(function() {
        $('#Barang').DataTable();
      });
    }
  }

  xhr.open("POST", "../assets/ajax/selectBarang.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.send();
}

function buildCartList() {
  let cartItems = [];
  let selector = document.getElementById("cartList");
  let cols = ["Kode", "Nama Barang", "Kuantitas", "Harga Beli", "Subtotal", "Aksi"];
  let headerRow = cols
  .map(col => `<th>${col}</th>`)
  .join("");
  let rows = cartItems
  .map(row => {
    let tds = cols.map(col => `<td>${row[col]}</td>`).join("");
    return `<tr class="cursor-pointer>${tds}</tr>`;
  })
  .join("");

  $(function() {
    $('#cart').DataTable({
      "ordering": false,
    });
  });

  selector.innerHTML = json2Table(headerRow, rows, "cart");
}
function updateCartList(kode, namaBarang, kuantitas, hargaBeli) {
  kuantitas = parseInt(kuantitas);
  hargaBeli = parseInt(hargaBeli);
  txtTotal = document.getElementById('txtTotal');
  if(updateQty(kode, kuantitas, hargaBeli)){
    
  }else{
    let subtotal = hargaBeli * kuantitas;
    cartItems.push({"Kode": `${kode}`, "Nama Barang": `${namaBarang}`, "Kuantitas": `${kuantitas}`, "Harga Beli": `${hargaBeli}`, "Subtotal": `${subtotal}`, "Aksi": `<a href=\"#\" onclick=\"removeFromCart(${kode}); \" class=\"btn btn-block bg-gradient-danger btn-xs text-white\">Delete</a>`});
  }

  updateCart();
}

function updateQty(id, qty, hargaBeli) {
  let updated = false
  for (var i in cartItems) {
    if (cartItems[i].Kode == id) {
       cartItems[i].Kuantitas = parseInt(cartItems[i].Kuantitas) + parseInt(qty);
       cartItems[i].Subtotal = cartItems[i].Kuantitas * parseInt(hargaBeli);
       updated = true;
       break;
    }
  }
  return updated;
}

function addToCart() {
  let kodeBarang = document.getElementById("kodeBarang");
  let namaBarang = document.getElementById("namaBarang");
  let hargaBeli = document.getElementById("hargaBeli");
  let kuantitas = document.getElementById("kuantitas");
  if (kuantitas.value > 0) {
    if (kodeBarang.value != "") {
      updateCartList(kodeBarang.value, namaBarang.value, kuantitas.value, hargaBeli.value);
      kodeBarang.value = "";
      namaBarang.value = "";
      hargaBeli.value = "";
      kuantitas.value = 1;
    }
  }
}

Array.prototype.sum = function (prop) {
  var total = 0
  for ( var i = 0, _len = this.length; i < _len; i++ ) {
      total += parseInt(this[i][prop]);
  }
  return total
}
function getNotaBeli() {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      let myList =JSON.parse(xhr.responseText);
      let selector = document.getElementById("tabelNota");
      let cols = Object.keys(myList[0]);
      let headerRow = cols
      .map(col => `<th>${col}</th>`)
      .join("");
      let rows = myList
      .map(row => {
        let tds = cols.map(col => '<td onclick=\"fillNotaBeli(' +`'${row['KodeBeli']}'`+`)\">${row[col]}</td>`).join("");
        return `<tr class="cursor-pointer">${tds}</tr>`;
      })
      .join("");
  
      selector.innerHTML = json2Table(headerRow, rows, "pemasok");
      $(function() {
        $('#pemasok').DataTable();
      });
    }
  }

  xhr.open("POST", "../assets/ajax/selectNota.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "getNota"}));
}
function getNotaRetur() {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      let myList =JSON.parse(xhr.responseText);
      let selector = document.getElementById("tabelNotaRetur");
      let cols = Object.keys(myList[0]);
      let headerRow = cols
      .map(col => `<th>${col}</th>`)
      .join("");
      let rows = myList
      .map(row => {
        let tds = cols.map(col => '<td onclick=\"fillNotaRetur(' +`'${row['KodeRetur']}', '${row['KodeBeli']}'`+`)\">${row[col]}</td>`).join("");
        return `<tr class="cursor-pointer">${tds}</tr>`;
      })
      .join("");
  
      selector.innerHTML = json2Table(headerRow, rows, "notaRetur");
      $(function() {
        $('#notaRetur').DataTable();
      });
    }
  }

  xhr.open("POST", "../assets/ajax/selectNota.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "getNotaRetur"}));
}

function fillNotaBeli(kodeBeli) {
  document.getElementById('notaBeli').value = kodeBeli;
  $('#modal-notabeli').modal('hide');

}
function fillBarang(id, nama, harga) {
  let idBarang = document.getElementById("kodeBarang");
  let namaBarang = document.getElementById("namaBarang");
  let hargaBeli = document.getElementById("hargaBeli");
  idBarang.value = id;
  namaBarang.value = nama;
  hargaBeli.value = harga;
  $('#modal-barang').modal('hide')

}
function updateCart(aksi = true) {
  let selector = document.getElementById("cartList");
  let cols = [];
  if (aksi) {
    cols = ["Kode", "Nama Barang", "Kuantitas", "Harga Beli", "Subtotal", "Aksi"];
  } else{
    cols = ["Kode", "Nama Barang", "Kuantitas", "Harga Beli", "Subtotal"];
  }
  let headerRow = cols
  .map(col => `<th>${col}</th>`)
  .join("");
  let rows = cartItems
  .map(row => {
    let tds = cols.map(col => `<td>${row[col]}</td>`).join("");
    return `<tr class="cursor-pointer">${tds}</tr>`;
  })
  .join("");

  $(function() {
    $('#cart').DataTable({
      "ordering": false,
    });
  });

  txtTotal.innerHTML = new Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3 }).format(cartItems.sum("Subtotal"));

  selector.innerHTML = json2Table(headerRow, rows, "cart");
}
function save() {
  let txId = document.getElementById('txId').value;
  let kodeBeli = document.getElementById('notaBeli').value;
  let total = cartItems.sum("Subtotal");
  if (notaBeli !== "" && cartItems.length !== 0) {
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function (){
      if (xhr.readyState == 4 && xhr.status == 200) {
        if (xhr.responseText == 'Transaksi Berhasil') {
          swal('Sukses', 'Transaksi berhasil', 'success'); 
          goToPage('retur');
        }else{
          swal('Gagal', 'Transaksi gagal', 'error'); 
        }
      }
    }
  
    xhr.open("POST", "../assets/ajax/insertRetur.php", true);
    xhr.setRequestHeader('token', getCookie('token'));
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify({txId: txId, total: total, kodeBeli: kodeBeli, cart:cartItems}));
    
  }
}

function getNotaReturDetail(kodeRetur){
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      let myList =JSON.parse(xhr.responseText);
      cartItems = myList;
      updateCart(false);
    }
  }

  xhr.open("POST", "../assets/ajax/selectNota.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "getNotaReturDetail",kodeRetur: kodeRetur}));
}
function fillNotaRetur(kodeRetur, kodeBeli) {
  document.getElementById('txId').value = kodeRetur;
  document.getElementById('notaBeli').value = kodeBeli;
  getNotaReturDetail(kodeRetur);
  $('#btnDelete').toggleClass('d-none');
  $('#btnSave').toggleClass('d-none');
  $('#addItemGroup').toggleClass('d-none');
  $('#modal-nota').modal('hide');
}
function resetRetur() {
  goToPage('retur');
}
function delNotaRetur() {
  swal({
    title: "Ada Yakin?",
    text: "Data akan dihapus dan tidak dapat dikembalikan lagi!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      let kodeRetur = document.getElementById('txId');
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function (){
        if (xhr.readyState == 4 && xhr.status == 200) {
          if (xhr.responseText == 'Delete Berhasil') {
            swal('Sukses', 'Retur berhasil dihapus', 'success');
            goToPage('pembelian');
          }else{
            swal('Gagal', 'Retur gagal dihapus', 'error');
          }
        }
      }
    
      xhr.open("POST", "../assets/ajax/deleteRetur.php", true);
      xhr.setRequestHeader('token', getCookie('token'));
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.send(JSON.stringify({kodeRetur: kodeRetur.value}));
    }
  });
}