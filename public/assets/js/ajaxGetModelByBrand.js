const brand = document.getElementById('brand');

brand.addEventListener('change', event => {

    const id = brand.value;

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

    const typeSelect = document.getElementById('type');

    typeSelect.innerHTML = '<option disabled selected hidden value="">Motorisation</option>';

    fetch('/add-car-ajax?Id_models=' + id)
});