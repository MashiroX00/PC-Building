

function updateMemoryUsage() {
    if (performance && performance.memory) {
        const memory = performance.memory;
        const usedJSHeapSize = memory.usedJSHeapSize / 1048576; // ใช้หน่วยเป็น MB
        const totalJSHeapSize = memory.totalJSHeapSize / 1048576;
        const jsHeapSizeLimit = memory.jsHeapSizeLimit / 1048576;

        // console.log(`Used JS Heap Size: ${usedJSHeapSize.toFixed(2)} MB`);
        // console.log(`Total JS Heap Size: ${totalJSHeapSize.toFixed(2)} MB`);
        // console.log(`JS Heap Size Limit: ${jsHeapSizeLimit.toFixed(2)} MB`);
        var mem = document.getElementById('memory');
        const memoryUsagePercent = (usedJSHeapSize / totalJSHeapSize) * 100;
        // console.log(memoryUsagePercent.toFixed(2));
        mem.setAttribute('aria-valuenow',memoryUsagePercent.toFixed(2));
        mem.style.width = memoryUsagePercent.toFixed(2) + "%";
        mem.textContent = memoryUsagePercent.toFixed(2) + "%";
    } else {
        console.log("Performance.memory API is not supported in this browser.");
    }
    
    
    
    
}

// เรียกใช้ฟังก์ชันทุก ๆ วินาที
setInterval(updateMemoryUsage, 1500);
let previousTimestamp = performance.now();
let cpuTimeSpent = 0;

function monitorCPU() {
    const start = performance.now();

    // ใส่โค้ดที่ต้องการวัดการใช้งาน CPU ที่นี่
    for (let i = 0; i < 1000000; i++) {
        Math.sqrt(i);
    }

    const end = performance.now();
    const cpuTime = end - start; // เวลาที่ใช้ในการประมวลผลโค้ด (ms)
    cpuTimeSpent += cpuTime;

    const currentTime = performance.now();
    const elapsedTime = currentTime - previousTimestamp; // เวลาที่ผ่านไปทั้งหมด (ms)

    const cpuUsagePercent = (cpuTimeSpent / elapsedTime) * 100;

    // console.log(`CPU Usage: ${cpuUsagePercent.toFixed(2)}%`);

    // รีเซ็ตค่า
    previousTimestamp = currentTime;
    cpuTimeSpent = 0;

    const cpu = document.getElementById('cpu');
    cpu.setAttribute('aria-valuenow',cpuUsagePercent.toFixed(2));
    cpu.style.width = cpuUsagePercent.toFixed(2) + "%";
    cpu.textContent =cpuUsagePercent.toFixed(2) + "%";
    setTimeout(monitorCPU, 1000);
}

monitorCPU();