function modalHandler(event)
{
    const modalElem = document.querySelector('div.new-income-parcel-modal');

    modalElem.classList.toggle('opened');
    document.body.classList.toggle('notScrollable');
}

function deleteAddedField(event)
{
    event.currentTarget.parentNode.remove();
}

function addNewField(event)
{
    event.preventDefault();

    const button = document.getElementById('add-new-field');

    button.insertAdjacentHTML('beforebegin',
        `
            <div class="product-add-wrapper">
                <img src="/src/icons/close-modal.svg" class="remove-field">

                <div class="input-wrapper">
                    <label for="">Название товара</label>
                    <input type="text" name="product-name[]" id="" required>
                </div>
    
                <div class="input-wrapper">
                    <label for="">Количество</label>
                    <input type="number" name="product-quantity[]" id="" required>
                </div>
            </div>
        `);

    const removeFieldsButtons = document.querySelectorAll('img.remove-field');
    const neededButton = removeFieldsButtons[removeFieldsButtons.length - 1];

    neededButton.addEventListener('click', deleteAddedField, true)
}

document.addEventListener('DOMContentLoaded', e=> {
    document.getElementById('openNewParcelModal').addEventListener('click', modalHandler, true);
    document.getElementById('close-modal').addEventListener('click', modalHandler, true);

    document.getElementById('add-new-field').addEventListener('click', addNewField, true);
})