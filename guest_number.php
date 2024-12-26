<?php
function validate($input) {
    return is_numeric($input) && (int)$input == $input && $input >= 1 && $input <= 100;
}

function playGame($maxAttempts = 7) {
    $secretNumber = rand(1, 100);
    echo "Я загадав число від 1 до 100. У вас є $maxAttempts спроб, щоб його вгадати.\n";

    for ($attempt = 1; $attempt <= $maxAttempts; $attempt++) {
        echo "Спроба $attempt: ";
        $guess = trim(fgets(STDIN));

        if (!validate($guess)) {
            echo "Будь ласка, введіть ціле число від 1 до 100.\n";
            $attempt--; 
            continue;
        }
        $guess = (int)$guess;

        if ($guess < $secretNumber) {
            echo "Спробуй більше.\n";
        } elseif ($guess > $secretNumber) {
            echo "Спробуй менше.\n";
        } else {
            echo "Вітаю! Ви вгадали число $secretNumber з $attempt спроб!\n";
            return;
        }
    }

    echo "На жаль, ви не вгадали. Загадане число: $secretNumber.\n";
}
playGame();
?>
