
<?php
    if($_POST['check1'] == 'on')
        echo $_POST['id1'].$_POST['check1'].'<br>';
    if($_POST['check2'] == 'on')
        echo $_POST['id2'].$_POST['check2'].'<br>';
    if($_POST['check3'] == 'on')
    echo $_POST['id3'].$_POST['check3'].'<br>';
?>
<form action="test.php" method="post">
    <table>
        <tr>
            <td>
                1
            </td>
            <td>
                <input type="hidden" name='id1' value='1'>
                <input type="checkbox" name='check1'>
            </td>
        </tr>
        <tr>
            <td>
                2
            </td>
            <td>
                <input type="hidden" name='id2' value='2'>
                <input type="checkbox" name='check2'>
            </td>
        </tr>
        <tr>
            <td>
                3
            </td>
            <td>
                <input type="hidden" name='id3' value='3'>
                <input type="checkbox" name='check3'>
            </td>
        </tr>
        <tr>
            <input type="submit" value='บันทึก'>
        </tr>
    </table>
</form>
