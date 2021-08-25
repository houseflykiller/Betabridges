var map = L.map('map').setView([50.84673, 4.35247], 12);

L.tileLayer('https://tile.openstreetmap.be/osmbe/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors' +
        ', Tiles courtesy of <a href="https://geo6.be/">GEO-6</a>',
    maxZoom: 18
}).addTo(map);

var marker = L.marker([50.84673, 4.35247]).addTo(map);

var popup = marker.bindPopup('<b>Hello world!</b><br />I am a Supposed to be a BETABRIDGES tracker, I\'ll display the protocol, address and state of the device .');