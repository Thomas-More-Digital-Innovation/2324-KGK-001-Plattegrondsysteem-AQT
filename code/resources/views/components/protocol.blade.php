<?php
$currentDate = date('Y-m-d');
$dayOfWeek = date('l', strtotime($currentDate));
$count = 0;
$protocolnames= DB::table('protocoldetail')->get();
?>


<div class="flex justify-end h-screen m-5">
    <div class="flex flex-col items-center">
        <h3>Opvolging</h3>
        <form method="post" action="process_form.php"> <!-- Replace "process_form.php" with your actual server-side script -->
            <div class="p-1 height">
                <table class="border-2">
                    <thead>
                        <tr>
                            <th>To do</th>
                            <th colspan="2"><?php echo $dayOfWeek; ?></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Voormiddag</th>
                            <th>Namiddag</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($protocolnames as $protocol): ?>
                        <tr class="text-center">
                            <td class="border-2"><?php echo $protocol->name; ?></td>
                            <td class="border-2">
                                <input type="checkbox" name="checkbox1[]">
                            </td>
                            <td class="border-2">
                                <input type="checkbox" name="checkbox2[]">
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <!-- New rows for weight and temperature -->
                        <tr class="text-center">
                            <td class="border-2">
                                Gewicht
                            </td>
                            <td class="border-2" colspan="2">
                                <input type="text" name="Gewicht[]" placeholder="Gewicht">
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="border-2">
                                Temperatuur
                            </td>
                            <td class="border-2" colspan="2">
                                <input type="text" name="Temperatuur[]" placeholder="Temperatuur">
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Comment fields under the table -->
                <div class="w-full mt-1">
                    <label for="comment" class="block text-gray-700 font-bold">Opmerking Docent:</label>
                    <textarea
                        id="OpmerkingDocent"
                        name="OpmerkingDocent"
                        rows="2"
                        class="w-full px-4 py-2 rounded border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                        placeholder="Enter your comment"
                    ></textarea>
                </div>
                <div class="w-full mt-1">
                    <label for="comment" class="block text-gray-700 font-bold">Opmerking Student:</label>
                    <textarea
                        id="OpmerkingStudent"
                        name="OpmerkingStudent"
                        rows="2"
                        class="w-full px-4 py-2 rounded border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                        placeholder="Enter your comment"
                    ></textarea>
                </div>
                <!-- Submit button -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Submit</button>
            </div>
        </form>
    </div>
</div>
