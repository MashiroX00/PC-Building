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

        const newElement = document.createElement('div');
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
        newElement.setAttribute('data-info', data);
        dropzone.textContent = '';

        dropzone.appendChild(newElement);

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

const url = "http://localhost/PC-Building/";
function sendXML() {
    const dropzones = document.querySelectorAll('.dropzone');
    const itemArray = [];

    dropzones.forEach(dropzone => {
        const draggableItems = dropzone.querySelectorAll('.draggable');
        draggableItems.forEach(item => {
            const datainfoString = item.getAttribute("data-info");
            const datainfoObject = JSON.parse(datainfoString);
            itemArray.push(datainfoObject); // เก็บข้อมูล item แต่ละตัว
        });
    });
    console.log(itemArray);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", url + "ClassicModeOutput.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = url + 'ClassicModeOutput.php';

            const dataInput = document.createElement('input');
            dataInput.type = 'hidden';
            dataInput.name = 'datainfo';
            dataInput.value = JSON.stringify(itemArray);
            
            const worngcounters = document.createElement('input');
            worngcounters.type = 'hidden';
            worngcounters.name = 'worngvalue';
            worngcounters.value = worngcounter;

            form.appendChild(dataInput);
            form.appendChild(worngcounters);
            document.body.appendChild(form);
            form.submit();
        }
    };
    xhr.send("datainfo=", + JSON.stringify(itemArray));
}

const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));