<?php
header('Content-Type: application/json');

// ตรวจสอบว่ามีการส่งคำสั่งมาไหม
if (isset($_POST['action']) && $_POST['action'] == 'runFunction') {
    function getSystemUsage() {
        // ดึงข้อมูลการใช้งาน CPU
        $cpuUsage = shell_exec("wmic cpu get loadpercentage");
        $cpuUsage = str_replace("LoadPercentage", "", $cpuUsage);
        $cpuUsage = trim(preg_replace('/\s+/', ' ', $cpuUsage));

        // ดึงข้อมูลการใช้งาน Memory
        $memoryUsage = shell_exec("powershell -command \"Get-Counter -Counter '\\Memory\\Available MBytes' | Select-Object -ExpandProperty CounterSamples | Select-Object -ExpandProperty CookedValue\"");
        $totalMemory = 16384; // กำหนดค่า Total Memory
        $usedMemory = $totalMemory - $memoryUsage;
        $memoryUsagePercent = ($usedMemory / $totalMemory) * 100;

        return [
            'cpuUsage' => $cpuUsage,
            'memoryUsage' => round($memoryUsagePercent, 2),
        ];
    }

    // เรียกใช้ฟังก์ชันเพื่อดึงข้อมูล
    $usage = getSystemUsage();
    
    // บันทึกข้อมูลลงไฟล์ JSON
    $fileWritten = file_put_contents('system_usage.json', json_encode($usage));
    
    // ตรวจสอบว่าการเขียนไฟล์สำเร็จหรือไม่
    if ($fileWritten !== false) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit; // ทำให้แน่ใจว่าไม่มีการประมวลผลต่อไป
}
?>
