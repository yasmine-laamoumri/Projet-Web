console.log("JavaScript fonctionne !");
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formContact');

    form.addEventListener('submit', (e) => {
        // Empêche la page de se recharger
        e.preventDefault();

        // Récupération des valeurs
        const data = {
            nom: document.getElementById('nom').value,
            email: document.getElementById('email').value,
            sujet: document.getElementById('sujet').value,
            message: document.getElementById('message').value
        };

        // --- Validation simple ---
        if (data.message.trim() === "") {
            alert("⚠️ N'oublie pas d'écrire un petit message !");
            return;
        }

        // --- Simulation d'envoi ---
        console.log("Données prêtes à être envoyées :", data);
        
        // Effet visuel sur le bouton
        const btn = document.querySelector('.send-btn');
        btn.innerText = "Envoi en cours...";
        btn.disabled = true;

        setTimeout(() => {
            alert(`Merci ${data.nom} ! Ton message sur "${data.sujet}" a bien été reçu (simulation).`);
            
            // Réinitialisation du formulaire
            form.reset();
            btn.innerText = "Envoyer";
            btn.disabled = false;
        }, 1500);
    });
});