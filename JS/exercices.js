document.addEventListener('DOMContentLoaded', () => {
    fetch('http://localhost:3000/api/exercices')
        .then(res => res.json())
        .then(exercices => {
            const container = document.getElementById('liste-exercices');
            container.innerHTML = '';
            exercices.forEach(ex => {
                const div = document.createElement('div');
                div.className = 'bg-white p-4 rounded shadow mb-4';
                div.innerHTML = `
                    <h3 class="font-bold">${ex.titre}</h3>
                    <p>${ex.description}</p>
                    <span class="text-sm text-gray-500">${ex.matiere}</span><br>
                    <a href="${ex.url}" class="text-blue-600 underline" target="_blank">Télécharger</a>
                `;
                container.appendChild(div);
            });
        });
});