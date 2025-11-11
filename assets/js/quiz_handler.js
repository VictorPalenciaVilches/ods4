
(function () {
    const form = document.getElementById('quiz-form');
    const resultsContainer = document.getElementById('quiz-results-container');

    if (!form || !resultsContainer) {
        return;
    }

    const fieldsets = Array.from(
        form.querySelectorAll('fieldset[data-question-id][data-correct-answer]')
    );

    if (fieldsets.length === 0) {
        return;
    }

    const totalQuestions = fieldsets.length;

    const renderResult = (score, unanswered) => {
        const messages = [
            `<strong>Resultado:</strong> obtuviste ${score} de ${totalQuestions} respuestas correctas.`
        ];

        if (unanswered > 0) {
            messages.push(`Preguntas sin responder: ${unanswered}.`);
        }

        resultsContainer.innerHTML = `
            <div class="quiz-result-message">
                ${messages.map((msg) => `<p>${msg}</p>`).join('')}
            </div>
        `;
        resultsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
    };

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        let correctAnswers = 0;
        let unanswered = 0;

        fieldsets.forEach((fieldset) => {
            const correctAnswer = parseInt(fieldset.dataset.correctAnswer, 10);
            const selectedOption = fieldset.querySelector('input[type=\"radio\"]:checked');

            if (!selectedOption) {
                unanswered += 1;
                return;
            }

            const userAnswer = parseInt(selectedOption.value, 10);
            if (!Number.isNaN(userAnswer) && userAnswer === correctAnswer) {
                correctAnswers += 1;
            }
        });

        renderResult(correctAnswers, unanswered);
    });
})();
