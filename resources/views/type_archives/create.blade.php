<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>

<form action="{{ route('type_archive.store') }}" method="POST">
    @csrf
    <label for="nom_type">Nom :</label>
    <input type="text" id="nom_type" name="nom_type" placeholder="Entrez le nom">

    <button type="button" onclick="annuler()">Annuler</button>
    <button type="submit">Enregistrer</button>
</form>

<script>
    function annuler() {
        // Code pour annuler
        alert("Annulation en cours...");
    }
</script>

</body>
</html>
