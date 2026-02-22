console.log("JavaScript fonctionne !");
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.contact-form');

    form.addEventListener('submit', (e) => {
        e.preventDefault(); // Empêche de quitter la page

        // On récupère les éléments
        const nom = document.getElementById('Name');
        const email = document.getElementById('email');
        const sujet = document.getElementById('sujet');
        const message = document.getElementById('message');

        const champs = [nom, email, sujet, message];
        let erreur = false;

        // Vérification : si c'est vide, on met en rouge
        champs.forEach(champ => {
            if (champ.value.trim() === "") {
                champ.style.borderColor = "red";
                erreur = true;
            } else {
                champ.style.borderColor = ""; // Remet normal si rempli
            }
        });

        if (erreur) {
            alert("Veuillez remplir tous les champs en rouge.");
        } else {
            alert("Merci ! Votre message a bien été envoyé.");
            form.reset(); // Vide le formulaire
        }
    });
});