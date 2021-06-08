function sortProducts(event)
{
    const currentCategory = parseInt(event.currentTarget.value);
    const productsList = document.querySelectorAll('div.product-item');

    if (currentCategory === -1)
    {
        productsList.forEach(item => item.classList.remove('hidden'));
    }
    else
    {
        productsList.forEach(item =>
        {
            const itemCategoryID = parseInt(item.dataset.categoryId);

            if (itemCategoryID !== currentCategory)
            {
                item.classList.add('hidden');
            }
            else
            {
                item.classList.remove('hidden');
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', e => {
    const selectElem = document.getElementById('title-category-select');

    selectElem.addEventListener('change', sortProducts);
})