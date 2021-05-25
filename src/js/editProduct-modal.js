async function getProductInfo(event)
{
    let productId;

    if (event)
    {
        productId = event.currentTarget.parentNode.parentNode.dataset.productId;
    }

    console.log(productId);

    const data = new FormData();
    data.append('product-id', productId);

    await fetch('/src/php/getProductInfo.php', {
        method: 'POST',
        body: data
    })
        .then(response => response.json())
        .then(jsoned => openModal(jsoned[0]))
}

function openModal(data)
{
    console.log(data)

    const modal = document.querySelector('div.edit-product-modal');

    document.getElementById('product-id').value = data.id;
    document.getElementById('product-name').value = data.name;
    document.getElementById('product-desc').textContent = data.description;
    document.getElementById('product-quantity').value = data.quantity;
    document.getElementById('product-old-image').src = data.image;

    modal.classList.add('opened');
}

function closeModal(event)
{
    document.querySelector('div.edit-product-modal').classList.remove('opened');
}

async function sendData(event)
{
    event.preventDefault();

    const form = document.querySelector('form.content-wrapper');

    let formData = new FormData();

    const productID = form.querySelector('input[name="product-id"]').value;
    const productName = form.querySelector('input[name="product-name"]').value;
    const productDesc = form.querySelector('textarea[name="product-desc"]').value;
    const productQuantity = form.querySelector('input[name="product-quantity"]').value;
    let productNewImage = form.querySelector('input[name="product-new-image"]').value;

    if (productNewImage === '')
    {
        productNewImage = document.getElementById('product-old-image').src;
    }

    console.log(productID);
    console.log(productName);
    console.log(productDesc);
    console.log(productQuantity);
    console.log(productNewImage);

    formData.append('productID', productID);
    formData.append('productName', productName);
    formData.append('productDesc', productDesc);
    formData.append('productQuantity', productQuantity);
    formData.append('productNewImage', productNewImage);

    await fetch('/src/php/update-product.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(jsonedData =>
        {
           console.log(jsonedData)

            if (jsonedData.code == 200) {
                location.reload();
            }
            else
            {
               console.warn('Что-то пошло не так. Свяжитесь с программистом)')
            }
        })
}

document.addEventListener('DOMContentLoaded', e =>
{
    document.querySelectorAll('button.manage-button.edit')
        .forEach(item => item.addEventListener('click', getProductInfo));

    document.querySelector('.close-modal').addEventListener('click', closeModal)
    document.getElementById('editProductButton').addEventListener('click', sendData);
});