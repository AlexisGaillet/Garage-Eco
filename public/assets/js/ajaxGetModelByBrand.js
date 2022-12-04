const brand = document.getElementById('brand');

brand.addEventListener('change', event => {

    const id = brand.value;
    console.log(id);

    const modelSelect = document.getElementById('model');

    modelSelect.innerHTML = '<option disabled selected hidden value="">Modèle</option>';

    fetch('/add-car-ajax?Id_brands=' + id)
        .then(response => response.json())

        .then (models => {
            console.log(models);


            let preparedHTML = '';


            for (const modelName in models) {
                preparedHTML += '<optgroup label="' + modelName + '">';
                models[modelName].forEach( model => {
                    // console.log(model.Id_models);
                    preparedHTML += '<option value"' + model.Id_models + '">' + model.name + ' ' + model.car_year + '</option>';
                });
                preparedHTML += '</optgroup>';
            }
            modelSelect.innerHTML += preparedHTML;
        })
});



const model = document.getElementById('model');

model.addEventListener('change', event => {
    const id = model.value;
    const name = model.options[model.selectedIndex].text;
    console.log('id = ' + id);
    console.log('name = ' + name);

    // /\ DANS LA VIEW ON A BIEN L'ID EN INT MAIS QUAND LE JS LE RECUPERE IL RECUPERE LE NOM DE DU MODELE /\ 

    const typeSelect = document.getElementById('type');

    typeSelect.innerHTML = '<option disabled selected hidden value="">Motorisation</option>';

    fetch('/add-car-ajax?Id_models=' + id)
        .then(response => response.json())

        .then (types => {
            console.log('types : ' + types);

            let preparedHTML = '';

            types.forEach( type => {
                preparedHTML += '<option value"' + type.Id_types + '">' + type.name + ' ' + type.power + ' ' + type.fuel + '</option>';
            });
            typeSelect.innerHTML += preparedHTML;
        })
});