const x = document.getElementById('input');
const y = document.getElementById('output');

const a = 100;
const b = Math.pow(a, 1/a);

function updateOutput(event) {
    y.innerText = Math.floor(a * Math.pow(b, x.value));
}
updateOutput();
input.addEventListener('mousemove', updateOutput);