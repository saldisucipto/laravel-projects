// Mencoba dengan vuejs
// Instance vue 

var app = new Vue({
    el: '#app',
    data: {
        tujuan : [],
        masukanValue : '',
    },
    methods: {
        tambahTujuan(){
            this.tujuan.push(this.masukanValue);
            this.masukanValue = '';
        },
        clearTujuan(){
            this.tujuan = [];
        }
    },
})

// // select button 
// const buttonEl = document.querySelector('button');

// // input element 
// const inputEl = document.querySelector('input');

// // list element
// const listEl = document.querySelector('ul');

// function tambahTujuan(){
//     // value inputan
//     // Menapatakan value inputan dari input tag
//     const masukanValue = inputEl.value;
//     // ekstarct valeu 
//     // membuat sebuah list item di dalam ul
//     const listItemEl = document.createElement('li');
//     // value li sama dengan inputan dari input 
//     listItemEl.textContent = masukanValue;
//     // metho appendchild berguna untuk menambhkan element baru pada html
//     listEl.appendChild(listItemEl);
//     // Merest jetika value sudah di tambahkan ke ke element
//     inputEl.value = '';
// }

// // Event ketika button klik di tekan
// buttonEl.addEventListener('click', tambahTujuan)