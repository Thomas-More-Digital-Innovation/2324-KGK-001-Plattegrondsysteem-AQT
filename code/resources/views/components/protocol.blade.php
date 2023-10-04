<?php
$currentDate = date('Y-m-d');
$dayOfWeek = date('l', strtotime($currentDate));
$count = 0;
$protocolnames= DB::table('protocoldetail')->get();
?>

<div class="flex flex-col items-center">
    <h3>Opvolging</h3>

    <div class="flex">
        <div class="p-1 height">
            <table>
                <tr>
                    <th>To do</th>
                </tr>
                <?php foreach ($protocolnames as $protocol): ?>
                <tr>
                    <td class="text-center border-2"><?php echo $protocol->name; $count++; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div>
            <?php echo "<p class='text-center'>$dayOfWeek</p>"?>
            <table class="border-2">
                <thead>
                    <tr>
                        <th>Voormiddag</th>
                        <th>Namiddag</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < $count; $i++)
                    <tr class="text-center">
                        <td class="border-2">
                            <input type="checkbox" name="checkbox1[]">
                        </td>
                        <td class="border-2">
                            <input type checkbox" name="checkbox2[]">
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
