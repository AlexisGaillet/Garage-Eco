<main class="mainRegisterLogin flex-column-center">
    <h2 class="pageTitle">Ajouter un véhicule</h2>
    <form method="post" class="registerLoginForm flex-column">
        <ul>
            <li><select name="brand" id="brand">

                <option disabled selected hidden>Marque</option>


                <optgroup label="Constructeurs les plus vendus">
                    <option value="">Audi</option>
                </optgroup>


                <optgroup label="Constructeurs de A à Z">
                    <option value="">Bugatti</option>
                </optgroup>

            </select></li>
            <p class="errorText"><?=$error['brand'] ?? ''?></p>


            <li><select name="models" id="models">

                <option disabled selected hidden>Modèle</option>


                <optgroup label="A3">
                    <option>A3 (2013-2018)</option>
                    <option>A3 Sportback (2018-...)</option>
                </optgroup>

                <optgroup label="A4">
                    <option>A4 (2008-2013)</option>
                    <option>A3 Sportback (2013-2018)</option>
                    <option>A3 Sportback (2018-...)</option>
                </optgroup>

            </select></li>
            <p class="errorText"><?=$error['models'] ?? ''?></p>


            <li><select name="type" id="type">

                <option disabled selected hidden>Motorisation</option>


                <optgroup label="Diesel">
                    <option>1.6 TDI (105 CH)</option>
                    <option>1.6 TDI (110 CH)</option>
                    <option>2.0 TDI (150 CH)</option>
                    <option>2.0 TDI (184 CH)</option>
                </optgroup>

                <optgroup label="Essence">
                    <option>1.4 TFSI (125 CH)</option>
                    <option>1.8 TFSI (180 CH)</option>
                </optgroup>

                <optgroup label="Hybride">
                    <option>1.4 TFSI e-tron (150 CH)</option>
                </optgroup>
            </select></li>
            <p class="errorText"><?=$error['type'] ?? ''?></p>
        </ul>
        <input type="submit" value="Ajouter" class="registerLoginButton">
    </form>
</main>