<?php
return [
    'access_token' => env('YIyR5wMAacZypMtDbjmNaZeUoGPoxejVsOlI1i5ZoqC', null),
];
use Phattarachai\LineNotify\Facade\Line;

// จากใน Controller หรือที่อื่น ๆ
Line::send('ทดสอบส่งข้อความ');

