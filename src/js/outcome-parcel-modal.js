function ModalHandler(event)
{
    document.querySelector('div.outcome-modal').classList.toggle('showed');
}

async function getProducts()
{
    return await fetch('/src/php/getProducts.php', {
        method: "GET"
    })
        .then(response => response.json())
} 

let fieldId = 2;

function addNewField(event)
{
    document.getElementById('submit-btn').insertAdjacentHTML('beforebegin', 
    `
        <div class="input-wrapper">
            <label for="products-list">Введите название товара</label>

            <input list="products-${fieldId}" id="products-list-${fieldId}" name="product-id[]"/>

            <datalist id="products-${fieldId}">
            </datalist>

            <input type="number" name="product-quantity[]" id="" min="1" value="1">

            <img src="/src/icons/close-modal.svg" alt="close" class="remove-field">
        </div>  
    `);

    getProducts().then(data => 
    {
        data.forEach(item =>
        {
            document.getElementById(`products-${fieldId}`).insertAdjacentHTML('beforeend', 
            `
                <option value=${item['product-id']}>${item['product-name']}</option>
            `)
        })
        fieldId++;
    })

    const closeButtons = document.querySelectorAll('img.remove-field');
    const nedeedButton = closeButtons[closeButtons.length - 1];

    nedeedButton.addEventListener('click', removeField, true);
}

function removeField(event) 
{
    event.currentTarget.parentNode.remove();    
}

document.addEventListener('DOMContentLoaded', e => 
{
    document.getElementById('new-outcome').addEventListener('click', ModalHandler, true);

    document.getElementById('close-outcome-parcel').addEventListener('click', ModalHandler, true);

    document.getElementById('add-new-field').addEventListener('click', addNewField, true);
})