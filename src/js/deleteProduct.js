async function deleteProduct(event)
{
    const elem = event.currentTarget.parentNode.parentNode;
    const prodID = elem.dataset.productId;

    console.log('prodID', prodID);

    const formData = new FormData();
    formData.append('prodID', prodID);

    await fetch('/src/php/deleteProduct.php',
        {
            method: 'POST',
            body: formData
        })
        .then(data => data.json())
        .then(data => {
            console.log(data)

            if (data.code == 200)
            {
                elem.remove();
            }
            else
            {
                console.warn(data.code);
            }
        })
}

document.addEventListener('DOMContentLoaded', e =>
{
    document.querySelectorAll('button.manage-button.delete')
        .forEach(item => item.addEventListener('click', deleteProduct))
})