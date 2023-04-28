<fieldset style="width:300px;margin: auto;">
    <legend>Form</legend>
    <form method="post" action="<?php echo $action; ?>">
        <table cellpadding="5">
            <tr>
                <td>Tên nhân viên</td>
                <td><input type="text" value="<?php echo isset($record->hovaten) ? $record->hovaten : ''; ?>"
                        name="hovaten" required></td>
            </tr>
            <tr>
                <td>Quê Quán</td>
                <td><input type="text" value="<?php echo isset($record->quequan) ? $record->quequan : ''; ?>"
                        name="quequan" required></td>
            </tr>
            <tr>
                <td>Lương</td>
                <td><input type="number" value="<?php echo isset($record->luong) ? $record->luong : ''; ?>" name="luong"
                        required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Thực hiện"></td>
            </tr>
        </table>
    </form>
</fieldset>