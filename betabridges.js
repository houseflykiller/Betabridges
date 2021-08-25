'use strict';

const cogmodal = document.querySelector('.cog-modal');
const cog = document.querySelector('.drop-select-touch');
const overlay = document.querySelector('.overlay');


cog.addEventListener('click', function() {
    cogmodal.classList.remove('hidden');
    overlay.classList.remove('hidden');
});

overlay.addEventListener('click', function() {
    cogmodal.classList.add('hidden');
    overlay.classList.add('hidden');
});