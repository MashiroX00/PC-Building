
require('dotenv').config({ path: path.resolve(__dirname, '../.env')});

const primaryurl = window.location.origin;
const app = "/PC-Building/"
const data = document.querySelectorAll(".ID");
const url = primaryurl + app;
function Save() {
    const items = [];
    data.forEach(item => {
        const datainfoString = item.getAttribute("data-info");
        const datainfoObject = JSON.parse(datainfoString);
        items.push(datainfoObject); // เก็บข้อมูล item แต่ละตัว
    })
    console.log(items);
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", url + "GameSystems/Savecareer.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = url + 'GameSystems/Savecareer.php';

            const dataInput = document.createElement('input');
            dataInput.type = 'hidden';
            dataInput.name = 'datainfo';
            dataInput.value = JSON.stringify(items);
            
            const dataInput1 = document.createElement('input');
            dataInput1.type = 'hidden';
            dataInput1.name = 'gametype';
            dataInput1.value = 'Classic';

            const score = document.createElement('input');
            score.type = 'hidden';
            score.name = 'score';
            score.value = '0';

            form.appendChild(dataInput);
            form.appendChild(dataInput1);
            form.appendChild(score);
            document.body.appendChild(form);
            form.submit();
        }
    };
    xhr.send("datainfo=", + JSON.stringify(items));
}