//открытие/закрытие модалки
function ModalHandler(event)
{
    document.querySelector('div.outcome-modal').classList.toggle('showed');
}

// это чтобы в datalist вставлять продукты в addNewField()
async function getProducts()
{
    return await fetch('/src/php/getProducts.php', {
        method: "GET"
    })
        .then(response => response.json())
}

// чтобы при выборе товара менялось оставшееся количество
function selectHandler(event)
{
    const dataListOptions = event.currentTarget.parentNode.childNodes[5].options;
    const selectedValue = event.currentTarget.value;
    let selectedOption = null;

    //ищем выбранный option
    for (let option of dataListOptions)
    {
        if (option.value === selectedValue)
        {
            selectedOption = option;
            break;
        }
    }

    //берем span, в который будем сувать оставшееся количество
    const span = event.currentTarget.parentNode.childNodes[1].childNodes[3].childNodes[1];
    //суем в span из дата-атрибута оставшееся количество
    span.textContent = selectedOption.dataset.remain;
}

// создание нового поля в модалке
let fieldId = 2;

function addNewField(event)
{
    document.getElementById('submit-btn').insertAdjacentHTML('beforebegin', 
    `
        <div class="input-wrapper">
            <div class="texts">
                <label for="products-list">Введите название товара</label>
                <p class="remain-text">На складе: <span></span> шт.</p>
            </div>

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
                <option data-remain=${item['quantity']} value=${item['product-id']}>${item['product-name']}</option>
            `)
        })
        fieldId++;
    })

    // на крестик вешаем удаление поля
    const closeButtons = document.querySelectorAll('img.remove-field');
    const nedeedButton = closeButtons[closeButtons.length - 1];
    nedeedButton.addEventListener('click', removeField, true);

    // на добавленный инпут вешаем обработчик оставшегося товара
    const inputs = document.querySelectorAll('input[name="product-id[]"]');
    const input = inputs[inputs.length - 1];
    input.addEventListener('change', selectHandler, true);
}

// удаление нового поля в модалке
function removeField(event)
{
    event.currentTarget.parentNode.remove();
}

function formHandler(event)
{
    let submitable = true;

    event.preventDefault()
    const form = event.currentTarget.parentNode;

    const allInputWrappers = form.querySelectorAll('div.input-wrapper');

    allInputWrappers.forEach((elem, index) => {
        // проверяем инпут на заполненность
        const productID = elem.childNodes[3].value;

        // если заполнено поле, то двигаемся дальше
        if (productID !== '')
        {
            const remainQuantity = parseInt(elem.childNodes[1].childNodes[3].childNodes[1].textContent);
            const outcomingQuantity = parseInt(elem.childNodes[7].value);

            if(remainQuantity - outcomingQuantity < 0)
            {
                submitable = false;
                alert(`Внимательно проверьте количество ${index+1}-го отгружаемого товара`);
            }
        }
        else
        {
            elem.remove();
        }
    });


    if(submitable)
    {
        form.submit();
    }
}

document.addEventListener('DOMContentLoaded', e => 
{
    document.getElementById('new-outcome').addEventListener('click', ModalHandler, true);

    document.getElementById('close-outcome-parcel').addEventListener('click', ModalHandler, true);

    document.getElementById('add-new-field').addEventListener('click', addNewField, true);

    document.querySelector('input[name="product-id[]"]').addEventListener('change', selectHandler, true);

    document.getElementById('submit-btn').addEventListener('click', formHandler, true);
})