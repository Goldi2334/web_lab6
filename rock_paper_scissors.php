<?php
function validate($input)
{
    return in_array($input, [0, 1, 2]);
}

function playRound($userChoice)
{
    $choices = ["Камінь", "Ножиці", "Папір"];
    $computerChoice = rand(0, 2);

    echo "Ви обрали: {$choices[$userChoice]}\n";
    echo "Комп'ютер обрав: {$choices[$computerChoice]}\n";

    if ($userChoice === $computerChoice) {
        echo "Нічия!\n";
        return 0; 
    }

    if (
        ($userChoice === 0 && $computerChoice === 1) || 
        ($userChoice === 1 && $computerChoice === 2) ||
        ($userChoice === 2 && $computerChoice === 0)    
    ) {
        echo "Ви виграли цей раунд!\n";
        return 1;
    } else {
        echo "Комп'ютер виграв цей раунд!\n";
        return -1;
    }
}

function playGame()
{
    echo "Ласкаво просимо до гри 'Камінь, Ножиці, Папір'!\n";
    echo "Гра триватиме 3 раунди.\n";

    $userScore = 0;
    $computerScore = 0;

    for ($round = 1; $round <= 3; $round++) {
        echo "\nРаунд $round. Оберіть:\n";
        echo "[0] Камінь\n";
        echo "[1] Ножиці\n";
        echo "[2] Папір\n";
        echo "-> ";

        $userInput = trim(fgets(STDIN));

        if (!validate($userInput)) {
            echo "Невірний вибір. Введіть 0, 1 або 2.\n";
            $round--;
            continue;
        }

        $userChoice = (int) $userInput;

        $result = playRound($userChoice);

        if ($result === 1) {
            $userScore++;
        } elseif ($result === -1) {
            $computerScore++;
        }

        echo "Рахунок: Ви $userScore - $computerScore Комп'ютер\n";
    }

    echo "\nКінцевий рахунок: Ви $userScore - $computerScore Комп'ютер\n";
    if ($userScore > $computerScore) {
        echo "Ви перемогли!\n";
    } elseif ($userScore < $computerScore) {
        echo "Комп'ютер переміг!\n";
    } else {
        echo "Гра закінчилась нічиєю!\n";
    }
}

playGame();
?>