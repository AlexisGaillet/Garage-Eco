const brandSelect = document.getElementById('brand');

const modelSelect = document.getElementById('model');

const typeSelect = document.getElementById('type');

brandSelect.addEventListener('change', event => {

    const id = brandSelect.value;

    modelSelect.innerHTML = '<option disabled selected hidden value="">Modèle</option>';
    typeSelect.innerHTML = '<option disabled selected hidden value="">Motorisation</option>';

    fetch('/add-car-ajax?Id_brands=' + id)
        .then(response => response.json())

        .then (models => {
            let preparedHTML = '';

            for (const modelName in models) {
                preparedHTML += '<optgroup label="' + modelName + '">';

                models[modelName].forEach( model => {
                    preparedHTML += '<option value="' + model.Id_models + '">' + model.name + ' ' + model.car_year + '</option>';
                });

                preparedHTML += '</optgroup>';
            }
            
            modelSelect.innerHTML += preparedHTML;
        })
});


const typeArray = {1:"Diesel", 2:"Essence", 3:"Hybride", 4:"Electrique", 5:"GPL", 6:"Autre"};
const model = document.getElementById('model');

model.addEventListener('change', event => {

    const id = model.value;

    typeSelect.innerHTML = '<option disabled selected hidden value="">Motorisation</option>';

    fetch('/add-car-ajax?Id_models=' + id)
        .then(response => response.json())

        .then (types => {
            let preparedHTML = '';

            for (const typeMotorization in types) {
                preparedHTML += '<optgroup label="' + typeArray[typeMotorization] + '">';

                types[typeMotorization].forEach( type => {
                    preparedHTML += '<option value="' + type.Id_types + '">' + type.engine_type + '</option>';
                });

                preparedHTML += '</optgroup>';
            }
            
            typeSelect.innerHTML += preparedHTML;
        })
});