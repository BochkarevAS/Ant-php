<?php

    use Classes\Currency\CountCurrency;
    use Classes\Currency\Service\JsonRates;

    $price = isset($_GET['price']) ? $_GET['price'] : 0;
    $begin = isset($_GET['begin']) ? $_GET['begin'] : 0;
    $end = isset($_GET['end']) ? $_GET['end'] : 0;
    $sum = 0;

    $countCurrency = new CountCurrency(new JsonRates());
    $array = $countCurrency->getContent();

    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        $sum = round($countCurrency->calculate($price, $begin, $end), 3);
    }

?>

    <form method="GET">
        <table>
            <tr>
                <td>
                    Исходная валюта:
                </td>
                <td>
                    <input type="text" name="price" value="<?= $price ?>">
                </td>
                <td>
                    <select name="begin">
                        <?php foreach ($array as $key => $value) : ?>
                            <option value="<?= $key ?>" <?= ($key == $begin) ? "selected" : "" ?> ><?= $key ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Перевести в:
                </td>
                <td></td>
                <td>
                    <select name="end">
                        <?php foreach ($array as $key => $value) : ?>
                            <option value="<?= $key ?>" <?= ($key == $end) ? "selected" : "" ?> ><?= $key ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>
                    <input type="submit" value="Применить">
                </td>
            </tr>
        </table>
    </form>

    <br>

    <?= "[$price] <b>$begin</b>" ?> составляет <?= " [$sum] <b>$end</b>" ?>





