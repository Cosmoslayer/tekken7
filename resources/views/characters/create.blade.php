<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
</head>
<body>
    <form method="POST" action="/characters" class="container" style="padding-top: 40px" enctype="multipart/form-data">
        @csrf

        <h1 class="heading is-1">Create a Character</h1>

        <div class="field">
            <label for="name" class="label">Name: </label>

            <div class="control">
                <input type="text" class="input" name="name" placeholder="Name">
            </div>
        </div>

        <div class="field">
            <label for="fighting_style" class="label">Fighting Style: </label>

            <div class="control">
                <input type="text" class="input" name="fighting_style" placeholder="Fighting Style">
            </div>
        </div>

        <div class="field">
            <label for="nationality" class="label">Nationality: </label>

            <div class="control">
                <input type="text" class="input" name="nationality" placeholder="Nationality">
            </div>
        </div>

        <div class="field">
            <label for="background" class="label">Background: </label>

            <div class="control">
                <textarea name="background" class="textarea"></textarea>
            </div>
        </div>

        <div class="field">
            <label for="picture" class="label">Picture: </label>

            <div class="control">
                <input type="file" class="input" name="picture">
            </div>
        </div>

        <div class="field">
            <label for="notes" class="label">Notes: </label>

            <div class="control">
                <textarea name="notes" class="textarea"></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create Character</button>
            </div>
        </div>
    </form>
</body>
</html>
