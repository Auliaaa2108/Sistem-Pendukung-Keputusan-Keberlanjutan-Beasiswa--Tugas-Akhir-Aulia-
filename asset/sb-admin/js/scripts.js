/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  // Mendapatkan elemen select dan tombol
var selectElement = document.getElementById("itemSelect");
var addButton = document.getElementById("addButton");

// Menyimpan pilihan-pilihan yang sudah diinput sebelumnya
var selectedItems = [];

// Memuat item yang sudah diinput sebelumnya saat halaman dimuat
loadSelectedItems();

// Menambahkan event listener untuk tombol "Tambah Item"
addButton.addEventListener("click", function() {
    var selectedItem = selectElement.value;

    // Memeriksa apakah item sudah ada dalam daftar
    if (selectedItems.indexOf(selectedItem) === -1) {
        selectedItems.push(selectedItem);
        saveSelectedItems();
        updateSelectOptions();
    }
});

// Memuat item yang sudah diinput sebelumnya dari penyimpanan (misalnya, localStorage)
function loadSelectedItems() {
    var savedItems = localStorage.getItem("selectedItems");
    if (savedItems) {
        selectedItems = JSON.parse(savedItems);
        updateSelectOptions();
    }
}

// Menyimpan item yang sudah diinput sebelumnya ke penyimpanan (misalnya, localStorage)
function saveSelectedItems() {
    localStorage.setItem("selectedItems", JSON.stringify(selectedItems));
}

// Memperbarui opsi-opsi dalam elemen select
function updateSelectOptions() {
    selectElement.innerHTML = ""; // Menghapus semua opsi yang ada

    // Menambahkan opsi-opsi dari selectedItems
    for (var i = 0; i < selectedItems.length; i++) {
        var option = document.createElement("option");
        option.value = selectedItems[i];
        option.text = "Item " + selectedItems[i].substring(4); // Mengambil angka dari value
        selectElement.appendChild(option);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var parentElement = document.querySelector('.nav-link');
    var submenu = parentElement.nextElementSibling; // Menggunakan `nextElementSibling` untuk menemukan elemen `<ul>`

    parentElement.addEventListener('mouseover', function() {
        submenu.style.display = 'block';
    });

    parentElement.addEventListener('mouseout', function() {
        submenu.style.display = 'none';
    });
});



  
