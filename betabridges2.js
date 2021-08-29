// const map = L.map('map').setView([50.84673, 4.35247], 12);

// L.tileLayer('https://tile.openstreetmap.be/osmbe/{z}/{x}/{y}.png', {
//     attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors' +
//         ', Tiles courtesy of <a href="https://geo6.be/">GEO-6</a>',
//     maxZoom: 18
// }).addTo(map);

// var marker = L.marker([50.84673, 4.35247]).addTo(map);

// var popup = marker.bindPopup('<b>Hello world!</b><br />I am a Supposed to be a BETABRIDGES tracker, I\'ll display the protocol, address and state of the device .');


const sidebarClose = document.querySelector('.sidebar__close');
const sidebar = document.querySelector('.sidebar');
const sidebarOpen = document.querySelector('.sidebar__open');
const mapi = document.querySelector('.map');

sidebarClose.addEventListener('click', function() {
    sidebar.classList.add('hidden');
    sidebarClose.classList.add('hidden');
    sidebarOpen.classList.remove('hidden');
    mapi.style.width = Number.parseFloat(getComputedStyle(mapi).width, 10) + 46.5 + 'rem';
});

sidebarOpen.addEventListener('click', function() {
    sidebar.classList.remove('hidden');
    sidebarClose.classList.remove('hidden');
    sidebarOpen.classList.add('hidden');
});