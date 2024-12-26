<?php
function rollDice()
{
    return rand(1, 6);
}

function playGame()
{
    $score = 0;
    $target = 20;

    echo "Ласкаво просимо до гри 'Roll the Dice'!\n";
    echo "Ваша ціль – набрати рівно $target очок.\n";

    while ($score < $target) {
        echo "\nНатисніть Enter, щоб зробити кидок...";
        fgets(STDIN);

        $roll = rollDice();
        echo "Кидок: $roll\n";

        $score += $roll;

        if ($roll === 6) {
            echo "Вам випало 6! Ви отримуєте суперкидок!\n";
            $superRoll = rollDice();
            echo "Суперкидок: $superRoll\n";
            $score += $superRoll;
        }

        echo "Ваш загальний рахунок: $score\n";

        if ($score === $target) {
            echo "Вітаємо! Ви точно досягли $target очок і перемогли!\n";
            return;
        } elseif ($score > $target) {
            echo "На жаль, ви перевищили $target очок. Ви програли.\n";
            return;
        }
    }
}
playGame();
?>