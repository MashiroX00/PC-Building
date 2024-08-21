
const data = document.querySelectorAll(".ID");
const url = "http://localhost/PC-Building/";

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
            
            const worngcounters = document.createElement('input');
            worngcounters.type = 'hidden';
            worngcounters.name = 'worngvalue';

            form.appendChild(dataInput);
            document.body.appendChild(form);
            form.submit();
        }
    };
    xhr.send("datainfo=", + JSON.stringify(items));
}