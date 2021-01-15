var cartItems = [];
var pemasok = 0;
$(function () {
  buildCartList();
})

function getPemasok() {
  
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      let myList =JSON.parse(xhr.responseText);
      let selector = document.getElementById("tabelPemasok");
      let cols = Object.keys(myList[0]);
      let headerRow = cols
      .map(col => `<th>${col}</th>`)
      .join("");
      let rows = myList
      .map(row => {
        let tds = cols.map(col => '<td onclick=\"fillPemasok(' +`${row['KodePemasok']}, '${row['NamaPemasok']}', '${row['AlamatPemasok']}'`+`)\">${row[col]}</td>`).join("");
        return `<tr class="cursor-pointer">${tds}</tr>`;
      })
      .join("");
  
      selector.innerHTML = json2Table(headerRow, rows, "pemasok");
      $(function() {
        $('#pemasok').DataTable();
      });
    }
  }

  xhr.open("POST", "../assets/ajax/selectPemasok.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "getPemasok"}));
  xhr.send();
}

function getPemasokDetail(idPemasok) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      let myList =JSON.parse(xhr.responseText);
      fillPemasok(idPemasok, myList.NamaPemasok, myList.AlamatPemasok);
    }
  }

  xhr.open("POST", "../assets/ajax/selectPemasok.php", true);
  xhr.setRequestHeader('token', getCookie('token'));
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify({action: "getPemasokDetail", idPemasok: idPemasok}));
}


function json2Table(headerRow, rows, tableId) {
  // let cols = Object.keys(json[0]);


  //Map over columns, make headers,join into string
  // let headerRow = cols
  //   .map(col => `<th>${col}</th>`)
  //   .join("");

  //map over array of json objs, for each row(obj) map over column values,
  //and return a td with the value of that object for its column
  //take that array of tds and join them
  //then return a row of the tds
  //finally join all the rows together
  // let rows = json
  //   .map(row => {
  //     let tds = cols.map(col => '<td onclick=\"fill(' +`${row['KodePemasok']}, '${row['NamaPemasok']}', '${row['AlamatPemasok']}'`+`)\">${row[col]}</td>`).join("");
  //     return `<tr class="cursor-pointer">${tds}</tr>`;
  //   })
  //   .join("");

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

function fillPemasok(id, nama, alamat) {
  let namaPemasok = document.getElementById("namaPemasok");
  let idPemasok = document.getElementById("idPemasok");
  let alamatPemasok = document.getElementById("alamatPemasok");
  namaPemasok.value = nama;
  idPemasok.value = id;
  alamatPemasok.value = alamat;
  pemasok = id;
  $('#modal-pemasok').modal('hide')

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
  let cols = ["Kode", "Nama Barang", "Kuantitas", "Harga Beli", "Subtotal"];
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
  hargaBeli = parseInt(hargaBeli)
  if(updateQty(kode, kuantitas, hargaBeli)){
    
  }else{
    let subtotal = hargaBeli * kuantitas;
    cartItems.push({"Kode": `${kode}`, "Nama Barang": `${namaBarang}`, "Kuantitas": `${kuantitas}`, "Harga Beli": `${hargaBeli}`, "Subtotal": `${subtotal}`});
  }
  let selector = document.getElementById("cartList");
  let cols = ["Kode", "Nama Barang", "Kuantitas", "Harga Beli", "Subtotal"];
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

  selector.innerHTML = json2Table(headerRow, rows, "cart");
}

function updateQty(id, qty, hargaBeli) {
  let updated = false
  for (var i in cartItems) {
    if (cartItems[i].Kode == id) {
       cartItems[i].Kuantitas = parseInt(cartItems[i].Kuantitas) + parseInt(qty);
       cartItems[i].Subtotal = cartItems[i].Kuantitas * parseInt(hargaBeli);
       updated = true;
       console.log(cartItems);
       break; //Stop this loop, we found it!
    }
  }
  return updated;
}

function addToCart() {
  let kodeBarang = document.getElementById("kodeBarang").value;
  let namaBarang = document.getElementById("namaBarang").value;
  let hargaBeli = document.getElementById("hargaBeli").value;
  let kuantitas = document.getElementById("kuantitas").value;
  if (kuantitas > 0) {
    if (kodeBarang != "") {
      updateCartList(kodeBarang, namaBarang, kuantitas, hargaBeli);
      kodeBarang = "";
      namaBarang = "";
      hargaBeli = "";
      kuantitas = 1;
    }
  }
}

function save() {
  let txId = document.getElementById('txId').value;
  let total = cartItems.sum("Subtotal");
  if (pemasok !== "" && cartItems.length !== 0) {
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function (){
      if (xhr.readyState == 4 && xhr.status == 200) {
        if (xhr.responseText == 'Transaksi Berhasil') {
          swal('Sukses', 'Transaksi berhasil', 'success'); 
          goToPage('pembelian');
        }else{
          swal('Gagal', 'Transaksi gagal', 'error'); 
        }
      }
    }
  
    xhr.open("POST", "../assets/ajax/insertPembelian.php", true);
    xhr.setRequestHeader('token', getCookie('token'));
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify({txId: txId, pemasok: pemasok, total: total, cart:cartItems}));
    
  }
}

Array.prototype.sum = function (prop) {
  var total = 0
  for ( var i = 0, _len = this.length; i < _len; i++ ) {
      total += parseInt(this[i][prop]);
  }
  return total
}

function getNota() {
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
        let tds = cols.map(col => '<td onclick=\"fillNota(' +`${row['KodePemasok']}, '${row['KodeBeli']}'`+`)\">${row[col]}</td>`).join("");
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
  xhr.send();
}
function fillNota(kodePemasok, kodeBeli) {
  document.getElementById('txId').value = kodeBeli;
  getPemasokDetail(kodePemasok);
  $('#modal-nota').modal('hide')



}