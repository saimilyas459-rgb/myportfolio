document.addEventListener("DOMContentLoaded", function() {
    const mainForm = document.getElementById("mainCoreForm");
    const titleInput = document.getElementById("formTitleInput");
    const validationErrorText = document.getElementById("titleValidationError");

    // Form Client-side Validation logic
    mainForm.addEventListener("submit", function(event) {
        let executionCheck = true;

        // Title empty checks
        if (titleInput.value.trim() === "") {
            titleInput.style.borderColor = "#ff3333";
            validationErrorText.style.display = "block";
            executionCheck = false;
        } else {
            titleInput.style.borderColor = "#30363d";
            validationErrorText.style.display = "none";
        }

        // Action workflow blocker on failure
        if (!executionCheck) {
            event.preventDefault(); // Stop execution path
            
            // Trigger Shake CSS animation loop
            mainForm.classList.add("shake");
            setTimeout(() => {
                mainForm.classList.remove("shake");
            }, 400);
        }
    });

    // Reset error colors in real-time when user inputs text
    titleInput.addEventListener("input", function() {
        if (titleInput.value.trim() !== "") {
            titleInput.style.borderColor = "#00d2ff";
            validationErrorText.style.display = "none";
        }
    });
});