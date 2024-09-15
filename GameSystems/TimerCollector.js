const primaryurl = window.location.origin;
const app = "/PC-Building/"
let timeleft = document.getElementById("timer").innerHTML;
const url = primaryurl + app;
const Seed = document.getElementById("GameSeed").textContent;
const valuenow = document.getElementById('progressbarupdate');
const progresslive = document.getElementById('progress-live');
console.log(url);
console.log(Seed);
function countdown() {
    if (timeleft == 0) {
        document.getElementById("timer").innerHTML = "0";

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = url + 'GameSystems/Calipoint.php';

        const gameid = document.createElement('input');
        gameid.type = 'hidden';
        gameid.name = 'seed';
        gameid.value = Seed;

        form.appendChild(gameid);
        document.body.appendChild(form);
        form.submit();
    } else {
        document.getElementById("timer").innerHTML = timeleft;
        var timeTopercent = (timeleft / 120) * 100;
        console.log(timeTopercent.toFixed());
        valuenow.setAttribute('aria-valuenow',timeTopercent.toFixed());
        progresslive.style.width = timeTopercent.toFixed(1) + "%";
        progresslive.textContent = "Remaining : " + timeTopercent.toFixed() + "%";
        if (valuenow.getAttribute('aria-valuenow') <= 30) {
            progresslive.classList.add("text-dark");
        }
        timeleft--;
        setTimeout(countdown, 1000);
    }
}

function setTimeLeft() {
    var timeLeft = document.getElementById('timer').textContent;

    document.querySelector('input[name="timeleft"]').value = timeLeft;
}

const draggableItem = document.querySelectorAll(".draggable");
const dropzone = document.querySelectorAll(".dropzone");
var worngcounter = 0;

draggableItem.forEach(draggable => {
    draggable.addEventListener('dragstart', (event) => {
        const data = event.target.getAttribute('data-info');
        event.dataTransfer.setData('application/json', data);
        event.target.style.opacity = '0.5';
    });
    draggable.addEventListener('dragend', (event) => {
        event.target.style.opacity = '';
    });
});

dropzone.forEach(dropzone => {
    dropzone.addEventListener('dragover', (event) => {
        event.preventDefault();
        if (dropzone.querySelector('.draggable')) {
            event.dataTransfer.dropEffect = 'none'; // ไม่ให้วาง item ถ้า Dropzone ไม่ว่าง
        } else {
            event.dataTransfer.dropEffect = 'move';
        }

    });
    dropzone.addEventListener('drop', (event) => {
        event.preventDefault();


        const data = event.dataTransfer.getData('application/json');
        const jsonData = JSON.parse(data);

        const dropzoneType = dropzone.getAttribute('data-item-type');
        if (jsonData.type !== dropzoneType) {
            worngcounter += 1;
            console.log(worngcounter);

            alert("Dropzone นี้ไม่ใช่ประเภทนี้นะ");
            return worngcounter; // ไม่ให้วาง item ถ้าประเภทไม่ตรงกัน
        }

        const newElement = document.createElement('label');
        newElement.className = 'draggable';
        newElement.draggable = true;
        newElement.textContent = jsonData.name;
        newElement.style.backgroundColor = jsonData.color;
        newElement.style.width = '100px';
        newElement.style.height = '100px';
        newElement.style.cursor = 'move';
        newElement.style.color = 'white';
        newElement.style.borderRadius = '5px';
        newElement.style.textAlign = 'center';
        newElement.style.alignContent = 'center';
        dropzone.textContent = '';

        const newinput = document.createElement('input');
        newinput.type = 'hidden';
        newinput.name = jsonData.type;
        newinput.value = jsonData.id;
        dropzone.appendChild(newElement);
        dropzone.appendChild(newinput);

        newElement.addEventListener('dragstart', (event) => {
            const data = event.target.getAttribute('data-info');
            event.dataTransfer.setData('application/json', data);
            event.target.style.opacity = '0.5';
        });

        newElement.addEventListener('dragend', (event) => {
            console.log("Dragend event triggered"); // เพิ่ม console.log เพื่อตรวจสอบ
            event.target.style.opacity = '';
            if (event.target.closest('.dropzone')) {
                console.log("Item outside dropzone, removing..."); // เพิ่ม console.log
                event.target.remove();

            }
        });
    });
});

function sendXML() {
    const form = document.createElement('form');
        form.method = 'POST';
        form.action = url + 'GameSystems/Calipoint.php';

        const gameid = document.createElement('input');
        gameid.type = 'hidden';
        gameid.name = 'seed';
        gameid.value = Seed;

        form.appendChild(gameid);
        document.body.appendChild(form);
        form.submit();
}
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));