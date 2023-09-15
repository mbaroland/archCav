<style>
/* Modifiez le CSS pour le bouton */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown button {
    background-color: #4CAF50; /* Couleur de fond */
    color: white; /* Couleur du texte */
    padding: 10px 20px; /* Espacement du bouton */
    border: none; /* Supprimer la bordure */
    cursor: pointer;
}

/* Modifiez le CSS pour le menu déroulant */
.dropdown-content {
    display: none;
    position: relative; /* Changez la position en relative */
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    margin-top: -10px; /* Ajustez la marge pour superposer au bouton */
    left: 0;
}

/* Montrez le menu déroulant lors du survol du bouton */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Modifiez le style des liens dans le menu déroulant */
.dropdown-content a {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    color: #333;
}

/* Style au survol des liens */
.dropdown-content a:hover {
    background-color: #ddd;
}

    </style>

